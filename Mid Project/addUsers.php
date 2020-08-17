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
        table tr td:last-child table tr td {
            text-align: center;
            background-color: white;
            padding: 10px;
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
                        <a href="adminWork.php" style="text-decoration: none; color: #0aab8e; padding: 10px 30px; border: 1.5px solid #0aab8e; border-radius: 5px; background-color: white;">SEVICES</a>
                    </li>
                    <li>
                        <a href="addUsers.php" style="text-decoration: none; color: white; padding: 10px 30px; border: 1.5px solid #0aab8e; border-radius: 5px; background-color: #0aab8e;">ADD USERS</a>
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
                <h3 style="font-family: Roboto; margin: 20px 10px 20px 10px; color: #0aab8e" align="center">ADD USERS</h3>  
                <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                    <table width="50%" cellpadding="2" cellspacing="0" align="center" style="padding: 30px;">
                        <tr>
                            <td>
                                <input type="text" name="name" value="" placeholder="Name" style="padding: 10px; width: 300px">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="text" name="email" value="" placeholder="Email" style="padding: 10px; width: 300px">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input name="pass" type="password" placeholder="Password" style="padding: 10px; width: 300px;">
                            </td>
                        </tr>
                    </table>
                    <input name="submit" type="submit" value="ADD" style="margin: 20px auto; display: block; padding: 10px 30px; border-radius: 5px; background-color: white; border: 1.5px solid #0aab8e; cursor: pointer;">
                </form>             
            </td>
        </tr>
    </table>
</body>

</html>