
$(document).ready(function()
{
    $('#usuarioLogin').keypress(function(tecla) {
    if((tecla.charCode < 97 || tecla.charCode > 122) && (tecla.charCode < 65 || tecla.charCode > 90) && tecla.charCode != 45  && tecla.charCode != 95 && tecla.charCode != 46) return false;
    });

    $('#passwordLogin').keypress(function(tecla) {
    if((tecla.charCode < 97 || tecla.charCode > 122) && (tecla.charCode < 65 || tecla.charCode > 90) &&
    (tecla.charCode < 48 || tecla.charCode > 57) && tecla.charCode != 45 && tecla.charCode != 64
    && tecla.charCode != 95 && tecla.charCode != 58 && tecla.charCode != 59 && tecla.charCode != 63
    && tecla.charCode != 46 && tecla.charCode != 42 ) return false;
    });

    $('#btnLogin').click(function(e){
        var usuario = $('#usuarioLogin').val();
        var password = $('#passwordLogin').val();
        if (usuario == "" || password == "") {
            $('#resultadoLogin').html("Favor de llenar todos los campos");
        }
        else
        {
            var datos = $('#formLogin').serialize()+'&ban=0';

            $.ajax({
                url: 'php/modeloLogin.php',
                type: 'post',
                data: datos,
                success: function(r)
                {
                    console.log(r);
                    if (r==1) {
                        $('#resultadoLogin').html("Contraseña incorrecta");
                    } else if (r==2){
                        $('#resultadoLogin').html("No existe el usuario");
                    }else {
                        {
                            //var x = r.split(",");
                            //var login = x[0];
                            //var usuario = x[1];
                            //console.log(login);
                            //console.log(usuario);
                            window.location.href = "php/Perfil.php";
                        }
                    }
                }
            });
        }
        return false;
    });
});
