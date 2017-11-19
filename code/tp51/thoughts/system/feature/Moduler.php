<?php

namespace YRS\Core;

class Moduler //implements ModulerInterface
{
    public function __construct(...$arguments) {
        $this->boot();
    }

    public function boot() {
        // processing code
    }
}
