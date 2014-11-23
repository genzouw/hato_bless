/*
 * navi_on.js
 * ナビゲーション用
 * 
 * version --- 1.0
 */
var path=window.location.href;
if(path.match("about")) {//病院のご案内
	$("#g_area_02").addClass("active");
	if(path.match("index")) {
	}
	else if(path.match("greeting")) {
		$("#l_area_01").addClass("active");
	}
	else if(path.match("policy")) {
		$("#l_area_02").addClass("active");
	}
	else if(path.match("rights")) {
		$("#l_area_03").addClass("active");
	}
	else if(path.match("about/about")) {
		$("#l_area_04").addClass("active");
	}
}
else if(path.match("departments")) {//診療科のご紹介
	$("#g_area_03").addClass("active");
	if(path.match("crs")) {
		$("#l_area_01").addClass("active");
	}
	else if(path.match("gm")) {
		$("#l_area_02").addClass("active");
	}
	else if(path.match("im")) {
		$("#l_area_03").addClass("active");
	}
	else if(path.match("surgery")) {
		$("#l_area_04").addClass("active");
	}
	else if(path.match("urology")) {
		$("#l_area_05").addClass("active");
	}
	else if(path.match("mc")) {
		$("#l_area_06").addClass("active");
	}
	else if(path.match("gc")) {
		$("#l_area_07").addClass("active");
	}
}
else if(path.match("jyushin")) {//受診のご案内
	$("#g_area_04").addClass("active");
	if(path.match("time")) {
		$("#l_area_01").addClass("active");
	}
	else if(path.match("charge")) {
		$("#l_area_02").addClass("active");
	}
	else if(path.match("facility")) {
		$("#l_area_03").addClass("active");
	}
}
else if(path.match("access")) {
	$("#g_area_05").addClass("active");
}
else if(path.match("info")) {
}
else if(path.match("whatsnew")) {
}
else if(path.match("index")) {
	$("#g_area_01").addClass("active");
}
//http://www.gpro.com/hospital/
else if(path=="http://www.click.jp/common/pc_site/"){
	$("#g_area_01").addClass("active");
}
else if(path=="http://www.click.jp/common/pc_site/_test/"){
	$("#g_area_01").addClass("active");
}
else if(path.match("sample_kiji")) {//サンプル用です
	$("#g_area_03").addClass("active");
}