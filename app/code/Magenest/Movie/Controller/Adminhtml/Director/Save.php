<?php

namespace Magenest\Movie\Controller\Adminhtml\Director;

use Magento\Backend\App\Action;
use Magenest\Movie\Model\DirectorFactory;
use Magento\Backend\Model\View\Result\RedirectFactory;

class Save extends Action
{
    private $resultRedirect;
    private $DirectorFactory;

    public function __construct(
        Action\Context $context,
        DirectorFactory $DirectorFactory,
        RedirectFactory $redirectFactory
    )
    {
        parent::__construct($context);
        $this->DirectorFactory = $DirectorFactory;
        $this->resultRedirect = $redirectFactory;
    }

    public function execute()
    {
        $data = $this->getRequest()->getPostValue();
        $id = !empty($data['director_id']) ? $data['director_id'] : null;

        $newData = [
            'name' => $data['name'],
        ];

        $post = $this->DirectorFactory->create();
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
            return $this->resultRedirect->create()->setPath('movie/director/index');
        } catch (\Exception $e) {
            $this->getMessageManager()->addErrorMessage(__('Save thất bại.'));
        }
    }
}
