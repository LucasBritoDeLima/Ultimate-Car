$(document).ready(function(){
    $('#montadora').on('change', function(){
        var montadoraID = $(this).val();
        if(montadoraID){
            $.ajax({
                type:'POST',
                url:'../dao/ajaxData.php',
                data:'montadora_id='+montadoraID,
                success:function(html){
                    $('#modelo').html(html);
                    $('#carro').html('<option value="">Selecione uma opção</option>'); 
                }
            }); 
        }else{
            $('#carro').html('<option value="">Selecione uma opção</option>');
            $('#modelo').html('<option value="">Selecione uma opção</option>');
            $('#ano').html('<option value="">Selecione uma opção</option>');
        }
    });
    
    $('#modelo').on('change', function(){
        var modeloID = $(this).val();
        if(modeloID){
            $.ajax({
                type:'POST',
                url:'../dao/ajaxData.php',
                data:'modelo_id='+modeloID,
                success:function(html){
                    $('#carro').html(html);
                }
            }); 
        }else{
            $('#ano').html('<option value="">Selecione uma opção</option>');
	$('#motor').html('<option value="">Selecione uma opção</option>');
        }
    });
	
	/************************************************************************/

    $('#carro').on('change', function(){
        var carroID = $(this).val();
        if(carroID){
            $.ajax({
                type:'POST',
                url:'../dao/ajaxData.php',
                data:'carro_id='+carroID,
                success:function(html){
                    $('#ano').html(html);
                }
            }); 
        }else{
            $('#motor').html('<option value="">Selecione uma opção</option>');
        }
    });
    /**2nd implementation**/
        $('#ano').on('change', function(){
        var anoID = $(this).val();
        if(anoID){
            $.ajax({
                type:'POST',
                url:'../dao/ajaxData.php',
                data:'ano_id='+anoID,
                success:function(html){
                    $('#motor').html(html);
                }
            }); 
        }else{
            $('#motor').html('<option value="">Selecione uma opção</option>');
        }
    });
});

