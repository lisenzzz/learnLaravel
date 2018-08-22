<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class CreateProjectRequest extends Request
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
            'createName'=>'required|unique:projects,name',
            'createThumbnail'=>'image|dimensions:min_width=261,min_height=98'
        ];
    }

    public function messages()
    {
        return [
            'createName.required'=>'项目名称是必填的！',
            'createName.unique'=>'很抱歉，这个项目名称已被占用！',
            'createThumbnail.image'=>'请上传图片格式的文件！',
            'createThumbnail.dimensions'=>'您上传的图片尺寸过小，请至少是261X98像素的图片！'
        ];
    }
}
