<?php
class ActividadsController extends AppController {

	var $name = 'Actividads';
	var $uses = array('Actividad');
	
    function isAuthorized() {
        return true;
    }

}
?>