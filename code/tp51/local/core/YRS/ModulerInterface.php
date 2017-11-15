<?php

namespace YRS\Core;

interface ModulerInterface
{
    /**
     * 创建实例
     * @param array $inherit 模块设置
     */
    public function __construct(...$arguments);

    /**
     * 实例检测
     * @return void
     */
    //protected function checkBeforeBoot();

    /**
     * 模块实例
     * @return void
     */
    public function boot();
}
