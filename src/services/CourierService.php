<?php
namespace OrderDispatchSystem\services;

use OrderDispatchSystem\interfaces\ICourierService;
use OrderDispatchSystem\models\Consignment;

/**
 * Class CourierService
 * @package OrderDispatchSystem\services
 */
class CourierService implements ICourierService
{
    /**
     * @constant
     * Contain error message for batch start function
     */
    const BATCH_ERROR_MESSAGE = "You need to end current batch before start new one.";

    /**
     * @var
     * Contain list of consignments that will send to courier
     */
    private $consignments;

    /**
     * Empty list of consignments because users for new batch
     * @return bool
     * @throws \Exception
     */
    public function startBatch(): bool {
        if (!empty($this->consignments)) {
            throw new \Exception(self::BATCH_ERROR_MESSAGE);
        }

        $this->consignments = [];
        return true;
    }

    /**
     * Add consignment to consignment, each consignment contains
     * @param $courierID: unique id for courier
     * @param $products: Array of products to add add in consignment
     * @return Consignment
     */
    public function addConsignment($courierID, $products): Consignment {
        //Dependency injection will be used in production code
        $consignment = new Consignment();
        $consignment->products = $products;
        $consignment->courierID = $courierID;
        $this->consignments[] = $consignment;

        return $consignment;
    }

    /**
     * End current batch by sending consignment to courier api
     * @return bool
     * @throws \Exception
     */
    public function endBatch(): bool {
        try {
            foreach ($this->consignments as $consignment) {
                //Send consignment to courier api backend
                //We might format consignment request for each courier, because api request different between couriers
            }
        } catch (\Exception $ex) {
            throw $ex;
        }
        //Everything has been sent ok, empty consignments array
        $this->consignments = [];
        return true;
    }
}