<?php
print_r($_POST);

echo "<br>------<br>";
print_r($_FILES);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <script type="text/javascript">
        function AddMore(){
            var more = document.getElementById("file");
            var br = document.createElement("br");
            var input = document.createElement("input");
            var button = document.createElement("input");

            input.type = "file";
            input.name = "files[]" ;
            button.type = "button";
            button.value = "删除";


            more.appendChild(br);
            more.appendChild(input);
            more.appendChild(button);

            button.onclick = function(){
                more.removeChild(br);
                more.removeChild(input);
                more.removeChild(button);
            };
        }
    </script>
</head>
<body>
<form action="doAdminAction.php?act=addProf" method="post" theme="simple" enctype="multipart/form-data">
    <table border="1" width="50%">
        <tr>
            <td>附件:</td>
            <td id="file">
                <input type="button" value="增加附件" onclick="AddMore()">
            </td>
        </tr>
        <tr>
            <td colspan="2" align="center">
                <input type="submit" value="提交" ></td>
        </tr>
    </table>
</form>
</body>
</html>