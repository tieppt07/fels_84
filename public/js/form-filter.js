$("document").ready(function () 
{
    $.ajaxSetup({
        headers: {
            'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
        }
    });
    
    $('#form-filter').submit(function (e) 
    {
        e.preventDefault();
        var form_data = $(this).serialize();
        var button_content = $(this).find('button[type=submit]');
        $.ajax({
            type: "POST",
            url : "/words",
            data : form_data,
            success: function(response) {
                var words = response.words; 
                if (words.length > 0) {
                    displayWords = '';
                    $.each(words , function(key, value) {
                        displayWords += '<label class="label label-lg label-primary">' + value.name + '</label>';
                        displayWords += ' ' ;
                    });
                    $('#returnData').html(displayWords);
                } else {
                    $('#returnData').html('No results!');
                } 
            }
        });
    });
});


