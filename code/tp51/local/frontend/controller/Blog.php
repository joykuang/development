<?php

namespace app\frontend\controller;

use think\Db;
use think\facade\Config;
use think\Controller;

class Blog extends Controller
{

    protected $db;

    protected function initialize()
    {
        Config::set('template.default_filter', '');
    }

    public function index()
    {

        $tablePost = 'posts';
        $tableTaxonomy = 'taxonomies';
        $tableTaxonomyRelation = 'taxonomy_relationship';

        $tablePrefix = Db::getConfig('prefix');

        $cols = Db::getConnection()->getFields($tablePrefix . $tablePost);
        $rows = Db::name($tablePost)
            ->alias('p')
            ->field('p.*, r.taxonomy_id, t.taxonomy_name, t.taxonomy_slug')
            ->join($tablePrefix . $tableTaxonomyRelation . ' r', 'p.post_id = r.post_id', 'left')
            ->join($tablePrefix . $tableTaxonomy . ' t', 't.taxonomy_id = r.taxonomy_id', 'left')
            ->where(function($query) {
                $query
                    ->where('p.post_type', '=', 'post')
                    ->whereOr('p.post_type', '=', 'page');
            })
            ->where('p.post_status', '=', 'published')
            ->select();

        $sql = Db::getLastSql();

        $assign['cols'] = array_merge(array_keys($cols), ['taxonomy_id', 'taxonomy_name', 'taxonomy_slug']);
        $assign['rows'] = $rows;
        $assign['sql'] = $sql;

        $this->assign($assign);
        return $this->fetch();
    }

    public function taxonomy()
    {

        $cols = Db::getConnection()->getFields('jkc_taxonomies');
        $rows = Db::name('taxonomies')->where('taxonomy_parent_id', '=', 0)->select();
        $sql = Db::getLastSql();

        $assign['cols'] = array_keys($cols);
        $assign['rows'] = $rows;
        $assign['sql'] = $sql;

        $this->assign($assign);
        return $this->fetch('index');
    }

}
