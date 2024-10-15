+++
title = "Pacemaker API documentation"
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
    echo " [<a href=$hash/index.html>Main Page</a>]";
    echo " [<a href=$hash/modules.html>API List</a>]";
    echo " [<a href=\"https://github.com/ClusterLabs/pacemaker/$path/$hash\">Source</a>]";
    echo "</li>";
    ++$nshown;
}
if ($nshown == 0) {
    echo "<p>No API documentation is available on this server.</p>\n";
}

?>
</ul>
