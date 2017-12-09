<?php
namespace app\frontend\model;

use think\Model;

class Relations extends Model
{
    protected $pk = 'rid';
    protected $name = 'taxonomy_relationship';

    public function taxonomies()
    {
    	return $this->BelongsTo('Taxonomies', 'taxonomy_id', 'taxonomy_id');
    }

}
