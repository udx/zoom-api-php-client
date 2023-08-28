<?php

namespace UDX\Zoom\Http;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Psr7\Response;

class Request {

    /**
     * @var
     */
    protected $accountId;

    /**
     * @var
     */
    protected $clientId;

    /**
     * @var
     */
    protected $clientSecret;

    /**
     * @var Client
     */
    protected $client;

    /**
     * @var string
     */
    public $apiPoint = 'https://api.zoom.us/v2/';

    /**
     * @var string
     */
    public $oauthPoint = 'https://zoom.us/oauth/token?grant_type=account_credentials&account_id=';
    

    /**
     * Request constructor.
     * @param $accountId
     * @param $clientId
     * @param $clientSecret
     */
    public function __construct( $accountId, $clientId, $clientSecret ) {
        $this->accountId = $accountId;

        $this->clientId = $clientId;

        $this->clientSecret = $clientSecret;

        $this->client = new Client();
    }

    /**
     * Headers
     *
     * @return array
     */
    protected function headers(): array {
        return [
            'Authorization' => 'Bearer ' . $this->generateOAuthToken(),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ];
    }

    /**
     * Generate OAuth token
     *
     * @return string
     */
    protected function generateOAuthToken() {
        try {
            $response = $this->client->request('POST', $this->oauthPoint . $this->accountId, [
                'auth' => [ $this->clientId, $this->clientSecret ]
            ]);
            $result = $this->result($response);
            return isset($result['access_token']) ? $result['access_token'] : '';

        } catch (ClientException $e) {
            return (array)json_decode($e->getResponse()->getBody()->getContents());
        }
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
    protected function delete($method, $fields = []) {
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