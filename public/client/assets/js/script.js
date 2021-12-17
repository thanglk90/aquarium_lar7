$(document).ready(function(){
    $("#scroll-top").click(function() {
        $("html, body").animate({ scrollTop: 0 }, "fast");
        return false;
    });

    $(window).scroll(function() {
        if ($(this).scrollTop()) {
            $('#scroll-top').stop(true, true).fadeIn();
        } else {
            $('#scroll-top').stop(true, true).fadeOut();
        }
    });

    $('.owl-carousel').owlCarousel({
        loop:true,
        margin:0,
        nav:true,
        autoplay:true,
        autoplayTimeout:3000,
        dots:false,
        responsive:{
            0:{
                items:2
            },
            600:{
                items:3
            },
            1000:{
                items:5
            }
        }
    })

    // box-search
    var boxSearchBtn = $('.banner-bottom__box-search-submit');
    boxSearchBtn.click(function(e){
        e.preventDefault();
        var boxSearchInput = $('.banner-bottom__box-search-input');
        var url = '/tim-kiem/tukhoa=' + boxSearchInput.val();
        console.log(url);
        location.assign(url);

    });

    // client filter product
    var cateParentSelect = $('#category-parent');
    var cateChildSelect = $('#category-child');
    var productSelect = $('#product-select');

    cateParentSelect.change(function(){
        var cateParentSlug = $(this).val();
        var _token = $('form input[name=_token]').val();
        var url = `/category/${cateParentSlug}/get-cate-child`; 
        console.log(url);
        $.ajax({
            url: url,
            method: 'POST',
            data: {
                _token
            },
            success: function(data){
                console.log(data);
                cateChildSelect.html('<option selected="true" disabled="disabled">Danh mục con</option>' + data);

            },
            error: function(error){
                console.log(error);
            }
        })

    })

    cateChildSelect.change(function(){
        var cateChildSlug = $(this).val();
        var _token = $('form input[name=_token]').val();
        var url = `/category/${cateChildSlug}/get-product`; 
        console.log(url);
        $.ajax({
            url: url,
            method: 'POST',
            data: {
                _token
            },
            success: function(data){
                console.log(data);
                productSelect.html('<option selected="true" disabled="disabled">Sản phẩm</option>' + data);

            },
            error: function(error){
                console.log(error);
            }
        })

    })
    
    var SearchBtn = $('.search-submit-btn');
    SearchBtn.click(function(e){
        e.preventDefault();
        var url = null;
        console.log(productSelect.val());
        if(cateParentSelect.val() != null && cateChildSelect.val() != null && productSelect.val() != null){
            url = '/tim-kiem/tukhoa=' + productSelect.val();
            console.log(url);
            location.assign(url);
            return false;
        }
        
        if(cateParentSelect.val() != null && cateChildSelect.val() == null){
            url = `/san-pham/${cateParentSelect.val()}.p`;
            console.log(url);
            location.assign(url);

            return false;
        }

        if(cateParentSelect.val() != null && cateChildSelect.val() != null){
            url = `/san-pham/${cateChildSelect.val()}.s`;
            console.log(url);
            location.assign(url);
            return false;
        }


    });

    // lazy load
    $('.lazy').Lazy({
        enableThrottle: true,
        // throttle: 3000
    });

});