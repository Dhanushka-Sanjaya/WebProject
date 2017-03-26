jQuery(document).ready(function($){
        $('select').SumoSelect({search: true, searchText: 'Search...'});

	$('.of-radio-img-img').click(function(){
		$(this).parent().parent().find('.of-radio-img-img').removeClass('of-radio-img-selected');
		$(this).addClass('of-radio-img-selected');
	});
        
        if( $('input[name=_customize-radio-slider_posts]:checked').val() != 'category_posts' ) $('#customize-control-category_slider_posts').hide();
        if( $('input[name=_customize-radio-slider_posts]:checked').val() != 'slider_posts' ) $('#customize-control-slider_selected_posts').hide();
        $('input[name=_customize-radio-slider_posts]').click(function(){
		if( $(this).val() == 'category_posts' )$('#customize-control-category_slider_posts').show(); else $('#customize-control-category_slider_posts').hide();
                if( $(this).val() == 'slider_posts' )$('#customize-control-slider_selected_posts').show(); else $('#customize-control-slider_selected_posts').hide();
	});
        
        $('input[type=range]').on("change mousemove", function() {
            id = $(this).data('id');
            $(this).next('span').html($(this).val() + 'px');
        });
});