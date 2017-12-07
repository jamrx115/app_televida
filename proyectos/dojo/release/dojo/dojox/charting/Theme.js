/*
	Copyright (c) 2004-2011, The Dojo Foundation All Rights Reserved.
	Available via Academic Free License >= 2.1 OR the modified BSD license.
	see: http://dojotoolkit.org/license for details
*/


dojo._hasResource["dojox.charting.Theme"]||(dojo._hasResource["dojox.charting.Theme"]=!0,dojo.provide("dojox.charting.Theme"),dojo.require("dojox.color"),dojo.require("dojox.color.Palette"),dojo.require("dojox.lang.utils"),dojo.require("dojox.gfx.gradutils"),dojo.declare("dojox.charting.Theme",null,{shapeSpaces:{shape:1,shapeX:1,shapeY:1},constructor:function(a){var a=a||{},e=dojox.charting.Theme.defaultTheme;dojo.forEach(["chart","plotarea","axis","series","marker"],function(b){this[b]=dojo.delegate(e[b],
a[b])},this);a.seriesThemes&&a.seriesThemes.length?(this.colors=null,this.seriesThemes=a.seriesThemes.slice(0)):(this.seriesThemes=null,this.colors=(a.colors||dojox.charting.Theme.defaultColors).slice(0));this.markerThemes=null;if(a.markerThemes&&a.markerThemes.length)this.markerThemes=a.markerThemes.slice(0);this.markers=a.markers?dojo.clone(a.markers):dojo.delegate(dojox.charting.Theme.defaultMarkers);this.noGradConv=a.noGradConv;this.noRadialConv=a.noRadialConv;a.reverseFills&&this.reverseFills();
this._current=0;this._buildMarkerArray()},clone:function(){var a=new dojox.charting.Theme({chart:this.chart,plotarea:this.plotarea,axis:this.axis,series:this.series,marker:this.marker,colors:this.colors,markers:this.markers,seriesThemes:this.seriesThemes,markerThemes:this.markerThemes,noGradConv:this.noGradConv,noRadialConv:this.noRadialConv});dojo.forEach(["clone","clear","next","skip","addMixin","post","getTick"],function(e){this.hasOwnProperty(e)&&(a[e]=this[e])},this);return a},clear:function(){this._current=
0},next:function(a,e,b){var c=dojox.lang.utils.merge,d;if(this.colors){d=dojo.delegate(this.series);var c=dojo.delegate(this.marker),f=new dojo.Color(this.colors[this._current%this.colors.length]),g;d.stroke&&d.stroke.color?(d.stroke=dojo.delegate(d.stroke),g=new dojo.Color(d.stroke.color),d.stroke.color=new dojo.Color(f),d.stroke.color.a=g.a):d.stroke={color:f};c.stroke&&c.stroke.color?(c.stroke=dojo.delegate(c.stroke),g=new dojo.Color(c.stroke.color),c.stroke.color=new dojo.Color(f),c.stroke.color.a=
g.a):c.stroke={color:f};!d.fill||d.fill.type?d.fill=f:(g=new dojo.Color(d.fill),d.fill=new dojo.Color(f),d.fill.a=g.a);!c.fill||c.fill.type?c.fill=f:(g=new dojo.Color(c.fill),c.fill=new dojo.Color(f),c.fill.a=g.a)}else d=this.seriesThemes?c(this.series,this.seriesThemes[this._current%this.seriesThemes.length]):this.series,c=this.markerThemes?c(this.marker,this.markerThemes[this._current%this.markerThemes.length]):d;d={series:d,marker:c,symbol:c&&c.symbol||this._markers[this._current%this._markers.length]};
++this._current;e&&(d=this.addMixin(d,a,e));b&&(d=this.post(d,a));return d},skip:function(){++this._current},addMixin:function(a,e,b,c){if(dojo.isArray(b))dojo.forEach(b,function(b){a=this.addMixin(a,e,b)},this);else{var d={};"color"in b&&(e=="line"||e=="area"?(dojo.setObject("series.stroke.color",b.color,d),dojo.setObject("marker.stroke.color",b.color,d)):dojo.setObject("series.fill",b.color,d));dojo.forEach(["stroke","outline","shadow","fill","font","fontColor","labelWiring"],function(a){var c=
"marker"+a.charAt(0).toUpperCase()+a.substr(1),e=c in b;a in b&&(dojo.setObject("series."+a,b[a],d),e||dojo.setObject("marker."+a,b[a],d));e&&dojo.setObject("marker."+a,b[c],d)});if("marker"in b)d.symbol=b.marker;a=dojox.lang.utils.merge(a,d)}c&&(a=this.post(a,e));return a},post:function(a,e){var b=a.series.fill,c;if(!this.noGradConv&&this.shapeSpaces[b.space]&&b.type=="linear"){if(e=="bar")c={x1:b.y1,y1:b.x1,x2:b.y2,y2:b.x2};else if(!this.noRadialConv&&b.space=="shape"&&(e=="slice"||e=="circle"))c=
{type:"radial",cx:0,cy:0,r:100};if(c)return dojox.lang.utils.merge(a,{series:{fill:c}})}return a},getTick:function(a,e){var b=this.axis.tick,c=a+"Tick";merge=dojox.lang.utils.merge;b?this.axis[c]&&(b=merge(b,this.axis[c])):b=this.axis[c];e&&(b?e[c]&&(b=merge(b,e[c])):b=e[c]);return b},inspectObjects:function(a){dojo.forEach(["chart","plotarea","axis","series","marker"],function(e){a(this[e])},this);this.seriesThemes&&dojo.forEach(this.seriesThemes,a);this.markerThemes&&dojo.forEach(this.markerThemes,
a)},reverseFills:function(){this.inspectObjects(function(a){if(a&&a.fill)a.fill=dojox.gfx.gradutils.reverse(a.fill)})},addMarker:function(a,e){this.markers[a]=e;this._buildMarkerArray()},setMarkers:function(a){this.markers=a;this._buildMarkerArray()},_buildMarkerArray:function(){this._markers=[];for(var a in this.markers)this._markers.push(this.markers[a])}}),dojo.mixin(dojox.charting.Theme,{defaultMarkers:{CIRCLE:"m-3,0 c0,-4 6,-4 6,0 m-6,0 c0,4 6,4 6,0",SQUARE:"m-3,-3 l0,6 6,0 0,-6 z",DIAMOND:"m0,-3 l3,3 -3,3 -3,-3 z",
CROSS:"m0,-3 l0,6 m-3,-3 l6,0",X:"m-3,-3 l6,6 m0,-6 l-6,6",TRIANGLE:"m-3,3 l3,-6 3,6 z",TRIANGLE_INVERTED:"m-3,-3 l3,6 3,-6 z"},defaultColors:["#54544c","#858e94","#6e767a","#948585","#474747"],defaultTheme:{chart:{stroke:null,fill:"white",pageStyle:null,titleGap:20,titlePos:"top",titleFont:"normal normal bold 14pt Tahoma",titleFontColor:"#333"},plotarea:{stroke:null,fill:"white"},axis:{stroke:{color:"#333",width:1},tick:{color:"#666",position:"center",font:"normal normal normal 7pt Tahoma",fontColor:"#333",
titleGap:15,titleFont:"normal normal normal 11pt Tahoma",titleFontColor:"#333",titleOrientation:"axis"},majorTick:{width:1,length:6},minorTick:{width:0.8,length:3},microTick:{width:0.5,length:1}},series:{stroke:{width:1.5,color:"#333"},outline:{width:0.1,color:"#ccc"},shadow:null,fill:"#ccc",font:"normal normal normal 8pt Tahoma",fontColor:"#000",labelWiring:{width:1,color:"#ccc"}},marker:{stroke:{width:1.5,color:"#333"},outline:{width:0.1,color:"#ccc"},shadow:null,fill:"#ccc",font:"normal normal normal 8pt Tahoma",
fontColor:"#000"}},defineColors:function(a){var a=a||{},e=[],b=a.num||5;if(a.colors){for(var c=a.colors.length,d=0;d<b;d++)e.push(a.colors[d%c]);return e}return a.hue?(e=a.saturation||100,c=((a.high||90)+(a.low||30))/2,dojox.color.Palette.generate(dojox.color.fromHsv(a.hue,e,c),"monochromatic").colors):a.generator?dojox.color.Palette.generate(a.base,a.generator).colors:e},generateGradient:function(a,e,b){a=dojo.delegate(a);a.colors=[{offset:0,color:e},{offset:1,color:b}];return a},generateHslColor:function(a,
e){var a=new dojox.color.Color(a),b=a.toHsl(),b=dojox.color.fromHsl(b.h,b.s,e);b.a=a.a;return b},generateHslGradient:function(a,e,b,c){var a=new dojox.color.Color(a),d=a.toHsl(),b=dojox.color.fromHsl(d.h,d.s,b),c=dojox.color.fromHsl(d.h,d.s,c);b.a=c.a=a.a;return dojox.charting.Theme.generateGradient(e,b,c)}}));