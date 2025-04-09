<?php
require_once 'Pokemon.php'; // Ensure to include the base class

class PokemonEau extends Pokemon {
    public function attack($opponent) {
        $attackPoints = $this->attackPokemon->getAttackPoints();
        $specialAttack = $this->attackPokemon->isSpecialAttack();

        $mult = 1;
        
        if ($opponent instanceof PokemonFeu) {
            $attackPoints *= 2; // Water is strong against Fire
        } elseif ($opponent instanceof PokemonPlante || $opponent instanceof PokemonEau) {
            $attackPoints *= 0.5; // Water is weak against Plant & Water
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
