function closetab(ticketno){
    $(`#${ticketno}-tab`).parent().remove();
    $(`#content${ticketno}`).remove();


}