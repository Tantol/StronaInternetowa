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
			
    $('#cargoForm').validate({
		//reguły dla pola formularza
        rules: {
			//atrybut name: {reguły}
			loadOrdId: {
				//reguły - kolejność ma znaczenia
                required: true		
            },
            driverId: {
				//reguły - kolejność ma znaczenia
                required: true			
            },
            startAddressId: {
				//reguły
				required: true				              
            },
            endAddressId: {
				//reguły - kolejność ma znaczenia
                required: true			
            },
            price: {
				//reguły - kolejność ma znaczenia
                required: true,
				minlength: 1,
				maxlength: 10			
            },
            categoryId: {
				//reguły - kolejność ma znaczenia
                required: true			
            },
            note: {
                required: false,
                maxlength: 100
            }
        },
		//komunikaty dla pola formularza
		messages: {
			loadOrdId: {
				required: 'Pole wymagane'
			},
			driverId: {
				required: 'Pole wymagane'
			},
            startAddressId: {
				required: 'Pole wymagane'
			},
            endAddressId: {
				required: 'Pole wymagane'
			},
            price: {
				required: 'Pole wymagane',
				minlength: jQuery.validator.format("Pole musi zawierać minimum {0} znaki!"),
				maxlength: jQuery.validator.format("Pole musi zawierać maksimum {0} znaki!")
			},
            categoryId: {
				required: 'Pole wymagane'
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
		/**niestandradowa reakcja na kliknięcie submit,
		   gdy nie ma błędów,
		   blokuje standradową akcję
		**/
		/*submitHandler: function(form) {
			alert('reakcja na subit');
		},*/
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
				: 'Nie wypełniono poprawnie ' + errors + ' pół. Zostały podświetlone';
			  $("div.alert-danger").html(message);
			  $("div.alert-danger").show();
			} else {
			  $("div.alert-danger").hide();
			}
		},
	});
});