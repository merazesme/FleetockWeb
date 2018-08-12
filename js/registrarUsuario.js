
$(document).ready(function()
{
    $('.registro2').hide();

     $('#fechaNacimiento').datepicker({
        format: 'yyyy-mm-dd',
		minDate: new Date(1918,0,1),
		maxDate: new Date(2000,11,31),
        i18n:
        {
            months: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
            monthsShort: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'],
            weekdays: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sabado'],
            weekdaysShort: ['Dom', 'Lun', 'Mar', 'Mie', 'Jue', 'Vie', 'Sab'],
            weekdaysAbbrev:	['D','L','M','M','J','V','S']
        }
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
    var usuario;
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
            var datos = $('#formRegistro').serialize()+"&ban=0";

            $.ajax({
                url: '../FleetockWeb/php/modeloRegistro.php',
                type: 'post',
                data: datos,
                success: function(r)
                {
                    console.log(r);
                    if (r>-1) {
                        $('#resultado').html("Bienvenido a Fleetock");
                        $('.registro2').show('slow');
                        $('.registro1').hide('slow');
                        usuario=r;
                    }else if (r==-1) {
                        $('#resultado').html("Ingrese otro Tockname");
                    } else if(r==-2){
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
							//console.log(r);// Si regresa 1 quiere decir que se realizo exitosamente
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
							//console.log(r);// Si regresa 1 quiere decir que se realizo exitosamente
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
          { if(r>-1)
            { window.location.href = "php/Perfil.php";
            }
          }
      });
    });
});
