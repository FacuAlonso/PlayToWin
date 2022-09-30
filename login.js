function validardatos() {
    res = true
    var num03 = document.forms["Datos"]["nom01"].value;
    var num01 = document.forms["Datos"]["ape01"].value;
   

    if ((num03 == null || num03 == "") || (num01 == null || num01 == "")) {
        alert("Falta completar campos");
        res = false;
    }

    return res 
}
