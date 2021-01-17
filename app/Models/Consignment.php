<?php


class Consignment
{
    protected $table = 'dispatch_period';

    /**
     * @param array $validatedConsignment
     */
    public function create(array $validatedConsignment)
    {
        // TODO: save in the database
    }

    /**
     * @param $validatedConsignment
     * @param string $consignmentId
     */
    public function update($validatedConsignment, string $consignmentId)
    {
        // TODO: update it in the database
    }

    /**
     * @param string $consignmentId
     */
    public function delete(string $consignmentId)
    {
        // TODO: delete it from the database
    }
}