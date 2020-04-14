<?php 
// Include the database config file 
include_once 'conexao/dbConfig.php'; 
 
if(!empty($_POST["montadora_id"])){ 
    // Fetch state data based on the specific country 
    $query = "SELECT * FROM modelo WHERE montadora_id = ".$_POST['montadora_id'].""; 
    $result = $db->query($query); 
     
    // Generate HTML of state options list 
    if($result->num_rows > 0){ 
        echo '<option value="">Selecione uma opção</option>'; 
        while($row = $result->fetch_assoc()){  
            echo '<option value="'.$row['idModelo'].'">'.$row['modelo'].'</option>'; 
        } 
    }else{ 
        echo '<option value="">Opção não disponível</option>'; 
    }
}elseif(!empty($_POST["modelo_id"])){
    $model = $_POST["modelo_id"];
    // Fetch city data based on the specific state 
    $query = "SELECT * FROM carro WHERE modelo_id ='$model' group by nomeCarro"; 
    $result = $db->query($query); 
     
    // Generate HTML of city options list 
    if($result->num_rows > 0){ 
        echo '<option value="">Selecione uma opção</option>'; 
        while($row = $result->fetch_assoc()){  
            echo '<option value="'.$row['nomeCarro'].'">'.$row['nomeCarro'].'</option>'; 
        } 
    }else{ 
        echo '<option value="">Opção não disponível</option>'; 
    } 
}

//---------------------------------------------------------------------------------------------------

elseif(!empty($_POST["carro_id"])){ 
    // Fetch city data based on the specific state
    $car = $_POST["carro_id"];
    $query = "SELECT * FROM carro WHERE nomeCarro ='$car' group by ano"; 
    $result = $db->query($query); 
     
    // Generate HTML of city options list 
    if($result->num_rows > 0){ 
        echo '<option value="">Selecione uma opção</option>'; 
        while($row = $result->fetch_assoc()){  
            echo '<option value="'.$row['ano'].'">'.$row['ano'].'</option>'; 
        } 
    }else{ 
        echo '<option value="">Motor não disponivel</option>'; 
    } 
}
//------------------------------------------------------------------------------
elseif(!empty($_POST["ano_id"])){ 
    // Fetch city data based on the specific state
    $year = $_POST["ano_id"];
    $query = "SELECT * FROM carro WHERE ano ='$year'"; 
    $result = $db->query($query); 
     
    // Generate HTML of city options list 
    if($result->num_rows > 0){ 
        echo '<option value="">Selecione uma opção</option>'; 
        while($row = $result->fetch_assoc()){  
            echo '<option value="'.$row['motor'].'">'.$row['motor'].'</option>'; 
        } 
    }else{ 
        echo '<option value="">Motor não disponivel</option>'; 
    } 
}
?>