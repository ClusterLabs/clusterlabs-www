<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
<?php include "../../header.html" ?>
        <title>Cluster Labs - Annotated Pacemaker Sources</title>
        <meta name="description" content="">
     </head>
     <body>
<?php include "../../banner.html" ?>

     <section id="main">
	<h2>Annotated Pacemaker Sources</h2>
        <?php

echo "<ul>";

$runs = glob("*");
array_multisort(array_map('filemtime', $runs), /*SORT_ASC*/SORT_DESC, $runs);

$lpc = 0;
/*$total = count($runs);*/

foreach ($runs as $hash) {
    if(strstr($hash, "index")) {
	continue;
    }
    $total++;
}

foreach ($runs as $hash) {
    if(strstr($hash, "index")) {
	continue;
    }

    $run = $total - $lpc;
    $when = date("F d Y, gA", filemtime($hash));

    echo "<li>Run $run $hash ($when) ";
    echo " [<a href=$hash/index.html>Results</a>]";
    echo " [<a href=https://github.com/ClusterLabs/pacemaker/tree/$hash>Sources</a>]";
    echo "</li>";
    $lpc++;
}

echo "</ul>";
	?>
     </section>	
     
<?php include "../../footer.html" ?>
    </body>
</html>
