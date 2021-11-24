function transfer(ticketno){
    let newcategory = $('#newcategory-' + ticketno).val();
    console.log(newcategory);
    $.ajax({
        url: '/api/ticket/transfer',
        method: "POST",
        data: {
            'TicketNo' : ticketno,
            'CategoryID' : newcategory
        },
        success: function (data) {
            console.log(data);
            if(data != null){
                closetab(ticketno);
            }
        },
        error: function (err) {
            console.log(err.responseText)
        }
    });
}

function escalate(ticketno){
    let leaderId = $(`#escalateLeader-${ticketno}`).val();
    let employeeId = $(`#hiddenid`).val();
    console.log(leaderId);
    $.ajax({
        url: '/api/ticket/escalate',
        method: "POST",
        data: {
            'TicketNo' : ticketno,
            'AssignedEmployee' : leaderId,
            'EmployeeID' : employeeId
        },
        success: function (data) {
            if(data != null){
                closetab(ticketno);
            }
        },
        error: function (err) {
            console.log(err.responseText)
        }
    });
    //AssignedDatetime  
    //AssignedEmployee
}

function categorychanged(targetShowDiv){
    $('#' + targetShowDiv).show();
}

function resetEscalate(ticketno){
    let sel = $(`#escalateLeader-${ticketno}`);
    sel.empty();
    sel.append('<option hidden selected>Select new Category</option>');
    $(`#escalateFooter-${ticketno}`).hide();
    
}