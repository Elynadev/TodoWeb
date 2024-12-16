<?php



namespace App\Mail;

use App\Models\Tache;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class RappelTache extends Mailable
{
    use Queueable, SerializesModels;

    public $tache;

    public function __construct(Tache $tache)
    {
        $this->tache = $tache;
    }

    public function build()
    {
        return $this->subject('Rappel de Tâche')
                    ->view('emails.RappelTache'); // Assurez-vous de créer cette vue
    }
}
