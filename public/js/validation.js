// Function of deactivation of the display of the "tooltips"
function desactivateTooltips () {

    var tooltips = document.querySelectorAll('.tooltip'),
        tooltipsLength = tooltips.length;

    for (var i = 0; i < tooltipsLength; i++) {
        tooltips[i].style.display = 'none';
    }

}


// The function below allows to recover the "tooltip" which corresponds to our input

function getTooltip(elements) {

    while (elements = elements.nextSibling) {
        if (elements.className === 'tooltip') {
            return elements;
        }
    }

    return false;

}

// Verification functions of the form, they return "true" if everything is ok

var check = {}; // We put all our functions in a literal object

check['username'] = function(id) {

    var username = document.getElementById(id),
        tooltipStyle = getTooltip(username).style;

    if (username.value.length >= 5 && username.value.length <= 12) {
        username.className = 'correct';
        tooltipStyle.display = 'none';
        return true;
    } else {
        username.className = 'incorrect';
        tooltipStyle.display = 'inline-block';
        return false;
    }

};

check['email'] = function() {

    var mailformat = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    var email = document.getElementById('email'),
        tooltipStyle = getTooltip(email).style;
    
    if (email.value.match(mailformat)) {
        email.className = 'correct';
        tooltipStyle.display = 'none';
        return true;
    } else {
        email.className = 'incorrect';
        tooltipStyle.display = 'inline-block';
        return false;
    }

};

check['password'] = function() {
    
    var regexPassword = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}$/;
    var password = document.getElementById('password'),
        tooltipStyle = getTooltip(password).style;

    if (password.value.length >= 8 && password.value.match(regexPassword)) {
        password.className = 'correct';
        tooltipStyle.display = 'none';
        return true;
    } else {
        password.className = 'incorrect';
        tooltipStyle.display = 'inline-block';
        return false;
    }
};

check['confirm'] = function() {

    var password = document.getElementById('password'),
        confirm = document.getElementById('confirm'),
        tooltipStyle = getTooltip(confirm).style;

    if (password.value == confirm.value && confirm.value != '') {
        confirm.className = 'correct';
        tooltipStyle.display = 'none';
        return true;
    } else {
        confirm.className = 'incorrect';
        tooltipStyle.display = 'inline-block';
        return false;
    }

};

//console.log(check);
// Setting up events

{ // Using an IIFE to avoid global variables.

    var myForm = document.getElementById('registration'),
        inputs = document.querySelectorAll('input[type=text], input[type=password]'),
        inputsLength = inputs.length;

    for (var i = 0; i < inputsLength; i++) {
        inputs[i].addEventListener('keyup', function(e) {
            check[e.target.id](e.target.id); // "e.target" represents the currently modified input
            // check['country']();
        });
    }

    myForm.addEventListener('submit', function(e) {
        e.preventDefault();
        var result = true;

        for (var i in check) {
            result = check[i](i) && result;
        }

        if (result) {
            alert('the form is good');
             e.target.submit();
        }
       
       

    });

    myForm.addEventListener('reset', function() {

        for (var i = 0; i < inputsLength; i++) {
            inputs[i].className = '';
        }

        desactivateTooltips();

    });

}


// Now that everything is initialized, we can disable the "tooltips"

desactivateTooltips();
