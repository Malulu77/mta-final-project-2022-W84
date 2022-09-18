<?php
include("templates/header.php");
include("notifications.php");


require_once 'db/connection.php';

// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: includes/login/login.php");
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
        <script src="./campaigns.js"></script>
        <script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.all.min.js"></script>
        <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.min.css'>
        <script src="https://smtpjs.com/v3/smtp.js"></script>
        <link href="../style/campaigns.css" rel="stylesheet" />
        <link href='https://fonts.googleapis.com/css?family=Varela Round' rel='stylesheet'>

</head>


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
                         </ul>
                         <div class="mt-4">
                             <div id="step-1">
                                 <div class="row">

                                     <div class="col-md-6"> <input type="text" name="name" id="name" class="form-control" placeholder="שם הקמפיין" required> </div>
                                     <p id="error-name" class="error"></p>
                                     <div class="col-md-6"> <input type="text" name="img" id="img" class="form-control" placeholder="קישור לתמונת קמפיין" required> </div>
                                     <p id="error-img" class="error"></p>

                                         <button id="previous" class="button-11 sw-btn-prev  next-previous-button" disabled type="button">הקודם</button>
                                        <button id="next" class="button-11 sw-btn-next next-previous-button" disabled>הבא</button>


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
                                      <option value="Mediterranean">Mediterranean</option>
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
                                    <input type="date" value="2022-10-08" id="starts_at" name="starts_at" style="width:50%; margin-right:2%;border: 1px solid #ced4da; background-color:white; line-height: 1.5; border-radius: 0.25rem; height: calc(1.5em + 0.75rem + 2px);padding: 0.375rem 0.75rem;font-size: 1rem;">
                                    <label for="starting" style="text-align: right; margin-right:2%; margin-top:1%;color: #495057;" required>בחר תאריך סיום קמפיין</label>
                                    <input type="date" value="2022-10-10" id="ends_at" name="ends_at" style="width:50%; margin-right:2%;border: 1px solid #ced4da; background-color:white; line-height: 1.5; border-radius: 0.25rem; height: calc(1.5em + 0.75rem + 2px);padding: 0.375rem 0.75rem;font-size: 1rem;">

                                 </div>
                                 <button class="button-10 sw-btn-prev disabled next-previous-button" type="button">הקודם</button>
                                  <button class="button-10 next-previous-button" type="submit" value="run">אישור</button>
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



<h1 style="text-align:center; margin-top:3%;">רשימת קמפיינים</h1>
<br>

 <input type="search" placeholder="חיפוש מהיר.." name="search" class="form-control searchbox-input" required onkeyup="buttonUp();">
<br>


<div id="mymodal1" class="modal1">
    <div class="modal1-content">
      <span class="close1">&times;</span>

      <div id="camp_subject" style="text-align:right;">
          <h2 style="display:inline;color:black;" id="first_subject">מסעדות המשתתפות בקמפיין</h2>
          <h2 style="display:inline;color:black;" id="second_subject"></h2>
      </div>
          <h5 style="text-align:right;" id="modal1-content"></h5>


      <button class="button-10" id="send-email" onclick="sendMail(); return false">לשליחת המסעדות למחלקת השיווק לחץ כאן</button>
      </div>                          
 </div>






        <?php

        while($row = mysqli_fetch_assoc($result))
        {

        $date_now = date("Y-m-d");
        if ($date_now > $row['ends_at']) {
            $sql1="UPDATE campaigns SET status = 'DONE' WHERE id = '".$row['id']."'";
            $stmt = mysqli_prepare($conn, $sql1);
            mysqli_stmt_execute($stmt);
        }
        
        if ($date_now < $row['starts_at']) {
            $sql1="UPDATE campaigns SET status = 'UPCOMING' WHERE id = '".$row['id']."'";
            $stmt = mysqli_prepare($conn, $sql1);
            mysqli_stmt_execute($stmt);

        }

        if ($date_now > $row['starts_at'] AND $date_now < $row['ends_at']){
            $sql1="UPDATE campaigns SET status = 'RUNNING' WHERE id = '".$row['id']."'";
            $stmt = mysqli_prepare($conn, $sql1);
            mysqli_stmt_execute($stmt);

        }



            echo '



            <section class="light">
	            <div class="container py-2">
	            	<article class="postcard light blue">
	            	    	<div class="postcard__img_link"></div>
	            	    		<img class="postcard__img" src="'.$row['img'].'"  alt="Image Title" />
	            	    	<div class="postcard__text t-dark">
	            	    		<h1 class="postcard__title blue">'.$row['name'].'</h1>
	            	    		<div class="postcard__subtitle small">
                                <div class="mr-2 '.((strtoupper($row['status'])==='DONE')?' text-primary':"text-success").'">'.$row['status'].'</div>
	            	    		</div>
	            	    		<div class="postcard__bar"></div>
	            	    		<div class="postcard__preview-txt" style="float:right;">דירוג סף - '.$row['rating'].' ★ </div>
                                <div class="postcard__preview-txt">תגית - '.$row['main_tag'].'</div>
                                <div class="postcard__preview-txt">תאריך תחילת קמפיין - '.$row['starts_at'].'</div>
                                <div class="postcard__preview-txt">תאריך סיום קמפיין - '.$row['ends_at'].'</div>

                                <button class="button-10" onclick="get_res(\'' .$row['main_tag']. '\', \'' .$row['rating']. '\',\'' .$row['id']. '\',\'' .$row['status']. '\' ,\'' .$row['name']. '\');"  >למסעדות משתתפות לחץ כאן</button>



                               

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


<script>
var modal1 = document.getElementById("mymodal1");
var btn = document.getElementById("myBtn");
var span = document.getElementsByClassName("close1")[0];
function click12() {
  modal1.style.display = "block";
}
span.onclick = function() {
  modal1.style.display = "none";
}

window.onclick = function(event) {
  if (event.target == modal1) {
    modal1.style.display = "none";


  }
}
</script>


<?php

    include("templates/footer.php");
?>
</html>