<?php

require_once 'include.php';


?>

<html>
<head>
    <script>
        function emailCheck(){
            var ab=document.getElementsByTagName('input');
            var eMail=ab[0];
            var reg_email = /[1-9]{4}\-[01-12]\-[01-30]/g;
            if(eMail.value==""){
                alert("Please enter email address!!!");
                return false;
            }else if(reg_email.test(eMail.value)){
                alert("Email is invalid!!!")
            }
            return true;
        }
    </script>
</head>
<body>
<form method="post" action="#" onsubmit="return emailCheck()">
测试<input type="text" name="eMail">
    <br>
    <input type="submit" value="submit">
</form>
</body>
</html>
