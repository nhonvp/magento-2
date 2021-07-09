<?php

namespace Promo\Notification\Controller\Adminhtml\Promo;

use Magento\Backend\App\Action;
use Promo\Notification\Model\PromoFactory;
use Magento\Backend\Model\View\Result\RedirectFactory;

class Save extends Action
{
    private $resultRedirect;
    private $PromoFactory;

    public function __construct(
        Action\Context $context,
        PromoFactory $PromoFactory,
        RedirectFactory $redirectFactory
    )
    {
        parent::__construct($context);
        $this->PromoFactory = $PromoFactory;
        $this->resultRedirect = $redirectFactory;
    }

    public function execute()
    {
        $data = $this->getRequest()->getPostValue();
        $id = !empty($data['entity_id']) ? $data['entity_id'] : null;

        $newData = [
            'name' => $data['name'],
            'status' => $data['status'],
            'short_description' => $data['short_description'],
            'redirect_url' => $data['redirect_url'],
        ];

        $post = $this->PromoFactory->create();
        if ($id) {
            $post->load($id);
            $this->getMessageManager()->addSuccessMessage(__('Edit thành công'));
        } else {
            $this->getMessageManager()->addSuccessMessage(__('Save thành công.'));
        }
        try {
            $post->addData($newData);
            $post->save();
            return $this->resultRedirect->create()->setPath('backend/promo/index');
        } catch (\Exception $e) {
            $this->getMessageManager()->addErrorMessage(__('Save thất bại.'));
        }
    }
}
