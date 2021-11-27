document.onreadystatechange = function(){
    if(document.readyState == 'complete'){
        fillChart("csat1chart", "CSAT 1", "Customer Overall Satisfaction");
        fillChart("csat2chart", "CSAT 2", "Representative Performance Satisfaction");
        fillChart("npschart", "NPS", "Net Promoter Score");
        fillChart("handledchart", "Handled Tickets", "No. of responded tickets");
    }
}

function fillChart(canvasId,title,subtitle,data){
    const ctx = $(`#${canvasId}`);
    const myChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
            datasets: [{
                label: '',
                data: [12, 19, 3, 5, 2, 3],
                fill: false,
                borderColor: 'rgb(0,69,139)',
                tension: 0.1,
                pointStyle: 'rectRounded'   
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            },
            plugins: {
                title: {
                    display: true,
                    text: title,
                },
                subtitle: {
                    display: true,
                    text: subtitle,
                    color: 'blue',
                }
            }
        }
    });
}
