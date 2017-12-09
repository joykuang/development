<?php
namespace app\backend\model;

use think\Model;

class Taxonomies extends Model
{
    protected $pk = 'taxonomy_id';
    protected $name = 'taxonomies';

    public function parent()
    {
    	return $this->BelongsTo('Taxonomies', 'taxonomy_parent_id', 'taxonomy_id');
    }

}
