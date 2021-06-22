<?php

namespace Magenest\Movie\Model\Config\Source;

use Magento\Framework\Option\ArrayInterface;

class Custom implements ArrayInterface
{
    public function toOptionArray()
    {
        return [
            [
                'value' => null,
                'label' => __('Pleased Selected')
            ],
            [
                'value' => '1',
                'label' => __('Show')
            ],
            [
                'value' =>'2',
                'label' => __('Not Show')
            ]
        ];
    }
}
