<?php


class ConsignmentController
{
    /**
     * @var Consignment
     */
    private $consignment;

    /**
     * ConsignmentController constructor.
     * @param Consignment $consignment
     */
    public function __construct(Consignment $consignment)
    {
        $this->consignment = $consignment;
    }

    /**
     * @param Validator $validatedConsignment
     * @return stdClass
     */
    protected function saveConsignmentDetails(Validator $validatedConsignment)
    {
        if (is_array($validatedConsignment)) {
            $this->consignment->create($validatedConsignment);

            return ConsignmentResponse::create(
                'ConsignmentController details have been saved successfully',
                200
            );
        } else {
            return ConsignmentResponse::create(
                'Unable to save consignment details. Check details again',
                404
            );
        }
    }

    /**
     * @param null $consignmentNumber
     * @return stdClass
     */
    public function fetchConsignmentDetails($consignmentNumber = null)
    {
        if ($consignmentNumber === null) {
            return ConsignmentResponse::create(
                'Fetch all consignment details for current dispatch period',
                200
            );
        }

        if (!$consignmentNumber) {
            return ConsignmentResponse::create('Unable to find consignment details', 404);
        }

        return ConsignmentResponse::create(
            'Fetch consignment details using this unique consignment number',
            200
        );
    }

    /**
     * @param Validator $validateConsignment
     * @param string $consignmentId
     * @return stdClass
     */
    protected function updateConsignmentDetails(Validator $validateConsignment, string $consignmentId)
    {
        if (is_array($validateConsignment)) {
            $consignment = $this->consignment->update($validateConsignment, $consignmentId);

            if ($consignment) {
                return ConsignmentResponse::create(
                    'ConsignmentController details update completed successfully',
                    200
                );
            }
        }

        return ConsignmentResponse::create('Unable to find consignment details', 404);
    }

    /**
     * @param int $consignmentId
     * @return stdClass
     */
    protected function deleteConsignment(int $consignmentId)
    {
        $consignment = $this->consignment->delete($consignmentId);

        if ($consignment) {
            return ConsignmentResponse::create(
                'ConsignmentController details have been removed successfully',
                200
            );
        }

        return ConsignmentResponse::create('Unable to delete consignment details', 404);
    }
}