window.swalToastFire = async function(msg, time = 2500, type = 'success') {
	return await Swal.fire({
	    text: msg,
	    icon: type,
	    toast: true,
	    buttonsStyling: false,
	    showConfirmButton: false,
	    position: "top-right",
	    timerProgressBar: true,
        timer: time,
	    // animation: true,
	    didOpen: (toast) => {
		   	toast.addEventListener('mouseenter', Swal.stopTimer)
		    toast.addEventListener('mouseleave', Swal.resumeTimer)
		}
	});
};