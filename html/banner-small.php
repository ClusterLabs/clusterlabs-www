<?php

echo '
    <ul id="nav" class="dropdown dropdown-horizontal">
      <li class="dir">clusterlabs menu
        <ul>
          <li><a href="http://www.clusterlabs.org/">Home</a></li>
          <li><a href="http://www.clusterlabs.org/wiki">Wiki</a></li>
          <li class="dir"><a href="http://www.clusterlabs.org/doc">Documentation</a>
	    <ul>
	      <li><a href="http://www.clusterlabs.org/doc">Full Listing</a></li>
	      <li><a href="http://www.clusterlabs.org/doc/en-US/Pacemaker/1.1/html/Pacemaker_Explained">Reference v1.1</a></li>
	      <li><a href="http://www.clusterlabs.org/doc/en-US/Pacemaker/1.0/html/Pacemaker_Explained">Reference v1.0</a></li>
	      <li><a href="http://www.clusterlabs.org/doc/en-US/Pacemaker/1.1/html/Clusters_from_Scratch">Clusters from Scratch</a></li>
	    </ul>
    	  </li>
          <li class="dir"><a href="http://www.clusterlabs.org/rpm/">Pre-built Packages</a>
	    <ul>
              <li><a href="http://www.clusterlabs.org/rpm-next/">1.1 (recommended)</a></li>
              <li><a href="http://www.clusterlabs.org/rpm/">1.0</a></li>
	    </ul>
	  </li>
          <li><a href="http://oss.clusterlabs.org/mailman/listinfo/pacemaker">Ask a Question</a></li>
          <li><a href="http://developerbugs.linux-foundation.org/enter_bug.cgi?product=Pacemaker">Report a Problem</a></li>
          <li class="dir"><a href="#">Developers</a>
	    <ul>
              <li><a href="http://build.clusterlabs.org:8010/one_box_per_builder">Buildbot Status</a></li>
              <li><a href="http://build.clusterlabs.org/buildbot/">Buildbot Results</a></li>
              <li><a href="http://www.clusterlabs.org/coverity/pacemaker/">Coverity Defect Reports</a></li>
              <li><a href="http://www.clusterlabs.org/global/pacemaker/">Indexed Source Code</a></li>
              <li><a href="http://www.clusterlabs.org/doxygen/pacemaker/">API Documentation</a></li>
	    </ul>
	  </li>
        </ul>
      </li>
    </ul>

    <div id="search-box">
      <form action="http://www.clusterlabs.org/wiki/Special:Search" id="searchform">
    	<div id="search-button">site-search:</div> 
      	<!--input id="search-button" type="submit" name="fulltext" value="site-search" title="Search the wiki for this text"/-->
    	<input id="search-input" name="search" type="text" title="Search Cluster Labs [f]" accesskey="f" value=""/>
      </form>     
    </div>
';

echo '
  <div id="banner" style="overflow: hidden; margin-bottom: 15px; float: left">
    <img src="http://www.clusterlabs.org/images/GetPacemakerBanner.png" />
  </div>
';
?>