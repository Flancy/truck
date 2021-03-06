window._ = require('lodash');

/**
 * We'll load jQuery and the Bootstrap jQuery plugin which provides support
 * for JavaScript based Bootstrap features such as modals and tabs. This
 * code may be modified to fit the specific needs of your application.
 */

try {
    window.Popper = require('popper.js').default;
    window.$ = window.jQuery = require('jquery');

    require('bootstrap');
} catch (e) {}

/**
 * We'll load the axios HTTP library which allows us to easily issue requests
 * to our Laravel back-end. This library automatically handles sending the
 * CSRF token as a header based on the value of the "XSRF" token cookie.
 */

window.axios = require('axios');

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

/**
 * Next we will register the CSRF Token as a common header with Axios so that
 * all outgoing HTTP requests automatically have it attached. This is just
 * a simple convenience so we don't have to attach every token manually.
 */

let token = document.head.querySelector('meta[name="csrf-token"]');

if (token) {
    window.axios.defaults.headers.common['X-CSRF-TOKEN'] = token.content;
} else {
    console.error('CSRF token not found: https://laravel.com/docs/csrf#csrf-x-csrf-token');
}

/**
 * Echo exposes an expressive API for subscribing to channels and listening
 * for events that are broadcast by Laravel. Echo and event broadcasting
 * allows your team to easily build robust real-time web applications.
 */

// import Echo from 'laravel-echo'

// window.Pusher = require('pusher-js');

// window.Echo = new Echo({
//     broadcaster: 'pusher',
//     key: process.env.MIX_PUSHER_APP_KEY,
//     cluster: process.env.MIX_PUSHER_APP_CLUSTER,
//     encrypted: true
// });

jQuery(document).ready(function($) {
	$('#carouselAutoCategories').on('slide.bs.carousel', function (e) {
	    var $e = $(e.relatedTarget);
	    var idx = $e.index();
	    var itemsPerSlide = 6;
	    var totalItems = $('.carousel-item').length;
	 
	    if (idx >= totalItems-(itemsPerSlide-1)) {
	        var it = itemsPerSlide - (totalItems - idx);
	        for (var i=0; i<it; i++) {
	            if (e.direction=="left") {
	                $('.carousel-item').eq(i).appendTo('.carousel-inner');
	            }
	            else {
	                $('.carousel-item').eq(0).appendTo('.carousel-inner');
	            }
	        }
	    }
	});

	$('.card-orders .btn').click(function(event) {
		var userId = $(this).attr('data-id');
		var orderId = $(this).attr('data-order-id');

		$.ajax({
			url: '/api/user/'+userId,
			type: 'GET',
		})
		.done(function(data) {
			$('#getExecutor .modal-body').html('<p><b>Имя:</b> '+data.name+'</p><p><b>Телефон:</b> '+data.phone+'</p>');
			$('#getExecutor .btn-more').attr('href', '/user/'+data.id);
			$('#getExecutor .orderCancel').attr('href', '/orderChange/'+orderId+'/2');
			$('#getExecutor .orderComplete').attr('href', '/orderChange/'+orderId+'/3');
		})
		.fail(function(data) {
			console.log("error");
		})
		.always(function(data) {
			console.log("complete");
		});
	});

	$('.ordersProcess .btn').click(function(event) {
		var userId = $(this).attr('data-id');
		$('#getExecutor #exampleModalLabel').text('Заказчик')

		$.ajax({
			url: '/api/user/'+userId,
			type: 'GET',
		})
		.done(function(data) {
			$('#getExecutor .modal-body').html('<p><b>Имя:</b> '+data.name+'</p><p><b>Телефон:</b> '+data.phone+'</p>');
			$('#getExecutor .btn-more').attr('href', '/user/'+data.id);
		})
		.fail(function(data) {
			console.log("error");
		})
		.always(function(data) {
			console.log("complete");
		});
	});
});