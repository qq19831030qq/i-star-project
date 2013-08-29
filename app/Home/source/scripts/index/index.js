$(function() {
    var current = 1;
    
    var iterate		= function(){
        var i = parseInt(current+1);
        var lis = $('.rot-menu').children('li').size();
        if(i>lis) i = 1;
        display($('.rot-menu li:nth-child('+i+')'));
    }
    display($('.rot-menu li:first'));
    var slidetime = setInterval(iterate,3000);
    
    $('.rot-menu li').bind('click',function(e){
        clearTimeout(slidetime);
        display($(this));
        e.preventDefault();
    });
    
    function display(elem){
        var $this 	= elem;
        var repeat 	= false;
        if(current == parseInt($this.index() + 1))
            repeat = true;
        
        if(!repeat)
            $this.parent().find('li:nth-child('+current+') a').stop(true,true).animate({'marginRight':'-20px'},300,function(){
                $(this).animate({'opacity':'0.7'},700);
            }).closest('li').removeClass('active');
        
        current = parseInt($this.index() + 1);
        
        var elem = $('a',$this);
        elem.stop(true,true).animate({'marginRight':'0px','opacity':'1.0'},300).closest('li').addClass('active');
        var info_elem = $this.data('info');
        $('.rot-body').prepend(
            $('<img/>',{
                style	:	'opacity:0',
                className : 'bg'
            }).load(
                function(){
                    $(this).animate({'opacity':'1'},600);
                    $('.rot-body img:first').next().animate({'opacity':'0'},700,function(){
                        $(this).remove();
                    });
                }
            ).attr('src',info_elem.image).attr('alt',info_elem.alt).attr('width','960').attr('height','270')
        );
        $('.rot-body').closest('a').attr('href',info_elem.url);
    }
});