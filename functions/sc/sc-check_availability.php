<style type="text/css">
	.filterable {
	    margin-top: 15px;
	}
	.filterable .panel-heading .pull-right {
	    margin-top: -20px;
	}
	.filterable .filters input[disabled] {
	    background-color: transparent;
	    border: none;
	    cursor: auto;
	    box-shadow: none;
	    padding: 0;
	    height: auto;
	}
	.filterable .filters input[disabled]::-webkit-input-placeholder {
	    color: #333;
	}
	.filterable .filters input[disabled]::-moz-placeholder {
	    color: #333;
	}
	.filterable .filters input[disabled]:-ms-input-placeholder {
	    color: #333;
	}

	.panel-custom {
		border: 1px #D10A11 solid;
	}
	.panel-custom > .panel-heading{
		background-color: #D10A11;
		color: #fff;
	}
</style>
<script type="text/javascript">
	$(document).ready(function(){
    $('.filterable .btn-filter').click(function(){
        var $panel = $(this).parents('.filterable'),
        $filters = $panel.find('.filters input'),
        $tbody = $panel.find('.table tbody');
        if ($filters.prop('disabled') == true) {
            $filters.prop('disabled', false);
            $filters.first().focus();
        } else {
            $filters.val('').prop('disabled', true);
            $tbody.find('.no-result').remove();
            $tbody.find('tr').show();
        }
    });

    $('.filterable .filters input').keyup(function(e){
        /* Ignore tab key */
        var code = e.keyCode || e.which;
        if (code == '9') return;
        /* Useful DOM data and selectors */
        var $input = $(this),
        inputContent = $input.val().toLowerCase(),
        $panel = $input.parents('.filterable'),
        column = $panel.find('.filters th').index($input.parents('th')),
        $table = $panel.find('.table'),
        $rows = $table.find('tbody tr');
        /* Dirtiest filter function ever ;) */
        var $filteredRows = $rows.filter(function(){
            var value = $(this).find('td').eq(column).text().toLowerCase();
            return value.indexOf(inputContent) === -1;
        });
        /* Clean previous no-result if exist */
        $table.find('tbody .no-result').remove();
        /* Show all rows, hide filtered ones (never do that outside of a demo ! xD) */
        $rows.show();
        $filteredRows.hide();
        /* Prepend no-result row if all rows are filtered */
        if ($filteredRows.length === $rows.length) {
            $table.find('tbody').prepend($('<tr class="no-result text-center"><td colspan="'+ $table.find('.filters th').length +'">No result found</td></tr>'));
        }
    });
});
</script>

<?php

	echo "sc-check_availability.php";

	/*

	
	header('Content-Type: text/html; charset=UTF-8');

	
require_once("model/book.php");
require_once("model/room_type.php");
require_once("model/room.php");


// ============= formatação da data ============================
$data_temp = explode('/', $_POST["data_ini"]);
$data_temp = $data_temp[2].'-'.$data_temp[1].'-'.$data_temp[0];

$data_ini = $data_temp;

$data_temp = explode('/', $_POST["data_fim"]);
$data_temp = $data_temp[2].'-'.$data_temp[1].'-'.$data_temp[0];

$data_fim = $data_temp;
//==============================================================



error_reporting(E_ALL);
ini_set('display_errors', '0');
	

		$input_xml = '<?xml version="1.0" encoding="UTF-8"?>
						<!-- Mini Hotel - Availability and Rates - Request -->
						<AvailRaterq xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance">
						<Authentication username="' . $_POST["username"] . '" password="' . $_POST["password"] .'" />
						<Hotel id="' . $_POST["hotel_id"] . '" Currency="USD"/>
						<DateRange from="' . $data_ini . '" to="'. $data_fim .'"/>
						<Guests adults="' . $_POST["adults"] . '" child="' . $_POST["child"] . '" babies="' . $_POST["babies"] . '"/>
						<Prices rateCode="ALL">
						</Prices>
						</AvailRaterq>';


		$url = "http://api.minihotelpms.com/GDS";


		
		// create your curl handler     
		$ch = curl_init($url);

		// set your options     
		curl_setopt($ch, CURLOPT_MUTE, 1);
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0); //ssl stuff
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: text/xml; charset=utf-8'));
		curl_setopt($ch, CURLOPT_POSTFIELDS, $input_xml);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);



		// your return response
		$output = curl_exec($ch); 

		
		$book = new Book();
		$room_types = array();
		$rooms = array();
		$rooms2 = array();
		
		$xml=simplexml_load_string($output);

		foreach($xml->children() as $child){

			if($child->getName() == "Hotel") {

			  	$book->setHotel_id($child["id"]);
			  	$book->setHotel_name_h($child["Name_h"]);
			  	$book->setHotel_name_e($child["Name_e"]);
			  	$book->setHotel_currency($child["Currency"]);
			  	
			}
			if($child->getName() == "DateRange") {

			  	$book->setDate_range_from($child["from"]);
			  	$book->setDate_range_to($child["to"]);

			}
			if($child->getName() == "Guests"){

			  	$book->setAdults($child["adults"]);
			  	$book->setChild($child["child"]);
			  	$book->setBabies($child["babies"]);


			}
		  	
			if($child->getName() == "RoomType"){
				

			  	$room_type = new RoomType();

			  	$room_type->setRoom_id($child["id"]);
			  	$room_type->setRoom_name_h($child["Name_h"]);
			  	$room_type->setRoom_name_e($child["Name_e"]);

			  	foreach($child->children() as $child2){


				  	if($child2->getName() == "Inventory"){

				  		$room_type->setAllocation($child2["Allocation"]);
				  		$room_type->setMaxavail($child2["maxavail"]);
				  	}
				  	if($child2->getName() == "price"){

				  		$room = new Room();

				  		$room->setRoom_id($room_type->getRoom_id());
				  		$room->setBoard($child2["board"]);
				  		$room->setBoard_desc($child2["boardDesc"]);
				  		$room->setValue($child2["value"]);

				  		array_push($rooms,$room);
				  		
				  	}

				  		

				    //$room_type->setRooms($rooms);
				}
				
				 			  
				  array_push($room_types,$room_type);


			}
			//coloco o array de rooms no objeto book;
			$book->setRoom_type($room_types);
		}

		*/

		?>

		<div class="container">

			<br><br>
				<div class="descricao_search_reserva">
	        		<h4>Quartos disponíveis - Adultos: <?php echo $book->getAdults() ?>, Crianças: <?php echo $book->getChild() ?>, Bebês: <?php echo $book->getBabies() ?></h4>
	        	</div>
	        <div class="panel filterable panel-custom">
	            <div class="panel-heading">
	                <h3 class="panel-title"><?php echo $_POST['titulo']; ?> - <?php echo 'Período: ' . $_POST["data_ini"] . ' a ' . $_POST["data_fim"] ?></h3>
	                <div class="pull-right">
	                    <button class="btn btn-default btn-xs btn-filter"><span class="glyphicon glyphicon-filter"></span>Filtro</button>
	                </div>
	            </div>
	            <table class="table">
	                <thead>
	                    <tr class="filters">
	                        <th><input type="text" class="form-control" placeholder="#ID" disabled></th>
	                        <th><input type="text" class="form-control" placeholder="Descrição" disabled></th>
	                        <th><input type="text" class="form-control" placeholder="Allocation" disabled></th>
	                        <th><input type="text" class="form-control" placeholder="Max Avail" disabled></th>
	                        <th>Boards</th>
	                    </tr>
	                </thead>
	                <tbody>

	                	<?php

	                	/*

	                		//pego o array de room_types
							$arrRt = $book->getRoom_type();
							$arrlength=count($arrRt);

							
							for($i=0;$i<$arrlength;$i++)
							{
								//$rt = new RoomType();
								$rt = $arrRt[$i];

								echo '<tr>'."\n";
								echo '	<td>' . $rt->getRoom_id() . '</td>'."\n";
								echo '	<td>' . $rt->getRoom_name_h() . ' - ' . $rt->getRoom_name_e() . '</td>'."\n";
								echo '	<td>' . $rt->getAllocation() . '</td>'."\n";
								echo '	<td>' . $rt->getMaxavail() . '</td>'."\n";
								echo '	<td colspan="4">'."\n";
								echo '		<table border="1" cellpadding="3" cellspacing="0">'."\n";
								echo '			<tr class="filters">'."\n";
								echo '				<th>Board</th>'."\n"; 
								echo '				<th>Board Desc</th>'."\n"; 
								echo '				<th>Value</th>'."\n"; 
								echo '				<th>Ação</th>'."\n"; 
								echo '			</tr>'."\n";
								echo '</tr>';
								$arrRoomlength=count($rooms);
			
								$arrRomms = array();
								
								for($j=0;$j<$arrRoomlength;$j++)
								{

									$r=$rooms[$j];

									if($rt->getRoom_id() == $r->getRoom_id()){

										echo '<form action="?page_id=37" method="POST">' ."\n";


										echo '	<input type="hidden" name="product_id" value="' . $_POST["product_id"] . '" >' . "\n";
										echo '	<input type="hidden" name="hotel_id" value="' . $book->getHotel_id() . '">' . "\n";
										echo '	<input type="hidden" name="adults" value="' . $book->getAdults() . '">' . "\n";
										echo '	<input type="hidden" name="child" value="' . $book->getChild() . '">' . "\n";
										echo '	<input type="hidden" name="babies" value="' . $book->getBabies() . '">' . "\n";
										echo '	<input type="hidden" name="arrival" value="' . $book->getDate_range_from() . '">' . "\n";
										echo '	<input type="hidden" name="departure" value="' . $book->getDate_range_to()  . '">' . "\n";

										echo '	<input type="hidden" name="RoomTypeID" value="' . $rt->getRoom_id() . '">' . "\n";
										echo '	<input type="hidden" name="RoomName" value="' . $rt->getRoom_name_h() . ' - ' . $rt->getRoom_name_e() . '">' . "\n";

										echo '	<input type="hidden" name="RatePlanID" value="' . $r->getBoard(). '">' . "\n";
										echo '	<input type="hidden" name="RoomTypeName" value="' . $r->getBoard_desc() . '">' . "\n";
										echo '	<input type="hidden" name="amount" value="' . $r->getValue()  . '">' . "\n";

										echo '		<tr>'."\n";
										echo '			<td>';
										echo 				$r->getBoard();
										echo '			</td>'."\n";
										echo '			<td>';
										echo  				$r->getBoard_desc();
										echo '			</td>'."\n";
										echo '			<td>';
										echo 				$r->getValue();					
										echo '			</td>'."\n";
										echo '			<td><input type="submit" value="Selecionar" ></td>'."\n";
										echo '		</tr>'."\n";

										echo '</form>'."\n";

										array_push($arrRomms, $r);

									}
									$rt->setRooms($arrRomms);
									$arrRt[$i] = $rt;
								}
								$book->setRoom_type($arrRt);
								
								echo '		</table>'."\n";
								echo "</td>";

							}

							*/
	                	?>
	                </tbody>
	            </table>
	        </div>
		</div>