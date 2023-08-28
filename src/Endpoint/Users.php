<?php

namespace UDX\Zoom\Endpoint;

use UDX\Zoom\Http\Request;

/**
 * Class Users
 * @package UDX\Zoom\Endpoint
 */
class Users extends Request {

    /**
     * Users constructor.
     * @param $accountId
     * @param $clientId
     * @param $clientSecret
     */
    public function __construct( $accountId, $clientId, $clientSecret ) {
        parent::__construct( $accountId, $clientId, $clientSecret );
    }

    /**
     * List
     *
     * @param array $query
     * @return array|mixed
     */
    public function list( array $query = [] ) {
        return $this->get( "users", $query );
    }

    /**
     * Create
     *
     * @param array|null $data
     * @return array|mixed
     */
    public function create( array $data  = null ) {
        return $this->post( "users", $data );
    }

    /**
     * Retrieve
     *
     * @param $userID
     * @param array $query
     * @return array|mixed
     */
    public function retrieve( string $userID, array $query = [] ) {
        return $this->get( "users/{$userID}", $query );
    }

    /**
     * Remove
     *
     * @param $userId
     * @return array|mixed
     */
    public function remove( string $userId ) {
        return $this->delete( "users/{$userId}" );
    }

    /**
     * Update
     *
     * @param $userId
     * @param array $data
     * @return array|mixed
     */
    public function update( string $userId, array $data = [] ) {
        return $this->patch( "users/{$userId}", $data );
    }
}