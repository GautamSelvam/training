<?php

namespace Products\Tracking\Api\Data;

interface ProductDataInterface
{
    /**
     * @return int
     */
    public function getId();

    /**
     * @param int $id
     * @return $this
     */
    public function setId($id);

    /**
     * @return string|null
     */
    public function getSku();

    /**
     * @param string $sku
     * @return $this
     */
    public function setSku($sku);

    /**
     * @return int|null
     */
    public function getCustomerId();

    /**
     * @param int $customerId
     * @return $this
     */
    public function setCustomerId($customerId);

    /**
     * @return int|null
     */
    public function getQuoteId();

    /**
     * @param int $quoteId
     * @return $this
     */
    public function setQuoteId($quoteId);

    /**
     * @return string|null
     */
    public function getCreated();

    /**
     * @param string $created
     * @return $this
     */
    public function setCreated($created);
}
