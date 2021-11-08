function comprobar() {
    document.getElementById('cantidad_hora').readOnly = document.getElementById("checkIndefinido").checked;
    /*
    * Se le puede asignar 0 o " ".
    */
    document.getElementById('cantidad_hora').value = "";
}

/*$("#boton_aceptar").click(function () {
    Swal.fire({
        icon: 'success',
        title: 'El usuario se agregó correctamente.',
        showConfirmButton: false,
        timer: 3000
    });
});*/

(function () {
    $("tr td #delete").click(function (ev) {
        ev.preventDefault();
        var id = $(this).attr('data-id');
        console.log(id);
        Swal.fire({
            title: '¿Quieres eliminar al usuario?',
            text: "El usuario se eliminará.",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si',
            cancelButtonText: 'No',
        }).then((result) => {
            if (result.value) {
                //Ajax
                $.ajax({
                    method: 'POST',
                    url: 'eliminar',
                    data: { 'id': id },
                    success: function () {
                        Swal.fire(
                            'Eliminado!',
                            'El registro se eliminó satisfactoriamente.',
                            'success'
                        )
                    }, statusCode: {
                        400: function (data) {
                            var json = JSON.parse(data.responseText);
                            Swal.fire(
                                'Error!',
                                json.msg,
                                'error'
                            )
                        }
                    }
                })

            }
        })
    })
})();