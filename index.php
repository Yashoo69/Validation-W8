
<?php

spl_autoload_register(function ($class) {
    require 'classes/' . $class . '.php';
});

$player1 = new Warrior('Medivh');
$player2 = new Magician('Gul\'dan');
$player3 = new Archer('Sylvanas');
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="./css/index.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Baston</title>
</head>
<body>
    <main>
        <?php while ($player1->isAlive() && $player3->isAlive()): ?>
            <div class="Round">
            <p id="player1"><?= $player1->turn($player3) ?></p>
               <?php $result = "$player1->name a gagné !" ?>
                <?php if ($player3->isAlive()): ?>
                    <p id="player2"><?= $player3->turn($player1) ?></p>
                    <?php $result = "$player3->name a gagné !" ?>
                <?php endif ?>
            </div>
        <?php endwhile ?>
        <div class="result"><p><?= $result ?></p></div>
    </main>
</body>
</html>