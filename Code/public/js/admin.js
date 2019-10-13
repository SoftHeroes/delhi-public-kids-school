function forgetFormValidator() {
    var email = $('#emailID').val();

    if ( /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(email) ){
        return true;
    }
    alert("invalid email ID");
    return false;
}
