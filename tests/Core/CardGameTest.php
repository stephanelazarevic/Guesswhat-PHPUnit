<?php

namespace App\Tests\Core;

use App\Core\Card;
use App\Core\CardGame;
use PHPUnit\Framework\TestCase;
use function Sodium\compare;

class CardGameTest extends TestCase
{

  public function testToString2Cards()
  {
    $jeudecarte = new CardGame([new Card('As', 'Pique'), new Card('Roi', 'Coeur')]);
    $this->assertEquals('CardGame : 2 carte(s)',$jeudecarte->__toString());
  }

  public function testToString1Card()
  {
    $jeudecarte = new CardGame([new Card('As', 'Pique')]);
    $this->assertEquals('CardGame : 1 carte(s)',$jeudecarte->__toString());
  }

  public function testCompare()
  {
    $cards1 = new Card('Roi', 'Coeur');
    $cards2 = new Card('Roi', 'Coeur');
    $this->assertEquals('0', CardGame::compare($cards1, $cards2));
  }

  public function testShuffle()
  {
    $cards1 = new Card('Roi', 'Trèfle');
    $cards2 = new Card('As', 'Coeur');
    $cards3 = new Card('10', 'Pique');
    $jeuDeCartes = new CardGame([$cards1, $cards2, $cards3]);
    $this->assertNotEquals($jeuDeCartes, $jeuDeCartes->shuffleCard());

  }

  public function testGetCard()
  {
    $card1 = new Card('2', 'Pique');
    $card2 = new Card('3', 'Coeur');
    $card3 = new Card('4', 'Trefle');
    $jeudecarte = new CardGame([$card1, $card2, $card3]);
    $this->assertEquals($card2,$jeudecarte->getCard(1));

  }

  public function testFactoryCardGame32()
  {
     $jeuDe32 = CardGame::factory32Cards();
     $this->assertEquals('32', '32', 'correct !');
  }

    public function testReOrder()
    {
        $card1 = new Card('4', 'Coeur');
        $card2 = new Card('8', 'Pique');
        $card3 = new Card('2', 'Trèfle');
        $jeuDeCartes = new CardGame([$card1, $card2, $card3]);
        $this->assertNotEquals($jeuDeCartes, $jeuDeCartes->reOrder());
    }

}
