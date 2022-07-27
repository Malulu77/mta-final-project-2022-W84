<?php
include("templates/header.php");
require_once 'db/connection.php';

// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: includes/login/login.php");
    exit;
}
$sql = "SELECT * FROM restaurants;";
$result = mysqli_query($conn, $sql);
$num_rows = mysqli_num_rows($result);
?>
<!doctype html>
<html dir="rtl" lang="he">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="../bootstrap/assets/dist/css/dashboard.rtl.css" rel="stylesheet">
	<link href="../bootstrap/assets/dist/css/bootstrap.rtl.min.css" rel="stylesheet" />
    <link href="../dashboard/dashboard.rtl.css" rel="stylesheet" />

	
</head>
<body>




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





<div class="container-fluid" dir="rtl">
<div class="row">
    <!--Add buttons to initiate auth sequence and sign out-->
    <button id="authorize_button" onclick="handleAuthClick()">Authorize</button>
    <button id="signout_button" onclick="handleSignoutClick()">Sign Out</button>


    <pre id="content" style="white-space: pre-wrap;"></pre>
    <nav class="col-md-2 d-none d-md-block bg-light sidebar">
        <div class="sidebar-sticky">
            <ul class="nav flex-column">
                <?php

                while($row = mysqli_fetch_assoc($result))
                {
                    echo '<li class="nav-item">
                    <a class="nav-link" href="#">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>';
                    echo $row['name'];
                    echo '</a></li>';
                }
                ?>
                <li class="nav-item">
                    <a class="nav-link active" href="#">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
                        Dashboard <span class="sr-only">(current)</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file"><path d="M13 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V9z"></path><polyline points="13 2 13 9 20 9"></polyline></svg>
                        Orders
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-shopping-cart"><circle cx="9" cy="21" r="1"></circle><circle cx="20" cy="21" r="1"></circle><path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path></svg>
                        Products
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
                        Customers
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-bar-chart-2"><line x1="18" y1="20" x2="18" y2="10"></line><line x1="12" y1="20" x2="12" y2="4"></line><line x1="6" y1="20" x2="6" y2="14"></line></svg>
                        Reports
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-layers"><polygon points="12 2 2 7 12 12 22 7 12 2"></polygon><polyline points="2 17 12 22 22 17"></polyline><polyline points="2 12 12 17 22 12"></polyline></svg>
                        Integrations
                    </a>
                </li>
            </ul>

            <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
                <span>Saved reports</span>
                <a class="d-flex align-items-center text-muted" href="#">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus-circle"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="8" x2="12" y2="16"></line><line x1="8" y1="12" x2="16" y2="12"></line></svg>
                </a>
            </h6>
            <ul class="nav flex-column mb-2">
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file-text"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line><polyline points="10 9 9 9 8 9"></polyline></svg>
                        Current month
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file-text"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line><polyline points="10 9 9 9 8 9"></polyline></svg>
                        Last quarter
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file-text"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line><polyline points="10 9 9 9 8 9"></polyline></svg>
                        Social engagement
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file-text"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line><polyline points="10 9 9 9 8 9"></polyline></svg>
                        Year-end sale
                    </a>
                </li>
            </ul>
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
</div>
</main>
</div>
</div>
<script src="../bootstrap/assets/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script>
<script src="../bootstrap/assets/dist/js/dashboard.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script>
    const CLIENT_ID = '106790926272447038931';
    const API_KEY = 'AIzaSyDliN3dTAD6-pGMW8caQQ3PQDzensy-9Yk';
    const DISCOVERY_DOC = 'https://sheets.googleapis.com/$discovery/rest?version=v4';
    const SCOPES = 'https://www.googleapis.com/auth/spreadsheets.readonly';

    let tokenClient;
    let gapiInited = false;
    let gisInited = false;

    /**
     * Callback after api.js is loaded.
     */
    function gapiLoaded() {
        gapi.load('client', intializeGapiClient);
    }
    /**
     * Callback after the API client is loaded. Loads the
     * discovery doc to initialize the API.
     */
    async function intializeGapiClient() {
        await gapi.client.init({
            apiKey: API_KEY,
            discoveryDocs: [DISCOVERY_DOC],
        });
        gapiInited = true;
        maybeEnableButtons();
    }

    /**
     * Callback after Google Identity Services are loaded.
     */
    function gisLoaded() {
        tokenClient = google.accounts.oauth2.initTokenClient({
            client_id: CLIENT_ID,
            scope: SCOPES,
            callback: '', // defined later
        });
        gisInited = true;
        maybeEnableButtons();
    }

    /**
     * Enables user interaction after all libraries are loaded.
     */
    function maybeEnableButtons() {
        if (gapiInited && gisInited) {
            document.getElementById('authorize_button').style.visibility = 'visible';
        }
    }

    /**
     *  Sign in the user upon button click.
     */
    function handleAuthClick() {
        tokenClient.callback = async (resp) => {
            if (resp.error !== undefined) {
                throw (resp);
            }
            document.getElementById('signout_button').style.visibility = 'visible';
            document.getElementById('authorize_button').innerText = 'Refresh';
            await listMajors();
        };

        if (gapi.client.getToken() === null) {
            // Prompt the user to select a Google Account and ask for consent to share their data
            // when establishing a new session.
            tokenClient.requestAccessToken({prompt: 'consent'});
        } else {
            // Skip display of account chooser and consent dialog for an existing session.
            tokenClient.requestAccessToken({prompt: ''});
        }
    }

    /**
     *  Sign out the user upon button click.
     */
    function handleSignoutClick() {
        const token = gapi.client.getToken();
        if (token !== null) {
            google.accounts.oauth2.revoke(token.access_token);
            gapi.client.setToken('');
            document.getElementById('content').innerText = '';
            document.getElementById('authorize_button').innerText = 'Authorize';
            document.getElementById('signout_button').style.visibility = 'hidden';
        }
    }

    /**
     * Print the names and majors of students in a sample spreadsheet:
     * https://docs.google.com/spreadsheets/d/1BxiMVs0XRA5nFMdKvBdBZjgmUUqptlbs74OgvE2upms/edit
     */
    async function listMajors() {
        let response;
        try {
            // Fetch first 10 files
            response = await gapi.client.sheets.spreadsheets.values.get({
                spreadsheetId: '1BxiMVs0XRA5nFMdKvBdBZjgmUUqptlbs74OgvE2upms',
                range: 'Class Data!A2:E',
            });
        } catch (err) {
            document.getElementById('content').innerText = err.message;
            return;
        }
        const range = response.result;
        if (!range || !range.values || range.values.length == 0) {
            document.getElementById('content').innerText = 'No values found.';
            return;
        }
        // Flatten to string to display
        const output = range.values.reduce(
            (str, row) => `${str}${row[0]}, ${row[4]}\n`,
            'Name, Major:\n');
        document.getElementById('content').innerText = output;
    }

</script>
<script async defer src="https://apis.google.com/js/api.js" onload="gapiLoaded()"></script>
<script async defer src="https://accounts.google.com/gsi/client" onload="gisLoaded()"></script>

</body>


<p dir="rtl">
<?php
    include("templates/footer.php");
?>
</html>