<?php
namespace app\frontend\model;

use think\Model;

class City extends Model
{

    protected $pk = 'city_id';

    public function user()
    {
    	return $this->hasMany('User');
    }

    public function topic()
    {
    	return $this->hasManyThrough('Topic', 'User');
    }

}
