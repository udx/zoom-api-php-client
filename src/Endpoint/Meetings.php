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
     * @param array $query
     * @return array|mixed
     */
    public function list(string $userId, array $query = []) {
        return $this->get("users/{$userId}/meetings", $query);
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
     * Remove
     *
     * @param $meetingId
     * @return array|mixed
     */
    public function remove(string $meetingId) {
        return $this->delete("meetings/{$meetingId}");
    }

    /**
     * Update
     *
     * @param $meetingId
     * @param array $data
     * @return array|mixed
     */
    public function update(string $meetingId, array $data = []) {
        return $this->patch("meetings/{$meetingId}", $data);
    }

    /**
     * Status
     *
     * @param $meetingId
     * @param array $data
     * @return mixed
     */
    public function status(string $meetingId, array $data = []) {
        return $this->put("meetings/{$meetingId}/status", $data);
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