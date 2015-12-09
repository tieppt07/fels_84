$("document").ready(function () 
{
    $.ajaxSetup({
        headers: {
            'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
        }
    });
    
    $('#form').submit(function (e) 
    {
        e.preventDefault();
        var form_data = $(this).serialize();
        var button_content = $(this).find('button[type=submit]');
        if ($(this).hasClass('follow_form')) {
            $.ajax({
                type: "POST",
                url : "/activities",
                data : form_data,
                success: function(response) {
                    $('#returnData').html(response.countFollowers);
                    $('button.followButton').addClass('following');
                    $('button.followButton').text('Following');
                    $('#form').removeClass('follow_form');
                    $('#form').addClass('unfollow_form');
                }
            });
        } else {
            $.ajax({
                type: "DELETE",
                url : "/activities/"+$('#followeeId').attr('value'),
                data : form_data,
                success: function(response) {
                    $('#returnData').html(response.countFollowers);
                    $('button.followButton').removeClass('following');
                    $('button.followButton').removeClass('unfollow');
                    $('button.followButton').text('Follow');
                    $('#form').removeClass('unfollow_form');
                    $('#form').addClass('follow_form');
                }
            });
        };
    });

    $('button.followButton').hover(function() 
    {
        $button = $(this);
        if($button.hasClass('following')) {
            $button.addClass('unfollow');
            $button.text('Unfollow');
        }
    }, function() 
    {
        if($button.hasClass('following')) {
            $button.removeClass('unfollow');
            $button.text('Following');
        }
    });
});
