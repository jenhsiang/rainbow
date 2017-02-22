$(document).ready(function() {
	//延遲增加class
	$("#info-text-container").click(function(){
	    setTimeout(function(){
	       $("#info-text").addClass("info-text-active");
	   }, 500);
	});
});
