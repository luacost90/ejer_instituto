document.addEventListener("DOMContentLoaded", async () => {

    const res = await fetch("../core/router.php?action=listar");
    const data = await res.json();
    console.log(data);
    const tbody = document.querySelector("#tablaAlumnos tbody");
    tbody.innerHTML = "";

    data.forEach(alumno => {
        const row = `  
            <tr>
                <td>${alumno.id_estudiante}</td>
                <td>${alumno.nombre}</td>
                <td>${alumno.cedula}</td>
                <td>${alumno.nombre_representante}</td>
                <td>
                <button class="btn-detalles" data-id=${alumno.id_estudiante}><a href="dashboard.php?view=verDetalles&id=${alumno.id_estudiante}">Ver detalles</a></button>
                <button class="btn-editar" data-id=${alumno.id_estudiante}>Editar</button>
                <button class="btn-eliminar cancel-btn" data-id=${alumno.id_estudiante}>Eliminar</button>
                </td>
            </tr>
        `;
        tbody.innerHTML += row; 
    });
});


document.addEventListener("click", e =>{
    if(e.target.classList.contains("btn-eliminar")){
        let id = e.target.dataset.id;
        console.log(`Se ha eliminado el id: ${id}`);
        if (confirm('¿Seguro que deseas eliminar este alumno?')) {
            fetch("../core/router.php?action=eliminar", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json"
                },
                body: JSON.stringify({ id })
            })
            .then(res => res.json())
            .then(data => {
                if (data.success) {
                    alert('Alumno eliminado');
                    location.reload();
                } else {
                    alert(data.error || 'Error al eliminar');
                }
            });
        }   
    }

});

document.addEventListener("click", e =>{
    if(e.target.classList.contains("btn-editar")){
        let id = e.target.dataset.id;
        console.log(`Se ha editado el id: ${id}`);
        fetch("../core/router.php?action=verEditar", {
            method: "POST",
            headers: {
                "Content-Type": "application/json"
            },
            body: JSON.stringify({ id })
        })
        .then(res => res.json())
        .then(data => {
            if (data.success) {
                console.log(data.nombre);
            } else {
                alert(data.error || 'Error al eliminar');
            }
        });
        window.location.href = `dashboard.php?view=editar&id=${id}`;
    }
});