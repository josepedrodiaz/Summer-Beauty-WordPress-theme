<?php
/*
Template Name: PAGE check_availability_processa
*/
?>

<?php

	get_header(); 

	
 ?>

	<p></p>

	<?php print_r($_POST);  ?>

	<br><br>

	<!-- booking_processa.php  -->
	<form action="booking-processa" method="POST">

		<div>
			<div style="float:left; width: 70px;"><?php _e('HOTEL:','El-Misti'); ?></div>
			<input type="text" name="hotel_ID" value="<?php echo $_POST["hotel_id"] ?>"> 
			WooCommerce Product_ID :
			<input type="text" name="product_id" value="<?php echo $_POST["product_id"] ?>" style="width: 30px;"></div><br />
			<div style="float:left; width: 70px;"><?php _e('Período:','El-Misti'); ?></div>
			<div style="float:left;"><input type="text" name="arrival" value="<?php echo $_POST["arrival"] ?>"></div>
			<div style="float:left;">&nbsp;a&nbsp; </div>
			<div style="float:left;"><input type="text" name="departure" value="<?php echo $_POST["departure"] ?>"></div>
			<div style="float:left;"><?php _e('Data atual:','El-Misti'); ?></div>
			<div><input type="text" name="createDateTime" value="<?= date('d/m/Y', time()); ?>" ></div>
			<div>&nbsp;</div>
			<div style="float:left; width: 70px;">Adults:</div>
			<div style="float:left;"><input type="text" name="adults" value="<?php echo $_POST["adults"] ?>" style="width: 30px;"></div>
			<div style="float:left; width: 70px;">Child:</div>
			<div style="float:left;"><input type="text" name="child" value="<?php echo $_POST["child"] ?>" style="width: 30px;"></div>
			<div style="float:left; width: 70px;">Babies:</div>
			<div style="float:left;"><input type="text" name="babies" value="<?php echo $_POST["babies"] ?>" style="width: 30px;"></div>
			<div style="float:left;">Booking ID</div>
			<div><input type="text" name="booking_id" value="<?= time(); ?>" ></div>
		</div>

		<div>&nbsp;</div>

		<table border="1" cellpadding="3" cellspacing="0">
			<tr>			
				<th>RoomTypeID</th>
				<th>Room Name</th>
				<th>RoomTypeName</th>
				<th>RatePlanID</th>
				<th>Amount</th>
			</tr>
			<tr>			
				<td><input type="text" name="RoomTypeID" value="<?php echo $_POST["RoomTypeID"] ?>" readonly style="width:90px;" ></td>
				<td><input type="text" name="RoomName" value="<?php echo $_POST["RoomName"] ?>" readonly style="width:250px;" ></td>
				<td><input type="text" name="RoomTypeName" value="<?php echo $_POST["RoomTypeName"] ?>" readonly ></td>
				<td><input type="text" name="RatePlanID" value="<?php echo $_POST["RatePlanID"] ?>" readonly style="width:90px;" ></td>
				<td><input type="text" name="amount" value="<?php echo $_POST["amount"] ?> " readonly ></td>
			</tr>
		</table>

		<h3>Hóspedes</h3>

		<table border="1" cellpadding="3" cellspacing="0" >
			<tr>
				<th>Nome</th>
				<th>Sobrenome</th>
			</tr>
			<tr>
				<td><input type="text" name="given_name1"></td>
				<td><input type="text" name="sur_name1"></td>
			</tr>
			<tr>
				<td><input type="text" name="given_name2"></td>
				<td><input type="text" name="sur_name2"></td>
			</tr>
		</table>

		
		<h3>Responsável</h3>

		<div id="coluna1" style="float:left;">

			<table border="1" cellpadding="3" cellspacing="0" style="width:400px;">
				<tr>
					<td><b>Nome</b></td>
					<td><input type="text" name="given_name" value="Pre-Booking"></td>
				</tr>
				<tr>
					<td><b>Sobrenome</b></td>
					<td><input type="text" name="surname" value="www.elmisti.com"></td>
				</tr>
				<tr>
					<td><b>Endereço</b></td>
					<td><input type="text" name="street" style="width:290px;" ></td>
				</tr>
				<tr>
					<td><b>CEP</b></td>
					<td><input type="text" name="zip"></td>
				</tr>
				<tr>
					<td><b>Cidade</b></td>
					<td><input type="text" name="city"></td>
				</tr>
				<tr>
					<td><b>Email</b></td>
					<td><input type="text" name="email" value="joao@b4w.com.br"></td>
				</tr>
				<tr>
					<td><b>Telefone</b></td>
					<td><input type="text" name="phone" value="21 3258 3980"></td>
				</tr>
				<tr>
					<td><b>País</b></td>
					<td><input type="text" name="country_name"></td>
				</tr>

			</table>
		</div>
		<div id="coluna2" style="float:left;">&nbsp</div>
		<div id="coluna3">

			<table border="1" cellpadding="3" cellspacing="0" style="width:400px;">
				<tr>
					<td><b>Fax</b></td>
					<td><input type="text" name="fax"></td>
				</tr>
				<tr>
					<td><b>Cartão de Crédito</b></td>
					<td>
						<select name="cred_card_type">
							<option> 
							<option> MasterCard
							<option> Visa
							<option> Amex	
						</select>
					</td>
				</tr>
				<tr>
					<td><b>Número</b></td>
					<td><input type="text" name="cred_card_number"></td>
				</tr>
				<tr>
					<td><b>Nome no Cartão</b></td>
					<td><input type="text" name="cred_card_name_on_card" ></td>
				</tr>
				<tr>
					<td><b>Validade</b></td>
					<td><input type="text" name="cred_card_expiration_date"></td>
				</tr>
				<tr>
					<td><b>Observações</b></td>
					<td><input type="text" name="remarks" style="width: 220px;" value="Venda pelo Site"></td>
				</tr>
				</table>

				<br />

				<input type="submit" value="Enviar" >
		</div>
			
		
	</form>



<?php get_footer(); ?>