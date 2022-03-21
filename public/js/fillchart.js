document.onreadystatechange = function(){
    let testdata = [4.9,3.7,3.5,2.43,2.22,3.12,3.44,4.55,5.0,4.75,4.14,4.23,4.17];
    let testdata1 = [3.9,3.7,3.5,2.9,3.1,3.12,3.44,3.12,4.5,4.26,4.07,3.4,4.43];
    let testdata2 = [4.47,3.8,4.1,4.42,4.38,4.49,3.5,4.23,4.73,4.59,4.07,3.45,4.17];
    let testdata3 = [4.5,3.3,3.1,2.13,2.72,3.15,3.56,4.99,4.67,4.75,3.9,4.23,4.0];
    if(document.readyState == 'complete'){
        fillChart("csat1chart", "CSAT 1", "Customer Overall Satisfaction", testdata);
        fillChart("csat2chart", "CSAT 2", "Representative Performance Satisfaction",testdata1);
        fillChart("npschart", "NPS", "Net Promoter Score",testdata2);
        fillChart("handledchart", "Handled Tickets", "No. of responded tickets",testdata);
    }
}

function fillChart(canvasId,title,subtitle,chartdata){
    const ctx = $(`#${canvasId}`);
    const myChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: ['12/01', '12/02', '12/03', '12/04', '12/05', '12/06', '12/07', '12/08', '12/09', '12/10', '12/11','12/12','12/13'],
            datasets: [{
                label: '',
                data: chartdata,
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
