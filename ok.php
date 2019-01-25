


<?php
/*Inclusion d'un fichier de configuration pour centraliser les informations de connexion*/
require_once 'okindentifiant.php';


  $ecrit = file_get_contents('php://input');
  $decode=json_decode($ecrit);
  if (! $decode) {
    http_response_code(415);
  }
  elseif (! $decode->temperature || ! $decode->humidite) {
    http_response_code(400);
  }
  else {
    $fichier=fopen("data.json","w");
    fwrite($fichier,$ecrit);
    fclose($fichier);
  }



  
$daate=date("Y/m/d h:i:sa");





		/*Essai de connexion en créant on objet connexion avec les informations de la BDD*/
		try {
		    $bdd = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
		    echo "Connected to $dbname at $host successfully.";

        $req = $bdd->prepare('INSERT INTO temp (temp, humidite, daate)'.'VALUES (:temp, :humidite, :daate)');

        $req->execute(array('temp' => ''.$decode->temperature,
                            'humidite' => ''.$decode->humidite,
                            'daate'=>''.$daate));


        $req=null;
        $bdd=null;

		    //Fermer la connexion SQL (si absent, automatique à la fin du script)

		}

		/*Si erreur ou exception, interception du message*/
		 catch (PDOException $pe) {
		    die("Could not connect to the database $dbname :" . $pe->getMessage());
		}
        ?>
