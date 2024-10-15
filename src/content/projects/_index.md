+++
title = "ClusterLabs projects"
description = "Open-source software projects hosted by ClusterLabs"
layout = "single"
+++

## The cluster stack

* The [Open Cluster Framework](https://github.com/ClusterLabs/OCF-spec/) (OCF)
  is a set of standards for cluster components. Currently, only the resource
  agent standard is in use. A resource agent is an abstraction that provides
  service-level awareness to a cluster. It contains the logic for what to do
  when the cluster wishes to start, stop, or check the health of a particular
  service.

* The [Quite Boring Library](https://clusterlabs.github.io/libqb/), also called
  libqb, provides high-performance features for client/server applications,
  most importantly logging and interprocess communication.

* [Kronosnet](https://kronosnet.org/), also called knet, is a network
  abstraction layer supporting redundancy, security, fault tolerance, and fast
  fail-over of network links.

* [Corosync](https://corosync.github.io/corosync/) is the membership and
  messaging layer. It tracks all hosts in a cluster, including liveness and
  quorum, and allows for reliable communication among hosts, with message
  deliverability guarantees.

* [Pacemaker](/projects/pacemaker/) is the cluster resource manager. It
  coordinates the configuration, start-up, monitoring, and recovery of
  interrelated services across all cluster hosts. Pacemaker supports a number
  of service types, including OCF resource agents and systemd unit files.
  Pacemaker supports advanced service configurations such as groups of
  dependent resources, services that should be active on multiple machines at
  the same time, resources that can switch between two different roles, and
  containerized services.

* The [fence-agents](https://github.com/ClusterLabs/fence-agents/) project
  provides a set of commonly used fencing agents. Fencing agents are the
  abstraction that allows Pacemaker to isolate badly behaving nodes, by either
  powering off the node or disabling its access to common resources. The
  fence-agents project provides fence agents for devices including intelligent
  power and network switches, IPMI, cloud providers, virtualization hosts, and
  shared storage access.

* The [resource-agents](https://github.com/ClusterLabs/resource-agents/)
  project provides a set of OCF resource agents for commonly used services.

## High-level configuration tools

Pacemaker's internal configuration format is XML, which is great for machines
but terrible for humans.

Multiple higher-level configuration tools are available to allow the
configuration to be viewed and updated in a more human-friendly format.

* The [crm shell](https://crmsh.github.io/) is the original configuration shell
  for Pacemaker. Written and actively maintained by SUSE, it may be used as an
  interactive shell with tab completion, for single commands directly on the
  shell's command line, or as a batch mode scripting tool.

* The [High Availability Web Konsole](https://hawk-ui.github.io/) (Hawk) is a
  web-based GUI for managing and monitoring ClusterLabs clusters. The [Hawk API
  server](https://github.com/ClusterLabs/hawk-apiserver/) provides a
  minimalistic web server handling SSL certificates, proxying, and static file
  serving for Hawk.

* The [Linux Cluster Management Console](http://lcmc.sf.net/) (LCMC) is a GUI
  with an innovative approach for representing the status of and relationships
  between cluster services. It uses SSH to let you install, configure, and
  manage clusters from your desktop.

* The Pacemaker/Corosync Configuration System (PCS) provides a command-line
  tool [pcs](https://github.com/ClusterLabs/pcs/) and the [PCS Web
  UI](https://github.com/ClusterLabs/pcs-web-ui) for managing the complete life
  cycle of multiple cluster components, including Pacemaker, Corosync, QDevice,
  SBD, and Booth.

## Cluster add-ons

* The Anvil! Intelligent Availability platform is a self-contained system based
  on a two-node high-availability cluster with power fencing.
  [Striker](https://github.com/ClusterLabs/striker/) is the current, second
  generation of the platform. [Anvil](https://github.com/ClusterLabs/anvil/) is
  the upcoming, third generation of the platform. The
  [anvil-external-deps](https://github.com/ClusterLabs/anvil-external-deps)
  project is collection of scripts and spec files used by the platform.

* The [Booth](https://github.com/ClusterLabs/booth/) cluster ticket manager
  extends Pacemaker to support geographically distributed clustering. It does
  this by managing the granting and revoking of *tickets* which authorize one
  of the cluster sites, potentially located in geographically dispersed
  locations, to run specified resources.

* The [cluster-glue](https://github.com/ClusterLabs/cluster-glue/) library
  initially provided an executor and fencer for early Pacemaker versions that
  did not include their own, but now mostly provides Pacemaker the ability to
  use fencing agents conforming to the Linux-HA interface.

* The
  [ha-cluster-exporter](https://github.com/ClusterLabs/ha_cluster_exporter/)
  project provides a Prometheus exporter for monitoring ClusterLabs clusters.

* The [PostgreSQL Automatic Failover](https://github.com/ClusterLabs/PAF/)
  (PAF) project provides a featureful OCF resource agent for PostgreSQL.

* [SBD](https://github.com/ClusterLabs/sbd/) provides a self-fencing mechanism
  for cluster hosts, utilizing a watchdog device and optionally shared block
  storage such as a SAN, iSCSI, or FCoE.

## Miscellaneous

* The [clusterlabs-www](https://github.com/ClusterLabs/clusterlabs-www) project
  provides the source for [this website](https://www.clusterlabs.org/).

* The [go-pacemaker](https://github.com/ClusterLabs/go-pacemaker/) project
  provides Go language APIs for cluster configuration and status.

* The [High Laughability](https://github.com/ClusterLabs/high-laughability)
  project is an occasionally amusing collection of anecdotes (mostly chat
  quotes) from ClusterLabs software development.

## Historical projects

The following projects are no longer maintained and are provided solely as a
historical reference.

* The [fence-virt](https://github.com/ClusterLabs/fence-virt/) project provided
  fencing agents for virtual hosts, now included in the fencing-agents project.

* The [Pacemaker 1.0](https://github.com/ClusterLabs/pacemaker-1.0) repository
  provides access to early Pacemaker code.

* [Pacemaker-mgmt](https://github.com/ClusterLabs/pacemaker-mgmt/) was the
  first GUI written for Pacemaker.

* The
  [nagios-agents-metadata](https://github.com/ClusterLabs/nagios-agents-metadata)
  project provided support files for using Nagios monitoring plugins as
  Pacemaker resources (no longer supported as of the Pacemaker 3.0.0 release).

* The [SAP Cluster
  Connector](https://github.com/ClusterLabs/sap_cluster_connector) provided
  integration tools for managing SAP software in a cluster.
