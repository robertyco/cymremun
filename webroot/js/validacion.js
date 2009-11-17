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
});