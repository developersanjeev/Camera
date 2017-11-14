<?php
namespace Camera\Feed\Model\ResourceModel;

class Cameratiming extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
    /**
     * Initialize resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('camera_timing', 'id');
    }
}
?>