<?php

namespace App\Tests\Core;

use App\Core\CardGame;
use App\Core\Guess;
use PHPUnit\Framework\TestCase;

class GuessTest extends TestCase
{
  public function testDefaultValueWithHelp() {
    $cardGame = new CardGame(CardGame::factory32Cards());
    $guess = new Guess($cardGame);
    $this->assertTrue($guess->getWithHelp());
  }

}
