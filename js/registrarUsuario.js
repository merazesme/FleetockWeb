
$(document).ready(function()
{
    $('.registro2').hide();

     $('#fechaNacimiento').datepicker({
        format: 'yyyy-mm-dd',
    });
    $('#nombre').keypress(function(tecla) {
    if((tecla.charCode < 97 || tecla.charCode > 122) && (tecla.charCode < 65 || tecla.charCode > 90))
        {
            if(charCode >= 192 && charCode <= 255)
                return false;
        }
    });
    $('#apellidos').keypress(function(tecla) {
    if((tecla.charCode < 97 || tecla.charCode > 122) && (tecla.charCode < 65 || tecla.charCode > 90))
        {
            if(charCode >= 192 && charCode <= 255)
                return false;
        }
    });

    $('#tockname').keypress(function(tecla) {
    if((tecla.charCode < 97 || tecla.charCode > 122) && (tecla.charCode < 65 || tecla.charCode > 90) && tecla.charCode != 45  && tecla.charCode != 95 && tecla.charCode != 46) return false;
    });

    $('#password').keypress(function(tecla) {
    if((tecla.charCode < 97 || tecla.charCode > 122) && (tecla.charCode < 65 || tecla.charCode > 90) &&
    (tecla.charCode < 48 || tecla.charCode > 57) && tecla.charCode != 45 && tecla.charCode != 64
    && tecla.charCode != 95 && tecla.charCode != 58 && tecla.charCode != 59 && tecla.charCode != 63
    && tecla.charCode != 46 && tecla.charCode != 42 ) return false;
    });

    $('#confirmaPassword').keypress(function(tecla) {
    if((tecla.charCode < 97 || tecla.charCode > 122) && (tecla.charCode < 65 || tecla.charCode > 90) &&
    (tecla.charCode < 48 || tecla.charCode > 57) && tecla.charCode != 45 && tecla.charCode != 64
    && tecla.charCode != 95 && tecla.charCode != 58 && tecla.charCode != 59 && tecla.charCode != 63
    && tecla.charCode != 46 && tecla.charCode != 42 ) return false;
    });

    $('#fechaNacimiento').keypress(function(tecla) {
    if((tecla.charCode < 255 || tecla.charCode > 0)) return false;
    });
    var usuario;
    $('#btnRegistrar').click(function(e){
      $('.registro2').show('slow');
      $('.registro1').hide('slow');
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
            var datos = $('#formRegistro').serialize()+"&ide=0";

            $.ajax({
                url: '../FleetockWeb/php/modeloRegistro.php',
                type: 'post',
                data: datos,
                success: function(r)
                {
                    console.log("R: "+r);
                    if (r>-1) {
                        $('#resultado').html("Bienvenido a Fleetock");
                        $('.registro2').show('slow');
                        $('.registro1').hide('slow');
                        usuario=r;
                    }else if (r==-1) {
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
    $('.greenLight').click(function(){
		if($(this).hasClass('purpleLight'))
		{
      var datos="ide="+$(this).attr("id")+"&usuario="+usuario+"&ban=2";
			$.ajax({
					url: 'php/modeloRegistro.php',
					type: 'POST',
					data: datos,
					success: function(r)
					{
							console.log(r);
					}
			});
			$(this).removeClass('purpleLight').addClass('greenLight');
			$(this).html("<i class='material-icons'>add</i>");
		}
		else
		{
      var datos="ide="+$(this).attr("id")+"&usuario="+usuario+"&ban=1";
			$.ajax({
					url: 'php/modeloRegistro.php',
					type: 'POST',
					data: datos,
					success: function(r)
					{
							console.log(r);
					}
			});
			$(this).removeClass('greenLight').addClass('purpleLight');
			$(this).html('<i class="material-icons">attach_file</i>');
		}
	});
  $('#btnRegistrar2').click(function(e){
    var datos="usuario="+usuario+"&ban=3";
      $.ajax({
          url: 'php/modeloRegistro.php',
          type: 'POST',
          data: datos,
          success: function(r)
          {
              if(r>-1)
              {
                window.location.href = "php/Perfil.php?v1="+r+"&v2="+usuario;
              }
          }
      });
    });
});
