<?php


class Chat
{
  private $prenom;
  private $age;
  private $couleur;
  private $sexe;
  private $race;


  public function __construct($prenom, $age, $couleur, $sexe, $race){
    $this -> prenom = $prenom;
    $this -> age = $age;
    $this -> couleur = $couleur;
    $this -> sexe = $sexe;
    $this -> race = $race;
  }

  public function getPrenom(){
    return $this -> prenom;
  }
  public function setPrenom($value){
    //on vérifie le nombre de caractere
    if (strlen($value) >= 3 && strlen($value) <= 20 ){
      $this -> prenom = $value;
    }else{
      echo"erreur prenom";
    }
  }

  public function getAge(){
    return $this -> age;
  }
  public function setAge($value){
    if (is_int($value)){
      $this -> age = $value;
    }else{
      echo "erreur age";
    }
  }

  public function getCouleur(){
    return $this -> couleur;
  }
  public function setCouleur($value){
    if (strlen($value) >= 3 && strlen($value) <= 10 ){
      $this -> couleur = $value;
    }else {
      echo "erreur couleur";
    }
  }

  public function getSexe(){
    return $this -> sexe;
  }
  public function setSexe($value){
    if ($value === "male" || $value === "femelle" ){
      $this -> sexe = $value;
    }else {
      echo "erreur sexe";
    }
  }

  public function getRace(){
    return $this -> race;
  }
  public function setRace($value){
    if (strlen($value) >= 3 && strlen($value) <= 20 ){
      $this -> race = $value;
    }else {
      echo "erreur race";
    }
  }


  public function getInfos(){
    //création du tableau
    $array =
      "<table>
        <tr>
          <th>Prenom</th>
          <th>Age</th>
          <th>Couleur</th>
          <th>Sexe</th>
          <th>Race</th>
        </tr>
        <tr>
          <td>". $this -> prenom ."</td>
          <td>". $this -> age ."</td>
          <td>". $this -> couleur ."</td>
          <td>". $this -> sexe ."</td>
          <td>". $this -> race ."</td>
        </tr>
      </table>";
    echo $array;


  }
}

$chat1 = new Chat("chat1", 1, "rouge", "Femelle", "race2");
$chat1 ->setPrenom("chat3");
$chat1 ->setAge(1);
$chat1 ->setCouleur("rouge");
$chat1 ->setSexe("male");
$chat1 ->setRace("race1");
echo $chat1->getInfos();
$chat2 = new Chat("chat2", 2, "bleu", "Femelle", "race2");
echo $chat2->getInfos();
