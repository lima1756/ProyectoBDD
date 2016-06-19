function validacionCompra(form) {
    var inputID = form.elements["var"].value;
    var inputZona = form.elements["zonas"].value;
    var inputAsiento = form.elements["asientos"].value;  
    if(inputID == null || !/^[0-9]*[0-9]+[0-9]$|^[1-9]$/.test(inputID)){
        alert("Hubo un error, vuelva a intentar más tarde");
        return false;
    }
    if(inputZona == null || !/^[1-4]$/.test(inputZona)){
        alert("Hubo un error, vuelva a intentar más tarde");
        return false;
    }
    if(inputAsiento == null || !/^[1-7][0-9]$|^[1-9]$|^80$/.test(inputAsiento)){
        alert("Hubo un error, vuelva a intentar más tarde");
        return false;
    }
    return true;
}
/*[A-H][1-9]$|^[A-H]10$*/