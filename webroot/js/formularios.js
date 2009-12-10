function bloqEmpresa(){
	if (document.getElementById('UserTipo').value != 'consultor') {
		document.getElementById('UserEmpresaId').disabled = true;
		document.getElementById('UserEmpresaId').value = '';
	} else {
		document.getElementById('UserEmpresaId').disabled = false;
	}
}