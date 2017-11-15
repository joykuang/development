<?php

namespace YRS\Core;

class ModulerLauncher extends Moduler
{
    protected $default;

    protected $modules;

    public function __construct(...$arguments) {
        list($this->modules, $this->default) = $arguments;
        $this->boot();
    }

    public function boot() {
        $default = $this->default;
        if (is_array($this->modules) && !count($this->modules)) return false;
        foreach ($this->modules as $name => $class) {
            if (!isset($default[$name])) {
                new $class();
            } elseif ($default[$name] instanceof \Closure) {
                if ($default[$name]()) new $class();
            } elseif (is_bool($default[$name])) {
                if ($default[$name]) new $class();
            } else {
                // TODO: do nothing
            }
        }
        // TODO: no return
    }
}
