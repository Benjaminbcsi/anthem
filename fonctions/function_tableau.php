<?php 
function afficheTableau($tableau){
	$html = '
		<table border="1px">
		<tr>
		<th>ID</th>';

		foreach ($tableau[0] as $index => $value)   {
		$html.= "<th>".$index."</th>";
		}
				$html.='</tr>';
				for ($i=0; $i < count($tableau); $i++) { 
				$html.='<tr>';
				$html.='<td>' .$i. '</td>';
			foreach ($tableau[$i] as $value) { 
			$html.='<td>' .$value.'</td>';
			}
		$html.='</tr>';
		} 
	$html.='</table>';
	return $html;
	}