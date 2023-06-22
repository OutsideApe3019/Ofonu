<?php

use App\Helpers\Page;

set_exception_handler(function ($exception) {
    http_response_code(500);
    return Page::view('errors/exception', [
        'exception' => $exception,
    ]);
});
