"use strict";

// Class definition
var KTCreateAccount = function () {
	// Elements
	var modal;	
	var modalEl;

	var stepper;
	var form;
	var formSubmitButton;
	var formContinueButton;
	var formPreviousButton;

	var startupContainer;
	var influencercont;
	var mentorexpertocont;
	var inversionistacont;
	var firmacont;
	var inputIndustria;
	var inputEstado;
	var inputAvatar;

	// Variables
	var stepperObj;
	var validations = [];

	let nombreLabel = document.querySelector('#inp_nombre label');
	let nombreInput = document.querySelector('#inp_nombre input[name="nombre"]');
	$('input[type=radio][name=perfil]').change(function() {
		if (this.value == 'startup') {
			nombreLabel.innerHTML = 'Nombre del Emprendimiento o Startup';
			nombreInput.placeholder = 'Ingresa el nombre del Emprendimiento o Startup';
		} else if (this.value == 'firma') {
			nombreLabel.innerHTML = 'Nombre Firma Inversionista o Inversor';
			nombreInput.placeholder = 'Ingresa el nombre Firma Inversionista o Inversor';
		} else if (this.value == 'inversionista') {
			nombreLabel.innerHTML = 'Nombre Centro de Formación y/o Aceleración de Emprendimiento';
			nombreInput.placeholder = 'Ingresa el Nombre Centro de Formación y/o Aceleración de Emprendimiento';
		} else if (this.value == 'influencer') {
			nombreLabel.innerHTML = 'Nombre de usuario de la red social principal';
			nombreInput.placeholder = 'Ingresa el Nombre de usuario de la red social principal';
		} else {
			nombreLabel.innerHTML = 'Nombre Completo';
			nombreInput.placeholder = 'Ingresa el nombre';
		}
	});

	// Private Functions
	var initStepper = function () {
		// Initialize Stepper
		stepperObj = new KTStepper(stepper);

		// Stepper change event
		stepperObj.on('kt.stepper.changed', function (stepper) {
			if (stepperObj.getCurrentStepIndex() === 4) {
				formSubmitButton.classList.remove('d-none');
				formSubmitButton.classList.add('d-inline-block');
				formContinueButton.classList.add('d-none');
			} else if (stepperObj.getCurrentStepIndex() === 5) {
				formSubmitButton.classList.add('d-none');
				formContinueButton.classList.add('d-none');
				formPreviousButton.classList.add('d-none');
			} else {
				formSubmitButton.classList.remove('d-inline-block');
				formSubmitButton.classList.remove('d-none');
				formContinueButton.classList.remove('d-none');
			}
		});

		// Validation before going to next page
		stepperObj.on('kt.stepper.next', function (stepper) {
			// console.log('stepper.next');

			// Validate form before change stepper step
			var validator = validations[stepper.getCurrentStepIndex() - 1]; // get validator for currnt step

			let perfil = document.querySelector('input[name="perfil"]:checked').value;

			firmacont.classList.add('d-none');
			startupContainer.classList.add('d-none');
			inversionistacont.classList.add('d-none');
			mentorexpertocont.classList.add('d-none');
			influencercont.classList.add('d-none');
			if (perfil == 'startup') {
				startupContainer.classList.remove('d-none');
			} else if(perfil == 'firma') {
				firmacont.classList.remove('d-none');
			} else if(perfil == 'inversionista') {
				inversionistacont.classList.remove('d-none');
			} else if(perfil == 'expertos' || perfil == 'mentores') {
				mentorexpertocont.classList.remove('d-none');
			} else if(perfil == 'influencer') {
				influencercont.classList.remove('d-none');
			}

			if (perfil == 'startup' || perfil == 'firma') {
				inputEstado.classList.remove('d-none');
			} else {
				inputEstado.classList.add('d-none');
			}

			if (perfil == 'startup' || perfil == 'firma') {
				inputIndustria.classList.remove('d-none');
			} else if (perfil == 'inversionista' || perfil == 'expertos' || perfil == 'influencer' || perfil == 'mentores') {
				inputIndustria.classList.add('d-none');
			}

			if (validator) {
				validator.validate().then(function (status) {
					// console.log('validated!');

					if (status == 'Valid') {
						stepper.goNext();

						KTUtil.scrollTop();
					} else {
						Swal.fire({
							text: "Parece que hay algunos errores, por favor revise los campos",
							icon: "error",
							buttonsStyling: false,
							confirmButtonText: "Vale",
							customClass: {
								confirmButton: "btn btn-light"
							}
						}).then(function () {
							KTUtil.scrollTop();
						});
					}
				});
			} else {
				stepper.goNext();

				KTUtil.scrollTop();
			}
		});

		// Prev event
		stepperObj.on('kt.stepper.previous', function (stepper) {
			// console.log('stepper.previous');

			stepper.goPrevious();
			KTUtil.scrollTop();
		});
	}

	var handleForm = function() {
		formSubmitButton.addEventListener('click', function (e) {
			// Validate form before change stepper step
			var validator = validations[3]; // get validator for last form

			validator.validate().then(async function (status) {
				// console.log('validated!');

				if (status == 'Valid') {
					// Prevent default button action
					e.preventDefault();

					// Disable button to avoid multiple click 
					formSubmitButton.disabled = true;

					// Show loading indication
					formSubmitButton.setAttribute('data-kt-indicator', 'on');
					let sendData = new FormData(form);
					await axios({
			            url: form.action,
			            method: 'POST',
			            data: sendData
			        }).then(async (result) => {
			            if (result.status === 200) {
							stepperObj.goNext();
			            }
			        }).catch((error) => {
			            if (error.response != undefined && error.response.data != undefined && error.response.data.errors != undefined) {
			                if (Object.keys(error.response.data.errors).length > 0) {
			                    for (const key in error.response.data.errors) {
			                        swalToastFire(error.response.data.errors[key], 2400, 'error');
			                        break;
			                    }
			                }
			            } else if (error.response != undefined && error.response.data != undefined && error.response.data.message != undefined) {
			                swalToastFire(error.response.data.message, 2400, 'error');
			            } else {
			                swalToastFire(error.message, 2400, 'error');
			            }
			        }).then(() => {
						formSubmitButton.disabled = false;
			          	formSubmitButton.removeAttribute('data-kt-indicator');
			        });
				} else {
					Swal.fire({
						text: "Debes completar los campos.",
						icon: "error",
						buttonsStyling: false,
						confirmButtonText: "Ok",
						customClass: {
							confirmButton: "btn btn-light"
						}
					}).then(function () {
						KTUtil.scrollTop();
					});
				}
			});
		});

		// Expiry month. For more info, plase visit the official plugin site: https://select2.org/
  //       $(form.querySelector('[name="card_expiry_month"]')).on('change', function() {
  //           // Revalidate the field when an option is chosen
  //           validations[3].revalidateField('card_expiry_month');
  //       });

		// // Expiry year. For more info, plase visit the official plugin site: https://select2.org/
  //       $(form.querySelector('[name="card_expiry_year"]')).on('change', function() {
  //           // Revalidate the field when an option is chosen
  //           validations[3].revalidateField('card_expiry_year');
  //       });

		// // Expiry year. For more info, plase visit the official plugin site: https://select2.org/
	}

	document.querySelectorAll("input[name='logo']").forEach((input) => {
        input.addEventListener('change', (evt) => {
        	if (evt.currentTarget.value === 'personalizado') {
        		inputAvatar.classList.remove('d-none');
        	} else {
        		inputAvatar.classList.add('d-none');
        	}
        	// console.log(evt.currentTarget.value);
        });
    });

	var initValidation = function () {
		// Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/
		// Step 1
		validations.push(FormValidation.formValidation(
			form,
			{
				fields: {
					perfil: {
						validators: {
							notEmpty: {
								message: 'El tipo de perfíl es requerido'
							}
						}
					}
				},
				plugins: {
					trigger: new FormValidation.plugins.Trigger(),
					bootstrap: new FormValidation.plugins.Bootstrap5({
						rowSelector: '.fv-row',
                        eleInvalidClass: '',
                        eleValidClass: ''
					})
				}
			}
		));

		// Step 2
		validations.push(FormValidation.formValidation(
			form,
			{
				fields: {
					'nombre': {
						validators: {
							notEmpty: {
								message: 'Debes de llenar el nombre'
							},
							stringLength: {
								min: 4,
								max: 255,
								message: 'El nombre debe ser entre 4 y 255 carácteres'
							}
						}
					},
					'email': {
						validators: {
							notEmpty: {
								message: 'Debes de llenar el email'
							},
							emailAddress: {
								message: 'El campo debe de ser un email'
							}
						}
					},
					'pais': {
						validators: {
							notEmpty: {
								message: 'Debes de ingresar un país'
							}
						}
					},
				},
				plugins: {
					trigger: new FormValidation.plugins.Trigger(),
					// Bootstrap Framework Integration
					bootstrap: new FormValidation.plugins.Bootstrap5({
						rowSelector: '.fv-row',
                        eleInvalidClass: '',
                        eleValidClass: ''
					})
				}
			}
		));

		// Step 3
		validations.push(FormValidation.formValidation(
			form,
			{
				fields: {
					'estado': {
						validators: {
							notEmpty: {
								message: 'Debe seleccionar un estado'
							}
						}
					},
					'industria': {
						validators: {
							notEmpty: {
								message: 'Debe seleccionar una industria'
							},
							digits: {
								message: 'Debes seleccionar una industria de la lista'
							}
						}
					},
					'password': {
						validators: {
							notEmpty: {
								message: 'Debe ingresar una contraseña'
							},
							stringLength: {
								min: 4,
								max: 32,
								message: 'La contraseña debe ser entre 4 y 32 carácteres'
							}
						}
					},
					'confirm_password': {
						validators: {
							callback: {
								message: 'Las contraseñas deben de coincidir',
								callback: function(input) {
									const value = input.value;
									let pw = document.querySelector('[name="password"]');
									if (pw.value != value) {
										return {
											valid: false
										};
									}
									return {
										valid: true
									};
								}
							}
						}
					},
				},
				plugins: {
					trigger: new FormValidation.plugins.Trigger(),
					// Bootstrap Framework Integration
					bootstrap: new FormValidation.plugins.Bootstrap5({
						rowSelector: '.fv-row',
                        eleInvalidClass: '',
                        eleValidClass: ''
					})
				}
			}
		));

		// Step 4
		validations.push(FormValidation.formValidation(
			form,
			{
				fields: {
					'avatar': {
						validators: {
							file: {
			                    extension: 'png,jpg,jpeg',
			                    message: "{{__('input.invalid.file', ['ext' => 'png, jpg, jpeg'])}}"
			                }
						}
					},
				},

				plugins: {
					trigger: new FormValidation.plugins.Trigger(),
					// Bootstrap Framework Integration
					bootstrap: new FormValidation.plugins.Bootstrap5({
						rowSelector: '.fv-row',
                        eleInvalidClass: '',
                        eleValidClass: ''
					})
				}
			}
		));
	}

	var handleFormSubmit = function() {
		
	}

	return {
		// Public Functions
		init: function () {
			// Elements
			modalEl = document.querySelector('#kt_modal_create_account');
			if (modalEl) {
				modal = new bootstrap.Modal(modalEl);	
			}					

			stepper = document.querySelector('#kt_create_account_stepper');
			form = stepper.querySelector('#kt_create_account_form');
			formSubmitButton = stepper.querySelector('[data-kt-stepper-action="submit"]');
			formContinueButton = stepper.querySelector('[data-kt-stepper-action="next"]');
			formPreviousButton = stepper.querySelector('[data-kt-stepper-action="previous"]');
			startupContainer = document.getElementById('startupcont');
			influencercont = document.getElementById('influencercont');
			mentorexpertocont = document.getElementById('mentorexpertocont');
			inversionistacont = document.getElementById('inversionistacont');
			firmacont = document.getElementById('firmacont');
			inputIndustria = document.getElementById('inp_industria_id');
			inputEstado = document.getElementById('inp_estado');
			inputAvatar = document.getElementById('inp_avatar');

			initStepper();
			initValidation();
			handleForm();
		}
	};
}();

// On document ready
KTUtil.onDOMContentLoaded(function() {
    KTCreateAccount.init();
});