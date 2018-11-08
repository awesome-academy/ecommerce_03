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
