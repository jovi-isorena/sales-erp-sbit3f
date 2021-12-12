
function loadtickets(btnTicket, customerid){
    let targetpanelid = "#accordionPanelsTickets-" + $(btnTicket).attr('data-value');
    if($(targetpanelid).children().length > 0){
        console.log('dont ref');
    }
    // else console.log('ref');
    else{
        
        $.ajax({
            url: '/api/tickets/' + customerid,
            method: "GET",
            success: function (data) {
                // data = JSON.parse(data);
                console.log(data['data']);
                data['data'].forEach(ticket => {
                    // accordionPanelOrders-{{ $ticket->CreatedBy }}-{{ $ticket->TicketNo }}
                    $(targetpanelid).append(addTicketAccordion(ticket));
                
                });
                //$('#highestBid').text(data['Amount']);
                //$('#highestBidder').text(data['UserId']);
                //console.log(highestBid.val(), data['Amount']);
               
            },
            error: function (err) {
                console.log(err.responseText)
            }
        });
    } 

}

function addTicketAccordion(ticket)
{
    console.log('ticket:');
    console.log(ticket);
    let ret = 
    `<div class="accordion-item mb-3">
        <h2 class="accordion-header" id="heading-${ticket['id']}">
        <button class="accordion-button collapsed" 
            type="button" 
            data-bs-toggle="collapse" 
            data-bs-target="#panelbody-${ticket['id']}" 
            aria-expanded="true" 
            aria-controls="panelbody-${ticket['id']}">
            Ticket #${ticket['id']}
            [${ticket['attributes'].TicketStatus}]
        </button>
        </h2>
        <div id="panelbody-${ticket['id']}" 
            class="accordion-collapse collapse" 
            aria-labelledby="heading-${ticket['id']}">
        <div class="accordion-body">
            Concern:<br/> <span class="fw-bold">${ticket['attributes'].Content}</span>
        </div>
        </div>
    </div>` ; 
    return ret;   
}