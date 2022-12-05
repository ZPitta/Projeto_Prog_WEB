<?php
include "conexao.php";
?>
<?php include "cabecalho.php"; 
   


$pontuacao = 0;
if( isset($_POST) && !empty($_POST))
{
    echo "<h1 class='text-white'>Resultado</h1>";
    foreach ($_POST as $IdPergunta => $respostaMarcada) 
    {
        //echo $respostaMarcada." - ".$IdPergunta."<br>";
        $query  = "select * from questoes where id = ".$IdPergunta;
        
        $resultado = mysqli_query($conexao,$query)or die(mysqli_error($conexao));
        
        echo "<div class='container'>";

        while($linha = mysqli_fetch_array($resultado)){
            echo "<div class='card mt-3'>";
            echo "<div class='card-header'>"."<strong>".$linha["pergunta"]."</strong></div>";
            echo "<div class='card-body'>";
          
            if($respostaMarcada == "a")
            {
                if($linha["correta"] == "A")
                {
                    echo "<p> <div class='alert alert-success'>CORRETO! A-) ".$linha["a"]."</div>";
                    $pontuacao++;
                }
                else
                {
                    echo "<p><div class='alert alert-danger'> Sua Resposta A-) ".$linha["a"]."</div>";
                }
                
            }
            else
            {
                if($linha["correta"] == "A")
                {
                    echo "<p> <div class='alert alert-success'> CORRETA! A-) ".$linha["a"]."</div>";
                    
                }
                else
                {
                    echo "<p> A-) ".$linha["a"];
                }


               
            }
            if($respostaMarcada == "b")
            {
                if($linha["correta"] == "B")
                {
                    echo "</p><p>  <div class='alert alert-success'>CORRETO! B-) ".$linha["b"]."</div>";
                    $pontuacao++;
                }
                else
                {
                    echo "</p><p><div class='alert alert-danger'> Sua Resposta B-) ".$linha["b"]."</div>";
                }
               
            }
            else
            {
                if($linha["correta"] == "B")
                {
                    echo "</p><p>  <div class='alert alert-success'>CORRETA! B-) ".$linha["b"]."</div>";
                   
                }
                else
                {
                    echo "</p><p> B-) ".$linha["b"];
                }
               
            }

            if($respostaMarcada == "c")
            {
                if($linha["correta"] == "C")
                {
                    echo "</p><p>  <div class='alert alert-success'>CORRETO! C-) ".$linha["c"]."</div>";
                    $pontuacao++;
                }
                else
                {
                    echo "</p><p><div class='alert alert-danger'> Sua Resposta C-) ".$linha["c"]."</div>";
                }
            }
            else
            {
                if($linha["correta"] == 'C')
                {
                    echo "</p><p>  <div class='alert alert-success'> CORRETA! C-) ".$linha["c"]."</div>";
                   
                }
                else
                {
                    echo "</p><p> C-) ".$linha["c"];
                }
            }
            if($respostaMarcada == "d")
            {
                if($linha["correta"] == 'D')
                {
                    echo "</p><p>  <div class='alert alert-success'>CORRETO! D-) ".$linha["d"]."</div>";
                    $pontuacao++;
                }
                else
                {
                    echo "</p><p><div class='alert alert-danger'> Sua Resposta D-) ".$linha["d"]."</div>";
                }
               
            }
            else
            {
                if($linha["correta"] == 'D')
                {
                    echo "</p><p>  <div class='alert alert-success'> CORRETA! D-) ".$linha["d"]."</div>";
                   
                }
                else
                {
                    echo "</p><p> D-) ".$linha["d"];
                }
            }
          
          
          
            if(!empty($linha["e"]))
            {
                if($respostaMarcada == "e")
                {
                    if($linha["correta"] == 'E')
                    {
                        echo "</p><p>  <div class='alert alert-success'>CORRETO! E-) ".$linha["e"]."</div>";
                        $pontuacao++;
                    }
                    else
                    {
                        echo "</p><p><div class='alert alert-danger'> Sua Resposta E-) ".$linha["e"]."</div>"; 
                    }
                  
                }
                else
                {
                    if($linha["correta"] == 'E')
                    {
                        echo "</p><p>  <div class='alert alert-success'> CORRETA! E-) ".$linha["e"]."</div>";
                       
                    }
                    else
                    {
                        echo "</p><p> E-) ".$linha["e"];
                    }
                }
               
               
            }
           
            echo "</p>";
            echo "</div></div>";
        }
    }
    ?>

    <div class="card mt-3">
        <h3>Sua pontuação foi:<?php echo " $pontuacao" ?></h3>
    </div>

    <button class="btn btn-success mt-3 mb-3 offset-5">
        <a style="text-decoration:none" href="simulado.php" class="text-white">Tentar novamente</a>
    </button>

    <?php
}
else{
    header("location: index.php");
    exit();
}


?>

</div>
    </div>
</main>
<?php include "rodape.php"; ?>