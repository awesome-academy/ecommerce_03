$('.active-click').on('click', function(){
    var id = $(this).attr('id');
    var tt = '#' + id;
    var route = $('.route_user').val();
    $.ajax({
        url: route,
        type: 'GET',
        dataType: 'html',
        data: {
            id: id,
        },
        success: function(data){
            $(tt).html(data);
        },
        error: function(){
            alert('Error when change active user');
        }
    });
});

$('.status-click').on('click', function(){
    var id = $(this).attr('id');
    var tt = '#' + id;
    var route = $('.route_order').val();
    $.ajax({
        url: route,
        type: 'GET',
        dataType: 'html',
        data: {
            id: id,
        },
        success: function(data){
            $(tt).html(data);
        },
        error: function(){
            alert('Error when change status order');
        }
    });
});

$('.chart-click').on('click', function() {
    $('.chart-click').removeClass('active');
    $(this).addClass('active');
    var value_id = $(this).attr('id');
    if (value_id == 'years') {
        $('.years').show();
        $('.months').hide();
    } else {
        $('.months').show();
        $('.years').hide();
    }
});
var getLang = $.parseJSON($('input:hidden[name="getLangugue"]').val());

$('.click-confirm-del').on('submit', function() {
    return confirm(getLang['are_u_sure']);
});

$('.click-submit-cat').on('submit', function() {
    return confirm(getLang['admin']['will_u_del_sub_cat']);
});
