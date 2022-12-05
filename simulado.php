<?php include "cabecalho.php"; ?>
            <h1 class="text-white">Simulado</h1>
            <form action="resultado.php" method="post" onsubmit="return verificar()" >
            <?php
                include "conexao.php";
                $query  = "select * from questoes ORDER BY rand() LIMIT 10;";
                $resultado = mysqli_query($conexao,$query)or die(mysqli_error($conexao));
                $total = mysqli_num_rows($resultado);
                echo "<div class='container'>";
                while($linha = mysqli_fetch_array($resultado)){
                  echo "<div class='card mt-3 ml-3'>";
                  echo "<div class='card-header'>"."<strong>".$linha["pergunta"]."</strong></div>";
                  echo "<div class='card-body'>";
                    echo "<p><input type='radio' name='".$linha["id"]."' value='a'/> A-) ".$linha["a"];
                    echo "</p><p><input type='radio' name='".$linha["id"]."' value='b'/>  B-) ".$linha["b"];
                    echo "</p><p><input type='radio' name='".$linha["id"]."' value='c'/>  C-) ".$linha["c"];
                    echo "</p><p><input type='radio' name='".$linha["id"]."' value='d'/>  D-) ".$linha["d"];
                    if(!empty($linha["e"])){
                        echo "</p><p><input type='radio' name='".$linha["id"]."' value='e'/>  E-) ".$linha["e"];
                    }
                    echo "</p>";
                    echo "</div></div>";
                }
            ?>
              <button type="submit" class="mt-4 btn btn-success offset-5">Enviar Questionario</button>
            </form>
        </div>
    </div>
</main>
<?php
    include "rodape.php";
?>