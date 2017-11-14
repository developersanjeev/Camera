<?php
namespace Camera\Feed\Model;

class Camerafeed extends \Magento\Framework\Model\AbstractModel
{
    /**
     * Initialize resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('Camera\Feed\Model\ResourceModel\Camerafeed');
    }
}
?>