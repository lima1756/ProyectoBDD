function validacion(form) {
    var inputName = form.elements["nombre"].value;
    var inputLastName = form.elements["apellido"].value;
    var inputUsername = form.elements["usuario"].value;
    var maxDate = new Date();
    alert(maxDate);
    var minDate = new Date(1900,01,01);
    var inputDate = new Date(form.elements["fecha"].value);
    var inputPassword1 = form.elements["pass"].value;  
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
        alert("La fecha de naciemiento no puede ser mayor a la de hoy ni menor a la del primero de enero de 1900");
        return false;
    }
    return true;
}