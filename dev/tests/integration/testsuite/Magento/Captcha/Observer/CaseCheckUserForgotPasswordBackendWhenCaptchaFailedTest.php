<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Magento\Captcha\Observer;

/**
 * Test captcha observer behavior
 *
 * @magentoAppArea adminhtml
 */
class CaseCheckUserForgotPasswordBackendWhenCaptchaFailedTest extends \Magento\TestFramework\TestCase\AbstractController
{
    /**
     * @magentoDbIsolation enabled
     * @magentoAppIsolation enabled
     * @magentoDataFixture Magento/Captcha/_files/dummy_user.php
     * @magentoAdminConfigFixture adminhtml/captcha/enable 1
     * @magentoAdminConfigFixture adminhtml/captcha/forms backend_forgotpassword
     * @magentoAdminConfigFixture adminhtml/captcha/mode always
     */
    public function testCheckUserForgotPasswordBackendWhenCaptchaFailed()
    {
        $this->getRequest()->setPostValue(
            ['email' => 'dummy@dummy.com', 'captcha' => ['backend_forgotpassword' => 'dummy']]
        );
        $this->dispatch('backend/adminhtml/auth/forgotpassword');
        $this->assertRedirect($this->stringContains('backend/adminhtml/auth/forgotpassword'));
    }
}
