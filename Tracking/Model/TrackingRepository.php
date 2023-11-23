<?php
declare(strict_types=1);
namespace Products\Tracking\Model;

use Magento\Framework\Exception\LocalizedException;
use Products\Tracking\Model\TrackingProductFactory as TrackingProductModel;
use Products\Tracking\Model\ResourceModel\TrackingProduct as TrackingProductResource;
use Products\Tracking\Model\ResourceModel\TrackingProduct\CollectionFactory;
use Products\Tracking\Api\TrackingInterface;
use Products\Tracking\Api\Data\ProductDataInterface;

class TrackingRepository implements TrackingInterface
{
    /**
     * @var CollectionFactory
     */
    private $collectionFactory;

    /**
     * @var TrackingProductModel
     */
    private $trackingProductModel; 

    /**
     * @var TrackingProductResource
     */
    private $trackingProductResource; 

    public function __construct(
        CollectionFactory $collectionFactory,
        TrackingProductModel $trackingProductModel, 
        TrackingProductResource $trackingProductResource ,

    ) {
        $this->collectionFactory = $collectionFactory;
        $this->trackingProductModel = $trackingProductModel; 
        $this->trackingProductResource = $trackingProductResource; 
    }

    /**
     * @param ProductDataInterface $product
     * @return ProductDataInterface|array
     * @throws LocalizedException
     */
    public function save(ProductDataInterface $product)
    {
        $productId = $product->getId();

        if ($productId) {
            
            $trackingProduct = $this->trackingProductModel->create();
            $this->trackingProductResource->load($trackingProduct, $productId);

            if (!$trackingProduct->getId()) {
                return ['success' => 'ID is not Available'];
            }
        } else {
           
            $trackingProduct = $this->trackingProductModel->create();
        }

        $trackingProduct->setData($product->getData());

        try {
            $this->trackingProductResource->save($trackingProduct);
            if ($productId) {
                return ['success' => 'Updated Successfully'];
                
            } else {
                // return ['success' => 'Saved Successfully'];
                return $trackingProduct;
            }
            
        } catch (LocalizedException $e) {
            throw $e;
        }
    }

    /**
     * @param int|null $start
     * @param int|null $end
     * @return \Products\Tracking\Api\TrackingInterface[]
     */
    public function getApiData(int $start = null, int $end = null)
    {
        if ($start === null) {
            $start = 1;
        }
        if ($end === null) {
            $end = 10;
        }
        $data = [];

        try {
            $collection = $this->collectionFactory->create();
            $collection->addFieldToFilter(
                'id',
                [
                    'from' => $start,
                    'to' => $end,
                ]
            );

            foreach ($collection as $item) {
            
                $trackingProductData = $this->trackingProductModel->create();
                $trackingProductData->setData([
                    'id' => $item->getId(),
                    'sku' => $item->getSku(),
                    'quote_id' => $item->getQuoteId(),
                    'customer_id' => $item->getCustomerId(),
                    'created' => $item->getCreated(),
                ]);
                $data[] = $trackingProductData;
            }
            
            
            return $data;
        } catch (LocalizedException $e) {
            throw $e;
        }
    }

    // /**
    //  * @param ProductDataInterface $product
    //  * @return ProductDataInterface
    //  * @throws LocalizedException
    //  */
    // public function save(ProductDataInterface $product)
    // {
    //     $trackingProduct = $this->trackingProductModel->create(); 

    //     $trackingProduct->setData($product->getData());

    //     $this->trackingProductResource->save($trackingProduct);
    //     // clog(get_class($data));
    //     return $product;
    // }

    /**
     * @param ProductDataInterface $product
     * @return ProductDataInterface
     * @throws LocalizedException
     */
    public function update(ProductDataInterface $product)
    {
        $updateData = $this->trackingProductModel->create();
        $this->trackingProductResource->load($updateData, $product->getId(), 'id');

        if (!$updateData->getData()) {
            return ['success' => 'ID is not Available'];
        }

        $updateData->setData($product->getData());

        try {
            $this->trackingProductResource->save($updateData);
            return ['success' => 'Updated Successfully'];
        } catch (LocalizedException $e) {
            throw $e;
        }
    }
   
    
    /**
     * @param int $id
     * @return \Products\Tracking\Api\Data\ProductDataInterface[]
     * @throws LocalizedException
     */
    public function getById(int $id)
    {
    
            if (!$id) {
                $collection = $this->collectionFactory->create();
                $data = $collection->addFieldToFilter('id', $id)->getData();
                return $data;
            }

        throw new LocalizedException(__('Invalid ID provided.'));
    }

    /**
     * @param int $id
     * @return \Products\Tracking\Api\Data\ProductDataInterface[]
     * @throws LocalizedException
     */
    public function delete(int $id)
    {
        $data = $this->trackingProductModel->create();
        $this->trackingProductResource->load($data, $id, 'id');

        if (!$data->getData()) {
            return ['success' => 'ID is not Available'];
        }

        $this->trackingProductResource->delete($data);
        return ['success' => true, 'message' => "Deleted Successfully"];
    }

}
