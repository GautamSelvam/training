<?php

namespace Products\Tracking\Model;

use Magento\Framework\Model\AbstractModel;
use Products\Tracking\Model\ResourceModel\TrackingProduct as TrackingProductResourceModel; 

class TrackingProduct extends AbstractModel
{
    protected function _construct()
    {
        $this->_init(TrackingProductResourceModel::class); 
    }
}