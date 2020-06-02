<?php


namespace KupiVipApi\Exception;


use GuzzleHttp\Command\CommandInterface;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use Throwable;

class BadRequestException extends \Exception
{
    /* @var RequestInterface*/
    private $request;

    /* @var ResponseInterface*/
    private $response;

    /**
     * RedirectException constructor.
     * @param string $message
     * @param CommandInterface|null $command
     * @param Throwable|null $previous
     * @param RequestInterface|null $request
     * @param ResponseInterface|null $response
     */
    public function __construct($message = "", CommandInterface $command = null, Throwable $previous = null, RequestInterface $request = null, ResponseInterface $response = null)
    {
        /* make correct api work instead of kupivip */
        if($response instanceof ResponseInterface){
            $body = $response->getBody();

            $code = $response->getStatusCode();
            $message = "Bad request: " . $body;
        } else {
            $code = $response->getStatusCode();
        }

        $this->request = $request;
        $this->response = $response;
        
        parent::__construct($message, $code ?? 0, $previous);
    }

    /**
     * @return ResponseInterface
     */
    public function getResponse(): ResponseInterface
    {
        return $this->response;
    }

    /**
     * @return RequestInterface
     */
    public function getRequest(): RequestInterface
    {
        return $this->request;
    }

}