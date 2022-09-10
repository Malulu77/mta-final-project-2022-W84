let pattName = /[\u0590-\u05FF]/
let validation_name = true;
let validation_date = true;
$('body').on('keyup change paste cut click', '#name', function() {
    if (pattName.test($(this).val())){
        document.getElementById('error-name').innerHTML = "";
        validation_name = true;

    }else {
        document.getElementById('error-name').innerHTML = "יש לציין שם הדרכה באותיות בעברית בלבד";
        validation_name = false;
    }
});

$(document).on('change click keyup', '#datepicker', function() {
    if (document.getElementById("datepicker").value == ''){
        document.getElementById('error-name-date').innerHTML = "יש לציין תאריך הדרכה";
        validation_date = false;

    }else {
        document.getElementById('error-name-date').innerHTML = "";
        validation_date = true;

    }
});

$(document).on('keyup change paste cut click', 'body', function (){
    if(validation_name && validation_date && !(document.getElementById('name').value == '') && !document.getElementById("datepicker").value == ''){

        document.getElementById('submit-btn').disabled = false;
    }
    else{
        document.getElementById('submit-btn').disabled = true;
    }
});

function openForm() {
    document.getElementById("myForm").style.display = "block";
}

function closeForm() {
    document.getElementById("myForm").style.display = "none";
}