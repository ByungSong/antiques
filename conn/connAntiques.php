<?php
// ensure all types of errors are fired.
error_reporting(-1);
// ensure errors are displayed on the page.
ini_set('display_errors','on');
// make SQL errors fire as php errors.
mysqli_report(MYSQLI_REPORT_STRICT);

$conn = mysqli_connect('localhost', 'root', 'mysql', 'antiques') or die(mysqli_connect_error());