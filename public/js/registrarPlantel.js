const $formularioPlantel = document.getElementById("formPlantel");

$formularioPlantel.addEventListener("submit", async function (e){
    e.preventDefault();
    const formData = new FormData($formularioPlantel);

      try {
         // Se regsitra el representante cuando no exista en la Base de datos
         const regPlantel = await fetch("../core/router.php?action=registrarPlantel",{
            method: "POST",
            body: formData
        });

        const plantelData =  await regPlantel.json();
        console.log(plantelData);

        if(plantelData.success){
             console.log(plantelData.message);

            document.getElementById("resultado").innerText = plantelData.message;

            $formularioPlantel.reset();
        }else{
            throw new Error("Error al registrar el representante.");
        }
        
    } catch (err) {
        console.error(err);
        document.getElementById("resultado").innerText = "Error inesperado";
    }
});