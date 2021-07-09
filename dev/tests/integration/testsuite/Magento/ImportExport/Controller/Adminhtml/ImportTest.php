<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Magento\ImportExport\Controller\Adminhtml;

use Magento\Framework\Filesystem\DirectoryList;

/**
 * @magentoAppArea Adminhtml
 */
class ImportTest extends \Magento\TestFramework\TestCase\AbstractBackendController
{
    public function testGetFilterAction()
    {
        $this->dispatch('backend/Adminhtml/import/index');
        $body = $this->getResponse()->getBody();
        $this->assertStringContainsString(
            (string)\Magento\TestFramework\Helper\Bootstrap::getObjectManager()->get(
                \Magento\ImportExport\Helper\Data::class
            )->getMaxUploadSizeMessage(),
            $body
        );
    }
}
