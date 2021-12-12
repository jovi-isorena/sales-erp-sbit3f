document.onreadystatechange = function(){
    if(document.readyState == 'complete'){
        // setTimeout(5000);
        setInterval(checkDisplayedTickets, 3000);
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
            <button class="nav-link btn border rounded-pill custom-border-primary shadow-sm" 
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
    createCategorySelectList(ticket['id'], ticket['attributes'].AssignedTeam);
    let transferDiv = '';
    if($('#hiddenpositionid').val() == 7){
        transferDiv = `
            <div id="transferDiv-${ticket['id']}">
                <button type="button" class="btn custom-btn-primary rounded-pill" id="transfer-${ticket['id']}" data-bs-toggle="modal" data-bs-target="#transferModal-${ticket['id']}">Transfer</button>
                <div class="modal fade" id="transferModal-${ticket['id']}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Transferring Ticket# ${ticket['id']}</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                Choose new category:
                                <select onchange="categorychanged('transferFooter-${ticket['id']}')" id="newcategory-${ticket['id']}" class="custom-select">
                                    <option hidden selected>Select new Category</option>
                                    
                                </select>
                            </div>
                            <div class="modal-footer" style="display:none" id="transferFooter-${ticket['id']}">
                                <button type="button" class="btn btn-primary" onclick="transfer('${ticket['id']}')" data-bs-dismiss="modal">Transfer</button>
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            </div>
                        </div>
                    </div>
                </div>
                <button type="button" class="btn custom-btn-primary rounded-pill" id="escalate-${ticket['id']}" data-bs-toggle="modal" data-bs-target="#escalateModal-${ticket['id']}" onclick=loadleaders('escalateLeader-${ticket['id']}')>Escalate</button>
                <div class="modal fade" id="escalateModal-${ticket['id']}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Escalating Ticket# ${ticket['id']}</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" onclick=resetEscalate('${ticket['id']}')></button>
                            </div>
                            <div class="modal-body">
                                Select a Leader:
                                <select onchange="categorychanged('escalateFooter-${ticket['id']}')" id="escalateLeader-${ticket['id']}" class="custom-select">
                                    <option hidden selected>Select Leader</option>
                                    
                                </select>
                            </div>
                            <div class="modal-footer" style="display:none" id="escalateFooter-${ticket['id']}">
                                <button type="button" class="btn btn-primary" onclick="escalate('${ticket['id']}')" data-bs-dismiss="modal">Escalate</button>
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" onclick=resetEscalate('${ticket['id']}')>Cancel</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        `;
    }
    let ret = `
        <div class="tab-pane fade pb-3" id="content${ticket['id']}" role="tabpanel" aria-labelledby="${ticket['id']}-tab">
            <div class="card custom-shadow">
                <div class="card-header d-md-flex justify-content-between align-items-center">
                    <span class="card-title align-items-center">
                        <strong>Ticket# ${ticket['id']}</strong>
                    </span>
                    ${transferDiv}
                    <div id="closeDiv-${ticket['id']}" style="display:none">
                        <button type="button"  class=" btn-danger rounded align-items-center" aria-label="Close" onclick="closetab('${ticket['id']}')"><i class="fas fa-times"></i></button>
                    </div>
                </div>
                <div class="card-body">
                    <p>Customer Name: ${ticket['attributes'].Customer['FirstName']} ${ticket['attributes'].Customer['MiddleName']} ${ticket['attributes'].Customer['LastName']}</p>
                    <p>Created On: ${ticket['attributes'].CreatedDatetime }</p>
                    <p>Concern:</p>
                    <p>${ticket['attributes'].Content }</p>

                    <div class="mb-3">
                        <button class="btn custom-btn-primary mb-2" type="button" data-bs-toggle="collapse" data-bs-target="#responses-${ticket['id']}" aria-expanded="false" aria-controls="collapseExample" onclick="loadcomment('${ticket['id']}', ${ticket['attributes'].Comments.length})">
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
                            <button type="button" class="btn custom-btn-secondary" onclick="submitResponse('${ticket['id']}', this)">Submit</button>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div>
                        <nav class='pb-3'>
                            <div class="nav nav-tabs" id="nav-tab" role="tablist2">
                                <button class="nav-link active rounded-pill" id="nav-custprofile-tab-${ ticket['attributes'].CreatedBy }-${ ticket['id'] }" data-bs-toggle="tab" data-bs-target="#nav-custprofile-${ ticket['attributes'].CreatedBy }-${ ticket['id'] }" type="button" role="tab" aria-controls="nav-custprofile-${ ticket['attributes'].CreatedBy }-${ ticket['id'] }" aria-selected="true">Customer Profile</button>
                                <button class="nav-link rounded-pill" id="nav-custticket-tab-${ ticket['attributes'].CreatedBy }-${ ticket['id'] }" data-bs-toggle="tab" data-bs-target="#nav-custticket-${ ticket['attributes'].CreatedBy }-${ ticket['id'] }" type="button" role="tab" aria-controls="nav-custticket-${ ticket['attributes'].CreatedBy }-${ ticket['id'] }" aria-selected="false" onclick="loadtickets(this,'${ ticket['attributes'].CreatedBy }')" data-value="${ ticket['attributes'].CreatedBy }-${ ticket['id'] }">Tickets</button>
                                <button class="nav-link rounded-pill" id="nav-custorder-tab-${ ticket['attributes'].CreatedBy }-${ ticket['id'] }" data-bs-toggle="tab" data-bs-target="#nav-custorder-${ ticket['attributes'].CreatedBy }-${ ticket['id'] }" type="button" role="tab" aria-controls="nav-custorder-${ ticket['attributes'].CreatedBy }-${ ticket['id'] }" aria-selected="false" onclick="loadorders(this,'${ ticket['attributes'].CreatedBy }')" data-value="${ ticket['attributes'].CreatedBy }-${ ticket['id'] }">Orders</button>
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
                                <div>
                                    <h5>Customer Satisfaction</h3>
                                    <table class='table border w-25'>
                                        
                                        <tbody>
                                            <tr>
                                                <td scope='row'>CSAT 1</td>
                                                <td>3.5</td>
                                            </tr>
                                            <tr>
                                                <td scope='row'>CSAT 2</td>
                                                <td>4.0</td>
                                            </tr>
                                            <tr>
                                                <td scope='row'>NPS</td>
                                                <td>3.85</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
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


function createCategorySelectList(ticketno, currentTeam){
    // let newcategories = [];
    $.ajax({
        url: '/api/categories' ,
        method: "GET",
        success: function (data) {
            data['data'].map( category => {
                if(category['attributes'].AssignedTeam != currentTeam){
                    $('#newcategory-' + ticketno).append(`<option value=${category['id']}>[${category['attributes'].AssignedTeamName}] ${category['attributes'].Name}</option>`);
                    // console.log(category);
                }
            });
        },
        error: function (err) {
            console.log(err.responseText)
        }
    });


}