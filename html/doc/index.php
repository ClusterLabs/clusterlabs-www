<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <?php include "../header.html" ?>
        <title>Cluster Labs - Pacemaker Documentation</title>
        <meta name="description" content="">
    </head>
    <body>
	<?php include "../banner.html" ?>

		<section id="main">
<p>
The following <a href="http://www.clusterlabs.org/wiki/Pacemaker">Pacemaker</a> documentation was generated from the upstream sources.
</p>
     
<h1>Where to Start</h1>
<p>

    If you're new to Pacemaker or clustering in general, the best
    place to start is the <b>Clusters from Scratch</b> guide.  This
    document walks you step-by-step through the installation and
    configuration of a High Availability cluster with Pacemaker.  It
    even makes the common configuration mistakes so that it can
    demonstrate how to fix them.

</p>

<p>

    On the otherhand, if you're looking for an exhasutive reference of
    all Pacemaker's options and features, try <b>Pacemaker
    Explained</b>.  It's dry, but should have the answers you're
    looking for.  Again, be sure to read the edition appropriate for
    your software version.

</p>

<p>

    Both are version specific (Some things have changed over the
    years, so be sure to choose the one that matches your software
    version) and have been translated into several languages.

</p>

<p>
    There is also a <a href="/wiki">project wiki</a> with plenty of
    <a href="/wiki/Category:Help:Examples">examples</a> and 
    <a href="/wiki/Category:Help:Howto">howto guides</a> which
    the wider community is encouraged to update and add to.
</p>

<p>
<h1>Which Documentation Set do I Need?</h1>
<p>
If the distribution you're using is:
<ul>
<li>RHEL6: 1.1-plugin (look for CMAN in the index)</li>
<li>SLES11: 1.1-plugin</li>
<li>Fedora <= 17: 1.1-crmsh</li>
<li>Fedora 18+: 1.1-pcs</li>
<li>Ubuntu: 1.1-plugin (look for CMAN in the index)</li>
</ul>
</p>

<h1>Unversioned documentation</h1>
<section class="docset">
  <h3 class='docversion'>General Concepts</h3>
  <table class="publican-doc">
    <tr>
      <td>Ordering Explained</td>
      <td>[<a class="doclink" href="Ordering_Explained.pdf">pdf</a>]</td>
      <td>[<a class="doclink" href="Ordering_Explained_White.pdf">print</a>]</td>
    </tr>
    <tr>
      <td>Colocation Explained</td>
      <td>[<a class="doclink" href="Colocation_Explained.pdf">pdf</a>]</td>
      <td>[<a class="doclink" href="Colocation_Explained_White.pdf">print</a>]</td>
    </tr>
    <tr>
      <td>Configuring Fencing with crmsh</td>
      <td>[<a class="doclink" href="crm_fencing.html">html</a>]</td>
    </tr>
    <tr>
      <td>ACL Guide</td>
      <td>[<a class="doclink" href="acls.html">html</a>]</td>
    </tr>
  </table>
</section>

<?php

 function get_versions($base) {
   $versions = array();
   foreach (glob("$base/*/Pacemaker/*") as $item)
      if ($item != '.' && $item != '..' && is_dir($item) && !is_link($item))
         $versions[] = basename($item);

   return array_unique($versions);
 }

 function docs_for_version($base, $version) {
   echo "<section class='docset'>";
   echo "<h3 class='docversion'>";
   foreach (glob("title-$version.txt") as $filename) {
      readfile($filename);
   }
   echo "</h3>";
   foreach (glob("desc-$version.txt") as $filename) {
      readfile($filename);
   }
   echo "<br/>";
   foreach (glob("build-$version.txt") as $filename) {
      readfile($filename);
   }
   echo "<br/>";

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
                   echo " [<a class='doclink' href=$filename>epub</a>]";
               }
               foreach (glob("$base/$lang/Pacemaker/$version/pdf/$b/*.pdf") as $filename) {
                   echo " [<a class='doclink' href=$filename>pdf</a>]";
               }
               foreach (glob("$base/$lang/Pacemaker/$version/html/$b/index.html") as $filename) {
                   echo " [<a class='doclink' href=$filename>html</a>]";
               }
               foreach (glob("$base/$lang/Pacemaker/$version/html-single/$b/index.html") as $filename) {
                   echo " [<a class='doclink' href=$filename>html-single</a>]";
               }
               foreach (glob("$base/$lang/Pacemaker/$version/txt/$b/*.txt") as $filename) {
                   echo " [<a class='doclink' href=$filename>txt</a>]";
               }
               echo "</td></tr>";
           }
       }
   }
   echo "</table>";
   echo "</section>";
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


echo "<h1>Versioned documentation</h1>";
foreach(get_versions(".") as $v) {
  docs_for_version(".", $v);
}

?>

<h1>Deprecated Documentation</h1>
<section class="docset">
  <h3 class='docversion'>Pacemaker 1.0 with OpenAIS</h3>
  <table class="publican-doc">
    <tr>
      <td>Clusters from Scratch - Pacemaker 1.0 & GFS2</td>
      <td>[<a class="doclink" href="Clusters_from_Scratch-1.0-GFS2.pdf">pdf</a>]</td>
    </tr>
    <tr>
      <td>Clusters from Scratch - Pacemaker 1.0 & OCFS2</td>
      <td>[<a class="doclink" href="Clusters_from_Scratch-1.0-OCFS2.pdf">pdf</a>]</td>
    </tr>
  </table>
</section>
		</section>	
	<?php include "../footer.html" ?>
    </body>
</html>
