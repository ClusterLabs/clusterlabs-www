
/*jslint white: false, onevar: true, browser: true, devel: true, undef: true, nomen: true, eqeqeq: true, plusplus: true, bitwise: true, regexp: true, strict: false, newcap: true, immed: true */
/*global jQuery, $, Raphael */

function Timeline(paper, datesAndVersions) {
  if ( !(this instanceof arguments.callee) ) {
    return new arguments.callee(arguments);
  }

  this.paper            = paper;
  this.datesAndVersions = datesAndVersions;

  this.parseDates = function () {
    var parsedDatesAndVersions = [],
      i = 0,
      obj,
      dateParts,
      parsedDate;
    for (i = 0; i < this.datesAndVersions.length; i++) {
      obj = this.datesAndVersions[i];
      dateParts = obj.date.split(/\//);
      parsedDate = new Date();
      parsedDate.setFullYear(parseInt(dateParts[2], 10),
                             parseInt(dateParts[0], 10) - 1,
                             parseInt(dateParts[1], 10));
      parsedDatesAndVersions.push({date: parsedDate, version: obj.version});
    }
    this.datesAndVersions = parsedDatesAndVersions;
  };

  this.draw = function () {
    var radius = 26,
      timeRange,
      graphWidth = this.paper.width - radius * 2 - 2,
      startTime, endTime,
      i = 0,
      obj,
      dot,
      label,
      xOffset;

    startTime = this.datesAndVersions[0].date.getTime();
    endTime = this.datesAndVersions[this.datesAndVersions.length - 1].date.getTime();
    timeRange = endTime - startTime;

    // Versions with dot
    this.plotArray(this.datesAndVersions,
                   this.drawDotAndLabel,
                   graphWidth,
                   startTime,
                   timeRange,
                   radius);

    // Years
    this.plotArray([
      {date: (new Date(2005, 0, 1)), version: "2005"},
      {date: (new Date(2006, 0, 1)), version: "2006"},
      {date: (new Date(2007, 0, 1)), version: "2007"},
      {date: (new Date(2008, 0, 1)), version: "2008"},
      {date: (new Date(2009, 0, 1)), version: "2009"},
      {date: (new Date(2010, 0, 1)), version: "2010"},
      {date: (new Date(2011, 0, 1)), version: "2011"},
      {date: (new Date(2012, 0, 1)), version: "2012"},
      {date: (new Date(2013, 0, 1)), version: "2013"},
      {date: (new Date(2014, 0, 1)), version: "2014"},
      {date: (new Date(2015, 0, 1)), version: "2015"},
      {date: (new Date(2016, 0, 1)), version: "2016"},
      {date: (new Date(2017, 0, 1)), version: "2017"},
      {date: (new Date(2018, 0, 1)), version: "2018"},
      {date: (new Date(2019, 0, 1)), version: "2019"},
    ], this.drawYear, graphWidth, startTime, timeRange, radius);
  };

  this.plotArray = function (theArray, aDrawingCallback, graphWidth, startTime, timeRange, radius) {
    var i = 0,
      obj,
      xOffset;
    for (i = 0; i < theArray.length; i++) {
      obj = theArray[i];
      xOffset = graphWidth * ((obj.date.getTime() - startTime) / timeRange) + radius;
      aDrawingCallback(obj, xOffset, radius);
    };
  }

  this.drawDotAndLabel = function (obj, xOffset, radius) {
      var dot, label, yOffset, xSeries, ySeries, components, displayVersion;
      xSeries = obj.version.match(/^\d/);
      ySeries = obj.version.match(/^\d\.\d/) - xSeries;
      yOffset = 20 + radius + xSeries * 60;
      if(xSeries > 0) {
	  yOffset += ySeries * 250;
      }

    dot = paper.circle(xOffset, yOffset, radius - 6);
    dot.attr({
      "stroke-width": 0,
      fill: "#cccccc",
      "fill-opacity": 1.0
    });
    // Display x.y.z version only for first and last in x.y series, otherwise just .z
    if (obj.version.match(/^\d\.\d\.0/)) {
      dot.attr({ fill: "#732F2F", r: radius });
      displayVersion = obj.version;
    } else {
      components = obj.version.split(".");
      displayVersion = "." + components[components.length - 1];
    }

    label = paper.text(xOffset, yOffset, displayVersion);
    label.attr({
      fill: "#ffffff",
      "font-size": 20,
      "font-family": "'League Gothic', 'Futura-CondensedMedium', 'Gill Sans MT Condensed', 'Arial Narrow', sans-serif"
    });
  };

  this.drawYear = function (obj, xOffset, radius) {
    var label;
    label = paper.text(xOffset, 10, obj.version);
    label.attr({
      fill: "#000000",
      "fill-opacity": 0.5,
      "font-size": 10,
      "font-family": "sans-serif"
    });
  };

  this.parseDates();
  this.draw();
}

  jQuery(function () {

    var paper = Raphael("history-graph", 940, 281),
      timeline;

    timeline = new Timeline(paper, [
      {date:"01/16/2008", version:"0.6.0"},
      {date:"02/11/2008", version:"0.6.1"},
      {date:"02/14/2008", version:"0.6.2"},
      {date:"01/16/2008", version:"0.6.0"},
      {date:"04/23/2008", version:"0.6.3"},
      {date:"05/22/2008", version:"0.6.4"},
      {date:"06/19/2008", version:"0.6.5"},
      {date:"08/24/2008", version:"0.6.6"},
      {date:"12/15/2008", version:"0.6.7"},
      {date:"10/09/2008", version:"1.0.0"},
      {date:"11/18/2008", version:"1.0.1"},
      {date:"02/16/2009", version:"1.0.2"},
      {date:"04/07/2009", version:"1.0.3"},
      {date:"06/05/2009", version:"1.0.4"},
      {date:"08/10/2009", version:"1.0.5"},
      {date:"11/02/2009", version:"1.0.6"},
      {date:"01/18/2010", version:"1.0.7"},
      {date:"03/15/2010", version:"1.0.8"},
      {date:"06/23/2010", version:"1.0.9"},
      {date:"11/12/2010", version:"1.0.10"},
      {date:"04/29/2011", version:"1.0.11"},
      {date:"11/24/2011", version:"1.0.12"},
      {date:"02/13/2013", version:"1.0.13"},
      {date:"01/15/2010", version:"1.1.0"},
      {date:"03/05/2010", version:"1.1.1"},
      {date:"05/12/2010", version:"1.1.2"},
      {date:"09/21/2010", version:"1.1.3"},
      {date:"10/20/2010", version:"1.1.4"},
      {date:"02/10/2011", version:"1.1.5"},
      {date:"08/31/2011", version:"1.1.6"},
      {date:"03/29/2012", version:"1.1.7"},
      {date:"11/20/2012", version:"1.1.8"},
      {date:"03/08/2013", version:"1.1.9"},
      {date:"07/26/2013", version:"1.1.10"},
      {date:"02/13/2014", version:"1.1.11"},
      {date:"07/22/2014", version:"1.1.12"},
      {date:"06/24/2015", version:"1.1.13"},
      {date:"01/14/2016", version:"1.1.14"},
      {date:"06/21/2016", version:"1.1.15"},
      {date:"11/30/2016", version:"1.1.16"},
      {date:"07/06/2017", version:"1.1.17"},
      {date:"11/14/2017", version:"1.1.18"},
      {date:"07/11/2018", version:"1.1.19"},
      {date:"03/04/2019", version:"1.1.20"},
      {date:"06/06/2019", version:"1.1.21"},
      {date:"06/07/2018", version:"2.0.0"},
      {date:"03/04/2019", version:"2.0.1"},
      {date:"06/06/2019", version:"2.0.2"},
    ]);

  });
