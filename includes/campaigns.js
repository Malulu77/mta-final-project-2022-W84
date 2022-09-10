

let pattId = /(https)/i
$('body').on('keyup change paste cut', '#img', function() {
    window.ress = pattId.test($(this).val())
    if (ress === false){
        document.getElementById('error-img').innerHTML = "הקישור אינו תקין";
        document.querySelector('#next').disabled = true;
        document.getElementById("next").classList.remove('button-10');
        document.getElementById("next").classList.add('button-11');

    }

    if(ress===true){
        document.getElementById('error-img').innerHTML = "";

    }

    if(ress2 === true && ress==true){

        document.querySelector('#next').disabled = false;
        document.getElementById("next").classList.add('button-10');
        document.getElementById("next").classList.remove('button-11');

    }

});

let pattName = /[\u0590-\u05FF]/
$('body').on('keyup change paste cut', '#name', function() {
    window.ress2 = pattName.test($(this).val())
    if (ress2 === false){
        document.getElementById('error-name').innerHTML = "על שם קמפיין להכיל אותיות בלבד";
        document.querySelector('#next').disabled = true;
        document.getElementById("next").classList.remove('button-10');
        document.getElementById("next").classList.add('button-11');

    }

    if(ress2===true){
        document.getElementById('error-name').innerHTML = "";

    }


    if(ress2 === true && ress==true){

        document.querySelector('#next').disabled = false;
        document.getElementById("next").classList.add('button-10');
        document.getElementById("next").classList.remove('button-11');

    }

});





function get_res($tag,$rate,$id,$status,$name) {
    $.ajax({
        url: 'find_enterprise.php',
        type: 'POST',
        data: {'tag':$tag,
            'rate':$rate},
        success: function(data){
            console.log("The ajax request succeeded!");
            console.log("The result is: ");
            console.dir(data);
            console.log($status)
            console.log($name)
            modal1.style.display = "block";
            document.getElementById('second_subject').innerHTML = $name;
            document.getElementById('modal1-content').innerHTML = data;
            if ($status.toUpperCase()==='DONE'){
                // var bg = document.getElementById("end-email");
                // bg.style.background="gray";
                document.querySelector('#send-email').disabled = true;
                document.getElementById("send-email").classList.remove('button-10');
                document.getElementById("send-email").classList.add('button-11');

            }
            if ($status.toUpperCase()!=='DONE'){
                document.querySelector('#send-email').disabled = false;
                document.getElementById("send-email").classList.remove('button-11');
                document.getElementById("send-email").classList.add('button-10');



            }


        },
        error: function(){
            console.log("The request failed");
        }
    });

};



const sendMail = (e) => {
    let str = document.getElementById('modal1-content').innerHTML;
    let first = document.getElementById('first_subject').innerHTML;
    let second = document.getElementById('second_subject').innerHTML;
    let space = " ";

    email_subject = first + space +second;
    str.replace('<br>', "")
    Email.send({
        Host : "smtp.elasticemail.com",
        Username : "shovalevis@gmail.com",
        Password : "7C1BE78179EA1827A35A6CF0AC1832CFB1E2",
        To : 'shovalevis@gmail.com',
        From : "shovalevis@gmail.com",
        Subject : email_subject,
        Body : str
    }).then(
        message => alert('המייל נשלח בהצלחה')
    ).catch( err => {
        alert(err)
    });

}

$(document).ready(function(){

    $('#smartwizard').smartWizard({
        selected: 0,
        theme: 'arrows',
        autoAdjustHeight:true,
        transitionEffect:'fade',
        showStepURLhash: false,

    });

});

var myLink = document.querySelector('a[href="#"]');
myLink.addEventListener('click', function(e) {
    e.preventDefault();
});

