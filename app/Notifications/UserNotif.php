<?php

namespace App\Notifications;

use App\Models\AllNot;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class UserNotif extends Notification
{
     use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
      private $allNot;
      private $title;
    public function __construct(AllNot $allnot)
    {
        //
          $this->allNot=$allnot;
          $this->title=$allnot->title;
    }



    public function via($notifiable)
    {
        return ['database'];
    }


     public function toDatabase(){

     return[
     'id'=>$this->allNot->id,
     'title'=>$this->title,
     'type'=>'message',
     'data'=>$this->allNot->created_at,
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
