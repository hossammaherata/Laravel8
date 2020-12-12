<?php

namespace App\Notifications;

use App\Models\Event;
use App\Models\UserEvent;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class EndNotif extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    private $event;
      private $name;
    public function __construct($name,UserEvent $event)
    {
        //
          $this->event=$event;
          $this->name=$name;
    }



    public function via($notifiable)
    {
        return ['database'];
    }


     public function toDatabase(){

     return[
     'id'=>$this->event->id,
     'title'=>'إنهاء جديد',
    'name'=>$this->name,
     'type'=>'end',
     'data'=>$this->event->created_at,
     ];
     }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
