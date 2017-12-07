/*
	Copyright (c) 2004-2011, The Dojo Foundation All Rights Reserved.
	Available via Academic Free License >= 2.1 OR the modified BSD license.
	see: http://dojotoolkit.org/license for details
*/


if(!dojo._hasResource["dojox.drawing.manager.Anchors"])dojo._hasResource["dojox.drawing.manager.Anchors"]=!0,dojo.provide("dojox.drawing.manager.Anchors"),dojox.drawing.manager.Anchors=dojox.drawing.util.oo.declare(function(a){this.mouse=a.mouse;this.undo=a.undo;this.util=a.util;this.drawing=a.drawing;this.items={}},{onAddAnchor:function(){},onReset:function(a){var b=this.util.byId("drawing").stencils;b.onDeselect(a);b.onSelect(a)},onRenderStencil:function(){for(var a in this.items)dojo.forEach(this.items[a].anchors,
function(a){a.shape.moveToFront()})},onTransformPoint:function(a){var b=this.items[a.stencil.id].item,c=[];dojo.forEach(this.items[a.stencil.id].anchors,function(b){a.id==b.id||a.stencil.anchorType!="group"||(a.org.y==b.org.y?b.setPoint({dx:0,dy:a.shape.getTransform().dy-b.shape.getTransform().dy}):a.org.x==b.org.x&&b.setPoint({dx:a.shape.getTransform().dx-b.shape.getTransform().dx,dy:0}),b.shape.moveToFront());var e=b.shape.getTransform();c.push({x:e.dx+b.org.x,y:e.dy+b.org.y});if(b.point.t)c[c.length-
1].t=b.point.t},this);b.setPoints(c);b.onTransform(a);this.onRenderStencil()},onAnchorUp:function(){},onAnchorDown:function(){},onAnchorDrag:function(){},onChangeStyle:function(){for(var a in this.items)dojo.forEach(this.items[a].anchors,function(a){a.shape.moveToFront()})},add:function(a){this.items[a.id]={item:a,anchors:[]};if(a.anchorType!="none"){var b=a.points;dojo.forEach(b,function(b,c){if(!b.noAnchor){(c==0||c==a.points.length-1)&&console.log("ITEM TYPE:",a.type,a.shortType);var d=new dojox.drawing.manager.Anchor({stencil:a,
point:b,pointIdx:c,mouse:this.mouse,util:this.util});this.items[a.id]._cons=[dojo.connect(d,"onRenderStencil",this,"onRenderStencil"),dojo.connect(d,"reset",this,"onReset"),dojo.connect(d,"onAnchorUp",this,"onAnchorUp"),dojo.connect(d,"onAnchorDown",this,"onAnchorDown"),dojo.connect(d,"onAnchorDrag",this,"onAnchorDrag"),dojo.connect(d,"onTransformPoint",this,"onTransformPoint"),dojo.connect(a,"onChangeStyle",this,"onChangeStyle")];this.items[a.id].anchors.push(d);this.onAddAnchor(d)}},this);if(a.shortType==
"path"){var c=b[0],b=b[b.length-1],d=this.items[a.id].anchors;if(c.x==b.x&&c.y==b.y)console.warn("LINK ANVHROS",d[0],d[d.length-1]),d[0].linkedAnchor=d[d.length-1],d[d.length-1].linkedAnchor=d[0]}a.anchorType=="group"&&dojo.forEach(this.items[a.id].anchors,function(b){dojo.forEach(this.items[a.id].anchors,function(a){if(b.id!=a.id)if(b.org.y==a.org.y)b.x_anchor=a;else if(b.org.x==a.org.x)b.y_anchor=a},this)},this)}},remove:function(a){if(this.items[a.id])dojo.forEach(this.items[a.id].anchors,function(a){a.destroy()}),
dojo.forEach(this.items[a.id]._cons,dojo.disconnect,dojo),this.items[a.id].anchors=null,delete this.items[a.id]}}),dojox.drawing.manager.Anchor=dojox.drawing.util.oo.declare(function(a){this.defaults=dojox.drawing.defaults.copy();this.mouse=a.mouse;this.point=a.point;this.pointIdx=a.pointIdx;this.util=a.util;this.id=a.id||this.util.uid("anchor");this.org=dojo.mixin({},this.point);this.stencil=a.stencil;if(this.stencil.anchorPositionCheck)this.anchorPositionCheck=dojo.hitch(this.stencil,this.stencil.anchorPositionCheck);
if(this.stencil.anchorConstrain)this.anchorConstrain=dojo.hitch(this.stencil,this.stencil.anchorConstrain);this._zCon=dojo.connect(this.mouse,"setZoom",this,"render");this.render();this.connectMouse()},{y_anchor:null,x_anchor:null,render:function(){this.shape&&this.shape.removeShape();var a=this.defaults.anchors,b=this.mouse.zoom,c=a.size*b,d=c/2,b={width:a.width*b,style:a.style,color:a.color,cap:a.cap};this.shape=this.stencil.container.createRect({x:this.point.x-d,y:this.point.y-d,width:c,height:c}).setStroke(b).setFill(a.fill);
this.shape.setTransform({dx:0,dy:0});this.util.attr(this,"drawingType","anchor");this.util.attr(this,"id",this.id)},onRenderStencil:function(){},onTransformPoint:function(){},onAnchorDown:function(a){this.selected=a.id==this.id},onAnchorUp:function(){this.selected=!1;this.stencil.onTransformEnd(this)},onAnchorDrag:function(a){if(this.selected){this.shape.getTransform();var b=this.shape.getParent().getParent().getTransform(),c=this.defaults.anchors.marginZero,d=b.dx+this.org.x,e=b.dy+this.org.y,b=
a.x-d,a=a.y-e,g=this.defaults.anchors.minSize,f;f=this.anchorPositionCheck(b,a,this);if(f.x<0)for(console.warn("X<0 Shift");this.anchorPositionCheck(b,a,this).x<0;)this.shape.getParent().getParent().applyTransform({dx:2,dy:0});if(f.y<0)for(console.warn("Y<0 Shift");this.anchorPositionCheck(b,a,this).y<0;)this.shape.getParent().getParent().applyTransform({dx:0,dy:2});this.y_anchor?this.org.y>this.y_anchor.org.y?(e=this.y_anchor.point.y+g-this.org.y,a<e&&(a=e)):(e=-e+c,f=this.y_anchor.point.y-g-this.org.y,
a<e?a=e:a>f&&(a=f)):(e=-e+c,a<e&&(a=e));this.x_anchor?this.org.x>this.x_anchor.org.x?(c=this.x_anchor.point.x+g-this.org.x,b<c&&(b=c)):(c=-d+c,d=this.x_anchor.point.x-g-this.org.x,b<c?b=c:b>d&&(b=d)):(c=-d+c,b<c&&(b=c));c=this.anchorConstrain(b,a);if(c!=null)b=c.x,a=c.y;this.shape.setTransform({dx:b,dy:a});this.linkedAnchor&&this.linkedAnchor.shape.setTransform({dx:b,dy:a});this.onTransformPoint(this)}},anchorConstrain:function(){return null},anchorPositionCheck:function(){return{x:1,y:1}},setPoint:function(a){this.shape.applyTransform(a)},
connectMouse:function(){this._mouseHandle=this.mouse.register(this)},disconnectMouse:function(){this.mouse.unregister(this._mouseHandle)},reset:function(){},destroy:function(){dojo.disconnect(this._zCon);this.disconnectMouse();this.shape.removeShape()}});