$(document).ready(function(){
	/* 開閉 */
	$(".opTitle").click(function(){
		if($("+.opDatail" , this).css("display") == "none"){
			$(this).addClass("active");
			$("+.opDatail" , this).slideToggle("fast");
		}
		else{
			$(this).removeClass("active");
			$("+.opDatail" , this).slideToggle("fast");
		}
	});
	
	/* すべて開く */
	/*
	$(".openAllBtn").click(function(){
		$(".opTitle").addClass("active");
		$(".opDatail").show();
	});
	*/
	
	/* すべて閉じる */
	/*
	$(".closeAllBtn").click(function(){
		$(".opTitle").removeClass("active");
		$(".opDatail").hide();
	});
	*/
});