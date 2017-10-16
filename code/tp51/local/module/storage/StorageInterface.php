<?php

namespace YRS;

interface StorageInterface
{
    protected $client;

     /**
      * 获取存储对象
      * @return object 获取存储对象
      */
    public function client();

    /**
     * 新增文件
     * @param  mixed $_REQUEST $file 表单传来的文件数据
     * @return boolean 是否新增成功
     */
    public function newObject($file);

    /**
     * 新增文件夹
     * @param  string $path 新增文件夹路径，路径名不能包含点等相对路径字符
     * @return boolean 是否新增成功
     */
    public function newFolder($path);

    /**
     * 新增文件夹
     * @param  string $path 枚举文件夹路径，路径名不能包含点等相对路径字符
     * @return boolean 枚举文件(夹)列表
     */
    public function listObject($path);

    /**
     * 新增文件夹
     * @param  string $path 文件夹路径，路径名不能包含点等相对路径字符
     * @param  boolean $isFolder 删除文件夹
     * @return boolean 是否删除成功
     */
    public function deleteObject($path, $isFolder = false);
}
