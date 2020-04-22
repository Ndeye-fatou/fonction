<?php
class Validator {
    
    private $errors=[];

    public function getErrors(){
         return $this->errors;
    }

    public function is_valid(){
       return count($this->errors)===0;
    }

 // Longueur et Largueur doivent etre numeric(entier,reel)
 public function is_number($nombre,$key,$errorMessage="Veuiller saisir un nombre"){
    if(!is_numeric($nombre)){
        $this->errors[$key]= $errorMessage;
    }
}

/*
  Longueur positif
  Largeur positif
*/
public function is_positif($nombre,$key,$errorMessage="Veuiller saisir un nombre positif"){
                 $this->is_number($nombre,$key);
                   if($this->is_valid()){
                      if($nombre<=0){
                        $this->errors[$key]= $errorMessage;
                      }
                    }
                   
}

/**
*   Longueur> Largeur
*/
//compare()
//Nbre1 =>plus grand
//Nbre2 =>plus petit
public function compare($nbre1,$nbre2,$key1,$key2,$errorMessage="Longueur doit superieur à la Largeur"){
   is_positif($nbre1,$key1);
   is_positif($nbre2,$key2);
   
   if($this->is_valid()){
           if($nbre1<=$nbre2){
              $this->errors['all']=$errorMessage;
           }
   }

}

    public function  is_empty($nbre,$key,$sms=null){
    if(empty($nbre)){
        if($sms==null){
            $sms="Le Nombre  est Obligatoire";
        }
        $this->errors[$key]= $sms;

        }
    }
    //Expression régulières
    public function  is_email($valeur,$key,$sms=null){
        if(empty($valeur)){
            if($sms==null){
                $sms="L'Email est obligatoire";
            }
            if(!preg_match("azertyuiopsdfghjklmwxcvbn&é(-è_çà)1234567890"."@"."azertyuiopqsdfghjklmwxcvbn"."wxcvbnqsdfghjklmazertyuiop")){   
                $sms="Veillez saisir un bon Email"

            }
        }
        $this->errors[$key]=$sms;

    }
    //9chiffres , commence par 77,78,75,76,70
    public function  is_telephone($valeur,$op,$key,$sms=null){
      if(empty($valeur)){
        if($sms==null){
          $sms="Le numéro de téléphone est obligatoire";
        }
        $valeur=substr($valeur,6);
        $op=substr($valeur,2);

        if(!($op="77" || $op="78" || $op="75" || $op="76" || $op="70")){
            $sms="L'opérateur n'exixte pas";
        }else{
          return $valeur;
        }
        
      
      }
      $this->errors[$key]=$sms;

    }

?>