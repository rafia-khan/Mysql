
<?php
$db = new mysqli('localhost','root','','company');
if (isset($_POST['btnSubmit'])){
    
    $mname = $_POST['mname'];
    $maddress = $_POST['maddress'];
    $contact = $_POST['contact'];
    $db->query("call add_manufacturer('$mname','$maddress','$contact')");
}


if (isset($_POST['addbutton'])){
    
    $pname = $_POST['pname'];
    $price = $_POST['price'];
    $manufac = $_POST['manufac'];
    $db->query("call add_product('$pname',' $price','$manufac')");
}


if (isset($_POST['delete'])){
    $manufac = $_POST['manufac'];
    $db->query("delete from manufacturer where id ='$manufac'");
}



?>

    <h3>Manufacture Table</h3>

    <form action="#" method=post>
        <table>
        
            <tr>
                <td><label for="mname">Name</label></td>
                <td><input type="text" name="mname" /></td>
            </tr>
            <tr>
                <td><label for="maddress">Address</label></td>
                <td><input type="text" name="maddress" /></td>
            </tr>

            <tr>
                <td><label for="contact">Contact</label></td>
                <td><input type="text" name="contact" /></td>
            </tr>
            <tr>
            <td></td>
            <td><input type="submit" name="btnSubmit" value="submit"></td>
            </tr>
        </table>


    </form>

    <h3>Product Table</h3>

    <form action="#" method=post>
        <table>
            <tr>
                <td><label for="pname">Name</label></td>
                <td><input type="text" name="pname" /></td>
            </tr>
            <tr>
                <td><label for="price">Price</label></td>
                <td><input type="text" name="price" /></td>
            </tr>
           
            <td><label for="manufac">Manufacturer Name</label></td>
            <td>
                <select name="manufac">

                <?php
                $manufac = $db->query("select * from  manufacturer");
                while(list($pname,$price)=$manufac->fetch_row()){
                    echo"<option value='$pname'>$price</option>"; 
                }
                
                ?>
                </select>
            </td>
                 <tr>
           
                    <td><input type="submit" name="addbutton" value="submit"></td>
                </tr>        
        </table>


    </form>


     <form action="#" method=post>
        <table>
         <tr>
          <td><label for="manufac">Manufacturer Id</label></td>
             <td>
                <select name="manufac" >

                <?php
                $manufac = $db->query("select * from manufacturer");
                while(list($pname,$price)=$manufac->fetch_row()){
                    echo"<option value='$pname'>$price</option>";
                    
                }
                
                ?>
                </select>
            </td>
            </tr>
                 <tr>
           
            <td><input type="submit" name="delete" value="delete"></td>
            </tr>        
        </table>

    </form> 

    
<h3>View Product</h3>

<table border="1" style="border-collapse: collapse; background-color:powderblue;"> 

<tr>
    <th>Id</th>
    <th>Name</th>
    <th>price</th>
    <th>manme </th>
    <th>contact_no</th>

  
</tr>
<?php
    $pro =$db->query("SELECT * FROM view_product2");
    while(list($id,$name,$price,$manme,$contact_no)= $pro->fetch_row()){
        echo "<tr>
                <td>$id</td>
                <td>$name</td>
                <td>$price</td>
                <td>$manme</td>
                <td>$contact_no</td>
             </tr>";
    }
?>

	
</table>




