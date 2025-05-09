const $formularioAlumno = document.getElementById("formAlumno");

$formularioAlumno.addEventListener("submit", async function(e){

    e.preventDefault();
    
    const formData = new FormData($formularioAlumno);

    try {
         // Se regsitra el representante cuando no exista en la Base de datos
         const regRepre = await fetch("core/router.php?action=registrar",{
            method: "POST",
            body: formData
        });

        const reprenData =  await regRepre.json();
        console.log(reprenData);

        if(reprenData.success){
             console.log(reprenData.message);

            document.getElementById("resultado").innerText = reprenData.message;

            $formularioAlumno.reset();
        }else{
            throw new Error("Error al registrar el representante.");
        }

        // formData.append("id_representante", id_representante);

        // const aluResp = await fetch("php/registrar_alumno.php",{
        //     method: "POST",
        //     body: formData
        // });

        // const aluData = await aluResp.json();

        // console.log(aluData.message);

        // document.getElementById("resultado").innerText = aluData.message;

        // $formularioAlumno.reset();
        
    } catch (err) {
        console.error(err);
        document.getElementById("resultado").innerText = "Error inesperado";
    }

})