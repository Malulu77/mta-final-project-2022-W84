<?php
include("templates/header.php");
require_once 'db/connection.php';

// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login/login.php");
    exit;
}
$sql = "SELECT * FROM campaigns;";
$result = mysqli_query($conn, $sql);
$num_rows = mysqli_num_rows($result);


?>
    


<html>
    <head>
            <meta charset='utf-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1'>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <link href='https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css' rel='stylesheet'>
        <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css'>
        <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css'><link rel="stylesheet" href="../style/campaigns.css">
        <script src="./validate_new_campaign.js"></script>
        <script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.all.min.js"></script>
        <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.min.css'>


        <script>

An invalid form control with name='name' is not focusable.
        function get_res($tag,$rate,$id,$status) {
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
                modal1.style.display = "block";
                document.getElementById('modal1-content').innerHTML = data;
                if ($status==='DONE'){
                  // var bg = document.getElementById("end-email");
                  // bg.style.background="gray";
                  document.querySelector('#send-email').disabled = true;
                  document.getElementById("send-email").classList.remove('button-10');
                  document.getElementById("send-email").classList.add('button-11');

                }
                if ($status!=='DONE'){
                  document.querySelector('#send-email').disabled = false;
                  document.getElementById("send-email").classList.remove('button-11');
                  document.getElementById("send-email").classList.add('button-10');


    
                }
                

            },
            error: function(){
                console.log("The request failed");
            }

        };


        </script>

        <script>


        </script>

        <style>

        .btn-group>.btn-group:not(:first-child)>.btn, .btn-group>.btn:not(:first-child) {display:none;}
        .btn-group>.btn-group:not(:last-child)>.btn, .btn-group>.btn:not(:last-child):not(.dropdown-toggle) {display:none;}
        
        html{
            margin:auto;
        }

        .mt-4 sw-container tab-content{
        height:500px;
        }


        .sw-theme-arrows>ul.step-anchor>li.active>a {
            border-color: #5cb85c!important;
            color: #fff!important;
            background: #5cb85c!important;
            width: 150px;
            text-align: center;
}

        body{
            background-image:url("../images/bk-image.jpg");
            background-attachment: fixed;

        }
        
        ::-webkit-scrollbar {
              width: 8px;
        }
        /* Track */
        ::-webkit-scrollbar-track {
              background: #f1f1f1; 
        }

        /* Handle */
        ::-webkit-scrollbar-thumb {
              background: #888; 
        }


        /* Handle on hover */
        ::-webkit-scrollbar-thumb:hover {
              background: #555;
        } body{background-color:white;
        margin:auto;}
        .form-control:focus{color: #495057;background-color: #fff;border-color: #80bdff;outline: 0;box-shadow: 0 0 0 0rem rgba(0,123,255,.25)}
        .close:focus{box-shadow: 0 0 0 0rem rgba(108,117,125,.5)}
        .mt-200{margin-top:200px}
        .button-10 {
          display: flex;
          flex-direction: column;
          align-items: center;
          padding: 6px 14px;
          font-family: -apple-system, BlinkMacSystemFont, 'Roboto', sans-serif;
          border-radius: 6px;
          border: none;
          width:300px;
          color: #fff;
          background: linear-gradient(180deg, #4B91F7 0%, #367AF6 100%);
          background-origin: border-box;
          box-shadow: 0px 0.5px 1.5px rgba(54, 122, 246, 0.25), inset 0px 0.8px 0px -0.25px rgba(255, 255, 255, 0.2);
          user-select: none;
          -webkit-user-select: none;
          touch-action: manipulation;
          margin-top:5%;

        }
            
                .button-10:focus {
                  box-shadow: inset 0px 0.8px 0px -0.25px rgba(255, 255, 255, 0.2), 0px 0.5px 1.5px rgba(54, 122, 246, 0.25), 0px 0px 0px 3.5px rgba(58, 108, 217, 0.5);
                  outline: 0;
                }
            
                .button-10:hover{
                    opacity: 70%;
                }

          .button-11 {
          display: flex;
          flex-direction: column;
          align-items: center;
          padding: 6px 14px;
          font-family: -apple-system, BlinkMacSystemFont, 'Roboto', sans-serif;
          border-radius: 6px;
          border: none;
          width:300px;
          /* color: #fff; */
          background: linear-gradient(180deg, gray 0%, gray 100%);
          background-origin: border-box;
          box-shadow: 0px 0.5px 1.5px rgba(54, 122, 246, 0.25), inset 0px 0.8px 0px -0.25px rgba(255, 255, 255, 0.2);
          user-select: none;
          -webkit-user-select: none;
          touch-action: manipulation;
          margin-top:5%;
        }

        .next-previous-button{
        float:right;
        width:20%;
        margin-right:1%;
        }

        .error{
        color:red;
        text-align:right;}





        
            
        @import url('https://fonts.googleapis.com/css2?family=Open+Sans:wght@600;700&display=swap');







                </style>

                <body className='snippet-body'>
                                        <link href="https://cdn.jsdelivr.net/gh/bbbootstrap/libraries@main/smart_wizard.min.css" rel="stylesheet" type="text/css" />
         <link href="https://cdn.jsdelivr.net/gh/bbbootstrap/libraries@main/smart_wizard_theme_arrows.min.css" rel="stylesheet" type="text/css" />
         <script type="text/javascript" src="https://cdn.jsdelivr.net/gh/bbbootstrap/libraries@main/jquery.smartWizard.min.js"></script>

 <div class="container">
  <form name="add_new_campaign" action="add_campaign.php"  method="post">
     <div class="row d-flex justify-content-right"> <button type="button" class="button-10" data-toggle="modal" data-target="#exampleModal"> הוספת קמפיין חדש </button> </div> <!-- Modal -->
     <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
         <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
             <div class="modal-content">
                 <div class="modal-header">
                     <h5 class="modal-title" id="exampleModalLabel">הוספת קמפיין חדש</h5> <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>

                 <div class="modal-body">
                     <div id="smartwizard" style="height:380px;">
                         <ul>
                             <li><a href="#step-1">שלב 1<br /><small>פרטי הקמפיין</small></a></li>
                             <li><a href="#step-2">שלב 2<br /><small>דרישות</small></a></li>
                             <li><a href="#step-3">שלב 3<br /><small>תאריכי קמפיין</small></a></li>
                             <li><a href="#step-4">שלב 4<br/><small>אישור קמפיין</small></a></li>
                         </ul>
                         <div class="mt-4">
                             <div id="step-1">
                                 <div class="row">
                                     <div class="col-md-6"> <input type="text" name="id" id="id" class="form-control" placeholder="מספר קמפיין" required> </div>
                                     <p id="error-id" class="error"></p>
                                     <div class="col-md-6"> <input type="text" name="name" id="name" class="form-control" placeholder="שם הקמפיין" required> </div>
                                     <p id="error-name" class="error"></p>
                                      <label for="image" style="text-align: right;margin-top:2%; margin-right:1%; color: #495057;"  >בחר תמונת קמפיין</label>
                                      <input id="img" name="img" type="file" onchange="return fileValidation()">
                                       <p id="error-img" class="error"></p>

                                         <button id="previous" class="button-11 sw-btn-prev  next-previous-button" disabled type="button">הקודם</button>
                                                                           <button id="next" class="button-11 sw-btn-next next-previous-button" disabled ">הבא</button>


                                 </div>


                                 
                             </div>
                             <div id="step-2">
                                 <div class="row">
                                 <label for="rating" style="text-align: right; margin-right:1%; color: #495057;" >בחר דירוג סף</label>
                                    <select name="rating" id="rating"  style="width:50%; margin-right:2%;border: 1px solid #ced4da; background-color:white;height:50px; line-height: 1.5; border-radius: 0.25rem; height: calc(1.5em + 0.75rem + 2px);padding: 0.375rem 0.75rem;font-size: 1rem;">
                                      <option value="1">1</option>
                                      <option value="2">2</option>
                                      <option value="3">3</option>
                                      <option value="4">4</option>
                                      <option value="5">5</option>

                                      
                                    </select>

                                    <label for="rating" style="text-align: right; margin-right:2%; margin-top:1%;color: #495057;" >בחר תגית</label>
                                    <select name="main_tag" id="main_tag"  style="width:50%; margin-right:2%;border: 1px solid #ced4da; background-color:white;line-height: 1.5; border-radius: 0.25rem; height: calc(1.5em + 0.75rem + 2px);padding: 0.375rem 0.75rem;font-size: 1rem;">
                                      <option value="Burger">Burger</option>
                                      <option value="Mediterenian">Mediterenian</option>
                                      <option value="Sweet">Sweet</option>
                                      <option value="Health">Health</option>
                                      <option value="Cafe">Cafe</option>
                                      <option value="Deli">Deli</option>
                                      <option value="Sandwich">Sandwich</option>
                                      <option value="Pizza">Pizza</option>
                                      <option value="Bistro">Bistro</option>
                                      <option value="Bakery">Bakery</option>
                                      <option value="Italian">Italian</option>
                                      <option value="Asian">Asian</option>
                                      <option value="Chicken">Chicken</option>
                                      <option value="Mexican">Mexican</option>

                                      
                                    </select>
                                 </div>

                                     <button class="button-10 sw-btn-prev disabled next-previous-button" type="button">הקודם</button>
                                      <button class="button-10 sw-btn-next next-previous-button" type="button">הבא</button>

                             </div>



                             <div id="step-3" class="">
                                 <div class="row">
                                    <label for="starting" style="text-align: right; margin-right:2%; margin-top:1%;color: #495057;" required>בחר תאריך תחילת קמפיין</label>
                                    <input type="date" id="starts_at" name="starts_at" style="width:50%; margin-right:2%;border: 1px solid #ced4da; background-color:white; line-height: 1.5; border-radius: 0.25rem; height: calc(1.5em + 0.75rem + 2px);padding: 0.375rem 0.75rem;font-size: 1rem;">
                                    <p id="error-start" class="error"></p>
                                    <label for="starting" style="text-align: right; margin-right:2%; margin-top:1%;color: #495057;" required>בחר תאריך סיום קמפיין</label>
                                    <input type="date" id="ends_at" name="ends_at" style="width:50%; margin-right:2%;border: 1px solid #ced4da; background-color:white; line-height: 1.5; border-radius: 0.25rem; height: calc(1.5em + 0.75rem + 2px);padding: 0.375rem 0.75rem;font-size: 1rem;">
                                    <p id="error-end" class="error"></p>

                                 </div>
                                  <button class="button-10 sw-btn-prev disabled next-previous-button" type="button">הקודם</button>
                                  <button class="button-10 sw-btn-next next-previous-button" type="button">הבא</button>
                             </div>
                             <div id="step-4" clasConfirm detailss="">
                                 <div class="row">
                                 <label for="status" style="text-align: right; margin-right:1%; color: #495057;" >בחר סטטוס קמפיין</label>
                                    <select name="status" id="status"  style="width:50%; margin-right:2%;border: 1px solid #ced4da; background-color:white;height:50px; line-height: 1.5; border-radius: 0.25rem; height: calc(1.5em + 0.75rem + 2px);padding: 0.375rem 0.75rem;font-size: 1rem;">
                                      <option value="done">Done</option>
                                      <option value="upcoming">Upcoming</option>
                                      <option value="running">Running</option>
                                    
      </select>
                                       <button class="button-10 sw-btn-prev disabled next-previous-button" type="button">הקודם</button>
                                       <button  type="submit" value="run">אישור</button>


                                 </div>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </div>
      </form>
 </div>
        <script type='text/javascript' src='https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js'></script>
        <script type='text/javascript'>$(document).ready(function(){

            $('#smartwizard').smartWizard({
                    selected: 0,
                    theme: 'arrows',
                    autoAdjustHeight:true,
                    transitionEffect:'fade',
                    showStepURLhash: false,

            });

        });</script>
        <script type='text/javascript'>var myLink = document.querySelector('a[href="#"]');
        myLink.addEventListener('click', function(e) {
          e.preventDefault();
        });</script>





<h1 style="text-align:center; margin-top:3%;">רשימת קמפיינים</h1>

<div id="mymodal1" class="modal1">
    <div class="modal1-content">
      <span class="close1">&times;</span>
      <h2 style="text-align:right;">מסעדות המשתתפות בקמפיין</h1>
      <h5 style="text-align:right;" id="modal1-content"></h5>
      <button class="button-10" id="send-email" onclick="document.location='stats.php'">לשליחת טופס השתתפות למסעדות לחץ כאן</button>
      </div>                          
 </div>






        <?php

        while($row = mysqli_fetch_assoc($result))
        {
            echo '


            <section class="light">
	            <div class="container py-2">
	            	<article class="postcard light blue">
	            	    	<div class="postcard__img_link"></div>
	            	    		<img class="postcard__img" src="../images/campaigns/'.$row['img'].'"  alt="Image Title" />
	            	    	<div class="postcard__text t-dark">
	            	    		<h1 class="postcard__title blue">'.$row['name'].'</h1>
	            	    		<div class="postcard__subtitle small">
                        <div class="mr-2 '.(($row['status']==='DONE')?' text-primary':"text-success").'">'.$row['status'].'</div>	
	            	    		</div>
	            	    		<div class="postcard__bar"></div>
	            	    		<div class="postcard__preview-txt" style="float:right;">דירוג סף - '.$row['rating'].' ★ </div>
                                <div class="postcard__preview-txt">תגית - '.$row['main_tag'].'</div>
                                <div class="postcard__preview-txt">תאריך תחילת קמפיין - '.$row['starts_at'].'</div>
                                <div class="postcard__preview-txt">תאריך סיום קמפיין - '.$row['ends_at'].'</div>

                                <button class="button-10" onclick="get_res(\'' .$row['main_tag']. '\', \'' .$row['rating']. '\',\'' .$row['id']. '\',\'' .$row['status']. '\');">למסעדות משתתפות לחץ כאן</button>  
    		
                               

                            </div>
                            
	            	</article>

                </div>                               

            </section>        

        ';

    }
        if ($_SERVER['QUERY_STRING'] == 'success') {
            echo '    <script>
                    Swal.fire("הקמפיין נשמר במערכת", "הקמפיין נשמר בהצלחה, ניתן לנהל אותו ברשימת הקמפיינים  ", "success");
            </script>';
        }
        if ($_SERVER['QUERY_STRING'] == 'error') {
            echo '    <script>
                    Swal.fire("חלה שגיאה", "וודא כי כל הפרטים מולאו כראוי", "error");
            </script>';
        }
        ?>



        
                            
    </body>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {font-family: Arial, Helvetica, sans-serif;}

/* The modal1 (background) */
.modal1 {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  padding-top: 100px; /* Location of the box */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* modal11 Content */
.modal1-content {
  background-color: #fefefe;
  padding: 20px;
  border: 1px solid #888;
  width: 80%;
  height:500px;
  margin-top:10%;
  margin-right:10%;

}

/* The Close Button */
.close1 {
  color: #aaaaaa;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close1:hover,
.close1:focus {
  color: #000;
  text-decoration: none;
  cursor: pointer;
}
</style>
</head>

<script>
// Get the modal1
var modal1 = document.getElementById("mymodal1");

// Get the button that opens the modal1
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal1
var span = document.getElementsByClassName("close1")[0];

// When the user clicks the button, open the modal1 

function click12() {
  modal1.style.display = "block";
}

// When the user clicks on <span> (x), close the modal1
span.onclick = function() {
  modal1.style.display = "none";


}

// When the user clicks anywhere outside of the modal1, close it
window.onclick = function(event) {
  if (event.target == modal1) {
    modal1.style.display = "none";


  }
}
</script>

</body>
</html>

</html>