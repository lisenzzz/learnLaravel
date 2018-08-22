<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class UpdateProjectRquest extends Request
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
            //
            'name'=>'required|max:256'
        ];
    }

    public function messages()
    {
        return [
            'name.required'=>'项目名称不能为空！',
            'name.max'=>'项目名称不能过长！'
        ];
    }
}
