
$(document).ready(function()
{
     $('#fechaNacimiento').datepicker({
        format: 'yyyy-mm-dd',
    });
    $('#nombre').keypress(function(tecla) {
        if ((tecla.charCode < 97 || tecla.charCode > 122)//letras mayusculas
            && (tecla.charCode < 65 || tecla.charCode > 90) //letras minusculas
            && (tecla.charCode != 241) //ñ
            && (tecla.charCode != 209) //Ñ
            && (tecla.charCode != 32) //espacio
            && (tecla.charCode != 225) //á
            && (tecla.charCode != 233) //é
            && (tecla.charCode != 237) //í
            && (tecla.charCode != 243) //ó
            && (tecla.charCode != 250) //ú
            && (tecla.charCode != 193) //Á
            && (tecla.charCode != 201) //É
            && (tecla.charCode != 205) //Í
            && (tecla.charCode != 211) //Ó
            && (tecla.charCode != 218) //Ú
            )
    return false;
    });
    $('#apellidos').keypress(function(tecla) {
    if((tecla.charCode < 97 || tecla.charCode > 122) && (tecla.charCode < 65 || tecla.charCode > 90))
    if ((tecla.charCode < 97 || tecla.charCode > 122)//letras mayusculas
        && (tecla.charCode < 65 || tecla.charCode > 90) //letras minusculas
        && (tecla.charCode != 241) //ñ
        && (tecla.charCode != 209) //Ñ
        && (tecla.charCode != 32) //espacio
        && (tecla.charCode != 225) //á
        && (tecla.charCode != 233) //é
        && (tecla.charCode != 237) //í
        && (tecla.charCode != 243) //ó
        && (tecla.charCode != 250) //ú
        && (tecla.charCode != 193) //Á
        && (tecla.charCode != 201) //É
        && (tecla.charCode != 205) //Í
        && (tecla.charCode != 211) //Ó
        && (tecla.charCode != 218) //Ú
        )
return false;
    });

    $('#tockname').keypress(function(tecla) {
    if((tecla.charCode < 97 || tecla.charCode > 122) && (tecla.charCode < 65 || tecla.charCode > 90) && tecla.charCode != 45  && tecla.charCode != 95 && tecla.charCode != 46) return false;
    });

    $('#password').keypress(function(tecla) {
    if((tecla.charCode < 97 || tecla.charCode > 122) && (tecla.charCode < 65 || tecla.charCode > 90) &&
    (tecla.charCode < 48 || tecla.charCode > 57) && tecla.charCode != 45 //-
    && tecla.charCode != 64 //@
    && tecla.charCode != 95 //_
    && tecla.charCode != 58 //:
    && tecla.charCode != 59 //;
    && tecla.charCode != 63 //?
    && tecla.charCode != 46 //.
    && tecla.charCode != 42 //*
    && tecla.charCode != 43 //+
    && tecla.charCode != 35 //#
    )
    return false;
    });

    $('#confirmaPassword').keypress(function(tecla) {
    if((tecla.charCode < 97 || tecla.charCode > 122) && (tecla.charCode < 65 || tecla.charCode > 90) &&
    (tecla.charCode < 48 || tecla.charCode > 57)
    && tecla.charCode != 45 //-
    && tecla.charCode != 64 //@
    && tecla.charCode != 95 //_
    && tecla.charCode != 58 //:
    && tecla.charCode != 59 //;
    && tecla.charCode != 63 //?
    && tecla.charCode != 46 //.
    && tecla.charCode != 42 //*
    && tecla.charCode != 43 //+
    && tecla.charCode != 35 //#
    )
    return false;
    });

    $('#fechaNacimiento').keypress(function(tecla) {
    if((tecla.charCode < 255 || tecla.charCode > 0)) return false;
    });

    $('#btnRegistrar').click(function(e){
        var nombre = $('#nombre').val();
        var apellido = $('#apellido').val();
        var email = $('#email').val();
        var tockname = $('#tockname').val();
        var password = $('#password').val();
        var confirmaPassword = $('#confirmaPassword').val();
        var fechaNacimiento = $('#fechaNacimiento').val();
        if (nombre == "" || apellido == "" || email == "" || tockname == "" || password == "" ||confirmaPassword =="" || fechaNacimiento == "") {
            $('#resultado').html("Favor de llenar todos los campos");
        }
        else if (!email.match(/\w+@\w+\.+[a-z]/)) {
            $('#resultado').html("Favor de ingresar un correo válido");
       }else if (document.formulario.grupoSexo[0].checked == false && document.formulario.grupoSexo[1].checked == false) {
           $('#resultado').html("Seleccione un sexo");
       }
        else if(password == confirmaPassword)
        {
            var datos = $('#formRegistro').serialize();

            $.ajax({
                url: '../php/modeloRegistro.php',
                type: 'post',
                data: datos,
                success: function(r)
                {
                    if (r==1) {
                        $('#resultado').html("Bienvenido a Fleetock");
                    }else if (r==2) {
                        $('#resultado').html("Ingrese otro Tockname");
                    } else{
                        $('#resultado').html("Ups..Creo que algo ha salido mal");
                    }
                }
            });
        }else {
            $('#resultado').html("Las contraseñas no coinciden");
        }
        return false;
    });
});
