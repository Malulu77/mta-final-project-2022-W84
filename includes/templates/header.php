<?php
session_start();
?>
<!doctype html>
<html lang="he" dir="rtl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="bootstrap/assets/dist/css/bootstrap.rtl.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style/style.css">
    <title>ניהול מסעדות עם Wolty</title>

</head>
    <body>
        <nav class="navbar navbar-expand-lg bg-light sticky-top">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">
                    <img src="../images/wolt_logo.svg" width="38" height="30" class="d-inline-block align-top" loading="lazy">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="true" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="navbar-collapse collapse show" id="navbarSupportedContent" style="">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                פרופיל
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="includes/login/reset-password.php" target="_blank" >איפוס סיסמא</a></li>
                                <li><a class="dropdown-item" href="includes/login/logout.php" target="_blank">התנתקות</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="#" target="_blank">הגדרות</a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <?php
                            if (basename($_SERVER['PHP_SELF']) == 'index.php'){
                                echo  '<a class="nav-link active" aria-current="page" href="../../index.php">ממשק ניהול</a>';
                            }
                            else {
                                echo '<a class="nav-link" aria-current="page" href="../../index.php">ממשק ניהול</a>';
                            } ?>
                        </li>
                        <li class="nav-item">
                            <?php
                            if (basename($_SERVER['PHP_SELF']) == 'training.php'){
                                echo  '<a class="nav-link active" href="../includes/training.php">הדרכות</a>';
                            }
                            else {
                                echo '<a class="nav-link" href="../includes/training.php">הדרכות</a>';
                            } ?>

                        </li>
                        <li class="nav-item">
                            <?php
                            if (basename($_SERVER['PHP_SELF']) == 'campaigns.php'){
                                echo  '<a class="nav-link active" href="../includes/campaigns.php">קמפיינים</a>';
                            }
                            else {
                                echo '<a class="nav-link" href="../includes/campaigns.php">קמפיינים</a>';
                            } ?>
                        </li>
                        <li class="nav-item">
                            <?php
                            if (basename($_SERVER['PHP_SELF']) == 'stats.php'){
                                echo  '<a class="nav-link active" href="../includes/stats.php">סטטיסטיקות</a>';
                            }
                            else {
                                echo '<a class="nav-link" href="../includes/stats.php">סטטיסטיקות</a>';
                            } ?>
                        </li>
                        <li class="nav-item">
                            <?php
                            if (basename($_SERVER['PHP_SELF']) == 'donations.php'){
                                echo  '<a class="nav-link active" href="../includes/donations.php">תרומות</a>';
                            }
                            else {
                                echo '<a class="nav-link" href="../includes/donations.php">תרומות</a>';
                            } ?>
                        </li>
                    </ul>
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item dropdown">
                            <a class="nav-link" href="../includes/donations.php">ברוך הבא, <?php echo htmlspecialchars($_SESSION["username"]); ?></a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </body>
</html>