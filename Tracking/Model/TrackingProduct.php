<?php
declare(strict_types=1);
namespace Products\Tracking\Model;

use Magento\Framework\Model\AbstractModel;
use Products\Tracking\Api\Data\ProductDataInterface;


class TrackingProduct extends AbstractModel implements ProductDataInterface
{

    
    protected function _construct()
    {
        $this->_init(\Products\Tracking\Model\ResourceModel\TrackingProduct::class);
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->getData('id');
    }

    /**
     * @param int $id
     * @return $this
     */

    public function setId($id)
    {
         $this->setData('id', $id);
         return $this;
    }
    /**
     * @return string
     */

    public function getSku()
    {
        return $this->getData('sku');
    }

    /**
     * @param string $sku
     * @return $this
     */

    public function setSku($sku)
    {
         $this->setData('sku', $sku);
         return $this;
    }


    /**
     * @return int
     */

    public function getCustomerId()
    {
        return $this->getData('customer_id');
    }

    /**
     * @param string $customerid
     * @return $this
     */

    public function setCustomerId($customerid)
    {
         $this->setData('customer_id', $customerid);
         return $this;
    }

    /**
     * @return int
     */

    public function getQuoteId()
    {
        return $this->getData('quote_id');
    }

    /**
     * @param string $quoteid
     * @return $this
     */

    public function setQuoteId($quoteid)
    {
         $this->setData('quote_id', $quoteid);
         return $this;
    }
    /**
     * @return string
     */

     public function getCreated()
     {
         return $this->getData('created');
     }
 
     /**
      * @param string $created
      * @return $this
      */
 
     public function setCreated($created)
     {
         return $this->setData('created', $created);
     }
}