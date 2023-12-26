<?php

class Review {
    public $id;
    public $user_name;
    public $subject;
    public $text;
    public $evaluation;

    public function __construct ($id, $user_name, $subject, $text, $evaluation) {
        $this -> id = $id;
        $this -> user_name = $user_name;
        $this -> subject = $subject;
        $this -> text = $text;
        $this -> evaluation = $evaluation;
    }
}
