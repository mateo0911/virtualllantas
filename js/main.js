$(function () {

    $("#registro").on("click", function () {
        $("#formulariologin").hide();
        $("#formularioregistro").show("puff", {}, 700);

    });

    $("#login").on("click", function () {
        $("#formularioregistro").hide();
        $("#formulariologin").show("puff", {}, 700);

    });

    $("#formularioregistro").submit(function (e) {
        event.preventDefault();
        var form = $(this);
        $.ajax({
            type: "POST",
            url: "../funciones/user.php",
            data: form.serialize(),
            success: function (data) {
                Swal.fire({
                    position: 'center',
                    icon: 'info',
                    title: data,
                    showConfirmButton: false,
                    timer: 1500
                })
            }
        })
    });

    $("#formulariologin").submit(function (e) {
        event.preventDefault();
        var form = $(this);
        $.ajax({
            type: "POST",
            url: "../funciones/user.php",
            data: form.serialize(),
            success: function (data) {
                if (data == 'true') {
                    Swal.fire({
                        position: 'center',
                        icon: 'info',
                        title: 'INICIO CORRECTO',
                        showConfirmButton: false,
                        timer: 1500
                    })

                    setTimeout(function() {
                        location.href = '../vistas/index.php';
                    }, 1500);

                } else {
                    Swal.fire({
                        position: 'center',
                        icon: 'info',
                        title: 'USUARIO NO ENCONTRADO',
                        showConfirmButton: false,
                        timer: 1500
                    })
                }
            }

        })
    });

    $("#formalioregistropost").on('submit', function (e) {
        event.preventDefault();
        var form = $(this); //toma todos los elementos que me trae el formulario 
        $.ajax({
            type: 'POST',
            url: '../funciones/post.php',
            data: new FormData(this), //es para obtener los datos del formulario en arreglo
            contentType: false,
            cache: false,
            processData: false,
            success: function (data) {
                Swal.fire({
                    position: 'center',
                    icon: 'info',
                    title: data,
                    showConfirmButton: false,
                    timer: 1500
                })
                $.ajax({
                    type: 'POST',
                    url: '../funciones/post.php',
                    data: {"tipoformulario": 2}, 
                    success: function (data) {
                        data = $.parseJSON(data);
                        var listarposts = '';
                        for(var i in data) { // for pra recorrer todo el arreglo JSON
                            
                            listarposts +=`
                        <div class="container col-md-6 g-0 border rounded p-3" style="margin-left: 25%; margin-bottom: 10px " >
                            <div class="row ">
                                <div class="col-sm">
                                    <strong class="d-inline-block mb-2 text-primary">`+data[i].titulo+`</strong><br>
                                </div>
                                <div class="col-sm"></div>
                                <div class="col-sm">`+data[i].fecha+`</div>

                            </div>

                            <div class="row ">
                                <div class="col-sm">
                                    <img src="../images/`+data[i].imagen+`" alt="" width="100%">
                                </div>
                                <div class="col-sm w-25" style="text-align: justify;overflow-wrap: break-word;">`+data[i].contenido+`</div>

                            </div>
                        </div>`
                            
                        }
                       
                    $("#listarpost").html(listarposts);
                    }
                })
            }
        })
    })

    $("#file").change(function() { // detecta en el momento que encuentra un cambio en el campo de imagen
        var file = this.files[0];
        var imagefile = file.type;
        var match= ["image/jpeg","image/png","image/jpg"];// crea un arreglo con los tipos de imagenes permitidos
        if(!((imagefile==match[0]) || (imagefile==match[1]) || (imagefile==match[2]))){
            alert('POR FAVOR SELECIONE UN TIPO DE IMAGEN CORRECTO (JPEG/JPG/PNG).');
            $("#file").val(''); // ACA EN CASO DE SER INVALIDO EL TIPO DE FORMATO, LIMPIA EL CAMPO
            return false;
        }
    });
   

    $(document).ready(function() // funcion para cargar la consulta cada que se entra al documento
    {
        if ($("#bodypost").length > 0) {//se valida si el id existe
            $.ajax({
                type: 'POST',
                url: '../funciones/post.php',
                data: {"tipoformulario": 2}, 
                success: function (data) {
                    data = $.parseJSON(data);
                    var listarposts = '';
                    for(var i in data) { // for pra recorrer todo el arreglo JSON
                        
                        listarposts +=`
                        <div class="container col-md-6 g-0 border rounded p-3" style="margin-left: 25%; margin-bottom: 10px ">
                            <div class="row ">
                                <div class="col-sm">
                                    <strong class="d-inline-block mb-2 text-primary">`+data[i].titulo+`</strong><br>
                                </div>
                                <div class="col-sm"></div>
                                <div class="col-sm">`+data[i].fecha+`</div>

                            </div>

                            <div class="row ">
                                <div class="col-sm">
                                    <img src="../images/`+data[i].imagen+`" alt="" width="100%">
                                </div>
                                <div class="col-sm w-25" style="text-align: justify;overflow-wrap: break-word;">`+data[i].contenido+`</div>

                            </div>
                        </div>`
                        
                    }
                   
                $("#listarpost").html(listarposts);
                }
            })
        }
    })
})