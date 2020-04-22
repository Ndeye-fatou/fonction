<?php
// Une classe abstraite contient forcement une methode abstraite 
    abstract class Figure{

         //Attributs Instances 
         private $longueur; 
         //Attributs classe ou Attributs static
         private static $unite;

         //Getters Setters  methodes static concretes
         public static function getUnite(){
            return self::$unite;
         }
         public static function setUnite($unite){
            self::$unite=$unite;
         }

        //metiers=>UC
         public abstract function demiPerimetre();
         public abstract function perimetre();
         public abstract function surface();
         public abstract function diagonale();
    }
        $fig=new Figure();//Impossible car figure est une classe abstraite  

?>
