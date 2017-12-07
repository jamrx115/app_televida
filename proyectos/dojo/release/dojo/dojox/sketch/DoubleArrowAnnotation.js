/*
	Copyright (c) 2004-2011, The Dojo Foundation All Rights Reserved.
	Available via Academic Free License >= 2.1 OR the modified BSD license.
	see: http://dojotoolkit.org/license for details
*/


dojo._hasResource["dojox.sketch.DoubleArrowAnnotation"]||(dojo._hasResource["dojox.sketch.DoubleArrowAnnotation"]=!0,dojo.provide("dojox.sketch.DoubleArrowAnnotation"),dojo.require("dojox.sketch.Annotation"),dojo.require("dojox.sketch.Anchor"),function(){var c=dojox.sketch;c.DoubleArrowAnnotation=function(a,b){c.Annotation.call(this,a,b);this.transform={dx:0,dy:0};this.start={x:0,y:0};this.control={x:100,y:-50};this.end={x:200,y:0};this.textPosition={x:0,y:0};this.textOffset=6;this.textYOffset=10;
this.textAlign="middle";this.endRotation=this.startRotation=0;this.endArrowGroup=this.endArrow=this.startArrowGroup=this.startArrow=this.pathShape=this.labelShape=null;this.anchors.start=new c.Anchor(this,"start");this.anchors.control=new c.Anchor(this,"control");this.anchors.end=new c.Anchor(this,"end")};c.DoubleArrowAnnotation.prototype=new c.Annotation;var f=c.DoubleArrowAnnotation.prototype;f.constructor=c.DoubleArrowAnnotation;f.type=function(){return"DoubleArrow"};f.getType=function(){return c.DoubleArrowAnnotation};
f._rot=function(){var a=this.control.y-this.start.y,b=this.control.x-this.start.x;this.startRotation=Math.atan2(a,b);a=this.end.y-this.control.y;b=this.end.x-this.control.x;this.endRotation=Math.atan2(a,b)};f._pos=function(){var a=this.textOffset;this.control.y<this.end.y?a*=-1:a+=this.textYOffset;var b={x:(this.control.x-this.start.x)*0.5+this.start.x,y:(this.control.y-this.start.y)*0.5+this.start.y},d={x:(this.end.x-this.control.x)*0.5+this.control.x,y:(this.end.y-this.control.y)*0.5+this.control.y};
this.textPosition={x:(d.x-b.x)*0.5+b.x,y:(d.y-b.y)*0.5+b.y+a}};f.apply=function(a){if(a){if(a.documentElement)a=a.documentElement;this.readCommonAttrs(a);for(var b=0;b<a.childNodes.length;b++){var d=a.childNodes[b];if(d.localName=="text")this.property("label",d.childNodes.length?d.childNodes[0].nodeValue:"");else if(d.localName=="path"){var c=d.getAttribute("d").split(" "),e=c[0].split(",");this.start.x=parseFloat(e[0].substr(1),10);this.start.y=parseFloat(e[1],10);e=c[1].split(",");this.control.x=
parseFloat(e[0].substr(1),10);this.control.y=parseFloat(e[1],10);e=c[2].split(",");this.end.x=parseFloat(e[0],10);this.end.y=parseFloat(e[1],10);c=this.property("stroke");d=d.getAttribute("style");if(e=d.match(/stroke:([^;]+);/))c.color=e[1],this.property("fill",e[1]);if(e=d.match(/stroke-width:([^;]+);/))c.width=e[1];this.property("stroke",c)}}}};f.initialize=function(a){this.apply(a);this._rot();this._pos();var b=this.startRotation,a=dojox.gfx.matrix.rotate(b),b=this.endRotation,b=dojox.gfx.matrix.rotateAt(b,
this.end.x,this.end.y);this.shape=this.figure.group.createGroup();this.shape.getEventSource().setAttribute("id",this.id);this.pathShape=this.shape.createPath("M"+this.start.x+" "+this.start.y+"Q"+this.control.x+" "+this.control.y+" "+this.end.x+" "+this.end.y+" l0,0");this.startArrowGroup=this.shape.createGroup().setTransform({dx:this.start.x,dy:this.start.y});this.startArrowGroup.applyTransform(a);this.startArrow=this.startArrowGroup.createPath();this.endArrowGroup=this.shape.createGroup().setTransform(b);
this.endArrow=this.endArrowGroup.createPath();this.labelShape=this.shape.createText({x:this.textPosition.x,y:this.textPosition.y,text:this.property("label"),align:this.textAlign}).setFill(this.property("fill"));this.labelShape.getEventSource().setAttribute("id",this.id+"-labelShape");this.draw()};f.destroy=function(){if(this.shape)this.startArrowGroup.remove(this.startArrow),this.endArrowGroup.remove(this.endArrow),this.shape.remove(this.startArrowGroup),this.shape.remove(this.endArrowGroup),this.shape.remove(this.pathShape),
this.shape.remove(this.labelShape),this.figure.group.remove(this.shape),this.shape=this.pathShape=this.labelShape=this.startArrowGroup=this.startArrow=this.endArrowGroup=this.endArrow=null};f.draw=function(a){this.apply(a);this._rot();this._pos();var b=this.startRotation,a=dojox.gfx.matrix.rotate(b),b=this.endRotation,b=dojox.gfx.matrix.rotateAt(b,this.end.x,this.end.y);this.shape.setTransform(this.transform);this.pathShape.setShape("M"+this.start.x+" "+this.start.y+" Q"+this.control.x+" "+this.control.y+
" "+this.end.x+" "+this.end.y+" l0,0");this.startArrowGroup.setTransform({dx:this.start.x,dy:this.start.y}).applyTransform(a);this.startArrow.setFill(this.property("fill"));this.endArrowGroup.setTransform(b);this.endArrow.setFill(this.property("fill"));this.labelShape.setShape({x:this.textPosition.x,y:this.textPosition.y,text:this.property("label")}).setFill(this.property("fill"));this.zoom()};f.zoom=function(a){if(this.startArrow){a=a||this.figure.zoomFactor;c.Annotation.prototype.zoom.call(this,
a);var b=a>1?20:Math.floor(20/a),d=a>1?5:Math.floor(5/a),a=a>1?3:Math.floor(3/a);this.startArrow.setShape("M0,0 l"+b+",-"+d+" -"+a+","+d+" "+a+","+d+" Z");this.endArrow.setShape("M"+this.end.x+","+this.end.y+" l-"+b+",-"+d+" "+a+","+d+" -"+a+","+d+" Z")}};f.getBBox=function(){var a=Math.min(this.start.x,this.control.x,this.end.x),b=Math.min(this.start.y,this.control.y,this.end.y);return{x:a,y:b,width:Math.max(this.start.x,this.control.x,this.end.x)-a,height:Math.max(this.start.y,this.control.y,this.end.y)-
b}};f.serialize=function(){var a=this.property("stroke");return"<g "+this.writeCommonAttrs()+'><path style="stroke:'+a.color+";stroke-width:"+a.width+';fill:none;" d="M'+this.start.x+","+this.start.y+" Q"+this.control.x+","+this.control.y+" "+this.end.x+","+this.end.y+'" /><g transform="translate('+this.start.x+","+this.start.y+") rotate("+Math.round(this.startRotation*(180/Math.PI)*Math.pow(10,4))/Math.pow(10,4)+')"><path style="fill:'+a.color+';" d="M0,0 l20,-5, -3,5, 3,5 Z" /></g><g transform="rotate('+
Math.round(this.endRotation*(180/Math.PI)*Math.pow(10,4))/Math.pow(10,4)+", "+this.end.x+", "+this.end.y+')"><path style="fill:'+a.color+';" d="M'+this.end.x+","+this.end.y+' l-20,-5, 3,5, -3,5 Z" /></g><text style="fill:'+a.color+";text-anchor:"+this.textAlign+'" font-weight="bold" x="'+this.textPosition.x+'" y="'+this.textPosition.y+'">'+this.property("label")+"</text></g>"};c.Annotation.register("DoubleArrow")}());