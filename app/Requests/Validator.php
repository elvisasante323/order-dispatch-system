<?php


class Validator
{
    /**
     * @param array $requestData
     * @return stdClass|array
     */
    public function __invoke(array $requestData)
    {
        $errors    = [];
        $validData = [];

        if ($requestData['REQUEST_METHOD'] === 'POST') {
            if (empty($_POST['customerName'])) {
                $errors['customerNameReq'] = 'Name is required';
            } else {
                $customerName = $this->valid($_POST['customerName']);

                if (!preg_match("/^[a-zA-Z-' ]*$/", $customerName)) {
                    $errors['customerNameOnlyLetter'] = 'Only letters and white space allowed';
                }

                $validData['customerName'] = $customerName;
            }

            if (empty($_POST['customerAddress'])) {
                $errors['customerAddressReq'] = 'Customer address is required';
            } else {
                $validData['customerAddress'] = $this->valid($_POST['customerAddress']);
            }

            if (empty($_POST["consignmentNumber"])) {
                $errors['consignmentNumberReq'] = 'Consignment number is required';
            } else {
                $consignmentNumber = $this->valid($_POST['consignmentNumber']);
                $validData['consignmentNumber'] = $consignmentNumber;

                $errors['consignmentNumberOnlyNum'] = 'Only numbers allowed';
            }
        }

        if (!empty($errors)) {
            return JsonResponse::create($errors, 403);
        } else {
            return $validData;
        }
    }

    /**
     * @param $data
     * @return string
     */
    public function valid($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);

        return $data;
    }
}