

//get timers
//for each timer compute
//get assigned time
//subtract now from assigned time
//print difference
function time() {
    let timers = document.querySelectorAll(".timer");
    timers.forEach( timer => {
        let startDateTime = document.getElementById(timer.getAttribute('data-time-source')).value;
        let time = new Date(startDateTime);
        let nowTime = new Date();
        let distance = nowTime - time;
        let hour = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
		let min = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
		let sec = Math.floor((distance % (1000 * 60)) / 1000);
        timer.innerText = "" + hour.toString().padStart(2, '0') + ":" + min.toString().padStart(2, '0') + ":" + sec.toString().padStart(2, '0');
    });
    //set date and time here---------------------
    
		
		
}


var osvezi = setInterval(time, 1000);