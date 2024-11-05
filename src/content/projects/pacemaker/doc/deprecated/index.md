+++
title = "Deprecated Pacemaker documentation"
outputs = ["PHP"]
+++

You have followed a link to documentation for Pacemaker versions that are no
longer supported. Most likely, you want the
[current documentation](/projects/pacemaker/doc/). Otherwise, you can find
older documentation below.

<?php
   function get_versions($pattern) {
     $versions = array();
     foreach (glob($pattern) as $item)
        if ($item != '.' && $item != '..' && is_dir($item) && !is_link($item))
           $versions[] = basename($item);

     return array_reverse(array_unique($versions));
   }

   function doc_version_heading($base, $version) {
     $title = file_get_contents("$base/title-$version.txt");
     if (empty($title)) {
       $title = $version;
     }
     echo "    <h3 class='docversion'>$title</h3>\n";
     $desc = file_get_contents("$base/desc-$version.txt");
     if (!empty($desc)) {
       echo "    <p class='doc-desc'>$desc</p>\n";
     }
     $build = file_get_contents("$base/build-$version.txt");
     if (!empty($build)) {
       echo "    <p class='doc-desc'>$build</p>\n";
     }
   }

   function publican_docs_for_version($base, $version, $langs) {
     echo "  <section class='docset'>\n";
     doc_version_heading($base, $version);

     $books = array();
     foreach (glob("$base/en-US/Pacemaker/$version/pdf/*") as $filename) {
         $books[] = basename($filename);
     }

     echo "<table>\n";
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

   $nshown = 0;
   foreach(get_versions("*/Pacemaker/*") as $v) {
     $langs = array();
     foreach (glob("*/Pacemaker/$v") as $item) {
       $langs[] = basename(dirname(dirname($item)));
     }
     publican_docs_for_version(".", $v, $langs);
     ++$nshown;
   }
   if ($nshown == 0) {
      echo "<p>No deprecated documentation sets are available on this server.</p>\n";
   }
?>
