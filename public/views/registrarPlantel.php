<h2>Registrar Plantel</h2>
<form id="formPlantel" method="post">
        <fieldset>
                <legend>Datos del Plantel</legend>
                <input type="text" name="eponimo" placeholder="Epónimo">
                <input type="text" name="codigo_dea" placeholder="Código DEA">

                <input type="text" name="seccion" placeholder="Sección">

                <select name="tipo_matricula">
                        <option value="">Seleccione tipo de matrícula</option>
                        <option value="Convencional">Convencional</option>
                        <option value="No convencional">No convencional</option>
                </select>

                <select name="grado">
                        <option value="">Seleccione grado</option>
                        <option value="Educación inicial">Maternal, I y II nivel</option>
                        <option value="Educación Primaria">Educación Primaria (Básica): 1° a 6° grado</option>
                        <option value="Educación Media General">Educación Media General: 1° a 5° año</option>
                        <option value="Educación Media Técnica">Educación Media Técnica: 1° a 6° año</option>
                        <option value=" Unidades Educativas Integrales"> Unidades Educativas Integrales</option>
                </select>
        </fieldset>

        <fieldset>
                <legend>Datos del Director</legend>
                <input type="text" id="director_nombre" name="nombre" placeholder="Nombre">
                <input type="text" id="director_cedula" name="cedula" placeholder="Cédula">
                <input type="text" id="director_telefono" name="telefono" placeholder="Teléfono">
        </fieldset>
        
        <button type="submit">Registrar</button>
</form>
<div id="resultado"></div>
<script src="js/registrarPlantel.js"></script>