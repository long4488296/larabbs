<?php

namespace App\Http\Controllers\Api;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Transformers\OrderTransformer as ThisTransformer;
use App\Http\Requests\Api\OrderRequest;


class OrderController extends Controller
{
    //订单
    public function index(OrderRequest $request,Order $order )
    {
        //获取当前用户的商家和旗下商品goods_ids合集 
        $this->user()->seller->id  = 0;
        $type = $request->type ?$request->type:'all';
        $column =  $request->column ?$request->column:'shipping_name';
        $value = $request->value ? $request->value:false;
        $types = [
            'index'     => 1,
            'all'       => 2,
            'unshipped' => 3,
            'shipped'   => 4,
            'finish'    => 5,
        ];
        
        $typevalue = $types[$type];
        
        $transform = new ThisTransformer();
       
        if($type=='index'){
            $index     = $order->Curuser($this->user())->OrderType(2)->like($column,$value)->WithOrder($request->order)->paginate(10);
            $unshipped = $order->Curuser($this->user())->OrderType(3)->like($column,$value)->WithOrder($request->order)->paginate(10);
            $shipped   = $order->Curuser($this->user())->OrderType(4)->like($column,$value)->WithOrder($request->order)->paginate(10);
            $finish    = $order->Curuser($this->user())->OrderType(5)->like($column,$value)->WithOrder($request->order)->paginate(10);
            return $this->response->array([
                            'alltotal'=>[
                                'all'=>$index->total(),
                                'unshipped'=>$unshipped->total(),
                                'shipped'=>$shipped->total(),
                                'finish'=>$finish->total(),
                            ],
                            'all'=>$index,
                            'unshipped'=>$unshipped,
                            'shipped'=>$shipped,
                            'finish'=>$finish,
                            // 'unshipped'=>$transform->transform($unshipped),
                            // 'shipped'=>$transform->transform($shipped),
                            // 'finish'=>$transform->transform($finish),

                    ])->setStatusCode(200);
        }else{
            $order  = $order->Curuser($this->user())->OrderType($typevalue)
                    ->like($column,$value)
                    ->WithOrder($request->order)
                    ->paginate(10);
                    return $this->response->paginator($order, new ThisTransformer(),['key' => 'data']);
        }
       
        
        
       
        // return $this->response->array([
        //   'data'=>'1'
        //   ])->setStatusCode(200);
        //return $this->response->array(['data'=>$data->data,])->setStatusCode(200);
    }

    public function show(OrderRequest $request,Order $order )
    {   
        
        return $this->response->item(
            $order,
            new ThisTransformer(),
            ['key' => 'user'])
            // ->setMeta([
            //     'a'=>1
            // ])
            ->setStatusCode(200);
    }
    
    public function store(OrderRequest $request, Order $order )
    {
       /* 选择一个随机的方案 */
        //$d1 = mt_srand((double) microtime() * 1000000);

        $d =  date('Ymd') . str_pad(mt_rand(1, 99999), 5, '0', STR_PAD_LEFT);
        $order->fill($request->all());
                          //2019072365541
        $order->order_sn = $d;
        $order->seller_id = $this->user()->seller->id;
        $order->save();
        // return $this->response->array([
        //   'data'=>$this->response
        //   ])->setStatusCode(200);
        return $this->response
        ->item($order, new ThisTransformer())
        ->setStatusCode(201);
    }
    public function update(OrderRequest $request, Order $order )
    {
        //dd($this->authorize);
        $this->user->can('update',$order); 
        //$this->authorize('update', Post::class);
        //$this->authorize('update', $order);
        // $this->user()->givePermissionTo('manage_contents');
        // $data = $request->all();
        // $data['seller_id'] = $this->user()->seller->id;
        // $data['shipping_time']=time();

        // $order->update($data);
        return $this->response->item($order, new ThisTransformer());
    }
    public function shipping(OrderRequest $request, Order $order )
    {
        $this->user->can('update',$order); 
        //$data['seller_id'] = $this->user()->seller->id;
        $data['shipping_id']=$request->shipping_id;
        $data['shipping_name']=$request->shipping_name;
        $data['shipping_time']=time();
        $data['order_status']=5;
        $data['shipping_status']=1;
        $data['invoice_no']=$request->invoice_no;
        $order->update($data);
        return $this->response->item($order, new ThisTransformer());
    }
    public function unsele(OrderRequest $request, Order $order )
    {
        $this->user->can('update',$order); 
        $order->is_on_sale = 0;
        $order->save();
        return $this->response->item($order, new ThisTransformer());
    }
    public function delete(OrderRequest $request, Order $order )
    {
        $this->user->can('delete',$order); 
        $order->is_delete = 1;
       // $order->seller_id = $this->user()->seller->id;
        $order->save();
        return $this->response->item($order, new ThisTransformer());
    }
    

}
