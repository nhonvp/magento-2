<?php

namespace Magenest\Movie\Controller\Customer;

class Index extends \Magento\Framework\App\Action\Action
{
    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \Magento\Customer\Model\CustomerFactory $customerFactory,
        \Magento\Customer\Model\Customer $customers
    ) {
        parent::__construct($context);
        $this->customerFactory = $customerFactory;
        $this->customer = $customers;
    }
    public function execute()
    {
        $this->_view->loadLayout();
        $this->_view->renderLayout();

    }
}
?>
