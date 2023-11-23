<?php

namespace Products\Tracking\Consumer;

use Magento\Framework\Serialize\SerializerInterface;
use Products\Tracking\Model\TrackingProductFactory;

class TrackingCart
{
    protected $serializer;

    protected $model;

    /**
     * @param SerializerInterface $serializer
     * @param TrackingProductFactory $model
     */

    public function __construct(
        SerializerInterface $serializer,
        TrackingProductFactory $model
    ) {
        $this->serializer = $serializer;
        $this->model = $model;
    }

    /**
     * @param $data
     * @return void
     */

    public function consume($data)
    {
        $model = $this->model->create();
        $unserialarr = $this->serializer->unserialize($data);

        try {
            $model->addData($unserialarr)->save();
        } catch (\Exception $e) {
            throw $e;
        }
    }
}