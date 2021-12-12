function changeStatus(sel){
        let newStatus = $(sel).val();
        console.log(newStatus);
        let empid = $("#hiddenid").val();
        console.log(empid);
        

        $.ajax({
            url: '/api/queue/enqueue',
            method: "POST",
            data: {
                'EmployeeID' : empid,
                'status' :newStatus
            },
            success: function (data) {
                console.log(data);
                $('#statustimer').val(data['data'].attributes['EnqueueTime'])
                console.log("I love you mahal!");
                
            },
            error: function (err) {
                console.log(err.responseText);
            }
        });
}