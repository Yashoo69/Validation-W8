<?php

class Archer extends Character
{
    public $deathArrow = false ;
    
    public function __construct($name) {
        parent::__construct($name);
        $this->damage = 20;
        $this->arrow = 7;
    }

    public function turn($target) {
        $rand = rand(1, 10);
        if ($this->arrow == 0) {
            $status = $this->attackDague($target);
        } else if ($rand > 3 ) {
            $status = $this->attack($target);
        }else if ($rand <= 3 ) {
            $status = $this->deathArrow();
        }
        return $status;
    }

    public function deathArrow() {
        $this->deathArrow= true;
        $status = "$this->name touche son adversaire et lui inflige un coup critique ";
        return $status;
    }

    public function attack($target) {
        if ($this->deathArrow) {
            $this->deathArrow = false;
            $rand = rand(15, 30)/10;
            $critic = $this->damage * $rand;
            $target->setHealthPoints($critic);
            $this->arrow -= 1;
            $status = "$this->name tire une fleches puissante sur $target->name ! Il reste $target->healthPoints points de vie à $target->name !";
        } else{
            $target->setHealthPoints($this->damage);
            $this->arrow -= 1;
            $status = "$this->name tire une fleche sur $target->name ! Il reste $target->healthPoints points de vie à $target->name !";
        }
        return $status;
    }

    public function attackDague($target) {
        $target->setHealthPoints($this->damage/2);
        $status = "$this->name donne un coup de dague à $target->name ! Il reste $target->healthPoints points de vie à $target->name !";
        return $status;
    }
}