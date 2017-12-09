<?php
namespace app\backend\model;

use think\Model;

class User extends Model
{

    protected $pk = 'user_id';

    public function city()
    {
        return $this->BelongsTo('City');//->setEagerlyType(0);
    }

    public function topic()
    {
    	return $this->hasMany('Topic');
    }

}
