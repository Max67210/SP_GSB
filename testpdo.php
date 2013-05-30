<?php
try {
    $dbh = new PDO('oci:dbname=localhost/XE', 'hr', 'welcome');

    $stmt = $dbh->query('SELECT * from departments');
    
    $rs = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if($rs) {
        print "<table border='1'>\n";
	foreach ($rs as $row) {
	  print "<tr>\n";
	  foreach ($row as $item) {
	    print "    <td>" . ($item !== null ? htmlentities($item, ENT_QUOTES) : "&nbsp;") . "</td>\n";
	  }
	  print "</tr>\n";
        }
        print "</table>\n";
    } 

    $dbh = null;
} 
    catch (PDOException $e) {
    trigger_error("Could not connect to database: ". $e->getMessage(), E_USER_ERROR);
}
?>