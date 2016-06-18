function validacion(form) {
    var inputTitle = form.elements["title"].value;
    var inputDescription = form.elements["Descripcion"].value;
    var inputArtista = form.elements["artista"].value;  
    var inputGenero = form.elements["genero"].value;
    var inputImg = form.elements["imagen"].value;
    var minDate = new Date();
    var maxDate = new Date(2020,01,01);
    var inputStart = new Date(form.elements["inicio"].value);
    var inputEnd = new Date(form.elements["fin"].value);
    if(inputTitle == null || inputTitle.length == 0 || inputTitle.length > 20 || !/^[a-zA-ZñÑáíúéóÁÍÚÉÓ]+(\s*[a-zA-ZñÑáíúéóÁÍÚÉÓ0-9]*)*[a-zA-ZñÑáíúéóÁÍÚÉÓ0-9]+$/.test(inputTitle)){
        alert("Revise que el titulo introducido no contenga caracteres especiales");
        return false;
    }
    if(inputArtista == null || inputArtista.length == 0 || inputArtista > 20 || !/^[0-9a-zA-Z]+$/.test(inputArtista)){
        alert("Revise el artista introducido, no se aceptan simbolos, debe ser menor a 20 caracteres");
        return false;
    }
    if(inputGenero == null || inputGenero.length == 0 || inputGenero > 20 || !/^[0-9a-zA-Z]+$/.test(inputGenero)){
        alert("Revise el genero introducido, no se aceptan simbolos, debe ser menor a 20 caracteres.");
        return false;
    }
    if(inputStart == null || inputStart>maxDate || inputStart<minDate){
        alert("La fecha de nacimiento no puede ser menor a la de hoy ni mayor a la del primero de enero de 2020");
        return false;
    }
    if(inputEnd == null || inputEnd>maxDate || inputEnd<minDate){
        alert("La fecha de nacimiento no puede ser menor a la de hoy ni mayor a la del primero de enero de 2020");
        return false;
    }
    return true;
}