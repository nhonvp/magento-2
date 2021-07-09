<?php

namespace Magenest\Movie\Block;

use Magento\Framework\View\Element\Template;

class Button extends \Magento\Framework\View\Element\Template
{
    public function __construct(Template\Context $context, \Magenest\Movie\Model\MovieFactory $movieFactory)
    {
        $this->MovieFactory = $movieFactory;
        parent::__construct($context);
    }

    public function getTitle()
    {
        return __('HelloWorld!');
    }


}
