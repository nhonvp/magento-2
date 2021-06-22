<?php

namespace Magenest\Movie\Block;

use Magento\Framework\View\Element\Template;

class Index extends \Magento\Framework\View\Element\Template
{
    public function __construct(Template\Context $context, \Magenest\Movie\Model\MovieFactory $movieFactory)
    {
        $this->MovieFactory = $movieFactory;
        parent::__construct($context);
    }

    public function getTitle()
    {
        return __('HelloWorld!');
    }

    public function getMovieCollection()
    {
        $this->magenest_movie = "main_table";
        $data = $this->MovieFactory->create()->getCollection();
        $data->getSelect()->join(
            ['magenest_movie_actor' => $data->getTable('magenest_movie_actor')],
            'main_table.movie_id = magenest_movie_actor.movie_id',
            ['movie_id' => 'magenest_movie_actor.movie_id', 'actor_id' => 'magenest_movie_actor.actor_id']);
        $data->getSelect()->join(
            ['magenest_director' => $data->getTable('magenest_director')],
            'main_table.director_id = magenest_director.director_id',
            ['director_id'=>'magenest_director.director_id','name_director' =>'magenest_director.name']);
        $data->getSelect()->join(
            ['magenest_actor'=> $data->getTable('magenest_actor')],
          'magenest_movie_actor.actor_id = magenest_actor.actor_id',
            ['actor_id' => 'magenest_actor.actor_id','name_actor'=>'magenest_actor.name']
        );
        return $data;
    }
}
