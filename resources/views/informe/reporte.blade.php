
<!DOCTYPE html>
<html lang="en">

</html>
<style>
	table {
		font-family: sans-serif;
		table-layout: fixed;
		margin: 0 auto;
		width: 100%;
	}

	tr {
		padding: 10px 0;
	}

	.title span {
		display: block;
		padding: 30px 0;
		font-size: 26px;
		font-weight: bold;
		text-align: right;


	}

	tr .date {
		font-size: 12px;
		font-weight: bold;
	}

	tr .date span {
		font-weight: normal;
	}

	.table-repo td {
		width: 200px;
		font-size: 12px;
		font-weight: bold ;
		text-align: center;
	}

	.table-int-body td {
		text-align: center;
		width: 200px;
		font-size: 12px;
	}
	.space td{
		height: 50px;
		border-bottom: 1px solid #000;

	}
   
</style>
<table>
    
	<tbody>
		<tr>
			<td colspan="2">
				<img src='./img/logoPDF.png' alt="">
			</td>
			<td colspan="2"></td>
			<td class="title" colspan="4"> <span>REPORTE</span></td>

		</tr>
		<tr>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<!--<td class="date" colspan="2">Fecha inicio: <span>2023</span></td>
			<td class="date" colspan="2">Fecha fin: <span>2023</span></td>-->
			<td></td>
			<td></td>
			<td class="date" colspan="2">Gestión: <span>2023</span></td>
		</tr>
		<tr class="space">
			<td colspan="8"></td>
		</tr>
		<tr class="table-repo">
			<td>Sitio</td>
			<td>Titular</td>
			<td>Fecha Asig</td>
			<td>Estado/Pago</td>
			<td>TotalPagado</td>
			<td>Total Pendiente</td>
			<td>Cantidad Vehiculos</td>
			<td>Tiempo uso</td>
		</tr>
		@foreach($reportes as $reporte)
			<tr class="table-int-body">
				<td>{{ $reporte->sitio }}</td>
				<td>{{ $reporte->nombre }}</td>
				<td>{{ $reporte->fechaasig }}</td>
				<td>{{ $reporte->Estado_Pago }}</td>
				<td>{{ $reporte->total_pagado }}</td>
				<td>{{ $reporte->total_pendiente }}</td>
				<td>{{ $reporte->cantidad_vehiculos }}</td>
				<td>{{ $reporte->tiempo_uso }}</td>
			</tr>
		@endforeach
	</tbody>
</table>
