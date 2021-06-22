<?php

namespace Magenest\Movie\Controller\Index;

use Magento\Framework\App\Action\Action;

class Showdata extends Action
{
    protected $MovieFactory;

    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \Magenest\Movie\Model\MovieFactory $movieFactory,
        \Magento\Framework\View\Result\PageFactory $resultPageFactory
    )
    {
        $this->MovieFactory = $movieFactory;
        $this->resultPageFactory = $resultPageFactory;
        return parent::__construct($context);
    }

    public function execute()
    {
//        $data = $this->MovieFactory->create()->getCollection();
//        foreach ($data as $value) {
//            echo "<pre>";
//            print_r($value->getData());
//            echo "</pre>";
//        }
        $resultPage = $this->resultPageFactory->create();
        return $resultPage;


    }
}
