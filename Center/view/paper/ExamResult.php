<?php  define('CTitler', 'Exam Result');

$paper_id = $tool->DecodeToken($_GET['token']);
$pulls = $pdo->prepare("SELECT * FROM `cbt_exams` WHERE `id`='$paper_id'");
$pulls->execute();
$exam = $pulls->fetch(PDO::FETCH_ASSOC);
$subject= $exam['subject'];
$total_question= $exam['total_question'];
// WORKING WITH THE TIME --->
$duration= $exam['duration'];
$exam_end_time=$tool->dbstr($col="exam_end_time",$table="cbt_subscription",$_sql="`student` = '$StudentID' AND `exam`='$paper_id'");
$exam_start_time=$tool->dbstr($col="exam_start_time",$table="cbt_subscription",$_sql="`student` = '$StudentID' AND `exam`='$paper_id'");
$type= $exam['type'];
 $cbt_subject=$tool->dbstr($col="subject",$table="cbt_subjects",$_sql="`id` = '$subject'");
 $cbt_subject_name=$tool->dbstr($col="grade_subject_desc",$table="grade_subjects",$_sql="`grade_subject_id` = '$cbt_subject'");
 $type=$tool->dbstr($col="name",$table="cbt_exams_type",$_sql="`id` = '$type'");
 $cbt_question_table=$tool->dbstr($col="question_table",$table="cbt_subjects",$_sql="`id` = '$subject'");
 $cbt_answer_table=$tool->dbstr($col="answer_table",$table="cbt_subjects",$_sql="`id` = '$subject'");

$CountCorrectAnswer= $tool->MyCount("SELECT COUNT(answer) AS num FROM `$cbt_answer_table` a JOIN `$cbt_question_table` b ON `a`.`answer`= `b`.`ar` WHERE `a`.`student` ='$StudentID' AND `a`.`exam` = '$paper_id' AND `a`.`question_id` =`b`.`id`");

 //$tool->Warn("You submitted your Paper! WE HAVE NOT COMPUTED YOUR RESULT YET, PLEASE CHECK BACK LATER.");
?>



<!DOCTYPE html>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/xendtech/xend-website-img/quietsans/quietsans.css">
    <style type="text/css">
        /* RESET STYLES */
        html { background-color:#E1E1E1; margin:0; padding:0; }
        body, #bodyTable, #bodyCell, #bodyCell{height:100% !important; margin:0; padding:0; width:100% !important;font-family:QuietSans, Helvetica, Arial, "Lucida Grande", sans-serif;}
        table{border-collapse:collapse;}
        table[id=bodyTable] {width:100%!important;margin:auto;max-width:500px!important;color:#7A7A7A;font-weight:normal;}
        img, a img{border:0; outline:none; text-decoration:none;height:auto; line-height:100%;}
        a {text-decoration:none !important;color:#1A37C8;}
        h1, h2, h3, h4, h5, h6{color:#5F5F5F; font-weight:normal; font-family:QuietSans, Helvetica; font-size:20px; line-height:125%; text-align:Left; letter-spacing:normal;margin-top:0;margin-right:0;margin-bottom:10px;margin-left:0;padding-top:0;padding-bottom:0;padding-left:0;padding-right:0;}

        /* CLIENT-SPECIFIC STYLES */
        .ReadMsgBody{width:100%;} .ExternalClass{width:100%;} /* Force Hotmail/Outlook.com to display emails at full width. */
        .ExternalClass, .ExternalClass p, .ExternalClass span, .ExternalClass font, .ExternalClass td, .ExternalClass div{line-height:100%;} /* Force Hotmail/Outlook.com to display line heights normally. */
        table, td{mso-table-lspace:0pt; mso-table-rspace:0pt;} /* Remove spacing between tables in Outlook 2007 and up. */
        #outlook a{padding:0;} /* Force Outlook 2007 and up to provide a "view in browser" message. */
        img{-ms-interpolation-mode: bicubic;display:block;outline:none; text-decoration:none;} /* Force IE to smoothly render resized images. */
        body, table, td, p, a, li, blockquote{-ms-text-size-adjust:100%; -webkit-text-size-adjust:100%;} /* Prevent Windows- and Webkit-based mobile platforms from changing declared text sizes. */
        .ExternalClass td[class="ecxflexibleContainerBox"] h3 {padding-top: 10px !important;} /* Force hotmail to push 2-grid sub headers down */

        /* /\/\/\/\/\/\/\/\/ TEMPLATE STYLES /\/\/\/\/\/\/\/\/ */

        /* ========== Page Styles ========== */
        h1{display:block;font-size:26px;font-style:normal;font-weight:normal;line-height:100%;}
        h2{display:block;font-size:20px;font-style:normal;font-weight:normal;line-height:120%;}
        h3{display:block;font-size:17px;font-style:normal;font-weight:normal;line-height:110%;}
        h4{display:block;font-size:18px;font-style:italic;font-weight:normal;line-height:100%;}
        .flexibleImage{height:auto;}
        .linkRemoveBorder{border-bottom:0 !important;}
        table[class=flexibleContainerCellDivider] {padding-bottom:0 !important;padding-top:0 !important;}

        body, #bodyTable{background-color:#F5F5F5;}
        #emailHeader{background-color:#E1E1E1;}
        #emailBody{background-color:#FFFFFF;}
        #emailFooter{background-color:#E1E1E1;}
        .nestedContainer{background-color:#F8F8F8; border:1px solid #CCCCCC;}
        .emailButton{background-color:#205478; border-collapse:separate;}
        .buttonContent{color:#FFFFFF; font-family:QuietSans, Helvetica; font-size:18px; font-weight:bold; line-height:100%; padding:15px; text-align:center;}
        .buttonContent a{color:#FFFFFF; display:block; text-decoration:none!important; border:0!important;}
        .emailCalendar{background-color:#FFFFFF; border:1px solid #CCCCCC;}
        .emailCalendarMonth{background-color:#205478; color:#FFFFFF; font-family:QuietSans, Helvetica, Arial, sans-serif; font-size:16px; font-weight:bold; padding-top:10px; padding-bottom:10px; text-align:center;}
        .emailCalendarDay{color:#205478; font-family:QuietSans, Helvetica, Arial, sans-serif; font-size:60px; font-weight:bold; line-height:100%; padding-top:20px; padding-bottom:20px; text-align:center;}
        .imageContentText {margin-top: 10px;line-height:0;}
        .imageContentText a {line-height:0;}
        thead th {padding: 16px 12px; font-size: 15px; color: #2D2E30; font-weight: bold; }
        #invisibleIntroduction {display:none !important;} /* Removing the introduction text from the view */

        /*FRAMEWORK HACKS & OVERRIDES */
        span[class=ios-color-hack] a {color:#275100!important;text-decoration:none!important;} /* Remove all link colors in IOS (below are duplicates based on the color preference) */
        span[class=ios-color-hack2] a {color:#205478!important;text-decoration:none!important;}
        span[class=ios-color-hack3] a {color:#8B8B8B!important;text-decoration:none!important;}

        .a[href^="tel"], a[href^="sms"] {text-decoration:none!important;color:#606060!important;pointer-events:none!important;cursor:default!important;}
        .mobile_link a[href^="tel"], .mobile_link a[href^="sms"] {text-decoration:none!important;color:#606060!important;pointer-events:auto!important;cursor:default!important;}


        /* MOBILE STYLES */
        @media only screen and (max-width: 480px){
            /*////// CLIENT-SPECIFIC STYLES //////*/
            body{width:100% !important; min-width:100% !important;} /* Force iOS Mail to render the email at full width. */

            /*td[class="textContent"], td[class="flexibleContainerCell"] { width: 100%; padding-left: 10px !important; padding-right: 10px !important; }*/
            table[id="emailHeader"],
            table[id="emailBody"],
            table[id="emailFooter"],
            table[class="flexibleContainer"],
            td[class="flexibleContainerCell"] {width:100% !important;}
            td[class="flexibleContainerBox"], td[class="flexibleContainerBox"] table {display: block;width: 100%;text-align: left;}

            td[class="imageContent"] img {height:auto !important; width:100% !important; max-width:100% !important; }
            img[class="flexibleImage"]{height: auto !important;width: auto !important; max-width: 100% !important;max-height: 55px !important;}
            img[class="flexibleImageSmall"]{height:auto !important; width:auto !important;}

            table[class="flexibleContainerBoxNext"]{padding-top: 10px !important;}

            table[class="emailButton"]{width:70% !important;}
            td[class="buttonContent"]{padding:0 !important;}
            td[class="buttonContent"] a{padding:15px !important;}

        }

        /*  CONDITIONS FOR ANDROID DEVICES ONLY
        *   http://developer.android.com/guide/webapps/targeting.html
        *   http://pugetworks.com/2011/04/css-media-queries-for-targeting-different-mobile-devices/ ;
        =====================================================*/

        @media only screen and (-webkit-device-pixel-ratio:.75){
            /* Put CSS for low density (ldpi) Android layouts in here */
        }

        @media only screen and (-webkit-device-pixel-ratio:1){
            /* Put CSS for medium density (mdpi) Android layouts in here */
        }

        @media only screen and (-webkit-device-pixel-ratio:1.5){
            /* Put CSS for high density (hdpi) Android layouts in here */
        }
        /* end Android targeting */

        /* CONDITIONS FOR IOS DEVICES ONLY
        =====================================================*/
        @media only screen and (min-device-width : 320px) and (max-device-width:568px) {

        }
        /* end IOS targeting */
    </style>

<body  bgcolor="#E1E1E1" leftmargin="0" marginwidth="0" topmargin="0" marginheight="0" offset="0">

<!-- CENTER THE EMAIL // -->

<center style="background-color:#E1E1E1;">
    <table  border="0" cellpadding="0" cellspacing="0" height="100%" width="100%" id="bodyTable" style="table-layout: fixed;max-width:100% !important;width: 100% !important;min-width: 100% !important; padding: 10px">
        <tr>
            <td align="center" valign="top" id="bodyCell">



                <!-- EMAIL BODY // -->


                <table bgcolor="#FFFFFF"  border="0" cellpadding="0" cellspacing="0" width="500" id="emailBody">

                    <!-- MODULE ROW // -->
                    <tr>
                        <td align="center" valign="top">
                            <!-- CENTERING TABLE // -->

                            <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                <tr>
                                    <td align="center" valign="top">
                                        <!-- FLEXIBLE CONTAINER // -->

                                        <table border="0" cellpadding="0" cellspacing="0" width="500" class="flexibleContainer">
                                            <tr>
                                                <td align="center" valign="top" width="500" class="flexibleContainerCell">

                                                    <!-- CONTENT TABLE // -->

                                                    <table border="0" cellpadding="30" cellspacing="0" width="100%">
                                                        <tr>
                                                            <td align="center" valign="top" class="textContent">
                                                                <img src="https://www.enugusme.en.gov.ng/wp-content/uploads/2018/05/cropped-enugu-sme-logo-d.png" class="flexibleImage" style="max-height: 75px;width: auto;display: block;" alt="" />
                                                            </td>
                                                        </tr>
                                                    </table>
                                                    <!-- // CONTENT TABLE -->

                                                </td>
                                            </tr>
                                        </table>
                                        <!-- // FLEXIBLE CONTAINER -->
                                    </td>
                                </tr>
                            </table>
                            <!-- // CENTERING TABLE -->
                        </td>
                    </tr>
                    <!-- // MODULE ROW -->

                    <!-- MODULE DIVIDER // -->
                    <tr>
                        <td align="center" valign="top">
                            <!-- CENTERING TABLE // -->
                            <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                <tr>
                                    <td align="center" valign="top">
                                        <!-- FLEXIBLE CONTAINER // -->
                                        <table border="0" cellpadding="0" cellspacing="0" width="500" class="flexibleContainer">
                                            <tr>
                                                <td align="center" valign="top" width="500" class="flexibleContainerCell">
                                                    <table class="flexibleContainerCellDivider" border="0" cellpadding="30" cellspacing="0" width="100%">
                                                        <tr>
                                                            <td align="center" valign="top" style="padding-top:0px;padding-bottom:0px;">

                                                                <!-- CONTENT TABLE // -->
                                                                <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                                                    <tr>
                                                                        <td align="center" valign="top" style="border-top:1px solid #C8C8C8;">
                                                                            <div style="margin-bottom: 1rem"></div>
                                                                        </td>
                                                                    </tr>
                                                                </table>
                                                                <!-- // CONTENT TABLE -->

                                                            </td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                        </table>
                                        <!-- // FLEXIBLE CONTAINER -->
                                    </td>
                                </tr>
                            </table>
                            <!-- // CENTERING TABLE -->
                        </td>
                    </tr>
                    <!-- // END -->


                    <!-- MODULE ROW // -->
                    <tr>
                        <td style="padding: 15px" align="center" valign="top">
                            <!-- CENTERING TABLE // -->
                            <table  border="0" cellpadding="0" cellspacing="0" width="100%">
                                <tr>
                                    <td align="center" valign="top">
                                        <!-- FLEXIBLE CONTAINER // -->
                                        <table border="0" cellpadding="0" cellspacing="0" width="500" class="flexibleContainer">
                                            <tr>
                                                <td align="center" valign="top" width="500" class="flexibleContainerCell">
                                                    <table border="0" cellpadding="30" cellspacing="0" width="100%">
                                                        <tr>
                                                            <td align="center" valign="top">

                                                                <!-- CONTENT TABLE // -->
                                                                <table  border="0" cellpadding="0" cellspacing="0" width="100%">
                                                                    <tr>
                                                                        <td valign="top" class="textContent">

                                                                            <h3 mc:edit="header" style="color:#2D2E30;line-height:125%;font-family:QuietSans,Helvetica,Arial,sans-serif;font-size:19px;margin-top:0;margin-bottom:2rem;text-align:left;">Hi <?php echo $Student;?>,</h3>
                                                                            <h3 mc:edit="header" style="color:#1A37C8;line-height:125%;font-family:QuietSans,Helvetica,Arial,sans-serif;font-size:21px;font-weight:bold;margin-top:0;margin-bottom:2rem;text-align:left;">Enugu SME Financial Literacy test Results!</h3>
                                                                            <div mc:edit="body" style="text-align:left;font-family:QuietSans,Helvetica,Arial,sans-serif;font-size:17px;margin-bottom:10px;color:#2D2E30;line-height:1.6rem;">
                                                                                You scored <b><?php echo $tool->GetScoreColor($CountCorrectAnswer, $total_question);?></b> in our just concluded <b> <?=$cbt_subject_name?> </b>
                                                                            </div>
                                                                            <div mc:edit="body" style="text-align:left;font-family:QuietSans,Helvetica,Arial,sans-serif;font-size:17px;margin-bottom:0;color:#2D2E30;line-height:1.6rem;">
                                                                                You can start another test after 48 hours!
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                </table>
                                                                <!-- // CONTENT TABLE -->

                                                            </td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                        </table>
                                        <!-- // FLEXIBLE CONTAINER -->
                                    </td>
                                </tr>
                            </table>
                            <!-- // CENTERING TABLE -->
                        </td>
                    </tr>
                    <!-- // MODULE ROW -->


                    <!-- MODULE ROW // -->

                    <tr>
                        <td align="center" valign="top">
                            <!-- CENTERING TABLE // -->
                            <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                <tr style="padding-top:0;">
                                    <td align="center" valign="top">
                                        <!-- FLEXIBLE CONTAINER // -->
                                        <table border="0" cellpadding="30" cellspacing="0" width="500" class="flexibleContainer">
                                            <tr>
                                                <td style="padding-top:0;" valign="top" width="500" class="flexibleContainerCell">

                                                    <!-- CONTENT TABLE // -->
                                                    <table border="0" cellpadding="0" cellspacing="0" width="40%" class="emailButton" style="background-color: #1A37C8; border-radius: 3px; border: 3px solid #EEEFF2;">
                                                        <tr>
                                                            <td align="center" class="buttonContent" style="padding-top:15px;padding-bottom:15px;padding-right:15px;padding-left:15px;">
                                                                <a style="color:#FFFFFF;text-decoration:none;font-family:QuietSans,Helvetica,Arial,sans-serif;font-size:15px;line-height:135%;" href="<?=siteurl?>" target="_blank">Start New Test</a>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                    <!-- // CONTENT TABLE -->

                                                </td>
                                            </tr>
                                        </table>
                                        <!-- // FLEXIBLE CONTAINER -->
                                    </td>
                                </tr>
                            </table>
                            <!-- // CENTERING TABLE -->
                        </td>
                    </tr>
                    <!-- // MODULE ROW -->


                    <!-- MODULE ROW // -->
                    <tr>
                        <td align="center" valign="top">
                            <!-- CENTERING TABLE // -->
                            <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                <tr>
                                    <td align="center" valign="top">
                                        <!-- FLEXIBLE CONTAINER // -->
                                        <table border="0" cellpadding="0" cellspacing="0" width="500" class="flexibleContainer">
                                            <tr>
                                                <td align="center" valign="top" width="500" class="flexibleContainerCell">
                                                    <table border="0" cellpadding="30" cellspacing="0" width="100%">
                                                        <tr>
                                                            <td align="center" valign="top" style="padding-top:0;">

                                                                <!-- CONTENT TABLE // -->
                                                                <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                                                    <tr>
                                                                        <td valign="top" class="textContent">

                                                                            <h3 mc:edit="header" style="line-height:125%;font-family:QuietSans,Helvetica,Arial,sans-serif;font-size:16px;font-weight:bold;margin-top:0;margin-bottom:3px;text-align:left;color:#2D2E30;">&nbsp;&nbsp;&nbsp;Regards,</h3>
                                                                            <div mc:edit="body" style="text-align:left;font-family:QuietSans,Helvetica,Arial,sans-serif;font-size:17px;margin-bottom:0;color:#2D2E30;line-height:135%;">
                                                                                &nbsp;&nbsp;&nbsp; Enugu SME
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                </table>
                                                                <!-- // CONTENT TABLE -->

                                                            </td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                        </table>
                                        <!-- // FLEXIBLE CONTAINER -->
                                    </td>
                                </tr>
                            </table>
                            <!-- // CENTERING TABLE -->
                        </td>
                    </tr>
                    <!-- // MODULE ROW -->


                </table>
                <!-- // END -->

                <!-- EMAIL FOOTER // -->

                <table border="0" cellpadding="0" cellspacing="0">

                    <!-- FOOTER ROW // -->

                    <tr>
                        <td align="center" valign="top">
                            <!-- CENTERING TABLE // -->

                            <!-- // CENTERING TABLE -->
                        </td>
                    </tr>

                </table>
                <!-- // END -->

            </td>
        </tr>
    </table>
</center>
</body>

