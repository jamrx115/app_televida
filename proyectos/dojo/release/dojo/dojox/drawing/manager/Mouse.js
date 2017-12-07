/*
	Copyright (c) 2004-2011, The Dojo Foundation All Rights Reserved.
	Available via Academic Free License >= 2.1 OR the modified BSD license.
	see: http://dojotoolkit.org/license for details
*/


if(!dojo._hasResource["dojox.drawing.manager.Mouse"])dojo._hasResource["dojox.drawing.manager.Mouse"]=!0,dojo.provide("dojox.drawing.manager.Mouse"),dojox.drawing.manager.Mouse=dojox.drawing.util.oo.declare(function(a){this.util=a.util;this.keys=a.keys;this.id=a.id||this.util.uid("mouse");this.currentNodeId="";this.registered={}},{doublClickSpeed:400,rightClickMenu:!1,_lastx:0,_lasty:0,__reg:0,_downOnCanvas:!1,init:function(a){this.container=a;this.setCanvas();var b,c=!1;dojo.connect(this.container,
"rightclick",this,function(){console.warn("RIGHTCLICK")});dojo.connect(document.body,"mousedown",this,function(){});dojo.connect(this.container,"mousedown",this,function(a){this.down(a);a.button!=dojo.mouseButtons.RIGHT&&(c=!0,b=dojo.connect(document,"mousemove",this,"drag"))});dojo.connect(document,"mouseup",this,function(a){a.button!=dojo.mouseButtons.RIGHT&&(dojo.disconnect(b),c=!1);this.up(a)});dojo.connect(document,"mousemove",this,function(a){c||this.move(a)});dojo.connect(this.keys,"onEsc",
this,function(){this._dragged=!1})},setCanvas:function(){var a=dojo.coords(this.container.parentNode);this.origin=dojo.clone(a)},scrollOffset:function(){return{top:this.container.parentNode.scrollTop,left:this.container.parentNode.scrollLeft}},resize:function(a,b){if(this.origin)this.origin.w=a,this.origin.h=b},register:function(a){var b=a.id||"reg_"+this.__reg++;this.registered[b]||(this.registered[b]=a);return b},unregister:function(a){this.registered[a]&&delete this.registered[a]},_broadcastEvent:function(a,
b){for(var c in this.registered)if(this.registered[c][a])this.registered[c][a](b)},onDown:function(a){this._broadcastEvent(this.eventName("down"),a)},onDrag:function(a){var b=this.eventName("drag");this._selected&&b=="onDrag"&&(b="onStencilDrag");this._broadcastEvent(b,a)},onMove:function(a){this._broadcastEvent("onMove",a)},overName:function(a,b){var c=a.id.split("."),b=b.charAt(0).toUpperCase()+b.substring(1);return c[0]=="dojox"&&(dojox.drawing.defaults.clickable||!dojox.drawing.defaults.clickMode)?
"onStencil"+b:"on"+b},onOver:function(a){this._broadcastEvent(this.overName(a,"over"),a)},onOut:function(a){this._broadcastEvent(this.overName(a,"out"),a)},onUp:function(a){var b=this.eventName("up");if(b=="onStencilUp")this._selected=!0;else if(this._selected&&b=="onUp")b="onStencilUp",this._selected=!1;console.info("Up Event:",this.id,b,"id:",a.id);this._broadcastEvent(b,a);if(dojox.gfx.renderer!="silverlight")this._clickTime=(new Date).getTime(),this._lastClickTime&&this._clickTime-this._lastClickTime<
this.doublClickSpeed&&(b=this.eventName("doubleClick"),console.warn("DOUBLE CLICK",b,a),this._broadcastEvent(b,a)),this._lastClickTime=this._clickTime},zoom:1,setZoom:function(a){this.zoom=1/a},setEventMode:function(a){this.mode=a?"on"+a.charAt(0).toUpperCase()+a.substring(1):""},eventName:function(a){a=a.charAt(0).toUpperCase()+a.substring(1);if(this.mode)return this.mode=="onPathEdit"?"on"+a:this.mode+a;else{if(!dojox.drawing.defaults.clickable&&dojox.drawing.defaults.clickMode)return"on"+a;var b=
!this.drawingType||this.drawingType=="surface"||this.drawingType=="canvas"?"":this.drawingType;return"on"+(!b?"":b.charAt(0).toUpperCase()+b.substring(1))+a}},up:function(a){this.onUp(this.create(a))},down:function(a){this._downOnCanvas=!0;var b=this.scrollOffset(),c=this._getXY(a);this._lastpagex=c.x;this._lastpagey=c.y;var d=this.origin,e=c.x-d.x+b.left,b=c.y-d.y+b.top,i=e>=0&&b>=0&&e<=d.w&&b<=d.h;e*=this.zoom;b*=this.zoom;d.startx=e;d.starty=b;this._lastx=e;this._lasty=b;this.drawingType=this.util.attr(a,
"drawingType")||"";d=this._getId(a);if(!this.rightClickMenu||!(a.button==dojo.mouseButtons.RIGHT&&this.id=="mse"))a.preventDefault(),dojo.stopEvent(a);this.onDown({mid:this.id,x:e,y:b,pageX:c.x,pageY:c.y,withinCanvas:i,id:d})},over:function(a){this.onOver(a)},out:function(a){this.onOut(a)},move:function(a){a=this.create(a);if(a.id!=this.currentNodeId){var b={},c;for(c in a)b[c]=a[c];(b.id=this.currentNodeId)&&this.out(b);a.id&&this.over(a);this.currentNodeId=a.id}this.onMove(a)},drag:function(a){this.onDrag(this.create(a,
!0))},create:function(a,b){var c=this.scrollOffset(),d=this._getXY(a),e=d.x,i=d.y,f=this.origin,g=d.x-f.x+c.left,h=d.y-f.y+c.top,j=g>=0&&h>=0&&g<=f.w&&h<=f.h;g*=this.zoom;h*=this.zoom;var k=j?this._getId(a,b):"",c={mid:this.id,x:g,y:h,pageX:d.x,pageY:d.y,page:{x:d.x,y:d.y},orgX:f.x,orgY:f.y,last:{x:this._lastx,y:this._lasty},start:{x:this.origin.startx,y:this.origin.starty},move:{x:e-this._lastpagex,y:i-this._lastpagey},scroll:c,id:k,withinCanvas:j};this._lastx=g;this._lasty=h;this._lastpagex=e;this._lastpagey=
i;dojo.stopEvent(a);return c},_getId:function(a,b){return this.util.attr(a,"id",null,b)},_getXY:function(a){return{x:a.pageX,y:a.pageY}},setCursor:function(a,b){b?dojo.style(b,"cursor",a):dojo.style(this.container,"cursor",a)}});