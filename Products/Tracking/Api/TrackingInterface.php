<?php
namespace Products\Tracking\Api;

interface TrackingInterface
{
   /**
     * @param int|null $pageId
     * @return \Products\Tracking\Api\ProductDataInterface[]
     */
    public function getApiData(int $pageId = null);


   /**
     * @param string $sku
     * @param int $quoteId
     * @param int $customerId
     *  @return \Products\Tracking\Api\ProductDataInterface[]
     */
    public function save(string $sku, int $quoteId, int $customerId = null);


  /**
     * @param int $id
     * @return \Products\Tracking\Api\ProductDataInterface[]
     */
    public function getById(int $id);

     /**
     * @param string $id
     * @param string $sku
     * @param int $quoteId
     * @param int $customerId
     * @return \Products\Tracking\Api\ProductDataInterface[]
     */
    public function update(int $id, string $sku, int $quoteId, int $customerId = null);

  /**
     * @param string $id
     * @return \Products\Tracking\Api\ProductDataInterface[]
     */

    public function delete(int $id);
}