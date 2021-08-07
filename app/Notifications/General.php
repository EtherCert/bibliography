<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\User;

class General extends Notification
{
    use Queueable;
    protected $notification_message;
    protected $icon;
    protected $url;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($notification_message, $icon, $url)
    {
        //نرسل هنا شو اللي صار مثلا سجل مستخدم جديد لذلك انا بدي امرر لكنستراكتور باراميتر لنبين شو اليوزر اللي ت انشاؤه مثلا
        //شو في باراميتر بدنا نرسلها للاشعارات نرسلها من خلال الباراميتر
        $this->notification_message = $notification_message;
        $this->icon = $icon;
        $this->url = $url;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        //هنا شو القنوات اللي بدي ارسل عليها اشعارات
        //return ['mail','database','nexmo','broadcast','slack'];
        //return ['mail','database'];
        return ['database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
//        $message = new MailMessage;
//        
//                    $message->greeting('Hello'. $notifiable->name)
//                    ->line('The introduction to the notification.') // paragraf
//                    ->action('Notification Action', url('/'))
////                    ->view('mails.newpost',['post'=>$this->post])
//                    ->line('Thank you for using our application!');
//        return $message;
    }
//$notifiable لمين ارسل الاشعار معناها
    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toDatabase($notifiable) //= to database
    {
        //$notifiable   يعني مين حيستقبل الرسالة لمين ارسل الاشعار معناها

        return [
            'icon'    => $this->icon,
            'message' => $this->notification_message,
            'url'     => $this->url,
        ];
    }    
    
    public function toArray($notifiable) //= to database or broacast
    {
      
        return [
            'icon'    => $this->icon,
            'message' =>$this->notification_message,
            'url'     => $this->url,
        ];
    }
}
