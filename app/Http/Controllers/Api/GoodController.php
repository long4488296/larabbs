<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use App\Models\Good;
use App\Models\Topic;
use Illuminate\Http\Request;
use App\Http\Requests\Api\GoodRequest;
use App\Transformers\GoodTransformer;
use Illuminate\Support\Facades\DB;
// use App\Serializers\DataArraySerializer;
use Illuminate\Support\Facades\Gate;

class GoodController extends Controller
{
    // public function __construct()
    // {
    //     $this->authorizeResource(Good::class, 'good');
    // }
    //商品
    public function index(GoodRequest $request,Good $good)
    {
        //获取当前用户的商家和旗下商品goods_ids合集 
        $type = $request->type ?$request->type:'all';
        $column =  $request->column ?$request->column:'goods_name';
        $value = $request->value ? $request->value:false;
        

        if($type=='index'){
            $onsales = $good->Curuser($this->user())->Onsale()
            ->like($column,$value)
            ->WithOrder($request->order)
            ->paginate(10);
            $unsales = $good->Curuser($this->user())->Unsale()
            ->like($column,$value)
            ->WithOrder($request->order)
            ->paginate(10);
            return $this->response->array([
            'sele'=>$onsales,
            'unsale'=>$unsales
            ])->setStatusCode(200);
        }else if($type=='sele'){
            $onsales = $good->Curuser($this->user())->Onsale()
            ->like($column,$value)
            ->WithOrder($request->order)
            ->paginate(10);
            return $this->response->paginator($onsales, new GoodTransformer(),['key' => 'data']);
        }else if($type=='unsele'){
            
            $unsales  = $good->Curuser($this->user())->Unsale()
            ->like($column,$value)
            ->WithOrder($request->order)
            ->paginate(10);
            
            return $this->response->paginator($unsales, new GoodTransformer(),['key' => 'data']);
        }else{
            $good  = $good->Curuser($this->user())
            ->like($column,$value)
            ->WithOrder($request->order)
            ->paginate(10);
            return $this->response->paginator($good, new GoodTransformer(),['key' => 'data']);
        }
       
        
        
        //return $this->response->item( $this_user, new UserTransformer());
        // return $this->response->array([
        //   'data'=>'1'
        //   ])->setStatusCode(200);
        //return $this->response->array(['data'=>$data->data,])->setStatusCode(200);
    }

    public function show(GoodRequest $request,Good $good)
    {   
        
        return $this->response->item(
            $good,
            new GoodTransformer(),
            ['key' => 'user'])
            // ->setMeta([
            //     'a'=>1
            // ])
            ->setStatusCode(200);
    }
    
    public function store(GoodRequest $request, Good $good)
    {
        $good->fill($request->all());
        $good->seller_id = $this->user()->seller->id;
        $good->save();
        // return $this->response->array([
        //   'data'=>$this->response
        //   ])->setStatusCode(200);
        return $this->response
        ->item($good, new GoodTransformer())
        ->setStatusCode(201);
    }
    public function update(GoodRequest $request, Good $good)
    {
        //dd($this->authorize);
        $this->user->can('update',$good); 
        //$this->authorize('update', Post::class);
        //$this->authorize('update', $good);
        // $this->user()->givePermissionTo('manage_contents');
        $data = $request->all();
        $data['seller_id'] = $this->user()->seller->id;
        $good->update($data);
        return $this->response->item($good, new GoodTransformer());
    }
    public function sele(GoodRequest $request, Good $good)
    {
        $this->user->can('update',$good); 
        $good->is_on_sale = 1;
        $good->save();
        return $this->response->item($good, new GoodTransformer());
    }
    public function unsele(GoodRequest $request, Good $good)
    {
        $this->user->can('update',$good); 
        $good->is_on_sale = 0;
        $good->save();
        return $this->response->item($good, new GoodTransformer());
    }
    public function delete(GoodRequest $request, Good $good)
    {
        $this->user->can('delete',$good); 
        $good->is_delete = 1;
       // $good->seller_id = $this->user()->seller->id;
        $good->save();
        return $this->response->item($good, new GoodTransformer());
    }
    
}
