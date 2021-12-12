
function loadorders(btnOrder, customerid){
    let targetpanelid = "#accordionPanelOrders-" + $(btnOrder).attr('data-value');
    if($(targetpanelid).children().length > 0){
        console.log('dont ref');
    }
    // else console.log('ref');
    else{
        
        $.ajax({
            url: '/api/orders/' + customerid,
            method: "GET",
            success: function (data) {
                // data = JSON.parse(data);
                console.log(data['data']);
                data['data'].forEach(order => {
                    // accordionPanelOrders-{{ $ticket->CreatedBy }}-{{ $ticket->TicketNo }}
                    $(targetpanelid).append(addOrderAccordion(order));
                
                });
               
            },
            error: function (err) {
                console.log(err.responseText)
            }
        });
    } 

}

function addOrderAccordion(order)
{
    console.log('order:');
    console.log(order);
    let orderlist = '';
    order['attributes'].OrderDetails.forEach(item => {
        orderlist += `<tr><th>${item['ProductID']}</th><th>${item['Product'].Name}</th><th>${item['Quantity']}</th></tr>`;

    });
    let ret = 
    `<div class="accordion-item mb-3">
        <h2 class="accordion-header" id="heading-${order['id']}">
        <button class="accordion-button collapsed" 
            type="button" 
            data-bs-toggle="collapse" 
            data-bs-target="#panelbody-${order['id']}" 
            aria-expanded="true" 
            aria-controls="panelbody-${order['id']}">
            Order #${order['id']}
            [${order['attributes'].OrderStatus}]
        </button>
        </h2>
        <div id="panelbody-${order['id']}" 
            class="accordion-collapse collapse" 
            aria-labelledby="heading-${order['id']}">
        <div class="accordion-body">
            Ordered Date: ${order['attributes'].OrderedDate}
            <br>
            Shipping Address: ${order['attributes'].ShippingAddress}
            <br>
            Amount: ${order['attributes'].TotalAmount}
            <div>
                <table class='table'>
                    <thead class='custom-bg-secondary'>
                        <tr>
                            <th>Product ID</th>
                            <th>Name</th>
                            <th>Quantity</th>
                        </tr>
                    </thead>
                    <tbody>
                        ${orderlist}
                    </tbody>
                </table>
            </div>
        </div>
        </div>
    </div>` ; 
    return ret;   
}