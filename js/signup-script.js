
document.body.onload = function () {
    var Form = $('#registerForm');
    Form.on('submit', function (e) {
        formValidation(e, e.target);
    });
};

function formValidation (e, F) {
    var errorInputs = validateInputs(F.id);
    if (errorInputs) {
        e.preventDefault();
    }
}
        
function validateInputs(Form) {
    var error = false;
    $('input[type="password"], input[type="email"]', $('#' + Form)).each(function () {
        var input = $(this),
            regEx = input.data('check'),
            v = input.val();
        if (v === '' || v.match(regEx)) {
            input.addClass('border-danger');
            error = true;
        } else {
            input.removeClass('border-danger');
        }
    });
    return error;
}

var check = function() {
  if (document.getElementById('pass1').value ==
    document.getElementById('pass2').value) {
    document.getElementById('message').style.color = 'green';
    document.getElementById('message').innerHTML = 'matching';
  } else {
    document.getElementById('message').style.color = 'red';
    document.getElementById('message').innerHTML = 'not matching';
  }
}