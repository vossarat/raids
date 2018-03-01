<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Register;
use Carbon\Carbon;
use DB;
use Auth;
use App\Setting;
 
class RegisterRequest extends FormRequest
{
	
	public function __construct()
	{
		$this->closedate = Setting::where('field','closedate')->first()->value;
	}
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'number' => 'required',            
            'surname' => 'required',
            'birthday' => 'required',
            'code_id' => 'required',
            //'sex_id' => 'accepted',
            'grantdate' => 'required|after:'.$this->closedate,
            'city_id' => 'required|not_in:0',
            //'region_id' => 'accepted',
            //'diagnose_id' => 'accepted',
            //'family_id' => 'accepted',
            //'national_id' => 'accepted',
            //'birthday' => 'required|date|date_format:Y-m-d'
            //'url' => 'required|max:255|unique:menus,url,'.$this->id,
            //'weight' => 'digits:1',
        ];
    }
    
    public function messages(){
        return [
            'number.required' => 'Номер не заполнен',
            'surname.required' => 'Заполните фамилию пациента',
            'birthday.required' => 'Заполните дату рождения',
            'city_id.not_in' => 'Заполните местожительства',
            'grantdate.after' => "Период до $this->closedate закрыт",
            'grantdate.required' => 'Заполните дату обследования',
            //'max' => 'Максимально количество символов :max',
            //'min' => 'Минимальное количество символов :min',
            //'unique' => 'Значение не уникально',
        ];
    }
    
	public function modifyRequest($action) 
	{	
		$requestBirthday  = $this->request->get('birthday');
		$requestGrantdate  = $this->request->get('grantdate');
		$requestSurname  = $this->request->get('surname');
		$requestCodeId  = $this->request->get('code_id');
		$requestDiagnoseId  = $this->request->get('diagnose_id');
		       
        $this->merge(array( 'birthday' => date('Y-m-d', strtotime($requestBirthday)) ));
        $this->merge(array( 'grantdate' => date('Y-m-d', strtotime($requestGrantdate)) ));
        $this->merge(array( 'user_id' => Auth::user()->id ));
        
        // проверка на дубликат по surname, birthday, code, diagnose в течении месяца
        if($action == 'store'){
        	$dublicate = $this->dublicate( $requestGrantdate, $requestSurname, date('Y-m-d', strtotime($requestBirthday)), $requestCodeId, $requestDiagnoseId);
        	$dublicateRecords = $this->dublicateRecords( $requestGrantdate, $requestSurname, date('Y-m-d', strtotime($requestBirthday)), $requestCodeId, $requestDiagnoseId);
        	if($dublicate){				
				// в таблице не правильно назвал поле duPPPPPPPPPPPPPPPlicate
				$this->merge(array( 'duplicate' => 1 ));
				$makeReadOnly = DB::update('update register set mainduplicate = 1 where id = ?', [$dublicateRecords->first()->id]);
			}			
		}
        return $this->request->all();
    }
    
    public function dublicate($grantdate, $surname, $birthday, $code, $diagnose)
	{		
		$dublicateRecord = DB::table('register')
            ->select('surname', 'birthday', 'code_id', 'diagnose_id')
            ->where( DB::raw('YEAR(grantdate)'), date("Y",strtotime($grantdate)) )
            ->where( DB::raw('MONTH(grantdate)'), date("m",strtotime($grantdate)) )
            ->where('surname', $surname )
            ->where('birthday', $birthday )
            ->where('code_id', $code )
            ->where('diagnose_id', $diagnose )
            ->count();
        return $dublicateRecord; 
	}
	
	public function dublicateRecords($grantdate, $surname, $birthday, $code, $diagnose)
	{		
		$dublicateRecords = DB::table('register')
            ->select('id', 'surname', 'birthday', 'code_id', 'diagnose_id')
            ->where( DB::raw('YEAR(grantdate)'), date("Y",strtotime($grantdate)) )
            ->where( DB::raw('MONTH(grantdate)'), date("m",strtotime($grantdate)) )
            ->where('surname', $surname )
            ->where('birthday', $birthday )
            ->where('code_id', $code )
            ->where('diagnose_id', $diagnose );
        return $dublicateRecords; 
	}
    
}
