<?php

namespace Magenest\Movie\Controller\Adminhtml\Post;

use Magento\Backend\App\Action;
use Magenest\Movie\Model\MovieFactory;
use Magento\Backend\Model\View\Result\RedirectFactory;

class Save extends Action
{
    private $resultRedirect;
    private $MovieFactory;

    public function __construct(
        Action\Context $context,
        MovieFactory $MovieFactory,
        RedirectFactory $redirectFactory
    )
    {
        parent::__construct($context);
        $this->MovieFactory = $MovieFactory;
        $this->resultRedirect = $redirectFactory;
    }

    public function execute()
    {
        $data = $this->getRequest()->getPostValue();
        $id = !empty($data['movie_id']) ? $data['movie_id'] : null;

        $newData = [
            'name' => $data['name'],
            'description' => $data['description'],
            'rating' => $data['rating'],
            'director_id' => $data['director_id'],
        ];

        $post = $this->MovieFactory->create();
        if ($id) {
            $post->load($id);
            $this->getMessageManager()->addSuccessMessage(__('Edit thành công'));
        } else {
            $this->getMessageManager()->addSuccessMessage(__('Save thành công.'));
        }
        try {
            $post->addData($newData);
            $this->_eventManager->dispatch("magenest_movie_before_save", ['movieData' => $post]);
            $post->save();
            return $this->resultRedirect->create()->setPath('movie/post/index');
        } catch (\Exception $e) {
            $this->getMessageManager()->addErrorMessage(__('Save thất bại.'));
        }
    }
}
