/*
	Copyright (c) 2004-2011, The Dojo Foundation All Rights Reserved.
	Available via Academic Free License >= 2.1 OR the modified BSD license.
	see: http://dojotoolkit.org/license for details
*/


if(!dojo._hasResource["dojox.mdnd.AreaManager"])dojo._hasResource["dojox.mdnd.AreaManager"]=!0,dojo.provide("dojox.mdnd.AreaManager"),dojo.require("dojox.mdnd.Moveable"),dojo.declare("dojox.mdnd.AreaManager",null,{autoRefresh:!0,areaClass:"dojoxDndArea",dragHandleClass:"dojoxDragHandle",constructor:function(){this._areaList=[];this.resizeHandler=dojo.connect(dojo.global,"onresize",this,function(){this._dropMode.updateAreas(this._areaList)});this._oldIndexArea=this._currentIndexArea=this._oldDropIndex=
this._currentDropIndex=this._sourceIndexArea=this._sourceDropIndex=-1},init:function(){this.registerByClass()},registerByNode:function(a,b){var c=this._getIndexArea(a);if(a&&c==-1){var c=(c=a.getAttribute("accept"))?c.split(/\s*,\s*/):["text"],d={node:a,items:[],coords:{},margin:null,accept:c,initItems:!1};dojo.forEach(this._getChildren(a),function(a){this._setMarginArea(d,a);d.items.push(this._addMoveableItem(a))},this);this._areaList=this._dropMode.addArea(this._areaList,d);b||this._dropMode.updateAreas(this._areaList);
dojo.publish("/dojox/mdnd/manager/register",[a])}},registerByClass:function(){dojo.query("."+this.areaClass).forEach(function(a){this.registerByNode(a,!0)},this);this._dropMode.updateAreas(this._areaList)},unregister:function(a){a=this._getIndexArea(a);return a!=-1?(dojo.forEach(this._areaList[a].items,function(a){this._deleteMoveableItem(a)},this),this._areaList.splice(a,1),this._dropMode.updateAreas(this._areaList),!0):!1},_addMoveableItem:function(a){a.setAttribute("tabIndex","0");var b=this._searchDragHandle(a),
c=new dojox.mdnd.Moveable({handle:b,skip:!0},a);dojo.addClass(b||a,"dragHandle");b=a.getAttribute("dndType");b={item:c,type:b?b.split(/\s*,\s*/):["text"],handlers:[dojo.connect(c,"onDragStart",this,"onDragStart")]};if(dijit&&dijit.byNode){var d=dijit.byNode(a);if(d)b.type=d.dndType?d.dndType.split(/\s*,\s*/):["text"],b.handlers.push(dojo.connect(d,"uninitialize",this,function(){this.removeDragItem(a.parentNode,c.node)}))}return b},_deleteMoveableItem:function(a){dojo.forEach(a.handlers,function(a){dojo.disconnect(a)});
var b=a.item.node,c=this._searchDragHandle(b);dojo.removeClass(c||b,"dragHandle");a.item.destroy()},_getIndexArea:function(a){if(a)for(var b=0;b<this._areaList.length;b++)if(this._areaList[b].node===a)return b;return-1},_searchDragHandle:function(a){if(a){var b=this.dragHandleClass.split(" "),c=b.length,d="";dojo.forEach(b,function(a,b){d+="."+a;b!=c-1&&(d+=", ")});return dojo.query(d,a)[0]}},addDragItem:function(a,b,c,d){var f=!0;d||(f=a&&b&&(b.parentNode===null||b.parentNode&&b.parentNode.nodeType!==
1));if(f&&(d=this._getIndexArea(a),d!==-1)){var f=this._addMoveableItem(b),e=this._areaList[d].items;if(0<=c&&c<e.length){var g=e.slice(0,c),h=e.slice(c,e.length);g[g.length]=f;this._areaList[d].items=g.concat(h);a.insertBefore(b,e[c].item.node)}else this._areaList[d].items.push(f),a.appendChild(b);this._setMarginArea(this._areaList[d],b);this._areaList[d].initItems=!1;return!0}return!1},removeDragItem:function(a,b){var c=this._getIndexArea(a);if(a&&c!==-1)for(var c=this._areaList[c].items,d=0;d<
c.length;d++)if(c[d].item.node===b)return this._deleteMoveableItem(c[d]),c.splice(d,1),a.removeChild(b);return null},_getChildren:function(a){var b=[];dojo.forEach(a.childNodes,function(a){if(a.nodeType==1)if(dijit&&dijit.byNode){var d=dijit.byNode(a);d?d.dragRestriction||b.push(a):b.push(a)}else b.push(a)});return b},_setMarginArea:function(a,b){if(a&&a.margin===null&&b)a.margin=dojo._getMarginExtents(b)},findCurrentIndexArea:function(a,b){this._oldIndexArea=this._currentIndexArea;this._currentIndexArea=
this._dropMode.getTargetArea(this._areaList,a,this._currentIndexArea);if(this._currentIndexArea!=this._oldIndexArea){if(this._oldIndexArea!=-1)this.onDragExit(a,b);if(this._currentIndexArea!=-1)this.onDragEnter(a,b)}return this._currentIndexArea},_isAccepted:function(a,b){this._accept=!1;for(var c=0;c<b.length;++c)for(var d=0;d<a.length;++d)if(a[d]==b[c]){this._accept=!0;break}},onDragStart:function(a,b,c){this.autoRefresh&&this._dropMode.updateAreas(this._areaList);var d=dojo.isWebKit?dojo.body():
dojo.body().parentNode;if(!this._cover)this._cover=dojo.create("div",{"class":"dndCover"}),this._cover2=dojo.clone(this._cover),dojo.addClass(this._cover2,"dndCover2");this._cover.style.height=this._cover2.style.height=d.scrollHeight+"px";dojo.body().appendChild(this._cover);dojo.body().appendChild(this._cover2);this._dragStartHandler=dojo.connect(a.ownerDocument,"ondragstart",dojo,"stopEvent");this._sourceIndexArea=this._lastValidIndexArea=this._currentIndexArea=this._getIndexArea(a.parentNode);
for(var d=this._areaList[this._sourceIndexArea],f=d.items,e=0;e<f.length;e++)if(f[e].item.node==a){this._dragItem=f[e];this._dragItem.handlers.push(dojo.connect(this._dragItem.item,"onDrag",this,"onDrag"));this._dragItem.handlers.push(dojo.connect(this._dragItem.item,"onDragEnd",this,"onDrop"));f.splice(e,1);this._currentDropIndex=this._sourceDropIndex=e;break}f=null;if(this._sourceDropIndex!==d.items.length)f=d.items[this._sourceDropIndex].item.node;if(dojo.isIE>7)this._eventsIE7=[dojo.connect(this._cover,
"onmouseover",dojo,"stopEvent"),dojo.connect(this._cover,"onmouseout",dojo,"stopEvent"),dojo.connect(this._cover,"onmouseenter",dojo,"stopEvent"),dojo.connect(this._cover,"onmouseleave",dojo,"stopEvent")];e=a.style;e.left=b.x+"px";e.top=b.y+"px";if(e.position=="relative"||e.position=="")e.position="absolute";this._cover.appendChild(a);this._dropIndicator.place(d.node,f,c);dojo.addClass(a,"dragNode");this._accept=!0;dojo.publish("/dojox/mdnd/drag/start",[a,d,this._sourceDropIndex])},onDragEnter:function(){this._currentIndexArea===
this._sourceIndexArea?this._accept=!0:this._isAccepted(this._dragItem.type,this._areaList[this._currentIndexArea].accept)},onDragExit:function(){this._accept=!1},onDrag:function(a,b,c,d){a=this._dropMode.getDragPoint(b,c,d);this.findCurrentIndexArea(a,c);this._currentIndexArea!==-1&&this._accept&&this.placeDropIndicator(a,c)},placeDropIndicator:function(a,b){this._oldDropIndex=this._currentDropIndex;var c=this._areaList[this._currentIndexArea];c.initItems||this._dropMode.initItems(c);this._currentDropIndex=
this._dropMode.getDropIndex(c,a);this._currentIndexArea===this._oldIndexArea&&this._oldDropIndex===this._currentDropIndex||this._placeDropIndicator(b);return this._currentDropIndex},_placeDropIndicator:function(a){var b=this._areaList[this._currentIndexArea];this._dropMode.refreshItems(this._areaList[this._lastValidIndexArea],this._oldDropIndex,a,!1);var c=null;if(this._currentDropIndex!=-1)c=b.items[this._currentDropIndex].item.node;this._dropIndicator.place(b.node,c);this._lastValidIndexArea=this._currentIndexArea;
this._dropMode.refreshItems(b,this._currentDropIndex,a,!0)},onDropCancel:function(){if(!this._accept){var a=this._getIndexArea(this._dropIndicator.node.parentNode);this._currentIndexArea=a!=-1?a:0}},onDrop:function(a){this.onDropCancel();var b=this._areaList[this._currentIndexArea];dojo.removeClass(a,"dragNode");var c=a.style;c.position="relative";c.left="0";c.top="0";c.width="auto";b.node==this._dropIndicator.node.parentNode?b.node.insertBefore(a,this._dropIndicator.node):(b.node.appendChild(a),
this._currentDropIndex=b.items.length);c=this._currentDropIndex;if(c==-1)c=b.items.length;var d=b.items,f=d.slice(0,c),d=d.slice(c,d.length);f[f.length]=this._dragItem;b.items=f.concat(d);this._setMarginArea(b,a);dojo.forEach(this._areaList,function(a){a.initItems=!1});dojo.disconnect(this._dragItem.handlers.pop());dojo.disconnect(this._dragItem.handlers.pop());this._resetAfterDrop();this._cover&&(dojo.body().removeChild(this._cover),dojo.body().removeChild(this._cover2));dojo.publish("/dojox/mdnd/drop",
[a,b,c])},_resetAfterDrop:function(){this._accept=!1;this._dragItem=null;this._sourceDropIndex=this._sourceIndexArea=this._oldDropIndex=this._currentIndexArea=this._currentDropIndex=-1;this._dropIndicator.remove();this._dragStartHandler&&dojo.disconnect(this._dragStartHandler);dojo.isIE>7&&dojo.forEach(this._eventsIE7,dojo.disconnect)},destroy:function(){for(;this._areaList.length>0;)if(!this.unregister(this._areaList[0].node))throw Error("Error while destroying AreaManager");dojo.disconnect(this.resizeHandler);
this._dropIndicator.destroy();this._dropMode.destroy();dojox.mdnd.autoScroll&&dojox.mdnd.autoScroll.destroy();this.refreshListener&&dojo.unsubscribe(this.refreshListener);this._cover&&(dojo._destroyElement(this._cover),dojo._destroyElement(this._cover2),delete this._cover,delete this._cover2)}}),dijit&&dijit._Widget&&dojo.extend(dijit._Widget,{dndType:"text"}),dojox.mdnd._areaManager=null,dojox.mdnd.areaManager=function(){if(!dojox.mdnd._areaManager)dojox.mdnd._areaManager=new dojox.mdnd.AreaManager;
return dojox.mdnd._areaManager};