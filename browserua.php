<?php
   require("uaparser/uaparser.php");
//UA::get(); renes - add a chrono to a file with this line to run once per day
   $result = UA::parse();
   $br=$result->browser;
echo $br;
?>