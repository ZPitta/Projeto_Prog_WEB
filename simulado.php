<?php
    include "conexao.php";
    include "cabecalho.php";
    
    $pontuacao = 0;

    if(isset($_POST) && !empty($_POST)){
        $alternativa = $_POST["id"];

    }
?>
    <div class="row">
        <h1 class="text-white text-center mt-3 mb-2">Simulado</h1>
    </div>
    <br />
    <div class="row">
        <form action="./simulado.php" method="post">
            <?php                    
                $query = "select * from questoes order by rand() limit 10";
                $resultado = mysqli_query($conexao, $query);            
                while($linha = mysqli_fetch_array($resultado)){
            ?>
                <div class="form-check">
                    <div class="card bg-white offset-3 col-md-6 mt-3">
                        <div class="card-header">
                            <h3><?php echo $linha["pergunta"]; ?></h3>
                        </div>
                        <div class="card-body">
                            <input type="radio" name="<?php echo $linha["id"]; ?>" value="<?php echo $linha["a"]; ?>" />
                            <label for="<?php echo $linha["a"]; ?>"><?php echo $linha["a"]; ?> </label>
                            <br />
                            <input type="radio" name="<?php echo $linha["id"]; ?>" value="<?php echo $linha["b"]; ?>" />
                            <label for="<?php echo $linha["b"]; ?>"><?php echo $linha["b"]; ?> </label>
                            <br />
                            <input type="radio" name="<?php echo $linha["id"]; ?>" value="<?php echo $linha["c"]; ?>" />
                            <label for="<?php echo $linha["c"]; ?>"><?php echo $linha["c"]; ?> </label>
                            <br />
                            <input type="radio" name="<?php echo $linha["id"]; ?>" value="<?php echo $linha["d"]; ?>" />
                            <label for="<?php echo $linha["d"]; ?>"><?php echo $linha["d"]; ?> </label>
                            <br />
                            <input type="radio" name="<?php echo $linha["id"]; ?>" value="<?php echo $linha["e"]; ?>" />
                            <label for="<?php echo $linha["e"]; ?>"><?php echo $linha["e"]; ?> </label>
                            <br />
                        </div>
                    </div>
                </div>
            <?php
                }
            ?>
                <div class="d-grid gap-2 col-6 mx-auto ml-1">
                    <button type="submite" class="btn btn-lg bg-white text-dark mt-3">
                        <strong>Enviar resposta</strong>
                    </button>
                </div>
        </form>  
    </div>
<?php
    include "rodape.php";
?>
