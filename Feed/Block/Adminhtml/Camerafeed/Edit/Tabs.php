<?php
namespace Camera\Feed\Block\Adminhtml\Camerafeed\Edit;

/**
 * Admin page left menu
 */
class Tabs extends \Magento\Backend\Block\Widget\Tabs
{
    /**
     * @return void
     */
    protected function _construct()
    {
        parent::_construct();
        $this->setId('camerafeed_tabs');
        $this->setDestElementId('edit_form');
        $this->setTitle(__('Camerafeed Information'));
    }
}