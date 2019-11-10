function validateNumber(evt) {
	var charCode = (evt.which) ? evt.which : evt.keyCode;
	if (charCode != 46 && charCode > 31 
	&& (charCode < 48 || charCode > 57))
	return true;
	return false;
}


function capitalize(string) {
    return string.charAt(0).toUpperCase() + string.slice(1);
}

function isNumber(evt) {
    evt = (evt) ? evt : window.event;
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
        return false;
    }
    return true;
}