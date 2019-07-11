<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'yj_category';
    protected $primaryKey = 'cat_id';
    protected $fillable = [
        'cat_id','cat_name','keywords','cat_desc','parent_id','sort_order','template_file','measure_unit','show_in_nav','style','is_show','app_index_show','grade','filter_attr','cat_img'
    ];
}
