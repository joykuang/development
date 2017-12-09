<?php
namespace app\frontend\model;

use think\Model;
use think\facade\Config;

class Posts extends Model
{

    protected $pk = 'post_id';

    public function taxonomies()
    {
        return $this->hasMany('Relations', 'post_id', 'post_id');
    }

    public function parent()
    {
    	return $this->BelongsTo('Posts', 'parent_id', 'post_id');
    }

    public function user()
    {
    	return $this->BelongsTo('User');
    }

}
