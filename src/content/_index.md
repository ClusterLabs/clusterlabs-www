+++
title = "ClusterLabs"
description = """ClusterLabs provides free and open-source software for \
high-availability clustering"""
+++

## The open-source high-availability cluster stack

The ClusterLabs community provides a collection of [free and open-source
software](https://en.wikipedia.org/wiki/Free_and_open-source_software) projects
related to [high-availability
clustering](https://en.wikipedia.org/wiki/High-availability_cluster), including
**Corosync** and **Pacemaker**.

## Benefits

A high-availability cluster coordinates the start-up, monitoring, and recovery
of services across a set of host machines, to **minimize downtime** while
preserving data integrity.

Unlike a local boot system such as *systemd*, a ClusterLabs cluster is aware
of the context of all hosts in the cluster, allowing **recovery** from
node-level failures as well as intricate relationships between services across
different hosts.

ClusterLabs clusters support **fencing**, such as powering off unresponsive
nodes, to ensure data integrity and availability after host failure. Without
fencing, hosts that lose communication can corrupt data by incorrectly bringing
up services on more than one host.

## Features

* Extensive configuration options to control cluster behavior
* Detection and recovery from host- and service-level failures
* Monitoring any measure of node health
* Practically any host [redundancy
  configuration](https://en.wikipedia.org/wiki/High-availability_cluster#Node_configurations)
* Multi-site clusters
* Live migration of services that are capable of it, including virtual machines
* Supports services that should be active on more than one host at the same
  time
* Supports services that can be promoted into a special role, such as a
  database primary
* Supports containerized services including networking and storage requirements
  of multiple replicas
* Supports complex service relationships, including ordering and colocation,
  that can span multiple hosts
