<?php

namespace App\Listeners;

use App\Events\MessageCreated;
use App\Services\Telegram;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendNewMessageNotification
{

    protected $telegram;
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct(Telegram $telegram)
    {
        $this->telegram = $telegram;
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\MessageCreated  $event
     * @return void
     */
    public function handle(MessageCreated $event)
    {
        $message = "Новый запрос: "
            ."\nИмя: ".$event->message->name
            ."\nПочта: ".$event->message->email
            ."\nТелефон: ".$event->message->phone
            ."\nКомментарий: ".$event->message->comment;

        $this->telegram->sendMessage('433380489',$message);
    }
}
