$(function(){
	//Pesquisar os cursos sem refresh na página
	$("#buscar").keyup(function(){
		
		var pesquisa = $(this).val();
		
		//Verificar se há algo digitado
		if(pesquisa != null){
			var dados = {
				os : pesquisa
			}		
			$.post('lista_garantias.php', dados, function(retorna){
				//Mostra dentro da ul os resultado obtidos 
				$("#resultado").html(retorna);
			});
		}else{
			$("#resultado").html(os);
		}		
	});
});







