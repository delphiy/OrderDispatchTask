<?php
namespace OrderDispatchSystem\interfaces;
/**
 * Interface for service to implement
 */
use OrderDispatchSystem\models\Consignment;

/**
 * Interface ICourier
 * @package DeliveryDispatch\interfaces
 */
interface ICourierService
{
    /**
     * Function to start new batch
     * @return bool
     */
    public function startBatch(): bool;

    /**
     * Function to add new consignment
     * @param $courierID
     * @param $products
     * @return Consignment
     */
    public function addConsignment($courierID, $products): Consignment;

    /**
     * Function to end current batch
     * @return bool
     */
    public function endBatch(): bool;
}