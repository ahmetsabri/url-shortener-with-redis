<?php
namespace App\Actions;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Str;

class GenerateCodeAction {

    public function execute():string
    {
        $code = Str::random(4);

        if (Cache::driver('redis')->has($code)) {
           return $this->execute();
        }

        return $code;
    }
}
