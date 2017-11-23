
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

$(document).ready(function(){
    $('.show_comments').click(function(e) { 	
        e.preventDefault();
    	var id = '#replycomment-' + $(this).data('id');
    	$(id).slideToggle();

    	$(this).hide();
    	$(this).next().show();
    });

    $('.hide_comments').click(function(e) {
        e.preventDefault();
    	var id = '#replycomment-' + $(this).data('id');
    	$(id).slideToggle();

    	$(this).hide();
    	$(this).prev().show();
    });

    $('.show_input').click(function(e) {
        e.preventDefault();
        var id = '#replyinput-' + $(this).data('id');
        $(id).show();        
    });
});
