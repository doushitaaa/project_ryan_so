<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 * @var \App\View\AppView $this
 * @var string $content
 */
use Cake\Mailer\Mailer;
$this->fetch('css') ?>

<?php $this->Html->css(['emailLayout']) ?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns:v="urn:schemas-microsoft-com:vml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0;"/>
    <!--[if !mso]--><!-- -->
    <link href='https://fonts.googleapis.com/css?family=Work+Sans:300,400,500,600,700' rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Quicksand:300,400,700' rel="stylesheet">
    <!--<![endif]-->

    <title>Material Design for Bootstrap</title>


</head>


<body class="respond" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">


<img src="cid:logo">
<img src="cid:doormat">
<img src="cid:ibLogo">
<!-- header -->
<table border="0" width="100%" cellpadding="0" cellspacing="0" bgcolor="ffffff">
    <tr>
        <td align="center">
            <table border="0" align="center" width="590" cellpadding="0" cellspacing="0" class="container590">

                <tr>
                    <td height="25" style="font-size: 25px; line-height: 25px;">&nbsp;</td>
                </tr>

                <tr>
                    <td align="center">

                        <table border="0" align="center" width="590" cellpadding="0" cellspacing="0"
                               class="container590">

                            <tr>
                                <td align="center" height="70" style="height:70px;">
                                    <a href="" style="display: block; border-style: none !important; border: 0 !important;"><img width="100" border="0" style="display: block; width: 100px;" src="https://www.ibaustralia.com/assets/img/logo_topnav.png" alt="mainLogo" /></a
<!--                                    <img src="">-->

                                </td>
                            </tr>


                        </table>
                    </td>
                </tr>

                <tr>
                    <td height="25" style="font-size: 25px; line-height: 25px;">&nbsp;</td>
                </tr>

            </table>
        </td>
    </tr>
</table>
<!-- end header -->

<!-- big image section -->

<table border="0" width="100%" cellpadding="0" cellspacing="0" bgcolor="ffffff" class="bg_color">

    <tr>
        <td align="center">
            <table border="0" align="center" width="590" cellpadding="0" cellspacing="0" class="container590">

                <tr>
                    <td align="center"
                        style="color: #343434; font-size: 24px; font-family: Quicksand, Calibri, sans-serif; font-weight:700;letter-spacing: 3px; line-height: 35px;"
                        class="main-header">
                        <!-- section text ======-->

                        <div style="line-height: 35px">
                            Forgot Your Password?
                        </div>
                    </td>
                </tr>

                <tr>
                    <td height="10" style="font-size: 10px; line-height: 10px;">&nbsp;</td>
                </tr>

                <tr>
                    <td align="center">
                        <table border="0" width="40" align="center" cellpadding="0" cellspacing="0" bgcolor="eeeeee">
                            <tr>
                                <td height="2" style="font-size: 2px; line-height: 2px;">&nbsp;</td>
                            </tr>
                        </table>
                    </td>
                </tr>

                <tr>
                    <td height="20" style="font-size: 20px; line-height: 20px;">&nbsp;</td>
                </tr>

                <tr>
                    <td align="left">
                        <table border="0" width="590" align="center" cellpadding="0" cellspacing="0"
                               class="container590">
                            <tr>
                                <td align="left"
                                    style="color: #888888; font-size: 16px; font-family: 'Work Sans', Calibri, sans-serif; line-height: 24px;">
                                    <!-- section text ======-->

                                    <p style="line-height: 24px; margin-bottom:15px;">

                                        Hello,

                                    </p>
                                    <p style="line-height: 24px;margin-bottom:15px;">
                                        To reset your IB Australia Ordering System password please click the below link.
                                    </p>
                                    <table border="0" align="center" width="180" cellpadding="0" cellspacing="0"
                                           bgcolor="5caad2" style="margin-bottom:20px;">

                                        <tr>
                                            <td height="10" style="font-size: 10px; line-height: 10px;">&nbsp;</td>
                                        </tr>

                                        <tr>
                                            <td align="center"
                                                style="color: #ffffff; font-size: 14px; font-family: 'Work Sans', Calibri, sans-serif; line-height: 22px; letter-spacing: 2px;">
                                                <!-- main section button -->

                                                <!--Hey Aaron Pls place ur link here for forget password :)-->
                                                <div style="line-height: 22px;">
                                                    <a href="<?=$host?>users/changepass?token=<?=$token?>"
                                                       style="color: #ffffff; text-decoration: none;">Reset Password</a>

                                                </div>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td height="10" style="font-size: 10px; line-height: 10px;">&nbsp;</td>
                                        </tr>

                                    </table>

                                    <p style="line-height: 24px">
                                        If you didn't request this change or you no longer require a reset password,
                                        please disregard this email. </br></br>
                                        From,</br>
                                        The IB Australia team
                                    </p>

                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>


            </table>

        </td>
    </tr>

    <tr>
        <td height="40" style="font-size: 40px; line-height: 40px;">&nbsp;</td>
    </tr>

</table>

<!-- end section -->


<!-- main section -->
<table border="0" width="100%" cellpadding="0" cellspacing="0" bgcolor="2a2e36">

    <tr>
        <td align="center" background="https://www.ibaustralia.com/assets/img/logo_footer.png" style="background-image">
            <table border="0" align="center" width="590" cellpadding="0" cellspacing="0">

                <tr>
                    <td height="50" style="font-size: 50px; line-height: 50px;">&nbsp;</td>
                </tr>

                <tr>
                    <td align="center">
                        <table border="0" width="380" align="center" cellpadding="0" cellspacing="0"
                               style="border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;"
                        >

                            <tr>
                                <td align="center">
                                    <table border="0" align="center" cellpadding="0" cellspacing="0"
                                           class="container580">
                                        <tr>
                                            <td align="center"
                                                style="color: #cccccc; font-size: 30px; font-family: 'Work Sans', Calibri, sans-serif; line-height: 26px;">
                                                <!-- section text ======-->

                                                <div style="line-height: 30px">

                                                    "Doormats created by nature, crafted by humans"

                                                </div>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>

                        </table>
                    </td>
                </tr>


                <tr>
                    <td height="50" style="font-size: 50px; line-height: 50px;">&nbsp;</td>
                </tr>

            </table>
        </td>
    </tr>

</table>

<!-- end section -->

<!-- contact section -->
<table border="0" width="100%" cellpadding="0" cellspacing="0" bgcolor="ffffff" class="bg_color">

    <tr>
        <td height="60" style="font-size: 60px; line-height: 60px;">&nbsp;</td>
    </tr>

    <tr>
        <td align="center">
            <table border="0" align="center" width="590" cellpadding="0" cellspacing="0" class="container590 bg_color">

                <tr>
                    <td align="center">
                        <table border="0" align="center" width="590" cellpadding="0" cellspacing="0"
                               class="container590 bg_color">

                            <tr>
                                <td>
                                    <table border="0" width="300" align="left" cellpadding="0" cellspacing="0"
                                           style="border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;"
                                           class="container590">

                                        <tr>
                                            <!-- logo -->
                                            <td align="left">
                                                <a href=""
                                                   style="display: block; border-style: none !important; border: 0 !important;"><img
                                                        width="80" border="0" style="display: block; width: 80px;"
                                                        src="https://www.ibaustralia.com/assets/img/logo_topnav.png" alt="mainLogo"/></a>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td height="25" style="font-size: 25px; line-height: 25px;">&nbsp;</td>
                                        </tr>

                                        <tr>
                                            <td align="left"
                                                style="color: #888888; font-size: 14px; font-family: 'Work Sans', Calibri, sans-serif; line-height: 23px;"
                                                class="text_color">
                                                <div
                                                    style="color: #333333; font-size: 14px; font-family: 'Work Sans', Calibri, sans-serif; font-weight: 600; mso-line-height-rule: exactly; line-height: 23px;">

                                                    Email us: <br/> <a href="mailto:"
                                                                       style="color: #888888; font-size: 14px; font-family: 'Hind Siliguri', Calibri, Sans-serif; font-weight: 400;">rick@ibaustralia.com</a>

                                                </div>
                                            </td>
                                        </tr>

                                    </table>

                                    <table border="0" width="2" align="left" cellpadding="0" cellspacing="0"
                                           style="border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;"
                                           class="container590">
                                        <tr>
                                            <td width="2" height="10" style="font-size: 10px; line-height: 10px;"></td>
                                        </tr>
                                    </table>

                                    <table border="0" width="200" align="right" cellpadding="0" cellspacing="0"
                                           style="border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;"
                                           class="container590">

                                        <tr>
                                            <td class="hide" height="45" style="font-size: 45px; line-height: 45px;">
                                                &nbsp;
                                            </td>
                                        </tr>

                                        <tr>
                                            <td height="15" style="font-size: 15px; line-height: 15px;">&nbsp;</td>
                                        </tr>

                                    </table>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
        </td>
    </tr>

    <tr>
        <td height="60" style="font-size: 60px; line-height: 60px;">&nbsp;</td>
    </tr>

</table>
<!-- end section -->

<!-- footer ====== -->
<table border="0" width="100%" cellpadding="0" cellspacing="0" bgcolor="f4f4f4">

    <tr>
        <td height="25" style="font-size: 25px; line-height: 25px;">&nbsp;</td>
    </tr>

    <tr>
        <td align="center">

            <table border="0" align="center" width="590" cellpadding="0" cellspacing="0" class="container590">

                <tr>
                    <td>
                        <!--© IB Australia in footer-->
                        <div class="nav nav-footer justify-content-center justify-content-lg-end">
                            ©
                            <a> IB Australia, 2023</a>
                        </div>

                        <table border="0" align="left" width="5" cellpadding="0" cellspacing="0"
                               style="border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;"
                               class="container590">
                            <tr>
                                <td height="20" width="5" style="font-size: 20px; line-height: 20px;">&nbsp;</td>
                            </tr>
                        </table>

                        <table border="0" align="right" cellpadding="0" cellspacing="0"
                               style="border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;"
                               class="container590">


                        </table>
                    </td>
                </tr>

            </table>
        </td>
    </tr>

    <tr>
        <td height="25" style="font-size: 25px; line-height: 25px;">&nbsp;</td>
    </tr>

</table>
<!-- end footer ====== -->

</body>

</html>
