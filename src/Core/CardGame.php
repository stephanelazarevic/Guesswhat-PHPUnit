<?php

namespace App\Core;

use phpDocumentor\Reflection\Types\Integer;

/**
 * Class CardGame : un jeu de cartes.
 * @package App\Core
 */
class CardGame
{
  /**
   * Relation d'ordre sur les couleurs
   */
   const ORDER_COLORS=['trèfle'=> 1, 'carreau'=>2, 'coeur'=>3, 'pique'=>4 ];
   const ORDER_NAME=['2' => 1,'3' => 2,'4' => 3,'5' => 4,'6' => 5,'7' => 6,'8' => 7,'9' => 8,'10' => 9,'valet' => 10,'dame' => 11,'roi' => 12,'as' => 13];


  /**
   * @var $cards array of Cards
   */
  private $cards;

  /**
   * Guess constructor.
   * @param array $cards
   */
  public function __construct(array $cards)
  {
    $this->cards = $cards;
  }

  /**
   * Brasse le jeu de cartes
   */
  public function shuffleCard(): array
  {
    // TODO (voir les fonctions sur les tableaux)
    $result = shuffle($this->cards);
    return $this->cards;
  }

  // TODO ajouter une méthode reOrder qui remet le paquet en ordre

  public function reOrder()
  {
      $orderCard = usort($this->cards, array($this, "compare"));
      return $this->cards;
  }

  /** définir une relation d'ordre entre instance de Card.
   * à valeur égale (name) c'est l'ordre de la couleur qui prime
   * pique > coeur > carreau > trèfle
   * Attention : si AS de Coeur est plus fort que AS de Trèfle,
   * 2 de Coeur sera cependant plus faible que 3 de Trèfle
   *
   *  Remarque : cette méthode n'est pas de portée d'instance (static)
   *
   * @see https://www.php.net/manual/fr/function.usort.php
   *
   * @param $c1 Card
   * @param $c2 Card
   * @return int
   * <ul>
   *  <li> zéro si $c1 et $c2 sont considérés comme égaux </li>
   *  <li> -1 si $c1 est considéré inférieur à $c2</li>
   * <li> +1 si $c1 est considéré supérieur à $c2</li>
   * </ul>
   *
   */

  public static function compare(Card $c1, Card $c2) : int
  {
    // TODO code naïf : il faudrait prendre en compte la relation d'ordre sur la couleur et le nom

    $card1Name = self::ORDER_NAME[strtolower($c1->getName())];
    $card1Color = self::ORDER_COLORS[strtolower($c1->getColor())];
    $card2Name = self::ORDER_NAME[strtolower($c2->getName())];
    $card2Color = self::ORDER_COLORS[strtolower($c2->getColor())];

    if ($card1Name < $card2Name){
        return -1;
    }
    else if ($card1Name === $card2Name && $card1Color < $card2Color) {
        return -1;
    }
    else if ($card1Name === $card2Name && $card1Color === $card2Color) {
        return 0;
    }
    else if ($card1Name === $card2Name && $card1Color > $card2Color) {
        return 1;
    }
    else if ($card1Name > $card2Name) {
        return 1;
    }

  }

  /**
   * Création automatique d'un paquet de 32 cartes
   * (afin de simplifier son instanciation)
   * @return array of Cards
   */
  public static function factory32Cards() : array {
     // TODO création d'un jeu de 32 cartes
    $cards = [];

    foreach (self::ORDER_COLORS as $uneCouleur){
        foreach (self::ORDER_NAME as $unNom){
            if ($unNom >= 6){
                $card = new Card($unNom, $uneCouleur);
                $cards[] = $card;
            }
        }
    }

      return $cards;

  }

  // TODO manque PHPDoc avec pré-condition sur les valeurs acceptables de $index
    public function getCard(int $index) : Card {
        if ($index >= 0 && $index <= count($this->cards)) {
            return  $this->cards[$index];
        }
    }


  /**
   * @see https://www.php.net/manual/fr/language.oop5.magic.php#object.tostring
   * @return string
   */
  public function __toString()
  {
    return 'CardGame : '.count($this->cards).' carte(s)';
  }

}

