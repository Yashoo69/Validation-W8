<?php

class Archer extends Character
{
    public $deathArrow = false;

    
    public function __construct($name) {
        parent::__construct($name);
        $this->damage = 25;
        $this->arrow = 15;
    }


    public function turn($target) {
        $rand = rand(1, 10);
        if ($this->arrow == 0) {
            $status = $this->daggerAttack($target);
        } else if ($rand > 3 ) {
            $status = $this->attack($target);
        }else if ($rand <= 3 ) {
            $status = $this->deathArrow();
        }
        return $status;
    }

    
    public function daggerAttack($target) {
        $damage = 10; 
        $target->setHealthPoints($damage);
        $status = "$this->name lance une Frappe Latérale à $target->name ! Il reste $target->healthPoints points de vie à $target->name !";
        return $status;
    }


    public function deathArrow() {
        $this->deathArrow= true;
        $status = "$this->name touche son adversaire avec un Tir Mortel, et lui inflige un coup critique !";
        return $status;
    }


    public function attack($target) {
        if ($this->deathArrow) {
            $this->deathArrow = false;
            $rand = rand(10, 30)/10;
            $DamageCritic = $this->damage * $rand;
            $target->setHealthPoints($DamageCritic);
            $this->arrow -= 1;
            $status = "$this->name lance Morsure de mangouste sur $target->name et inflige $DamageCritic points de dégats ! Il reste $target->healthPoints points de vie à $target->name !";
        } else{
            $target->setHealthPoints($this->damage);
            $this->arrow -= 1;
            $status = "$this->name lance un Tir du Cobra sur $target->name et inflige $this->damage points de dégats ! Il reste $target->healthPoints points de vie à $target->name !";
        }
        return $status;
    }

}