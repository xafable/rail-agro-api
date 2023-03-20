<?php


namespace App\Services;

use Telegram\Bot\Api;
use Telegram\Bot\Exceptions\TelegramSDKException;

class Telegram
{
    public $client;

    function __construct(){
        $this->client = new Api(env('TELEGRAM_BOT_TOKEN',null));
    }

    function sendMessage($chatId, $message) : void {
        $this->client->sendMessage([
            'chat_id' => $chatId,
            'text' => $message
        ]);

    }












}
