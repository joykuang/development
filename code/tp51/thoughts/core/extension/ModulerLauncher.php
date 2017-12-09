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
            if (!class_exists($class) || !isset($default[$name])) continue;

            $reflection = new \ReflectionClass($class);
            $case0 = $default[$name] instanceof \Closure && $default[$name]();
            $case1 = is_bool($default[$name]) && $default[$name];

            if ($case0 || $case1) $reflection->newInstance();
        }
        // TODO: no return
    }
}
