<?php

declare(strict_types=1);
namespace Products\Tracking\Api;

use Products\Tracking\Api\Data\ProductDataInterface;

interface TrackingInterface
{
 

    /**
     * Save & Update product data .
     *
     * @param \Products\Tracking\Api\Data\ProductDataInterface $product
     *  @return ProductDataInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function save(ProductDataInterface $product);

    /**
     * Get API data
     *
     * @param int|null $start
     * @param int|null $end
     * @return \Products\Tracking\Api\Data\ProductDataInterface[]
     */
    public function getApiData(int $start = null,int $end = null);


    /**
     * Update product data.
     *
     * @param \Products\Tracking\Api\Data\ProductDataInterface $product
     *  @return ProductDataInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function update(ProductDataInterface $product);

    /**
     * Get data by ID
     *
     * @param int $id
     * @return \Products\Tracking\Api\Data\ProductDataInterface[]
     * @throws LocalizedException
     */
    public function getById(int $id);

    /**
     * Delete data
     *
     * @param int $id
     * @return \Products\Tracking\Api\Data\ProductDataInterface[]
     * @throws LocalizedException
     */
    public function delete(int $id);
}
