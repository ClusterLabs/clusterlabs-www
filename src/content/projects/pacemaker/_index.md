+++
title = "Pacemaker"
layout = "single"
+++

An [open-source](https://en.wikipedia.org/wiki/Open-source_model)
[high-availability](https://en.wikipedia.org/wiki/High_availability)
cluster resource manager

## Documentation

* [Pacemaker documentation](doc/)

## Features

* Detection and recovery of host- and application-level failures
* Support for practically any [redundancy
  configuration](https://en.wikipedia.org/wiki/High-availability_cluster#Node_configurations)
* Configurable strategies for dealing with quorum loss
* Support for ordering of starts and stops of different applications, without
  requiring the applications to run on the same host
* Support for applications that must or must not run on the same host
* Supports for applications that should be active on multiple hosts
* Support for applications with dual roles (promoted and unpromoted)
* Provably correct response to any failure or cluster state (cluster response
  to any condition can be tested offline *before* the condition exists)

## Development

<a class="ohloh" href="https://www.openhub.net/p/pacemaker?ref=sample">
<img alt="Black Duck Open Hub project report for pacemaker"
border="0"
src="https://www.openhub.net/p/pacemaker/widgets/project_partner_badge.gif">
</a>

Development of Pacemaker started in
[2004](https://www.openhub.net/p/pacemaker/analyses/latest/languages_summary)
and is a collaborative effort by the ClusterLabs community, including
full-time developers with
[Red Hat](https://www.redhat.com/) and [SUSE](https://www.suse.com/).

Pacemaker ships with most modern Linux distributions and has been deployed in
many critical environments including [Deutsche Flugsicherung
GmbH](http://www.dfs.de/dfs_homepage/de/), which used Pacemaker to ensure
[air traffic control
systems](http://web.archive.org/web/20090201115037/http://www.novell.com:80/success/dfs.html)
are always available.

Pacemaker's original author [Andrew Beekhof](https://www.beekhof.net/) led the
project until late 2015, followed by Ken Gaillot through 2024. Chris Lumens now
leads it.
