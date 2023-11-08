<?php
namespace Products\Tracking\Model\ResourceModel\TrackingProduct;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{
    

    protected function _construct()
{
    $this->_init(
        \Products\Tracking\Model\TrackingProduct::class,
        \Products\Tracking\Model\ResourceModel\TrackingProduct::class
    );
}

}