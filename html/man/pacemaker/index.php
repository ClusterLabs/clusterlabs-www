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

     <section id="toc">
     <h1>Table of Contents</h1>

<?php
     function get_desc($man) 
{
    
$file_handle = fopen($man, "r");
$done = 0;

while (!feof($file_handle)) {
    $line = fgets($file_handle);
    if(strstr($line, 'h2>DESCRIPTION')) {
	$line = fgets($file_handle);
	$line = fgets($file_handle);
	while (!feof($file_handle)) {
	    $line = fgets($file_handle);
	    if(strstr($line, 'OPTIONS')) {
		$done = 1;
		break;
		
	    } else {
		echo $line;
	    }
	}
	if($done) {
	    break;
	}
    }
}
fclose($file_handle);
}

 $mans = glob("*.8.html");
foreach ($mans as $m) {
    $fields = explode(".", $m, 3);
    $base = $fields[0];
    
    echo '<dt>';
    echo '<span class="refentrytitle">';
    echo "<a href=$m>$base</a>";
    echo '</span>';
    echo '<span class="refpurpose">';
    get_desc($m);
    echo '</span>';
    echo '</dt>';
}

?>
       </section>

     <section id="main">
   
     </section>	
     
<?php include "../../footer.html" ?>
    </body>
</html>
