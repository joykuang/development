<?php
namespace app\backend\controller;

use app\backend\model\Posts;
use app\backend\model\Relations;
use app\common\controller\Api;

class Post extends Api
{

    public function city()
    {
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
        $out2 = Posts::with($with)->select();
        return $out2;
    }

    public function delete() {
        $post = Posts::destroy(8);
        $output = [ 'error' => 0, 'result' => $post ];
        return $this->json($output);
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

        $input = $this->request->post();

        // TODO: 数据检查

        $post = new Posts();
        $post->post_title = $input['title'];
        //$post->post_excerpt = $this->richtext($input['excerpt']);
        //$post->post_content = $this->richtext($input['content']);

        $post->post_excerpt = $input['excerpt'];
        $post->post_content = $input['content'];

        $post->post_status = $input['status'];
        $post->post_password = ($input['status'] === 'published' && trim($input['password']) != '') ? $input['password'] : 'disabled';
        $post->post_slug = trim($input['slug']);

        $post->user_id = rand(100, 999) % 4 + 1;
        $post->parent_id = 0;
        $post->post_type = 'post';

        $post->save();

        if (!$post->post_id) return $this->json([ 'error' => 1, 'message' => '新增博文出错，请刷新重试' ]);

        $relation = new Relations();
        $relation->post_id = $post->post_id;
        $relation->taxonomy_id = (int) $input['taxonomy'];
        $relation->save();

        $output = [ 'error' => 0, 'result' => $this->view($post->post_id, true) ];
        return $this->json($output);
    }

    public function view($post_id = 0, $raw = false) {

        $with = [
            'taxonomies' => [
                'taxonomies.parent'
            ],
            'parent' => [],
            'user' => []
        ];

        $post = Posts::with($with)->where(['post_id' => $post_id])->find();

        $output = [
            'error' => is_null($post) ? 1 : 0,
            'result' => $post,
            'message' => is_null($post) ? '找不到该博文' : ''
        ];

        return $raw ? $output : $this->json($output);
    }



}
