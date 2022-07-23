<?php
include("templates/header.php");

// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: includes/login/login.php");
    exit;
}
?>
<!doctype html>
<html dir="rtl" lang="he">
<head><meta charset="utf-8"><script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script><meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="../bootstrap/assets/dist/css/bootstrap.rtl.min.css" rel="stylesheet" />
	<link href="IdeaProjects/mta-final-project-2022-W84/style/style.css" rel="stylesheet" />
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	


</head>
<body>

 <script>
 
$(document).ready(function(){
  
  
   $("button").click(function(){
    alert("https://www.youtube.com/watch?v=OrfsKbZWT2c");
  });
});
  

</script>
<main>
<section class="py-5 text-center container">
<div class="row py-lg-5" dir="rtl">
<div class="col-lg-6 col-md-8 mx-auto">
<h1 class="fw-light">תקצירי המשחקים על פי #מעקבדיה</h1>
</div>
</div>
</section>

<div class="album py-5 bg-light" dir="rtl">
<div class="container">
<div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
<div class="col">
<div class="card shadow-sm">
<p><img alt="Trulli" height="100%" src="../images/games1.webp" width="100%" /></p>

<p></p>

<div class="card-body">
<p class="card-text">דני אבדיה נגד שארלוט - #מעקבדיה אחרון לעונה</p>

<p class="card-text"></p>

<div class="d-flex justify-content-between align-items-center">
<div class="btn-group"><button class="btn btn-sm btn-outline-secondary" type="button">לצפייה</button></div>

<p><small class="text-muted">9 במאי</small></p>
</div>
</div>

<p></p>
</div>
</div>

<div class="col">
<div class="card shadow-sm">
<p><img alt="Trulli" height="100%" src="../images/games2.webp" width="100%" /></p>

<p></p>

<div class="card-body">
<p class="card-text">דני אבדיה נגד מינסוטה - כשדני מקבל את ההחלטות על המגרש #מעקבדיה</p>

<div class="d-flex justify-content-between align-items-center">
<div class="btn-group"><button class="btn btn-sm btn-outline-secondary" type="button">לצפייה</button></div>

<p><span style="font-size: 13.3333px;">1 במאי</span></p>
</div>
</div>
</div>
</div>

<div class="col">
<div class="card shadow-sm">
<p><img alt="Trulli" height="100%" src="../images/games3.webp" width="100%" /></p>

<p></p>

<div class="card-body">
<p class="card-text">דני אבדיה עם שלשת קלאץ&#39; נגד הלייקרס ולברון ג&#39;יימס 2.0 #מעקבדיה</p>

<div class="d-flex justify-content-between align-items-center">
<div class="btn-group"><button class="btn btn-sm btn-outline-secondary" type="button">לצפייה</button></div>

<p><span style="font-size: 13.3333px;">24 באפריל</span></p>
</div>
</div>
</div>
</div>

<div class="col">
<div class="card shadow-sm">
<p><img alt="Trulli" height="100%" src="../images/games4.webp" width="100%" /></p>

<p></p>

<div class="card-body">
<p class="card-text">דני אבדיה נגד דנבר - משחקו הטוב ביותר העונה (ובקריירה) #מעקבדיה</p>

<div class="d-flex justify-content-between align-items-center">
<div class="btn-group"><button class="btn btn-sm btn-outline-secondary" type="button">לצפייה</button></div>

<p><span style="font-size: 13.3333px;">15 בפאריל</span></p>
</div>
</div>
</div>
</div>

<div class="col">
<div class="card shadow-sm">
<p><img alt="Trulli" height="100%" src="../images/games5.webp" width="100%" /></p>

<p></p>

<div class="card-body">
<p class="card-text">דני אבדיה נגד דטרויט - שיא קריירה בנקודות וזריקות! #מעקבדיה</p>

<div class="d-flex justify-content-between align-items-center">
<div class="btn-group"><button class="btn btn-sm btn-outline-secondary" type="button">לצפייה</button></div>

<p><span style="font-size: 13.3333px;">2 לאפריל</span></p>
</div>
</div>
</div>
</div>

<div class="col">
<div class="card shadow-sm">
<p><img alt="Trulli" height="100%" src="../images/games6.webp" width="100%" /></p>

<p></p>

<div class="card-body">
<p class="card-text">דני אבדיה נגד אטלנטה - הגיוון במשחק #מעקבדיה</p>

<div class="d-flex justify-content-between align-items-center">
<div class="btn-group"><button class="btn btn-sm btn-outline-secondary" type="button">לצפייה</button></div>

<p><span style="font-size: 13.3333px;">20 למרץ</span></p>
</div>
</div>
</div>
</div>

<p><a href="#">גלול למעלה</a></p>
</div>
</div>
</div>
</main>

 <?php
    include("templates/footer.php");
 ?>
<script src="../bootstrap/dist/js/bootstrap.bundle.min.js">
      function toggleMute() {

        var video=document.getElementById("video");

        if(video.muted){
          video.muted = false;
        } else {
          debugger;
          video.muted = true;
          video.play()
        }

      }

      $(document).ready(function(){
        setTimeout(toggleMute,3000);
      })
    </script></body>
</html>