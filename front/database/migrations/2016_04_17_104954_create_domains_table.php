<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDomainsTable extends Migration {

    private $tableName = 'domains';

    public function up(){
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->uuid('id');

            $table->uuid('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            $table->string('name');
            $table->string('url', 1000);
            $table->date('verified_at')->nullable();

            $table->timestamps();
            $table->softDeletes();

            $table->primary('id');
        });
    }

    public function down(){
        Schema::drop($this->tableName);
    }
}
