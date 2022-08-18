<?php
include("templates/header.php");
require_once 'db/connection.php';

// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login/login.php");
    exit;
}
$sql = "SELECT * FROM enterprises;";
$result = mysqli_query($conn, $sql);
$num_rows = mysqli_num_rows($result);
?>


<!doctype html>
    <head>
            <meta charset='utf-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1'>
        <title>Snippet - BBBootstrap</title>
        <link href='https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css' rel='stylesheet'>
        <link href='#' rel='stylesheet'>
        <script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
        <style>
        
        html{
            margin:auto;
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
          width:200px;
          color: #fff;
          background: linear-gradient(180deg, #4B91F7 0%, #367AF6 100%);
          background-origin: border-box;
          box-shadow: 0px 0.5px 1.5px rgba(54, 122, 246, 0.25), inset 0px 0.8px 0px -0.25px rgba(255, 255, 255, 0.2);
          user-select: none;
          -webkit-user-select: none;
          touch-action: manipulation;

                }<ul class="cards"><li>

            
                .button-10:focus {
                  box-shadow: inset 0px 0.8px 0px -0.25px rgba(255, 255, 255, 0.2), 0px 0.5px 1.5px rgba(54, 122, 246, 0.25), 0px 0px 0px 3.5px rgba(58, 108, 217, 0.5);
                  outline: 0;
                }
            
                .button-10:hover{
                    opacity: 70%;
                }
            
                @import url('https://fonts.googleapis.com/css2?family=Open+Sans:wght@600;700&display=swap');
            
        * {
                  box-sizing: border-box;
                }
            
                :root {
          --surface-color: #fff;
          --curve: 40;
        }

        * {
          box-sizing: border-box;
        }


        body {
          font-family: 'Noto Sans JP', sans-serif;
          background-color: #fef8f8;
        }

        .cards {
          box-sizing:border-box;
          display: grid;
          grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
          gap: 0.5rem;
          list-style-type: none;
          margin-top:5%;
          

        }

        .card {
          position: relative;
          height: 100%;  
          border-radius: calc(var(--curve) * 1px);
          overflow: hidden;
          text-decoration: none;
          display:inline-block;
          width:320px;
        }

        .card__image {      
          width: 300px;
          height: 300px;
        }

        .card__overlay {
          position: absolute;
          bottom: 0;
          left: 0;
          right: 0;
          z-index: 1;      
          border-radius: calc(var(--curve) * 1px);    
          background-color: var(--surface-color);      
          transform: translateY(100%);
          transition: .2s ease-in-out;
        }

        .card:hover .card__overlay {
          transform: translateY(0);
        }

        .card__header {
          position: relative;
          display: flex;
          align-items: center;
          gap: 2em;
          padding: 2em;
          border-radius: calc(var(--curve) * 1px) 0 0 0;    
          background-color: var(--surface-color);
          transform: translateY(-100%);
          transition: .2s ease-in-out;
        }

        .card__arc {
          width: 80px;
          height: 80px;
          position: absolute;
          bottom: 100%;
          right: 0;      
          z-index: 1;
        }

        .card__arc path {
          fill: var(--surface-color);
          d: path("M 40 80 c 22 0 40 -22 40 -40 v 40 Z");
        }       

        .card:hover .card__header {
          transform: translateY(0);
        }

        .card__thumb {
          flex-shrink: 0;
          width: 50px;
          height: 50px;      
          border-radius: 50%;      
        }

        .card__title {
          font-size: 1em;
          margin: 0 0 .3em;
          color: #6A515E;
        }

        .card__tagline {
          display: block;
          margin: 1em 0;
          font-family: "MockFlowFont";  
          font-size: .8em; 
          color: #D7BDCA;  
        }

        .card__status {
          font-size: .8em;
          color: #D7BDCA;
        }

        .card__description {
          padding: 0 2em 2em;
          margin: 0;
          color: #D7BDCA;
          font-family: "MockFlowFont";   
          display: -webkit-box;
          -webkit-box-orient: vertical;
          -webkit-line-clamp: 3;
          overflow: hidden;
        }    




                </style>

                <body className='snippet-body'>
                                        <link href="https://cdn.jsdelivr.net/gh/bbbootstrap/libraries@main/smart_wizard.min.css" rel="stylesheet" type="text/css" />
         <link href="https://cdn.jsdelivr.net/gh/bbbootstrap/libraries@main/smart_wizard_theme_arrows.min.css" rel="stylesheet" type="text/css" />
         <script type="text/javascript" src="https://cdn.jsdelivr.net/gh/bbbootstrap/libraries@main/jquery.smartWizard.min.js"></script>
         <h1 style="text-align:center; margin-top:3%;">ממשק ניהול הדרכות</h1>

 <div class="container">
     <div class="row d-flex justify-content-center mt-200"> <button type="button" class="button-10" data-toggle="modal" data-target="#exampleModal"> הוספת הדרכה חדשה </button> </div> <!-- Modal -->
     <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
         <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
             <div class="modal-content">
                 <div class="modal-header">
                     <h5 class="modal-title" id="exampleModalLabel">הוספת הדרכה חדשה</h5> <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
                 </div>
                 <div class="modal-body">
                     <div id="smartwizard">
                         <ul>
                             <li><a href="#step-1">שלב 1<br /><small>פרטי הקמפיין</small></a></li>
                             <li><a href="#step-2">שלב 2<br /><small>דרישות</small></a></li>
                             <li><a href="#step-3">שלב 3<br /><small>תאריכי קמפיין</small></a></li>
                             <li><a href="#step-4">שלב 4<br/><small>אישור קמפיין</small></a></li>
                         </ul>
                         <div class="mt-4">
                             <div id="step-1">
                                 <div class="row">
                                     <div class="col-md-6"> <input type="text" class="form-control" placeholder="מספר קמפיין" required> </div>
                                     <div class="col-md-6"> <input type="text" class="form-control" placeholder="שם הקמפיין" required> </div>
                                 </div>
                                 
                             </div>
                             <div id="step-2">
                                 <div class="row">
                                 <label for="rating" style="  text-align: right; margin-right:1%; color: #495057;" >בחר דירוג סף</label>
                                    <select name="cars" id="cars"  style="width:50%; margin-right:2%;border: 1px solid #ced4da; background-color:white;height:50px; line-height: 1.5; border-radius: 0.25rem; height: calc(1.5em + 0.75rem + 2px);padding: 0.375rem 0.75rem;font-size: 1rem;">
                                      <option value="1">1</option>
                                      <option value="2">2</option>
                                      <option value="3">3</option>
                                      <option value="4">4</option>
                                      <option value="5">5</option>

                                      
                                    </select>

                                    <label for="rating" style="text-align: right; margin-right:2%; margin-top:1%;color: #495057;" >בחר תגית</label>
                                    <select name="cars" id="cars"  style="width:50%; margin-right:2%;border: 1px solid #ced4da; background-color:white;line-height: 1.5; border-radius: 0.25rem; height: calc(1.5em + 0.75rem + 2px);padding: 0.375rem 0.75rem;font-size: 1rem;">
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
                               
                             </div>
                             <div id="step-3" class="">
                                 <div class="row">
                                    <label for="starting" style="text-align: right; margin-right:2%; margin-top:1%;color: #495057;">בחר תאריך תחילת קמפיין</label>
                                    <input type="date" id="start" name="start" style="width:50%; margin-right:2%;border: 1px solid #ced4da; background-color:white; line-height: 1.5; border-radius: 0.25rem; height: calc(1.5em + 0.75rem + 2px);padding: 0.375rem 0.75rem;font-size: 1rem;">
                                    <label for="starting" style="text-align: right; margin-right:2%; margin-top:1%;color: #495057;">בחר תאריך סיום קמפיין</label>
                                    <input type="date" id="start" name="start" style="width:50%; margin-right:2%;border: 1px solid #ced4da; background-color:white; line-height: 1.5; border-radius: 0.25rem; height: calc(1.5em + 0.75rem + 2px);padding: 0.375rem 0.75rem;font-size: 1rem;">
                                 </div>
                             </div>
                             <div id="step-4" clasConfirm detailss="">
                                 <div class="row">
                                     <span style="text-align: right; margin-right:2%; margin-top:1%;color: #495057;">לסיום הוספת קמפיין לחץ אישור</span>
                                     <p style="text-align: right; margin-right:10px;"><button class="button-10" type="submit" value="run">אישור</button></p>

                                 </div>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </div>
                                <script type='text/javascript' src='https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js'></script>
                                <script type='text/javascript' src='#'></script>
                                <script type='text/javascript' src='#'></script>
                                <script type='text/javascript' src='#'></script>
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






<ul class="cards">
        <?php

        

        while($row = mysqli_fetch_assoc($result))
        {
            echo ' 

            <div class="card">
            <img src="../images/'.$row['img'].'" class="card__image" alt="" />
             <div class="card__overlay">
              <div class="card__header">
                <svg class="card__arc" xmlns="http://www.w3.org/2000/svg"><path /></svg>                     
                <img class="card__thumb" src="https://i.imgur.com/7D7I6dI.png" alt="" />
                <div class="card__header-text">
                  <h3 class="card__title">Jessica Parker</h3>            
                  <span class="card__status">1 hour ago</span>
                </div>
              </div>
              <p class="card__description">Lorem ipsum dolor sit amet consectetur adipisicing elit. Asperiores, blanditiis?</p>
            </div>
          </div>      

           
        ';
        }
        ?>
    </div>

</ul>
                            
    </body>
</html>

