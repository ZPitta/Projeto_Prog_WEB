<?php
    include "conexao.php";

    if(isset($_POST) && !empty($_POST)){
        if(empty($_POST["pergunta"])){
            ?>
                <div class="alert alert-danger">
                    O campo pergunta não pode estar em branco.
                </div>
            <?php
        }else if(empty($_POST["A"])){
            ?>
                <div class="alert alert-danger mt-3">
                    A alternativa 'A' não pode estar vazia.
                </div>
            <?php
        }else if(empty($_POST["B"])){
            ?>
                <div class="alert alert-danger mt-3">
                    A alternativa 'B' não pode estar vazia.
                </div>
            <?php
        }else if(empty($_POST["C"])){
            ?>
                <div class="alert alert-danger mt-3">
                    A alternativa 'C' não pode estar vazia.
                </div>
            <?php
        }else if(empty($_POST["D"])){
            ?>
                <div class="alert alert-danger mt-3">
                    A alternativa 'D' não pode estar vazia.
                </div>
            <?php
        }else if(empty($_POST["E"])){
            ?>
                <div class="alert alert-danger mt-3">
                    A alternativa 'E' não pode estar vazia.
                </div>
            <?php
        }else if(empty($_POST["correta"])){
            ?>
                <div class="alert alert-danger mt-3">
                    É necessário selecionar uma alternativa correta.
                </div>
            <?php
        }else{
            $pergunta = $_POST["pergunta"];
            $a = $_POST["A"];
            $b = $_POST["B"];
            $c = $_POST["C"];
            $d = $_POST["D"];
            $e = $_POST["E"];
            $correta = $_POST["correta"];

            $query = "insert into questoes (pergunta,a,b,c,d,e,correta) ";
            $query = $query." values('$pergunta','$a','$b','$c','$d','$e','$correta')";
            $resultado = mysqli_query($conexao, $query);
            if($resultado == 1){
                ?>
                    <div class="alert alert-success mt-3">
                        Pergunta cadastrada com sucesso.
                    </div>
                <?php
            }
        }
    }
    include "./cabecalho.php";
?>
<div class="row">
    <form action="./index.php" method="post">
        <div class="card offset-3 col-md-6 mt-3">
            <div class="card-header text-center">
                <h3>Faça uma pergunta<h3>
            </div>
            <div class="card-body text-center">
                <label class="form-label h4" for="pergunta">Pergunta</label>
                <textarea name="pergunta" style="width: 38rem;"></textarea>
                <br /><br />
                <label class="h5">A)</label>
                <input type="radio" name="correta" value="A" />
                <input type="text" name="A" />
                <br /><br />
                <label class="h5">B)</label>
                <input type="radio" name="correta" value="B" />
                <input type="text" name="B" />
                <br /><br />
                <label class="h5">C)</label>
                <input type="radio" name="correta" value="C" />
                <input type="text" name="C" />
                <br /><br />
                <label class="h5">D)</label>
                <input type="radio" name="correta" value="D" />
                <input type="text" name="D" />
                <br /><br />
                <label class="h5">E)</label>
                <input type="radio" name="correta" value="E" />
                <input type="text" name="E" />
                <br /><br />
                <button type="submite" class="btn btn-dark mb-3">Salvar Pergunta</button>
                <br />
                <a href="simulado.php">Link para pag. de questionário.</a>
            </div>
        </div>  
    </form>
</div>
<?php
    include "./rodape.php";
?>