(function($){$.widget("ui.progressbar",{options:{value:0},_create:function(){this.element.addClass("ui-progressbar ui-widget ui-widget-content ui-corner-all").attr({role:"progressbar","aria-valuemin":this._valueMin(),"aria-valuemax":this._valueMax(),"aria-valuenow":this._value()});this.valueDiv=$("<div class='ui-progressbar-value ui-widget-header ui-corner-left'></div>").appendTo(this.element);this._refreshValue();},destroy:function(){this.element.removeClass("ui-progressbar ui-widget ui-widget-content ui-corner-all").removeAttr("role").removeAttr("aria-valuemin").removeAttr("aria-valuemax").removeAttr("aria-valuenow");this.valueDiv.remove();$.Widget.prototype.destroy.apply(this,arguments);},value:function(_1){if(_1===undefined){return this._value();}this._setOption("value",_1);return this;},_setOption:function(_2,_3){switch(_2){case "value":this.options.value=_3;this._refreshValue();this._trigger("change");break;}$.Widget.prototype._setOption.apply(this,arguments);},_value:function(){var _4=this.options.value;if(typeof _4!=="number"){_4=0;}if(_4<this._valueMin()){_4=this._valueMin();}if(_4>this._valueMax()){_4=this._valueMax();}return _4;},_valueMin:function(){return 0;},_valueMax:function(){return 100;},_refreshValue:function(){var _5=this.value();this.valueDiv[_5===this._valueMax()?"addClass":"removeClass"]("ui-corner-right").width(_5+"%");this.element.attr("aria-valuenow",_5);}});$.extend($.ui.progressbar,{version:"1.8"});})(jQuery);