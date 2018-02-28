// JavaScript Document
var file_frame;
(function( $ ) {
	'use strict';

	 $(function() {
		 $( "#main_list_wrap" ).sortable();
		jQuery(document).on('click', 'input.select_img', function( event ){
			//alert(123456);
			
	 	  var $this = $(this);

	 	  event.preventDefault();

	 	  // Create the media frame.
	 	  file_frame = wp.media.frames.file_frame = wp.media({
	 	    title: jQuery( this ).data( 'uploader_title' ),
	 	    button: {
	 	      text: jQuery( this ).data( 'uploader_button_text' ),
	 	    },
	 	    multiple: false  // Set to true to allow multiple files to be selected
	 	  });
		  
		 
	 	  // When an image is selected, run a callback.
	 	  file_frame.on( 'select', function() {
	 	    // We set multiple to false so only get one image from the uploader
	 	    var attachment = file_frame.state().get('selection').first().toJSON();
	 	    // console.log(attachment.sizes.thumbnail.url); return;
	 	    var image_field = $this.siblings('.author_image_id');
	 	    image_field.val(attachment.id);
	 	    var imgurl = attachment.url;
	 	    if( 'undefined' != typeof attachment.sizes.thumbnail ){
  	 	    imgurl = attachment.sizes.thumbnail.url;
	 	    }
	 	    var image_preview_wrap = $this.siblings('.author_wrap');
	 	    image_preview_wrap.show();
	 	    image_preview_wrap.find('.authorimage').attr('src',imgurl);
	 	    // Hide upload button
	 	    $this.hide();

	 	  });

		 // Finally, open the modal
	 	  file_frame.open();

	 	 
		});
		// Image remove button handler
		$(document).on('click', 'a.btn_remove_image', function(evt){
			//alert(123);
		  evt.preventDefault();
		  var $this = $(this);

		  var image_field_temp = $this.parent().parent().parent().find('input.author_image_id');
		  var upload_button = $this.parent().parent().parent().find('input.select_img');
		  var image_preview_wrap = $this.parent().parent().parent().find('.author_wrap');
		  var cur_image_value = image_field_temp.val();

		  image_field_temp.val('');
		  image_preview_wrap.fadeOut('slow',function(){
			  image_preview_wrap.hide();
			  image_preview_wrap.find('.authorimage').attr('src','');
			  upload_button.fadeIn();
		  });
		  return;
		});
		
		
		// Remove Handler
	 	$(document).on('click','input.btn_remove_item', function(e){
	 		e.preventDefault();
	 		// Confirmation
	 		var confirmation = confirm(OBJ.lang.are_you_sure);
	 		if( ! confirmation ){
	 			return false;
	 		}

	 		var $this = $(this);
	 		var $wrap = $this.parent().parent();
	 		$wrap.fadeOut('slow',function(){
        $wrap.remove();
      });

	 	})

		 // Add Handler
	 	$('input.btn-add-item').on('click', function(e){
			//alert(123344);
			//alert
		    e.preventDefault();
	 		var mytemplate = $("#template_testimoninal").html();
	 		$('#main_list_wrap').append(mytemplate);
			$('.txt-focus').focus();
	 		return;

	 	});
		
		//star rating
		
		
	 });
	
})( jQuery );
