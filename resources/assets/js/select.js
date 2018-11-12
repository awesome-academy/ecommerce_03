$(".selection-1").select2({
    minimumResultsForSearch: 20,
    dropdownParent: $('#dropDownSelect1')
});

function addcart(id_product){
    try {
        var route_name = document.getElementById(id_product).value;
        $.ajax({
            url: route_name,
            type: 'GET',
            async: false,
            dataType: 'html',
            data: {
               id_product:id_product
            },
            success: function(data){
                $('.header-icons-noti').html(data);
            },
            error: function(){
                alert('Có lỗi khi thêm sản phẩm');
            }
        });
        changecart(id_product);
    } catch (error) {
        alert(error);
    }
}

function changecart(id_product){
    var route = document.getElementById('changecart-'+id_product).value;
    $.get(route, function(data){
        $('.change-cart').html(data);
    });
}

function change(id_product)
{
    var value = $('#quantity-'+id_product).val();
    if (value == false || value < 0 )
    {
        alert('Input again');
        return false;
    }
    $("#form-quantity-"+id_product).submit();
}

function common(name){
    var common = $('input:checkbox[name="' + name + '[]"]');
    common.on('change', function(e){
        if($(this).attr('id')!= name + '-all')
        {
            if($(this).is(':checked'))
                $('#' + name + '-all').prop('checked', false);

            else
            {
                var le2 = $(':checkbox[name="' + name + '[]"]')
                    .filter(':checked')
                    .not('#' + name + '-all').length;
                if (le2 == 0)
                  $('#' + name + '-all').prop('checked', true);

            }
        }
        else
        {
            if($(this).is(':checked')){
                common.not($(this)).prop('checked', false);
            } else {
                common.not($(this)).prop('checked', false);
                $(this).prop('checked', true);
            }
        }
      $('.filter-form').submit();
    });
}
common('cat');
common('skin');
common('strap');
common('energy');

$('#filter_price').on('click', function(){
    $('.filter-form').submit();
});

$('.selection-2').on('change', function(){
    document.getElementById("sort").innerHTML = "<input type='hidden' name='sort' value='"+$(this).val()+"' />" ;
    $('.filter-form').submit();
});

$('#click-logout').on('click', function(){
    $('#logout-form').submit();
});
