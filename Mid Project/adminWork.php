<?php
    session_start();
    include 'session.php';
    $name = $_SESSION['name'];
?>
<!DOCTYPE html>
<html>

<head>
    <title>Work</title>
    <style>
        ul {
            list-style: none;
            padding-left: 0;
        }
        ul li {
            display: block;
            width: 50%;
            border-top: 1px solid #0aab8e;
            padding: 10px;
            margin: 0px auto;
        }
        ul li:last-child {
            border-bottom: 1px solid #0aab8e;
        }
        ul li a {
            display: block;
            text-align: center;
        }
        a {
            color: black;
            text-decoration: none;
        }
        img {
            width: 150px;
            height: auto;
        }
    </style>
</head>

<body>
    <?php
        include 'adminNav.html';
    ?>

    <table align="center">
        <tr>
            <td width="350px" height="600px" style="background-color: #f3f5f7">
                <ul>
                    <li>
                        <a href="">SEVICES</a>
                    </li>
                    <li>
                        <a href="">ADD USERS</a>
                    </li>
                    <li>
                        <a href="">USERS LIST</a>
                    </li>
                    <li>
                        <a href="">ORDER LIST</a>
                    </li>
                    <li>
                        <a href="">COUPON</a>
                    </li>
                    <li>
                        <a href="">COMMENTS & RATING</a>
                    </li>
                    <li>
                        <a href="">REPORTS</a>
                    </li>
                    <li>
                        <a href="">FAQs</a>
                    </li>
                </ul>
            </td>
            <td width="600px" height="600px" style="background-color: #f3f5f7">
                <table align="center" cellspacing="100">
                    <tr>
                        <td>
                            <img src="electrician.svg">
                        </td>
                        <td>
                            <img src="electrician.svg">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <img src="electrician.svg">
                        </td>
                        <td>
                            <img src="electrician.svg">
                        </td>
                    </tr>
                </table>                
            </td>
        </tr>
    </table>
</body>

</html>