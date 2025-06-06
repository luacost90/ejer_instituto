 <form id="formAlumno">
    <h2>📋 Registro de Alumno</h2>

    <fieldset>
      <legend>🧑 Datos del estudiante</legend>
      <div class="grid"> 
        <input type="text" name="cedula_alumno" id="cedula_alumno" placeholder="Cédula del alumno" pattern="^[VvEe]-?\d{6,8}$" title="Formato: V-12345678 o E-12345678">
        <input type="text" name="nombre_alumno" placeholder="Nombre del alumno" pattern="^[A-Za-zÁÉÍÓÚáéíóúÑñ\s]{2,50}$" title="Solo letras, mínimo 2 y máximo 50 caracteres">
        <input type="text" name="apellido_alumno" placeholder="Apellido del alumno" pattern="^[A-Za-zÁÉÍÓÚáéíóúÑñ\s]{2,50}$" title="Solo letras, mínimo 2 y máximo 50 caracteres">
        <input type="date" name="fecha_nacimiento" placeholder="Fecha de nacimiento" min="1990-01-01" max="<?php echo date('Y-m-d'); ?>" title="Seleccione una fecha válida">
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
      </div>
    </fieldset>

    <fieldset>
      <legend>👨‍👩‍👧 Datos del representante</legend>
      <div class="grid"> 
        <input type="text" name="cedula_representante" id="cedula_representante" placeholder="Cédula del representante" pattern="^[VvEe]-?\d{6,8}$" title="Formato: V-12345678 o E-12345678" required>
        <input type="text" name="nombre_representante" id="nombre_representante" placeholder="Nombre del representante" pattern="^[A-Za-zÁÉÍÓÚáéíóúÑñ\s]{2,50}$" title="Solo letras, mínimo 2 y máximo 50 caracteres" required>
        <input type="text" name="apellido_representante" id="apellido_representante" placeholder="Apellido del representante" pattern="^[A-Za-zÁÉÍÓÚáéíóúÑñ\s]{2,50}$" title="Solo letras, mínimo 2 y máximo 50 caracteres" required>
        <input type="tel" name="telefono_representante" id="telefono_representante" placeholder="Teléfono del representante" pattern="^(0412|0414|0424|0416|0426|0212|0251|0252|0253|0254|0255|0256|0257|0258|0261|0262|0263|0264|0265|0266|0267|0268|0269|0271|0272|0273|0274|0275|0276|0277|0278|0281|0282|0283|0284|0285|0286|0287|0288|0291|0292|0293|0294|0295|0296|0297|0298|0299)[0-9]{7}$" title="Ejemplo: 04121234567, 02121234567, 02861234567" maxlength="11" required>
        <input type="text" name="direccion_representante" id="direccion_representante" placeholder="Dirección del representante" minlength="5" maxlength="100" title="Entre 5 y 100 caracteres" required>
      </div>
    </fieldset>

    <button type="submit">📥 Registrar</button>
  </form>

<div id="resultado"></div>

<script src="js/registro.js"></script>