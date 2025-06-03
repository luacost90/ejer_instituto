document.getElementById("btn-inscripcion").addEventListener("click", e =>{
    let id = e.target.dataset.id;
    window.open(`../controllers/generar_constancia.php?id=${id}`, '_blank');
});

document.getElementById("btn-estudios").addEventListener("click", e =>{
    let id = e.target.dataset.id;
    window.open(`../controllers/generar_estudios.php?id=${id}`, '_blank');
});