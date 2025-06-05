<h2>Registrar Alumno</h2>
<form id="formAlumno">
        <fieldset>
                <legend>Datos del estudiante</legend>
                <input type="text" name="cedula_alumno" id="cedula_alumno" placeholder="Cédula del alumno" pattern="^[VvEe]-?\d{6,8}$" title="Formato: V-12345678 o E-12345678">
                <input type="text" name="nombre_alumno" placeholder="Nombre del alumno">
                <input type="text" name="apellido_alumno" placeholder="Apellido del alumno">
                <input type="date" name="fecha_nacimiento" placeholder="Fecha de nacimiento">
                <select name="sexo">
                        <option value="">Seleccione sexo</option>
                        <option value="Masculino">Masculino</option>
                        <option value="Femenino">Femenino</option>
                </select>
                <select name="grado_alumno">
                        <option value="">Seleccione grado</option>
                        <optgroup label="Educación Inicial">
                                <option value="Maternal">Maternal</option>
                                <option value="I nivel">I nivel</option>
                                <option value="II nivel">II nivel</option>
                        </optgroup>
                        <optgroup label="Educación Primaria (Básica)">
                                <option value="1° grado">1° grado</option>
                                <option value="2° grado">2° grado</option>
                                <option value="3° grado">3° grado</option>
                                <option value="4° grado">4° grado</option>
                                <option value="5° grado">5° grado</option>
                                <option value="6° grado">6° grado</option>
                        </optgroup>
                        <optgroup label="Educación Media General">
                                <option value="1° año">1° año</option>
                                <option value="2° año">2° año</option>
                                <option value="3° año">3° año</option>
                                <option value="4° año">4° año</option>
                                <option value="5° año">5° año</option>
                        </optgroup>
                        <optgroup label="Educación Media Técnica">
                                <option value="1° año técnico">1° año</option>
                                <option value="2° año técnico">2° año</option>
                                <option value="3° año técnico">3° año</option>
                                <option value="4° año técnico">4° año</option>
                                <option value="5° año técnico">5° año</option>
                                <option value="6° año técnico">6° año</option>
                        </optgroup>
                </select>
                <select name="seccion_alumno" id="seccion">
                        <option value="">Seleccione sección</option>
                        <option value="A">A</option>
                        <option value="B">B</option>
                        <option value="C">C</option>
                        <option value="D">D</option>
                        <option value="E">E</option>
                        <option value="F">F</option>
                        <option value="G">G</option>
                        <option value="H">H</option>
                        <option value="I">I</option>
                        <option value="J">J</option>
                        <option value="K">K</option>
                </select>
                <select name="fk_plantel" id="opciones-planteles">
                        <option value="">Seleccione un plantel</option>
                </select>
        </fieldset>
        <fieldset>
                <legend>Datos del representante</legend>
                <input type="text" name="cedula_representante" placeholder="Cédula del representante">
                <input type="text" name="nombre_representante" placeholder="Nombre del representante">
                <input type="text" name="apellido_representante" placeholder="Apellido del representante">
                <input type="text" name="telefono_representante" placeholder="Teléfono del representante">
                <input type="text" name="direccion_representante" placeholder="Dirección del representante">
        </fieldset>
        <button type="submit">Registrar</button>
</form>
<div id="resultado"></div>

<script src="js/registro.js"></script>