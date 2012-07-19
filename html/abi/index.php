<html>
<head>
  <link href="/stylesheets/getpacemaker.css" media="screen, projection" rel="stylesheet" type="text/css" />

  <!-- Bits for table sorting -->
  <script type= "text/javascript">/*<![CDATA[*/
		var skin = "clusterlabs";
		var stylepath = "/mwiki/skins";
		var wgContentLanguage = "en";
		var wgBreakFrames = false;
		/*]]>*/</script>
  <link rel="stylesheet" href="/mwiki/skins/common/shared.css" type="text/css" media="screen" />
  <link rel="stylesheet" href="/mwiki/skins/clusterlabs/main.css" type="text/css" media="screen" />
  <script type="text/javascript" src="/mwiki/skins/common/wikibits.js"><!-- wikibits js --></script>

</head>
<body>
  <?php include '../../html/banner-small.php' ?>
 <div id="inner-body">
   <div class="coda-slider" style="padding: 20px; width: 800px;">
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
  </div>
  </div>
  <script type="text/javascript">
var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
</script>
<script type="text/javascript">
try{
var pageTracker = _gat._getTracker("UA-8156370-1");
pageTracker._trackPageview();
} catch(err) {}</script>
</body>
</html>
