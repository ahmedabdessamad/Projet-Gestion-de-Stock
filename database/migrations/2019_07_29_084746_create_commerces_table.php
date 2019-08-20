<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommercesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('reference');
            $table->string('quantite');
            $table->string('quantite_min');
            $table->timestamps();
        }); 
        Schema::create('customers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('reference');
            $table->string('addresse');
            $table->string('telephone');
            $table->string('mail');
            $table->timestamps();
        }); 
        Schema::create('destinations', function (Blueprint $table) {
          $table->increments('id');
          $table->string('name');
          $table->integer('customer_id')->unsigned();
          $table->timestamps();
        });
        Schema::table('destinations', function ($table) {
           $table->foreign('customer_id')->references('id')->on('customers')
              ->onDelete('cascade');
        });
        Schema::create('providers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('reference');
            $table->string('addresse');
            $table->string('telephone');
            $table->string('mail');
            $table->timestamps();
        }); 
        Schema::create('equipements', function (Blueprint $table) {
            $table->increments('id');
            $table->string('n_serie');
            $table->integer('categorie_id')->unsigned();            
            $table->integer('provider_id')->unsigned();
            $table->integer('status'); // 1:enstock, 2:occupée, 3:montée, 4:demontée, 5:areparée, 6:reparée
            $table->timestamps();
        });
        Schema::table('equipements', function ($table) {
           $table->foreign('categorie_id')->references('id')->on('categories')
              ->onDelete('cascade');
           $table->foreign('provider_id')->references('id')->on('providers')
              ->onDelete('cascade');
        });

        Schema::create('missions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('numero');
            $table->date('date');
            $table->string('matricule');
            $table->integer('customer_id')->unsigned();            
            $table->integer('destination_id')->unsigned();
            $table->string('etat'); // 1 en cour, 2 terminée
            $table->timestamps();
        });

        Schema::table('missions', function (Blueprint $table) {
            $table->foreign('customer_id')->references('id')->on('customers')
             ->onDelete('cascade');
             $table->foreign('destination_id')->references('id')->on('destinations')
             ->onDelete('cascade');
        });

        Schema::create('commerce_media_report', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('mission_id')->unsigned();
            $table->string('image');
            $table->string('etat'); // 1 before, 2 after 
            $table->timestamps();
        }); 
        Schema::table('commerce_media_report', function ($table) {
           $table->foreign('mission_id')->references('id')->on('missions')
              ->onDelete('cascade');
        });

        Schema::create('equipement_history', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('mission_id')->unsigned();
            $table->integer('equipement_id')->unsigned();;
            $table->string('etat'); // 1 installed, 2 removed
            $table->timestamps();
        }); 
        Schema::table('equipement_history', function ($table) {
           $table->foreign('mission_id')->references('id')->on('missions')
              ->onDelete('cascade');
           $table->foreign('equipement_id')->references('id')->on('equipements')
              ->onDelete('cascade');
        });        

        Schema::create('mission_speakers', function (Blueprint $table) {
          $table->increments('id'); 
          $table->integer('mission_id')->unsigned()->nullable();            
          $table->integer('employee_id')->unsigned()->nullable();            
          $table->foreign('mission_id')->references('id')->on('missions')
              ->onDelete('cascade'); 
          $table->foreign('employee_id')->references('id')->on('users')
              ->onDelete('cascade');         
          $table->timestamps(); 
        });

        Schema::create('mission_equipements', function (Blueprint $table) {
          $table->increments('id'); 
          $table->integer('mission_id')->unsigned()->nullable();            
          $table->integer('equipement_id')->unsigned()->nullable();            
          $table->foreign('mission_id')->references('id')->on('missions')
              ->onDelete('cascade'); 
          $table->foreign('equipement_id')->references('id')->on('equipements')
              ->onDelete('cascade');         
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
        Schema::dropIfExists('categories');
        Schema::dropIfExists('customers');
        Schema::dropIfExists('providers');
        Schema::dropIfExists('equipements');
        Schema::dropIfExists('missions');
        Schema::dropIfExists('equipement_history');
        Schema::dropIfExists('commerce_media_report'); 
        Schema::dropIfExists('mission_speakers');
        Schema::dropIfExists('mission_equipements');
        Schema::dropIfExists('destinations');
    }
}
