<?php
    session_start();
    include 'php/session.php';
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
            width: 70%;
            padding: 10px;
            margin: 0px auto;
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
        #adminWork {
            border: 2px solid #0aab8e !important;
        }
    </style>
</head>

<body>
    <?php
        include 'adminNav.html';
    ?>

    <table align="center">
        <tr>
            <td width="340px" height="600px" style="background-color: #f3f5f7">
                <ul>
                    <li>
                        <a href="adminWork.php" style="text-decoration: none; color: white; padding: 10px 30px; border: 1.5px solid #0aab8e; border-radius: 5px; background-color: #0aab8e;">SEVICES</a>
                    </li>
                    <li>
                        <a href="addUsers.php" style="text-decoration: none; color: #0aab8e; padding: 10px 30px; border: 1.5px solid #0aab8e; border-radius: 5px; background-color: white;">ADD USERS</a>
                    </li>
                    <li>
                        <a href="usersList.php" style="text-decoration: none; color: #0aab8e; padding: 10px 30px; border: 1.5px solid #0aab8e; border-radius: 5px; background-color: white;">USERS LIST</a>
                    </li>
                    <li>
                        <a href="orderList.php" style="text-decoration: none; color: #0aab8e; padding: 10px 30px; border: 1.5px solid #0aab8e; border-radius: 5px; background-color: white;">ORDER LIST</a>
                    </li>
                    <li>
                        <a href="coupon.php" style="text-decoration: none; color: #0aab8e; padding: 10px 30px; border: 1.5px solid #0aab8e; border-radius: 5px; background-color: white;">COUPON</a>
                    </li>
                    <li>
                        <a href="comment_rating.php" style="text-decoration: none; color: #0aab8e; padding: 10px 30px; border: 1.5px solid #0aab8e; border-radius: 5px; background-color: white;">COMMENTS & RATING</a>
                    </li>
                    <li>
                        <a href="report.php" style="text-decoration: none; color: #0aab8e; padding: 10px 30px; border: 1.5px solid #0aab8e; border-radius: 5px; background-color: white;">REPORTS</a>
                    </li>
                    <li>
                        <a href="faqs.php" style="text-decoration: none; color: #0aab8e; padding: 10px 30px; border: 1.5px solid #0aab8e; border-radius: 5px; background-color: white;">FAQs</a>
                    </li>
                </ul>
            </td>
            <td width="800px" height="600px" style="background-color: #f3f5f7">
                <table align="center" cellspacing="90">
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