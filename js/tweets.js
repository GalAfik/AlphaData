$(function(){

	$.ajax({
		url: 'get_tweets.php',
		type: 'GET',
		success: function(response) {



			console.log(response);

			if (typeof response.errors === 'undefined' || response.errors.length < 1) {
				
				var $tweets = $('<ul></ul>');
				$.each(response, function(i, obj) {
					$tweets.append('<li>' + JSON.stringify(obj, null, '   ') + '</li>');
				});

				$('.tweets-container').html($tweets);

			} else {
				$('.tweets-container p:first').text('Response error');
			}
		},
		error: function(errors) {
			$('.tweets-container p:first').text('Request error');
		}
	});
});