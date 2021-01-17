<?php


class GenerateExcelSheet
{
    private $consignment;

    /**
     * GenerateExcelSheet constructor.
     * @param ConsignmentController $consignment
     */
    public function __construct(ConsignmentController $consignment)
    {
        $this->consignment = $consignment;
    }

    /**
     * @return stdClass
     */
    public function generateExcelSheet()
    {
        $data = $this->consignment->fetchConsignmentDetails();

        if ($data) {
            return JsonResponse::create([
                'message' => 'Excel sheet was downloaded successfully'
            ], 200);
        }

        return JsonResponse::create([
            'message' => 'Unable to download excel sheet'
        ], 400);
    }
}