$('#classSelection').change(function(){

    $.ajax({
        type: 'get',
        url: "/getClassWiseSub",
        headers: {
            'X-CSRF-Token': '{{ csrf_token() }}',
        },
        data: {
            id: $(this).val(),
        },
        success: function(response) {
            $('#SubjectSelection').html(response);
            // console.log(response);
        }
    });

});



$('#SubjectSelection').on('change' , function(){

    //  alert($(this).val());

    $.ajax({
        type: 'get',
        url: "/getSubwiseTeach",
        headers: {
            'X-CSRF-Token': '{{ csrf_token() }}',
        },
        data: {
            id: $(this).val(),
        },
        success: function(response) {
            $('#chooseTeacher').html(response);
            console.log(response);
        }
    });

});
