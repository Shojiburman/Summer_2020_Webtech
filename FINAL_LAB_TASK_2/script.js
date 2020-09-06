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

	/*----------------------------------------gender validation-----------------------*/

	document.getElementById('gender').addEventListener("submit", function(evt) {
        evt.preventDefault();
        var form = evt.target;
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
		document.getElementById('genderformmsg').innerHTML = msg;
		if(msg != 'Success!') {
			document.getElementById('genderformmsg').style.cssText = "display: inline; color: red";
		} else {
			document.getElementById('genderformmsg').style.cssText = "display: inline; color: green";
		}
        if (msg == 'Success!') {
        	// submit form
        }
		
	}, false);


	/*------------------------------------------degree validation-------------------------------*/

	document.getElementById('degree').addEventListener("submit", function(evt) {
        evt.preventDefault();
        var form = evt.target;
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
		document.getElementById('degreeformmsg').innerHTML = msg;
		if(msg != 'Success!') {
			document.getElementById('degreeformmsg').style.cssText = "display: inline; color: red";
		} else {
			document.getElementById('degreeformmsg').style.cssText = "display: inline; color: green";
		}
        if (msg == 'Success!') {
        	// submit form
        }
		
	}, false);

	/*---------------------------------------blood validation---------------------------------*/

	document.getElementById('blood').addEventListener("submit", function(evt) {
        evt.preventDefault();
        var form = evt.target;
        var msg = 'select your blood group';
       

        var selector = form.querySelector('[name="blood"]');
    	var value = selector[selector.selectedIndex].value;
 
        if(value == 0) {
			msg = 'select your blood group';
		} else {
			msg = 'Success!';
		}
		document.getElementById('bloodformmsg').innerHTML = msg;
		if(msg != 'Success!') {
			document.getElementById('bloodformmsg').style.cssText = "display: inline; color: red";
		} else {
			document.getElementById('bloodformmsg').style.cssText = "display: inline; color: green";
		}
        if (msg == 'Success!') {
        	// submit form
        }
		
	}, false);


	/*-----------------------------------------profile pic validation--------------------------------------*/

	document.getElementById('pic').addEventListener("submit", function(evt) {
        evt.preventDefault();
        var form = evt.target;
        var msg = '';
       

       
        if(form.querySelector('[name="uid"]').value.trim() == '') {
			msg = 'user id required';
		} else {
			msg = 'Success!';
			if(form.querySelector('[name="pic"]').value == '') {
				msg = 'profile pic required';
			} else {
				msg = 'Success!';
			}
		}
		document.getElementById('picformmsg').innerHTML = msg;
		if(msg != 'Success!') {
			document.getElementById('picformmsg').style.cssText = "display: inline; color: red";
		} else {
			document.getElementById('picformmsg').style.cssText = "display: inline; color: green";
		}
        if (msg == 'Success!') {
        	// submit form
        }
		
	}, false);

	/*-------------------------------------------dob validation-------------------------------------------*/

	document.getElementById('dob').addEventListener("submit", function(evt) {
        evt.preventDefault();
        var form = evt.target;
        var msg = '';
       

       
        if(form.querySelector('[name="uid"]').value.trim() == '') {
			msg = 'user id required';
		} else {
			msg = 'Success!';
			if(form.querySelector('[name="pic"]').value == '') {
				msg = 'profile pic required';
			} else {
				msg = 'Success!';
			}
		}
		if (isset(_POST['dobSubmit'])) {
            if (empty(_POST["year"])) {
                year = _POST["year"];
                dateErr = "Year(yyyy) is required";
            } else {
                year = intval(trim(_POST['year']));
                if (year < 2017 && year > 1899) {
                    if (empty(_POST["month"])) {
                        month = _POST["month"];
                        dateErr = "Month(mm) is required";
                    } else {
                        month = intval(trim(_POST['month']));
                        if (month > 0 && month < 13){
                            longmm = [1, 3, 5, 7, 8, 10, 12];
                            shortmm = [4, 6, 9, 11];
                            if (empty(_POST["date"])) {
                                date = _POST["date"];
                                dateErr = "Date(dd) is required";
                            } else {
                                date = intval(trim(_POST['date']));
                                if (in_array(month, longmm)) {
                                    if (date > 31 || date < 1) {
                                       dateErr = "Date(dd) must be between 1 -31";
                                    }
                                } else if (in_array(month, shortmm)) {
                                    if (date > 30 || date < 1) {
                                       dateErr = "Date(dd) must be between 1 -30";
                                    }
                                } else if (month == 2) {
                                    if (((year % 4 == 0) && (year % 100!= 0)) || (year % 400 == 0)) {
                                        if (date > 29 || date < 1) {
                                           dateErr = "Date(dd) must be between 1 -29";
                                        }
                                    } else {
                                        if (date > 28 || date < 1) {
                                           dateErr = "Date(dd) must be between 1 -28";
                                        }
                                    }
                                }
                            }
                        } else {
                            dateErr = "Month(mm) must be between 1 -12";
                        }                            
                    }
                } else {
                    dateErr = "Year(yyyy) must be between 1900 - 2016";
                }
            }
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