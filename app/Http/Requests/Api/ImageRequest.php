<?php
namespace App\Http\Requests\Api;

class ImageRequest extends FormRequest
{
    public function rules()
    {

        $rules = [
            'type' => 'required|string|in:goods,topic',
            'goods_id' =>'required|int',
        ];
        if ($this->type == 'avatar') {
            $rules['image'] = 'required|mimes:jpeg,bmp,png,gif|dimensions:min_width=200,min_height=200,max_width=4000,max_height=4000';
        } else {
            $rules['image'] = 'required|mimes:jpeg,bmp,png,gif';
        }

        return $rules;
    }

      public function messages()
      {
          return [
              'image.dimensions' => '图片的清晰度不合适，宽和高需要 200px 以上,且4000px以下',
              'image.mimes' => '图片类型不正确',
              'image.size' => '图片文件过大',
          ];
      }
}