<?php

namespace UDX\Zoom\Endpoint;

use UDX\Zoom\Http\Request;

/**
 * Class Reports
 * @package UDX\Zoom\Endpoint
 */
class Reports extends Request {

    /**
     * Reports constructor.
     * @param $accountId
     * @param $clientId
     * @param $clientSecret
     */
    public function __construct( $accountId, $clientId, $clientSecret ) {
        parent::__construct( $accountId, $clientId, $clientSecret );
    }

    /**
     * Meeting Participants
     *
     * @param $meetingUUID
     * @param array $query
     * @return array|mixed
     */
    public function meetingParticipants(string $meetingUUID, array $query = []) {
        return $this->get("report/meetings/{$meetingUUID}/participants", $query);
    }

}