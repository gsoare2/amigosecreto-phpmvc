$(document).ready(function(){
	$("#btnSalvar").attr("disabled", true);
	$("#txtNome").change(function(){
		ValidarFormulario();
	});
	$("#txtEmail").change(function(){
		ValidarFormulario();
  });
});

function ValidarFormulario(){
	var name = $("#txtNome").val();
	var email = $("#txtEmail").val();
	var regex = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

	if((name != "" && regex.test(email))){
		$("#btnSalvar").attr("disabled", false);
	}else{
		$("#btnSalvar").attr("disabled", true);
	}
}
