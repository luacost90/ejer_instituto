const $formularioAlumno = document.getElementById("formAlumno");

$formularioAlumno.addEventListener("submit", async function(e){

    e.preventDefault();
    
    const formData = new FormData($formularioAlumno);

    try {
        let id_representante;

        // Script para buscar representante
        const buscarRepre = await fetch("php/buscar_representante.php",{
            method: "POST",
            body: formData
        });

        const resultado = await buscarRepre.json();

        console.log(resultado);
    
        if(resultado.existe){
            id_representante = resultado.id;
        }else{

            // Se regsitra el representante cuando no exista en la Base de datos
            const regRepre = await fetch("php/registrar_representante.php",{
                method: "POST",
                body: formData
            });

            const reprenData =  await regRepre.json();
            console.log(reprenData);

            if(reprenData.success){
                id_representante = reprenData.id;
            }else{
                throw new Error("Error al registrar el representante.");
            }
        }

        formData.append("id_representante", id_representante);

        const aluResp = await fetch("php/registrar_alumno.php",{
            method: "POST",
            body: formData
        });

        const aluData = await aluResp.json();

        console.log(aluData);

        document.getElementById("resultado").innerText = aluData.message;

        $formularioAlumno.reset();
        
    } catch (err) {
        console.error(err);
        document.getElementById("resultado").innerText = "Error inesperado";
    }

})