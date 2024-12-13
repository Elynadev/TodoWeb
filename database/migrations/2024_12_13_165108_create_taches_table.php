

<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTachesTable extends Migration
{
    public function up()
    {
        Schema::create('taches', function (Blueprint $table) {
            $table->id(); // Identifiant unique
            $table->string('titre'); // Titre de la tâche
            $table->text('description')->nullable(); // Description de la tâche
            $table->enum('statut', ['en cours', 'terminé']); // Statut de la tâche
            $table->date('date_limite'); // Date limite de la tâche
            $table->timestamps(); // Champs created_at et updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('taches'); // Supprimer la table si elle existe
    }
}
