window.addEventListener('DOMContentLoaded', (event) => {
	document.getElementById('nameformmsg').style.cssText = "display: inline; color: red";
	/*------------------name field validation---------------------------------------------*/
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
        if(msg != 'Success!') {
        	document.getElementById('nameformmsg').style.cssText = "display: inline; color: red";
        } else {
        	document.getElementById('nameformmsg').style.cssText = "display: inline; color: green";
        }
        if (msg == 'Success!') {
        	// submit form
        }        
    }, false);


/*------------------email field validation---------------------------------------------*/

	document.getElementById('email').addEventListener("submit", function(evt) {
		evt.preventDefault();
		var form = evt.target;
		var email = form.querySelector('[name="email"]').value.trim();
		var msg = '';
		if (email != ''){
			msg = "Success!";
			if (email.indexOf(" ") == -1) {
				msg = 'Success!';
				if (multipleAT(email)) {
					msg = 'Success!';
					if (email.indexOf("@") > 0) {
						msg = 'Success!';
						if (email.indexOf(".") > -1) {
							msg = 'Success!';
							var domainExt = email.split("@")[1];
							var domain = domainExt.split(".")[0];
							var ext = domainExt.replace(domain, '');
							console.log(ext);
							if(domain.length != 0 && validateDomainName(domain)){
								msg = 'Success!';
								if(ext.length > 1 && validateDomainExt(ext)){
									msg = 'Success!';
								} else {
									msg = 'Email must have more than 1 letter and letters only after last ".", should not have number.';
								}
							} else {
								msg = 'Email can only have dot(.), dash(-), chracters and numbers between "@" and last "." with no adjacent "@" or "."';
							}
						} else {
							msg = 'Email must have "."';
						}
					} else {
						msg = 'Email can not start with "@"';
					}
				} else {
					msg = 'Email can not have multiple "@"';
				}
			} else {
				msg = 'Email can not have spaces';
			}
		} else {
			msg = 'Email can not be empty';
		}
		document.getElementById('emailformmsg').innerHTML = msg;
		if(msg != 'Success!') {
			document.getElementById('emailformmsg').style.cssText = "display: inline; color: red";
		} else {
			document.getElementById('emailformmsg').style.cssText = "display: inline; color: green";
		}
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


function multipleAT(string) {
    var array = string.split('@');
    if ( array.length == 2) {
    	return true
    }
    return false;
}

function validateDomainName(string) {
  	var array = string.split('');
    var flag = true;
    array.forEach(function(value) {
        if ((value == '')) {
        	flag = false;
        } else {
        	if (value == '-' || value == '.' || ((value.toLowerCase() != value.toUpperCase())) ){} else {
        		flag = false;
        	}
        }
    });
    return flag;
}

function validateDomainExt(string) {
	var array = string.replace('.','');
	console.log(array);
    array = array.split('');
    console.log(array);
    var flag = true;
    array.forEach(function(value) {
        if (value == ' ') {
        	flag = false;
        } else {
        	if ((value.toLowerCase() != value.toUpperCase())) {} else {
        		flag = false;
        	}
        }
    });
    return flag;
}