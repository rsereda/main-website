<?php namespace RyanChung\News\Components;

use Cms\Classes\ComponentBase;
use RyanChung\News\Models\Article  as ArticleModel;

class Newslist extends ComponentBase
{

    public function componentDetails()
    {
        return [
            'name'        => 'Newslist Component',
            'description' => 'List of all news articles'
        ];
    }

    public function defineProperties()
    {
        return [];
    }

    
    public function articles(){
        return ArticleModel::all();
    }

}
