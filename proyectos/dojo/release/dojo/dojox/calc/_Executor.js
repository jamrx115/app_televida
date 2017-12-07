/*
	Copyright (c) 2004-2011, The Dojo Foundation All Rights Reserved.
	Available via Academic Free License >= 2.1 OR the modified BSD license.
	see: http://dojotoolkit.org/license for details
*/


dojo._hasResource["dojox.calc._Executor"]||(dojo._hasResource["dojox.calc._Executor"]=!0,dojo.provide("dojox.calc._Executor"),dojo.require("dijit._Templated"),dojo.require("dojox.math._base"),dojo.experimental("dojox.calc._Executor"),function(){var a;if(!("pow"in dojox.calc))dojox.calc.pow=function(b,a){if(b>=0||Math.floor(a)==a)return Math.pow(b,a);else{var c=1/a;return Math.floor(c)==c&&c&1?-Math.pow(-b,a):NaN}};dojo.declare("dojox.calc._Executor",[dijit._Widget,dijit._Templated],{templateString:'<iframe src="'+
dojo.moduleUrl("dojox.calc","_ExecutorIframe.html")+'" style="display:none;" onload="if(arguments[0] && arguments[0].Function)'+dijit._scopeName+'.byNode(this)._onLoad(arguments[0])"></iframe>',_onLoad:function(b){a=b;b.outerPrompt=window.prompt;b.dojox={math:{}};for(var d in dojox.math)b.dojox.math[d]=dojo.hitch(dojox.math,d);if("toFrac"in dojox.calc)b.toFracCall=dojo.hitch(dojox.calc,"toFrac"),this.Function("toFrac","x","return toFracCall(x)");b.isJavaScriptLanguage=dojo.number.format(1.5,{pattern:"#.#"})==
"1.5";b.Ans=0;b.pi=Math.PI;b.eps=Math.E;b.powCall=dojo.hitch(dojox.calc,"pow");this.normalizedFunction("sqrt","x","return Math.sqrt(x)");this.normalizedFunction("sin","x","return Math.sin(x)");this.normalizedFunction("cos","x","return Math.cos(x)");this.normalizedFunction("tan","x","return Math.tan(x)");this.normalizedFunction("asin","x","return Math.asin(x)");this.normalizedFunction("acos","x","return Math.acos(x)");this.normalizedFunction("atan","x","return Math.atan(x)");this.normalizedFunction("atan2",
"y, x","return Math.atan2(y, x)");this.normalizedFunction("Round","x","return Math.round(x)");this.normalizedFunction("Int","x","return Math.floor(x)");this.normalizedFunction("Ceil","x","return Math.ceil(x)");this.normalizedFunction("ln","x","return Math.log(x)");this.normalizedFunction("log","x","return Math.log(x)/Math.log(10)");this.normalizedFunction("pow","x, y","return powCall(x,y)");this.normalizedFunction("permutations","n, r","return dojox.math.permutations(n, r);");this.normalizedFunction("P",
"n, r","return dojox.math.permutations(n, r);");this.normalizedFunction("combinations","n, r","return dojox.math.combinations(n, r);");this.normalizedFunction("C","n, r","return dojox.math.combinations(n, r)");this.normalizedFunction("toRadix","number, baseOut","if(!baseOut){ baseOut = 10; } if(typeof number == 'string'){ number = parseFloat(number); }return number.toString(baseOut);");this.normalizedFunction("toBin","number","return toRadix(number, 2)");this.normalizedFunction("toOct","number","return toRadix(number, 8)");
this.normalizedFunction("toHex","number","return toRadix(number, 16)");this.onLoad()},onLoad:function(){},Function:function(b,d,c){return dojo.hitch(a,a.Function.apply(a,arguments))},normalizedFunction:function(b,d,c){return dojo.hitch(a,a.normalizedFunction.apply(a,arguments))},deleteFunction:function(b){a[b]=void 0;delete a[b]},eval:function(b){return a.eval.apply(a,arguments)},destroy:function(){this.inherited(arguments);a=null}})}(),function(){dojo.mixin(dojox.calc,{approx:function(a){return typeof a==
"number"?Math.round(a*1073741789)/1073741789:a}})}());