(function(){
	
	
	function get(url, nome){
		// $.ajax({
		// 	url:"cadastro.php",
		// 	method:"POST",
		// 	data: {nome: 'nome'},
		// 	success:function(data) {
		// 	console.log(data);
		// 	}
		// })
		// const form = new FormData(document.getElementById('nome'));

		return fetch(url, {
			method:'post',
			// body:{form: nome}
			})
		}

	console.log("PRIMEIRO TESTE");
	const form = document.querySelector('#form_cadastro');
	let nome = document.getElementById('nome').value;

	form.addEventListener('submit', function(event) {
		event.preventDefault();

		//$('#form_action').attr('disabled', 'disabled');
		const form_data = $(this).serialize();

		//console.log(form_data);

		console.log("id" +  " = " + nome);

		const request_uri = location.pathname + location.search;
		console.log(request_uri);



		get(`cadastro.php`, nome)
		.then(response => {console.log(response.json)})
		.then(data => {console.log(data)})
		.catch(err => console.log(err))
	})



	$('#insert').click(function(){
		const nome = $('#nome').val();

	//	console.log($('#action').val('nome'))


})

})(document);