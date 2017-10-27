<?php
require_once dirname(__FILE__) . '/../../lib/Placeholder/Collection.php';
require_once __DIR__ . '/../../lib/phpmailer/PHPMailerAutoload.php';
require_once __DIR__ . '/../../core_functions.php';

// Данные smtp для подключения
/*define('SMTP_HOST', 'smtp.yandex.ru');
define('SMTP_AUTH', true);
define('SMTP_USERNAME', 'advers.autoterm@yandex.ru');
define('SMTP_PASSWORD', '2706864');
define('SMTP_SECURE', 'tsl');
define('SMTP_PORT', '587');
define('SMTP_FROM', 'advers.autoterm@yandex.ru');*/

define('SMTP_HOST', 'mail.tarassov.pro');
define('SMTP_AUTH', true);
define('SMTP_USERNAME', 'info');
define('SMTP_PASSWORD', 'ABC123abc');
define('SMTP_SECURE', 'tsl');
define('SMTP_PORT', 25);
define('SMTP_FROM', 'info@tarassov.pro');

/**
 * Функция для отправки письма админу
 *
 * @param $order - запись из таблицы order
 * @param $orderState - результат платежа от системы альфа банка
 * @param $orderStatus - статус платежа
 * @param $placeholders
 * @param $emails - адреса электроной почты
 */
function sendAdminEmail($order, $orderState, $orderStatus, $emails)
{
    $core_db_link = mysql_connect(DATABASE_HOST, DATABASE_LOGIN, DATABASE_PASSWORD);
    mysql_selectdb(DATABASE_NAME) or trigger_error('Внутренняя ошибка: Не выбрана база данных', E_USER_ERROR);
    mysql_query('SET NAMES UTF8') or trigger_error(mysql_error(), E_USER_ERROR);
    $placeholders = new Placeholder_Collection($core_db_link);

    $body = '<h1 style="color: #a51709;">Заказ №:' . (int)$orderState->OrderNumber . ' ,был оплачен с помощью Альфа банка</h1>';
    $body .= '<div><b>Уникальный номер заказа в системе Альфа Банк:</b> ' . htmlspecialchars($_GET['orderId']) . '</div>';
    $body .= '<div><b>Статус заказа:</b> ';
    switch ($orderStatus) {
        case "In Process":
            $body .= 'В процессе - Заказ создан';
            break;
        case "Delayed":
            $body .= 'Ожидает подтверждения оплаты - завершена по двустадийному механизму';
            break;
        case "Approved":
            $body .= 'Оплачен - Операция оплаты по данному заказу успешно завершена';
            break;
        case "PartialApproved":
            $body .= 'Оплачен частично - Операция оплаты проведена на часть суммы заказа (не используется)';
            break;
        case "PartialDelayed":
            $body .= 'Подтвержден частично - Подтверждение оплаты совершено на часть суммы оплаты';
            break;
        case "Canceled":
            $body .= 'Отменен - Отменен на полную сумму оплаты';
            break;
        case "PartialCanceled":
            $body .= 'Отменен частично - Отменен на часть суммы оплаты';
            break;
        case "Declined":
            $body .= 'Отклонен - Оплата завершена неуспешно';
            break;
        case "Timeout":
            $body .= 'Закрыт по истечении времени - Заказ завершен по тайм-ауту';
            break;
        default:
            $body .= htmlspecialchars($orderState->OrderStatus);
            break;
    }
    $body .= '</div>';
    $body .= '<div><b>Оригинальная сумма заказа:</b> ' . htmlspecialchars($orderState->Amount) . '</div>';

    $table["Заказчик"] = $order->type = 1 ? "Физическое лицо" : "Юридическое лицо";
    $table["Ф.И.О..."] = $convertedText = mb_convert_encoding($order->address, 'utf-8', mb_detect_encoding($order->address));
    //$table["Ф.И.О..."] = $order->name;
    $table["Адрес с указанием индекса"] = $order->address;
    $table["Паспорт"] = $order->passport;
    $table["Телефон"] = $order->phone;
    $table["Электронная почта"] = $order->email;
    $table["Транспортная компания"] = $order->transport;
    $table["Город доставки"] = $order->city;
    $table["Комментарий к заказу"] = $order->comment;
    if ($order->car == "import") {
        $table["На какой автомобиль"] = "Импортный";
    } elseif ($order->car == "our") {
        $table["На какой автомобиль"] = "Отечественный";
    } elseif ($order->car == "other") {
        $table["На какой автомобиль"] = "Другое";
    }
    //$table["НДС"] = $order->nds == 1 ? 'Выставлять' : 'Не выставлять';


    $body .= "<h1>Общая информация</h1>";

    $body .= "<table cellspacing='0' cellpadding='0' style='width: 500px;border:solid 1px rgb(220,220,220);'>";
    $i = 0;
    foreach ($table as $key => $tablerow) {
        $body .= "<tr style='" . (($i % 2 == 0) ? "background-color: rgb(240,240,240);" : "background-color: rgb(250,250,250);") . "'>";
        $body .= "<td align='right' style='padding: 8px;'><b>" . $key . ":</b></td>";
        $body .= "<td style='padding: 8px;'>" . $tablerow . "</td>";
        $body .= "</tr>";
        $i++;
    }
    $body .= "</table>";

    $resultItems = mysql_query("SELECT item_id,qty FROM items_in_orders WHERE order_id=" . ((int)$order->id)) or trigger_error(mysql_error(), E_USER_ERROR);
    $orderItemIds = array(0);
    $orderItemQTY = array();
    while ($towItemOrder = mysql_fetch_object($resultItems)) {
        $orderItemIds[] = (int)$towItemOrder->item_id;
        $orderItemQTY[(int)$towItemOrder->item_id] = $towItemOrder->qty;
    }

    $totalPrice = 0;
    $body .= "<h1>Товары</h1>";
    $body .= "<table cellspacing='0' cellpadding='0' style='width: 500px;border:solid 1px rgb(220,220,220);'>";
    $body .= "<tr style='background-color: rgb(220,220,220);'><td style='padding: 8px;'><b>Наименование</b></td><td style='padding: 8px;'><b>№ детали, сборки</b></td><td style='padding: 8px;'><b>Количество</b></td><td style='padding: 8px;'><b>Цена</b></td></tr>";
    $i = 0;
    $query = "SELECT * FROM catalogue where id IN(" . implode(",", $orderItemIds) . ") order by sort DESC";
    $result = mysql_query($query) or trigger_error(mysql_error(), E_USER_ERROR);
    while ($data = mysql_fetch_assoc($result)) {
        //////////////////////////////
        //$price=(($data['price_share']==0)?$data['price']:$data['price_share']);
        $price = $data['type'] == 1 ? (getPartPrice((($data['price_share'] == 0) ? $data['price'] : $data['price_share']), $placeholders->fetchByKey('parts_price_mod')->getValue())) : (($data['price_share'] == 0) ? $data['price'] : $data['price_share']);

        $price = $price * $orderItemQTY[$data['id']];

        $body .= "<tr style='" . (($i % 2 == 0) ? "background-color: rgb(240,240,240);" : "background-color: rgb(250,250,250);") . "'><td style='padding: 8px;'>" . $data['name'] . "</td><td style='padding: 8px;'>" . (($data['type'] == 1) ? $data['description'] : "") . "</td><td style='padding: 8px;'>" . $orderItemQTY[$data['id']] . "</td><td style='padding: 8px;'>" . $price . "</td></tr>";
        $totalPrice += $price;
        $i++;
    }
    $body .= "<tr><td colspan='3' align='right' style='padding: 8px;'>Стоимость заказа:</td><td style='padding: 8px;'>" . $totalPrice . "</td></tr>";
    $body .= "</table>";

    $mail = new PHPMailer;
    $mail->CharSet = "UTF-8";

    $mail->isSMTP();
    $mail->Host = SMTP_HOST;
    $mail->SMTPAuth = SMTP_AUTH;
    $mail->Username = SMTP_USERNAME;
    $mail->Password = SMTP_PASSWORD;
    $mail->SMTPSecure = SMTP_SECURE;
    $mail->Port = SMTP_PORT;

    $mail->SMTPDebug = 0;
    $mail->Debugoutput = 'html';

    $mail->AltBody = 'To view the message, please use an HTML compatible email viewer!';
    $mail->Subject = "Оплата заказа через Альфа Банк";

    $mail->setFrom(SMTP_FROM);

    $mail->AddAddress('info@tarassov.pro');
    

    $mail->MsgHTML($body);
    $mail->Send();
}