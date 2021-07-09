<?php

namespace Magenest\Movie\Controller\Define;

use Magento\Framework\Controller\ResultFactory;

/**
 * Class Index
 * @package ViMagento\LearnRequireJS\Controller\Define\Index
 */
class Index extends \Magento\Framework\App\Action\Action
{
    public function execute()
    {
        return $this->resultFactory->create(ResultFactory::TYPE_PAGE);
    }
}
