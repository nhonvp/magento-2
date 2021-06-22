<?php

namespace Packt\HelloWorld\Observer;

use Magento\Framework\Event\Observer;

class ChangeName implements \Magento\Framework\Event\ObserverInterface
{
    public function execute(Observer $observer)
    {
        $data = $observer->getData('postData');
        $data->setData('firstname', 'change');
        $observer->setData('postData', $data);
    }
}
