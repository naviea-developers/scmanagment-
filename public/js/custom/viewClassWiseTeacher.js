$('#ChooseClass').on('change' , function(){
    // alert($(this).val());

    $.ajax({
        type: 'get',
        url: "/getClassWiseTeacherInfo",
        headers: {
            'X-CSRF-Token': '{{ csrf_token() }}',
        },
        data: {
            id: $(this).val(),
        },
        success: function(response) {
            $('#showData').html(response);
            // console.log(response);
        }
    });

});
