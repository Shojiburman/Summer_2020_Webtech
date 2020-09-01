window.addEventListener('DOMContentLoaded', (event) => {

        document.getElementById('form').addEventListener("submit", function(evt) {
        evt.preventDefault();
        var form = evt.target;

    /*----------------------------------------dob validation-----------------------*/

        var msg = 'Date of birth is required';
        var year = form.querySelector('[name="year"]').value;

        if(year != ''){
            if(year < 2017 && year > 1889) {
                var month = form.querySelector('[name="month"]').value;
                if(month != ''){
                    if(month > 0 && month < 13) {
                        var date = form.querySelector('[name="date"]').value;
                        if(date != '') {
                            if(date > 0 && date < 33){
                                if(date == 31 && month != 2){
                                    if((month == 1) || (month == 3) || (month = 5) || (month = 7) || (month = 8) || (month = 10) || (month = 12)){
                                        msg = 'Success!';
                                    } else {
                                        msg = 'invalid date'
                                    }
                                } else {
                                    if(date == 30 && month != 2) {
                                        msg = 'Success!';
                                    } else {
                                        if(date == 29) {
                                            if(month == 2) {
                                                if(((year % 4 == 0) && (year % 100!= 0)) || (year % 400 == 0)) {
                                                    msg = 'Success!';
                                                } else {
                                                    msg = 'invalid date'
                                                }
                                            }
                                        } else {
                                            if(month !=2){
                                                msg = 'Success!';
                                            } else {
                                                msg = 'invalid date'
                                            }
                                        }
                                    }
                                }
                            } else {
                                msg = 'select date between 1-12';
                            }
                        } else {
                            msg = 'date is required';
                        }
                    } else {
                        msg = 'select month between 1-12';
                    }
                } else {
                    msg = 'month is required';
                }
            } else {
                msg = 'select year between 1990-2018';
            }
        } else {
            msg = 'year is required';
        }
    
        document.getElementById('dobmsg').innerHTML = msg;
        if(msg != 'Success!') {
            document.getElementById('dobmsg').style.cssText = "display: inline; color: red";
        } else {
            document.getElementById('dobmsg').style.cssText = "display: inline; color: green";
        }

    /*-----------------------------------------profile pic validation--------------------------------------*/

        var msg = '';
        if(form.querySelector('[name="pic"]').value == '') {
            msg = 'profile pic required';
        } else {
            msg = 'Success!';
        }
        document.getElementById('pmsg').innerHTML = msg;
        if(msg != 'Success!') {
            document.getElementById('pmsg').style.cssText = "display: inline; color: red";
        } else {
            document.getElementById('pmsg').style.cssText = "display: inline; color: green";
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
        document.getElementById('dmsg').innerHTML = msg;
        if(msg != 'Success!') {
            document.getElementById('dmsg').style.cssText = "display: inline; color: red";
        } else {
            document.getElementById('dmsg').style.cssText = "display: inline; color: green";
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
        document.getElementById('bmsg').innerHTML = msg;
        if(msg != 'Success!') {
            document.getElementById('bmsg').style.cssText = "display: inline; color: red";
        } else {
            document.getElementById('bmsg').style.cssText = "display: inline; color: green";
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
        document.getElementById('gmsg').innerHTML = msg;
        if(msg != 'Success!') {
            document.getElementById('gmsg').style.cssText = "display: inline; color: red";
        } else {
            document.getElementById('gmsg').style.cssText = "display: inline; color: green";
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
        document.getElementById('emsg').innerHTML = msg;
        if(msg != 'Success!') {
            document.getElementById('emsg').style.cssText = "display: inline; color: red";
        } else {
            document.getElementById('emsg').style.cssText = "display: inline; color: green";
        }
        
	
	/*------------------name field validation---------------------------------------------*/
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
        document.getElementById('nmsg').innerHTML = msg;
        if(msg != 'Success!') {
        	document.getElementById('nmsg').style.cssText = "display: inline; color: red";
        } else {
        	document.getElementById('nmsg').style.cssText = "display: inline; color: green";
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