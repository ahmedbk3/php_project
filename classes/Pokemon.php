<?php
require_once 'classes/AttackPokemon.php';

class Pokemon {
    protected $name;
    protected $url;
    protected $hp;
    protected $attackPokemon;

    public function __construct($name, $url, $hp, AttackPokemon $attackPokemon) {
        $this->name = $name;
        $this->url = $url;
        $this->hp = $hp;
        $this->attackPokemon = $attackPokemon;
    }

    public function getName() {
        return $this->name;
    }
    public function getUrl() {
        return $this->url;
    }
    public function getHp() {
        return $this->hp;
    }
    public function getAttackPokemon() {
        return $this->attackPokemon;
    }
    
    public function setName($name) {
        $this->name = $name;
    }
    public function setUrl($url) {
        $this->url = $url;
    }
    public function setHp($hp) {
        $this->hp = $hp;
    }
    public function setAttackPokemon(AttackPokemon $attackPokemon) {
        $this->attackPokemon = $attackPokemon;
    }

    public function isDead() {
        if ($this->hp <= 0) {
            $this->setHp(0);
            return true;
        } else {
            return false;
        }
    }

    public function whoAmI() {
        echo "<h2>" . $this->name . "</h2><br>";
        echo "<img src='" . $this->url . "' alt='" . $this->name . "' style='width: 200px; height: 200px;'><br><br><br>";
        echo "<strong>HP: </strong>" . $this->hp . "<br><br>";
        echo "<strong>Attack Power: </strong>" . $this->attackPokemon->getAttackMaximal() . "<br><br>";
        echo "<strong>Min Attack Power: </strong>" . $this->attackPokemon->getAttackMinimal() . "<br><br>";
        echo "<strong>Special Attack: </strong>" . $this->attackPokemon->getSpecialAttack() . "<br><br>";
        echo "<strong>Special Attack Probability: </strong>" . $this->attackPokemon->getProbabilitySpecialAttack() . "%<br><br>";
    }

    public function attack(Pokemon $p) {
        $atkPower = $this->attackPokemon->getAttackPoints();

        if ($this->attackPokemon->isSpeacialAttack()) {
            $atkPower *= $this->attackPokemon->getSpecialAttack();
            echo "<strong>" . $this->name . "</strong> used a SPECIAL attack of <strong>" .  $atkPower . "</strong> against <strong>" . $p->getName() . "</strong>!<br>";
        } else {
            echo "<strong>" . $this->name . "</strong> used a normal attack of <strong>" .  $atkPower . "</strong> against <strong>" . $p->getName() . "</strong>!<br>";
        }

        $p->recieveDamage($atkPower);
    }

    public function recieveDamage($damage) {
        $this->hp -= $damage;
        if ($this->hp < 0) {
            $this->hp = 0;
        }
        echo "<strong>" . $this->name . "</strong> has <strong>" . $this->hp . "</strong> HP left!<br>";
        if ($this->isDead()) {
            echo "<strong>" . $this->name . "</strong> is dead!<br>";
        }
        echo "<br>";
    }
}
?>