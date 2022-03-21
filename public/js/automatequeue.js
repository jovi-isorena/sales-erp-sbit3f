document.onreadystatechange = function(){
    if(document.readyState == 'complete'){
        
        // setInterval(checkQueue, 2000);
        // setTimeout(1000);
        checkQueue();
        setInterval(refreshQueue, 2000);
    }
}

function checkQueue(){
    let switches = document.querySelectorAll('.switch');
    // console.log(switches);
    switches.forEach(sw => {
        if(sw.checked){
            // console.log(sw.value);
            $.ajax({
                url: '/api/assignTicket',
                method: "POST",
                data: {
                    'team' : sw.value  
                },
                success: function (data) {
                    console.log(data);
                    checkQueue();
                },
                error: function (err) {
                    console.log(err.responseText);
                    checkQueue();
                }
            });
        }
        let btn = $($(sw).attr('data-bs-toggle'));
        $(btn).attr('disabled', sw.checked);
    });
}

function assignSingleTicket(teamid){
    $.ajax({
        url: '/api/assignTicket',
        method: "POST",
        data: {
            'team' : teamid  
        },
        success: function (data) {
            console.log(data);
        },
        error: function (err) {
            console.log(err.responseText);
        }
    });

}

function refreshQueue(){
    $.ajax({
        url: '/api/queue',
        method: 'GET',
        success: function(data){
            refreshEmployeeComponents(data['data']);
        },
        error: function(err){
            console.log(err.responseText);
        }
    });
    $.ajax({
        url: '/api/ticketsqueue',
        method: 'GET',
        success: function(data){
            refreshTicketCount(data['data']);
        },
        error: function(err){
            console.log(err.responseText);
        }
    });
}

function refreshEmployeeComponents(data){
    $('.repQueueBox ').each(function(index, queueBox){
        let vis = false;
        $(data).each(function(index,employeeData){
            if(employeeData['attributes'].EmployeeID == $(queueBox).attr('id')){
                vis = true;
            }
        });
        if(!vis){
            $(queueBox).hide();
        }
    });
    $(data).each(function(index,employeeData){
        let employeeID = employeeData['attributes'].EmployeeID;
        $(`#${employeeID} span.ticketCount`).text(employeeData['attributes'].ActiveTickets);
        $(`#${employeeID} span.onlineStatus`).text(employeeData['attributes'].OnlineStatus);
        console.log(employeeData['attributes'].OnlineStatus);
        if(employeeData['attributes'].OnlineStatus == '' || employeeData['attributes'].OnlineStatus == null){
            $(`#${employeeID}`).hide();
        }else{
            $(`#${employeeID}`).show();
            if(employeeData['attributes'].OnlineStatus == 'Active' ){
                $(`#${employeeID}`).removeClass('bg-danger');
                $(`#${employeeID}`).addClass('bg-success');
            }else{
                $(`#${employeeID}`).removeClass('bg-success');
                $(`#${employeeID}`).addClass('bg-danger');
            }
        }
    });
}

function refreshTicketCount(data){
    //get all team component
    let teamComponents = $('.teamQueue');
    teamComponents.each(function(index, team){
        //segregate data based on team
        let teamTicket = data.filter(ticket => { return ticket['attributes'].AssignedTeam == $(team).attr('id')});
        //update count
        $(team).find('span.ticketOnQueue').text(teamTicket.length);
    });
}