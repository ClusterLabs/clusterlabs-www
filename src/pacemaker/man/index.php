---
layout: pacemaker
title: Pacemaker Manual Pages
---
     <section id="main">
     <h1>Pacemaker Command Line Tools</h1>
     <h2>Tool Summary</h2>

<?php
function get_desc($man) 
{
    $file_handle = fopen($man, "r");
    $done = 0;

    /* Show everything in the description section (which ends with the next
       second-level heading or some magic strings for specific nonstandard
       man pages).
     */
    while (!feof($file_handle) && !$done) {
        $line = fgets($file_handle);
        if (strstr($line, 'h2>DESCRIPTION')) {
            $line = fgets($file_handle);
            $line = fgets($file_handle);
            while (!feof($file_handle) && !$done) {
                $line = fgets($file_handle);
                if (strstr($line, '<h2>')
                    || strstr($line, 'usage:')
                    || strstr($line, '<b>Common')
                   ) {
                    $done = 1;
                } else {
                    echo $line;
                }
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
     Pacemaker ships with a set of command-line tools to assist you
     in managing your cluster. Their manual pages are all linked
     above. Here are more details about the most important tools:
     </p>
     <div class="variablelist">
       <dl>
         <dt>
           <span class="term">Monitoring Cluster Status</span>
         </dt>
         <dd>
           <p>The <strong class="inline-command">crm_mon</strong> command
              allows you to monitor your cluster's status and
              configuration. Its output includes the number of nodes,
              uname, uuid, status, the resources configured in your
              cluster, and the current status of each. The output of
             <strong class="inline-command">crm_mon</strong> 
             can be displayed at the console or printed into an XML or HTML
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
	   <span class="term">Managing the Cluster Configuration</span>
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
	   <span class="term">Manipulating Attributes</span>
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
	   <span class="term">Managing Resources</span>
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
	   <span class="term">Managing Nodes</span>
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
