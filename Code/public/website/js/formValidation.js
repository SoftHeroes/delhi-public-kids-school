function contactUsValidator() {
    var email = document.forms["contactUsForm"]["emailID"].value;

    if ( /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(email) ){
        return true;
    }
    alert("invalid email ID");
    return false;
}
