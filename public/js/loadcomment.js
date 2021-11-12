function loadcomment(ticketno, numComment){
    let responses = $('#responses-'+ticketno);
    let loadedresponses = $(responses).children().length;
    console.log(responses);
    if(numComment == 0 && loadedresponses == 0){
        responses.append(nullCommentDiv());
    }
    else if(loadedresponses < numComment){
        $.ajax({
            url: '/api/commentsforticket/' + ticketno,
            method: "GET",
            success: function (data) {
                console.log(data);
                data['data'].forEach( comment => {
                    responses.append(createCommentDiv(comment));
                });
            },
            error: function (err) {
                console.log(err.responseText)
            }
        });
    }
    
}
function nullCommentDiv(){
    let ret = `
        <div class="mb-3 text-center">
            <p class="fs-italic">No response yet.</p>
        </div>
    `;
    return ret;
}

function createCommentDiv(comment){
    let headerName;
    if(comment['attributes'].FromRep == 1){
        headerName = `Representative (${comment['attributes'].ReplyingRepId}) ${comment['attributes'].Employee['FirstName']}`;
    }else{
        headerName = "Customer";
    }
    let ret = `
    <div class="mb-3">
        <p class="fw-bold">${headerName} said on ${comment['attributes'].CreatedDatetime}</p>
        <p> ${comment['attributes'].Content}</p>
    </div>
    
    `;
    return ret;
}