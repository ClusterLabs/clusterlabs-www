+++
title = "About ClusterLabs"
+++

**ClusterLabs** is an informal, volunteer-driven, online community providing
open-source high-availability software.

## Who we are

ClusterLabs is primarily managed and hosted by developers from
[Red Hat](https://www.redhat.com/) and [SUSE](https://www.suse.com/).

[Alteeve](https://ww2.alteeve.com/), [IBM](https://www.ibm.com/),
[Linbit](https://linbit.com/), and [NTT](https://www.global.ntt/) are among the
other companies that have contributed significant developer time and other
assistance. Numerous individuals have contributed code, documentation, and
other help to the ClusterLabs projects.

## Where we came from

<table>
 <tbody>
  <tr>
   <th>1998</th>
   <td>
     <p>Open-source high-availability started with the release of
        <strong>Heartbeat</strong> by Bell Labs' Alan Robertson. It supported
        two-node clusters and monitoring of node-level failures. The community
        that arose around the development of Heartbeat and related software
        became known as High Availability Linux, or
        <strong>Linux-HA</strong>.</p>
   </td>
  <tr>
   <th>1999</th>
   <td>
     <p>Linux-HA's Heartbeat added a simple resource manager to detect
        resource-level failures.</p>
   </td>
  </tr>
  <tr>
   <th>2000</th>
   <td>
     <p>SUSE hired Alan Robertson and began supporting Linux-HA.</p>
     <p>Separately, the Mission Critical Linux distribution released its
        <strong>Kimberlite</strong> high-availability failover project under an
        open-source license. It supported 2-node clusters and shared
        storage.</p>
   </td>
  </tr>
  <tr>
   <th>2001</th>
   <td>
    <p>Linux-HA developers started the <strong>Open Cluster Framework</strong>
       (OCF) to develop a set of generic high-availability APIs that could be
       implemented for any underlying clustering software.</p>
    <p>Separately, the <strong>Service Availability (SA) Forum,</strong> a
       consortium of communication and computing companies, was formed to
       develop specifications for carrier-grade and mission-critical systems
       using off-the-shelf technology.</p>
   </td>
  </tr>
  <tr>
   <th>2002</th>
   <td>
    <p>Red Hat Enterprise Linux (RHEL) 2.1 included the <strong>Red Hat Cluster
       Suite</strong> (RHCS), based around Kimberlite.</p>
   </td>
  <tr>
   <th>2003</th>
   <td>
    <p>SUSE hired Andrew Beekhof to improve Linux-HA's cluster resource
       manager as a distinct layer on top of the main Heartbeat code.</p>
    </td>
  </tr>
  <tr>
   <th>2004</th>
   <td>
    <p>The SA Forum defined the <strong>Application Interface Specification
       (AIS)</strong>, a set of APIs for high-availability features. Open
       Source Development Labs released the <strong>OpenAIS</strong>
       implementation the same year.</p>
    <p>Developers from Red Hat and SUSE met for the first HA Summit, in Prague,
       Czechia, to discuss future directions for the various projects in an
       effort to reduce duplication.</p>
   </td>
  </tr>
  <tr>
   <th>2005</th>
   <td>
    <p>Linux-HA's Heartbeat 2 was released with support for multiple nodes
       and its new, more feature-rich cluster resource manager.</p>
    <p>Red Hat's RHCS was reorganized to provide the <strong>CMAN</strong>
       cluster manager, with cluster membership and messaging capabilities,
       and the <strong>rgmanager</strong> resource manager.</p>
   </td>
  </tr>
  <tr>
   <th>2007</th>
   <td>
    <p>Red Hat's RHCS supported using CMAN as a plugin for OpenAIS, to combine
       their functionalities.</p>
   </td>
  </tr>
  <tr>
   <th>2008</th>
   <td>
    <p>Heartbeat spun off two projects: its cluster resource manager became the
       <strong>Pacemaker</strong> project, and its core libraries became the
       <strong>cluster-glue</strong> project. Pacemaker 0.6.0 could use either
       Heartbeat or OpenAIS as its cluster layer. The
       <strong>ClusterLabs.org</strong> domain was registered for Pacemaker's
       website.</p>
    <p>The open-source HA community held its second HA Summit.</p>
   </td>
  </tr>
  <tr>
   <th>2009</th>
   <td>
    <p>OpenAIS split into two parts: OpenAIS itself retained solely the AIS
       APIs and was deprecated, while <strong>Corosync</strong> provided the
       actual functionality of cluster membership and messaging.</p>
    <p>SUSE's SLES 11 included Pacemaker with OpenAIS instead of Heartbeat. It
       also included the <strong>crm shell</strong> as a high-level
       command-line management interface.</p>
   </td>
  </tr>
  <tr>
   <th>2010</th>
   <td>
    <p>Pacemaker 1.1.3 supported CMAN and Corosync as alternative cluster
       layers.</p>
    <p>RHEL 6.0's RHCS, rebranded as the RHEL High-Availability Add-On,
       included Corosync and CMAN.</p>
   </td>
  </tr>
  <tr>
   <th>2013</th>
   <td>
    <p>RHEL 6.5's HA Add-On supported Pacemaker as an alternative to rgmanager,
       and introduced <strong>pcs</strong> as a high-level command-line
       management interface.</p>
   </td>
  </tr>
  <tr>
   <th>2015</th>
   <td>
    <p>By the time of the
       <a href="https://projects.clusterlabs.org/w/clusterlabs/summits/2015/">third
       HA Summit</a> in Brno, Czechia, Heartbeat and CMAN had ceased active
       development, and the community had converged on a cluster stack
       utilizing Corosync and Pacemaker.</p>
    <p>Participants voted to use the ClusterLabs name as an umbrella for the
       surviving projects, to improve cooperation and raise awareness.
       Websites, mailing lists, and source repositories began to be
       consolidated under ClusterLabs.</p>
   </td>
  </tr>
  <tr>
   <th>2017</th>
   <td>
    <p>The newly renamed <a
       href="https://projects.clusterlabs.org/w/clusterlabs/summits/2017/">ClusterLabs
       Summit</a> was held in Nuremberg, Germany.</p>
   </td>
  </tr>
  <tr>
   <th>2020</th>
   <td>
    <p>Another <a
       href="https://projects.clusterlabs.org/w/clusterlabs/summits/2020/">ClusterLabs
       Summit</a> was held in Brno, Czechia, just days before the COVID-19
       pandemic shut down global travel.</p>
   </td>
  </tr>
 </tbody>
</table>

## How to reach us

See the [Community](/community/) section for mailing lists, code repositories,
and other ways of interacting with ClusterLabs.
