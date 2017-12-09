<?php

namespace app\frontend\controller;

use think\Db;
use think\facade\Config;
use app\common\controller\Backend;

class Blog extends Backend
{

    protected $db;

    public function initialize()
    {
        Config::set('template.default_filter', '');
    }

    protected function json()
    {
        Config::set('app.default_return_type', 'json');
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
            //->where('p.post_status', '=', 'published')
            ->select();

        $sql = Db::getLastSql();
        $cols = array_merge(array_keys($cols), ['taxonomy_id', 'taxonomy_name', 'taxonomy_slug']);

        $assign['cols'] = $cols;
        $assign['rows'] = $rows;
        $assign['sql'] = $sql;

        if ($this->request->get('format') === 'json') {
            function_exists('production') && production();
            $this->json();
            return [ 'status' => 1, 'response' => $rows ];
        }

        $this->assign($assign);
        return $this->fetch();
    }

    public function taxonomy()
    {

        $cols = Db::getConnection()->getFields('jkc_taxonomies');
        $rows = Db::name('taxonomies')->where('taxonomy_parent_id', '=', 0)->select();
        $sql = Db::getLastSql();

        $cols = array_keys($cols);

        $assign['cols'] = $cols;
        $assign['rows'] = $rows;
        $assign['sql'] = $sql;

        if ($this->request->get('format') === 'json') {
            function_exists('production') && production();
            $this->json();
            return [ 'status' => 1, 'response' => $rows ];
        }

        $this->assign($assign);
        return $this->fetch('index');
    }

    public function doctrine()
    {
        //$manager = entity();
        //$product = $manager->find(getClass('Record'), 1);

        //var_dump($product->getContent());


        $faker = \Faker\Factory::create('zh_CN');

        $data = [
            $faker->name,
            $faker->address,
            $faker->text,
            $faker->company,
            $faker->jobTitle,
            $faker->creditCardNumber,
            $faker->phoneNumber,
            $faker->file(__DIR__)
        ];

        echo implode('<br>', $data);
    }

    public function city()
    {
        $this->json();

        //$out = \app\frontend\model\Topic::with('user.city')->select();
        //dump($out);

        $with = [
            'taxonomies' => [
                'taxonomies.parent'
            ],
            'parent' => [],
            'user' => [
                'city',
                'topic'
            ]
        ];

        $out2 = \app\frontend\model\Posts::with($with)->select();
        //dump($out2);
        //
        return $out2;

        /*
        $city = \app\frontend\model\City::getByCityName('江门市');
        $topic = [];
        foreach ($city->user as $user) {
            $topic[$user->user_id] = $user->topic()->order('topic_id desc')->limit(100)->select();
        }

        dump($topic);
        */

        //return [
        //    'error' => 0,
        //    'topics' => $topics
        //];
    }

    /**
     * 编辑界面
     * @param  integer $post_id 博文 ID
     * @return \think\View
     */
    public function edit($post_id = 0) {
        Config::set([ 'taglib_begin' => '<', 'taglib_end' => '>' ], 'template');
        return $this->fetch();

    }

    /**
     * 博文保存
     * @method POST
     * @request integer post_id 博文 ID
     * @request integer parent_id 父博文 ID
     * @request integer user_id 用户 ID
     * @request datetime created_at 创建时间
     * @request datetime updated_at 更新时间
     * @request varchar(255) post_slug 博文自定义网址
     * @request varchar(255) post_type 博文类型, 默认为 post, 可选值: post, page
     * @request varchar(255) post_title 博文标题
     * @request text post_content 博文内容
     * @request text post_excerpt 博文梗概/简介/说明
     * @request varchar(255) post_password 访问密码, 默认为 disabled
     * @request varchar(255) post_status 博文状态, 默认为 published, 可选值: published, auto-draft, draft, private, revision
     * @return json
     */
    public function save() {
        $this->json();
        return [ 'error' => 0 ];
    }

}
