<?php
class CompensacionsController extends AppController {

	var $name = 'Compensacions';
	var $uses = array('Compensacion');
	
    function isAuthorized() {
        return true;
    }

}
?>