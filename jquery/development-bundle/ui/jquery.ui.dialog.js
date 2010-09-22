(function($){var _1="ui-dialog "+"ui-widget "+"ui-widget-content "+"ui-corner-all ";$.widget("ui.dialog",{options:{autoOpen:true,buttons:{},closeOnEscape:true,closeText:"close",dialogClass:"",draggable:true,hide:null,height:"auto",maxHeight:false,maxWidth:false,minHeight:150,minWidth:150,modal:false,position:"center",resizable:true,show:null,stack:true,title:"",width:300,zIndex:1000},_create:function(){this.originalTitle=this.element.attr("title");var _2=this,_3=_2.options,_4=_3.title||_2.originalTitle||"&#160;",_5=$.ui.dialog.getTitleId(_2.element),_6=(_2.uiDialog=$("<div></div>")).appendTo(document.body).hide().addClass(_1+_3.dialogClass).css({zIndex:_3.zIndex}).attr("tabIndex",-1).css("outline",0).keydown(function(_7){if(_3.closeOnEscape&&_7.keyCode&&_7.keyCode===$.ui.keyCode.ESCAPE){_2.close(_7);_7.preventDefault();}}).attr({role:"dialog","aria-labelledby":_5}).mousedown(function(_8){_2.moveToTop(false,_8);}),_9=_2.element.show().removeAttr("title").addClass("ui-dialog-content "+"ui-widget-content").appendTo(_6),_a=(_2.uiDialogTitlebar=$("<div></div>")).addClass("ui-dialog-titlebar "+"ui-widget-header "+"ui-corner-all "+"ui-helper-clearfix").prependTo(_6),_b=$("<a href=\"#\"></a>").addClass("ui-dialog-titlebar-close "+"ui-corner-all").attr("role","button").hover(function(){_b.addClass("ui-state-hover");},function(){_b.removeClass("ui-state-hover");}).focus(function(){_b.addClass("ui-state-focus");}).blur(function(){_b.removeClass("ui-state-focus");}).click(function(_c){_2.close(_c);return false;}).appendTo(_a),_d=(_2.uiDialogTitlebarCloseText=$("<span></span>")).addClass("ui-icon "+"ui-icon-closethick").text(_3.closeText).appendTo(_b),_e=$("<span></span>").addClass("ui-dialog-title").attr("id",_5).html(_4).prependTo(_a);if($.isFunction(_3.beforeclose)&&!$.isFunction(_3.beforeClose)){_3.beforeClose=_3.beforeclose;}_a.find("*").add(_a).disableSelection();if(_3.draggable&&$.fn.draggable){_2._makeDraggable();}if(_3.resizable&&$.fn.resizable){_2._makeResizable();}_2._createButtons(_3.buttons);_2._isOpen=false;if($.fn.bgiframe){_6.bgiframe();}},_init:function(){if(this.options.autoOpen){this.open();}},destroy:function(){var _f=this;if(_f.overlay){_f.overlay.destroy();}_f.uiDialog.hide();_f.element.unbind(".dialog").removeData("dialog").removeClass("ui-dialog-content ui-widget-content").hide().appendTo("body");_f.uiDialog.remove();if(_f.originalTitle){_f.element.attr("title",_f.originalTitle);}return _f;},widget:function(){return this.uiDialog;},close:function(_10){var _11=this,_12;if(false===_11._trigger("beforeClose",_10)){return;}if(_11.overlay){_11.overlay.destroy();}_11.uiDialog.unbind("keypress.ui-dialog");_11._isOpen=false;if(_11.options.hide){_11.uiDialog.hide(_11.options.hide,function(){_11._trigger("close",_10);});}else{_11.uiDialog.hide();_11._trigger("close",_10);}$.ui.dialog.overlay.resize();if(_11.options.modal){_12=0;$(".ui-dialog").each(function(){if(this!==_11.uiDialog[0]){_12=Math.max(_12,$(this).css("z-index"));}});$.ui.dialog.maxZ=_12;}return _11;},isOpen:function(){return this._isOpen;},moveToTop:function(_13,_14){var _15=this,_16=_15.options,_17;if((_16.modal&&!_13)||(!_16.stack&&!_16.modal)){return _15._trigger("focus",_14);}if(_16.zIndex>$.ui.dialog.maxZ){$.ui.dialog.maxZ=_16.zIndex;}if(_15.overlay){$.ui.dialog.maxZ+=1;_15.overlay.$el.css("z-index",$.ui.dialog.overlay.maxZ=$.ui.dialog.maxZ);}_17={scrollTop:_15.element.attr("scrollTop"),scrollLeft:_15.element.attr("scrollLeft")};$.ui.dialog.maxZ+=1;_15.uiDialog.css("z-index",$.ui.dialog.maxZ);_15.element.attr(_17);_15._trigger("focus",_14);return _15;},open:function(){if(this._isOpen){return;}var _18=this,_19=_18.options,_1a=_18.uiDialog;_18.overlay=_19.modal?new $.ui.dialog.overlay(_18):null;if(_1a.next().length){_1a.appendTo("body");}_18._size();_18._position(_19.position);_1a.show(_19.show);_18.moveToTop(true);if(_19.modal){_1a.bind("keypress.ui-dialog",function(_1b){if(_1b.keyCode!==$.ui.keyCode.TAB){return;}var _1c=$(":tabbable",this),_1d=_1c.filter(":first"),_1e=_1c.filter(":last");if(_1b.target===_1e[0]&&!_1b.shiftKey){_1d.focus(1);return false;}else{if(_1b.target===_1d[0]&&_1b.shiftKey){_1e.focus(1);return false;}}});}$([]).add(_1a.find(".ui-dialog-content :tabbable:first")).add(_1a.find(".ui-dialog-buttonpane :tabbable:first")).add(_1a).filter(":first").focus();_18._trigger("open");_18._isOpen=true;return _18;},_createButtons:function(_1f){var _20=this,_21=false,_22=$("<div></div>").addClass("ui-dialog-buttonpane "+"ui-widget-content "+"ui-helper-clearfix");_20.uiDialog.find(".ui-dialog-buttonpane").remove();if(typeof _1f==="object"&&_1f!==null){$.each(_1f,function(){return !(_21=true);});}if(_21){$.each(_1f,function(_23,fn){var _24=$("<button type=\"button\"></button>").text(_23).click(function(){fn.apply(_20.element[0],arguments);}).appendTo(_22);if($.fn.button){_24.button();}});_22.appendTo(_20.uiDialog);}},_makeDraggable:function(){var _25=this,_26=_25.options,doc=$(document),_27;function _28(ui){return {position:ui.position,offset:ui.offset};};_25.uiDialog.draggable({cancel:".ui-dialog-content, .ui-dialog-titlebar-close",handle:".ui-dialog-titlebar",containment:"document",start:function(_29,ui){_27=_26.height==="auto"?"auto":$(this).height();$(this).height($(this).height()).addClass("ui-dialog-dragging");_25._trigger("dragStart",_29,_28(ui));},drag:function(_2a,ui){_25._trigger("drag",_2a,_28(ui));},stop:function(_2b,ui){_26.position=[ui.position.left-doc.scrollLeft(),ui.position.top-doc.scrollTop()];$(this).removeClass("ui-dialog-dragging").height(_27);_25._trigger("dragStop",_2b,_28(ui));$.ui.dialog.overlay.resize();}});},_makeResizable:function(_2c){_2c=(_2c===undefined?this.options.resizable:_2c);var _2d=this,_2e=_2d.options,_2f=_2d.uiDialog.css("position"),_30=(typeof _2c==="string"?_2c:"n,e,s,w,se,sw,ne,nw");function _31(ui){return {originalPosition:ui.originalPosition,originalSize:ui.originalSize,position:ui.position,size:ui.size};};_2d.uiDialog.resizable({cancel:".ui-dialog-content",containment:"document",alsoResize:_2d.element,maxWidth:_2e.maxWidth,maxHeight:_2e.maxHeight,minWidth:_2e.minWidth,minHeight:_2d._minHeight(),handles:_30,start:function(_32,ui){$(this).addClass("ui-dialog-resizing");_2d._trigger("resizeStart",_32,_31(ui));},resize:function(_33,ui){_2d._trigger("resize",_33,_31(ui));},stop:function(_34,ui){$(this).removeClass("ui-dialog-resizing");_2e.height=$(this).height();_2e.width=$(this).width();_2d._trigger("resizeStop",_34,_31(ui));$.ui.dialog.overlay.resize();}}).css("position",_2f).find(".ui-resizable-se").addClass("ui-icon ui-icon-grip-diagonal-se");},_minHeight:function(){var _35=this.options;if(_35.height==="auto"){return _35.minHeight;}else{return Math.min(_35.minHeight,_35.height);}},_position:function(_36){var _37=[],_38=[0,0],_39;_36=_36||$.ui.dialog.prototype.options.position;if(typeof _36==="string"||(typeof _36==="object"&&"0" in _36)){_37=_36.split?_36.split(" "):[_36[0],_36[1]];if(_37.length===1){_37[1]=_37[0];}$.each(["left","top"],function(i,_3a){if(+_37[i]===_37[i]){_38[i]=_37[i];_37[i]=_3a;}});}else{if(typeof _36==="object"){if("left" in _36){_37[0]="left";_38[0]=_36.left;}else{if("right" in _36){_37[0]="right";_38[0]=-_36.right;}}if("top" in _36){_37[1]="top";_38[1]=_36.top;}else{if("bottom" in _36){_37[1]="bottom";_38[1]=-_36.bottom;}}}}_39=this.uiDialog.is(":visible");if(!_39){this.uiDialog.show();}this.uiDialog.css({top:0,left:0}).position({my:_37.join(" "),at:_37.join(" "),offset:_38.join(" "),of:window,collision:"fit",using:function(pos){var _3b=$(this).css(pos).offset().top;if(_3b<0){$(this).css("top",pos.top-_3b);}}});if(!_39){this.uiDialog.hide();}},_setOption:function(key,_3c){var _3d=this,_3e=_3d.uiDialog,_3f=_3e.is(":data(resizable)"),_40=false;switch(key){case "beforeclose":key="beforeClose";break;case "buttons":_3d._createButtons(_3c);break;case "closeText":_3d.uiDialogTitlebarCloseText.text(""+_3c);break;case "dialogClass":_3e.removeClass(_3d.options.dialogClass).addClass(_1+_3c);break;case "disabled":if(_3c){_3e.addClass("ui-dialog-disabled");}else{_3e.removeClass("ui-dialog-disabled");}break;case "draggable":if(_3c){_3d._makeDraggable();}else{_3e.draggable("destroy");}break;case "height":_40=true;break;case "maxHeight":if(_3f){_3e.resizable("option","maxHeight",_3c);}_40=true;break;case "maxWidth":if(_3f){_3e.resizable("option","maxWidth",_3c);}_40=true;break;case "minHeight":if(_3f){_3e.resizable("option","minHeight",_3c);}_40=true;break;case "minWidth":if(_3f){_3e.resizable("option","minWidth",_3c);}_40=true;break;case "position":_3d._position(_3c);break;case "resizable":if(_3f&&!_3c){_3e.resizable("destroy");}if(_3f&&typeof _3c==="string"){_3e.resizable("option","handles",_3c);}if(!_3f&&_3c!==false){_3d._makeResizable(_3c);}break;case "title":$(".ui-dialog-title",_3d.uiDialogTitlebar).html(""+(_3c||"&#160;"));break;case "width":_40=true;break;}$.Widget.prototype._setOption.apply(_3d,arguments);if(_40){_3d._size();}},_size:function(){var _41=this.options,_42;this.element.css("width","auto").hide();_42=this.uiDialog.css({height:"auto",width:_41.width}).height();this.element.css(_41.height==="auto"?{minHeight:Math.max(_41.minHeight-_42,0),height:"auto"}:{minHeight:0,height:Math.max(_41.height-_42,0)}).show();if(this.uiDialog.is(":data(resizable)")){this.uiDialog.resizable("option","minHeight",this._minHeight());}}});$.extend($.ui.dialog,{version:"1.8",uuid:0,maxZ:0,getTitleId:function($el){var id=$el.attr("id");if(!id){this.uuid+=1;id=this.uuid;}return "ui-dialog-title-"+id;},overlay:function(_43){this.$el=$.ui.dialog.overlay.create(_43);}});$.extend($.ui.dialog.overlay,{instances:[],oldInstances:[],maxZ:0,events:$.map("focus,mousedown,mouseup,keydown,keypress,click".split(","),function(_44){return _44+".dialog-overlay";}).join(" "),create:function(_45){if(this.instances.length===0){setTimeout(function(){if($.ui.dialog.overlay.instances.length){$(document).bind($.ui.dialog.overlay.events,function(_46){return ($(_46.target).zIndex()>=$.ui.dialog.overlay.maxZ);});}},1);$(document).bind("keydown.dialog-overlay",function(_47){if(_45.options.closeOnEscape&&_47.keyCode&&_47.keyCode===$.ui.keyCode.ESCAPE){_45.close(_47);_47.preventDefault();}});$(window).bind("resize.dialog-overlay",$.ui.dialog.overlay.resize);}var $el=(this.oldInstances.pop()||$("<div></div>").addClass("ui-widget-overlay")).appendTo(document.body).css({width:this.width(),height:this.height()});if($.fn.bgiframe){$el.bgiframe();}this.instances.push($el);return $el;},destroy:function($el){this.oldInstances.push(this.instances.splice($.inArray($el,this.instances),1)[0]);if(this.instances.length===0){$([document,window]).unbind(".dialog-overlay");}$el.remove();var _48=0;$.each(this.instances,function(){_48=Math.max(_48,this.css("z-index"));});this.maxZ=_48;},height:function(){var _49,_4a;if($.browser.msie&&$.browser.version<7){_49=Math.max(document.documentElement.scrollHeight,document.body.scrollHeight);_4a=Math.max(document.documentElement.offsetHeight,document.body.offsetHeight);if(_49<_4a){return $(window).height()+"px";}else{return _49+"px";}}else{return $(document).height()+"px";}},width:function(){var _4b,_4c;if($.browser.msie&&$.browser.version<7){_4b=Math.max(document.documentElement.scrollWidth,document.body.scrollWidth);_4c=Math.max(document.documentElement.offsetWidth,document.body.offsetWidth);if(_4b<_4c){return $(window).width()+"px";}else{return _4b+"px";}}else{return $(document).width()+"px";}},resize:function(){var _4d=$([]);$.each($.ui.dialog.overlay.instances,function(){_4d=_4d.add(this);});_4d.css({width:0,height:0}).css({width:$.ui.dialog.overlay.width(),height:$.ui.dialog.overlay.height()});}});$.extend($.ui.dialog.overlay.prototype,{destroy:function(){$.ui.dialog.overlay.destroy(this.$el);}});}(jQuery));