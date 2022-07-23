<?php
include("includes/templates/header.php");

// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: includes/login/login.php");
    exit;
}
?>
<!doctype html>
<html lang="he" dir="rtl">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="bootstrap/assets/dist/css/bootstrap.rtl.min.css" rel="stylesheet">
  <link rel="stylesheet" href="style/style.css">
  <meta name="generator" content="Hugo 0.98.0">

</head>
<body>

<main>
  <div id="video">
    <div class="container video-wrapper" >

    </div>
    <div class="content video-wrapper" id="videoText" >
      <h1>Maor - Deni Avdija (Prod. By Yuval Gold)</h1>
      <p>
        רגע לפני דראפט הNBA, רצינו לציין את המעמד המטורף אליו דני אבדיה הגיע.
        אין דרך יותר טובה משיר היפ הופ חדש.
      </p>
      <!-- Use a button to pause/play the video with JavaScript -->
      <button class="btn-video" id="playBtn" onclick="play()">נגן</button>
      <button class="btn-video" id="backBtn" onclick="back()">חזור</button>
    </div>
  </div>



  <!-- Marketing messaging and featurettes
  ================================================== -->
  <!-- Wrap the rest of the page in another container to center all the content. -->

  <div class="container marketing">

    <!-- Three columns of text below the carousel -->

    <div class="row">
      <div class="col-lg-4">

        <svg class="bd-placeholder-img rounded-circle" width="140" height="140" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 140x140" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><text x="50%" y="50%" fill="#777" dy=".3em"><img srcset="https://images.wcdn.co.il/f_auto,q_auto,w_300,t_54/3/3/6/9/3369687-46.jpg 969w, https://images.wcdn.co.il/f_auto,q_auto,w_300,t_54/3/3/6/9/3369687-46.jpg" alt="דני אבדיה שחקן וושינגטון וויזארדס. רויטרס" title="דני אבדיה שחקן וושינגטון וויזארדס. רויטרס"></text></svg>

        <h2 >שב למדים הלאומיים</h2>
        <p> דני אבדיה זומן לסגל נבחרת ישראל בחלון מוקדמות גביע העולם
          הישראלי של וושינגטון וויזארדס נכלל ב-19 השחקנים שזומנו לסגל הרחב לקראת השלב הראשון של מוקדמות הטורניר בעוד כחודש. גם יובל זוסמן ישוב לנבחרת לאחר היעדרות. ליגת העל: בעקבות האלימות בדרבי, יציע הפועל תל אביב עלול להיסגר לשני משחקים</p>
      </div><!-- /.col-lg-4 -->
      <div class="col-lg-4">
        <svg class="bd-placeholder-img rounded-circle" width="140" height="140" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 140x140" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><img srcset="https://images.wcdn.co.il/f_auto,q_auto,w_300,t_54/3/3/6/1/3361940-46.jpg 969w, https://images.wcdn.co.il/f_auto,q_auto,w_300,t_54/3/3/6/1/3361940-46.jpg" alt="דני אבדיה שחקן וושינגטון וויזארדס מול לברון ג'יימס שחקן לוס אנג'לס לייקרס. Patrick Smith, GettyImages" title="דני אבדיה שחקן וושינגטון וויזארדס מול לברון ג'יימס שחקן לוס אנג'לס לייקרס. Patrick Smith, GettyImages"></text></svg>

        <h2 class="fw-normal">אבדיה בסגל הנבחרת לפולין </h2>
        <p>בעוד כחודש תשחק נבחרת ישראל בחלון המשחקים האחרון של השלב הראשון במוקדמות גביע העולם, ואיגוד הכדורסל פרסם היום (שני) את 19 השחקנים שזומנו לסגל הרחב. השם החם ביותר שמופיע ברשימה הוא דני אבדיה, שחקן וושינגטון וויזארדס, שישוב לנבחרת לראשונה מאז נבחר בדראפט ה-NBA. </p>
      </div><!-- /.col-lg-4 -->
      <div class="col-lg-4">
        <svg class="bd-placeholder-img rounded-circle" width="140" height="140" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 140x140" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><img srcset="https://images.wcdn.co.il/f_auto,q_auto,w_300,t_54/3/3/2/6/3326222-46.jpg 969w, https://images.wcdn.co.il/f_auto,q_auto,w_300,t_54/3/3/2/6/3326222-46.jpg" alt="דני אבדיה ג'ואל אמביד. רויטרס" title="דני אבדיה ג'ואל אמביד. רויטרס"></text></svg>

        <h2 class="fw-normal"> נשיא המדינה אירח את דני אבדיה</h2>
        <p>בפתח המפגש נשיא המדינה שיבח את אבדיה על הישגיו והודה לו על ייצוגו הציוני בעולם: "אתה השראה עצומה. אני יודע שלהיות אדם צעיר ופופולרי זה לא דבר קל". עוד הוא הוסיף "אתה גאווה גדולה, גם בהתנהגות האנושית שלך וגם באהבת עם ישראל שקיימת בך".</p>
      </div><!-- /.col-lg-4 -->
    </div><!-- /.row -->


    <!-- START THE FEATURETTES -->

    <hr class="featurette-divider">

    <div class="row featurette">
      <div class="col-md-7">
        <h2 class="featurette-heading fw-normal lh-1" id="startArticle">דני אבדיה חוזר לסגל נבחרת ישראל</h2>
        <br>
        <p class="lead">גודס פרסם היום (שני) את סגל השחקנים הרחב שיעמוד לרשותו לשני משחקי הנבחרת הקרובים במסגרת מוקדמות גביע העולם, מול פולין בחוץ ואסטוניה בבית וכלל ברשימה מספר שחקנים שיחזרו להופעה במדים הלאומיים.

          לרשות גודס יעמדו לא פחות מ-19 שחקנים לקראת המשחקים שיתקיימו ב-30 ביוני וב-3 ליולי, כאשר מעל כולם יהיה זה דני אבדיה, שחקנה של וושינגטון וויזארדס מליגת הכדורסל הטובה בעולם שיחזור למדים הלאומיים לאחר שלא שיחק בהם בשל עונת ה-NBA וכעת ישוב לשחק עבור הנבחרת בזכות פגרת הכדורסל בארצות הברית.</p>
      </div>
      <div class="col-md-5">
        <img class="img-fluid" width="500" height="500" src="images/mainlarge1.webp"/>
      </div>
    </div>

    <hr class="featurette-divider">

    <div class="row featurette">
      <div class="col-md-7 order-md-2">
        <h2 class="featurette-heading fw-normal lh-1">השחקן המצטיין<span class="text-muted"></span></h2>
        <br>
        <p class="lead">דֶנִי אָבְדִיָה הוא כדורסלן ישראלי-סרבי, המשחק בקבוצת וושינגטון ויזארדס מליגת ה-NBA בעמדות הסמול פורוורד והפאוור פורוורד. בנוסף, אבדיה חבר בנבחרת ישראל בכדורסל. הוא זכה בשתי מדליות זהב עם ישראל בנבחרת העתודה, כולל באליפות אירופה בכדורסל עד גיל 20 בשנת 2019, שם זכה בתואר השחקן המצטיין של התחרות</p>
      </div>
      <div class="col-md-5 order-md-1">
        <img class="img-fluid" width="500" height="500" src="images/mainlarge2.jpeg"/>
      </div>
    </div>

    <hr class="featurette-divider">

    <div class="row featurette">
      <div class="col-md-7">
        <h2 class="featurette-heading fw-normal lh-1">גאווה ישראלית</h2>
        <br>
        <p class="lead"> ״אתה גאווה ישראלית, אתה מציג את פניה היפות של ישראל בסיפור בפני העולם, וזו בוודאי משימה קשה.״

        </p>
      </div>
      <div class="col-md-5">
        <img class="img-fluid" width="500" height="500" src="images/mainlarge3.jpeg"/>
      </div>
    </div>

    <hr class="featurette-divider">

    <!-- /END THE FEATURETTES -->

  </div><!-- /.container -->


<?php
    include("includes/templates/footer.php");
?>
</main>
<script>


  // Pause and play the video, and change the button text
  function play() {
    // Get the video
    var video = document.getElementById("myVideo");

    // Get the button
    var btn = document.getElementById("playBtn");
    if (video.paused) {
      video.play();
      btn.innerHTML = "עצור";
    } else {
      video.pause();
      btn.innerHTML = "נגן";
    }
  }

  function back(){
    document.getElementById("video").style.display = "none";
  }

  function video(){
    document.getElementById("video").style.display = "block";

  }
</script>

</body>
</html>
