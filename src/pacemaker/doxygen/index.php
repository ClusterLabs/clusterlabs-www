---
layout: pacemaker
title: Pacemaker API Documentation
---
     <section id="main">
        <h2>Pacemaker API Documentation</h2>
        <?php

echo "<ul>";

$runs = glob("*");
array_multisort(array_map('filemtime', $runs), /*SORT_ASC*/SORT_DESC, $runs);

foreach ($runs as $hash) {
    if (strstr($hash, "index")) {
        continue;
    }
    if (strstr($hash, "-")) {
        $title = "Version";
        $path = "releases/tag";
    } else {
        $title = "Commit";
        $path = "commit";
    }

    echo "<li>$title $hash";
    echo " [<a href=$hash/index.html>Main Page</a>]";
    echo " [<a href=$hash/modules.html>API List</a>]";
    echo " [<a href=https://github.com/ClusterLabs/pacemaker/$path/$hash>Source</a>]";
    echo "</li>";
}

echo "</ul>";
?>
     </section>
