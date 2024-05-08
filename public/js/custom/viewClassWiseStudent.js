$('#ClassId').on('change' , function(){
    // alert($(this).val());

    $.ajax({
        type: 'get',
        url: "/getClassWiseStudent",
        headers: {
            'X-CSRF-Token': '{{ csrf_token() }}',
        },
        data: {
            id: $(this).val(),
        },
        success: function(response) {
            $('#showStudent').html(response);
            // console.log(response);
        }
    });

});
