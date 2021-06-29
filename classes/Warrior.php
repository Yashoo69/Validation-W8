<?php

class Warrior extends Character
{
    public function turn($target) {
        return $this->attack($target);
    }

    public function attack($target) {
        $damage = rand(15, 25);
        $target->setHealthPoints($damage);
        $status = "$this->name lance Fulgurance sur $target->name et inflige $damage points de dégats ! Il reste $target->healthPoints points de vie à $target->name !";
        return $status;
    }
}
