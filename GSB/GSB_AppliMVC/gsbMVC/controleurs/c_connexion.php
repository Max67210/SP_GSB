<?php
if(!isset($_REQUEST['action'])){
	$_REQUEST['action'] = 'demandeConnexion';
}
$action = $_REQUEST['action'];
switch($action){
	case 'demandeConnexion':{
		include("vues/v_connexion.php");
		break;
	}
	case 'valideConnexion':{
		$login = $_REQUEST['login'];
		$mdp = $_REQUEST['mdp'];
                $_SESSION['ancienMdp'] = $mdp;
                $pdo->RecupererGroupe($login,$mdp);
		$visiteur = $pdo->getInfosVisiteur($login,$mdp);
                echo "<div style='padding-left:170px;color:red;font-weight:bold;'>";
                echo "Bienvenue sur GSB"."</div>";
		if(!is_array( $visiteur)){
			ajouterErreur("Login ou mot de passe incorrect");
			include("vues/v_erreurs.php");
			include("vues/v_connexion.php");
		}
		else{
			$id = $visiteur['ID'];
			$nom =  $visiteur['NOM'];
			$prenom = $visiteur['PRENOM'];
			connecter($id,$nom,$prenom);
			include("vues/v_sommaire.php");
		}
		break;
	}
	default :{
		include("vues/v_connexion.php");
		break;
	}
}
?>