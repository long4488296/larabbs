<?php

namespace App\Exceptions\Api;

use Exception;

class CommonException extends Exception
{
    const HTTP_OK = 200;
    const HTTP_ERROR = 500;

    protected $data;

    public function __construct($message, int $code = self::HTTP_OK, array $data = [])
    {
        $this->data = $data;
        parent::__construct($message, $code);
    }

    public function render()
    {
        $content = [
            'message'   => $this->message,
            'code'      => $this->code,
            'data'      => $this->data ?? [],
            'timestamp' => time()
        ];

        $status = $this->code;

        return response()->json($content, $this->code);
    }
}