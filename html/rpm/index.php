<html>
<head>
	<link href="/stylesheets/getpacemaker.css" media="screen, projection" rel="stylesheet" type="text/css" />
</head>
<body>
  <?php include '../../html/banner-small.php' ?>
 <div id="inner-body" style="text-align: left;">
   <div class="coda-slider" style="padding: 20px; width: 800px;">
<h2>Pacemaker 1.0.x - Supported Versions/Distributions</h2>
<p>
Binary packages for current Fedora, OpenSUSE and EPEL compatible distributions (eg. RHEL, CentOS and Scientific Linux) releases:
</p>
<?php

$sets = array();
$sets[] = "Fedora";
$sets[] = "openSUSE";
$sets[] = "EPEL";

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
You can find a <a href=http://www.clusterlabs.org/mwiki/images/5/56/Cluster_from_Scratch_-_Fedora_12.pdf>getting started guide<a/>, <a href="http://www.clusterlabs.org/wiki/Documentation">additional documentation</a> and details about the Pacemaker project at <a href="http://www.clusterlabs.org">http://www.clusterlabs.org</a>
</p>
<h2>How to Use this Page</h2>
<p>
Simply browse for your distribution and install the repository file.<br/>
Once installed, you can decide which cluster stack to use at runtime simply by starting either 
<pre>service heartbeat start</pre> or <pre>service corosync start</pre>
You can also choose to <b>only</b> install the stack you plan to use.
</p>
<h3>Installation - Fedora</h3>
<p>
Installation is as simple as:
</p>
<pre>
 wget -O /etc/yum.repos.d/pacemaker.repo http://clusterlabs.org/rpm/fedora-11/clusterlabs.repo 
 yum install -y pacemaker corosync heartbeat
</pre>
<h3>Installation - openSUSE</h3>
<p>
openSUSE uses zypper instead of yum, but the procedure is much the same:
</p>
<pre>
 zypper ar http://clusterlabs.org/rpm/opensuse-11.1/clusterlabs.repo
 zypper refresh
 zypper in pacemaker corosync heartbeat
</pre>
<h3>Installation - EPEL</h3>
<p>
The Pacemaker packages in the EPEL directories build against some additional packages that don't exist on vanilla RHEL/CentOS installs. For more information on EPEL, see <a href=http://fedoraproject.org/wiki/EPEL/FAQ>http://fedoraproject.org/wiki/EPEL/FAQ</a>
So before installing Pacemaker, you will first need to tell the machine how to find the EPEL packages Pacemaker depends on. To do this, download and install the EPEL package that matches your RHEL/CentOS version.
</p>
<p>
For example to install on RHEL5.3 for i386, you'd first add the EPEL repository:
<pre> su -c 'rpm -Uvh http://download.fedora.redhat.com/pub/epel/5/i386/epel-release-5-3.noarch.rpm'</pre>
And then add the Cluster Labs repository and install Pacemaker:
<pre>
 wget -O /etc/yum.repos.d/pacemaker.repo http://clusterlabs.org/rpm/epel-5/clusterlabs.repo
 yum install -y pacemaker corosync heartbeat
</pre>
</p>
<object type="image/svg+xml" width="50" height="30" data="http://php.logfish.net/svgCounter.php"></object>
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
