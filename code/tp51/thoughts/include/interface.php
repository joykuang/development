<?php
namespace think;

if (interface_exists('Psr\Log\LoggerInterface')) {
    interface LoggerInterface extends \Psr\Log\LoggerInterface
    {
    }
} else {
    interface LoggerInterface
    {
    }
}
