<?php
include("templates/header.php");
require_once 'db/connection.php';



$sql = "SELECT * FROM enterprises;";
$result_enterprises = mysqli_query($conn, $sql);
$num_rows_enterprises = mysqli_num_rows($result_enterprises);

$sql = "SELECT password FROM users where id = 7;";
$key_result = mysqli_query($conn, $sql);
$key_row = mysqli_fetch_assoc($key_result);
$key = $key_row['password'];


// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: includes/login/login.php");
    exit;
}
?>

<!doctype html>
<html dir="rtl" lang="he">
<head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.all.min.js"></script>
        <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.min.css'>
        <script>
        function openForm() {
          document.getElementById("myForm").style.display = "block";
        }

        function closeForm() {
          document.getElementById("myForm").style.display = "none";
        }
        </script>

    <style>

    html{
        height:100%;
    }

    main{
        height:90%;
    }
    .row{
        width:100%;
    }

    .calendar-container{
        width:40%;
        display: inline-block;
        margin-left:170px;  
    }

    .pad{
        padding-right: 15px;

    }
    

    .add-training-container{
        background-color:#F5F5F5;
        border:solid gray 1px;
        border-radius: 10px;
        display: inline-block;
        width:35%;
        margin-right:10%;
        margin-bottom:10%;

    }
    .open-button {
      background-color: #555;
      color: white;
      padding: 16px 20px;
      border: none;
      cursor: pointer;
      opacity: 0.8;
      position: fixed;
      bottom: 15%;
      right: 28px;
      width: 250px;
      border-radius: 9px; 
      z-index: 5;
       

      
    }

    /* The popup chat - hidden by default */
    .chat-popup {
      display: none;
      position: fixed;
      bottom: 13%;
      right: 15px;
      border: 3px solid #f1f1f1;
      z-index: 9;
    }

    /* Add styles to the form container */
    .form-container {
      max-width: 300px;
      padding: 10px;
      background-color: white;
    }

    /* Full-width textarea */
    .form-container textarea {
      width: 100%;
      padding: 15px;
      margin: 5px 0 22px 0;
      border: none;
      background: #f1f1f1;
      resize: none;
      min-height: 200px;
    }

    /* When the textarea gets focus, do something */
    .form-container textarea:focus {
      background-color: #ddd;
      outline: none;
    }

    /* Set a style for the submit/send button */
    .form-container .btn {
      border: none;
      cursor: pointer;
      width: 100%;
      margin-bottom:10px;
      opacity: 0.8;
    }

    /* Add some hover effects to buttons */
    .form-container .btn:hover, .open-button:hover {
      opacity: 1;
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

        @media (max-width:1587px) {
            .add-training-container {
            display: block;
            width:80%;
            margin-left:20%;
            margin-top:4%;
            }
        }
        @media (max-width:830px) {
            .calendar-container{
                display:none;
            }
        }


        .button-11 {
          display: flex;
          flex-direction: column;
          align-items: center;
          padding: 6px 14px;
          font-family: -apple-system, BlinkMacSystemFont, 'Roboto', sans-serif;
          border-radius: 6px;
          border: none;
        
          color: #fff;
          background: linear-gradient(180deg, #EE4B2B	 0%, #AA4A44 100%);
           background-origin: border-box;
          box-shadow: 0px 0.5px 1.5px rgba(54, 122, 246, 0.25), inset 0px 0.8px 0px -0.25px rgba(255, 255, 255, 0.2);
          user-select: none;
          -webkit-user-select: none;
          touch-action: manipulation;
        }

        .button-11:focus {
          box-shadow: inset 0px 0.8px 0px -0.25px rgba(255, 255, 255, 0.2), 0px 0.5px 1.5px rgba(54, 122, 246, 0.25), 0px 0px 0px 3.5px rgba(58, 108, 217, 0.5);
          outline: 0;
        }

        .button-10:hover{
            opacity: 70%;
        }

        .button-11:hover{
            opacity: 70%;
        }




            </style>
            </head>
        <body>


        <main class="container-lg">
        <div class="text-black rounded bg-white" dir="rtl">
        <div class="col-md-6 px-0">
        <br>
        <h1>ממשק ניהול הדרכות</h1>

        <button class="button-10" onclick="window.open('trainings_table.php','mywin','width=700,height=700');">הדרכות רשת לפי סוג</button>

        </div>
        </div>

            <div class="calendar-container">
                <br>
                <h3 style="text-align: right;">לוח הדרכות</h3>
                <iframe src="https://calendar.google.com/calendar/embed?src=mta.2022.w84%40gmail.com&ctz=Asia%2FJerusalem" style="border: 0" width="800" height="600" frameborder="0" scrolling="no"></iframe>            </div>
                
            <div class="add-training-container">
                <div class="py-5 text-center" dir="rtl">
                    <p style="text-align: right;"></p>
                    <h2 class="pad" style="text-align: center;">הוספת הדרכה חדשה</h2>
                
                    <p class="lead pad" style="text-align: right; padding:auto;"><strong>מלאו את הטופס בכדי להוסיף הדרכה חדשה ללוח השנה<br>
                </div>
                
                <div class="row lg-3 overflow-auto" dir="rtl">
                
                    </div>
                
                    <div class="col-md-7 col-lg-8">
                        <form action="add_event.php" class="needs-validation" method="post" novalidate="">
                            <div class="row g-3">
                                <div class="col-12 pad">
                                    <p style="text-align: right;"><label class="form-label" for="name"&nbsp;</label>שם ההדרכה<input class="form-control" id="name" placeholder="" required="" type="text" value="" name="name" required/></p>
                
                                    <div class="invalid-feedback" style="text-align: right;"></div>
                                </div>
                
                                <div class="col-12 pad">
                                    <p style="text-align: right; margin-bottom: 0px;"><label class="form-label" for="name"&nbsp;</label>רשת</p>
                                    <select name="enterprises" id="enterprises" class="form-select">
                                        <?php
                                        $sql = "SELECT * FROM enterprises;";
                                        $result_enterprises = mysqli_query($conn, $sql);
                                        while($row = mysqli_fetch_assoc($result_enterprises))
                                        {
                                            $name = $row['name'];
                                            $id = $row['id'];
                                            echo '<option value="'.$id.'">'.$name.'</option>';
                                        }
                                        ?>

                                    </select>
                                </div>
                                    
                                <div class="col-12 pad">
                                    <p style="text-align: right;">
                                    <label class="form-label" for="name"&nbsp;</label>סוג הדרכה&nbsp;
                                        <select name="type" id="type" class="form-select">
                                            <option value="ipad"> אייפד</option>
                                            <option value="team"> צוותי</option>
                                        </select>
                                    
                                    </p>
                                    
                                </div>
                                    
                                <div class="col-12 pad" style="text-align: right;"><label class="form-label" for="name"&nbsp;>תאריך הדרכה</label>&nbsp;<input required class="form-control" id="date" placeholder="" type="datetime-local" name="date" /></div>
                                    
                                <div class="col-md-5">
                                    <p style="text-align: right;"></p>
                                </div>
                            </div>
                                    
                            <p style="text-align: right; margin-right:10px;"><button class="button-10" type="submit" value="run" >שמור אירוע</button></p>
                                    
                        </form>
                        <button type="button"  id="authG" onclick="handleAuthClick()" >התחבר ל Google</button>
                        <button type="button" id="saveG" onclick="add_event_to_google()"  disabled >שמור אירוע ב Google</button>
                    </div>
                </div>
            </div>
            <?php
            echo $_SERVER['QUERY_STRING'];
            if( $_SERVER['QUERY_STRING'] == 'success'){
                echo '    <script>
                    Swal.fire("האירוע נשמר במערכת", "האירוע נשמר בהצלחה, ניתן לצפות ביומן  ", "success");
            </script>';
            }
            if( $_SERVER['QUERY_STRING'] == 'error'){
                echo '    <script>
                    Swal.fire("חלה שגיאה", "וודא כי כל הפרטים מולאו כראוי", "error");
            </script>';
            }
            ?>

        <button class="open-button button-10" onclick="openForm()">הדרכות קרובות</button>
            <div class="chat-popup" id="myForm">
                  <div class="form-container">
                    <h3>הדרכות קרובות</h3>
                    <?php
                        $sql = "SELECT * FROM trainings
                                where date > now()
                                order by date asc
                                limit 5";
                        $result_trainings = mysqli_query($conn, $sql);
                        while($row = mysqli_fetch_assoc($result_trainings))
                        {
                            echo '
                            <hr/>
                            <h4 class="d-flex justify-content-between align-items-center mb-3" dir="rtl" style="text-align: left;"><span style="font-size: 13.3333px;">'.$row['name'].'</span></h4>
                        <p class="list-group-item d-flex justify-content-between lh-sm" dir="rtl" style="text-align: left;">'.$row['date'].'</p>
                            ';
                            echo '</a></li>';
                        }
                        ?>

                    <button type="button" class="btn cancel button-11" onclick="closeForm()">סגור</button>
                  </form>
            </div>
        </main>


        <script async defer src="https://apis.google.com/js/api.js" onload="gapiLoaded()"></script>
        <script async defer src="https://accounts.google.com/gsi/client" onload="gisLoaded()"></script>
        <script>

            /* exported gapiLoaded */
            /* exported gisLoaded */
            /* exported handleAuthClick */
            /* exported handleSignoutClick */

            // TODO(developer): Set to client ID and API key from the Developer Console
            const CLIENT_ID = '189386995970-jsqgsehjlbvpegiu88c9qtpqgu8n546d.apps.googleusercontent.com';
            const API_KEY = '<?php echo $key;?>';

            // Discovery doc URL for APIs used by the quickstart
            const DISCOVERY_DOC = 'https://www.googleapis.com/discovery/v1/apis/calendar/v3/rest';

            // Authorization scopes required by the API; multiple scopes can be
            // included, separated by spaces.
            const SCOPES = 'https://www.googleapis.com/auth/calendar';

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
            }



            /**
             *  Sign in the user upon button click.
             */
             function handleAuthClick() {
                tokenClient.callback = async (resp) => {
                    if (resp.error !== undefined) {
                        throw (resp);
                    }
                };

                if (gapi.client.getToken() === null) {
                    // Prompt the user to select a Google Account and ask for consent to share their data
                    // when establishing a new session.
                     tokenClient.requestAccessToken({prompt: 'consent'});
                } else {
                    // Skip display of account chooser and consent dialog for an existing session.
                    tokenClient.requestAccessToken({prompt: ''});
                }
                document.getElementById('authG').disabled = true;
                document.getElementById('saveG').disabled = false;
            }

            /**
             *  Sign out the user upon button click.
             */
            function handleSignoutClick() {
                const token = gapi.client.getToken();
                if (token !== null) {
                    google.accounts.oauth2.revoke(token.access_token);
                    gapi.client.setToken('');

                }
            }

            function validation(){

            }

            function add_event_to_google(){
                var enterprise_option = document.getElementById("enterprises");
                var enterprise_option_text = enterprise_option.options[enterprise_option.selectedIndex].text;
                var training_date = document.getElementById("date").value+":00";

                console.log(training_date);
                var event = {
                    'summary': document.getElementById("name").value,
                    'description': "Training Type: " + document.getElementById("type").value + "\n " + "Enterprise Name: " + enterprise_option_text
                    ,
                    'start': {
                        'dateTime': training_date,
                        'timeZone': 'Israel'
                    },
                    'end': {
                        'dateTime': training_date,
                        'timeZone': 'Israel'
                    }
                };

                var request = gapi.client.calendar.events.insert({
                    'calendarId': 'primary',
                    'resource': event
                });
                console.log(request);


                request.execute(function(event) {
                    appendPre('Event created: ' + event.htmlLink);
                });
            }




        </script>

    </body>
    <?php
    include("templates/footer.php");
?>
</html>
