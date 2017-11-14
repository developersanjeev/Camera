<?php

namespace Camera\Feed\Model\ResourceModel\Cameratiming;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{

    /**
     * Define resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('Camera\Feed\Model\Cameratiming', 'Camera\Feed\Model\ResourceModel\Cameratiming');
        $this->_map['fields']['page_id'] = 'main_table.page_id';
    }

}
?>