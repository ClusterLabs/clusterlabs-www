<html>
<head>
	<link href="/stylesheets/getpacemaker.css" media="screen, projection" rel="stylesheet" type="text/css" />
</head>
<body>
  <?php include '../../html/banner-small.php' ?>
 <div id="inner-body">
   <div class="coda-slider" style="padding: 20px; width: 800px;">
<p>
The following <a href="http://www.clusterlabs.org/wiki/Pacemaker">Pacemaker</a> documentation was generated from the upstream sources.
</p>
<h3>Where to Start</h3>
<p>
If you're new to Pacemaker or clustering in general, the <b>best place to start is the <a href="Cluster_from_Scratch.pdf">Clusters from Scratch</a> document</b> which walks you, step-by-step, though the creation of a cluster.
Some things have changed over the years, so be sure you're looking at the apropriate edition for your software version.
</p>
<p>
On the otherhand, if you're looking for an exhasutive reference of all Pacemaker's options and features, try <b>Pacemaker Explained</b>.
It's dry, but should have the answers you're looking for.
Again, be sure to read the edition appropriate for your software version.
</p>
<?php

 function get_versions($base) {
   $versions = array();
   foreach (glob("$base/*/Pacemaker/*") as $item)
      if ($item != '.' && $item != '..' && is_dir($item) && !is_link($item))
         $versions[] = basename($item);

   return array_unique($versions);
 }

 function docs_for_version($base, $version) {
   echo "<br/><li>Version: $version<br/><br/>";
   foreach (glob("build-$version.txt") as $filename) {
      readfile($filename);
   }
   echo "<ul><br/>";

   $langs = array();
   foreach (glob("$base/*/Pacemaker/$version") as $item) {
       $langs[] = basename(dirname(dirname($item)));
   }
   
   $books = array();
   foreach (glob("$base/en-US/Pacemaker/$version/pdf/*") as $filename) {
       $books[] = basename($filename);
   }

   echo '<table class="publican-doc">';
   foreach ($books as $b) {
       foreach ($langs as $lang) {
           if (glob("$base/$lang/Pacemaker/$version/pdf/$b/*-$lang.pdf")) {
               echo '<tr><td>'.str_replace("_", " ", $b)." ($lang)</td>";

               echo '<td>';
               foreach (glob("$base/$lang/Pacemaker/$version/epub/$b/*.epub") as $filename) {
                   echo " [<a href=$filename>epub</a>]";
               }
               foreach (glob("$base/$lang/Pacemaker/$version/pdf/$b/*.pdf") as $filename) {
                   echo " [<a href=$filename>pdf</a>]";
               }
               foreach (glob("$base/$lang/Pacemaker/$version/html/$b/index.html") as $filename) {
                   echo " [<a href=$filename>html</a>]";
               }
               foreach (glob("$base/$lang/Pacemaker/$version/html-single/$b/index.html") as $filename) {
                   echo " [<a href=$filename>html-single</a>]";
               }
               foreach (glob("$base/$lang/Pacemaker/$version/txt/$b/*.txt") as $filename) {
                   echo " [<a href=$filename>txt</a>]";
               }
               echo "</td></tr>";
           }
       }
       echo "<tr><td/><td/></tr>";
   }
   echo "</table>";
   echo "</ul>";
 }

$docs = array();

foreach (glob("*.html") as $file) {
  $fields = explode(".", $file, -1);
  $docs[] = implode(".", $fields);
}

foreach (glob("*.pdf") as $file) {
  $fields = explode(".", $file, -1);
  $docs[] = implode(".", $fields);
}


echo "<h3>Versioned documentation</h3>";
echo "<ul>";
foreach(get_versions(".") as $v) {
  docs_for_version(".", $v);
}
echo "</ul>";

echo "<h3>Unversioned documentation (Current for 1.1.x)</h3>";
echo "<ul>";

foreach(array_unique($docs) as $doc) {
  echo "<li>$doc";
  foreach (glob("$doc.pdf") as $filename) {
    echo " [<a href=$filename>pdf</a>]";
  }
  foreach (glob("$doc.html") as $filename) {
    echo " [<a href=$filename>html</a>]";
  }
  foreach (glob("$doc.txt") as $filename) {
    echo " [<a href=$filename>txt</a>]";
  }
  echo "</li>";
}

echo "</ul>";
?>
<p>
You can find additional <a href="http://www.clusterlabs.org/wiki/Documentation">documentation</a>, <a href="http://www.clusterlabs.org/wiki/Documentation#Howtos">How-to Guides</a>  and <a href="http://www.clusterlabs.org/wiki">details</a> about the Pacemaker project at <a href="http://www.clusterlabs.org">http://www.clusterlabs.org/</a>.
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
