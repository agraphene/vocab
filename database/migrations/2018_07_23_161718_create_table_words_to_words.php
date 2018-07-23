<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableWordsToWords extends Migration
{
    /**
     * @var string table name
     */
    private $table = 'words_to_words';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable($this->table))
        {
            Schema::create($this->table, function (Blueprint $table) {
                $table->bigInteger('id');
                $table->primary('id');
                $table->bigInteger('word_id');
                $table->bigInteger('linked_word_id');
                $table->unique( array('word_id','linked_word_id'));
                $table->foreign('word_id')->references('id')->on('words');
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists($this->table);
    }
}
