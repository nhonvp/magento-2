<?php

namespace Magenest\Movie\Block\System\Config;
use Magenest\Movie\Model\ResourceModel\Actor\CollectionFactory;
use Magento\Framework\Data\Form\Element\AbstractElement;

class RowActor extends \Magento\Config\Block\System\Config\Form\Field
{
    protected $_template = 'Magenest_Movie::system/config/rows.phtml';
    public function __construct(
        \Magento\Backend\Block\Template\Context $context, array $data = [],
        CollectionFactory $actorCollectionFactory
    ) {
        parent::__construct($context, $data);
        $this->actorCollectionFactory = $actorCollectionFactory;
    }
    protected function _getElementHtml(AbstractElement $element)
    {
        return $this->_toHtml();
    }
    protected function _toHtml()
    {
        $data = $this->actorCollectionFactory->create();
        $a = json_encode($data->count()) ;
        return __('collum of magenest_actor : '.$a);
    }
}
