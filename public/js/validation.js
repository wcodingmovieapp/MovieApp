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

    if (username.value.length >= 5) {
        username.className = 'correct';
        tooltipStyle.display = 'none';
        return true;
    } else {
        username.className = 'incorrect';
        tooltipStyle.display = 'inline-block';
        return false;
    }

};

// check['firstName'] = check['lastName']; // The function for the first name is the same as the name

// check['age'] = function() {

//     var age = document.getElementById('age'),
//         tooltipStyle = getTooltip(age).style,
//         ageValue = parseInt(age.value);

//     if (!isNaN(ageValue) && ageValue >= 5 && ageValue <= 140) {
//         age.className = 'correct';
//         tooltipStyle.display = 'none';
//         return true;
//     } else {
//         age.className = 'incorrect';
//         tooltipStyle.display = 'inline-block';
//         return false;
//     }

// };

// check['login'] = function() {

//     var login = document.getElementById('login'),
//         tooltipStyle = getTooltip(login).style;

//     if (login.value.length >= 4) {
//         login.className = 'correct';
//         tooltipStyle.display = 'none';
//         return true;
//     } else {
//         login.className = 'incorrect';
//         tooltipStyle.display = 'inline-block';
//         return false;
//     }

// };

// check['pwd1'] = function() {

//     var pwd1 = document.getElementById('pwd1'),
//         tooltipStyle = getTooltip(pwd1).style;

//     if (pwd1.value.length >= 6) {
//         pwd1.className = 'correct';
//         tooltipStyle.display = 'none';
//         return true;
//     } else {
//         pwd1.className = 'incorrect';
//         tooltipStyle.display = 'inline-block';
//         return false;
//     }

// };

// check['pwd2'] = function() {

//     var pwd1 = document.getElementById('pwd1'),
//         pwd2 = document.getElementById('pwd2'),
//         tooltipStyle = getTooltip(pwd2).style;

//     if (pwd1.value == pwd2.value && pwd2.value != '') {
//         pwd2.className = 'correct';
//         tooltipStyle.display = 'none';
//         return true;
//     } else {
//         pwd2.className = 'incorrect';
//         tooltipStyle.display = 'inline-block';
//         return false;
//     }

// };

// check['country'] = function() {

//     var country = document.getElementById('country'),
//         tooltipStyle = getTooltip(country).style;

//     if (country.options[country.selectedIndex].value != 'none') {
//         tooltipStyle.display = 'none';
//         return true;
//     } else {
//         tooltipStyle.display = 'inline-block';
//         return false;
//     }

// };

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
