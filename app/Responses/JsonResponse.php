<?php


class JsonResponse
{
    /**
     * @param array $data
     * @param int $serverCode
     * @return stdClass
     */
    public static function create(array $data, int $serverCode)
    {
        $response = new stdClass();
        $response->data = $data;
        $response->serverCode = $serverCode;

        return $response;
    }
}