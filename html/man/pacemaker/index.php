<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
<?php include "../../header.html" ?>
        <title>Cluster Labs - Command Line Tools</title>
        <meta name="description" content="">
     </head>
     <body>
<?php include "../../banner.html" ?>

     <section id="main">
     <h1>Pacemaker Command Line Tools</h1>
     <h2>Tool Summary</h2>

<?php
     function get_desc($man) 
{
    
$file_handle = fopen($man, "r");
$done = 0;

while (!feof($file_handle)) {
    $line = fgets($file_handle);
    if(strstr($line, 'h2>DESCRIPTION')) {
	$line = fgets($file_handle);
	$line = fgets($file_handle);
	while (!feof($file_handle)) {
	    $line = fgets($file_handle);
	    if(strstr($line, 'OPTIONS')) {
		$done = 1;
		break;
		
	    } else {
		echo $line;
	    }
	}
	if($done) {
	    break;
	}
    }
}
fclose($file_handle);
}

 $mans = glob("*.8.html");
foreach ($mans as $m) {
    $fields = explode(".", $m, 3);
    $base = $fields[0];
    
    echo '<dt>';
    echo '<span class="refentrytitle">';
    echo "<a href=$m>$base</a>";
    echo '</span>';
    echo '<span class="refpurpose">';
    get_desc($m);
    echo '</span>';
    echo '</dt>';
}

?>

     <h2>The Right Tool for the Job</h2>
     <p>
     Pacemaker ships with a comprehensive set of tools that assist you
     in managing your cluster from the command line. Here we introduce
     the tools needed for managing the cluster configuration in the
     CIB and the cluster resources.
     </p>
     <p>
       The following list presents several tasks related to cluster
       management and briefly introduces the tools to use to
       accomplish these tasks:
     </p>
     <div class="variablelist">
       <dl>
	 <dt>
	   <span class="term">Monitoring the Cluster's Status</span>
	 </dt>
	 <dd>
	   <p>The <strong class="inline-command">crm_mon</strong> command
	      allows you to monitor your cluster's status and
	      configuration. Its output includes the number of nodes,
	      uname, uuid, status, the resources configured in your
	      cluster, and the current status of each. The output of
	     
	     <strong class="inline-command">crm_mon</strong> 

	     can be displayed at the console or printed into an HTML
	     file. When provided with a cluster configuration file
	     without the status section,

	     <strong class="inline-command">crm_mon</strong>
	     
	     creates an overview of nodes and resources as specified
	     in the file. See <a href="crm_mon.8.html"
	     title="crm_mon"><span class="refentrytitle">crm_mon</span>(8)</a>
	     for a detailed introduction to this tool's usage and
	     command syntax.
	   </p>
	 </dd>
	 <dt>
	   <span class="term">Managing the CIB</span>
	 </dt>
	 <dd>
	   <p>The <strong class="inline-command">cibadmin</strong> command is
	      the low-level administrative command for manipulating
	      the Pacemaker CIB. It can be used to dump all or part of
	      the CIB, update all or part of it, modify all or part of
	      it, delete the entire CIB, or perform miscellaneous CIB
	      administrative operations. See <a href="cibadmin.8.html"
	      title="cibadmin">
	       <span class="refentrytitle">cibadmin(8)</a> for a
	     detailed introduction
	     to this tool's usage and command syntax.
	   </p>
	 </dd>
	 <dt>
	   <span class="term">Managing Configuration Changes</span>
	 </dt>
	 <dd>
	   <p>The <strong class="inline-command">crm_diff</strong> command
	      assists you in creating and applying XML patches.  This
	      can be useful for visualizing the changes between two
	      versions of the cluster configuration or saving changes
	      so they can be applied at a later time
	      using <a href="cibadmin.8.html" title="cibadmin">
	      <span class="refentrytitle">cibadmin</span>(8)</a>.
	      See <a href="crm_diff.8.html" title="crm_diff">
	      <span class="refentrytitle">crm_diff</span>(8)</a> for a
	     detailed introduction to this tool's usage and command
	     syntax.
	   </p>
	 </dd>
	 <dt>
	   <span class="term">Manipulating CIB Attributes</span>
	 </dt>
	 <dd>
	   <p>The <strong class="inline-command">crm_attribute</strong>
	      command lets you query and manipulate node attributes
	      and cluster configuration options that are used in the
	      CIB. See <a href="crm_attribute.8.html"
	      title="crm_attribute"> <span class="refentrytitle">crm_attribute</span>(8)</a>
	      for a detailed introduction to this tool's usage and
	      command syntax.</p>
	 </dd>
	 <dt>
	   <span class="term">Validating the Cluster Configuration</span>
	 </dt>
	 <dd>
	   <p>The <strong class="inline-command">crm_verify</strong> command
	      checks the configuration database (CIB) for consistency
	      and other problems. It can check a file containing the
	      configuration or connect to a running cluster. It
	      reports two classes of problems. Errors must be fixed
	      before Pacemaker can work properly while warning
	      resolution is up to the administrator.
	       <strong class="inline-command">crm_verify</strong> assists in
	      creating new or modified configurations. You can take a
	      local copy of a CIB in the running cluster, edit it,
	      validate it
	      using <strong class="inline-command">crm_verify</strong> , then
	      put the new configuration into effect using
	       <strong class="inline-command">cibadmin</strong>
	     . See <a href="crm_verify.8.html" title="crm_verify">
	       <span class="refentrytitle">crm_verify</span>(8)</a>
	     for a detailed introduction to this tool's usage and
	     command syntax.
	   </p>
	 </dd>
	 <dt>
	   <span class="term">Managing Resource Configurations</span>
	 </dt>
	 <dd>
	   <p>The <strong class="inline-command">crm_resource</strong>
	      command performs various resource-related actions on the
	      cluster. It lets you modify the definition of configured
	      resources, start and stop resources, or delete and
	      migrate resources between
	      nodes. See <a href="crm_resource.8.html"
	      title="crm_resource">
	       <span class="refentrytitle">crm_resource</span>(8)</a>
	     for a detailed introduction to this tool's usage and
	     command syntax.</p>
	 </dd>
	 <dt>
	   <span class="term">Managing Resource Fail Counts</span>
	 </dt>
	 <dd>
	   <p>The <strong class="inline-command">crm_failcount</strong>
	      command queries the number of failures per resource on a
	      given node. This tool can also be used to reset the
	      failcount, allowing the resource to again run on nodes
	      where it had failed too often.
	      See <a href="crm_failcount.8.html"
	      title="crm_failcount">
	       <span class="refentrytitle">crm_failcount</span>(8)</a>
	     for a detailed introduction to this tool's usage and
	     command syntax.</p>
	 </dd>
	 <dt>
	   <span class="term">Generate and Retrieve Node UUIDs</span>
	 </dt>
	 <dd>
	   <p>UUIDs are used to identify cluster nodes to ensure that
	     they can always be uniquely identified. The command
	       <strong class="inline-command">crm_uuid</strong> displays the
	     UUID of the node on which it is run. In very rare
	     circumstances, it may be necessary to set a node's UUID
	     to a known value.  This can also be achieved with
	       <strong class="inline-command">crm_uuid</strong> , but you
	     should use this command with extreme caution. For more
	     information, refer to <a href="crm_uuid.8.html"
	     title="crm_uuid">
	       <span class="refentrytitle">crm_uuid</span>(8)</a>.</p>
	 </dd>
	 <dt>
	   <span class="term">Managing a Node's Standby Status</span>
	 </dt>
	 <dd>
	   <p>The <strong class="inline-command">crm_standby</strong> command
	     can manipulate a node's standby attribute. Any node in
	     standby mode is no longer eligible to host resources and
	     any resources that are there must be moved.  Standby mode
	     can be useful for performing maintenance tasks, such as
	     kernel updates. Remove the standby attribute from the
	     node as it should become a fully active member of the
	     cluster again. See <a href="crm_standby.8.html"
	     title="crm_standby">
	       <span class="refentrytitle">crm_standby</span>(8)</a>
	     for a detailed introduction to this tool's usage and
	     command syntax.
	   </p>
	 </dd>
       </dl>
     </div>
     </section>	
     
<?php include "../../footer.html" ?>
    </body>
</html>
