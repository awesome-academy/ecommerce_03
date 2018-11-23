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
