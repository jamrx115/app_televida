/*
	Copyright (c) 2004-2011, The Dojo Foundation All Rights Reserved.
	Available via Academic Free License >= 2.1 OR the modified BSD license.
	see: http://dojotoolkit.org/license for details
*/


dojo._hasResource["dojo.html"]||(dojo._hasResource["dojo.html"]=!0,dojo.provide("dojo.html"),dojo.require("dojo.parser"),dojo.getObject("html",!0,dojo),function(){var f=0,e=dojo;dojo.html._secureForInnerHtml=function(a){return a.replace(/(?:\s*<!DOCTYPE\s[^>]+>|<title[^>]*>[\s\S]*?<\/title>)/ig,"")};dojo.html._emptyNode=dojo.empty;dojo.html._setNodeContent=function(a,b){e.empty(a);if(b)if(typeof b=="string"&&(b=e._toDom(b,a.ownerDocument)),!b.nodeType&&e.isArrayLike(b))for(var c=b.length,d=0;d<b.length;d=
c==b.length?d+1:0)e.place(b[d],a,"last");else e.place(b,a,"last");return a};dojo.declare("dojo.html._ContentSetter",null,{node:"",content:"",id:"",cleanContent:!1,extractContent:!1,parseContent:!1,parserScope:dojo._scopeName,startup:!0,constructor:function(a,b){dojo.mixin(this,a||{});b=this.node=dojo.byId(this.node||b);if(!this.id)this.id=["Setter",b?b.id||b.tagName:"",f++].join("_")},set:function(a,b){if(void 0!==a)this.content=a;b&&this._mixin(b);this.onBegin();this.setContent();this.onEnd();return this.node},
setContent:function(){var a=this.node;if(!a)throw Error(this.declaredClass+": setContent given no node");try{a=dojo.html._setNodeContent(a,this.content)}catch(b){var c=this.onContentError(b);try{a.innerHTML=c}catch(d){console.error("Fatal "+this.declaredClass+".setContent could not change content due to "+d.message,d)}}this.node=a},empty:function(){this.parseResults&&this.parseResults.length&&(dojo.forEach(this.parseResults,function(a){a.destroy&&a.destroy()}),delete this.parseResults);dojo.html._emptyNode(this.node)},
onBegin:function(){var a=this.content;if(dojo.isString(a)&&(this.cleanContent&&(a=dojo.html._secureForInnerHtml(a)),this.extractContent)){var b=a.match(/<body[^>]*>\s*([\s\S]+)\s*<\/body>/im);b&&(a=b[1])}this.empty();this.content=a;return this.node},onEnd:function(){this.parseContent&&this._parse();return this.node},tearDown:function(){delete this.parseResults;delete this.node;delete this.content},onContentError:function(a){return"Error occured setting content: "+a},_mixin:function(a){var b={},c;
for(c in a)c in b||(this[c]=a[c])},_parse:function(){var a=this.node;try{var b={};dojo.forEach(["dir","lang","textDir"],function(a){this[a]&&(b[a]=this[a])},this);this.parseResults=dojo.parser.parse({rootNode:a,noStart:!this.startup,inherited:b,scope:this.parserScope})}catch(c){this._onError("Content",c,"Error parsing in _ContentSetter#"+this.id)}},_onError:function(a,b,c){a=this["on"+a+"Error"].call(this,b);c?console.error(c,b):a&&dojo.html._setNodeContent(this.node,a,!0)}});dojo.html.set=function(a,
b,c){void 0==b&&(console.warn("dojo.html.set: no cont argument provided, using empty string"),b="");return c?(new dojo.html._ContentSetter(dojo.mixin(c,{content:b,node:a}))).set():dojo.html._setNodeContent(a,b,!0)}}());