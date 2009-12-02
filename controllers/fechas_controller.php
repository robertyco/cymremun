<?php
class FechasController extends AppController {

	var $name = 'Fechas';
	var $uses = array();
	
	function isAuthorized() {
		return true;
	}
	
	function setFecha(){
		$this->Session->write('fecha', $this->data['ano']['year'].'-'.$this->data['mes']['month'].'-00');
		$this->Session->write('mes', $this->data['mes']['month']);
		$this->Session->write('ano', $this->data['ano']['year']);
		$this->redirect($this->referer());
	}
}
?>