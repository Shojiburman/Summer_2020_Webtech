window.addEventListener('DOMContentLoaded', (event) => {
	
	/*------------------name field validation---------------------------------------------*/
    document.getElementById('form').addEventListener("submit", function(evt) {
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
        document.getElementById('msg').innerHTML = msg;
        if(msg != 'Success!') {
        	document.getElementById('msg').style.cssText = "display: inline; color: red";
        } else {
        	document.getElementById('msg').style.cssText = "display: inline; color: green";
        }
        if (msg == 'Success!') {
        	// submit form
        }        

    /*------------------email field validation---------------------------------------------*/

    
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
        document.getElementById('msg').innerHTML = msg;
        if(msg != 'Success!') {
            document.getElementById('msg').style.cssText = "display: inline; color: red";
        } else {
            document.getElementById('msg').style.cssText = "display: inline; color: green";
        }
        

        /*----------------------------------------gender validation-----------------------*/

        var msg = 'select your gender';
        if(form.querySelector('[value="Male"]').checked) {
            msg = 'Success!';
        }else if(form.querySelector('[value="Female"]').checked) {
            msg = 'Success!';
        } else if (form.querySelector('[value="Other"]').checked) {
            msg = 'Success!';
        } else {
            msg = 'select your gender';
        }
        document.getElementById('msg').innerHTML = msg;
        if(msg != 'Success!') {
            document.getElementById('msg').style.cssText = "display: inline; color: red";
        } else {
            document.getElementById('msg').style.cssText = "display: inline; color: green";
        }

        /*---------------------------------------blood validation---------------------------------*/

        var msg = 'select your blood group';
       
        var selector = form.querySelector('[name="blood"]');
        var value = selector[selector.selectedIndex].value;
 
        if(value == 0) {
            msg = 'select your blood group';
        } else {
            msg = 'Success!';
        }
        document.getElementById('msg').innerHTML = msg;
        if(msg != 'Success!') {
            document.getElementById('msg').style.cssText = "display: inline; color: red";
        } else {
            document.getElementById('msg').style.cssText = "display: inline; color: green";
        }

        /*------------------------------------------degree validation-------------------------------*/

        var msg = 'select your degree';
        if(form.querySelector('[value="SSC"]').checked) {
            msg = 'Success!';
        }else if(form.querySelector('[value="HSC"]').checked) {
            msg = 'Success!';
        } else if (form.querySelector('[value="BSc"]').checked) {
            msg = 'Success!';
        } else {
            msg = 'select your degree';
        }
        document.getElementById('msg').innerHTML = msg;
        if(msg != 'Success!') {
            document.getElementById('msg').style.cssText = "display: inline; color: red";
        } else {
            document.getElementById('msg').style.cssText = "display: inline; color: green";
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