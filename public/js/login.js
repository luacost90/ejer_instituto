const $formularioLogin = document.getElementById("formLogin");


document.getElementById("btnLogin").addEventListener("click", async e =>{
    e.preventDefault();
    
    const formData = new FormData($formularioLogin);
    const res = await fetch("core/router.php?action=login",{
            method: "POST",
            body: formData
        });
    const data = await res.json();
    console.log(data);
    if(data.success){
        window.location.href = "public/dashboard.php";
    }else{
        alert(`${data.message}`);
    }

});