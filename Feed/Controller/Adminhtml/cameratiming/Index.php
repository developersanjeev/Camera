<?php

namespace Camera\Feed\Controller\Adminhtml\cameratiming;

use Magento\Backend\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;

class Index extends \Magento\Backend\App\Action
{
    /**
     * @var PageFactory
     */
    protected $resultPagee;

    /**
     * @param Context $context
     * @param PageFactory $resultPageFactory
     */
    public function __construct(
        Context $context,
        PageFactory $resultPageFactory
    ) {
        parent::__construct($context);
        $this->resultPageFactory = $resultPageFactory;
    }

    /**
     * Index action
     *
     * @return void
     */
    public function execute()
    {
        /** @var \Magento\Backend\Model\View\Result\Page $resultPage */
        $resultPage = $this->resultPageFactory->create();
        $resultPage->setActiveMenu('Camera_Feed::cameratiming');
        $resultPage->addBreadcrumb(__('Camera'), __('Camera'));
        $resultPage->addBreadcrumb(__('Manage item'), __('Manage Camera Timing'));
        $resultPage->getConfig()->getTitle()->prepend(__('Manage Camera Timing'));

        return $resultPage;
    }
}
?>