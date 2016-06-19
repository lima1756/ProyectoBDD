function validacionCompra(form) {
    var inputBanc = form.elements["banco"].value;
    var inputTC = form.elements["Tarjeta"].value;
    var inputCSV = form.elements["CSV"].value;
    var inputVen = form.elements["Vencimiento"].value;
    var minDate = new Date();
    if(inputBanc == null || !/^[a-zA-Z]*[a-zA-Z]+[a-zA-Z]$/.test(inputBanc)){
        alert("Revise que el banco introducido sea correcto");
        return false;
    }
    if(inputTC == null || !/^[1-9][0-9]{14}[0-9]$/.test(inputTC)){
        alert("Verifique los datos de la tarjeta");
        return false;
    }
    if(inputCSV == null || !/^[0-9][0-9]{1}[0-9]$/.test(inputCSV)){
        alert("Verifique los datos de la tarjeta");
        return false;
    }
    if(inputDate == null || inputDate<minDate){
        alert("Verifique los datos de la tarjeta");
        return false;
    }
    return true;
}