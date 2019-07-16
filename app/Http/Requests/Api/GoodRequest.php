<?php

namespace App\Http\Requests\Api;

class GoodRequest extends FormRequest
{
    public function rules()
    {
        switch($this->method())
        {
            // CREATE
            case 'POST':
            {
                return [
                    'goods_name' => 'required|min:2',
                    'cat_id' => 'required|numeric|exists:shopsql.category,cat_id'
                ];
            }
            // UPDATE
            case 'PUT':
            case 'PATCH':
            {
                return [
                    'goods_name' => 'required|min:2',
                    'cat_id' => 'required|numeric|exists:shopsql.category,cat_id'
                ];
            }
            case 'GET':
            case 'DELETE':
            default:
            {
                return [];
            };
        }
    }

    public function messages()
    {
        return [
            'goods_name.min' => '商品名称必须至少两个字符',
            'cat_id' => '必须选择分类',
        ];
    }
}
