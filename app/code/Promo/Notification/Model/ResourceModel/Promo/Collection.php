<?php

namespace Promo\Notification\Model\ResourceModel\Promo;

/**
 * Subscription Collection
 */
class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    /**
     * Initialize resource collection
     *
     * @return void
     */
    public function _construct()
    {
        $this->_init('Promo\Notification\Model\Promo', 'Promo\Notification\Model\ResourceModel\Promo');
    }
}
