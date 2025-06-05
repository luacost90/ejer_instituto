 const formActualizar = document.querySelector(".form-actualizar");
 const btnActualizar = document.querySelector(".btn-actualizar");
 formActualizar.addEventListener("submit", async e =>{
    e.preventDefault();
    
    let id = btnActualizar.dataset.id;
    const formData = new FormData(formActualizar);

    const actAlumno = await fetch("../core/router.php?action=editar", {
            method: "POST",
            body: formData
        })
        
    const dataAlumno = await actAlumno.text();
    console.log(dataAlumno);

 });