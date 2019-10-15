function homeworkFormValidator() {
    var homeworkDescription = document.forms["homeworkForm"]["homeworkDescription"].value;
    var files = document.forms["homeworkForm"]["files"].value;

    if ( homeworkDescription.trim() == '' && files.trim() == '' ){
        alert("Please give anyone input from homework description or home image 😒");
        return false;
    }

    return true;
}
