<?php

/**
 * formulaire pour modification/saisie d'un type d'utilisateur
 * @package default
 * @todo  RAS
 */

?>

<form action="vTypes.php" method="POST">
        <div>
            <label for="pseudo">Code type :</label> 
            <input type="text" name="codeType"  value="<?php if(!empty($_REQUEST['codeType'])) : echo htmlspecialchars($_REQUEST['codeType'], ENT_QUOTES); endif; ?>" />
            <label for="message">Libelle type :</label> 
            <input type="text"  name="libelleType" value="<?php if (!empty($_REQUEST['libelleType'])) : echo htmlspecialchars($_REQUEST['libelleType']); endif; ?>" />
            <br> <br>
            <input type="submit" name="envoyer" value="Valider" />
            <input type="submit" name="envoyer" value="Annuler" />
        </div>
</form>

