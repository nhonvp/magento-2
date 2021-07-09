<?php

namespace Magenest\Movie\Block;

use Magento\Framework\View\Element\Template;

class Info extends \Magento\Framework\View\Element\Template
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
    public function getInfomation()
    {
        $customerId = 9;
        $customer = $this->customerRepositoryInterface->getById($customerId);
        $customerAttributeData = $customer->__toArray();
        echo'firstname :'; print_r($customerAttributeData['firstname']);echo '<br>';
        echo'lastname :'; print_r($customerAttributeData['lastname']);echo '<br>';
        echo'email :';print_r($customerAttributeData['email']);echo '<br>';
//        echo'avatar :';print_r($customerAttributeData['avatar']);echo '<br>';
    }
}
