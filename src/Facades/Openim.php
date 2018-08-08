<?php
namespace Anson\Openim\Facades;
use Illuminate\Support\Facades\Facade;

class Openim extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'openim';
    }
}