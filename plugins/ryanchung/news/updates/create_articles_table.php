<?php namespace RyanChung\News\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class CreateArticlesTable extends Migration
{

    public function up()
    {
        Schema::create('ryanchung_news_articles', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');
            #$table->integer('ryanchung_news_platforms_id')->unsigned();
            $table->string('title');
            $table->string('subtitle');
            $table->text('description');
            
            $table->date('date')->nullable();
            
            $table->string('link');
            #$table->boolean('certificate')->nullable();
            #$table->integer('weeks')->nullable();
            
            $table->string('source');
            $table->string('img');
            $table->string('source-img');
            $table->string('language')->nullable();
            $table->string('country')->nullable();
            

            #$table->foreign('ryanchung_news_levels_id')->references('id')->on('ryanchung_news_levels');
            #$table->foreign('ryanchung_news_modules_id')->references('id')->on('ryanchung_news_modules');
            #$table->foreign('ryanchung_news_categories_id')->references('id')->on('ryanchung_news_categories');
            #$table->foreign('ryanchung_news_platforms_id')->references('id')->on('ryanchung_news_platforms');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('ryanchung_news_articles');
    }

}
