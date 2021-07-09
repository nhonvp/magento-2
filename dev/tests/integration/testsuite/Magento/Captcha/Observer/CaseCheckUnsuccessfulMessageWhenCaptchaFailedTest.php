<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Magento\Captcha\Observer;

/**
 * Test captcha observer behavior
 *
 * @magentoAppArea Adminhtml
 */
class CaseCheckUnsuccessfulMessageWhenCaptchaFailedTest extends \Magento\TestFramework\TestCase\AbstractController
{
    /**
     * @magentoDbIsolation enabled
     * @magentoAppIsolation enabled
     * @magentoAdminConfigFixture Adminhtml/captcha/enable 1
     * @magentoAdminConfigFixture Adminhtml/captcha/forms backend_forgotpassword
     * @magentoAdminConfigFixture Adminhtml/captcha/mode always
     */
    public function testCheckUnsuccessfulMessageWhenCaptchaFailed()
    {
        \Magento\TestFramework\Helper\Bootstrap::getObjectManager()->get(
            \Magento\Backend\Model\UrlInterface::class
        )->turnOffSecretKey();
        $this->getRequest()->setPostValue(['email' => 'dummy@dummy.com', 'captcha' => '1234']);
        $this->dispatch('backend/Adminhtml/auth/forgotpassword');
        $this->assertSessionMessages(
            $this->equalTo(['Incorrect CAPTCHA']),
            \Magento\Framework\Message\MessageInterface::TYPE_ERROR
        );
    }
}
