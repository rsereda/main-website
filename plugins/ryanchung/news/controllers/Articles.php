<?php namespace RyanChung\News\Controllers;

use BackendMenu;
use Backend\Classes\Controller;
use DB;

/**
 * Courses Back-end Controller
 */
class Articles extends Controller
{
    public $implement = [
        'Backend.Behaviors.FormController',
        'Backend.Behaviors.ListController',
        
    ];

    public $formConfig = 'config_form.yaml';
    public $listConfig = 'config_list.yaml';
    

    public function __construct()
    {
        parent::__construct();
        BackendMenu::setContext('RyanChung.News', 'news', 'articles');
    }

    
    

    public function update($recordId, $context = null)
{
    //
    // Do any custom code here
    //


    // Call the FormController behavior update() method
    $result =     $this->asExtension('FormController')->update($recordId, $context);

        //dd(\CSN\Curriculum\Models\Course::first()->languages);
        //die('test');
        return $result;
}

}
