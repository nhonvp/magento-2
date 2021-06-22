<?php

namespace Magenest\Movie\Block\System\Config;
use Magenest\Movie\Model\ResourceModel\Movie\CollectionFactory;
use Magento\Framework\Data\Form\Element\AbstractElement;

class Rows extends \Magento\Config\Block\System\Config\Form\Field
{
    protected $_template = 'Magenest_Movie::system/config/rows.phtml';
    public function __construct(
        \Magento\Backend\Block\Template\Context $context, array $data = [],
        CollectionFactory $movieCollectionFactory
    ) {
        parent::__construct($context, $data);
        $this->movieCollectionFactory = $movieCollectionFactory;
    }
    protected function _getElementHtml(AbstractElement $element)
    {
        return $this->_toHtml();
    }
    protected function _toHtml()
    {
        $data = $this->movieCollectionFactory->create();
        $a = json_encode($data->count()) ;
        return __('collum of magenest_movie : '.$a);
    }
}
