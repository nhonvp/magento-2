<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Magento\Captcha\Observer;

use Magento\Framework\Message\MessageInterface;

/**
 * Test captcha observer behavior.
 *
 * @magentoAppArea Adminhtml
 */
class CaseCaptchaIsRequiredAfterFailedLoginAttemptsTest extends \Magento\TestFramework\TestCase\AbstractController
{
    /**
     * @magentoAdminConfigFixture Adminhtml/captcha/forms backend_login
     * @magentoAdminConfigFixture Adminhtml/captcha/enable 1
     * @magentoAdminConfigFixture Adminhtml/captcha/mode always
     */
    public function testBackendLoginActionWithInvalidCaptchaReturnsError()
    {
        \Magento\TestFramework\Helper\Bootstrap::getObjectManager()->get(
            \Magento\Backend\Model\UrlInterface::class
        )->turnOffSecretKey();

        /** @var \Magento\Framework\Data\Form\FormKey $formKey */
        $formKey = $this->_objectManager->get(\Magento\Framework\Data\Form\FormKey::class);
        $post = [
            'login' => [
                'username' => \Magento\TestFramework\Bootstrap::ADMIN_NAME,
                'password' => \Magento\TestFramework\Bootstrap::ADMIN_PASSWORD,
            ],
            'captcha' => ['backend_login' => 'some_unrealistic_captcha_value'],
            'form_key' => $formKey->getFormKey(),
        ];
        $this->getRequest()->setPostValue($post);
        $this->dispatch('backend/Adminhtml');
        $this->assertSessionMessages($this->equalTo([(string)__('Incorrect CAPTCHA.')]), MessageInterface::TYPE_ERROR);
        $backendUrlModel = \Magento\TestFramework\Helper\Bootstrap::getObjectManager()->get(
            \Magento\Backend\Model\UrlInterface::class
        );
        $backendUrlModel->turnOffSecretKey();
        $url = $backendUrlModel->getUrl('Adminhtml');
        $this->assertRedirect($this->stringStartsWith($url));
    }
}
