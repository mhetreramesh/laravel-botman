<?php

namespace App\Conversations;

use BotMan\BotMan\Messages\Attachments\Image;
use BotMan\BotMan\Messages\Attachments\Video;
use BotMan\BotMan\Messages\Outgoing\OutgoingMessage;
use Illuminate\Foundation\Inspiring;
use BotMan\BotMan\Messages\Incoming\Answer;
use BotMan\BotMan\Messages\Outgoing\Question;
use BotMan\BotMan\Messages\Outgoing\Actions\Button;
use BotMan\BotMan\Messages\Conversations\Conversation;

class BotmanConversation extends Conversation
{
    /**
     * First question
     */
    public function askReason()
    {
        $question = Question::create("Huh - you woke me up. What do you need?")
            ->fallback('Unable to ask question')
            ->callbackId('ask_reason')
            ->addButtons([
                Button::create('Account Details')->value('account'),
                Button::create('Channel Details')->value('channel'),
                Button::create('Tell a joke')->value('joke'),
                Button::create('Give me a fancy quote')->value('quote'),
            ]);

        return $this->ask($question, function (Answer $answer) {
            if ($answer->isInteractiveMessageReply()) {
                if ($answer->getValue() === 'account') {
                    $this->ask('Account number please?', function (Answer $response) {
                        $message = OutgoingMessage::create(':heavy_check_mark: *bold* `code` _italic_ ~strike~ '.$response->getText());
                        $this->say($message);
                    });
                } else if($answer->getValue() === 'channel') {
                    $this->say(Inspiring::quote());
                } else if($answer->getValue() === 'joke') {
                    $joke = json_decode(file_get_contents('http://api.icndb.com/jokes/random'));
                    //$attachment = new Image('http://thecatapi.com/api/images/get?format=src&type=gif&timestamp='.time());
                    $attachment = new Image('http://thecatapi.com/api/images/get?format=src&type=gif', [
                        'custom_payload' => true,
                        ]
                    );
                    $message = OutgoingMessage::create('_`'.$joke->value->joke.'`_', $attachment)->withAttachment($attachment);
                    $this->say($message);
                } else {
                    $this->say(Inspiring::quote());
                }
            }
        });
    }

    /**
     * Start the conversation
     */
    public function run()
    {
        $this->askReason();
    }
}
