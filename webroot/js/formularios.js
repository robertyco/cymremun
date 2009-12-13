function bloqEmpresa(){
	if (document.getElementById('UserTipo').value != 'consultor') {
		document.getElementById('UserEmpresaId').disabled = true;
		document.getElementById('UserEmpresaId').value = '';
	} else {
		document.getElementById('UserEmpresaId').disabled = false;
	}
}
function bloqApv(){
	if (document.getElementById('PrevisionAfpId').value == '16') {
		document.getElementById('PrevisionApv').disabled = true;
		document.getElementById('PrevisionApvMonto').disabled = true;
		document.getElementById('PrevisionApvMonto').value = '';
	} else {
		document.getElementById('PrevisionApv').disabled = false;
		document.getElementById('PrevisionApvMonto').disabled = false;
	}
}
function bloqApvMonto(){
	if (document.getElementById('PrevisionApv').value == 'N') {
		document.getElementById('PrevisionApvMonto').disabled = true;
		document.getElementById('PrevisionApvMonto').value = '';
	} else {
		document.getElementById('PrevisionApvMonto').disabled = false;
	}
}
function bloqSalud(){
	if (document.getElementById('SaludIsapreId').value == '1') {
		document.getElementById('SaludValorPlan').disabled = true;
		document.getElementById('SaludValorPlan').value = '';
		document.getElementById('SaludValorTipo').disabled = true;
	} else {
		document.getElementById('SaludValorPlan').disabled = false;
		document.getElementById('SaludValorTipo').disabled = false;
	}
}
function bloqRepLegal(){
	if (document.getElementById('EmpresaRepLegal').value == 'N') {
		document.getElementById('EmpresaRepLegalRut').disabled = true;
		document.getElementById('EmpresaRepLegalRut').value = '';
		document.getElementById('EmpresaRepLegalNombre').disabled = true;
		document.getElementById('EmpresaRepLegalNombre').value = '';
	} else {
		document.getElementById('EmpresaRepLegalRut').disabled = false;
		document.getElementById('EmpresaRepLegalNombre').disabled = false;
	}
}