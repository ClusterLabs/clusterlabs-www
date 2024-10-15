+++
title = "Pacemaker command-line tools"
outputs = ["PHP"]
+++

## Manual pages

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

$nshown = 0;
$mans = glob("*.8.html");
echo "<dl>\n";
foreach ($mans as $m) {
    $fields = explode(".", $m, 3);
    $base = $fields[0];
    echo "<dt>";
    echo "<a href=$m>$base</a>";
    get_desc($m);
    echo "</dt>\n";
    ++$nshown;
}
echo "</dl>\n";
if ($nshown == 0) {
    echo "<p>No manual pages are available on this server.</p>\n";
}

?>

## The right tool for the job

Monitoring cluster status
: The `crm_mon` command allows you to monitor your cluster's status and
  configuration. Its output includes the number of nodes, uname, uuid, status,
  the resources configured in your cluster, and the current status of each. The
  output of `crm_mon` can be displayed at the console or printed into an XML or
  HTML file. When provided with a cluster configuration file without the status
  section, `crm_mon` creates an overview of nodes and resources as specified in
  the file. See [crm_mon(8)](crm_mon.8.html) for a detailed introduction to
  this tool's usage and command syntax.

Managing the Cluster Configuration
: The `cibadmin` command is the low-level administrative command for
  manipulating the Pacemaker CIB. It can show, update, or modify all or part of
  the CIB, delete the entire CIB, and perform miscellaneous CIB administrative
  operations. See [cibadmin(8)](cibadmin.8.html) for a detailed introduction to
  this tool's usage and command syntax.
 
  The `crm_diff` command assists you in creating and applying XML patches. This
  can be useful for visualizing the changes between two versions of the cluster
  configuration or saving changes so they can be applied at a later time using
  the `--patch` option to [cibadmin(8)](cibadmin.8.html). See
  [crm_diff(8)](crm_diff.8.html) for a detailed introduction to this tool's
  usage and command syntax.

  The `crm_verify` command checks the CIB for consistency and other problems.
  It can check a file containing the configuration or connect to a running
  cluster. It reports two classes of problems. Errors must be fixed before
  Pacemaker can work properly while warning resolution is up to the
  administrator. `crm_verify` assists in creating new or modified
  configurations. You can take a local copy of a CIB in the running cluster,
  edit it, validate it using `crm_verify`, then put the new configuration into
  effect using `cibadmin`. See [crm_verify(8)](crm_verify.8.html) for a
  detailed introduction to this tool's usage and command syntax.

Manipulating cluster options and node attributes
: The `crm_attribute` command lets you query and manipulate node attributes and
  cluster configuration options that are used in the CIB. See
  [crm_attribute(8)](crm_attribute.8.html) for a detailed introduction to this
  tool's usage and command syntax.

Managing resources
: The `crm_resource` command performs various resource-related actions on the
  cluster. It lets you modify the definition of configured resources, start and
  stop resources, or delete and migrate resources between nodes. See
  [crm_resource(8)](crm_resource.8.html) for a detailed introduction to this
  tool's usage and command syntax.

Managing resource fail counts
: The `crm_failcount` command queries the number of failures per resource on a
  given node. This tool can also be used to reset the failcount, allowing the
  resource to again run on nodes where it had failed too often. See
  [crm_failcount(8)](crm_failcount.8.html) for a detailed introduction to this
  tool's usage and command syntax.

Managing nodes
: The `crm_standby` command can manipulate a node's standby attribute. Any node
  in standby mode is no longer eligible to host resources and any resources
  that are there must be moved.  Standby mode can be useful for performing
  maintenance tasks, such as kernel updates. Remove the standby attribute from
  the node as it should become a fully active member of the cluster again. See
  [crm_standby(8)](crm_standby.8.html) for a detailed introduction to this
  tool's usage and command syntax.
