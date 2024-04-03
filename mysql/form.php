<?php
$db = new mysqli('localhost','root','','company');

if(isset($_POST['btnsubmit'])){
 $mname=$_POST['mname'];
 $maddress=$_POST['maddress'];
 $contact_to=$_POST['contact_to'];
 
 $db->query(" call add_manufacturer('$mname','$maddress','$contact_to') ");

}




?>





<h3>Manufacture table</h3>
<form action="#" method="POST">
    <table>
        <tr>
            <td><label for="mname">Name</label></td>
            <td><input type="text" name="mname"></td>
        </tr>

        <tr>
            <td><label for="maddress">address</label></td>
            <td><input type="text" name="maddress"></td>
        </tr>

        <tr>
            <td><label for="contact_to">Contact</label></td>
            <td><input type="text" name="contact_to"></td>
        </tr>

        <tr>
            <td><input type="submit" name="btnsubmit" value="submit"></td>
        </tr>
    </table>




</form>






<!-- 
<h3>product table</h3>
<form action="" method="post">
    <table>
        <tr>
            <td><label for="mname">Name</label></td>
            <td><input type="text" name="mname"></td>
        </tr>

        <tr>
            <td><label for="contact">Contact</label></td>
            <td><input type="text" name="contact"></td>
        </tr>

        <tr>
            <td><input type="submit" name="btnsubmit" value="submit"></td>
        </tr>
    </table>




</form> -->