<?php
include("templates/header.php");
require_once 'db/connection.php';

// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: includes/login/login.php");
    exit;
}

$enterprise_id = $_SERVER['QUERY_STRING'];
$sql_current = "SELECT * FROM enterprises where id = ".$enterprise_id;
$result_current = mysqli_query($conn, $sql_current);
$row_current = mysqli_fetch_assoc($result_current);

$sql = "SELECT * FROM enterprises";
$result = mysqli_query($conn, $sql);
$num_rows = mysqli_num_rows($result);



function percent($number){
    return $number * 100 . '%';
}

function percent1($number){
    return round((1 / $number) * 100,2) . '%';
}


?>
<!doctype html>
<html dir="rtl" lang="he">
<head>
    <script src="jquery-3.6.0.min.js"></script>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="../bootstrap/assets/dist/css/dashboard.rtl.css" rel="stylesheet">
	<link href="../bootstrap/assets/dist/css/bootstrap.rtl.min.css" rel="stylesheet" />
    <script src="https://kit.fontawesome.com/ce0967b930.js" crossorigin="anonymous"></script>
    <style>

        body{
            background-image:url("../images/bk-image.jpg");
            background-attachment: fixed;


        }

        .contact-image{
            width:50px;
            height:50px;
            margin-left:5px;
        }

        .contact-image:hover{
            opacity: 50%;
        }

        .card{
            background-color:#F5F5F5;
            border:solid gray 1px;
            border-radius: 10px;
            height:100px;


        }

        .card-text{
            display: block;
            font-size:18px;
         }

        
        .card-title{
            text-align:center;
            display: inline-block;
            font-size:21px;

        }

        .image-container{
            width:25px;
            height:25px;
            margin-top:-5px;
        }

        .image-container:hover{
            width:25px;
            height:25px;
            opacity: 50%;
            margin-top:-5px;


        }
        


      .header img {
        width: 100px;
        height: 100px;
        border-radius: 50%;
        overflow: hidden;
        margin:auto;        
        display: block; 



        }

        .header h2 {
            text-align: center;
            margin-top:5px;


        }

        .button1{
            margin-top:3%;
        }

        .con-tooltip {    
        position: relative;                
        border-radius: 9px;
        display: inline-block;  
        clear:both;                   
        }
        
        /*tooltip */
        .tooltip {
        visibility: hidden;
        z-index: 1;
        opacity: .40;
        width: 210px;
        padding: 0px 20px;
        background: gray;
        color: white;
        position: absolute;
        top:-360%;
        left:-93px;
        border-radius: 9px;        
        transform: translateY(9px);
        transition: all 0.3s ease-in-out;
        font-size: 18px;
        font-weight: bold;
        box-shadow: 0 0 3px rgba(56, 54, 54, 0.86);
        }
        
        
        /* tooltip  after*/
        .tooltip::after {
        content: " ";
        width: 0;
        height: 0;
        border-style: solid;
        border-width: 12px 12.5px 0 12.5px;
        border-color: gray transparent transparent transparent;
        position: absolute;
        left: 45%;
        
        }
        
        .con-tooltip:hover .tooltip{
        visibility: visible;
        transform: translateY(-10px);
        opacity: 1;
          transition: .3s linear;
        animation: odsoky 1s ease-in-out infinite  alternate;
        
        }
        @keyframes odsoky {
        0%{
          transform: translateY(6px); 
        }
        
        100%{
          transform: translateY(1px); 
        }
        
        }


        .button-10 {
          display: flex;
          flex-direction: column;
          align-items: center;
          padding: 6px 14px;
          font-family: -apple-system, BlinkMacSystemFont, 'Roboto', sans-serif;
          border-radius: 6px;
          border: none;
        
          color: #fff;
          background: linear-gradient(180deg, #4B91F7 0%, #367AF6 100%);
           background-origin: border-box;
          box-shadow: 0px 0.5px 1.5px rgba(54, 122, 246, 0.25), inset 0px 0.8px 0px -0.25px rgba(255, 255, 255, 0.2);
          user-select: none;
          -webkit-user-select: none;
          touch-action: manipulation;
        }

        .button-10:focus {
          box-shadow: inset 0px 0.8px 0px -0.25px rgba(255, 255, 255, 0.2), 0px 0.5px 1.5px rgba(54, 122, 246, 0.25), 0px 0px 0px 3.5px rgba(58, 108, 217, 0.5);
          outline: 0;
        }

        .button-10:hover{
            opacity: 70%;
        }

        @media (max-width:1587px) {
            .row {
            display: block;
            }
            .card{
                margin-top:10px;
            }
        }

               
        </style>


	
</head>
<body>


<div class="container-fluid" dir="rtl">
<div class="row">

    <pre id="content" style="white-space: pre-wrap;"></pre>
    <nav class="col-md-2 d-none d-md-block bg-light sidebar">
        <div class="sidebar-sticky">

            <ul class="nav flex-column">
                <?php

                while($row = mysqli_fetch_assoc($result))
                {
                    $active = '';
                    if($row_current['id'] == $row['id']){
                        $active='active';}

                    echo '<li class="nav-item">
                    <a class="nav-link '.$active.'" href="stats.php?'.$row['id'].'">
                 <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" viewBox="0 0 297.653 297.653" style="enable-background:new 0 0 297.653 297.653;" xml:space="preserve">
<g>
	<path d="M38.167,66.826c-3.271,0-5.996,1.966-7.236,4.778c-0.964-3.336-3.993-5.778-7.639-5.778c-3.647,0-6.696,2.442-7.66,5.778   c-1.24-2.812-4.205-4.778-7.475-4.778c-4.418,0-8.156,3.582-8.156,8v37.363c0,9.714,7,18.017,15,21.223v106.414   c0,4.418,3.582,8,8,8s8-3.582,8-8V133.411c9-3.206,15-11.509,15-21.222V74.826C46,70.408,42.584,66.826,38.167,66.826z"/>
	<path style="fill:#B4EBDD;" d="M151.332,65.492C105.383,65.492,68,102.876,68,148.826s37.383,83.334,83.332,83.334   c45.95,0,83.334-37.384,83.334-83.334S197.282,65.492,151.332,65.492z M151.332,216.159c-37.126,0-67.331-30.205-67.331-67.333   s30.205-67.333,67.331-67.333c37.128,0,67.333,30.205,67.333,67.333S188.46,216.159,151.332,216.159z"/>
	<path d="M151.332,49.492C96.56,49.492,52,94.053,52,148.826s44.56,99.334,99.332,99.334c54.772,0,99.334-44.561,99.334-99.334   S206.104,49.492,151.332,49.492z M151.332,232.16C105.383,232.16,68,194.777,68,148.826s37.383-83.334,83.332-83.334   c45.95,0,83.334,37.384,83.334,83.334S197.282,232.16,151.332,232.16z"/>
	<path style="fill:#FFFFFF;" d="M151.332,97.493c-28.304,0-51.331,23.028-51.331,51.333s23.027,51.333,51.331,51.333   c28.305,0,51.333-23.028,51.333-51.333S179.637,97.493,151.332,97.493z"/>
	<path d="M151.332,81.493c-37.126,0-67.331,30.205-67.331,67.333s30.205,67.333,67.331,67.333c37.128,0,67.333-30.205,67.333-67.333   S188.46,81.493,151.332,81.493z M151.332,200.159c-28.304,0-51.331-23.028-51.331-51.333s23.027-51.333,51.331-51.333   c28.305,0,51.333,23.028,51.333,51.333S179.637,200.159,151.332,200.159z"/>
	<path d="M297.483,131.124l-16.334-75c-0.869-3.993-4.764-6.688-8.839-6.252c-4.064,0.438-7.31,3.867-7.31,7.954v182   c0,4.418,3.582,8,8,8s8-3.582,8-8v-90.749l13.3-9.851C296.804,137.348,298.149,134.183,297.483,131.124z"/>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
</svg>';
                    echo '&nbsp';
                    echo $row['name'];
                    echo '</a></li>';
                }
                ?>

            </ul>
            <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
                <span>סה״כ מסעדות</span>
                <span><?php echo $num_rows; ?></span>
            </h6>
            <button id="authorize_button" onclick="handleAuthClick()">Authorize</button>
            <button id="signout_button" onclick="handleSignoutClick()">Sign Out</button>

        </div>
    </nav>

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">

    <div class="container">
        <div class="header">
            <h2><?php echo $row_current['name'];?></h2>
            <img src="../images/<?php echo $row_current['img'];?>"/>
        </div>
    </div>
<div class="btn-toolbar mb-2 mb-md-0">
<div class="btn-group me-2">
    <img title="לחץ כאן לשליחת מייל למנהל הרשת" class="contact-image" src="../images/email.png" type="button" onclick="location.href='mailto:<?php echo $row_current['coo_email'];?>';">
    <img title="לחץ כאן לשליחת הודעת WhatsApp למנהל הרשת"class="contact-image" src="../images/whatsapp.png" type="button" onclick="window.location.href='https://api.whatsapp.com/send?phone=972<?php echo $row_current['coo_phone'];?>';">
    <br>
</div>




</div>
</div>
    <div class="container my-5">

        <div class="row ">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                    <p class="card-title"><b>סל ממוצע רשתי</b></p>
                        <div class="con-tooltip top">
                               <img src="../images/info.png" class="image-container" />
                                <div class="tooltip ">
                                    <p><b>ממוצע סכום הזמנה פר לקוח</b></p>
                                </div>
                        </div>
                        <p class="card-text"><?php echo "₪" . number_format($row_current['avg_basket']);?></p>

                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card">
                    <div class="card-body">
                    <p class="card-title"><b>סך הכל מכירות</b></p>
                        <div class="con-tooltip top">
                               <img src="../images/info.png" class="image-container" />
                                <div class="tooltip ">
                                    <p><b>סה"כ מכירות בשנה האחרונה</b></p>
                                </div>
                        </div>
                        <p class="card-text"><?php echo "₪" . number_format($row_current['total_sales']);?></p>

                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card">
                    <div class="card-body">
                    <p class="card-title"><b>דירוג ממוצע</b></p>
                        <div class="con-tooltip top">
                               <img src="../images/info.png" class="image-container" />
                                <div class="tooltip ">
                                    <p><b>דירוג משתמשים ממוצע מ-1 עד 5</b></p>
                                </div>
                        </div>
                        <p class="card-text"><?php echo "★" . $row_current['avg_goods_rating'];?></p>

                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card">
                    <div class="card-body">
                    <p class="card-title"><b>שיעור רכישה</b></p>
                        <div class="con-tooltip top">
                               <img src="../images/info.png" class="image-container" />
                                <div class="tooltip ">
                                    <p><b>אחוז הרוכשים מכלל המבקרים בעמוד הרשת</b></p>
                                </div>
                        </div>  
                        <p class="card-text"><?php echo percent($row_current['avg_convertion']);?></p>

                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card">
                    <div class="card-body">
                    <p class="card-title"><b>שיעור דחייה</b></p>
                        <div class="con-tooltip top">
                               <img src="../images/info.png" class="image-container" />
                                <div class="tooltip ">
                                    <p><b>אחוז דחיית הזמנות מכלל ההזמנות שהתקבלו</b></p>
                                </div>
                        </div>                         
                        <p class="card-text"><?php echo percent1($row_current['rejection_rate']);?></p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card">
                    <div class="card-body">
                    <p class="card-title"><b>כמות מכירות</b></p>
                        <div class="con-tooltip top">
                               <img src="../images/info.png" class="image-container" />
                                <div class="tooltip ">
                                    <p><b>כמות המכירות שבוצעו בשנה האחרונה</b></p>
                                </div>
                        </div>                         
                        <p class="card-text"><?php echo  number_format($row_current['purchase_count']);?></p>
                    </div>
                </div>
            </div>
            <p style="text-align: right;"><button class="button1 button-10 " type="submit" onclick="build()">משיכת נתוני עמלה היסטוריים</button></p>
        </div>

        <p><canvas class="my-2 w-30" height="100px" id="myChart" width="200px"></canvas></p>

        <div class="card-body">
            <h5 class="card-title">עמלת רשת נוכחית</h5>
            <p class="card-text"><?php echo $row_current['del_commision'];?>%</p>
        </div>
        <br>
        <form action="update_commision.php" class="needs-validation" method="post" novalidate="">
            <p style="text-align: right;"><label class="form-label" for="value"&nbsp;</label>עדכון עמלה
                <input class="form-control" id="value" type="text" value="" name="value" required/>
                <input style="display: none" class="form-control" id="id" type="text" value="<?php echo $enterprise_id; ?>" name="id"/>
            </p>
            <p style="text-align: right;"><button class="button-10" type="submit" value="run">שמור עמלה חדשה</button></p>
        </form>
    </div>


</div>


</main>
</div>
</div>
<script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>


<script>
        let row_data ;

        // TODO(developer): Set to client ID and API key from the Developer Console
        const CLIENT_ID = '189386995970-jsqgsehjlbvpegiu88c9qtpqgu8n546d.apps.googleusercontent.com';
        const API_KEY = '';

        // Discovery doc URL for APIs used by the quickstart
        const DISCOVERY_DOC = 'https://sheets.googleapis.com/$discovery/rest?version=v4';

        // Authorization scopes required by the API; multiple scopes can be
        // included, separated by spaces.
        const SCOPES = 'https://www.googleapis.com/auth/spreadsheets.readonly';

        let tokenClient;
        let gapiInited = false;
        let gisInited = false;

        document.getElementById('authorize_button').style.visibility = 'hidden';
        document.getElementById('signout_button').style.visibility = 'hidden';

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

        async function getData() {
            let response;
            try {
                // Fetch first 10 files
                response = await gapi.client.sheets.spreadsheets.values.get({
                    spreadsheetId: '1hy6XxMTJBlnuTIpWTfTcQmQUMGTM3c4uw3fnrrcLMDY',
                    range: 'Sheet1!A1:E80',
                });
            } catch (err) {
                document.getElementById('content').innerText = err.message;
            }
            const range = response.result;
            if (!range || !range.values || range.values.length == 0) {
                document.getElementById('content').innerText = 'No values found.';
            }
            row_data = range.values[<?php echo $enterprise_id;?>];
        }

        async function build(){
            getData();
            await new Promise(r => setTimeout(r, 2000));
            row_data.push(<?php echo $row_current['del_commision'];?>);
            console.log(row_data);
            const ctx = document.getElementById('myChart')
            const myChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: [
                        '2017',
                        '2018',
                        '2019',
                        '2020',
                        '2021',
                        '2022'
                    ],
                    datasets: [{
                        data: row_data,
                        lineTension: 0,
                        backgroundColor: 'transparent',
                        borderColor: '#0c38a9',
                        borderWidth: 4,
                        pointBackgroundColor: '#00b2ff'
                    }]
                },
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: false
                            }
                        }]
                    },
                    legend: {
                        display: false
                    }
                }
            })
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
