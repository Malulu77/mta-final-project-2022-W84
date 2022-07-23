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
<head><meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="../bootstrap/assets/dist/css/bootstrap.rtl.min.css" rel="stylesheet" />
	<link href="IdeaProjects/mta-final-project-2022-W84/style/style.css" rel="stylesheet" />
</head>
<body class="bg-light">


<div class="container">
<main>
<div class="py-5 text-center" dir="rtl">
<p style="text-align: right;"></p>

<h2 style="text-align: center;">מסך תרומות לקהילת דני אבדיה</h2>

<p class="lead" style="text-align: right;"><strong>רוצים לתרום לקהילה של דני אבדיה?<br />
רוצים שהאתר ישתפר ויתווספו דברים חדשים?<br />
ניתן לתרום כל סכום!<br />
תודה!</strong></p>
</div>

<div class="row g-3" dir="rtl">
<div class="col-md-5 col-lg-4 order-md-last">
<h4 class="d-flex justify-content-between align-items-center mb-3" dir="rtl" style="text-align: left;">תרומות אחרונות</h4>

<h4 class="d-flex justify-content-between align-items-center mb-3" dir="rtl" style="text-align: left;"><span style="font-size: 13.3333px;">נעם לוי</span></h4>

<p class="list-group-item d-flex justify-content-between lh-sm" dir="rtl" style="text-align: left;">131$</p>

<h4 class="d-flex justify-content-between align-items-center mb-3" dir="rtl" style="text-align: left;"><span style="font-size: 13.3333px;">יאניס ספרופולוס</span></h4>

<p class="list-group-item d-flex justify-content-between lh-sm" dir="rtl" style="text-align: left;">1442$</p>

<p dir="rtl" style="text-align: left;"></p>

<h4 class="d-flex justify-content-between align-items-center mb-3" dir="rtl" style="text-align: left;"><span style="font-size: 13.3333px;">עמית מלול</span></h4>


<p class="list-group-item d-flex justify-content-between lh-sm" dir="rtl" style="text-align: left;">170$</p>

<h4 class="d-flex justify-content-between align-items-center mb-3" dir="rtl" style="text-align: left;"><span style="font-size: 13.3333px;">עומר בן נון</span></h4>


<p class="list-group-item d-flex justify-content-between lh-sm" dir="rtl" style="text-align: left;">100$</p>

<p></p>
</div>

<div class="col-md-7 col-lg-8">
<form action="send_details.php" class="needs-validation" method="post" novalidate="">
<div class="row g-3">
<div class="col-sm-6">
<p style="text-align: right;"><label class="form-label" for="firstName">שם מלא&nbsp;</label><input class="form-control" id="fullname" placeholder="" required="" type="text" value="" name="fullname"/></p>

<div class="invalid-feedback" style="text-align: right;"></div>
</div>

<div class="col-12">
<p style="text-align: right;">סכום לתשלום ($)&nbsp;<input class="form-control" id="sum" placeholder="" required="" type="text" name="sum"/></p>

<div class="input-group has-validation">
<div class="invalid-feedback" style="text-align: right;">اسم المستخدم الخاص بك مطلوب.</div>
</div>
</div>

<div class="col-12">
<p style="text-align: right;">אימייל&nbsp;<input class="form-control" id="email" placeholder="you@example.com" type="text" name="email"/></p>

<div class="invalid-feedback" style="text-align: right;">يرجى إدخال عنوان بريد إلكتروني صحيح لتصلكم تحديثات الشحن.</div>
</div>

<div class="col-12">
<p style="text-align: right;">טלפון&nbsp;<input class="form-control" id="tel" placeholder="" required="" type="text" value="" name="tel"/></p>

<div class="invalid-feedback" style="text-align: right;">يرجى إدخال عنوان الشحن الخاص بك.</div>
</div>

<div class="col-12" style="text-align: right;">מספר כרטיס אשראי&nbsp;<input class="form-control" id="credit" placeholder="" type="text" name="credit" /></div>

<div class="col-md-5">
<p style="text-align: right;"></p>
</div>
</div>

<hr class="my-4" />
<p style="text-align: right;"><button class="w-100 btn btn-primary btn-lg" type="submit" value="run">שלח תרומה</button></p>
</form>
</div>
</div>
</main>

<?php
include("templates/footer.php");
?>
</div>

</body>
</html>