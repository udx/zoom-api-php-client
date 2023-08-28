<?php

namespace UDX\Zoom\Endpoint;

use UDX\Zoom\Http\Request;

/**
 * Class Recordings
 * @package UDX\Zoom\Endpoint
 */
class Recordings extends Request {

    /**
     * Recordings constructor.
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
     * @param $userId
     * @param array $query
     * @return array|mixed
     */
    public function listAll(string $userId, array $query = []) {
        return $this->get("users/{$userId}/recordings", $query);
    }

    /**
     * Meeting
     *
     * @param $meetingId
     * @return array|mixed
     */
    public function meeting(string $meetingId) {
        return $this->get("meetings/{$meetingId}/recordings");
    }

    /**
     * Remove All
     *
     * @param $meetingId
     * @param array $query
     * @return array|mixed
     */
    public function removeAll(string $meetingId, array $query = [ 'action' => 'trash' ]) {
        return $this->delete("meetings/{$meetingId}/recordings", $query);
    }

    /**
     * Remove
     *
     * @param $meetingId
     * @param $recordingId
     * @param array $query
     * @return array|mixed
     */
    public function remove(string $meetingId, string $recordingId, array $query = [ 'action' => 'trash' ]) {
        return $this->delete("meetings/{$meetingId}/recordings/{$recordingId}", $query);
    }

    /**
     * Recover All
     *
     * @param $meetingId
     * @param array $data
     * @return array|mixed
     */
    public function recoverAll(string $meetingId, array $data = [ 'action' => 'recover' ]) {
        return $this->put("meetings/{$meetingId}/recordings/status", $data);
    }

    /**
     * Recover
     *
     * @param $meetingId
     * @param $recordingId
     * @param array $data
     * @return array|mixed
     */
    public function recover(string $meetingId, string $recordingId, array $data = [ 'action' => 'recover' ]) {
        return $this->put("meetings/{$meetingId}/recordings/{$recordingId}/status", $data);
    }

}