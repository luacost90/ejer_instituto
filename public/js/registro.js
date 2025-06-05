const $formularioAlumno = document.getElementById("formAlumno");

$formularioAlumno.addEventListener("submit", async function(e){

    e.preventDefault();
    
    const formData = new FormData($formularioAlumno);

    try {
         // Se regsitra el representante cuando no exista en la Base de datos
         const regRepre = await fetch("../core/router.php?action=registrar",{
            method: "POST",
            body: formData
        });

        const reprenData =  await regRepre.text();
        console.log(reprenData);

        // if(reprenData.success){
        //      console.log(reprenData.message);

        //     document.getElementById("resultado").innerText = reprenData.message;

        //     $formularioAlumno.reset();
        // }else{
        //     throw new Error("Error al registrar el representante.");
        // }
        
    } catch (err) {
        console.error(err);
        document.getElementById("resultado").innerText = "Error inesperado";
    }
})

async function cargarOpcionesPlanteles() {
    try {
        const response = await fetch("../core/router.php?action=obtenerTodosPlanteles");
        const data = await response.json();

        const selectPlanteles = document.getElementById("opciones-planteles");
        selectPlanteles.innerHTML = ""; // Limpiar opciones previas

        if (data.success && Array.isArray(data.data)) {
            data.data.forEach(plantel => {
                const option = document.createElement("option");
                option.value = plantel.id_plantel;
                option.textContent = plantel.eponimo;
                selectPlanteles.appendChild(option);
            });
        } else {
            const option = document.createElement("option");
            option.value = "";
            option.textContent = "No hay planteles disponibles";
            selectPlanteles.appendChild(option);
        }
    } catch (error) {
        console.error("Error al cargar planteles:", error);
    }
}

// Llamar la función al cargar la página
document.addEventListener("DOMContentLoaded", cargarOpcionesPlanteles);