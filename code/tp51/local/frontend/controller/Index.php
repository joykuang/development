<?php
namespace app\frontend\controller;

use think\Controller;
//use Composer\Autoload\ClassLoader;

class Index extends Controller
{

    protected function initialize()
    {

    }

    public function index()
    {
        //$loader = new ClassLoader();
        //print_r($loader->getClassMap());

        return $this->fetch();
    }

    public function _empty()
    {

    }

}
