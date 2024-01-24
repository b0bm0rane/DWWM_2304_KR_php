<?php
namespace App;
class Card {
  // déclaration d'une propriété
  public $test = "test avec autoload";

  function __construct($question, $answer) {
    $this->question = $question;
    $this->answer = $answer;
    $this->date = new \DateTime();
  }

  // déclaration des méthodes
  public function dumpQuestion() {
    echo $this->question;
  }
}
