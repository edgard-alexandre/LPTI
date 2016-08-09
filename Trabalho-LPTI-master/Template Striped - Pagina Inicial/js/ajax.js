$(document).ready(function(e){
	$("#nav a").click(function(e){
		e.preventDefault();
		var href=$(this).attr("href");
		$(".conteudo").load(href + " .conteudo");
	});
});
