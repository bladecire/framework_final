  $( document ).ready(function() {
    var vista = $("#contenedor").attr('attr');

    switch(vista){
    	case 'home':
    	$("#contenedor[attr='home']").html("Esto es el home");
    	break;

    	case 'reg':
    	$("#contenedor[attr='reg']").html("Esto es el reg");
    	break;

    	case 'insertar':
    	$("#contenedor[attr='insert']").html("Esto es el insert");
    	break;

    }

  });
// $this->ajax_set(array('redirect'=>APP_W.'dashboard'));

// JS Normal

