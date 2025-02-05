<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'category';
    protected $primaryKey = 'cat_id';
    protected $fillable = [
        'cat_id','cat_name','keywords','cat_desc','parent_id','sort_order','template_file','measure_unit','show_in_nav','style','is_show','app_index_show','grade','filter_attr','cat_img'
    ];
    /**
     * 模型的连接名称
     *
     * @var string
     */
    // protected $connection = 'shopsql';
    //不能批量赋值
    protected $guarded = ['cat_id', 'cat_name']; //这些字段禁止维护
	public $parentKey = 'parent_id'; //必要字段                MySQL需加索引
	public $orderKey = 'sort_order'; //无需此字段请设置NULL   MySQL需加索引
	public $pathKey = null; //无需此字段请设置NULL     MySQL需加索引
    public $levelKey = null; //无需此字段请设置NULL   MySQL需加索引
    protected $visible = ['cat_id','cat_name','parent_id','sort_order','childrens'];
    protected $hidden = [ 'order_sn'];
   
    public function children(){
        return $this->hasMany(get_class($this),$this->parentKey);
    }
    public function childrens(){
        return $this->children()->with('children');
    }
    public function scopeTopLevel($query){
        $query->where(['parent_id'=>0,'is_show'=>1])
              ->orderBy($this->orderKey, 'desc');
        return $query->with(['childrens']);
    }
}
