window.initFormsConfirmation = function(dynamic = true) {
    let formsConfirm = document.querySelectorAll('.axios-form-confirm');
    let formsConfirmDynamic = document.querySelectorAll('.axios-form-confirm-dyn');
    let canSend = true;
    let sendAxiosDataConfirm = async (axiosForm) => {
        let axiosUrl = axiosForm.action;
        let sendData = new FormData(axiosForm);
        let submitBtn = axiosForm.querySelector('button[type="submit"]');
        let swalTime = 2400;
        if (axiosForm.getAttribute('swal-time')) {
            swalTime = axiosForm.getAttribute('swal-time');
        }
        submitBtn.disabled = true;
        await axios({
            url: axiosUrl,
            method: 'POST',
            data: sendData
        }).then(async (result) => {
            if (result.status === 200) {
                if (typeof successFunction !== 'undefined') {
                    successFunction();
                }
                await swalToastFire(result.data.message, swalTime).then(() => {
                    if (result.data.url) {
                        canSend = false;
                        window.location.href = result.data.url;
                    }
                });
            }
        }).catch((error) => {
            if (error.response.data.message != undefined) {
                swalToastFire(error.response.data.message, swalTime, 'error');
            } else {
                swalToastFire(error.message, swalTime, 'error');
            }
            // swalToastFire(error.message, swalTime, 'error');
        }).then(() => {
            if (canSend) {
                // submitBtn.disabled = false;
            }
        });
    };
    let formEventFunction = (e) => {
        e.preventDefault();
        let axiosForm = e.currentTarget;
        let swalTitle = '¿Seguro que desea realizar la acción?';
        if (axiosForm.getAttribute('swal-title')) {
            swalTitle = axiosForm.getAttribute('swal-title');
        }
        let swalText = 'La acción no será reversible';
        if (axiosForm.getAttribute('swal-text')) {
            swalText = axiosForm.getAttribute('swal-text');
        }
        let swalIcon = 'error';
        if (axiosForm.getAttribute('swal-icon')) {
            swalIcon = axiosForm.getAttribute('swal-icon');
        }
        let swalConfirmText = 'Aceptar';
        if (axiosForm.getAttribute('swal-confirm-text')) {
            swalIcon = axiosForm.getAttribute('swal-confirm-text');
        }
        let swalCancelText = 'Cancelar';
        if (axiosForm.getAttribute('swal-cancel-text')) {
            swalIcon = axiosForm.getAttribute('swal-cancel-text');
        }
        Swal.fire({
            title: swalTitle,
            text: swalText,
            icon: swalIcon,
            showCancelButton: true,
            customClass: {
                confirmButton: 'btn btn-warning btn-sm',
                cancelButton: 'btn btn-light-danger btn-sm',
            },
            confirmButtonText: swalConfirmText,
            cancelButtonText: swalCancelText
        }).then((result) => {
            if (result.isConfirmed) { 
                sendAxiosDataConfirm(axiosForm);
            }
        }).finally(() => {
            // console.log('finalizado');
        });
    }
    if(!dynamic) {
    	for (var i = 0; i < formsConfirm.length; i++) {
        	formsConfirm[i].addEventListener('submit', formEventFunction);
    	}
    }
    for (var i = 0; i < formsConfirmDynamic.length; i++) {
        formsConfirmDynamic[i].addEventListener('submit', formEventFunction);
    }
}
initFormsConfirmation(false);