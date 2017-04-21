function main() {
	showDate();
}

function showDate() {
	var date = new Date();
	var m = date.getMonth() + 1;
	var d = date.getDate();
	var y = date.getFullYear();
	document.getElementById("date").innerHTML = "Today is " + m + "/" + d + "/" + y;
}

function validateAll() {
	if (validateCart() == true) {
		if (validateName() == true) {
			if (validateItems() == true) {
				if (validateEmail() == true) {
					if (validatePhone() == true) {
						if (validateZip() == true) {
							if (validatePay() == true) {
								document.forms[1].submit();
							}
						}
					}
				}
			}
		}	
	}
}


function validateEmail() { //check for at symbol and dot in email
	var at = document.getElementById("email").value.indexOf("@");
	var dot = document.getElementById("email").value.indexOf(".");
	submit = "true";
	if ((at == -1) || (dot == -1)) {
		alert("Please enter a valid email!");
		document.getElementById("email").focus();
		document.getElementById("email").select();
		document.getElementById("email").style.backgroundColor="grey";
		submit = "false";
	}
	if (submit == "false") {
		return false;
	}
	else {
		return true;
	}
}

function validateZip() {
	var zip = document.getElementById("zip").value;
	if ((zip.length != 5) || (isNaN(zip))) {
		alert("Please enter a valid zip code.");
		document.getElementById("zip").focus();
		document.getElementById("zip").select();
		document.getElementById("zip").style.backgroundColor="grey";
		return false;
	}
	else {
		return true;
	}
}

function validateName() { //validates name and username
	if ((document.getElementById("fullname").value == "") || (document.getElementById("username").value == "")) {
	    alert("Valid name and username please!");
	    return false;
 	}
 	else {
 		return true;
 	}
}

function validatePhone() {
	var phone = document.getElementById("phone").value;
	if ((phone.length != 10) || (isNaN(phone))) {
		alert("Please enter a valid 10 digit phone number XXXXXXXXXX !");
		document.getElementById("phone").focus();
		document.getElementById("phone").select();
		document.getElementById("phone").style.backgroundColor="grey";

		return false;
	}
	else {
 		return true;
 	}
}

function validatePay() {
	if ((document.getElementById("amex").checked == false) && (document.getElementById("visa").checked == false) && (document.getElementById("mastercard").checked == false)) {
		alert ("Please choose a form of payment!");
		return false;
	}
	else {
		return true;
	}
}

function validateItems() {
	var c;
	for (var i = 7; i < 16 ; i++) { //checks that user has entered in all info for user and shipping
		if (i != 11) {
			if ((document.forms[1].elements[i].value == "") || (document.forms[1].elements[i].value == null)) {
				alert("All fields required!");
				c = false;
				document.forms[1].elements[i].focus();
				document.forms[1].elements[i].select();
				document.forms[1].elements[i].style.backgroundColor="grey";
				break;
			}
			else {
	 			c = true;
	 			continue;
	 		}
	 	}	
	}
	return c;
}

function validateCart() {
	var total = calculateSubtotal();
	if (total == 0) {
		alert("No items in cart!");
		return false;
	}
	else {
 		return true;
 	}
}

function calculateSubtotal() {
	var scitotal = document.getElementById("sciquantity").value * 30.99;
	var euktotal = document.getElementById("eukquantity").value * 29.99;
	var purtotal = document.getElementById("purquantity").value * 23.99;
	var fantotal = document.getElementById("fanquantity").value * 20.99;
	var meototal = document.getElementById("meoquantity").value * 10.99;
	var iamtotal = document.getElementById("iamquantity").value * 24.99;
	var pretax = scitotal + euktotal + purtotal + fantotal + meototal + iamtotal;
	pretax = Math.round(pretax*100)/100;
	document.getElementById("pretax").innerHTML = "Pre-Tax : $" + pretax;
	var taxtotal = Math.round((pretax * .08875)*100)/100;
	document.getElementById("tax").innerHTML = "+ Sales Tax (8.875%) : $" + taxtotal;
	subtotal = Math.round((pretax+taxtotal)*100)/100;
	document.getElementById("subtotal").innerHTML = "Subtotal : $" + subtotal;
	return subtotal;
}

function calculateGrandTotal() {
	var subtotal = calculateSubtotal();
	var delivery = Number(document.getElementById("delivery").value);
	grandtotal = Math.round((delivery+subtotal)*100)/100;
	document.getElementById("grandtotal").innerHTML = "Grand Total : $" + grandtotal;
}

function calculateTotals() {
	calculateSubtotal();
	calculateGrandTotal();
}
