<?php

namespace App\Notifications;

use App\Models\Tache;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;

class TaskReminderNotification extends Notification
{
    use Queueable;

    protected $tache;

    public function __construct(Tache $tache)
    {
        $this->tache = $tache;
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('Rappel de Tâche')
            ->greeting('Bonjour!')
            ->line('Cette tâche approche de sa date limite.')
            ->line('Titre : ' . $this->tache->titre)
            ->line('Description : ' . $this->tache->description)
            ->line('Date Limite : ' . $this->tache->date_limite->format('d/m/Y'))
            ->action('Voir la Tâche', url('/taches/' . $this->tache->id))
            ->line('Merci de prendre les mesures nécessaires!');
    }
}
