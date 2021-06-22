<?php

namespace Packt\HelloWorld\Controller\Adminhtml\Post;

use Magento\Backend\App\Action;
use Packt\HelloWorld\Model\SubscriptionFactory;
use Magento\Backend\Model\View\Result\RedirectFactory;

class Save extends Action
{
    private $resultRedirect;
    private $SubscriptionFactory;

    public function __construct(
        Action\Context $context,
        SubscriptionFactory $SubscriptionFactory,
        RedirectFactory $redirectFactory
    )
    {
        parent::__construct($context);
        $this->SubscriptionFactory = $SubscriptionFactory;
        $this->resultRedirect = $redirectFactory;
    }

    public function execute()
    {
        $data = $this->getRequest()->getPostValue();
        $id = !empty($data['subscription_id']) ? $data['subscription_id'] : null;

        $newData = [
            'firstname' => $data['firstname'],
            'lastname' => $data['lastname'],
            'status' => $data['status'],
            'email' => $data['email'],
            'message' => $data['message']
        ];

        $post = $this->SubscriptionFactory->create();
        if ($id) {
            $post->load($id);
            $this->getMessageManager()->addSuccessMessage(__('Edit thành công'));
        } else {
            $this->getMessageManager()->addSuccessMessage(__('Save thành công.'));
        }
        try {
            $post->addData($newData);
            $this->_eventManager->dispatch("packt_post_before_save", ['postData' => $post]);
            $post->save();
            return $this->resultRedirect->create()->setPath('helloworld/post/index');
        } catch (\Exception $e) {
            $this->getMessageManager()->addErrorMessage(__('Save thất bại.'));
        }
    }
}
