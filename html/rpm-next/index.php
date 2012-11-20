<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
	<?php include "../header.html" ?>
        <title>Cluster Labs - Packages for Pacemaker 1.0.x</title>
        <meta name="description" content="">
    </head>
    <body>
	<?php include "../banner.html" ?>

        <section id="main">
<h1>Pacemaker 1.1.x - Supported Versions/Distributions</h1>
<p>
Binary packages for current Fedora, OpenSUSE and EPEL compatible distributions (eg. RHEL, CentOS and Scientific Linux) releases:
</p>

<h1>How to Use this Page</h1>
<p>
    Simply browse for your distribution, download the repository file and install the relevant packages.<br/>
</p>
<h2>Fedora 17</h2>
<p>
Installation is as simple as:
</p>
     <p class="command">
wget -O /etc/yum.repos.d/pacemaker.repo http://clusterlabs.org/rpm-next/fedora-17/clusterlabs.repo 
yum install -y pacemaker corosync
     </p>
<h2>RHEL 6</h2>
    <p>
    To minimize the difference to a 'standard' RHCS cluster, Pacemaker is only built to support cman as the membership and quorum provider.
    You'll want to look at the CMAN section of our <a href=http://clusterlabs.org/doc/en-US/Pacemaker/1.1-plugin/pdf/Clusters_from_Scratch/Pacemaker-1.1-Clusters_from_Scratch-en-US.pdf>Clusters from Scratch</a> document.
    </p>
    <p>
    Installation is as simple as:
    </p>
    <p class="command">
wget -O /etc/yum.repos.d/pacemaker.repo http://clusterlabs.org/rpm-next/rhel-6/clusterlabs.repo 
yum install -y pacemaker cman
    </p>
    <p>
    Although the code is well tested, the builds have not been.
    Please report any problems immediately.
    </p>
    <p>
    Minimal effort will be made to keep up with bug-fix updates of Pacemaker's <b>pre-requisits not in RHEL</b> (such as libqb).
    If you're affected by a bug in libqb etc, you'll need to obtain/patch and rebuild those packages yourself.
    A big deal is made about ABI compatibility within distro versions, so the pacemaker packages should continue to function.
    </p>
<h2>RHEL 5</h2>
    <p>
    Due to the packages available on RHEL-5, Pacemaker is only built to support the (deprecated) pacemaker/corosync plugin as the membership and quorum provider.
    You'll want to look at our <a href="http://clusterlabs.org/doc/en-US/Pacemaker/1.1-plugin/pdf/Clusters_from_Scratch/Pacemaker-1.1-Clusters_from_Scratch-en-US.pdf">Clusters from Scratch</a> document up uptil the point it talks about CMAN and GFS2.
    Neither of those technologies are supported by these builds of Pacemaker.
    </p>
    <p>
    Installation is as simple as:
    </p>
    <p class="command">
wget -O /etc/yum.repos.d/pacemaker.repo http://clusterlabs.org/rpm-next/rhel-5/clusterlabs.repo 
yum install -y pacemaker corosync
    </p>
    <p>
    Although the code is well tested, the builds have not been.
    Please report any problems immediately.
    </p>
    <p>
    Minimal effort will be made to keep up with bug-fix updates of Pacemaker's <b>pre-requisits not in RHEL</b> (such as libqb).
    If you're affected by a bug in libqb etc, you'll need to obtain/patch and rebuild those packages yourself.
    A big deal is made about ABI compatibility within distro versions, so the pacemaker packages should continue to function.
    </p>
    <h1>Packages</h1>
<?php

$sets = array();
$sets[] = "Fedora";
$sets[] = "RHEL";

foreach ($sets as $set) {
    echo "<section class='docset'><h3 class='docversion'>$set</h3>";
    echo '<table class="publican-doc">';
  foreach (glob(strtolower($set)."-*") as $distro) {
    $version = substr(strstr($distro, "-"), 1);
    echo '<tr>';
    echo "<td>$version</td>";
    echo "<td>[<a class='doclink' href=$distro/clusterlabs.repo>repository</a>]</td><td>";
    foreach (glob("$distro/*") as $arch) {
       if ( strstr($arch, "86") || strstr($arch, "src")) {
         $arch = substr($arch, strlen($distro)+1);
         echo "[<a class='doclink' href=$distro/$arch>$arch</a>] ";
       }
    }
    echo "</td></tr>";
  }
  echo "</table></section>";
}
?>
<h1>More information</h1>
<p>
You can find a <a href="/doc">getting started guide<a/>, <a href="/wiki/Documentation">additional documentation</a> and details about the Pacemaker project at <a href="http://clusterlabs.org">http://clusterlabs.org</a>
</p>
</section>	

	<?php include "../footer.html" ?>
    </body>
</html>
