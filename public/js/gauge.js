$(document).ready(function(){
	var decrease = 0 
	var increase = 0 
	$('.gauge-container').each(function(){
		clearInterval(decrease)
		increase = setInterval(animateGauge ,10, this, increase+1)
		console.log($(this).find('.score').attr('data-value'));
	});

});

function animateGauge(gauge, increase){
	var current =  Number($(gauge).find('.score').attr('data-current'));
	var value = Number($(gauge).find('.score').attr('data-value'));
	var maxVal = Number($(gauge).find('.score').attr('data-max'));
	var interval = Number($(gauge).find('.score').attr('data-interval'));
	if (current<value){
		var percentage = current / maxVal;
		if(percentage > 1) percentage = 1;
		current += (interval*9) 
		if(current > value) current = value;
		$(gauge).find('.score').attr('data-current', (current ));
		$(gauge).find('.gauge-c').css('transform',`rotate(${ percentage * 0.5}turn)`);
		$(gauge).find('.score').text((current).toFixed(2));		
			
	}//close if
	else {
		clearInterval(increase);	
		return;
	}
}