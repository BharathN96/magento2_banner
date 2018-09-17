<?php
/**
 * Created by PhpStorm.
 * User: bharath
 * Date: 17/9/18
 * Time: 12:10 PM
 */

namespace Codilar\Banner\Cron;

use Codilar\Banner\Model\BannerFactory;
class Run
{
    protected $bannerFactory;

   public function __construct(
        BannerFactory $bannerFactory
   )
   {
       $this->bannerFactory = $bannerFactory;
   }

   public function execute()
   {
       date_default_timezone_set('Asia/Kolkata');
       $banners = $this->bannerFactory->create()->getCollection()
           ->addFieldToFilter('state', '0');
       foreach ($banners as $banner)
       {
           $startDate = $banner->getData('start_date');
           $curentTime = date('Y-m-d H:i:s');

       }
   }
}