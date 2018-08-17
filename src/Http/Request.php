<?php

namespace UDX\Zoom\Http;

use Firebase\JWT\JWT;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Psr7\Response;

class Request {

    /**
     * @var
     */
    protected $apiKey;

    /**
     * @var
     */
    protected $apiSecret;

    /**
     * @var Client
     */
    protected $client;

    /**
     * @var string
     */
    public $apiPoint = 'https://api.zoom.us/v2/';

    /**
     * Request constructor.
     * @param $apiKey
     * @param $apiSecret
     */
    public function __construct( $apiKey, $apiSecret ) {
        $this->apiKey = $apiKey;

        $this->apiSecret = $apiSecret;

        $this->client = new Client();
    }

    /**
     * Headers
     *
     * @return array
     */
    protected function headers(): array {
        return [
            'Authorization' => 'Bearer ' . $this->generateJWT(),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ];
    }

    /**
     * Generate J W T
     *
     * @return string
     */
    protected function generateJWT() {
        $token = [
            'iss' => $this->apiKey,
            'exp' => time() + 60,
        ];

        return JWT::encode($token, $this->apiSecret);
    }


    /**
     * Get
     *
     * @param $method
     * @param array $fields
     * @return array|mixed
     */
    protected function get($method, $fields = []) {
        try {
            $response = $this->client->request('GET', $this->apiPoint . $method, [
                'query' => $fields,
                'headers' => $this->headers(),
            ]);

            return $this->result($response);

        } catch (ClientException $e) {

            return (array)json_decode($e->getResponse()->getBody()->getContents());
        }
    }

    /**
     * Post
     *
     * @param $method
     * @param $fields
     * @return array|mixed
     */
    protected function post($method, $fields) {
        $body = \json_encode($fields, JSON_PRETTY_PRINT);

        try {
            $response = $this->client->request('POST', $this->apiPoint . $method,
                ['body' => $body, 'headers' => $this->headers()]);

            return $this->result($response);

        } catch (ClientException $e) {

            return (array)json_decode($e->getResponse()->getBody()->getContents());
        }
    }

    /**
     * Patch
     *
     * @param $method
     * @param $fields
     * @return array|mixed
     */
    protected function patch($method, $fields) {
        $body = \json_encode($fields, JSON_PRETTY_PRINT);

        try {
            $response = $this->client->request('PATCH', $this->apiPoint . $method,
                ['body' => $body, 'headers' => $this->headers()]);

            return $this->result($response);

        } catch (ClientException $e) {

            return (array)json_decode($e->getResponse()->getBody()->getContents());
        }
    }

    /**
     * Put
     *
     * @param $method
     * @param $fields
     * @return array|mixed
     */
    protected function put($method, $fields) {
        $body = \json_encode($fields, JSON_PRETTY_PRINT);

        try {
            $response = $this->client->request('PUT', $this->apiPoint . $method,
                ['body' => $body, 'headers' => $this->headers()]);

            return $this->result($response);

        } catch (ClientException $e) {

            return (array)json_decode($e->getResponse()->getBody()->getContents());
        }
    }

    /**
     * Delete
     *
     * @param $method
     * @param $fields
     * @return array|mixed
     */
    protected function delete($method, $fields) {
        $body = \json_encode($fields, JSON_PRETTY_PRINT);

        try {
            $response = $this->client->request('DELETE', $this->apiPoint . $method,
                ['body' => $body, 'headers' => $this->headers()]);

            return $this->result($response);

        } catch (ClientException $e) {

            return (array)json_decode($e->getResponse()->getBody()->getContents());
        }
    }

    /**
     * Result
     *
     * @param Response $response
     * @return mixed
     */
    protected function result(Response $response) {
        $result = json_decode((string)$response->getBody(), true);

        $result['code'] = $response->getStatusCode();

        return $result;
    }
}