<html>	
	<body>
		<table width="100%" cellpadding="12">
			<tr>
				<td colspan="6" align="center" bgcolor="slateblue"><span style="font-weight:bold">Informe de la cita</span></td>
			</tr>
			<tr>
				<td colspan="6" bgcolor="lightgrey"><span style="font-weight:bold">Datos del paciente</span></td>
			</tr>
			<tr>
				<td colspan="3"><span style="font-weight:bold">Apellidos: </span>
					<?php echo $p_apellido1." ".$p_apellido2; ?></td>
				<td><span style="font-weight:bold">Nombre: </span>
					<?php echo $p_nombre; ?></td>
				<td><span style="font-weight:bold">Teléfono: </span>
					<?php echo $telefono; ?></td>
				<td><span style="font-weight:bold">DNI: </span>
					<?php echo $dni; ?></td>
			</tr>
			<tr>
				<td colspan="6" bgcolor="lightgrey"><span style="font-weight:bold"><span style="font-weight:bold">Datos del médico</span></td>
			</tr>
			<tr>
				<td colspan="3"><span style="font-weight:bold">Apellidos: </span>
					<?php echo $m_apellido1." ".$m_apellido2; ?></td>
				<td colspan="3"><span style="font-weight:bold">Nombre: </span>
					<?php echo $m_nombre; ?></td>
			</tr>
			<tr>
				<td colspan="6" bgcolor="lightgrey"><span style="font-weight:bold">Datos de la cita</span></td>
			</tr>
			<tr>
				<td colspan="6"><span style="font-weight:bold">Fecha de la cita: </span> <?php echo $fecha_cita; ?></td>
			</tr>
			<tr>
				<td colspan="6" bgcolor="lightgrey"><span style="font-weight:bold">Motivos de la consulta</span></td>
			</tr>
			<tr>
				<td colspan="6" rowspan="3"><?php if($motivo){ echo $motivo;} ?></td>
			</tr>
			<tr>
			</tr>
			<tr>
			</tr>
			<tr>
				<td colspan="6" bgcolor="lightgrey"><span style="font-weight:bold">Observaciones</span></td>
			</tr>
			<tr>
				<td colspan="6" rowspan="3"><?php if($observaciones){ echo $observaciones;} ?></td>
			</tr>
			<tr>
			</tr>
			<tr>
			</tr>
			<tr>
				<td colspan="6" bgcolor="lightgrey"><span style="font-weight:bold">Tratamientos indicados</span></td>
			</tr>
			<tr>
				<td colspan="6" rowspan="3">
					<?php if($tipo){echo "<div><span style='font-weight:bold'>Tipo de tratamiento:</span> ".$tipo."</div>";} ?>
					<?php if($descripcion){echo "<div><span style='font-weight:bold'>Descripción de tratamiento:</span> ".$descripcion."</div>";} ?>
					<?php if($fecha_fin){echo "<div><span style='font-weight:bold'>Fecha de inicio del tratamiento:</span> ".$fecha_inicio."</div>";} ?>
					<?php if($fecha_fin){echo "<div><span style='font-weight:bold'>Fecha de fin del tratamiento:</span> ".$fecha_fin."</div>";} ?>
				</td>
			</tr>
			<tr>
			</tr>
			<tr>
			</tr>
			<tr>
				<td colspan="6" align="center" bgcolor="slateblue"><span style="font-weight:bold">Clínica Dalos</span></td>
			</tr>
		</table>
	</body>
</html>