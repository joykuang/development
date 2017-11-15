<?php

namespace YRS;

class Storage
{
    protected $storage;

    public function __construct(StorageInterface $storage)
    {
        $this->storage = $storage->client();
    }
}
