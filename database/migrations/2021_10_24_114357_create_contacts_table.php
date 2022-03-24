<?php 
 
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
 
class CreateContactsTable extends Migration
{
/**
* Run the migrations.
*
* @return void
*/ 
public function up()
{
	
	Schema::create('contacts', function (Blueprint $table) { 
	$table->id();
	$table->text('name')->nullable(); 
	$table->string('email')->nullable(); 
    $table->string('phone_number')->nullable(); 
	$table->string('subject')->nullable();
	$table->text('message')->nullable(); 
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
	Schema::drop("contacts");
     }
}
