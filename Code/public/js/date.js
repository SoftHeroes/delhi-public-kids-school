$(function () {
    $('#datetimepicker')
    var datetimepickerRef = $('#datetimepicker')
    if(datetimepickerRef){
        datetimepickerRef.datetimepicker({
            format: 'L'
        });
    }
});

$(function () {
    var DOBRef = $('#DOB');
    if(DOBRef){
        DOBRef.datetimepicker({
            format: 'L',
            maxDate: moment()
        });
    }
});
