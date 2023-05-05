<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class SendMailNewStudent extends Notification
{
    // use Queueable;
    protected $student;
    protected $password;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($student, $password)
    {
        $this->student = $student;
        $this->password = $password;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->line('Chào mừng bạn đã đến với HapoLearn')
                    ->line("Tài khoản đăng nhập: {$this->student->username}")
                    ->line("Mật khẩu: {$this->password}")
                    ->line('Vui lòng đăng nhập và thực hiện đổi mật khẩu');
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
