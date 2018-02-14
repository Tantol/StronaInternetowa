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
		
    $('#clientForm').validate({
		//reguły dla pola formularza
        rules: {
			//atrybut name: {reguły}
			fristName: {
				//reguły - kolejność ma znaczenia
                required: true,
				stringType: true,
				minlength: 2,
				maxlength: 30				
            },
            lastName: {
				//reguły - kolejność ma znaczenia
                required: true,
				stringType: true,
				minlength: 2,
				maxlength: 40				
            },
            PIN: {
				//reguły - kolejność ma znaczenia
                required: true,
				numberType: true,
				minlength: 11,
				maxlength: 11				
            },
            addressId: {
				//reguły - kolejność ma znaczenia
                required: true			
            },
            contactDetailsId: {
				//reguły - kolejność ma znaczenia
                required: true				
            }
        },
		//komunikaty dla pola formularza
		messages: {
            fristName: {
				required: 'Pole wymagane',
				minlength: jQuery.validator.format("Pole musi zawierać minimum {0} znaki!"),
				maxlength: jQuery.validator.format("Pole musi zawierać maksimum {0} znaki!")			
            },
            lastName: {
				required: 'Pole wymagane',
				minlength: jQuery.validator.format("Pole musi zawierać minimum {0} znaki!"),
				maxlength: jQuery.validator.format("Pole musi zawierać maksimum {0} znaki!")				
            },
            PIN: {
				required: 'Pole wymagane',
				minlength: jQuery.validator.format("Pole musi zawierać minimum {0} znaki!"),
				maxlength: jQuery.validator.format("Pole musi zawierać maksimum {0} znaki!")				
            },
            addressId: {
				required: 'Pole wymagane'			
            },
            contactDetailsId: {
				required: 'Pole wymagane'				
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