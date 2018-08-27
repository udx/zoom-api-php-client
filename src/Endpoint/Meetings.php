<?php

namespace UDX\Zoom\Endpoint;

use UDX\Zoom\Http\Request;

/**
 * Class Meetings
 * @package UDX\Zoom\Endpoint
 */
class Meetings extends Request {

    /**
     * Meetings constructor.
     * @param $apiKey
     * @param $apiSecret
     */
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
     * List Registrants
     *
     * @param $meetingId
     * @param array $query
     * @return array|mixed
     */
    public function listRegistrants(string $meetingId, array $query = []) {
        return $this->get("meetings/{$meetingId}/registrants", $query);
    }

    /**
     * Add Registrant
     *
     * @param $meetingId
     * @param array $data
     * @return array|mixed
     */
    public function addRegistrant(string $meetingId, $data = []) {
        return $this->post("meetings/{$meetingId}/registrants", $data);
    }

    /**
     * Update Registrant Status
     *
     * @param $meetingId
     * @param array $data
     * @return array|mixed
     */
    public function updateRegistrantStatus(string $meetingId, array $data = []) {
        return $this->put("meetings/{$meetingId}/registrants/status", $data);
    }

    /**
     * Past Meeting
     *
     * @param $meetingUUID
     * @return array|mixed
     */
    public function pastMeeting(string $meetingUUID) {
        return $this->get("past_meetings/{$meetingUUID}");
    }

    /**
     * Past Meeting Participants
     *
     * @param $meetingUUID
     * @param array $query
     * @return array|mixed
     */
    public function pastMeetingParticipants(string $meetingUUID, array $query = []) {
        return $this->get("past_meetings/{$meetingUUID}/participants", $query);
    }

}