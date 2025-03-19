<?php
class Etudiant{
    public string $nom;
    private float $info,$math;
    public function __construct(string $nom,$math,float $info) {
        $this->nom = $nom;
        $this->math = $math;
        $this->info = $info;
    }
    public function __get(string $name){
        return $this->$name;
    }
    public function __serialize(){
        return $this->toArray();
    }
    public function __unsterilize(array $data):void{
        $this->nom = $data['nom'];
        $this->math = $data['math'];
        $this->info = $data['info'];
    }
    public function toArray():array {
        return ["nom"=>$this->nom,"math"=>$this->math,"info"=>$this->info];
    }
    public function calcul_moyenne(){
        return ($this->math + $this->info)/2;
    }
}