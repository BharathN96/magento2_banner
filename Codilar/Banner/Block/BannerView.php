<?php
/**
 * Created by PhpStorm.
 * User: bharath
 * Date: 14/9/18
 * Time: 12:36 PM
 */

namespace Codilar\Banner\Block;


use Magento\Framework\View\Element\Template;
use Codilar\Banner\Model\BannerFactory;
use Codilar\Banner\Model\ResourceModel\Banner\Collection;
use Magento\Store\Model\StoreManagerInterface;

class BannerView extends Template
{
    protected $bannerFactory;

    private $storeManager;

    public function __construct(
        Template\Context $context,
        BannerFactory $bannerFactory,
        StoreManagerInterface $manager,
        array $data = [])
    {
        $this->bannerFactory = $bannerFactory;
        $this->storeManager = $manager;
        parent::__construct($context, $data);
    }

    public function getImageData()
    {
        $banner = $this->bannerFactory->create()->getCollection()
                    ->addFieldToFilter('state', '1');
        //$banner = $this->bannerCollection->getCollection();
        return $banner;
    }

    public function getImagePath()
    {
        $imagePath = $this->storeManager->getStore()
            ->getBaseUrl(\Magento\Framework\UrlInterface::URL_TYPE_MEDIA);
        return $imagePath.'Codilar/Banner' ;
    }
}