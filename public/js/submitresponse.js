function submitResponse(ticketno, btnsubmit){
    let response = $('#response-'+ticketno);
    let responseText = response.val().trim();
    let repid = $('#hiddenid').val();
    if(responseText == null || responseText == ''){
        response.addClass('is-invalid')
        response.removeClass('is-valid')
    }
    else{
        response.removeClass('is-invalid')
        response.addClass('is-valid')
        console.log($(btnsubmit).parent().parent().children())
        $.ajax({
            url: '/api/comment/store',
            method: "POST",
            data: {
                'TicketNo' : ticketno,
                'FromRep' : 1,
                'ReplyingRepId' : repid,
                'Content' : responseText
            },
            
            success: function (data) {
                // data = JSON.parse(data);
                console.log(data);
                // if(data.length > 0){
                //     console.log('data is more than 0');
                //     response.prop("disabled", "disabled");
                // }
                if(data != null){
                    console.log('data is not null');
                    response.prop("disabled", "disabled");
                    $(btnsubmit).prop("disabled", "disabled");
                    $(btnsubmit).parent().parent().children(0).removeClass('d-none');
                    $(btnsubmit).parent().parent().children(0).addClass('d-md-flex');
                    // $(`#close-${ticketno}`).removeClass('d-none');
                    console.log($('#transferDiv-' + ticketno));
                    console.log($('#closeDiv-' + ticketno));
                    $('#transferDiv-' + ticketno).remove();
                    $('#closeDiv-' + ticketno).show();
                }
               
            },
            error: function (err) {
                console.log(err.responseText)
            }
        });
    }
}


function revalidateTextArea(ta){
    ta = $(ta);
    if(ta.val().trim() != '' || ta.val().trim() == null){
        ta.removeClass('is-invalid');
    }
}