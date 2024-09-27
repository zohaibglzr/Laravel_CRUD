<?php

namespace App;

class Helper
{
    public static function exceptionError($e)
    {
        return response()->json([
            "Error line" => $e->getLine(),
            "Get message" => $e->getMessage(),
            "Get file" => $e->getFile(),
            "Get code" => $e->getCode(),
        ], 500);
    }
}