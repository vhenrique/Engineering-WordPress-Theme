jQuery(document).ready(function(){
	$ = jQuery.noConflict();
		
	$('.ActNewsletter').click(function(e){
		e.preventDefault();
		var formData = {
			'email'	: $('.newsEmail').val(),
		};
		$.ajax({
			type: 'POST',
			url: $('.newsletterPermalink').val(),
			data: formData,
			dataType: 'json',
			success: function(data){
				$('.statusMessage').html('<h5 class="colorFFF">'+data.message+'</h5>');
			},
			error: function(){
				console.log('Erro');
			}
		});
	})
})