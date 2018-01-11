---
layout: pacemaker
title: Pacemaker Documentation
---
<section id="main">

  <p>
    Most of the documentation listed here was generated from the Pacemaker 
    sources.
  </p>

  <header class="major">
    <h2>Where to Start</h2>
  </header>
  <p>
    If you're new to Pacemaker or clustering in general, the best place to 
    start is <b>Clusters from Scratch</b>, which walks you step-by-step through 
    the installation and configuration of a high-availability cluster with 
    Pacemaker. It even makes common configuration mistakes so that it can
    demonstrate how to fix them.
  </p>

  <p>
    On the other hand, if you're looking for an exhaustive reference of all 
    of Pacemaker's options and features, try <b>Pacemaker Explained</b>. It's 
    dry, but should have the answers you're looking for.
  </p>

  <p>
    There is also a <a href="https://wiki.clusterlabs.org/wiki">project wiki</a> 
    with examples, how-to guides, and other information that doesn't make it 
    into the manuals.
  </p>

  <header class="major">
    <h2>Unversioned documentation</h2>
  </header>

  <section class="docset">
    <h3 class="docversion">General Concepts</h3>
    <table class="publican-doc">
      <tr>
        <td>Ordering Explained</td>
        <td>[<a class="doclink" href="https://wiki.clusterlabs.org/w/images/a/ae/Ordering_Explained_-_White.pdf">pdf</a>]</td>
      </tr>
      <tr>
        <td>Colocation Explained</td>
        <td>[<a class="doclink" href="https://wiki.clusterlabs.org/w/images/8/8a/Colocation_Explained_-_White.pdf">pdf</a>]</td>
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

     return array_reverse(array_unique($versions));
   }

   function docs_for_version($base, $version, $langs) {
     echo "<section class='docset'>";
     echo "<h3 class='docversion'>";
     foreach (glob("$base/title-$version.txt") as $filename) {
        readfile($filename);
     }
     echo "</h3>";
     foreach (glob("$base/desc-$version.txt") as $filename) {
        readfile($filename);
     }
     echo "<br/>";
     foreach (glob("$base/build-$version.txt") as $filename) {
        readfile($filename);
     }
     echo "<br/>";

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

  echo "<header class='major'>\n<h2>Versioned documentation</h2>\n</header>";
  $langs = array();
  // for now, show only US English; other translations haven't been maintained
  $langs[] = "en-US";

  foreach(get_versions(".") as $v) {
    docs_for_version(".", $v, $langs);
  }

  echo "<header class='major'>\n<h2>Deprecated documentation</h2>\n</header>";
  foreach(get_versions("deprecated") as $v) {
    $langs = array();
    foreach (glob("deprecated/*/Pacemaker/$v") as $item) {
      $langs[] = basename(dirname(dirname($item)));
    }
    docs_for_version("deprecated", $v, $langs);
  }

  ?>

</section>	
