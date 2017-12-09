<?php
namespace app\backend\controller;

use app\backend\model\Taxonomies;
use app\common\controller\Api;

class Taxonomy extends Api
{
    /**
     * 新建/保存分类; 新建/保存标签
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
    public function save()
    {

        $input = $this->request->post();

        return [ 'error' => 0 ];
    }

    public function taxonomy($taxonomy_id = 0)
    {

        $condition = [
            'taxonomy_id' => $taxonomy_id,
            'taxonomy_type' => 'category'
        ];

        $taxonomy = Taxonomies::with('parent')->where($condition)->find();

        $output = [
            'error' => is_null($taxonomy) ? 1 : 0,
            'result' => $taxonomy,
            'message' => is_null($taxonomy) ? '找不到该分类' : ''
        ];

        return $this->json($output);
    }

    public function taxonomies()
    {

        $condition = [
            'taxonomy_type' => 'category'
        ];

        $taxonomy = Taxonomies::with('parent')->where($condition)->select();

        $output = [
            'error' => is_null($taxonomy) ? 1 : 0,
            'result' => $taxonomy,
            'message' => is_null($taxonomy) ? '找不到该分类' : ''
        ];

        return $this->json($output);
    }

}
