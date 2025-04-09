<?php
include 'Pokemon.php'; // Ensure to include the base class

class PokemonPlante extends Pokemon {
    public function attack($opponent) {
        $attackPoints = $this->attackPokemon->getAttackPoints();
        if ($opponent instanceof PokemonEau) {
            $attackPoints *= 2; // Plant is strong against Water
        } elseif ($opponent instanceof PokemonFeu) {
            $attackPoints *= 0.5; // Plant is weak against Fire
        }
        $opponent->hp -= $attackPoints;
        return $attackPoints;
    }
}
?>
