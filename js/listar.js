document.getElementById("btnListar").addEventListener("click", async () =>{

    const res = await fetch("core/router.php?action=listar");
    const data = await res.json();

    const tbody = document.querySelector("#tablaAlumnos tbody");
    tbody.innerHTML = "";

    data.forEach(alumno => {
        const row = `  
            <tr>
                <td>${alumno.id}</td>
                <td>${alumno.nombre}</td>
                <td>${alumno.nombre_representante}</td>
                <td>${alumno.cedula}</td>
            </tr>
        `;
        tbody.innerHTML += row; 
    });
});