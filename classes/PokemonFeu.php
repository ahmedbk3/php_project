<?php
include 'Pokemon.php'; // Ensure to include the base class

class PokemonFeu extends Pokemon {
    public function attack($opponent) {
        $attackPoints = $this->attackPokemon->getAttackPoints();
        if ($opponent instanceof PokemonPlante) {
            $attackPoints *= 2; // Fire is strong against Plant
        } elseif ($opponent instanceof PokemonEau) {
            $attackPoints *= 0.5; // Fire is weak against Water
        }
        $opponent->hp -= $attackPoints;
        return $attackPoints;
    }
}
?>
