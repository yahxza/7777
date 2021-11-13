jQuery(document).ready(function () {
jQuery('.display-icon').change(function(){
					var input = jQuery(this);
					if(input.prop('checked')){
						jQuery('.'+input.data('display')).css({'display':'block'});
					}else{
						jQuery('.'+input.data('display')).css({'display':'none'});
					}
				});
jQuery('[data-toggle=tooltip]').tooltip();
jQuery(document).ready(function() {jQuery('#web-map').modal('show');jQuery('[data-toggle = tooltip]').tooltip({'html':true});});
});