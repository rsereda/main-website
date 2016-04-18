<?php namespace Ryanchung\News\Components;

use Cms\Classes\ComponentBase;
use RyanChung\News\Models\Article  as ArticleModel;
class Start extends ComponentBase
{

    public function componentDetails()
    {
        return [
            'name'        => 'start Component',
            'description' => 'No description provided yet...'
        ];
    }

    public function defineProperties()
    {
        return [];
    }

    public function articles(){
        return ArticleModel::orderBy('date','desc')->limit(3)->get();
    }

}
