<?php


class ConsignmentResponse
{
    /**
     * @param string $data
     * @param int $serverCode
     * @return stdClass
     */
    public static function create(string $data, int $serverCode)
    {
        $response = new stdClass();
        $response->data = $data;
        $response->serverCode = $serverCode;

        return $response;
    }
}