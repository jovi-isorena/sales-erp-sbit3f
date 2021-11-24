function loadleaders(selectElemId){
    let selectElem = $(`#${selectElemId}`);
    let teamId = $('#hiddenteamid').val();
    $.ajax({
        url: '/api/leaders/' + teamId,
        method: "GET",
        success: function (data) {
            let leaders = data['data'];
            console.log(leaders);
            $.each(leaders, function(index,leader){
                console.log(leader);
                selectElem.append(`<option value=${leader['id']}>${leader['attributes'].FirstName} ${leader['attributes'].LastName}</option>`)
            });
           
        },
        error: function (err) {
            console.log(err.responseText)
        }
    });
}