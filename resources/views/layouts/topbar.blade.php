<nav class="navbar navbar-default" role="navigation">
    <div class="container-fluid">
        <!-- Название компании и кнопка, которая отображается для мобильных устройств группируются для лучшего отображения при сужении -->
        <div class="navbar-header">
            <a class="navbar-brand" href="#">...</a>
        </div>

        <!-- Группируем ссылки, формы, выпадающее меню и прочие элементы -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li> <!--class="active"-->
                    <a href="/">Ввод данных</a>
                </li>
                <li>
                    <a href="/setup">Настройка</a>
                </li>
                
                <li class="dropdown"> {{-- Справочники--}}
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Cправочники
                        <b class="caret"></b> <!--Стрелка вниз-->
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="/region">МО и регионы</a>
                        </li>
                        <li class="divider"></li> <!--Separator-->
                        <li>
                            <a href="/code">Коды</a>
                        </li>
                        <li class="divider"></li> <!--Separator-->
                        <li>
                            <a href="#">Пользователи</a>
                        </li>                        
                    </ul>
                </li> {{-- Конец Справочники--}}
                
                <li class="dropdown"> {{-- Отчеты--}}
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Отчеты
                        <b class="caret"></b> <!--Стрелка вниз-->
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="/reports/form4">Форма 4</a>
                        </li>
                        <li class="divider"></li> <!--Separator-->
                        <li>
                            <a href="#">Другой отчет</a>
                        </li>
                    </ul> {{-- Конец отчеты--}}
                </li>
            </ul>

            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Пользователь
                        <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="#">Выход</a>
                        </li>

                    </ul>
                </li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>