document.querySelectorAll('.btn-eliminar').forEach(btn => {
    btn.addEventListener('click', () => {
        const id = btn.dataset.id;
        // if (confirm('¿Seguro que deseas eliminar este alumno?')) {
        //     fetch(`../core/eliminar?id=${id}`)
        //         .then(res => res.json())
        //         .then(data => {
        //             if (data.success) {
        //                 alert('Alumno eliminado');
        //                 location.reload();
        //             } else {
        //                 alert(data.error || 'Error al eliminar');
        //             }
        //         });
        // }
        console.log(`Se ha eliminado el ${id}`);
    });
});
