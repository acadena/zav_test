<div>
	<div><a href="#" id="add_visit">Nueva visita</a></div>

	<div class="add_form_content">
		<form id="add_form">

			<input type="hidden" name="visit_id" id="visit_id" value="" />
			<input type="hidden" name="mode_form" id="mode_form" value="insert" />

			<div class="field-content">
				<label>Nombre*</label>
				<input type="text" name="user_name" id="user_name">
			</div>
			<div class="field-content">
				<label>Email*</label>
				<input type="email" name="user_email" id="user_email">
			</div>
			<div class="field-content">
				<label>Celular*</label>
				<input type="number" name="user_phone" id="user_phone" min="1">
			</div>
			<div class="field-content">
				<label>Motivo visita*</label>
				<select name="subject" id="subject">
					<option value="">-- Seleccione uno --</option>
					<option value="buy">Compra</option>
					<option value="sell">Venta</option>
					<option value="rent">Alquiler</option>
				</select>
			</div>
			<div class="field-content">
				<label>Comentario</label>
				<textarea name="comment" id="comment"></textarea>
			</div>
			<div class="field-content">
				<input type="submit" value="Guardar">
			</div>
		</form>
	</div>

	<br><br>
	<div class="visit_list">
		<table id="visits-list">
			<thead>
				<tr>
					<td>Nombre</td>
					<td>Correo</td>
					<td>Motivo Visita</td>
					<td>Acciones</td>
				</tr>	
			</thead>	
		</table>	
	</div>

</div>	