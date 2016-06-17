function validacionLogIn(form) {
    var inputUsername = form.elements["usuario"].value;
    var inputPassword = form.elements["pass"].value;  
    if(inputUsername == null || inputUsername.length < 5 || inputUsername > 10 || !/^[0-9a-zA-Z]+$/.test(inputUsername)){
        alert("Revise el usuario introducido");
        return false;
    }
    
    if(inputPassword == null || !/[0-9a-zA-Z-_\.]/.test(inputPassword)){
        alert("Verifique la contraseña introducida");
        return false;
    }
    

    return true;
}
