<?php
namespace Camera\Feed\Block\Adminhtml\Cameratiming;

class Grid extends \Magento\Backend\Block\Widget\Grid\Extended
{
    /**
     * @var \Magento\Framework\Module\Manager
     */
    protected $moduleManager;

    /**
     * @var \Camera\Feed\Model\cameratimingFactory
     */
    protected $_cameratimingFactory;

    /**
     * @var \Camera\Feed\Model\Status
     */
    protected $_status;

    /**
     * @param \Magento\Backend\Block\Template\Context $context
     * @param \Magento\Backend\Helper\Data $backendHelper
     * @param \Camera\Feed\Model\cameratimingFactory $cameratimingFactory
     * @param \Camera\Feed\Model\Status $status
     * @param \Magento\Framework\Module\Manager $moduleManager
     * @param array $data
     *
     * @SuppressWarnings(PHPMD.ExcessiveParameterList)
     */
    public function __construct(
        \Magento\Backend\Block\Template\Context $context,
        \Magento\Backend\Helper\Data $backendHelper,
        \Camera\Feed\Model\CameratimingFactory $CameratimingFactory,
        \Camera\Feed\Model\Status $status,
        \Magento\Framework\Module\Manager $moduleManager,
        array $data = []
    ) {
        $this->_cameratimingFactory = $CameratimingFactory;
        $this->_status = $status;
        $this->moduleManager = $moduleManager;
        parent::__construct($context, $backendHelper, $data);
    }

    /**
     * @return void
     */
    protected function _construct()
    {
        parent::_construct();
        $this->setId('postGrid');
        $this->setDefaultSort('id');
        $this->setDefaultDir('DESC');
        $this->setSaveParametersInSession(true);
        $this->setUseAjax(false);
        $this->setVarNameFilter('post_filter');
    }

    /**
     * @return $this
     */
    protected function _prepareCollection()
    {
        $collection = $this->_cameratimingFactory->create()->getCollection();
        $this->setCollection($collection);

        parent::_prepareCollection();

        return $this;
    }

    /**
     * @return $this
     * @SuppressWarnings(PHPMD.ExcessiveMethodLength)
     */
    protected function _prepareColumns()
    {
        $this->addColumn(
            'id',
            [
                'header' => __('ID'),
                'type' => 'number',
                'index' => 'id',
                'header_css_class' => 'col-id',
                'column_css_class' => 'col-id'
            ]
        );


		
				$this->addColumn(
					'start_time',
					[
						'header' => __('Start Time'),
						'index' => 'start_time',
					]
				);
				
				$this->addColumn(
					'end_time',
					[
						'header' => __('End Time '),
						'index' => 'end_time',
					]
				);
				


		
        //$this->addColumn(
            //'edit',
            //[
                //'header' => __('Edit'),
                //'type' => 'action',
                //'getter' => 'getId',
                //'actions' => [
                    //[
                        //'caption' => __('Edit'),
                        //'url' => [
                            //'base' => '*/*/edit'
                        //],
                        //'field' => 'id'
                    //]
                //],
                //'filter' => false,
                //'sortable' => false,
                //'index' => 'stores',
                //'header_css_class' => 'col-action',
                //'column_css_class' => 'col-action'
            //]
        //);
		

		

        $block = $this->getLayout()->getBlock('grid.bottom.links');
        if ($block) {
            $this->setChild('grid.bottom.links', $block);
        }

        return parent::_prepareColumns();
    }

	
    /**
     * @return $this
     */
    protected function _prepareMassaction()
    {

        $this->setMassactionIdField('id');
        //$this->getMassactionBlock()->setTemplate('Camera_Feed::cameratiming/grid/massaction_extended.phtml');
        $this->getMassactionBlock()->setFormFieldName('cameratiming');

        $this->getMassactionBlock()->addItem(
            'delete',
            [
                'label' => __('Delete'),
                'url' => $this->getUrl('feed/*/massDelete'),
                'confirm' => __('Are you sure?')
            ]
        );

        $statuses = $this->_status->getOptionArray();

        $this->getMassactionBlock()->addItem(
            'status',
            [
                'label' => __('Change status'),
                'url' => $this->getUrl('feed/*/massStatus', ['_current' => true]),
                'additional' => [
                    'visibility' => [
                        'name' => 'status',
                        'type' => 'select',
                        'class' => 'required-entry',
                        'label' => __('Status'),
                        'values' => $statuses
                    ]
                ]
            ]
        );


        return $this;
    }
		

    /**
     * @return string
     */
    public function getGridUrl()
    {
        return $this->getUrl('feed/*/index', ['_current' => true]);
    }

    /**
     * @param \Camera\Feed\Model\cameratiming|\Magento\Framework\Object $row
     * @return string
     */
    public function getRowUrl($row)
    {
		
        return $this->getUrl(
            'feed/*/edit',
            ['id' => $row->getId()]
        );
		
    }

	
		static public function getOptionArray5()
		{
            $data_array=array(); 
			$data_array[0]='Saturday';
			$data_array[1]='Sunday';
            return($data_array);
		}
		static public function getValueArray5()
		{
            $data_array=array();
			foreach(\Camera\Feed\Block\Adminhtml\Cameratiming\Grid::getOptionArray5() as $k=>$v){
               $data_array[]=array('value'=>$k,'label'=>$v);		
			}
            return($data_array);

		}
		
		static public function getOptionArray6()
		{
            $data_array=array(); 
			$data_array[0]='New Years Day';
			$data_array[1]='Martin Luther King, Jr. Day';
			$data_array[2]='Memorial Day';
			$data_array[3]='Independence Day';
			$data_array[4]='Labor Day';
			$data_array[5]='Columbus Day';
			$data_array[6]='Veterans Day';
			$data_array[7]='Thanksgiving Day';
			$data_array[8]='Christmas Day';
			//print_r($data_array);
			//die('enter');
            return($data_array);
		}
		static public function getValueArray6()
		{
			
            $data_array=array();
			foreach(\Camera\Feed\Block\Adminhtml\Cameratiming\Grid::getOptionArray6() as $k=>$v){
           
			   $data_array[]=array('value'=>$k,'label'=>$v);		
			}
			//print_r($data_array);
			
            return($data_array);

		}
		

}