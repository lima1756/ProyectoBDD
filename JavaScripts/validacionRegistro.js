function validacion(form) {
    var inputName = form.elements["nombre"].value;
    var inputLastName = form.elements["apellido"].value;
    var inputUsername = form.elements["usuario"].value;
    var maxDate = new Date();
    var minDate = new Date(1900,01,01);
    var inputDate = new Date(form.elements["fecha"].value);
    var inputPassword1 = form.elements[7].value;  
    var inputPassword2 = form.elements["pass2"].value;    
    var inputEmail = form.elements["email"].value; 
    if(inputName == null || inputName.length == 0 || !/^[a-zA-Z]+(\s*[a-zA-Z]*)*[a-zA-Z]+$/.test(inputName)){
        alert("Revise que el nombre introducido no contenga caracteres especiales");
        return false;
    }
    if(inputLastName == null || inputLastName.length == 0 || !/^[a-zA-Z]+(\s*[a-zA-Z]*)*[a-zA-Z]+$/.test(inputLastName)){
        alert("Revise el Apellido introducido no contenga caracteres especiales");
        return false;
    }
    if(inputUsername == null || inputUsername.length < 5 || inputUsername > 20 || !/^[0-9a-zA-Z]+$/.test(inputUsername)){
        alert("Revise el usuario introducido, no se aceptan simbolos y debe de ser de tamaño entre 5 y 20");
        return false;
    }
    
    if(inputEmail == null || !/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/.test(inputEmail)){
        alert("Verifique que el correo introducido cumpla con: nombre@host.dominio");
        return false;
    }
    
    if(inputDate == null || inputDate>maxDate || inputDate<minDate){
        alert("La fecha de nacimiento no puede ser mayor a la de hoy ni menor a la del primero de enero de 1900");
        return false;
    }
    if(inputPassword1 == null || !/((?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[-_\.]).{8,30})/.test(inputPassword1)){
        alert("La contraseña debe de ser de minimo 8 caracteres, contener al menos una letra minuscula, una mayuscula y un numero, puede contener los caracteres especiales '.' y '-' y '_'");
        return false;
    }
    if(inputPassword2!=inputPassword1){
        alert("La confirmación de contraseña es incorrecta, vuelva a intentar");
        return false;
    }
    return true;
}