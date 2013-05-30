<?php
/**
 * Script d'affichage des types d'utilisateurs
 * @package default
 * @todo  RAS
 */
$repInclude = './include/';
require($repInclude . "_init.inc.php");
require("mTypeCrud.php");

// page inaccessible si utilisateur non connecté
if (!estUtilisateurConnecte()) {
    header("Location: cSeConnecter.php");
}
require($repInclude . "_entete.inc.html");
require($repInclude . "_sommaire.inc.php");
?> 

<!-- Division principale -->
<div id="contenu">
<h1>Liste des types d'utilisateurs</h1>
<?php
var_dump ($_REQUEST);
If (isset ($_REQUEST['contenu']))
{
    If (!isset($_REQUEST['envoyer']))
    {     
	Switch ($_REQUEST['contenu'] )
        {
            Case 'saisirType' :
                require ('vFormulaireType.php') ;
                break ;
	    Case 'supprimerType' :
                include ('vMessageConfirmation.php');
                break ;
            Case 'modifierType' :
                require_once ('vFormulaireType.php') ;
                $_SESSION['codetype']= $_REQUEST['codeType'];
                break ;
        }
        $_SESSION['contenu'] = $_REQUEST['contenu'];
   }
   else
   { 
     MiseajourType($_SESSION['contenu'],$_REQUEST['codeType'],$_REQUEST['libelleType']); 
   }
}
 else
{
   $req = "SELECT * from type ";
   $RsTypes = mysql_query($req, $idConnexion);
    ?>       
     <table style="color:white;" border="1">
         <tr><th rowspan="1" style="vertical-align:middle;">Code type</th>
             <th rowspan="1" style="vertical-align:middle;">Libellé type</th>
         </tr>
         
         <?php
         while ($UnType = mysql_fetch_array($RsTypes)) {
                ?>
                <tr align="center">
                    <td style="width:80px;white-space:nowrap;color:black;"><?php echo $UnType['id'] ; ?></td>
                    <td style="width:80px;white-space:nowrap;color:black;"><?php echo $UnType['libelleType']; ?></td>
                    <TD>
                        <?php echo "<a href=vTypes.php?contenu=saisirType>ajouter</a>"; ?>
		    </TD>
                    <TD>
                        <?php echo "<a href=vTypes?contenu=supprimerType&codeType=".$UnType['id'].">supprimer</a>"; ?>
		     </TD>
                     <TD>     
                        <?php echo "<a href=vTypes.php?contenu=modifierType&codeType=".$UnType['id']."&libelleType=".$UnType['libelleType'].">modifier</a>"; ?>
		     </TD>
                </tr>
                <?php
            }
}

if (isset($_REQUEST['envoyer']))
{
    Switch ($_REQUEST['envoyer'])
    {
        Case 'valider' :
           MiseajourType($_SESSION['contenu'],$_REQUEST['codeType'],$_REQUEST['libelleType']);
           break ;
    }
}
?>
        </table>
</div>
