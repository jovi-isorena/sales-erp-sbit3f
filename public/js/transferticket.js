

function transfer(ticketno){
    let newcategory = $('#newcategory-' + ticketno).val();
    console.log(newcategory);
    $.ajax({
        url: '/api/ticket/transfer',
        method: "POST",
        data: {
            'TicketNo' : ticketno,
            'CategoryID' : newcategory,
            
        },
        
        success: function (data) {
            console.log(data);
            if(data != null){
                $(`#${ticketno}-tab`).parent().remove();
                $(`#content${ticketno}`).remove();
            }
           
        },
        error: function (err) {
            console.log(err.responseText)
        }
    });
}

function escalate(ticketno){

}

function categorychanged(targetShowDiv){
    $('#' + targetShowDiv).show();
}