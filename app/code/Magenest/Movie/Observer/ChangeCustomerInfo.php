<?php

namespace Magenest\Movie\Observer;

use Magento\Framework\Event\Observer;

class ChangeCustomerInfo implements \Magento\Framework\Event\ObserverInterface
{
    protected $_customerRepositoryInterface;

    public function __construct(\Magento\Customer\Api\CustomerRepositoryInterface $customerRepositoryInterface
    )
    {
        $this->_customerRepositoryInterface = $customerRepositoryInterface;
    }

    public function execute(Observer $observer)
    {
        $customer = $observer->getEvent()->getCustomer();
        $customer->setFirstName('magenest');
    }
}
