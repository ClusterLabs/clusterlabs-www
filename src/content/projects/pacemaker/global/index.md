+++
title = "Annotated Pacemaker Sources"
outputs = ["PHP"]
+++

<ul>

<?php

$runs = glob("*");
array_multisort(array_map('filemtime', $runs), SORT_DESC, $runs);

$nshown = 0;
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
    ++$nshown;
}
if ($nshown == 0) {
    echo "<p>No sources are available on this server.</p>";
}

?>

</ul>
