/*
 * roll_over_v2.js
 * 画像ロールオーバー
 * 
 * version --- 1.0
 */
 
$(function(){
    $("img.imgover").mouseover(function(){
    	if(!$(this).attr("src").match("_cr"))
    	{
        $(this).attr("src",$(this).attr("src").replace(/^(.+)(\.[a-z]+)$/, "$1_cr$2"));
        }
    }).mouseout(function(){
        $(this).attr("src",$(this).attr("src").replace(/^(.+)_cr(\.[a-z]+)$/, "$1$2"));
    })

})
