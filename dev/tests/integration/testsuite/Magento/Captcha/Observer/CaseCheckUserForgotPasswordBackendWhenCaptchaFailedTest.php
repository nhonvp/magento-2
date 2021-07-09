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
class CaseCheckUserForgotPasswordBackendWhenCaptchaFailedTest extends \Magento\TestFramework\TestCase\AbstractController
{
    /**
     * @magentoDbIsolation enabled
     * @magentoAppIsolation enabled
     * @magentoDataFixture Magento/Captcha/_files/dummy_user.php
     * @magentoAdminConfigFixture Adminhtml/captcha/enable 1
     * @magentoAdminConfigFixture Adminhtml/captcha/forms backend_forgotpassword
     * @magentoAdminConfigFixture Adminhtml/captcha/mode always
     */
    public function testCheckUserForgotPasswordBackendWhenCaptchaFailed()
    {
        $this->getRequest()->setPostValue(
            ['email' => 'dummy@dummy.com', 'captcha' => ['backend_forgotpassword' => 'dummy']]
        );
        $this->dispatch('backend/Adminhtml/auth/forgotpassword');
        $this->assertRedirect($this->stringContains('backend/Adminhtml/auth/forgotpassword'));
    }
}
