$(document).ready(function() {
	//tutaj wstawiamy kod JQuery, który zostanie uruchomiony
	//jak tylko dokument będzie gotowy do manipulowania jego elementami
	/**
		Własne metody do walidacji
	**/	
	$.validator.addMethod('stringType', function (value, element) {
		return /^[A-Za-z]+$/.test(value);
		}, 'To pole wymaga tylko liter!');
  
  	$.validator.addMethod('numberType', function (value, element) {
		return /^[0-9]+$/.test(value);
		}, 'Tutaj poprosze tylko cyferki!!!!');
		
    $('#loadOrdForm').validate({
		//reguły dla pola formularza
        rules: {
			//atrybut name: {reguły}
			clientId: {
				//reguły - kolejność ma znaczenia
                required: true			
            },
            moverId: {
				//reguły - kolejność ma znaczenia
                required: true			
            },
            inclusivePrice: {
				//reguły - kolejność ma znaczenia
                required: true,
                numberType: true,
                minlength: 1,
                maxlength: 10
            },
            note: {
                required: false,
                maxlength: 50
            }
        },
		//komunikaty dla pola formularza
		messages: {
            clientId: {
				required: 'Pole wymagane'		
            },
            moverId: {
				required: 'Pole wymagane'			
            },
            inclusivePrice: {
				required: 'Pole wymagane',
				minlength: jQuery.validator.format("Pole musi zawierać minimum {0} znaki!"),
				maxlength: jQuery.validator.format("Pole musi zawierać maksimum {0} znaki!")
            },
            note: {
				maxlength: jQuery.validator.format("Pole musi zawierać maksimum {0} znaki!")
            }
		},			
        highlight: function(element, errorClass, validClass) {
            $(element).closest('.form-group').addClass(errorClass).removeClass(validClass);
        },
        unhighlight: function(element, errorClass, validClass) {
            $(element).closest('.form-group').removeClass(errorClass).addClass(validClass);
        },
        errorClass: 'has-error',
		validClass: 'has-success',
		//umiejscowienie elementu z błędem
        errorPlacement: function(error, element) {
            if(element.parent('.input-group').length) {
                error.insertAfter(element.parent());
            } else {
                error.insertAfter(element);
            }
        },
		/**
			niestadardowa rekacja na kliknięcie submit,
			gdy są błędy,
			blokuje standradową akcję
		**/
		invalidHandler: function(event, validator) {
			// 'this' to referencja do form
			var errors = validator.numberOfInvalids();
			if (errors) {
			  var message = errors == 1
				? 'Nie wypełniono poprawnie 1 pola. Zostało podświetlone'
				: 'Nie wypełniono poprawnie ' + errors + ' pól. Zostały podświetlone';
			  $("div.alert-danger").html(message);
			  $("div.alert-danger").show();
			} else {
			  $("div.alert-danger").hide();
			}
		},
	});
});