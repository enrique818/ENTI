window.initForms = function(dynamic = true) {
    let forms = document.querySelectorAll('.axios-form');
    let formsDynamic = document.querySelectorAll('.axios-form-dyn');
    var validator = null;
    let currentFormId = '';
    let cantSend = false;
    let sendAxiosData = async (axiosForm) => {
        let axiosUrl = axiosForm.action;
        let sendData = new FormData(axiosForm);
        let submitBtn = axiosForm.querySelector('button[type="submit"]');
        if (submitBtn != undefined && submitBtn.querySelector('.indicator-label') != undefined && submitBtn.querySelector('.indicator-progress')) {
            submitBtn.setAttribute('data-kt-indicator', 'on');
        }
        cantSend = false;
        submitBtn.disabled = true;
        await axios({
            url: axiosUrl,
            method: 'POST',
            data: sendData
        }).then(async (result) => {
            if (result.status === 200) {
                if (submitBtn != undefined && submitBtn.querySelector('.indicator-label') != undefined && submitBtn.querySelector('.indicator-progress')) {
                    submitBtn.removeAttribute('data-kt-indicator');
                }
                if (typeof successFunction !== 'undefined') {
                    successFunction();
                }
                await swalToastFire(result.data.message).then(() => {
                    if (result.data.url) {
                        cantSend = true;
                        window.location.href = result.data.url;
                    }
                });
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
            if (submitBtn != undefined && submitBtn.querySelector('.indicator-label') != undefined && submitBtn.querySelector('.indicator-progress')) {
                submitBtn.removeAttribute('data-kt-indicator');
            }
            if (!cantSend) {
                submitBtn.disabled = false;
            }
        });
    };
    let formEventFunction = async (e) => {
        e.preventDefault();
        let axiosForm = e.currentTarget;
        if (typeof validateOptions != 'undefined' && (currentFormId != axiosForm.id || validator == null)) {
            let validateOptionNumber = axiosForm.getAttribute('validate-option');
            let theValidationOptions = null;
            // Aqui se hará la comparación entre si se elige el total o un subarreglo, con un atributo de el formulario, tipo axiosForm.getAttribute('validate-option-index')
            if (validateOptionNumber != undefined) {
                theValidationOptions = validateOptions[validateOptionNumber];
            } else {
                theValidationOptions = validateOptions;
            }
            theValidationOptions['plugins'] = {
                trigger: new FormValidation.plugins.Trigger(),
                bootstrap: new FormValidation.plugins.Bootstrap5({
                    rowSelector: '.fv-row',
                    eleInvalidClass: 'is-invalid',
                    eleValidClass: ''
                })
            };
            validator = await FormValidation.formValidation(axiosForm, theValidationOptions);
            currentFormId = axiosForm.id;
        }
        if (validator != null) {
            validator.validate().then(async (status) => {
                if (status == 'Valid') {
                    sendAxiosData(axiosForm);
                } else {
                    swalToastFire("Llena todos los campos correctamente", 2400, 'error');
                }
            });
        } else {
            sendAxiosData(axiosForm);
        }
    };
    if (!dynamic) {
    	for (var i = 0; i < forms.length; i++) {
        	forms[i].addEventListener('submit', formEventFunction);
    	}
    }
    for (var i = 0; i < formsDynamic.length; i++) {
        formsDynamic[i].addEventListener('submit', formEventFunction);
    }
}
initForms(false);