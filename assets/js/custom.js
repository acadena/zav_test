var list_table;

$( document ).ready( function(){

	$( "#add_visit" ).on( "click", function(){

		$( "#visit_id" ).val( "" );
		$( "#mode_form" ).val( "insert" );

		$( "#user_name" ).val("");
		$( "#user_email" ).val(""); 
		$( "#user_phone" ).val(""); 
		$( "#subject" ).val("");
		$( "#comment" ).val("");

		$( ".add_form_content" ).show();

	} )

	$( "#add_form" ).on( "submit", function(){

		if( !validateForm( ) )
			return false;

		$.post( site_url + "visits/add_process", { 
			id: $( "#visit_id" ).val(),
			mode_form: $( "#mode_form" ).val(),
			user_name: $( "#user_name" ).val(), 
			user_email: $( "#user_email" ).val(), 
			user_phone: $( "#user_phone" ).val(), 
			subject: $( "#subject" ).val(), 
			comment: $( "#comment" ).val()  }, function( data ){

			if( data.result == "success" ){

				$( "#user_name" ).val("");
				$( "#user_email" ).val(""); 
				$( "#user_phone" ).val(""); 
				$( "#subject" ).val("");
				$( "#comment" ).val("");				

				alert( "Visita guardada!" );

				$( ".add_form_content" ).hide();
				list_table.ajax.reload();

			}

		}, "json" )

		return false;

	} )

	list_table = $('#visits-list').DataTable({
    	ajax:  site_url + "visits/list_process"
    });

} )

function validateEmail(email) {
    var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(String(email).toLowerCase());
}

function validateForm(){

	if( $( "#user_name" ).val() == "" ){
		alert( "Por favor ingrese nombre" );
		$( "#user_name" ).focus();
		return false;
	}

	if( !validateEmail( $( "#user_email" ).val() ) ){
		alert( "Por favor ingrese email valido" );
		$( "#user_email" ).focus();
		return false;
	}

	phone = $( "#user_phone" ).val();

	if( phone == "" || phone.length < 10 ){
		alert( "Por favor ingrese teléfono, minimo de 10 numeros" );
		$( "#user_phone" ).focus();
		return false;
	}

	if( $( "#subject" ).val() == "" ){
		alert( "Por favor seleccione motivo visita" );
		$( "#subject" ).focus();
		return false;
	}

	return true;

}

function edit( id ){

	$( "#visit_id" ).val( id );
	$( "#mode_form" ).val( "edit" );

	$.post( site_url + "visits/edit", { id: id }, function(data){

		$( "#user_name" ).val( data[0].name );
		$( "#user_email" ).val( data[0].email ); 
		$( "#user_phone" ).val( data[0].phone ); 
		$( "#subject" ).val( data[0].subject );
		$( "#comment" ).val( data[0].comment );

		$( ".add_form_content" ).show();

	}, "json" )

}

function remove(id){

	if( confirm( "Eliminar seleccion?" ) ){

		$.post( site_url + "visits/delete_process", { id: id }, function( data ){

			list_table.ajax.reload();

		}, "json" )

	}

}