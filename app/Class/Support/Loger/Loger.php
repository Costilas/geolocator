<?php

namespace Class\Support\Loger;

class Loger
{


    public function error(string $message) {
        error_log("[" . date('Y-m-d H:i:s') . "] | Ошибка: $message |\n ________________ \n", 3, $_SERVER['DOCUMENT_ROOT']. "/tmp/error.log");
    }

}
