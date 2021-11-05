function comprobar() {
    document.getElementById('cantidad_hora').readOnly = document.getElementById("checkIndefinido").checked;
    /*
    * Se le puede asignar 0 o " ".
    */
    document.getElementById('cantidad_hora').value = "";
}