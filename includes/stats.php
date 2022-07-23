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
	<link href="../style/style.css" rel="stylesheet" /><meta name="generator" content="Hugo 0.98.0">
	<title>דני אבדיה - על דני</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	
</head>
<body>

<main>
<p dir="rtl"></p>
</main>

<p dir="rtl"></p>
</body>


<script>
 
$(document).ready(function(){
  
  
   $("li2").click(function(){
    alert("יפותח בהמשך,יש למה לצפות");
  });
  
 
   $("button").click(function(){
    alert("יפותח בהמשך,יש למה לצפות");
  });
  
});
  

</script>





<link href="../dashboard/dashboard.rtl.css" rel="stylesheet" />
<div class="container-fluid" dir="rtl">
<div class="row">
<nav class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse" id="sidebarMenu">
<div class="position-sticky pt-3">
<ul class="nav flex-column">
	<li3 class="nav-item"><a class="nav-link" href="#">נתוני התקפה </a></li3>
	<li2 class="nav-item"><a class="nav-link" href="#">נתוני הגנה </a></li2>
	<li2 class="nav-item"><a class="nav-link" href="#">נתוני הקבוצה </a></li2>

</ul>

<h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted text-uppercase"></h6>
</div>
</nav>

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
<h2>נתוני התקפה -נקודות של דני על פי חודשים</h2>

<div class="btn-toolbar mb-2 mb-md-0">
<div class="btn-group me-2"><button class="btn btn-sm btn-outline-secondary" type="button">עונתי</button><button class="btn btn-sm btn-outline-secondary" type="button">כל הזמנים</button></div>

<p><button class="btn btn-sm btn-outline-secondary dropdown-toggle" type="button">בחירת תאריך</button></p>
</div>
</div>

<p><canvas class="my-4 w-100" height="380" id="myChart" width="900"></canvas></p>

<div class="table-responsive"><span style="font-size: 24px;"><b>משחק</b></span>

<table class="table table-striped table-sm">
	<thead>
		<tr>
			<th scope="col">קבוצה מתחרה/אחוז</th>
			<th scope="col">&nbsp;מהשדה</th>
			<th scope="col">מהשלוש</th>
			<th scope="col">מהעונשין</th>
			<th scope="col">דקות משחק</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td>לייקרס</td>
			<td>78</td>
			<td>50</td>
			<td>95</td>
			<td>25</td>
		</tr>
		<tr>
			<td>מיאמי</td>
			<td>65</td>
			<td>60</td>
			<td>85</td>
			<td>35</td>
		</tr>
		<tr>
			<td>שיקגו</td>
			<td>67</td>
			<td>85</td>
			<td>90</td>
			<td>24</td>
		</tr>
		<tr>
			<td>ניו יורק</td>
			<td>68</td>
			<td>100</td>
			<td>100</td>
			<td>12</td>
		</tr>
		<tr>
			<td>ברוקלין</td>
			<td>80</td>
			<td>90</td>
			<td>87</td>
			<td>15</td>
		</tr>
		<tr>
			<td>מיניסוטה</td>
			<td>90</td>
			<td>30</td>
			<td>50</td>
			<td>32</td>
		</tr>
		<tr>
			<td>בוסטון</td>
			<td>25</td>
			<td>25</td>
			<td>84</td>
			<td>28</td>
		</tr>
		<tr>
			<td>דאלאס</td>
			<td>40</td>
			<td>50</td>
			<td>70</td>
			<td>38</td>
		</tr>
		<tr>
			<td>לוס אנג&#39;לס&nbsp;</td>
			<td>50</td>
			<td>100</td>
			<td>90</td>
			<td>40</td>
		</tr>
		<tr>
			<td>דטרויט</td>
			<td>65</td>
			<td>70</td>
			<td>65</td>
			<td>38</td>
		</tr>
		<tr>
			<td>פילדפליה</td>
			<td>66</td>
			<td>56</td>
			<td>100</td>
			<td>29</td>
		</tr>
		<tr>
			<td>מילוואקי</td>
			<td>80</td>
			<td>60</td>
			<td>80</td>
			<td>15</td>
		</tr>
		<tr>
			<td>דנבר</td>
			<td>90</td>
			<td>33</td>
			<td>75</td>
			<td>35</td>
		</tr>
	</tbody>
</table>

<p></p>
</div>
</main>
</div>
</div>

<p dir="rtl"><script src="../../Root/bootstrap/assets/dist/js/bootstrap.bundle.min.js"></script><script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script><script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script><script src="dashboard.js"></script></p>

<?php
    include("templates/footer.php");
?>
<script src="../../Root/bootstrap/assets/dist/js/bootstrap.bundle.min.js"></script><script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script><script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script><script src="../bootstrap/assets/dist/js/dashboard.js"></script></html>