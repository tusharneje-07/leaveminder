<?php
session_start();
if ($_SESSION['authfinal'] == false or $_SESSION['HODAUTH'] == false) {
    if ($_SESSION['letter_data'][5] == "GRANTED") {
        $img = "trusedmark.png";
    } else {
        $img = "untrusedmark.png";
    }
    $date = date("F j/ Y");
    $datetime = date("F j, Y, g:i a");
    echo '
    <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Leave Letter for ' . $_SESSION['fname'] . " " . $_SESSION['lname'] . '</title>
    <link rel="icon" href="images/icon-white.png" type="image/x-icon">
</head>
<style>
    body, html {
            height: 100%;
            margin: 0;
            overflow: hidden;
        }

        .container {
            display: flex;
            justify-content: center;
            align-items: center;
        }
        
        .container img {
            margin-left: 5px; /* Add some spacing between the image and text */
        }
        .watermark{
            font-family: "Franklin Gothic Medium", "Arial Narrow", Arial, sans-serif;
            font-size: 10px;
        }
        .head{
            text-align: center !important;
        }
        .vertical-text {
            writing-mode: vertical-rl; /* "rl" stands for "right-to-left" */
            text-orientation: mixed; /* Optional: Allows characters to be upright while the line is vertical */
            white-space: nowrap; /* Prevents line breaks, maintaining the vertical layout */
          }
</style>
<body oncontextmenu="return false">
    <div class="head">
        <h1>Leave Application</h1>
    </div>
    <div class="lettercontainer">
        <p>To,<br>
            &emsp; &emsp; Head of Department <br>
            &emsp; &emsp; Computer Science and Engineering <br>
            &emsp; &emsp; DKTEs Yashwantrao Chavan Polytechnic, Ichalkaranji. <br>
            <br>
            <br>
            Date : ' . $date . '<br>
            <br>
            <br>
            Subject : Application for Leave
            <br>
            <br>
            Sir, <br>
            &emsp; &emsp; I have Applied for Leave with following Details <br><br>
            &emsp; &emsp; Leave Application Date Time : <b>' . $_SESSION['letter_data'][0] . '</b><br>
            &emsp; &emsp; Leave Date From : <b>' . $_SESSION['letter_data'][1] . '</b><br>
            &emsp; &emsp; Leave Date To : <b>' . $_SESSION['letter_data'][2] . '</b><br>
            &emsp; &emsp; Leave Type : <b>' . $_SESSION['letter_data'][3] . '</b><br>
            &emsp; &emsp; Reason : <b>' . $_SESSION['letter_data'][4] . '</b><br><br>
            &emsp; &emsp; and My Leave Proposal is <b><span style="font-size: 20px;">' . $_SESSION['letter_data'][5] . '</span></b><br><br>
            &emsp; &emsp; <img src="images/' . $img . '" alt="Your Image" height="30">
 
        </p>
        <p style="text-align: right;">Thanking You,</p>
        <p style="text-align: right;">Your Faithfully,<br>
        ' . $_SESSION['fname'] . " " . $_SESSION['lname'] . ' <br>
            <br>____________<br>
        </p>
        <div class="vertical-text">
            This Letter is Printed on ' . $datetime . '
        </div>
        <div class="watermark">
            <div class="container">
                <p>This Letter is Generated by </p>
                <img src="images/logo.png" alt="Your Image" height="30">
            </div>
            <center>
                <p>Your Leave Manager!</p>
            </center>
        </div>
    </div> 
    
</body>
</html>
<script>
window.print();
document.onkeydown = (e) => {
    if (e.key == 123) {
        e.preventDefault();
    }
    if (e.ctrlKey && e.shiftKey && e.key == "I") {
        e.preventDefault();
    }
    if (e.ctrlKey && e.shiftKey && e.key == "C") {
        e.preventDefault();
    }
    if (e.ctrlKey && e.shiftKey && e.key == "J") {
        e.preventDefault();
    }
    if (e.ctrlKey && e.key == "U") {
        e.preventDefault();
    }
};
</script>
    ';

} else {
    header('location:' . 'auth.php');
}
?>