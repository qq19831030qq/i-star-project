(function($){
    $('._area_province').on('change',function(e){
        province_value = $(this).val();
        if(province_value!=0){
            $.getJSON('/source/json/china-citys.json',function(json){
                render_city(json,province_value);
            })
        }else{
            $('._area_city').hide();
        }
    });

    $('.add-doc-btn').on('click',function(e){
        li_size = $('.add-doc').find('li').size();
        new_li = '<li>';
        new_li += '<input type="file" name="project_doc['+li_size+'][file]" /> ';
        new_li += '<input maxlength="100" name="project_doc['+li_size+'][description]" placeholder="简单的文档描述" type="text" /> ';
        new_li += '<a href="javascript:;" class="delete-doc-btn" title="删除"><img src="/Admin/source/images/project/delete.png" /></a>';
        new_li += '</li>';
        $('.add-doc ul').append(new_li);
    })

    $('.add-img-btn').on('click',function(e){
        li_size = $('.add-img').find('li').size();
        new_li = '<li>';
        new_li += '<input type="file" name="project_image['+li_size+'][file]" /> ';
        new_li += '<input maxlength="100" name="project_image['+li_size+'][description]" placeholder="简单的图片描述" type="text" /> ';
        new_li += '<a href="javascript:;" class="delete-img-btn" title="删除"><img src="/Admin/source/images/project/delete.png" /></a>';
        new_li += '</li>';
        $('.add-img ul').append(new_li);
    })

    $('.delete-doc-btn').on('click',function(e){
        li_size = $('.add-doc').find('li').size();
        console.log(1111111);
        if(li_size>1) $(this).closest('li').remove();
    })
    
    var render_city = function(json,key){
        console.log(json[key]);
        citys = json[key];
        //select_city = $('<select>',{name:'project_area_city'});
        city_option_html = '';
        $('._area_city').empty();
        for(cid in citys){
            city_option_html += '<option value="'+cid+'">'+citys[cid]+'</option>';
        }
        if(city_option_html!=''){
            $('._area_city').append(city_option_html);
            $('._area_city').show();
        }else{
            $('._area_city').hide();
        }
    }
})(jQuery);