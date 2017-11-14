<?php

namespace Camera\Feed\Block\Adminhtml\Cameratiming\Edit\Tab;

/**
 * Cameratiming edit form main tab
 */
class Main extends \Magento\Backend\Block\Widget\Form\Generic implements \Magento\Backend\Block\Widget\Tab\TabInterface
{
    /**
     * @var \Magento\Store\Model\System\Store
     */
    protected $_systemStore;

    /**
     * @var \Camera\Feed\Model\Status
     */
    protected $_status;

    /**
     * @param \Magento\Backend\Block\Template\Context $context
     * @param \Magento\Framework\Registry $registry
     * @param \Magento\Framework\Data\FormFactory $formFactory
     * @param \Magento\Store\Model\System\Store $systemStore
     * @param array $data
     */
    public function __construct(
        \Magento\Backend\Block\Template\Context $context,
        \Magento\Framework\Registry $registry,
        \Magento\Framework\Data\FormFactory $formFactory,
        \Magento\Store\Model\System\Store $systemStore,
        \Camera\Feed\Model\Status $status,
        array $data = []
    ) {
        $this->_systemStore = $systemStore;
        $this->_status = $status;
        parent::__construct($context, $registry, $formFactory, $data);
    }

    /**
     * Prepare form
     *
     * @return $this
     * @SuppressWarnings(PHPMD.ExcessiveMethodLength)
     */
    protected function _prepareForm()
    {
        /* @var $model \Camera\Feed\Model\BlogPosts */
        $model = $this->_coreRegistry->registry('cameratiming');

        $isElementDisabled = false;

        /** @var \Magento\Framework\Data\Form $form */
        $form = $this->_formFactory->create();

        $form->setHtmlIdPrefix('page_');

        $fieldset = $form->addFieldset('base_fieldset', ['legend' => __('Item Information')]);

        if ($model->getId()) {
            $fieldset->addField('id', 'hidden', ['name' => 'id']);
        }

		
        $fieldset->addField(
            'start_time',
            'text',
            [
                'name' => 'start_time',
                'label' => __('Start Time'),
                'title' => __('Start Time'),
				
                'disabled' => $isElementDisabled
            ]
        );
					
        $fieldset->addField(
            'end_time',
            'text',
            [
                'name' => 'end_time',
                'label' => __('End Time'),
                'title' => __('End Time'),
				
                'disabled' => $isElementDisabled
            ]
        );
							
        $fieldset->addField(
            'weekends_time',
            'multiselect',
            [
                'label' => __('Weekends Day'),
                'title' => __('Weekends Day'),
                'name' => 'weekends_time',
				
                'values' => \Camera\Feed\Block\Adminhtml\Cameratiming\Grid::getValueArray5(),
                'disabled' => $isElementDisabled
            ]
        );
											
        $fieldset->addField(
            'holidays_day',
            'multiselect',
            [
                'label' => __('Holidays'),
                'title' => __('Holidays'),
                'name' => 'holidays_day',
				
                'values' => \Camera\Feed\Block\Adminhtml\Cameratiming\Grid::getValueArray6(),
                'disabled' => $isElementDisabled
            ]
        );
						

        if (!$model->getId()) {
            $model->setData('is_active', $isElementDisabled ? '0' : '1');
        }

        $form->setValues($model->getData());
        $this->setForm($form);
		
        return parent::_prepareForm();
    }

    /**
     * Prepare label for tab
     *
     * @return \Magento\Framework\Phrase
     */
    public function getTabLabel()
    {
        return __('Item Information');
    }

    /**
     * Prepare title for tab
     *
     * @return \Magento\Framework\Phrase
     */
    public function getTabTitle()
    {
        return __('Item Information');
    }

    /**
     * {@inheritdoc}
     */
    public function canShowTab()
    {
        return true;
    }

    /**
     * {@inheritdoc}
     */
    public function isHidden()
    {
        return false;
    }

    /**
     * Check permission for passed action
     *
     * @param string $resourceId
     * @return bool
     */
    protected function _isAllowedAction($resourceId)
    {
        return $this->_authorization->isAllowed($resourceId);
    }
    
    public function getTargetOptionArray(){
    	return array(
    				'_self' => "Self",
					'_blank' => "New Page",
    				);
    }
}
