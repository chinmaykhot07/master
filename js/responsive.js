$(document).ready(function(){
	$("a.mobile").click(function() {
		var hide = document.getElementsByClassName("sidebar#nav");
		if(hide.style.display == 'none')
		{
			hide.style.display = 'block';
		}
		else
		{
			hide.style.display = 'none';
		}	
	});
});











