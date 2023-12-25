<?php

class Review {
    public $user_name;
    public $subject;
    public $text;
    public $evaluation;

    public function __construct ($user_name, $subject, $text, $evaluation) {
        $this ->user_name = $user_name;
        $this ->subject = $subject;
        $this ->text = $text;
        $this ->evaluation = $evaluation;
    }
}
