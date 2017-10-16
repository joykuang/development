<?php
namespace app\frontend\controller;

use app\common\controller\Backend;

class Index extends Backend
{

    public function index()
    {
        $assign['page_title'] = 'YRS后台控制面板';

        $this->assign($assign);
        return $this->fetch();
    }

}
