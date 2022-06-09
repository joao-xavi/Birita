<?php
include("config.php");
if(isset($_POST['input'])){

    $input = $_POST['input'];

    $query = "SELECT * FROM receita WHERE concat(',',tagsreceita,',') LIKE concat(',%{$input}%,')";

    $result = mysqli_query($conexao,$query);

    if(mysqli_num_rows($result) > 0){?>
                <div id="searchResults" class="search-results-block">
                    <div class="row">
                        <?php
                        while($row = mysqli_fetch_assoc($result)){
                            $nomereceita =  $row['nomereceita']; 
                            $tagsreceita =  $row['tagsreceita']; 
                            $descricaoreceita =  $row['descricaoreceita']; 
                            $imagemreceita =  $row['imagemreceita']; 
                        ?>
                        <div class="col-sm-4">
                            <div class="product-card">
                                <div class="card">
                                    <img src="img/<?php echo $imagemreceita;?>" style="width: 100%">
                                        <h1><?php echo $nomereceita;?></h1>
                                        <button class="botaoReceita">Saiba como fazer</button>

                                        <div class="row">
                                        <p class="desc"><?php echo $descricaoreceita;?></p>
                                        </div>
                                    <div class="row">
                                        <p class="tags"><?php echo $tagsreceita;?></p>
                                    </div>
                                    <p><button>Favoritar</button></p>
                                </div>
                            </div>
                        </div>
                        <?php
                        }
                        ?>
                    </div>
                </div>
            </div>

        <?php
    

    }else{
        echo"<h6 class='text-danger text-center mt-3'>Não achamos nada com seus ingredientes :(</h6>";
    }
}
?>        
