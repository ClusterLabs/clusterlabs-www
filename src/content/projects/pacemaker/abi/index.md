+++
title = "Pacemaker ABI compatibility"
outputs = ["PHP"]
+++

This page details ABI compatibility between the listed versions of Pacemaker.
Reports are generated using
[ABI Compliance Checker](https://lvc.github.io/abi-compliance-checker/).

<?php
  function sorter($a, $b) {
    return version_compare($b["from"], $a["from"]);
  }

  function start_table() {
    echo "<table>\n";
    echo " <thead>\n";
    echo "  <tr>\n";
    echo "   <th>Version</th>\n";
    echo "   <th>Reference Version</th>\n";
    echo "   <th>Status</th>\n";
    echo "   <th>Report</th>\n";
    echo "  </tr>\n";
    echo " </thead>\n";
    echo "<tbody>\n";
  }

  function end_table() {
    echo " </tbody>\n";
    echo "</table>\n";
  }

  $i = 0;
  $compat_reports = array();

  foreach (glob("*/compat_report.html") as $item) {
    $report = dirname($item);
    $v = explode("_", $report);
    if ((count($v) != 3) || ($v[1] != "to")) {
      continue;
    }

    $compat_reports[$i] = array();
    $compat_reports[$i]["filename"] = $item;
    $compat_reports[$i]["report"] = $report;
    $compat_reports[$i]["from"] = $v[0];
    $compat_reports[$i]["to"] = $v[2];

    $compat_reports[$i]["status"] = "unknown";
    $file_handle = fopen($compat_reports[$i]["filename"], "r");
    while (!feof($file_handle)) {
	$line = fgets($file_handle);
	if (strstr($line, "Verdict")) {
	    $compat_reports[$i]["status"] = preg_replace("/.*<td>/", "", $line);
	    $compat_reports[$i]["status"] = preg_replace("/<\/td>.*/", "", $compat_reports[$i]["status"]);
	    break;
	}
    }
    fclose($file_handle);    

    ++$i;
  }

  usort($compat_reports, "sorter");

  $i = 0;
  foreach ($compat_reports as $item) {
    $report = $item["report"];
    $filename = $item["filename"];
    $from = $item["from"];
    $to = $item["to"];
    $status = $item["status"];

    if ($i++ == 0) {
      start_table();
    }
    echo " <tr>\n";
    echo "  <td> $to </td>\n";
    echo "  <td> $from </td>\n";
    echo "  <td> $status </td>\n";
    echo "  <td><a href=\"$filename\">report</a></td>\n";
    echo " </tr>\n";
  }
  if ($i == 0) {
    echo "<p>No ABI reports are available on this server.</p>";
  } else {
    end_table();
  }
?>
