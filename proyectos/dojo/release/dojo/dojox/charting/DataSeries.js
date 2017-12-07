/*
	Copyright (c) 2004-2011, The Dojo Foundation All Rights Reserved.
	Available via Academic Free License >= 2.1 OR the modified BSD license.
	see: http://dojotoolkit.org/license for details
*/


dojo._hasResource["dojox.charting.DataSeries"]||(dojo._hasResource["dojox.charting.DataSeries"]=!0,dojo.provide("dojox.charting.DataSeries"),dojo.require("dojox.lang.functional"),dojo.declare("dojox.charting.DataSeries",null,{constructor:function(a,c,b){this.store=a;this.kwArgs=c;this.value=b?dojo.isFunction(b)?b:dojo.isObject(b)?dojo.hitch(this,"_dictValue",dojox.lang.functional.keys(b),b):dojo.hitch(this,"_fieldValue",b):dojo.hitch(this,"_defaultValue");this.data=[];this._events=[];this.store.getFeatures()["dojo.data.api.Notification"]&&
this._events.push(dojo.connect(this.store,"onNew",this,"_onStoreNew"),dojo.connect(this.store,"onDelete",this,"_onStoreDelete"),dojo.connect(this.store,"onSet",this,"_onStoreSet"));this.fetch()},destroy:function(){dojo.forEach(this._events,dojo.disconnect)},setSeriesObject:function(a){this.series=a},_dictValue:function(a,c,b,e){var d={};dojo.forEach(a,function(a){d[a]=b.getValue(e,c[a])});return d},_fieldValue:function(a,c,b){return c.getValue(b,a)},_defaultValue:function(a,c){return a.getValue(c,
"value")},fetch:function(){if(!this._inFlight){this._inFlight=!0;var a=dojo.delegate(this.kwArgs);a.onComplete=dojo.hitch(this,"_onFetchComplete");a.onError=dojo.hitch(this,"onFetchError");this.store.fetch(a)}},_onFetchComplete:function(a){this.items=a;this._buildItemMap();this.data=dojo.map(this.items,function(a){return this.value(this.store,a)},this);this._pushDataChanges();this._inFlight=!1},onFetchError:function(){this._inFlight=!1},_buildItemMap:function(){if(this.store.getFeatures()["dojo.data.api.Identity"]){var a=
{};dojo.forEach(this.items,function(c,b){a[this.store.getIdentity(c)]=b},this);this.itemMap=a}},_pushDataChanges:function(){this.series&&(this.series.chart.updateSeries(this.series.name,this),this.series.chart.delayedRender())},_onStoreNew:function(){this.fetch()},_onStoreDelete:function(a){this.items&&dojo.some(this.items,function(c,b){return c===a?(this.items.splice(b,1),this._buildItemMap(),this.data.splice(b,1),!0):!1},this)&&this._pushDataChanges()},_onStoreSet:function(a){if(this.itemMap){var c=
this.itemMap[this.store.getIdentity(a)];typeof c=="number"&&(this.data[c]=this.value(this.store,this.items[c]),this._pushDataChanges())}else this.items&&dojo.some(this.items,function(b,c){return b===a?(this.data[c]=this.value(this.store,b),!0):!1},this)&&this._pushDataChanges()}}));