<?php

namespace Magenest\Movie\Block;

use Magento\Framework\View\Element\Template;

class Notificationinfo extends \Magento\Framework\View\Element\Template
{

    protected $customer;
    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        \Magento\Framework\View\Result\PageFactory $resultPageFactory,
        \Magento\Customer\Api\CustomerRepositoryInterface $customerRepositoryInterface
    ) {
        parent::__construct($context);
        $this->resultPageFactory = $resultPageFactory;
        $this->customerRepositoryInterface = $customerRepositoryInterface;
    }

}
