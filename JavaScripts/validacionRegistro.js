function validacion(form) {
    alert("HOLA");
    var inputName = form.elements["nombre"].value;
    var inputLastName = form.elements["apellido"].value;
    var inputUsername = form.elements["usuario"].value; 
    var inputDate = form.elements["fecha"].value; 
    var inputPassword1 = form.elements["pass"].value;  
    var inputPassword2 = form.elements["pass2"].value;    
    var inputEmail = form.elements["email"].value;  
    if(inputName ==NULL || inputName.length == 0 || /^[a-zA-Z]+(\s*[a-zA-Z]*)*[a-zA-Z]+$/.test(inputName)){
        alert("Revise el nombre introducido");
        return false;
    }
    if(inputLastName ==NULL || inputLastName.length == 0 || /^[a-zA-Z]+(\s*[a-zA-Z]*)*[a-zA-Z]+$/.test(inputLastName)){
        alert("Revise el Apellido introducido");
        return false;
    }
    if(inputUsername ==NULL || inputUsername.length < 5 || inputUsername>20 || /^[0-9a-zA-Z]+$/.test(inputUsername)){
        alert("Revise el usuario introducido, no se aceptam simbolos y debe de ser de tamaño entre 5 y 20");
        return false;
    }
    return true;
}

function prueba(algo){
    alert("Recepcion de "+algo);
}