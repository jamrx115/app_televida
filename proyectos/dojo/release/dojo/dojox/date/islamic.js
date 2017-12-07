/*
	Copyright (c) 2004-2011, The Dojo Foundation All Rights Reserved.
	Available via Academic Free License >= 2.1 OR the modified BSD license.
	see: http://dojotoolkit.org/license for details
*/


if(!dojo._hasResource["dojox.date.islamic"])dojo._hasResource["dojox.date.islamic"]=!0,dojo.provide("dojox.date.islamic"),dojo.require("dojox.date.islamic.Date"),dojo.require("dojo.date"),dojox.date.islamic.getDaysInMonth=function(b){return b.getDaysInIslamicMonth(b.getMonth(),b.getFullYear())},dojox.date.islamic.compare=function(b,d,a){b instanceof dojox.date.islamic.Date&&(b=b.toGregorian());d instanceof dojox.date.islamic.Date&&(d=d.toGregorian());return dojo.date.compare.apply(null,arguments)},
dojox.date.islamic.add=function(b,d,a){var e=new dojox.date.islamic.Date(b);switch(d){case "day":e.setDate(b.getDate()+a);break;case "weekday":var c=b.getDay();if(c+a<5&&c+a>0)e.setDate(b.getDate()+a);else{var f=d=0;c==5?(c=4,f=a>0?-1:1):c==6&&(c=4,f=a>0?-2:2);var c=a>0?5-c-1:-c,g=a-c,h=parseInt(g/5);g%5!=0&&(d=a>0?2:-2);e.setDate(b.getDate()+(d+h*7+g%5+c)+f)}break;case "year":e.setFullYear(b.getFullYear()+a);break;case "week":a*=7;e.setDate(b.getDate()+a);break;case "month":b=b.getMonth();e.setMonth(b+
a);break;case "hour":e.setHours(b.getHours()+a);break;case "minute":e.setMinutes(b.getMinutes()+a);break;case "second":e.setSeconds(b.getSeconds()+a);break;case "millisecond":e.setMilliseconds(b.getMilliseconds()+a)}return e},dojox.date.islamic.difference=function(b,d,a){var d=d||new dojox.date.islamic.Date,a=a||"day",e=b.getFullYear()-d.getFullYear(),c=1;switch(a){case "weekday":c=Math.round(dojox.date.islamic.difference(b,d,"day"));e=parseInt(dojox.date.islamic.difference(b,d,"week"));if(c%7==0)c=
e*5;else{var a=0,f=d.getDay(),g=b.getDay(),e=parseInt(c/7),b=c%7,d=new dojox.date.islamic.Date(d);d.setDate(d.getDate()+e*7);d=d.getDay();if(c>0)switch(!0){case f==5:a=-1;break;case f==6:a=0;break;case g==5:a=-1;break;case g==6:a=-2;break;case d+b>5:a=-2}else if(c<0)switch(!0){case f==5:a=0;break;case f==6:a=1;break;case g==5:a=2;break;case g==6:a=1;break;case d+b<0:a=2}c+=a;c-=e*2}break;case "year":c=e;break;case "month":a=b.toGregorian()>d.toGregorian()?b:d;f=b.toGregorian()>d.toGregorian()?d:b;
g=a.getMonth();c=f.getMonth();if(e==0)c=a.getMonth()-f.getMonth();else{c=12-c;c+=g;e=f.getFullYear()+1;for(a=a.getFullYear();e<a;e++)c+=12}b.toGregorian()<d.toGregorian()&&(c=-c);break;case "week":c=parseInt(dojox.date.islamic.difference(b,d,"day")/7);break;case "day":c/=24;case "hour":c/=60;case "minute":c/=60;case "second":c/=1E3;case "millisecond":c*=b.toGregorian().getTime()-d.toGregorian().getTime()}return Math.round(c)};