<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

/**
 * Test class for \Magento\Catalog\Controller\AddNew.
 */
namespace Magento\Catalog\Controller;

class IndexTest extends \Magento\TestFramework\TestCase\AbstractController
{
    public function testIndexAction()
    {
        $this->dispatch('catalog/index');

        $this->assertRedirect();
    }
}
