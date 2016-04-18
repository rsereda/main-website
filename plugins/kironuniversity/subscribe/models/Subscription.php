<?php namespace Kironuniversity\Subscribe\Models;

use Model;

/**
 * Subscription Model
 */
class Subscription extends Model
{

    /**
     * @var string The database table used by the model.
     */
    public $table = 'kironuniversity_subscribe_subscriptions';

    /**
     * @var array Guarded fields
     */
    protected $guarded = ['id'];

    /**
     * @var array Fillable fields
     */
    protected $fillable = [];

    /**
     * @var array Relations
     */
    public $hasOne = [];
    public $hasMany = [];
    public $belongsTo = [];
    public $belongsToMany = [];
    public $morphTo = [];
    public $morphOne = [];
    public $morphMany = [];
    public $attachOne = [];
    public $attachMany = [];

}
