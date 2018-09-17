<?php
/**
 * Created by PhpStorm.
 * User: bharath
 * Date: 12/9/18
 * Time: 9:45 AM
 */

namespace Codilar\Banner\Model;

use Codilar\Banner\Api\Data\BannerInterface;
use Magento\Framework\Model\AbstractModel;

class Banner extends AbstractModel implements BannerInterface
{
    /**
     * CMS page cache tag.
     */
    const CACHE_TAG = 'banner_data';

    /**
     * @var string
     */
    protected $_cacheTag = 'banner_data';

    /**
     * Prefix of model events names.
     *
     * @var string
     */
    protected $_eventPrefix = 'banner_data';

    /**
     * Initialize resource model.
     */
    protected function _construct()
    {
        $this->_init('Codilar\Banner\Model\ResourceModel\Banner');
    }

    /**
     * @return mixed
     */
    public function getEntityId()
    {
        return $this->getData(self::ENTITY_ID);
    }


    /**
     * @param int $entityId
     * @return Banner|\Magento\Framework\Model\AbstractModel|mixed
     */
    public function setEntityId($entityId)
    {
        return $this->setData(self::ENTITY_ID, $entityId);
    }

    /**
     * @return mixed
     */
    public function getDesktopImage()
    {
        return $this->getData(self::DESKTOP_IMAGE);
    }

    /**
     * @param $sellerId
     * @return mixed
     */
    public function setDesktopImage($desktopImage)
    {
        return $this->setData(self::DESKTOP_IMAGE, $desktopImage);
    }

    /**
     * @return mixed
     */
    public function getMobileImage()
    {
        return $this->getData(self::MOBILE_IMAGE);
    }

    /**
     * @param $sellerName
     * @return mixed
     */
    public function setMobileImage($mobileImage)
    {
        return $this->setData(self::MOBILE_IMAGE, $mobileImage);
    }

    /**
     * @return mixed
     */
    public function getTabletImage()
    {
        return $this->getData(self::TABLET_IMAGE);
    }

    /**
     * @param $commissionRate
     * @return mixed
     */
    public function setTabletImage($tabletImage)
    {
        return $this->setData(self::TABLET_IMAGE, $tabletImage);
    }

    /**
     * @return mixed
     */
    public function getDetails()
    {
        return $this->getData(self::DEATILS);
    }

    /**
     * @param $totalSale
     * @return mixed
     */
    public function setDetails($details)
    {
        return $this->setData(self::DEATILS, $details);
    }

    /**
     * @return mixed
     */
    public function getStartDate()
    {
        return $this->getData(self::START_DATE);
    }

    /**
     * @param $amountReceived
     * @return mixed
     */
    public function setStartDate($startDate)
    {
        return $this->setData(self::START_DATE, $startDate);
    }

    /**
     * @return mixed
     */
    public function getEndDate()
    {
        return $this->getData(self::STOP_DATE);
    }

    /**
     * @param $CommissionAmount
     * @return mixed
     */
    public function setEndDate($endDate)
    {
        return $this->setData(self::STOP_DATE, $endDate);
    }

    /**
     * @return mixed
     */
    public function getSaleStartDate()
    {
        return $this->getData(self::SALE_START_DATE);
    }

    /**
     * @param $amountPaid
     * @return mixed
     */
    public function setSaleStartDate($saleStartDate)
    {
        return $this->setData(self::SALE_START_DATE, $saleStartDate);
    }

    /**
     * @return mixed
     */
    public function getSaleEndDate()
    {
        return $this->getData(self::SALE_STOP_DATE);
    }

    /**
     * @param $amountPaid
     * @return mixed
     */
    public function setSaleEndDate($saleEndDate)
    {
        return $this->setData(self::SALE_STOP_DATE, $saleEndDate);
    }

    /**
     * @return mixed
     */
    public function getState()
    {
        return $this->getData(self::STATE);
    }

    /**
     * @param $entityId
     * @return mixed
     */
    public function setState($state)
    {
        return $this->setData(self::STATE, $state);
    }
}