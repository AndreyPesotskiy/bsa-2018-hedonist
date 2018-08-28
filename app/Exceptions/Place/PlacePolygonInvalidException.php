<?php

namespace Hedonist\Exceptions\Place;

use Hedonist\Exceptions\DomainException;

class PlacePolygonInvalidException extends DomainException
{
    public function __construct(string $message, $code = 400, \Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}