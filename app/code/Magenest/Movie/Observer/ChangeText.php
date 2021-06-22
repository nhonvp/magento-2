<?php

namespace Magenest\Movie\Observer;

use Magento\Framework\Event\Observer;

class ChangeText implements \Magento\Framework\Event\ObserverInterface
{
    public function __construct(\Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig)
    {
        $this->scopeConfig = $scopeConfig;
    }

    public function execute(Observer $observer)
    {
        $storeScope = \Magento\Store\Model\ScopeInterface::SCOPE_STORE;
        $text = $this->scopeConfig->getValue('magenest/movie/moviepage/text_movie',$storeScope);
        $observer->setData($this->scopeConfig->getValue('magenest/movie/moviepage/text_movie',$storeScope),'aaa');
    }
}
