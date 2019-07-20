<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as EloquentModel;

class Model extends EloquentModel
{
    
    public function scopeRecentReplied($query)
    {
        // 当话题有新回复时，我们将编写逻辑来更新话题模型的 reply_count 属性，
        // 此时会自动触发框架对数据模型 updated_at 时间戳的更新
        return $query->orderBy($this->primaryKey, 'desc');
    }

    public function scopeRecent($query)
    {
        // 按照创建时间排序
        return $query->orderBy($this->primaryKey, 'asc');
    }
       /**
     * @param   \Illuminate\Database\Eloquent\Builder $query
     * @param     $column
     * @param     $value
     * @param     $side
     * @param     $isNotLike
     * @param     $isAnd
     * @return    \Illuminate\Database\Eloquent\Builder
     */
    public function scopeLike($query, $column, $value, $side = 'both', $isNotLike = false, $isAnd = true)
    {
        if(!$value){return $query;}
        $operator = $isNotLike ? 'not like' : 'like';

        $escape_like_str = function ($str) {
            $like_escape_char = '!';

            return str_replace([$like_escape_char, '%', '_'], [
                $like_escape_char.$like_escape_char,
                $like_escape_char.'%',
                $like_escape_char.'_',
            ], $str);
        };

        switch ($side) {
            case 'none':
                $value = $escape_like_str($value);
                break;
            case 'before':
            case 'left':
                $value = "%{$escape_like_str($value)}";
                break;
            case 'after':
            case 'right':
                $value = "{$escape_like_str($value)}%";
                break;
            case 'both':
            case 'all':
            default:
                $value = "%{$escape_like_str($value)}%";
                break;
        }

        return $isAnd ? $query->where($column, $operator, $value) : $query->orWhere($column, $operator, $value);
    }

    public function scopeOrLike($query, $column, $value, $side = 'both', $isNotLike = false)
    {
        return $query->like($column, $value, $side, $isNotLike, false);
    }

    public function scopeNotLike($query, $column, $value, $side = 'both', $isAnd = true)
    {
        return $query->like($column, $value, $side, true, $isAnd);
    }

    public function scopeOrNotLike($query, $column, $value, $side = 'both')
    {
        return $query->like($column, $value, $side, true, false);
    }

}
