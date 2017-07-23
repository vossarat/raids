<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Register;
use Carbon\Carbon;

class RegisterRequest extends FormRequest
{
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
            //'grantdate' => 'required',
            //'city_id' => 'accepted',
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
            //'FIO.required' => 'Внесите ФИО пациента',
            //'max' => 'Максимально количество символов :max',
            //'min' => 'Минимальное количество символов :min',
            //'unique' => 'Значение не уникально',
        ];
    }
    
	public function modifyRequest() 
	{	
		$requestBirthday  = $this->request->get('birthday');
		$requestGrantdate  = $this->request->get('grantdate');       
        $this->merge(array( 'birthday' => date('Y-m-d', strtotime($requestBirthday)) ));
        $this->merge(array( 'grantdate' => date('Y-m-d', strtotime($requestGrantdate)) ));

        return $this->request->all();
    }
    
}
