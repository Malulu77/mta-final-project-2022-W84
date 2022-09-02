

let pattId = /^[0-9]+$/
$('body').on('keyup change paste cut', '#id', function() {
    window.ress = pattId.test($(this).val())
    if (ress === false){
        document.getElementById('error-id').innerHTML = "על מספר קמפיין להכיל ספרות בלבד";
        document.querySelector('#next').disabled = true;
        document.getElementById("next").classList.remove('button-10');
        document.getElementById("next").classList.add('button-11');

    }

    if(ress===true){
        document.getElementById('error-id').innerHTML = "";

    }

});

let pattName = /[\u0590-\u05FF]/
$('body').on('keyup change paste cut', '#name', function() {
    let ress2 = pattName.test($(this).val())
    if (ress2 === false){
        document.getElementById('error-name').innerHTML = "על שם קמפיין להכיל אותיות בלבד";
        document.querySelector('#next').disabled = true;
        document.getElementById("next").classList.remove('button-10');
        document.getElementById("next").classList.add('button-11');

    }

    if(ress2===true){
        document.getElementById('error-name').innerHTML = "";

    }


    if(ress2 === true && ress === true){

        document.querySelector('#next').disabled = false;
        document.getElementById("next").classList.add('button-10');
        document.getElementById("next").classList.remove('button-11');

    }

});





