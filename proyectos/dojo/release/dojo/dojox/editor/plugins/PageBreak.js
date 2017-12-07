/*
	Copyright (c) 2004-2011, The Dojo Foundation All Rights Reserved.
	Available via Academic Free License >= 2.1 OR the modified BSD license.
	see: http://dojotoolkit.org/license for details
*/


dojo._hasResource["dojox.editor.plugins.PageBreak"]||(dojo._hasResource["dojox.editor.plugins.PageBreak"]=!0,dojo.provide("dojox.editor.plugins.PageBreak"),dojo.require("dijit._editor.html"),dojo.require("dijit._editor._Plugin"),dojo.require("dojo.i18n"),dojo.requireLocalization("dojox.editor.plugins","PageBreak",null,"ROOT,ar,ca,cs,da,de,el,es,fi,fr,he,hu,it,ja,kk,ko,nb,nl,pl,pt,pt-pt,ro,ru,sk,sl,sv,th,tr,zh,zh-tw"),dojo.declare("dojox.editor.plugins.PageBreak",dijit._editor._Plugin,{useDefaultCommand:!1,
iconClassPrefix:"dijitAdditionalEditorIcon",_unbreakableNodes:["li","ul","ol"],_pbContent:"<hr style='page-break-after: always;' class='dijitEditorPageBreak'>",_initButton:function(){var a=this.editor,b=dojo.i18n.getLocalization("dojox.editor.plugins","PageBreak");this.button=new dijit.form.Button({label:b.pageBreak,showLabel:!1,iconClass:this.iconClassPrefix+" "+this.iconClassPrefix+"PageBreak",tabIndex:"-1",onClick:dojo.hitch(this,"_insertPageBreak")});a.onLoadDeferred.addCallback(dojo.hitch(this,
function(){a.addKeyHandler(dojo.keys.ENTER,!0,!0,dojo.hitch(this,this._insertPageBreak));(dojo.isWebKit||dojo.isOpera)&&this.connect(this.editor,"onKeyDown",dojo.hitch(this,function(a){a.keyCode===dojo.keys.ENTER&&a.ctrlKey&&a.shiftKey&&this._insertPageBreak()}))}))},updateState:function(){this.button.set("disabled",this.get("disabled"))},setEditor:function(a){this.editor=a;this._initButton()},_style:function(){if(!this._styled){this._styled=!0;var a=this.editor.document;if(dojo.isIE)a.createStyleSheet("").cssText=
".dijitEditorPageBreak {\n\tborder-top-style: solid;\n\tborder-top-width: 3px;\n\tborder-top-color: #585858;\n\tborder-bottom-style: solid;\n\tborder-bottom-width: 1px;\n\tborder-bottom-color: #585858;\n\tborder-left-style: solid;\n\tborder-left-width: 1px;\n\tborder-left-color: #585858;\n\tborder-right-style: solid;\n\tborder-right-width: 1px;\n\tborder-right-color: #585858;\n\tcolor: #A4A4A4;\n\tbackground-color: #A4A4A4;\n\theight: 10px;\n\tpage-break-after: always;\n\tpadding: 0px 0px 0px 0px;\n}\n\n@media print {\n\t.dijitEditorPageBreak { page-break-after: always; background-color: rgba(0,0,0,0); color: rgba(0,0,0,0); border: 0px none rgba(0,0,0,0); display: hidden; width: 0px; height: 0px;}\n}";
else{var b=a.createElement("style");b.appendChild(a.createTextNode(".dijitEditorPageBreak {\n\tborder-top-style: solid;\n\tborder-top-width: 3px;\n\tborder-top-color: #585858;\n\tborder-bottom-style: solid;\n\tborder-bottom-width: 1px;\n\tborder-bottom-color: #585858;\n\tborder-left-style: solid;\n\tborder-left-width: 1px;\n\tborder-left-color: #585858;\n\tborder-right-style: solid;\n\tborder-right-width: 1px;\n\tborder-right-color: #585858;\n\tcolor: #A4A4A4;\n\tbackground-color: #A4A4A4;\n\theight: 10px;\n\tpage-break-after: always;\n\tpadding: 0px 0px 0px 0px;\n}\n\n@media print {\n\t.dijitEditorPageBreak { page-break-after: always; background-color: rgba(0,0,0,0); color: rgba(0,0,0,0); border: 0px none rgba(0,0,0,0); display: hidden; width: 0px; height: 0px;}\n}"));
a.getElementsByTagName("head")[0].appendChild(b)}}},_insertPageBreak:function(){try{this._styled||this._style(),this._allowBreak()&&this.editor.execCommand("inserthtml",this._pbContent)}catch(a){console.warn(a)}},_allowBreak:function(){for(var a=this.editor,b=a.document,c=a._sCall("getSelectedElement",null)||a._sCall("getParentElement",null);c&&c!==b.body&&c!==b.html;){if(a._sCall("isTag",[c,this._unbreakableNodes]))return!1;c=c.parentNode}return!0}}),dojo.subscribe(dijit._scopeName+".Editor.getPlugin",
null,function(a){if(!a.plugin&&a.args.name.toLowerCase()==="pagebreak")a.plugin=new dojox.editor.plugins.PageBreak({})}));