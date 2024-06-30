<?php


use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCandidatesTable extends Migration
{
    public function up()
    {
        Schema::create('candidates', function (Blueprint $table) {
            $table->id();
            $table->string('last_name'); // Nom
            $table->string('first_name'); // Prénom
            $table->date('birth_date'); // Date naissance
            $table->string('country'); // Pays
            $table->string('city'); // Ville
            $table->enum('sex', ['Male', 'Female', 'other']); // Sexe
            $table->string('email')->unique(); // Email
            $table->string('password'); // Mot de passe
            $table->string('cv_path')->nullable(); // Attacher CV
            $table->string('photo_path')->nullable(); // Attacher photo
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('candidates');
    }
}
