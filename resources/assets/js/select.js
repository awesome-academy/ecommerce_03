$(".selection-1").select2({
    minimumResultsForSearch: 20,
    dropdownParent: $('#dropDownSelect1')
});

function addcart(id_product){
    var route_name = document.getElementById(id_product).value;
    $.ajax({
        url: route_name,
        type: 'GET',
        dataType: 'html',
        data: {
           id_product:id_product
        },
        success: function(data){
            alert('Đã thêm sản phẩm vào giỏ hàng');
        },
        error: function(){
            alert('Có lỗi khi thêm sản phẩm');
        }
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
