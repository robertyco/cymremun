$.validator.addMethod("rut", function(value, element) {
  return this.optional(element) || $.Rut.validar(value);
}, "Este campo debe ser un rut valido.");

$(document).ready(function(){
	$("#EmpresaAddForm").validate();
	$("#EmpresaEditForm").validate();
	$("#EmpleadoAddForm").validate();
	$("#EmpleadoEditForm").validate();
	$("#UserAddForm").validate({
		rules: {
			"data[User][username]": "required",
			"data[User][password]": "required",
			"data[User][password_confirm]": {
				equalTo: "#UserPassword"
			},
			"data[User][email]": "email"
		}
	});
	$("#UserEditForm").validate({
		rules: {
			"data[User][username]": "required",
			"data[User][password]": "required",
			"data[User][password_confirm]": {
				equalTo: "#UserPassword"
			},
			"data[User][email]": "email"
		}
	});
	$("#HaberesDescuentoAddHaberEmpresaForm").validate({
		rules: {
			"data[HaberesDescuento][nombre]": "required"
		}
	});	
	$("#HaberesDescuentoAddDescuentoEmpresaForm").validate({
		rules: {
			"data[HaberesDescuento][nombre]": "required"
		}
	});	
	$("#HaberesDescuentoEditDescuentoEmpresaForm").validate({
		rules: {
			"data[HaberesDescuento][nombre]": "required"
		}
	}); 	
	$("#EmpleadosHaberesDescuentoAddHdEmpleadoFormForm").validate({
		rules: {
			"data[HaberesDescuento][nombre]": "required"
		}
	});
	$("#AsignacionFamiliarEditForm").validate();
	$("#ImpuestoUnicoEditForm").validate();
	$("#UfAddForm").validate();
	$("#UfEditForm").validate();
});