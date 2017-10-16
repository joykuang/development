<?php

namespace YRS;

class StorageException extends Exception
{
    const ERROR_CODE = [
        171 => '路径包含非法字符',
        172 => '路径包含相对路径',
        173 => '文件不存在',
        174 => '文件夹不存在',
    ];
}
