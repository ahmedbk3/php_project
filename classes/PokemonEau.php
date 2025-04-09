<?php
include 'Pokemon.php'; // Ensure to include the base class

class PokemonEau extends Pokemon {
    public function attack($opponent) {
        $attackPoints = $this->attackPokemon->getAttackPoints();
        if ($opponent instanceof PokemonFeu) {
            $attackPoints *= 2; // Water is strong against Fire
        } elseif ($opponent instanceof PokemonPlante) {
            $attackPoints *= 0.5; // Water is weak against Plant
        }
        $opponent->hp -= $attackPoints;
        return $attackPoints;
    }
}
?>
