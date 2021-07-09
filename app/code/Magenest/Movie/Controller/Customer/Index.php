<?php

namespace Magenest\Movie\Controller\Customer;

class Index extends \Magento\Framework\App\Action\Action
{
    public function __construct(
        \Magento\Framework\App\Action\Context $context
    ) {
        parent::__construct($context);
    }
    public function execute()
    {
        $this->_view->loadLayout();
        $this->_view->renderLayout();
    }
}
?>
