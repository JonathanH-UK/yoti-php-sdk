<?php

declare(strict_types=1);

namespace YotiSandbox;

use Psr\Http\Message\ResponseInterface;
use Yoti\Http\Payload;
use Yoti\Http\RequestBuilder;
use Yoti\Util\Config;
use Yoti\Util\PemFile;
use YotiSandbox\Http\SandboxPathManager;
use YotiSandbox\Http\TokenRequest;
use YotiSandbox\Http\TokenResponse;

class SandboxClient
{
    const TOKEN_REQUEST_ENDPOINT_FORMAT = "/apps/%s/tokens";

    /**
     * @var string
     */
    private $sdkId;

    /**
     * @var \Yoti\Util\PemFile
     */
    private $pemFile;

    /**
     * @var \YotiSandbox\Http\SandboxPathManager
     */
    private $sandboxPathManager;

    /**
     * @var \Yoti\Util\Config
     */
    private $config;

    /**
     * SandboxClient constructor.
     *
     * @param string $sdkId
     *   The SDK identifier generated by Yoti Hub when you create your app.
     * @param string $pem
     *   PEM file path or string
     * @param \YotiSandbox\Http\SandboxPathManager $sandboxPathManager
     *   Sandbox path configuration
     * @param array $options (optional)
     *   SDK configuration options - {@see \Yoti\Util\Config} for available options.
     *
     * @throws \Yoti\Exception\RequestException
     */
    public function __construct(
        string $sdkId,
        string $pem,
        SandboxPathManager $sandboxPathManager,
        array $options = []
    ) {
        $this->sdkId = $sdkId;
        $this->pemFile = Pemfile::resolveFromString($pem);
        $this->sandboxPathManager = $sandboxPathManager;
        $this->config = new Config($options);
    }

    /**
     * @param \YotiSandbox\Http\TokenRequest $tokenRequest
     *
     * @return string
     *
     * @throws Exception\ResponseException
     * @throws \Yoti\Exception\RequestException
     */
    public function getToken(TokenRequest $tokenRequest): string
    {
        // Request endpoint
        $endpoint = sprintf(self::TOKEN_REQUEST_ENDPOINT_FORMAT, $this->sdkId);
        $response = $this->sendRequest($tokenRequest->getPayload(), $endpoint, 'POST');

        return (new TokenResponse($response))->getToken();
    }

    /**
     * @param \Yoti\Http\Payload $payload
     *
     * @param string $endpoint
     * @param string $httpMethod
     *
     * @return array
     *
     * @throws \Yoti\Exception\RequestException
     */
    private function sendRequest(Payload $payload, string $endpoint, string $httpMethod): ResponseInterface
    {
        $requestBuilder = (new RequestBuilder($this->config))
            ->withBaseUrl($this->sandboxPathManager->getTokenApiPath())
            ->withEndpoint($endpoint)
            ->withMethod($httpMethod)
            ->withPemFile($this->pemFile)
            ->withPayload($payload)
            ->withQueryParam('appId', $this->sdkId);

        return $requestBuilder->build()->execute();
    }
}
