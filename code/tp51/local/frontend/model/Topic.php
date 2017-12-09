<?php
namespace app\frontend\model;

use think\Model;

class Topic extends Model
{

    protected $pk = 'topic_id';

    public function user()
    {
        return $this->BelongsTo('User');//->setEagerlyType(0);
    }

    public function city()
    {
    	return $this->hasManyThrough('City', 'User');
    }

}
