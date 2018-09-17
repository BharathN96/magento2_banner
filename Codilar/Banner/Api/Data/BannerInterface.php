<?php
/**
 * Created by PhpStorm.
 * User: bharath
 * Date: 12/9/18
 * Time: 9:36 AM
 */

namespace Codilar\Banner\Api\Data;


interface BannerInterface
{
    /**
     * Constants for keys of data array. Identical to the name of the getter in snake case.
     */
    const ENTITY_ID = 'entity_id';
    const DESKTOP_IMAGE = 'desktop_image';
    const MOBILE_IMAGE = 'mobile_image';
    const TABLET_IMAGE = 'tablet_image';
    const DEATILS = 'details';
    const START_DATE = 'start_date';
    const STOP_DATE = 'stop_date';
    const SALE_START_DATE = 'sale_start_date';
    const SALE_STOP_DATE = 'sale_stop_date';
    const STATE = 'state';

    /**
     * @return mixed
     */
    public function getEntityId();

    /**
     * @param $entityId
     * @return mixed
     */
    public function setEntityId($entityId);

    /**
     * @return mixed
     */
    public function getState();

    /**
     * @param $entityId
     * @return mixed
     */
    public function setState($state);

    /**
     * @return mixed
     */
    public function getDesktopImage();

    /**
     * @param $sellerId
     * @return mixed
     */
    public function setDesktopImage($desktopImage);

    /**
     * @return mixed
     */

    public function getMobileImage();

    /**
     * @param $sellerName
     * @return mixed
     */

    public function setMobileImage($mobileImage);

    /**
     * @return mixed
     */
    public function getTabletImage();

    /**
     * @param $commissionRate
     * @return mixed
     */
    public function setTabletImage($tabletImage);

    /**
     * @return mixed
     */
    public function getDetails();

    /**
     * @param $totalSale
     * @return mixed
     */
    public function setDetails($details);

    /**
     * @return mixed
     */
    public function getStartDate();

    /**
     * @param $amountReceived
     * @return mixed
     */
    public function setStartDate($startDate);

    /**
     * @return mixed
     */
    public function getEndDate();

    /**
     * @param $CommissionAmount
     * @return mixed
     */
    public function setEndDate($endDate);

    /**
     * @return mixed
     */
    public function getSaleStartDate();

    /**
     * @param $amountPaid
     * @return mixed
     */
    public function setSaleStartDate($saleStartDate);

    /**
     * @return mixed
     */
    public function getSaleEndDate();

    /**
     * @param $amountPaid
     * @return mixed
     */
    public function setSaleEndDate($saleEndDate);

}