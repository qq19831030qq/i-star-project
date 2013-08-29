(function($){
    $('._add_file').on('click',function(){
        $('._img_group_area').append('<input type="file" class="_img_group" name="img_group[]">');
    });
})(jQuery);