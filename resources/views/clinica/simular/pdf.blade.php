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
					<div><span style='font-weight:bold'>{{trans('mail.tipo_tratamiento')}}</span> <?php if($tipo){echo $tipo; }?> </div>
					<div><span style='font-weight:bold'>{{trans('mail.descripcion')}}</span> <?php if($descripcion){echo $descripcion; }?> </div>
					<div><span style='font-weight:bold'>{{trans('mail.fecha_inicio_tratamiento')}}</span> <?php if($fecha_fin){echo $fecha_inicio; }?> </div>
					<div><span style='font-weight:bold'>{{trans('mail.fecha_fin_tratamiento')}}</span> <?php if($fecha_fin){echo $fecha_fin; }?> </div>
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