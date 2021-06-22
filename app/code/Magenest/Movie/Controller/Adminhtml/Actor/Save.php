<?php

namespace Magenest\Movie\Controller\Adminhtml\Actor;

use Magento\Backend\App\Action;
use Magenest\Movie\Model\ActorFactory;
use Magento\Backend\Model\View\Result\RedirectFactory;

class Save extends Action
{
    private $resultRedirect;
    private $ActorFactory;

    public function __construct(
        Action\Context $context,
        ActorFactory $ActorFactory,
        RedirectFactory $redirectFactory
    )
    {
        parent::__construct($context);
        $this->ActorFactory = $ActorFactory;
        $this->resultRedirect = $redirectFactory;
    }

    public function execute()
    {
        $data = $this->getRequest()->getPostValue();
        $id = !empty($data['actor_id']) ? $data['actor_id'] : null;

        $newData = [
            'name' => $data['name'],
        ];

        $post = $this->ActorFactory->create();
        if ($id) {
            $post->load($id);
            $this->getMessageManager()->addSuccessMessage(__('Edit thành công'));
        } else {
            $this->getMessageManager()->addSuccessMessage(__('Save thành công.'));
        }
        try {
            $post->addData($newData);
//            $this->_eventManager->dispatch("packt_post_before_save", ['postData' => $post]);
            $post->save();
            return $this->resultRedirect->create()->setPath('movie/actor/index');
        } catch (\Exception $e) {
            $this->getMessageManager()->addErrorMessage(__('Save thất bại.'));
        }
    }
}
