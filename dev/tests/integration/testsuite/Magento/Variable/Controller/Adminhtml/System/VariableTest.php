<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Magento\Variable\Controller\Adminhtml\System;

/**
 * @magentoAppArea Adminhtml
 */
class VariableTest extends \Magento\TestFramework\TestCase\AbstractBackendController
{
    /**
     * @covers \Magento\Backend\App\Action::_addLeft
     */
    public function testEditAction()
    {
        $this->dispatch('backend/Adminhtml/system_variable/edit');
        $body = $this->getResponse()->getBody();
        $this->assertStringContainsString('window.toggleValueElement = function(element) {', $body);
    }
}
