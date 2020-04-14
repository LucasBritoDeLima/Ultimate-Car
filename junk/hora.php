<?php 
                    //Capturando o fuso horário do Brasil
                    date_default_timezone_set('America/Sao_Paulo');
                    //Capturar a hora
                    $hora = date('H:i:s');
                    //Explode a string hora
                    $explodeHora = explode(':',$hora);
                    //Verifica o estado do dia
                    if ($explodeHora > 5 && $explodeHora < 12){
                        echo "Bom dia, São $hora";
                    } elseif ($explodeHora > 12 && $explodeHora < 18) {
                        echo "Boa tarde, São $hora";
                    } else {
                        echo "Boa noite, São $hora";
                    }
                    ?>