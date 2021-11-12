function submitResponse(ticketno){
    // e.target.preventDefault();
    let responseText = $('#response-'+ticketno);
    console.log(responseText);
    if(responseText.val() == null || responseText.val() == ''){
        responseText.addClass('is-invalid')
        responseText.removeClass('is-valid')
    }
    else{
        responseText.removeClass('is-invalid')
        responseText.addClass('is-valid')
    }
}