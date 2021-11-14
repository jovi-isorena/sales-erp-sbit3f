document.onreadystatechange = function(){
    if(document.readyState == 'complete'){
        setTimeout(5000);
        setInterval(checkDisplayedTickets, 2000);
    }
}

function checkDisplayedTickets(){
    let ticketTabs = $('#pills-tab');
    let userid = $('#hiddenid').val();
    if( userid != null || userid != ''){
        $.ajax({
            url: '/api/countticketsfor/' + userid,
            method: "GET",
            success: function (data) {
                // data = JSON.parse(data);
                let loadedtickets = getCurrentLoadedTickets();
                if(ticketTabs.children().length < data){
                    loadTickets(userid, loadedtickets);
                }
               
            },
            error: function (err) {
                console.log(err.responseText)
            }
        });
    }
}

function getCurrentLoadedTickets(){
    let tickets = $('li button.nav-link')
    tickets = jQuery.map(tickets, function(ticket){
            return $(ticket).attr('id').split('-')[0]
        });
    return tickets;
}

function loadTickets(userid, loadedtickets){
    let ticketTabs = $('#pills-tab');
    let ticketPanels = $('#pills-tabContent');
    $.ajax({
        url: '/api/ticketsfor/' + userid,
        method: "GET",
        success: function (data) {
            data['data'].forEach( ticket => {
                if(!loadedtickets.includes(ticket['id'])){
                    ticketTabs.append(createTicketTabPill(ticket));
                    ticketPanels.append(createTicketTabContent(ticket));

                }
            });
            
        },
        error: function (err) {
            console.log(err.responseText)
        }
    });
}

function createTicketTabPill(ticket){
    let ret = `
        <li class="nav-item mr-3" role="presentation">
            <button class="nav-link btn border" 
                id="${ticket['id']}-tab" data-bs-toggle="tab" 
                data-bs-toggle="pill"
                data-bs-target="#content${ticket['id']}" 
                type="button" role="tab" 
                aria-controls="pills-${ticket['id']}" 
                aria-selected="false">
                    <strong>${ticket['attributes'].Customer['FirstName']}</strong>
                    (<small data-time-source="${ticket['id']}-time" class="timer fst-italic">00:00:00</small>)
                    <input type="hidden" id="${ticket['id']}-time" value="${ticket['attributes'].AssignedDatetime}">
            </button>
        </li>
    `;
    return ret; 

}

function createTicketTabContent(ticket){
    let ret = `
        <div class="tab-pane fade" id="content${ticket['id']}" role="tabpanel" aria-labelledby="${ticket['id']}-tab">
            <div class="card">
                <div class="card-header d-md-flex justify-content-between align-items-center">
                    <span class="card-title align-items-center">
                        <strong>Ticket# ${ticket['id']}</strong>
                    </span>
                    <button type="button" id="close-${ticket['id']}" class="d-none btn-danger rounded align-items-center" aria-label="Close" onclick="closetab('${ticket['id']}')"><i class="fas fa-times"></i></button>
                </div>
                <div class="card-body">
                    <p>Customer Name: ${ticket['attributes'].Customer['FirstName']} ${ticket['attributes'].Customer['MiddleName']} ${ticket['attributes'].Customer['LastName']}</p>
                    <p>Created On: ${ticket['attributes'].CreatedDatetime }</p>
                    <p>Concern:</p>
                    <p>${ticket['attributes'].Content }</p>

                    <div class="mb-3">
                        <button class="btn btn-primary mb-2" type="button" data-bs-toggle="collapse" data-bs-target="#responses-${ticket['id']}" aria-expanded="false" aria-controls="collapseExample" onclick="loadcomment('${ticket['id']}', ${ticket['attributes'].Comments.length})">
                            Responses (${ticket['attributes'].Comments.length})
                        </button>
                        <div class="collapse border border-2 p-2" id="responses-${ticket['id']}" style="max-height:200px;overflow-y:scroll;scroll:auto">
                            
                        </div>
                    </div>
                    
                    <hr>
                    
                    <div class="position-relative">
                        <div class="w-100 position-absolute top-0  d-none justify-content-center align-items-center alert alert-success opacity-75" style="height:100%;z-index:10">
                            <span class="">Response submitted. You may close this window now.</span>
                        </div>    
                        <div class="mb-3">
                            <textarea placeholder="Enter your response here..." class="form-control" name="response-${ticket['id']}" style="height:100px" id="response-${ticket['id']}" onkeyup="revalidateTextArea(this)"></textarea>
                        </div>
                        <div class="d-md-flex justify-content-end">
                            <button type="button" class="btn btn-outline-primary" onclick="submitResponse('${ticket['id']}', this)">Submit</button>
                        </div>
                    </div>
                    

                </div>
                <div class="card-footer">
                    <div>
                        <nav>
                            <div class="nav nav-tabs" id="nav-tab" role="tablist2">
                                <button class="nav-link active" id="nav-custprofile-tab-${ ticket['attributes'].CreatedBy }-${ ticket['id'] }" data-bs-toggle="tab" data-bs-target="#nav-custprofile-${ ticket['attributes'].CreatedBy }-${ ticket['id'] }" type="button" role="tab" aria-controls="nav-custprofile-${ ticket['attributes'].CreatedBy }-${ ticket['id'] }" aria-selected="true">Customer Profile</button>
                                <button class="nav-link" id="nav-custticket-tab-${ ticket['attributes'].CreatedBy }-${ ticket['id'] }" data-bs-toggle="tab" data-bs-target="#nav-custticket-${ ticket['attributes'].CreatedBy }-${ ticket['id'] }" type="button" role="tab" aria-controls="nav-custticket-${ ticket['attributes'].CreatedBy }-${ ticket['id'] }" aria-selected="false" onclick="loadtickets(this,'${ ticket['attributes'].CreatedBy }')" data-value="${ ticket['attributes'].CreatedBy }-${ ticket['id'] }">Tickets</button>
                                <button class="nav-link" id="nav-custorder-tab-${ ticket['attributes'].CreatedBy }-${ ticket['id'] }" data-bs-toggle="tab" data-bs-target="#nav-custorder-${ ticket['attributes'].CreatedBy }-${ ticket['id'] }" type="button" role="tab" aria-controls="nav-custorder-${ ticket['attributes'].CreatedBy }-${ ticket['id'] }" aria-selected="false" onclick="loadorders(this,'${ ticket['attributes'].CreatedBy }')" data-value="${ ticket['attributes'].CreatedBy }-${ ticket['id'] }">Orders</button>
                            </div>
                        </nav>
                        <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="nav-custprofile-${ ticket['attributes'].CreatedBy }-${ ticket['id'] }" role="tabpanel" aria-labelledby="nav-custprofile-tab-${ ticket['attributes'].CreatedBy }-${ ticket['id'] }">
                                <div>First Name:  ${ticket['attributes'].Customer['FirstName']}</div>
                                <div>Middle Name:  ${ticket['attributes'].Customer['MiddleName']}</div>
                                <div>Last Name:  ${ticket['attributes'].Customer['LastName']}</div>
                                <div>Birthdate:  ${ticket['attributes'].Customer['Birthdate']}</div>
                                <div>Mobile:  ${ticket['attributes'].Customer['Mobile']}</div>
                                <div>Email:  ${ticket['attributes'].Customer['Email']}</div>
                                
                            </div>
                            <div class="tab-pane fade" id="nav-custticket-${ ticket['attributes'].CreatedBy }-${ ticket['id'] }" role="tabpanel" aria-labelledby="nav-custticket-tab-${ ticket['attributes'].CreatedBy }-${ ticket['id'] }">
                                <h3>Customer's Tickets</h3>
                                <div class="accordion" id="accordionPanelsTickets-${ ticket['attributes'].CreatedBy }-${ ticket['id'] }">
                                    
                                </div>
                            </div>
                            <div class="tab-pane fade" id="nav-custorder-${ ticket['attributes'].CreatedBy }-${ ticket['id'] }" role="tabpanel" aria-labelledby="nav-custorder-tab-${ ticket['attributes'].CreatedBy }-${ ticket['id'] }">
                                <h3>Orders</h3>
                                <div class="accordion" id="accordionPanelOrders-${ ticket['attributes'].CreatedBy }-${ ticket['id'] }">
                                    
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
                
        </div>
    `;
    return ret;
}