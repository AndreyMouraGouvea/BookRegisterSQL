<?php
include('conexao.php');
if(isset($_GET['id_livro'])){
    $sql = 'SELECT * FROM tb_livro WHERE id_livro='.$_GET['id_livro'];
    $res = $GLOBALS['con']->query($sql);
    $livro = $res->fetch_array();
    //$livro = $res->fetch_object();
    //echo $livro->dt_cadastro;
    // echo $livro['dt_ano'];

?>
<style>
body{
    font-family: Arial, Helvetica, sans-serif;
}

.content{
    display: flex;
    justify-content: center;
}
.contato{
    width: 100%;
    max-width: 500px;
}
.form{
    display: flex;
    flex-direction: column;
}
.field {
    padding: 10px;
    margin-bottom: 15px;
    border: 1px solid #DDD;
    border-radius: 5px;
    font-family: Arial, Helvetica, sans-serif;
    font-size: 16px;

}
#field{
    cursor: pointer;
}
.decoration{
    text-decoration: none;
    color: black;
    cursor: pointer;
}
textarea{
    height: 150px;
}
</style>
<section class="content">
        <div class="contato">
            <h3> Editar Cadastro de Livros</h3>
            <form class="form" method="POST">
                <input type="hidden" name="id" value="<?php= $_GET['id_livro']?>">
                <input class="field" type="text" name="name" placeholder="Nome do Livro" value="<?php echo $livro['nm_livro'];?>">
                <input class="field" type="number" name="ano" placeholder="Ano do Livro" value="<?php echo $livro['dt_ano'];?>">
                <input class="field" type="number" name="exemplares" placeholder="Exemplares" value="<?php echo $livro['qt_exemplares'];?>">
                <!-- <textarea class="field" name="message" placeholder="Digite sua mensagem aqui."></textarea> -->
                <input class="field" id="field" type="submit" value="Salvar">
                <button class="field"><a href="listar.php" class="decoration">Listar Livros</a></button>
            </form>
        </div>
    </section>
</form>
<?php
}
if(isset($_POST['id'])){
    $nome = $_POST['name'];
    $ano = $_POST['ano'];
    $exemplares = $_POST['exemplares'];

    $sql = 'UPDATE tb_livro SET nm_livro="'.$nome.'", dt_ano="'.$ano.'", qt_exemplares = "'.$exemplares.'"  WHERE id_livro = ' .$_POST['id'];
    echo $sql;
    $res = $GLOBALS['con']->query($sql);
    if($res){
        echo "<h3 style= 'display: flex; justify-content: center;'>
        Atualizado com Sucesso!</h3>";
    }else{
        echo "<h3 style= 'display: flex; justify-content: center;'>
        Erro ao Atualizar!</h3>".$GLOBALS['con']->error;
    }
}
?>