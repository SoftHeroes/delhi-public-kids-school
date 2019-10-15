function homeworkFormValidator() {
    var homeworkDescription = document.forms["homeworkForm"]["homeworkDescription"].value;
    var files = document.forms["homeworkForm"]["files"].value;

    if ( homeworkDescription.trim() == '' && files.trim() == '' ){
        alert("Please give anyone input from homework description or home image 😒");
        return false;
    }

    return true;
}

function weekscheduleFormValidator() {

    var week = document.forms["weekScheduleForm"]["selectedWeek"].value;
    if ( week.trim() == ''){
        alert("Please select week 😒");
        return false;
    }

    var weekscheduleDescription = document.forms["weekScheduleForm"]["weekscheduleDescription"].value;
    var files = document.forms["weekScheduleForm"]["files"].value;

    if ( weekscheduleDescription.trim() == '' && files.trim() == '' ){
        alert("Please give anyone input from Week Schedule description or Schedule image 😒");
        return false;
    }

    return true;
}
