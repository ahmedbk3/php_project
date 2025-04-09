<?php
require_once 'Pokemon.php'; // Ensure to include the base class

class PokemonPlante extends Pokemon {
    public function attack($opponent) {
        $attackPoints = $this->attackPokemon->getAttackPoints();
        $specialAttack = $this->attackPokemon->isSpecialAttack();

        $mult = 1;

        if ($opponent instanceof PokemonEau) {
            $mult = 2; // Plant is strong against Water
        } elseif ($opponent instanceof PokemonFeu || $opponent instanceof PokemonPlante) {
            $mult = 0.5; // Plant is weak against Fire & Plant
        }

        if ($specialAttack) {
            $attackPoints *= $this->attackPokemon->getSpecialAttack();
            echo "<strong>" . $this->name . "</strong> used a SPECIAL attack of <strong>" .  $attackPoints . "x" . $mult . "</strong> against <strong>" . $opponent->getName() . "</strong>!<br>";
        } else {
            echo "<strong>" . $this->name . "</strong> used a normal attack of <strong>" .  $attackPoints . "x" . $mult . "</strong> against <strong>" . $opponent->getName() . "</strong>!<br>";
        }

        $opponent->recieveDamage($attackPoints * $mult);
    }
}
?>
