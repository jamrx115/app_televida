/*
	Copyright (c) 2004-2011, The Dojo Foundation All Rights Reserved.
	Available via Academic Free License >= 2.1 OR the modified BSD license.
	see: http://dojotoolkit.org/license for details
*/


dojo._hasResource["dojo._base.fx"]||(dojo._hasResource["dojo._base.fx"]=!0,dojo.provide("dojo._base.fx"),dojo.require("dojo._base.Color"),dojo.require("dojo._base.connect"),dojo.require("dojo._base.lang"),dojo.require("dojo._base.html"),function(){var b=dojo,i=b._mixin;dojo._Line=function(a,b){this.start=a;this.end=b};dojo._Line.prototype.getValue=function(a){return(this.end-this.start)*a+this.start};dojo.Animation=function(a){i(this,a);if(b.isArray(this.curve))this.curve=new b._Line(this.curve[0],
this.curve[1])};b._Animation=b.Animation;b.extend(dojo.Animation,{duration:350,repeat:0,rate:20,_percent:0,_startRepeatCount:0,_getStep:function(){var a=this._percent,b=this.easing;return b?b(a):a},_fire:function(a,d){var f=d||[];if(this[a])if(b.config.debugAtAllCosts)this[a].apply(this,f);else try{this[a].apply(this,f)}catch(e){console.error("exception in animation handler for:",a),console.error(e)}return this},play:function(a,b){this._delayTimer&&this._clearTimer();if(b)this._stopTimer(),this._active=
this._paused=!1,this._percent=0;else if(this._active&&!this._paused)return this;this._fire("beforeBegin",[this.node]);var f=a||this.delay,e=dojo.hitch(this,"_play",b);if(f>0)return this._delayTimer=setTimeout(e,f),this;e();return this},_play:function(){this._delayTimer&&this._clearTimer();this._startTime=(new Date).valueOf();this._paused&&(this._startTime-=this.duration*this._percent);this._active=!0;this._paused=!1;var a=this.curve.getValue(this._getStep());if(!this._percent){if(!this._startRepeatCount)this._startRepeatCount=
this.repeat;this._fire("onBegin",[a])}this._fire("onPlay",[a]);this._cycle();return this},pause:function(){this._delayTimer&&this._clearTimer();this._stopTimer();if(!this._active)return this;this._paused=!0;this._fire("onPause",[this.curve.getValue(this._getStep())]);return this},gotoPercent:function(a,b){this._stopTimer();this._active=this._paused=!0;this._percent=a;b&&this.play();return this},stop:function(a){this._delayTimer&&this._clearTimer();if(!this._timer)return this;this._stopTimer();if(a)this._percent=
1;this._fire("onStop",[this.curve.getValue(this._getStep())]);this._active=this._paused=!1;return this},status:function(){return this._active?this._paused?"paused":"playing":"stopped"},_cycle:function(){if(this._active){var a=((new Date).valueOf()-this._startTime)/this.duration;a>=1&&(a=1);this._percent=a;this.easing&&(a=this.easing(a));this._fire("onAnimate",[this.curve.getValue(a)]);if(this._percent<1)this._startTimer();else{this._active=!1;if(this.repeat>0)this.repeat--,this.play(null,!0);else if(this.repeat==
-1)this.play(null,!0);else if(this._startRepeatCount)this.repeat=this._startRepeatCount,this._startRepeatCount=0;this._percent=0;this._fire("onEnd",[this.node]);!this.repeat&&this._stopTimer()}}return this},_clearTimer:function(){clearTimeout(this._delayTimer);delete this._delayTimer}});var g=0,h=null,j={run:function(){}};b.extend(b.Animation,{_startTimer:function(){if(!this._timer)this._timer=b.connect(j,"run",this,"_cycle"),g++;h||(h=setInterval(b.hitch(j,"run"),this.rate))},_stopTimer:function(){if(this._timer)b.disconnect(this._timer),
this._timer=null,g--;g<=0&&(clearInterval(h),h=null,g=0)}});var l=b.isIE?function(a){var d=a.style;if(!d.width.length&&b.style(a,"width")=="auto")d.width="auto"}:function(){};dojo._fade=function(a){a.node=b.byId(a.node);var d=i({properties:{}},a),a=d.properties.opacity={};a.start=!("start"in d)?function(){return+b.style(d.node,"opacity")||0}:d.start;a.end=d.end;a=b.animateProperty(d);b.connect(a,"beforeBegin",b.partial(l,d.node));return a};dojo.fadeIn=function(a){return b._fade(i({end:1},a))};dojo.fadeOut=
function(a){return b._fade(i({end:0},a))};dojo._defaultEasing=function(a){return 0.5+Math.sin((a+1.5)*Math.PI)/2};var k=function(a){this._properties=a;for(var d in a){var f=a[d];if(f.start instanceof b.Color)f.tempColor=new b.Color}};k.prototype.getValue=function(a){var d={},f;for(f in this._properties){var e=this._properties[f],c=e.start;c instanceof b.Color?d[f]=b.blendColors(c,e.end,a,e.tempColor).toCss():b.isArray(c)||(d[f]=(e.end-c)*a+c+(f!="opacity"?e.units||"px":0))}return d};dojo.animateProperty=
function(a){var d=a.node=b.byId(a.node);if(!a.easing)a.easing=b._defaultEasing;a=new b.Animation(a);b.connect(a,"beforeBegin",a,function(){var a={},e;for(e in this.properties){if(e=="width"||e=="height")this.node.display="block";var c=this.properties[e];b.isFunction(c)&&(c=c(d));c=a[e]=i({},b.isObject(c)?c:{end:c});if(b.isFunction(c.start))c.start=c.start(d);if(b.isFunction(c.end))c.end=c.end(d);var g=e.toLowerCase().indexOf("color")>=0,h=function(a,c){var d={height:a.offsetHeight,width:a.offsetWidth}[c];
if(d!==void 0)return d;d=b.style(a,c);return c=="opacity"?+d:g?d:parseFloat(d)};if("end"in c){if(!("start"in c))c.start=h(d,e)}else c.end=h(d,e);g?(c.start=new b.Color(c.start),c.end=new b.Color(c.end)):c.start=e=="opacity"?+c.start:parseFloat(c.start)}this.curve=new k(a)});b.connect(a,"onAnimate",b.hitch(b,"style",a.node));return a};dojo.anim=function(a,d,f,e,c,g){return b.animateProperty({node:a,duration:f||b.Animation.prototype.duration,properties:d,easing:e,onEnd:c}).play(g||0)}}());