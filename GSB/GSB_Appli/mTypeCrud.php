<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

Function MiseajourType($NatureModification, $NumeroType,$LibelleType) 
{
  /* Contrôle du formulaire
  //ListeErreurs($TablisteErreurs);
  // Si aucune erreur n'a été générée on enregistre le message dans la BDD
  //if (0 === sizeof($TablisteErreurs))
  //{
    //Initialisation de la connexion avec la base de données
    //$oPDO = PDOConnect(DB_DSN, DB_LOGIN, DB_PASSWORD);
    $req = "SELECT * from type ";
    $RsTypes = mysql_query($req, $idConnexion);
    try
    {
  */
      if ($NatureModification == "saisirType")
      {
      // Création d'une requête préparée
      $req = 'INSERT INTO type VALUES ('.$NumeroType.','.$LibelleType.')';
      }
      else 
       { if ($NatureModification == "modifierType") 
         {
          $req = 'update type set NumeroType = '.$NumeroType.', LibelleType = '.$LibelleType.' where numerotype = '.$NumeroType;
         }
         else
         {
             $req = 'delete from type where numerotype = '.$NumeroType;
         }
       };
       echo $NatureModification.$req;
       mysql_query($req, $idConnexion);
      /*
       {
     
         $oPDOStatement = $oPDO->prepare(
          'update '. DB_GUESTBOOK_TABLE .' set pseudo=:pseudo, message=:message, note=:note, creation=NOW() where id = :numero');
         $oPDOStatement->bindParam(':numero', $NumeroMessage, PDO::PARAM_INT);
      };
     
       // Ajout de chaque paramètre à la requête
      // Les paramètres sont automatiquement protégés par l'objet PDO
      $oPDOStatement->bindParam(':pseudo', $_POST['pseudo'], PDO::PARAM_STR);
      $oPDOStatement->bindParam(':message', $_POST['message'], PDO::PARAM_STR);
      $oPDOStatement->bindParam(':note', $_POST['note'], PDO::PARAM_INT);
 
      // Execution de la requête préparée
      $oPDOStatement->execute();
      $TablisteErreurs[] = "Votre message vient d'être ajouté/modifié dans le livre d'or à ".time() ;
     }
     
  
    catch (PDOException $oPdoException)
    {
      $TablisteErreurs[] = 'Une erreur est survenue et a empêché l\'enregistrement de votre message';
    }
    // Fermeture de la connexion SQL
    $oPDOStatement = null;
    $oPDO = null;
    }
       */
}
?>
