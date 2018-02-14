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
		
    $('#userForm').validate({
		//reguły dla pola formularza
        rules: {
			//atrybut name: {reguły}
			login: {
				//reguły - kolejność ma znaczenia
                required: true,
                minlength: 5,
                maxlength: 30
            },
            email: {
				//reguły - kolejność ma znaczenia
                required: true,
                minlength: 8,
                maxlength: 40
            },
            password: {
				//reguły - kolejność ma znaczenia
                required: true,
                minlength: 8,
                maxlength: 10
            },
            registerDate: {
                required: true,
                minlength: 8,
                maxlength: 50
            },
            clientId: {
                required: true
            },
            workerId: {
                required: true
            }
        },
		//komunikaty dla pola formularza
		messages: {
            login: {
				//reguły - kolejność ma znaczenia
                required: 'Pole wymagane',
				minlength: jQuery.validator.format("Pole musi zawierać minimum {0} znaki!"),
				maxlength: jQuery.validator.format("Pole musi zawierać maksimum {0} znaki!")
            },
            email: {
				//reguły - kolejność ma znaczenia
                required: 'Pole wymagane',
				minlength: jQuery.validator.format("Pole musi zawierać minimum {0} znaki!"),
				maxlength: jQuery.validator.format("Pole musi zawierać maksimum {0} znaki!")
            },
            password: {
				//reguły - kolejność ma znaczenia
                required: 'Pole wymagane',
				minlength: jQuery.validator.format("Pole musi zawierać minimum {0} znaki!"),
				maxlength: jQuery.validator.format("Pole musi zawierać maksimum {0} znaki!")
            },
            registerDate: {
                required: 'Pole wymagane',
				minlength: jQuery.validator.format("Pole musi zawierać minimum {0} znaki!"),
				maxlength: jQuery.validator.format("Pole musi zawierać maksimum {0} znaki!")
            },
            clientId: {
                required: 'Pole wymagane'
            },
            workerId: {
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