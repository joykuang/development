<?php
namespace YRS;

class Uuid
{
    protected $prefix;

    public function __construct(string $prefix = '') {
        $this->prefix($prefix);
    }

    public function prefix(string $prefix = '') {
        $this->prefix = $prefix;
        return $this;
    }

    public function make() {
        $str = sha1(uniqid(time().mt_rand(), true));
        $uuid  = substr($str,0,8) . '-';
        $uuid .= substr($str,8,4) . '-';
        $uuid .= substr($str,12,4) . '-';
        $uuid .= substr($str,16,4) . '-';
        $uuid .= substr($str,20,12);
        return $this->prefix . $uuid;
    }
}
