<?php
class AttackPokemon {
    private $attackMinimal;
    private $attackMaximal;
    private $specialAttack;
    private $probabilitySpecialAttack;

    public function __construct($attackMinimal, $attackMaximal, $specialAttack, $probabilitySpecialAttack) {
        $this->attackMinimal = $attackMinimal;
        $this->attackMaximal = $attackMaximal;
        $this->specialAttack = $specialAttack;
        $this->probabilitySpecialAttack = $probabilitySpecialAttack;
    }

    public function getAttackPoints() {
        return rand($this->attackMinimal, $this->attackMaximal);
    }

    public function useSpecialAttack() {
        return (rand(1, 100) <= $this->probabilitySpecialAttack) ? $this->specialAttack : 0;
    }
}
?>
