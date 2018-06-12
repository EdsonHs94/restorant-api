<?php

namespace App\Http\Response;

use Zend\Diactoros\Response as DiactorosResponse;

class Response extends DiactorosResponse
{
    private $codeApp;
    private $codeHttp;
    private $data;
    private $message;

    public function __construct()
    {
        $this->codeApp  = 1000;
        $this->codeHttp = 200;
        parent::__construct();
    }
    /**
     * @param int $codeApp
     * @return $this
     * @throws \Exception
     */
    public function setAppCode(int $codeApp = 0)
    {
        if (empty($codeApp)) {
            throw new \Exception();
        }
        $this->codeApp = $codeApp;
        return $this;
    }

    /**
     * @param int $codeHttp
     * @return $this
     * @throws \Exception
     */
    public function setHttpCode(int $codeHttp = 0)
    {
        if (empty($codeHttp)) {
            throw new \Exception();
        }
        $this->codeHttp = $codeHttp;
        return $this;
    }

    /**
     * @param $data
     * @return $this
     * @throws \Exception
     */
    public function setData($data)
    {
        if (!is_array($data) && !is_object($data)) {
            throw new \Exception();
        }
        $this->data = $data;
        return $this;
    }

    /**
     * @param string $message
     * @return $this
     */
    public function setMessage(string $message)
    {
        $this->message = $message;
        return $this;
    }

    /**
     * @return Response
     */
    public function response()
    {
        $body = [
            'code'    => $this->codeApp,
            'message' => $this->message,
            'data'    => $this->data
        ];

        $response = $this->withStatus($this->codeHttp)
            ->withHeader('pragma', 'no-cache')
            ->withHeader('cache-control', 'no-store')
            ->withHeader('content-type', 'application/json; charset=UTF-8');

        $response->getBody()->write(json_encode($body));

        return $response;
    }
}
