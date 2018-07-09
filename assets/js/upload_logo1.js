        //================Footer Logo js start==============//

jQuery(document).ready(function($){

   var mediaUploader;

   $('#upload-button1').on('click',function(e) {
   	 e.preventDefault();
   	 if (mediaUploader) {
   	 	mediaUploader.open();
   	 	return;
       }
   	 	mediaUploader = wp.media.frames.file_frame = wp.media({
              title: 'Choose Footer Logo',
              button: {
              	text: 'Choose Logo'
              },
              multiple: false


   	 	});

   	 	mediaUploader.on('select', function(){
   	 		attachment = mediaUploader.state().get('selection').first().toJSON();
   	 		$('#profile-logo1').val(attachment.url);
   	 	});
   	 	mediaUploader.open();
   	 
   });

});

        //================Footer Logo js end==============//
