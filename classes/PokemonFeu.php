<?php
require_once 'Pokemon.php'; // Ensure to include the base class
require_once 'Pokemon.php'; // Ensure to include the AttackPokemon class

class PokemonFeu extends Pokemon {
    public function attack($opponent) {
        $attackPoints = $this->attackPokemon->getAttackPoints();
        $specialAttack = $this->attackPokemon->isSpecialAttack();

        $mult = 1;
        
        if ($opponent instanceof PokemonPlante) {
            $mult = 2; // Fire is strong against Plant
        } elseif ($opponent instanceof PokemonEau || $opponent instanceof PokemonFeu) {
            $mult = 0.5; // Fire is weak against Water & Fire
        }

        if ($specialAttack) {
            $attackPoints *= $this->attackPokemon->getSpecialAttack();
            echo "<strong>" . $this->name . "</strong> used a SPECIAL attack of <strong>" .  $attackPoints . "</strong> against <strong>" . $opponent->getName() . "</strong>!<br>";
        } else {
            echo "<strong>" . $this->name . "</strong> used a normal attack of <strong>" .  $attackPoints . "</strong> against <strong>" . $opponent->getName() . "</strong>!<br>";
        }

        $opponent->recieveDamage($attackPoints * $mult);
    }
}
?>
