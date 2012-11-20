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
<h1>Pacemaker 1.0.x - Supported Versions/Distributions</h1>
<p>
Binary packages for current Fedora, OpenSUSE and EPEL compatible distributions (eg. RHEL, CentOS and Scientific Linux) releases:
</p>

<h1>How to Use this Page</h1>
<p>
Simply browse for your distribution follow the instructions provided
</p>
     
<h2>Installation - Fedora</h2>
<p>
Installation is as simple as:
</p>
     <p class="command">
wget -O /etc/yum.repos.d/pacemaker.repo http://clusterlabs.org/rpm/fedora-16/clusterlabs.repo 
yum install -y pacemaker corosync
     </p>

     <h2>Installation - openSUSE</h2>
     <p>
openSUSE uses zypper instead of yum, but the procedure is much the same:
     </p>
     <p class="command">
zypper ar http://clusterlabs.org/rpm/opensuse-11.1/clusterlabs.repo
zypper refresh
zypper in pacemaker corosync
     </p>

     <h2>Installation - EPEL</h2>
     <p>
The Pacemaker packages in the EPEL directories build against some additional packages that don't exist on vanilla RHEL/CentOS installs. For more information on EPEL, see <a href=http://fedoraproject.org/wiki/EPEL/FAQ>http://fedoraproject.org/wiki/EPEL/FAQ</a>
So before installing Pacemaker, you will first need to tell the machine how to find the EPEL packages Pacemaker depends on. To do this, download and install the EPEL package that matches your RHEL/CentOS version.
</p>
<p>
For example to install on RHEL5.3 for i386, you'd first add the EPEL repository:
</p>
     <p class="command">
su -c 'rpm -Uvh http://download.fedora.redhat.com/pub/epel/5/i386/epel-release-5-3.noarch.rpm'
     </p>
     <p>
And then add the Cluster Labs repository to install Pacemaker:
     </p>
     <p class="command">
wget -O /etc/yum.repos.d/pacemaker.repo http://clusterlabs.org/rpm/epel-5/clusterlabs.repo
yum install -y pacemaker corosync
     </p>
    <h1>Packages</h1>

<?php

$sets = array();
$sets[] = "Fedora";
$sets[] = "openSUSE";
$sets[] = "EPEL";


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
You can find a <a href=http://www.clusterlabs.org/mwiki/images/5/56/Cluster_from_Scratch_-_Fedora_12.pdf>getting started guide<a/>, <a href="http://www.clusterlabs.org/wiki/Documentation">additional documentation</a> and details about the Pacemaker project at <a href="http://www.clusterlabs.org">http://www.clusterlabs.org</a>
     </p>
</section>	

	<?php include "../footer.html" ?>
    </body>
</html>
