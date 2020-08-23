window.addEventListener('DOMContentLoaded', (event) => {
    document.getElementById('name').addEventListener("submit", function(evt) {
        evt.preventDefault();
        var form = evt.target;
        var name = form.querySelector('[name="name"]').value.trim();
        var msg = '';
        if (name != '') {
        	msg = 'Success!';
            if (name.split(' ').length > 1) {
            	msg = 'Success!';
                if (name.charAt(0).toLowerCase() != name.charAt(0).toUpperCase()) {
                	msg = 'Success!';
                    if (!validateName(name)) {
                        msg = 'Name must contain a-z, A-Z, dot(.) or dash(-)';
                    } else {
                    	msg = 'Success!';
                    }
                } else {
                    msg = 'Name must start with a letter';
                }
            } else {
                msg = 'Name can not be less than two words';
            }
        } else {
            msg = 'Name can not be empty';
        }
        document.getElementById('nameformmsg').innerHTML = msg;
        if (msg == 'Success!') {
        	// submit form
        }        
    }, false);
});

function validateName(string) {
    var array = string.split('');
    var flag = true;
    array.forEach(function(value) {
        if ((value == '.') || (value == '-') || (value == ' ') || (value.toLowerCase() != value.toUpperCase())) {} else {
            flag = false;
        }
    });
    return flag;
}