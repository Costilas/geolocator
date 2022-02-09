<?php

namespace Class\Support\Error;

use Class\Support\Loger\Loger;

class ErrorHandler
{
    public function __construct(
        private Loger $loger
    )
    {}

    public function handle(\Exception $exception): void {
        $this->loger->error($exception->getMessage());
    }



}
