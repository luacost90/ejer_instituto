<h2>Registrar Alumno</h2>
<form id="formAlumno">
        <fieldset>
                <legend>Datos del estudiante</legend>
                <input type="text" name="cedula" placeholder="Cédula del alumno">
                <input type="text" name="nombre" placeholder="Nombre del alumno">
                <input type="text" name="apellido" placeholder="Apellido del alumno">
                <input type="date" name="fecha_nacimiento" placeholder="Fecha de nacimiento">
                <select name="sexo">
                        <option value="">Seleccione sexo</option>
                        <option value="Masculino">Masculino</option>
                        <option value="Femenino">Femenino</option>
                </select>
                <select name="plantel_id" id="opciones-planteles">
                        <option value="">Seleccione un plantel</option>
                </select>
        </fieldset>
        <fieldset>
                <legend>Datos del representante</legend>
                <input type="text" name="cedula_representante" placeholder="Cédula del representante">
                <input type="text" name="nombre_representante" placeholder="Nombre del representante">
                <input type="text" name="apellido_representante" placeholder="Apellido del representante">
                <input type="text" name="telefono" placeholder="Teléfono del representante">
        </fieldset>
        <button type="submit">Registrar</button>
</form>
<div id="resultado"></div>

<script src="js/registro.js"></script>