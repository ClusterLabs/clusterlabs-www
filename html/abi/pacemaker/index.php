<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
<?php include "../../header.html" ?>
        <title>Cluster Labs - Packages for Pacemaker 1.0.x</title>
        <meta name="description" content="">
     </head>
     <body>
<?php include "../../banner.html" ?>

     <section id="main">
<p>
This page details the ABI compatability between the listed <a href="http://www.clusterlabs.org/wiki/Pacemaker">Pacemaker</a> versions.

The reports are generated with the <a href="http://forge.ispras.ru/projects/abi-compliance-checker">ABI Compliance Checker</a> that ships with <a href="fedoraproject.org">Fedora</a>
</p>
<?php

  echo "<table align=center class=\"wikitable sortable\" style=\"width:75%;\" cellpadding=1>";
  echo "<caption>";
  echo "<a name=\"ABI_table\" id=\"ABI_table\"></a><h3><span class=\"mw-headline\"> ABI Compatability Table </span></h3>";
  echo "<p></caption>";
  echo " <tr>";
  echo "  <th>Version</th>";
  echo "  <th>Reference Version</th>";
  echo "  <th>Status</th>";
  echo "  <th>Report</th>";
  echo " </tr>";

  foreach (glob("*/abi_compat_report.html") as $item) {
     $report = dirname($item);

    $status = "<td> </td>";
    $file_handle = fopen("$item", "r");
    while (!feof($file_handle)) {
	$line = fgets($file_handle);
	if(strstr($line, "Verdict")) {
	    $status = preg_replace("/.*<td>/", "<td>", $line);
	    $status = preg_replace("/<\/td>.*/", "</td>", $status);
	    break;
	}
    }
    fclose($file_handle);    


     $v = explode("_", $report);
     if( count($v) == 3) {
       echo " <tr align=center>";
       echo "  <td> v$v[2] </td>";
       echo "  <td> v$v[0] </td>";
       echo "  $status";
       echo "  <td><a href=$item>report</a></td>";
       echo " </tr>";
     }
  }
  echo "</table>";
?>
     </section>	
     
<?php include "../../footer.html" ?>
    </body>
</html>
