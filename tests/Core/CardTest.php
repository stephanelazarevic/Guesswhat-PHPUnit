<?php

namespace App\Tests\Core;

use App\Core\CardGame;
use PHPUnit\Framework\TestCase;
use App\Core\Card;

class CardTest extends TestCase
{

  public function testName()
  {
    $card = new Card('As', 'Trèfle');
    $this->assertEquals('As', $card->getName());
    $card = new Card('2', 'Trèfle');
    $this->assertEquals('2', $card->getName());

  }

  public function testColor()
  {
    $card = new Card('As', 'Trèfle');
    $this->assertEquals('Trèfle', $card->getColor());
    $card = new Card('As', 'Pique');
    $this->assertEquals('Pique', $card->getColor());
  }

  public function testCompareSameCard()
  {
    $cards1 = new Card('As', 'Trèfle');
    $cards2 = new Card('As', 'Trèfle');
    $this->assertEquals(0, CardGame::compare($cards1,$cards2));
  }

  public function testCompareSameNameNoSameColor()
  {
    // TODO
    // $this->fail("not implemented !");

    $card1 = new Card('As', 'trèfle');
    $card2 = new Card('As', 'pique');
    $this->assertEquals(-1, CardGame::compare($card1,$card2));

  }

  public function testCompareNoSameNameSameColor()
  {
    // TODO
    // $this->fail("not implemented !");

      $card1 = new Card('Roi', 'trèfle');
      $card2 = new Card('As', 'trèfle');
      $this->assertEquals(-1, CardGame::compare($card1,$card2));

  }

  public function testCompareNoSameNameNoSameColor()
  {
    // TODO
    // $this->fail("not implemented !");

      $card1 = new Card('Roi', 'Pique');
      $card2 = new Card('As', 'trèfle');
      $this->assertEquals(-1, CardGame::compare($card1,$card2));

  }

  public function testToString()
  {
    // TODO vérifie que la représentation textuelle
    // d'une carte est conforme à ce que vous attendez
    $card = new Card('2', 'pique');
    $this->assertEquals("2 de pique", $card->__toString());
  }

}
