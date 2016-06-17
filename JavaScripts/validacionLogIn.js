function validacionLogIn(form) {
    var inputUsername = form.elements["usuario"].value;
    var inputPassword = form.elements["pass"].value;  
    if(inputUsername == null || !/^[0-9a-zA-Z]+$/.test(inputUsername)){
        alert("Revise los datos introducidos");
        return false;
    }
    if(inputPassword == null || !/[0-9a-zA-Z-_\.]/.test(inputPassword)){
        alert("Verifique los datos introducido");
        return false;
    }
    return true;
}
