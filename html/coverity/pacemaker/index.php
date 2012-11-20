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
        <h2>Results of Coverity Runs against Pacemaker</h2>
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
    $next = 0;
    $errors = 0;
    $file_handle = fopen("$hash/summary.html", "r");
    while (!feof($file_handle)) {
        $line = fgetss($file_handle);
        if(strstr($line, "Total")) {
            $next = 1;
        } else if($next) {
            $errors = $line;
            break;
        }
    }
    fclose($file_handle);    

    echo "<li>Run $run ($when) - $errors total errors ";
    echo " [<a href=$hash/summary.html>Summary</a>]";
    echo " [<a href=$hash/index.html>Detail</a>]";
    echo " [<a href=http://hg.clusterlabs.org/pacemaker/devel/rev/$hash>$hash</a>]";
    echo "</li>";
    $lpc++;
}

echo "</ul>";
        ?>
     </section>	
     
<?php include "../../footer.html" ?>
    </body>
</html>
