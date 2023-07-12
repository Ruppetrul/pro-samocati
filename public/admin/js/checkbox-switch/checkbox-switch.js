$('input[type="checkbox"]').on('change', function() {

    let url = '';
    if($("#nominals").length){
        url = 'nominals/check/';
    }
    if($("#products").length){
        url = 'products/check/';
    }
    let id = $(this).attr('id');

    if ( $(this).is(':checked')){   //включаем
        $(this).attr('value', 1)
        ajax(url, id, 1)

    } else {                        //выключаем
        $(this).attr('value', 0)
        ajax(url, id, 0)
    }

});

function ajax(url, id, value){
    $.ajax({
        url: url+id,
        method: 'post',
        data: {id:id, value:value},
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function(data){
            console.log(data['result']);

        }
    });
}
