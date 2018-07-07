<?php

namespace App\Conversations;

use Illuminate\Foundation\Inspiring;
use BotMan\BotMan\Messages\Incoming\Answer;
use BotMan\BotMan\Messages\Outgoing\Question;
use BotMan\BotMan\Messages\Outgoing\Actions\Button;
use BotMan\BotMan\Messages\Conversations\Conversation;

class THCQuestionConversation extends Conversation
{
    public function askQuestion()
    {
        $question = Question::create("Mission - how do you knows our mission & key focus area?")
            ->fallback('Unable to ask question')
            ->callbackId('thc_question1')
            ->addButtons([
                Button::create('Red')->value('red')->additionalParameters(['style' => 'danger']),
                Button::create('Yellow')->value('yellow')->additionalParameters(['style' => 'default']),
                Button::create('Green')->value('green')->additionalParameters(['style' => 'primary']),
            ]);

        return $this->ask($question, function (Answer $answer) {
            if ($answer->isInteractiveMessageReply()) {
                if ($answer->getValue() === 'red') {
                    $this->say('Red');
                } elseif($answer->getValue() === 'yellow') {
                    $this->say('Yellow');
                } else {
                    $this->say('Green');
                }
            }
        });
    }

    public function run()
    {
        $this->askQuestion();
    }
}
