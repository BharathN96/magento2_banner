<?php
/**
 * Created by PhpStorm.
 * User: bharath
 * Date: 12/9/18
 * Time: 10:56 AM
 */

namespace Codilar\Banner\Controller\Adminhtml\View;

use Magento\Framework\App\Filesystem\DirectoryList;
class Save extends \Magento\Backend\App\Action
{
    /**
     * @var \Codilar\Seller\Model\BannerFactory
     */
    var $bannerFactory;

    /**
     * @param \Magento\Backend\App\Action\Context $context
     * @param \Codilar\Banner\Model\BannerFactory $bannerFactory
     */
    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Codilar\Banner\Model\BannerFactory $bannerFactory
    ) {
        parent::__construct($context);
        $this->bannerFactory = $bannerFactory;
    }

    /**
     * @SuppressWarnings(PHPMD.CyclomaticComplexity)
     * @SuppressWarnings(PHPMD.NPathComplexity)
     */
    public function execute()
    {
        $rowData = $this->bannerFactory->create();

        $data = $this->getRequest()->getPostValue();

        $desktopImage = $this->getImagePath('desktop_image');
        $mobileImage = $this->getImagePath('mobile_image');
        $tabletImage = $this->getImagePath('tablet_image');
        var_dump($data);
        if (!$data) {
            $this->_redirect('banner/view/addrow');
            return;
        }
        try {
            //$rowData = $this->bannerFactory->create();
            //$rowData->setData($data);
            $rowData->setState($data['status']);
            $rowData->setDesktopImage($desktopImage['file']);
            $rowData->setMobileImage($mobileImage['file']);
            $rowData->setTabletImage($tabletImage['file']);
            $rowData->setDetails($data['details']);
            $rowData->setStartDate($data['start_date']);
            $rowData->setEndDate($data['stop_date']);
            $rowData->setSaleStartDate($data['sale_start_date']);
            $rowData->setSaleEndDate($data['sale_stop_date']);
            $rowData->save();
            $this->messageManager->addSuccess(__('Row data has been successfully saved.'));
        } catch (\Exception $e) {
            $this->messageManager->addError(__($e->getMessage()));
        }
        $this->_redirect('banner/view/index');
    }

    /**
     * @return bool
     */
    protected function _isAllowed()
    {
        return $this->_authorization->isAllowed('Codilar_Banner::save');
    }

    protected function getImagePath($imageType)
    {
        $image = $this->getRequest()->getFiles($imageType);
        $fileName = ($image && array_key_exists('name', $image)) ? $image['name'] : null;
        if ($image && $fileName) {
            try {
                /** @var \Magento\Framework\ObjectManagerInterface $uploader */
                $uploader = $this->_objectManager->create(
                    'Magento\MediaStorage\Model\File\Uploader',
                    ['fileId' => $imageType]
                );
                $uploader->setAllowedExtensions(['jpg', 'jpeg', 'gif', 'png']);
                /** @var \Magento\Framework\Image\Adapter\AdapterInterface $imageAdapterFactory */
                $imageAdapterFactory = $this->_objectManager->get('Magento\Framework\Image\AdapterFactory')
                    ->create();
                $uploader->setAllowRenameFiles(true);
                $uploader->setFilesDispersion(true);
                $uploader->setAllowCreateFolders(true);
                /** @var \Magento\Framework\Filesystem\Directory\Read $mediaDirectory */
                $mediaDirectory = $this->_objectManager->get('Magento\Framework\Filesystem')
                    ->getDirectoryRead(DirectoryList::MEDIA);

                $result = $uploader->save(
                    $mediaDirectory
                        ->getAbsolutePath('Codilar/Banner')
                );
                return $result;
            } catch (\Exception $e) {
                if ($e->getCode() == 0) {
                    $this->messageManager->addError($e->getMessage());
                }
            }
        }
    }
}