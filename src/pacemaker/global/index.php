---
layout: pacemaker
title: Annotated Pacemaker Sources
---

     <section id="main">
        <h2>Annotated Pacemaker Sources</h2>
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
    echo " [<a href=$hash/index.html>Annotated</a>]";
    echo " [<a href=https://github.com/ClusterLabs/pacemaker/$path/$hash>Download</a>]";
    echo "</li>";
}

echo "</ul>";
?>
     </section>
