<?php
namespace App\Http\Controllers\Api;

use App\Models\Image;
use App\Models\ImageM;
use Illuminate\Http\Request;
use App\Handlers\ImageUploadHandler;
use App\Transformers\ImageTransformer;
use App\Http\Requests\Api\ImageRequest;

class ImagesController extends Controller
{
    public function store(ImageRequest $request, ImageUploadHandler $uploader, Image $image)
    {
        $user = $this->user();
        $imagem =new ImageM;
        $size = $request->type == 'avatar' ? 1024 : 1024;
        
        $result = $uploader->save($request->image, str_plural($request->type), $user->id, $size,true,400);
        
        $image->img_original = $result['path'];
        $image->thumb_url = $result['thumb_url'];
        $image->goods_id = $request->goods_id;
        $image->img_url = $result['url'];
        $image->user_id = $this->user()->user_id;

        $imagem->m_img_original = $result['path'];
        $imagem->m_thumb_url = $result['thumb_url'];
        $imagem->m_img_url = $result['url'];
        $imagem->goods_id = $request->goods_id;
        $imagem->user_id = $this->user()->user_id;

        $imagem->save();
        $image->save();
        
        return $this->response->item($image, new ImageTransformer())->setStatusCode(201);
    }
}