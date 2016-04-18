<?php namespace Kironuniversity\Subscribe\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class CreateSubscriptionsTable extends Migration
{

    public function up()
    {
        Schema::create('kironuniversity_subscribe_subscriptions', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('email');
            $table->string('token', 32)->nullable();
            $table->boolean('confirmed')->default(0);
            $table->integer('list_id')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('kironuniversity_subscribe_subscriptions');
    }

}
