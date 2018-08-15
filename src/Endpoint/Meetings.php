<?php

namespace UDX\Zoom\Endpoint;

use UDX\Zoom\Http\Request;

class Meetings extends Request {

    public function __construct($apiKey, $apiSecret) {
        parent::__construct($apiKey, $apiSecret);
    }

    /**
     * List
     *
     * @param $userId
     * @return array|mixed
     */
    public function list(string $userId) {
        return $this->get("users/{$userId}/meetings");
    }

    /**
     * Create
     *
     * @param $userId
     * @param array $data
     * @return array|mixed
     */
    public function create(string $userId, array $data  = null) {
        return $this->post("users/{$userId}/meetings", $data);
    }

    /**
     * Meeting
     *
     * @param $meetingId
     * @return array|mixed
     */
    public function meeting(string $meetingId) {
        return $this->get("meetings/{$meetingId}");
    }

    /**
     * Records
     *
     * @param $meetingId
     * @return array|mixed
     */
    public function records(string $meetingId) {
        return $this->get("meetings/{$meetingId}/recordings");
    }

}