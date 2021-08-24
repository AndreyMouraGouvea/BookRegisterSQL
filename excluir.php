<?php 
include('conexao.php');
ini_set('default_charset', 'utf-8');
// só ira executar os códigos abaixo se existir a variavel id_livro na url
if(isset($_GET['id_livro'])){
// preparamos a consulta sql de exclusão
$sql = 'DELETE FROM tb_livro WHERE id_livro = '.$_GET['id_livro'];
$executa = $GLOBALS['con']->query($sql);
    if($executa){
        echo '<script>
                alert("Livro excluído");
                window.location = "listar.php"
              </script>';
    }else{
        echo 'Erro ao excluír livro: '.$GLOBALS['con']->error;
    }
}
?>