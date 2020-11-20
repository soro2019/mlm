$(function() {
	let table = $('.filtereringT tbody');
	$(table).html('');
	 $('.transactionstory_filter_btn').click(function(e) {
	 	console.log('okokok')
	 	if($('.transactionstory_type').val() == '') {
	 		return;
	 	}
	 	$.ajax({
	 		url: "filter",
	 		dataType: 'JSON',
	 		method: 'GET',
	 		data: {date: $('.transactionstory_mounth').val(), typeop: $('.transactionstory_type').val(), pseudrecv: $('.transactionstory_pseudo_r').val()},
	 		brforeSend: function() {},
	 		success: function(response) {
	 			let table = $('.filtereringT tbody');
	 			let skeleton= '';
	 			if(response.length > 0) {
	 				response.forEach(elet => {
	 				skeleton+= `<tr>
							  <td>${elet.id}</td>
							  <td>${elet.typeoperation}</td>
							  <td>${elet.montant} $</td>
							  <td>${elet.motif_oprt}</td>
							  <td>${elet.dateopration}</td>
							  <td>${elet.pseudo_receveur | 'masterur'}</td>
							  <td>${elet.mois_annee}</td>
							</tr>`;
	 					})
	 				$(table).html(skeleton);
	 			}else{
	 				let tableError = `<tr>
							  <td colspan="7"> Aucune donnee trouvee !</td>
							</tr>`;
	 			$(table).html(tableError);

	 			}
	 		},
	 		error: function() {
	 			console.log('une erreur est survenue !')
	 		}
	 	})
	 })
})