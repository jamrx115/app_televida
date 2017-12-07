/*
	Copyright (c) 2004-2011, The Dojo Foundation All Rights Reserved.
	Available via Academic Free License >= 2.1 OR the modified BSD license.
	see: http://dojotoolkit.org/license for details
*/


dojo._hasResource["dijit.layout.BorderContainer"]||(dojo._hasResource["dijit.layout.BorderContainer"]=!0,dojo.provide("dijit.layout.BorderContainer"),dojo.require("dijit.layout._LayoutWidget"),dojo.require("dojo.cookie"),dojo.require("dijit._Templated"),dojo.declare("dijit.layout.BorderContainer",dijit.layout._LayoutWidget,{design:"headline",gutters:!0,liveSplitters:!0,persist:!1,baseClass:"dijitBorderContainer",_splitterClass:"dijit.layout._Splitter",postMixInProperties:function(){this.gutters||
(this.baseClass+="NoGutter");this.inherited(arguments)},startup:function(){this._started||(dojo.forEach(this.getChildren(),this._setupChild,this),this.inherited(arguments))},_setupChild:function(a){var c=a.region;if(c){this.inherited(arguments);dojo.addClass(a.domNode,this.baseClass+"Pane");var b=this.isLeftToRight();c=="leading"&&(c=b?"left":"right");c=="trailing"&&(c=b?"right":"left");if(c!="center"&&(a.splitter||this.gutters)&&!a._splitterWidget)b=new (dojo.getObject(a.splitter?this._splitterClass:
"dijit.layout._Gutter"))({id:a.id+"_splitter",container:this,child:a,region:c,live:this.liveSplitters}),b.isSplitter=!0,a._splitterWidget=b,dojo.place(b.domNode,a.domNode,"after"),b.startup();a.region=c}},layout:function(){this._layoutChildren()},addChild:function(a,c){this.inherited(arguments);this._started&&this.layout()},removeChild:function(a){var c=a.region,b=a._splitterWidget;b&&(b.destroy(),delete a._splitterWidget);this.inherited(arguments);this._started&&this._layoutChildren();dojo.removeClass(a.domNode,
this.baseClass+"Pane");dojo.style(a.domNode,{top:"auto",bottom:"auto",left:"auto",right:"auto",position:"static"});dojo.style(a.domNode,c=="top"||c=="bottom"?"width":"height","auto")},getChildren:function(){return dojo.filter(this.inherited(arguments),function(a){return!a.isSplitter})},getSplitter:function(a){return dojo.filter(this.getChildren(),function(c){return c.region==a})[0]._splitterWidget},resize:function(a,c){if(!this.cs||!this.pe){var b=this.domNode;this.cs=dojo.getComputedStyle(b);this.pe=
dojo._getPadExtents(b,this.cs);this.pe.r=dojo._toPixelValue(b,this.cs.paddingRight);this.pe.b=dojo._toPixelValue(b,this.cs.paddingBottom);dojo.style(b,"padding","0px")}this.inherited(arguments)},_layoutChildren:function(a,c){if(this._borderBox&&this._borderBox.h){var b=dojo.map(this.getChildren(),function(a,b){return{pane:a,weight:[a.region=="center"?Infinity:0,a.layoutPriority,(this.design=="sidebar"?1:-1)*(/top|bottom/.test(a.region)?1:-1),b]}},this);b.sort(function(a,b){for(var c=a.weight,d=b.weight,
e=0;e<c.length;e++)if(c[e]!=d[e])return c[e]-d[e];return 0});var d=[];dojo.forEach(b,function(a){a=a.pane;d.push(a);a._splitterWidget&&d.push(a._splitterWidget)});dijit.layout.layoutChildren(this.domNode,{l:this.pe.l,t:this.pe.t,w:this._borderBox.w-this.pe.w,h:this._borderBox.h-this.pe.h},d,a,c)}},destroyRecursive:function(){dojo.forEach(this.getChildren(),function(a){var c=a._splitterWidget;c&&c.destroy();delete a._splitterWidget});this.inherited(arguments)}}),dojo.extend(dijit._Widget,{region:"",
layoutPriority:0,splitter:!1,minSize:0,maxSize:Infinity}),dojo.declare("dijit.layout._Splitter",[dijit._Widget,dijit._Templated],{live:!0,templateString:'<div class="dijitSplitter" dojoAttachEvent="onkeypress:_onKeyPress,onmousedown:_startDrag,onmouseenter:_onMouse,onmouseleave:_onMouse" tabIndex="0" role="separator"><div class="dijitSplitterThumb"></div></div>',postMixInProperties:function(){this.inherited(arguments);this.horizontal=/top|bottom/.test(this.region);this._factor=/top|left/.test(this.region)?
1:-1;this._cookieName=this.container.id+"_"+this.region},buildRendering:function(){this.inherited(arguments);dojo.addClass(this.domNode,"dijitSplitter"+(this.horizontal?"H":"V"));if(this.container.persist){var a=dojo.cookie(this._cookieName);a&&(this.child.domNode.style[this.horizontal?"height":"width"]=a)}},_computeMaxSize:function(){var a=this.horizontal?"h":"w",c=dojo.marginBox(this.child.domNode)[a],b=dojo.filter(this.container.getChildren(),function(a){return a.region=="center"})[0],a=dojo.marginBox(b.domNode)[a];
return Math.min(this.child.maxSize,c+a)},_startDrag:function(a){if(!this.cover)this.cover=dojo.doc.createElement("div"),dojo.addClass(this.cover,"dijitSplitterCover"),dojo.place(this.cover,this.child.domNode,"after");dojo.addClass(this.cover,"dijitSplitterCoverActive");this.fake&&dojo.destroy(this.fake);if(!(this._resize=this.live))(this.fake=this.domNode.cloneNode(!0)).removeAttribute("id"),dojo.addClass(this.domNode,"dijitSplitterShadow"),dojo.place(this.fake,this.domNode,"after");dojo.addClass(this.domNode,
"dijitSplitterActive dijitSplitter"+(this.horizontal?"H":"V")+"Active");this.fake&&dojo.removeClass(this.fake,"dijitSplitterHover dijitSplitter"+(this.horizontal?"H":"V")+"Hover");var c=this._factor,b=this.horizontal,d=b?"pageY":"pageX",k=a[d],f=this.domNode.style,l=dojo.marginBox(this.child.domNode)[b?"h":"w"],m=this._computeMaxSize(),e=this.child.minSize||20,b=this.region,g=b=="top"||b=="bottom"?"top":"left",n=parseInt(f[g],10),o=this._resize,p=dojo.hitch(this.container,"_layoutChildren",this.child.id),
b=dojo.doc;this._handlers=(this._handlers||[]).concat([dojo.connect(b,"onmousemove",this._drag=function(a,b){var h=a[d]-k,i=c*h+l,j=Math.max(Math.min(i,m),e);(o||b)&&p(j);f[g]=h+n+c*(j-i)+"px"}),dojo.connect(b,"ondragstart",dojo.stopEvent),dojo.connect(dojo.body(),"onselectstart",dojo.stopEvent),dojo.connect(b,"onmouseup",this,"_stopDrag")]);dojo.stopEvent(a)},_onMouse:function(a){a=a.type=="mouseover"||a.type=="mouseenter";dojo.toggleClass(this.domNode,"dijitSplitterHover",a);dojo.toggleClass(this.domNode,
"dijitSplitter"+(this.horizontal?"H":"V")+"Hover",a)},_stopDrag:function(a){try{this.cover&&dojo.removeClass(this.cover,"dijitSplitterCoverActive"),this.fake&&dojo.destroy(this.fake),dojo.removeClass(this.domNode,"dijitSplitterActive dijitSplitter"+(this.horizontal?"H":"V")+"Active dijitSplitterShadow"),this._drag(a),this._drag(a,!0)}finally{this._cleanupHandlers(),delete this._drag}this.container.persist&&dojo.cookie(this._cookieName,this.child.domNode.style[this.horizontal?"height":"width"],{expires:365})},
_cleanupHandlers:function(){dojo.forEach(this._handlers,dojo.disconnect);delete this._handlers},_onKeyPress:function(a){this._resize=!0;var c=this.horizontal,b=1,d=dojo.keys;switch(a.charOrCode){case c?d.UP_ARROW:d.LEFT_ARROW:b*=-1;case c?d.DOWN_ARROW:d.RIGHT_ARROW:break;default:return}c=dojo._getMarginSize(this.child.domNode)[c?"h":"w"]+this._factor*b;this.container._layoutChildren(this.child.id,Math.max(Math.min(c,this._computeMaxSize()),this.child.minSize));dojo.stopEvent(a)},destroy:function(){this._cleanupHandlers();
delete this.child;delete this.container;delete this.cover;delete this.fake;this.inherited(arguments)}}),dojo.declare("dijit.layout._Gutter",[dijit._Widget,dijit._Templated],{templateString:'<div class="dijitGutter" role="presentation"></div>',postMixInProperties:function(){this.inherited(arguments);this.horizontal=/top|bottom/.test(this.region)},buildRendering:function(){this.inherited(arguments);dojo.addClass(this.domNode,"dijitGutter"+(this.horizontal?"H":"V"))}}));