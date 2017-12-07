/*
	Copyright (c) 2004-2011, The Dojo Foundation All Rights Reserved.
	Available via Academic Free License >= 2.1 OR the modified BSD license.
	see: http://dojotoolkit.org/license for details
*/


dojo._hasResource["dojox.data.PicasaStore"]||(dojo._hasResource["dojox.data.PicasaStore"]=!0,dojo.provide("dojox.data.PicasaStore"),dojo.require("dojo.io.script"),dojo.require("dojo.data.util.simpleFetch"),dojo.require("dojo.date.stamp"),dojo.declare("dojox.data.PicasaStore",null,{constructor:function(a){if(a&&a.label)this.label=a.label;if(a&&"urlPreventCache"in a)this.urlPreventCache=a.urlPreventCache?!0:!1;if(a&&"maxResults"in a&&(this.maxResults=parseInt(a.maxResults),!this.maxResults))this.maxResults=
20},_picasaUrl:"http://picasaweb.google.com/data/feed/api/all",_storeRef:"_S",label:"title",urlPreventCache:!1,maxResults:20,_assertIsItem:function(a){if(!this.isItem(a))throw Error("dojox.data.PicasaStore: a function was passed an item argument that was not an item");},_assertIsAttribute:function(a){if(typeof a!=="string")throw Error("dojox.data.PicasaStore: a function was passed an attribute argument that was not an attribute name string");},getFeatures:function(){return{"dojo.data.api.Read":!0}},
getValue:function(a,b,d){return(a=this.getValues(a,b))&&a.length>0?a[0]:d},getAttributes:function(){return["id","published","updated","category","title$type","title","summary$type","summary","rights$type","rights","link","author","gphoto$id","gphoto$name","location","imageUrlSmall","imageUrlMedium","imageUrl","datePublished","dateTaken","description"]},hasAttribute:function(a,b){return this.getValue(a,b)?!0:!1},isItemLoaded:function(a){return this.isItem(a)},loadItem:function(){},getLabel:function(a){return this.getValue(a,
this.label)},getLabelAttributes:function(){return[this.label]},containsValue:function(a,b,d){a=this.getValues(a,b);for(b=0;b<a.length;b++)if(a[b]===d)return!0;return!1},getValues:function(a,b){this._assertIsItem(a);this._assertIsAttribute(b);if(b==="title")return[this._unescapeHtml(a.title)];else if(b==="author")return[this._unescapeHtml(a.author[0].name)];else if(b==="datePublished")return[dojo.date.stamp.fromISOString(a.published)];else if(b==="dateTaken")return[dojo.date.stamp.fromISOString(a.published)];
else if(b==="updated")return[dojo.date.stamp.fromISOString(a.updated)];else if(b==="imageUrlSmall")return[a.media.thumbnail[1].url];else if(b==="imageUrl")return[a.content$src];else if(b==="imageUrlMedium")return[a.media.thumbnail[2].url];else if(b==="link")return[a.link[1]];else if(b==="tags")return a.tags.split(" ");else if(b==="description")return[this._unescapeHtml(a.summary)];return[]},isItem:function(a){return a&&a[this._storeRef]===this?!0:!1},close:function(){},_fetchItems:function(a,b,d){if(!a.query)a.query=
{};var c={alt:"jsonm",pp:"1",psc:"G","start-index":"1"};if(a.query.start)c["start-index"]=a.query.start;if(a.query.tags)c.q=a.query.tags;if(a.query.userid)c.uname=a.query.userid;if(a.query.userids)c.ids=a.query.userids;if(a.query.lang)c.hl=a.query.lang;c["max-results"]=this.maxResults;var e=this;dojo.io.script.get({url:this._picasaUrl,preventCache:this.urlPreventCache,content:c,callbackParamName:"callback",handle:function(c){b(e._processPicasaData(c),a)}}).addErrback(function(b){dojo.disconnect(null);
d(b,a)})},_processPicasaData:function(a){var b=[];if(a.feed){b=a.feed.entry;for(a=0;a<b.length;a++)b[a][this._storeRef]=this}return b},_unescapeHtml:function(a){a&&(a=a.replace(/&amp;/gm,"&").replace(/&lt;/gm,"<").replace(/&gt;/gm,">").replace(/&quot;/gm,'"'),a=a.replace(/&#39;/gm,"'"));return a}}),dojo.extend(dojox.data.PicasaStore,dojo.data.util.simpleFetch));