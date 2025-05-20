<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
 // database/migrations/xxxx_xx_xx_create_items_table.php

public function up()
{
    Schema::create('items', function (Blueprint $table) {
        $table->id();
        $table->string('title');
        $table->text('description');
        $table->enum('type', ['lost', 'found']);
        $table->string('location');
        $table->string('contact_email');
        $table->string('image')->nullable();  // image file path
        $table->timestamps();
    });
}


/**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('items');
    }
};
