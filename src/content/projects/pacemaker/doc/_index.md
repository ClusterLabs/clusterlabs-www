+++
title = "Pacemaker documentation"
layout = "single"
outputs = ["PHP"]
+++

Most of the documentation listed here was generated from the Pacemaker sources.

## Where to Start

If you're new to Pacemaker or clustering in general, the best place to start is
**Clusters from Scratch**, which walks you step-by-step through the
installation and configuration of a high-availability cluster with Pacemaker.
It even makes common configuration mistakes so that it can demonstrate how to
fix them.

On the other hand, if you're looking for an exhaustive reference of all of
Pacemaker's options and features, try **Pacemaker Explained**. It's dry, but
should have the answers you're looking for.

There is also a [project wiki](https://projects.clusterlabs.org/w/) with
examples, how-to guides, and other information that doesn't make it into the
manuals.

## Unversioned documentation

| Command-line tools | Formats                              |
|--------------------|--------------------------------------|
| man(1) pages       | \[[html](/projects/pacemaker/man/)\] |

## Versioned documentation

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

   function sphinx_docs_for_version($base, $version) {
     echo "  <section class='docset'>\n";
     doc_version_heading($base, $version);

     echo "    <table>\n";
     foreach (glob("$base/$version/*") as $filename) {
       $book = basename($filename);
       $formats = glob("$base/$version/$book/*");
       if (!empty($formats)) {
           echo "      <tr>\n";
           echo "        <td>" . str_replace("_", " ", $book) . "</td>\n";
           echo "        <td>";

           foreach ($formats as $format) {
               $format_name = basename($format);
               if (strncmp($format_name, "build-", 6) !== 0) {
                   if ($format_name == "pdf") {
                       $link = "$format/$book.pdf";
                   } else {
                       $link = "$format/";
                   }
                   echo " [<a class='doclink' href='$link'>" . $format_name . "</a>]";
               }
           }
           echo "</td>\n";
           echo "      </tr>\n";
       }
     }
     echo "    </table>\n";
     echo "  </section>\n";
   }

   foreach (get_versions("./[0-9]*.*") as $v) {
     sphinx_docs_for_version(".", $v);
   }
?>

### Developer documentation

* *Pacemaker Development* above is the primary source of developer
  documentation
* [Indexed source code](/projects/pacemaker/global)
* [API documentation](/projects/pacemaker/doxygen)
* [ABI compatibility](/projects/pacemaker/abi)

## Older versions

* [Deprecated documentation](deprecated/) is available for no-longer-supported
  Pacemaker versions
