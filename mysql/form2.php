<?php
$db = mysqli_connect('localhost','root','','company');

if(isset($_POST['btnsubmit'])){
 $fname=$_POST['fname'];
 $contact=$_POST['contact'];
 $address=$_POST['address'];
 
 $db->query(" call add_manufacturer('$fname','$contact','$address')");

}




?>



<h3>Manufacture table</h3>
<form action="#" method="POST">
    <table>
        <tr>
            <td><label for="fname">Name</label></td>
            <td><input type="text" name="fname"></td>
        </tr>

        

        <tr>
            <td><label for="contact">Contact</label></td>
            <td><input type="text" name="contact"></td>
        </tr>

        <tr>
            <td><label for="address">Address</label></td>
            <td><input type="text" name="address"></td>
        </tr>


        <tr>
            <td><input type="submit" name="btnsubmit" value="submit"></td>
        </tr>
    </table>




    <?php

    if(isset($_POST['btn'])){ 
        $first = $_POST['name'];
        $second = $_POST['price'];
        $third = $_POST['manu'];

        $db->query("call add_product('$first','$second','$third')");


    }

    ?>

</form>

<h1>Product tabel</h1>
<form action="#" method="post"> 
    <tr> 
        <td><label for="name">Name</label></td><br>
        <td><input type="text" name="name"></td><br>
    </tr>

    <tr> 
        <td><label for="price">Price</label></td><br>
        <td><input type="text" name="price"></td><br>
    </tr>

    <tr> 
        <td><label for="manu">Manufacture Id</label></td><br>
        <td><input type="text" name="manu"></td><br>
    </tr>

    <tr>
			<td><label for="manufac">Manufacturer Name</label></td>
			<td>
				<select name="manufac">
					<?php 
						$manufac = $db->query("select * from manufacturer");
						while(list($_mid,$_mname,$_contact) = $manufac->fetch_row()){
							echo "<option value='$_mid'>$_mname</option>";
						}
					?>
				</select>
			</td>
		</tr>

    <tr> 
        <td><input type="submit" name="btn" value="submit"></td>
    </tr>
    
</form>


 <h3>View Product</h3>

<table border="1" style="border-collapse: collapse;" > 
	<tr>
		<th>ID</th>
		<th>Name</th>
		<th>Price</th>
		<th>Manufacturer</th>
		<th>Contact</th>
	</tr>
	 <?php 
		$product = $db->query(" select * from view_product ");
		while(list($_id,$_name,$_price,$_mnme,$_mcont) = $product->fetch_row()){
			echo "<tr> 
					<td>$_id</td>
					<td>$_name</td>
					<td>$_price</td>
					<td>$_mnme</td>
					<td>$_mcont</td>
				</tr>";
		}
	 
	?>
</table>


