<html>
<head>
	<link href="/stylesheets/getpacemaker.css" media="screen, projection" rel="stylesheet" type="text/css" />
</head>
<body>
  <?php include '../../html/banner-small.php' ?>
 <div id="inner-body" style="text-align: left;">
   <div class="coda-slider" style="padding: 20px; width: 800px;">
<h2>Pacemaker 1.1.x - Supported Versions/Distributions</h2>
<p>
Binary packages for current Fedora, OpenSUSE and EPEL compatible distributions (eg. RHEL, CentOS and Scientific Linux) releases:
</p>
<?php

$sets = array();
$sets[] = "Fedora";
$sets[] = "RHEL";

echo "<ul>";

foreach ($sets as $set) {
  echo "<li>$set<ul>";
  foreach (glob(strtolower($set)."-*") as $distro) {
    $version = substr(strstr($distro, "-"), 1);
    echo "<li>$version";
    echo " [<a href=$distro/clusterlabs.repo>repository</a>]";
    foreach (glob("$distro/*") as $arch) {
       if ( strstr($arch, "86") || strstr($arch, "src")) {
         $arch = substr($arch, strlen($distro)+1);
         echo " [<a href=$distro/$arch>$arch</a>]";
       }
    }
    echo "</li>";
  }
  echo "</ul></li>";
}

echo "</ul>";
?>
<h2>More information</h2>
<p>
You can find a <a href=http://www.clusterlabs.org/doc>getting started guide<a/>, <a href="http://www.clusterlabs.org/wiki/Documentation">additional documentation</a> and details about the Pacemaker project at <a href="http://www.clusterlabs.org">http://www.clusterlabs.org</a>
</p>
<h2>How to Use this Page</h2>
<p>
    Simply browse for your distribution, download the repository file and install the relevant packages.<br/>
</p>
<h3>Fedora 17</h3>
<p>
Installation is as simple as:
</p>
<pre>
 wget -O /etc/yum.repos.d/pacemaker.repo http://clusterlabs.org/rpm-next/fedora-17/clusterlabs.repo 
 yum install -y pacemaker corosync
</pre>
<h3>RHEL 6</h3>
    <p>
    To minimize the difference to a 'standard' RHCS cluster, Pacemaker is only built to support cman as the membership and quorum provider.
    You'll want to look at the CMAN section of our <a href=http://www.clusterlabs.org/doc/en-US/Pacemaker/1.1-plugin/pdf/Clusters_from_Scratch/Pacemaker-1.1-Clusters_from_Scratch-en-US.pdf>Clusters from Scratch</a> document.
    </p>
    <p>
    Installation is as simple as:
    </p>
    <pre>
 wget -O /etc/yum.repos.d/pacemaker.repo http://clusterlabs.org/rpm-next/rhel-6/clusterlabs.repo 
 yum install -y pacemaker cman
    </pre>
    <p>
    Although the code is well tested, the builds have not been.
    Please report any problems immediately.
    </p>
    <p>
    Minimal effort will be made to keep up with bug-fix updates of Pacemaker's <b>pre-requisits not in RHEL</b> (such as libqb).
    If you're affected by a bug in libqb etc, you'll need to obtain/patch and rebuild those packages yourself.
    A big deal is made about ABI compatibility within distro versions, so the pacemaker packages should continue to function.
    </p>
<h3>RHEL 5</h3>
    <p>
    Due to the packages available on RHEL-5, Pacemaker is only built to support the (deprecated) pacemaker/corosync plugin as the membership and quorum provider.
    You'll want to look at our <a href=http://www.clusterlabs.org/doc/en-US/Pacemaker/1.1-plugin/pdf/Clusters_from_Scratch/Pacemaker-1.1-Clusters_from_Scratch-en-US.pdf>Clusters from Scratch</a> document up uptil the point it talks about CMAN and GFS2.
    Neither of those technologies are supported by these builds of Pacemaker.
    </p>
    <p>
    Installation is as simple as:
    </p>
<pre>
 wget -O /etc/yum.repos.d/pacemaker.repo http://clusterlabs.org/rpm-next/rhel-5/clusterlabs.repo 
 yum install -y pacemaker corosync
</pre>
    <p>
    Although the code is well tested, the builds have not been.
    Please report any problems immediately.
    </p>
    <p>
    Minimal effort will be made to keep up with bug-fix updates of Pacemaker's <b>pre-requisits not in RHEL</b> (such as libqb).
    If you're affected by a bug in libqb etc, you'll need to obtain/patch and rebuild those packages yourself.
    A big deal is made about ABI compatibility within distro versions, so the pacemaker packages should continue to function.
    </p>
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
