<?php
require_once 'classes/Pokemon.php';
require_once 'classes/PokemonPlante.php';
require_once 'classes/PokemonEau.php';
require_once 'classes/PokemonFeu.php';
require_once 'classes/AttackPokemon.php';

$atk1 = new AttackPokemon(10, 5, 20, 50); // Attack points, min attack, special attack, probability of special attack
$atk2 = new AttackPokemon(15, 7, 25, 30); // Attack points, min attack, special attack, probability of special attack

$pokemon1 = new PokemonPlante("Bulbasaur", "https://img.pokemondb.net/artwork/bulbasaur.jpg", 100, $atk1);
$pokemon2 = new PokemonFeu("Charmander", "https://img.pokemondb.net/artwork/charmander.jpg", 100, $atk2);

echo "<h1>Combat Between " . $pokemon1->getName() . " And " . $pokemon2->getName() . "</h1>";
echo "<div style='display: flex; justify-content: space-around;'>";
echo "<div style='text-align: center;'>";
$pokemon1->whoAmI();
echo "</div>";
echo "<div style='text-align: center;'>";
$pokemon2->whoAmI();
echo "</div>";
echo "</div>";

echo "<h2>Combat Log:</h2>";
echo "<div style='border: 1px solid #ccc; padding: 10px; background-color: #333333; color: #eeeeee; border-radius: 15px; border: 1px solid #444444; width: 50%; margin: auto;'>";
$round = 1;
while (!$pokemon1->isDead() && !$pokemon2->isDead()) {
    echo "<h3>Round " . $round . "</h3>";
    $pokemon1->attack($pokemon2);
    if ($pokemon2->isDead()) {
        break;
    }
    $pokemon2->attack($pokemon1);
    if ($pokemon2->isDead()) {
        break;
    }
    echo "--------------------------------<br>";
    $round++;
}
echo "<h2>Combat Result:</h2>";
if ($pokemon1->isDead() && $pokemon2->isDead()) {
    echo "<p>Both Pokémon fainted!</p>";
} elseif ($pokemon1->isDead()) {
    echo "<p><strong>" . $pokemon2->getName() . "</strong> wins!</p>";
} else {
    echo "<p><strong>" . $pokemon1->getName() . "</strong> wins!</p>";
}

echo "</div>";

echo "</body>";
echo "</html>";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Combat Result</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #222222;
            color: #eeeeee;
            margin: 0;
            padding: 20px;
        }
        h1, h2, h3 {
            text-align: center;
        }
        .combat-log {
            border: 1px solid #ccc;
            padding: 10px;
            max-height: 300px;
            overflow-y: auto;
        }
    </style>
</head>