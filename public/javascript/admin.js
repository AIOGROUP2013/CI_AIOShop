$(document).ready(function() {
    $("#buttonlogin").click(function() {
        $('#show_seach').hide();
        $('#show_login').fadeToggle();

    });
    $("#btnshow_search").click(function() {
        $('#show_seach').fadeToggle();
    });

    $('.product_large').hover(
            function() {

                $(this).find('.images_hover').fadeIn();
            },
            function() {
                $(this).find('.images_hover').fadeOut();
            }
    );
    $('.product_small').hover(
            function() {
                $(this).find('.images_hover_small').fadeIn();
            },
            function() {
                $(this).find('.images_hover_small').fadeOut();

            }
    );
    $('.product_small').hover(
            function() {

                $(this).find('.images_hover_small').fadeIn();
            },
            function() {
                $(this).find('.images_hover_small').fadeOut();
            }
    );
    $('.product_avg').hover(
            function() {

                $(this).find('.images_hover_avg').fadeIn();
            },
            function() {
                $(this).find('.images_hover_avg').fadeOut();
            }
    );
    $('.product_small_small').hover(
            function() {

                $(this).find('.images_hover_small_small').fadeIn();
            },
            function() {
                $(this).find('.images_hover_small_small').fadeOut();
            }
    );

    var div = $('#topmenu_red');
    var start = $(div).offset().top;

    $.event.add(window, "scroll", function() {
        var p = $(window).scrollTop();
        $(div).css('position', ((p) > start) ? 'fixed' : 'static');
        $(div).css('top', ((p) > start) ? '0px' : '');
    });
    $(".add_to_cart").click(function() {
        $x = $(this).parent().parent().parent().parent().parent();
      //  alert($x.html());
        var name = $x.find('p').html();
        var price = $x.find('span').text().replace('đ', '');
        var qty = 1;
        var id = $x.find('.muiten').attr("id")+$x.find('.muiten_small').attr("id");// .text() + $x.find('.muiten_small').text();
        //alert(id+name+price);
        $.ajax({
            type: "GET",
            url: globalurl+'index.php/carts/add',
            data: {
                id: id,
                qty: qty,
                name: name,
                price: price
            },
            success: function(data)
            {
                $("#danhsachsp").html(data);
            }
        });
    });
    $("#giohang").hover(function() {
        //alert('a');
        //alert($("#danhsachsp").text()+"");
        if ($.trim($("#danhsachsp").text()) == "")
            $.ajax({
                type: "GET",
                url: globalurl+'index.php/carts/show',
                data: {
                },
                success: function(data)
                {                    
                    $("#danhsachsp").html(data);
                }
            });
    });
     

});