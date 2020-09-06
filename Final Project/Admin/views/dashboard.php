<?php
    session_start();
    include '../php/session.php';
?>

<!DOCTYPE html>
<html>

<head>
    <title>Logged in Dashboard</title>
    <link rel="stylesheet" type="text/css" href="../css/body.css">
    <link rel="stylesheet" type="text/css" href="../css/dashboard.css">
    <link rel="stylesheet" type="text/css" href="../css/nav.css">
    <script type="text/javascript" src="../js/adminNav.js"></script>
</head>

<body>
    <?php
        include 'adminNav.html';
    ?>
    <div id="hero_section">
        <h1 class="item">Most Powerful Directory<span></span>Available for Service Providers</h1>
        <form action="" method="" class="item">
            <input type="text" name="search" value="" placeholder="I'm looking for">
            <div>Job</div>
            <button>
                <a href="#">search</a>
            </button>
        </form>
    </div>
</body>

</html>