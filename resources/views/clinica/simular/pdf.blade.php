<html>	
	<body>
		<table width="100%" cellpadding="12">
			<tr>
				<td colspan="6" align="center" bgcolor="slateblue"><span style="font-weight:bold">{{trans('mail.informe')}}</span></td>
			</tr>
			<tr>
				<td colspan="6" bgcolor="lightgrey"><span style="font-weight:bold">{{trans('mail.datos_paciente')}}</span></td>
			</tr>
			<tr>
				<td colspan="3"><span style="font-weight:bold">{{trans('mail.apellido')}}</span>
					<?php echo $p_apellido1." ".$p_apellido2; ?></td>
				<td><span style="font-weight:bold">{{trans('mail.nombre')}} </span>
					<?php echo $p_nombre; ?></td>
				<td><span style="font-weight:bold">{{trans('mail.telefono')}} </span>
					<?php echo $telefono; ?></td>
				<td><span style="font-weight:bold">DNI: </span>
					<?php echo $dni; ?></td>
			</tr>
			<tr>
				<td colspan="6" bgcolor="lightgrey"><span style="font-weight:bold"><span style="font-weight:bold">{{trans('mail.datos_medico')}}</span></td>
			</tr>
			<tr>
				<td colspan="3"><span style="font-weight:bold">{{trans('mail.apellido')}} </span>
					<?php echo $m_apellido1." ".$m_apellido2; ?></td>
				<td colspan="3"><span style="font-weight:bold">{{trans('mail.nombre')}} </span>
					<?php echo $m_nombre; ?></td>
			</tr>
			<tr>
				<td colspan="6" bgcolor="lightgrey"><span style="font-weight:bold">{{trans('mail.datos_cita')}}</span></td>
			</tr>
			<tr>
				<td colspan="6"><span style="font-weight:bold">{{trans('mail.fecha_cita')}} </span> <?php echo $fecha_cita; ?></td>
			</tr>
			<tr>
				<td colspan="6" bgcolor="lightgrey"><span style="font-weight:bold">{{trans('mail.motivo')}}</span></td>
			</tr>
			<tr>
				<td colspan="6" rowspan="3"><?php if($motivo){ echo $motivo;} ?></td>
			</tr>
			<tr>
			</tr>
			<tr>
			</tr>
			<tr>
				<td colspan="6" bgcolor="lightgrey"><span style="font-weight:bold">{{trans('mail.observacion')}}</span></td>
			</tr>
			<tr>
				<td colspan="6" rowspan="3"><?php if($observaciones){ echo $observaciones;} ?></td>
			</tr>
			<tr>
			</tr>
			<tr>
			</tr>
			<tr>
				<td colspan="6" bgcolor="lightgrey"><span style="font-weight:bold">{{trans('mail.tratamiento')}}</span></td>
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
				<td colspan="6" align="center" bgcolor="slateblue"><span style="font-weight:bold">{{trans('mail.clinica')}}</span></td>
			</tr>
		</table>
	</body>
</html>