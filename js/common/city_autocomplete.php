<?php
$secho.='
var xpu=300001;

$("#city"+xpu).keyup(function(){
var dval=$(this).val();
dov(dval,xpu);	
});

var v=vp_gn[corder];
var cityc=cip_gn[corder];
var countryc=cop_gn[corder];
var statec=sp_gn[corder];

if(v!="" && v!="undefined"){
				$("#editpiw"+xpu).addClass("editpiv");
				$("#editpiwv"+xpu).addClass("editpivv");
				$("#city"+xpu).removeClass("editpi");
				$("#city"+xpu).addClass("editpi2");
				$("#removeedit"+xpu).css("display","block");
				$("#stateedit"+xpu).val("1");
}

$("#city"+xpu).val(v);

$("#cityv"+xpu).val(v);
$("#statec"+xpu).val(statec);
$("#countryc"+xpu).val(countryc);
$("#cityc"+xpu).val(cityc);

			$(function() {
		$("#city"+xpu).autocomplete({
			minLength: 1,
			autoFocus: true,
			appendTo:"#editpiwv"+xpu,
			search:function(){$(this).addClass("working");},
			open:function(){$(this).parents(".photo_container").eq(0).css("z-index","9999");
			$(this).removeClass("working"); var where=$("#editpiwv").find(".ui-autocomplete"); var width=$(this).innerWidth()-1; $(where).css("width",width);},
			close:function(){$(this).parents(".photo_container").eq(0).css("z-index","2");},
			source: "/autocomplete/cities.php",
			focus: function(event,ui){
				return false;
			},
			select: function( event, ui ) {
				var as=ui.item.value;
	
				$("#editpiw"+xpu).addClass("editpiv");
	
				$("#editpiwv"+xpu).addClass("editpivv");
				$("#city"+xpu).removeClass("editpi");
				$("#city"+xpu).addClass("editpi2");
				$("#removeedit"+xpu).css("display","block");
				$("#stateedit"+xpu).val("1");
				$("#city"+xpu).val(as);
				$("#cityv"+xpu).val(as);
				$("#statec"+xpu).val(ui.item.statec);
				$("#countryc"+xpu).val(ui.item.countryc);
				$("#cityc"+xpu).val(ui.item.city);
				$(this).removeClass("working");
				$("#city"+xpu).blur();
				save_city_vals(xpu);
				return false;
			}
		})
		.data( "ui-autocomplete" )._renderItem = function( ul, item ) {
			return $( "<li style=\\"cursor:pointer;padding:0;font-family:\\\'lucida grande\\\',tahoma,verdana,arial,sans-serif!important;text-align:left!important;\\"></li>" )
				.data( "ui-autocomplete-item", item )
				.append( \'<a style="font-weight:normal!important;">\'+item.value + \'</a>\' )
				.appendTo( ul );
		};
	});
	
$("#city"+xpu).keyup(function(){
var dval=$(this).val();
dov(dval,xpu);	
});
	';
?>