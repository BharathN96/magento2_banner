<?php
/**
 * Created by PhpStorm.
 * User: bharath
 * Date: 12/9/18
 * Time: 10:48 AM
 */

namespace Codilar\Banner\Controller\Adminhtml\View;


use Magento\Backend\App\Action;
use Magento\Framework\App\ResponseInterface;

class Index extends Action
{

    protected $resultPageFactory = false;

    /**
     * Index constructor.
     * @param \Magento\Backend\App\Action\Context $context
     * @param \Magento\Framework\View\Result\PageFactory $resultPageFactory
     */
    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $resultPageFactory
    )
    {
        parent::__construct($context);
        $this->resultPageFactory = $resultPageFactory;
    }

    /**
     * @return \Magento\Framework\App\ResponseInterface|\Magento\Framework\Controller\ResultInterface|\Magento\Framework\View\Result\Page
     */
    public function execute()
    {
        $resultPage = $this->resultPageFactory->create();
        $resultPage->getConfig()->getTitle()->prepend((__('Banner')));

        return $resultPage;
    }

}