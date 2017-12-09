<?php
namespace app\backend\model;

use think\Model;
use think\model\concern\SoftDelete;

class Posts extends Model
{
    use SoftDelete;
    protected $pk = 'post_id';
    protected $name = 'posts';
    protected $autoWriteTimestamp = 'datetime';
    protected $createTime = 'created_at';
    protected $updateTime = 'updated_at';
    protected $deleteTime = 'deleted_at';

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
