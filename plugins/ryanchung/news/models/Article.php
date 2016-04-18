<?php namespace RyanChung\News\Models;

use Backend;
use Model;
use DB;
/**
 * Article Model
 */
class Article extends Model
{

    /**
     * @var string The database table used by the model.
     */
    public $table = 'ryanchung_news_articles';

    /**
     * @var array Guarded fields
     */
    protected $guarded = ['*'];

    /**
     * @var array Fillable fields
     */
    protected $fillable = [];

    /**
     * @var array Relations
     */
    public $hasOne = [
                    ];
    public $hasMany = [

    ];
    /*
    public $belongsTo = [
        'module' => ['RyanChung\News\Models\Module', 
                     'key' => 'RyanChung_News_modules_id'],
        'level' => ['RyanChung\News\Models\Level', 
                    'key' => 'RyanChung_News_levels_id'],
        'category' => ['RyanChung\News\Models\Category', 
                    'key' => 'RyanChung_News_categories_id'],
        'platform' => ['RyanChung\News\Models\Platform', 
                    'key' => 'RyanChung_News_platforms_id'],
    ];*/
    /*
    public $belongsToMany = [
        'languages' => ['RyanChung\News\Models\Language', 
                        'table' => 'RyanChung_News_cl', 
                        'key' => 'course_id', 
                        'otherKey' => 'language_id']
        ];
    */
    public $morphTo = [];
    public $morphOne = [];
    public $morphMany = [];
    public $attachOne = [];
    public $attachMany = [];
}
