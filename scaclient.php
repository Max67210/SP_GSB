<html><title>SCA Client Testing</title><head></head><body>
<?php // Sample SCA client call to TOUPPER Tuxedo service
//dl("sca.so");

$error = false;
$Data = "";

if (count($_POST) > 0) { // process the submitted form
  // do some simple field checking first...
  
  // make certain something is entered in the String field
  if (trim($Data=$_POST['String']) == '') {
    $error = true;
    echo "<div style=\"color:red;\">No string was entered.</div>\n";
    }
    
  if (!$error) { // Display the correct data
    putenv("SCA_COMPONENT=php.client");
    $toupSvc = Sca::locateService("TESTTUX");
    $ret = $toupSvc->callToup($Data);
    echo "<p>The data you submitted was:</p>\n" .
         "<p>String: <b>$Data</b><br>Service return value: <b>$ret</b></p>\n";
    echo "<FORM><INPUT TYPE='button' VALUE='Back' onClick='history.go(-1);return true;'></FORM>";
  }
}

// If there was an error, or the form wasn't submitted,
//   display the form
if ($error OR count($_POST) == 0)
  echo <<< EOT
<form method="post" action="">
 &nbsp; &nbsp;Enter a lowercase string: <input name="String" value="$Data" /><br />
<input type="submit" name="Send" value="Invoke TOUPPER" />
</form>

EOT;
  
?>
</body></html>
