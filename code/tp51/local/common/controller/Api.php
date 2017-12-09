<?php
namespace app\common\controller;

use think\Request;
use think\Response;
use think\facade\Config;

class Api //extends Controller
{
    protected $request;
        
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    protected function initialize()
    {
        Config::set('app.app_trace', false);
        Config::set('app.default_return_type', 'json');
    }

    public function _empty()
    {
        return [
            'code' => 404,
            'error' => 1,
            'message' => '接口错误：禁止访问'
        ];
    }

    /**
     * 富文本过滤
     * 过滤非微信小程序支持标签与XSS攻击代码，以及空内容标签
     * @param string $richtext
     * @return string
     */
    protected function richtext($richtext = '')
    {
        $conf = \HTMLPurifier_Config::createDefault();
        //TODO: 这三个标签未定义：fieldset, label, legend
        //待修复，说明文档：http://htmlpurifier.org/live/docs/enduser-customize.html
        //自定义元素声明定义说明：https://www.w3.org/TR/2001/REC-xhtml-modularization-20010410/abstract_modules.html#sec_5.2.
        $conf->set('HTML.Allowed', 'a, abbr, b, blockquote, br, code, col[span|width], colgroup[span|width], dd, del, div, dl, dt, em, h1, h2, h3, h4, h5, h6, hr, i, img[alt|src|height|width], ins, li, ol[start|type], p, q, span, strong, sub, sup, table[width], tbody, td[colspan|height|rowspan|width], tfoot, th[colspan|height|rowspan|width], thead, tr, ul, *[style|class]');
        $conf->set('AutoFormat.RemoveEmpty', true);

        $purifier = new \HTMLPurifier($conf);
        return $purifier->purify($richtext);
    }

    protected function json($data)
    {
        return Response::create($data, 'json');
    }

    protected function debug($data)
    {
        var_dump($data);
        exit();
    }
}
