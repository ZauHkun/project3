<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InstallationUpdateFormRequest extends FormRequest
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
        'date'=>'required',
        'customer_id'=>'required',
        'spliter_id'=>'required',
        'plan_id'=>'required',
        'cable_length'=>'required',
        'installed_by'=>'required',
        'remark'
        ];
    }
}
