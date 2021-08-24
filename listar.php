<style>
    body{
    font-family: Arial, Helvetica, sans-serif;
    }

    table{
        border: 1px solid black;
        margin: auto;
        margin-top: 40px;
        text-align: center;
        background:#fafafa ;
        /* width: 100%;
        max-width: 500px; */
    }
    td{
        border-right: 1px solid black;
        border-top: 1px solid black;
        border-bottom: 1px solid black;
    }

    td:nth-child(even) {
    background:lightgreen;
    }
    .field {
    display: flex;
    justify-content: center;
    margin: auto;
    padding: 10px;
    margin-bottom: 15px;
    border: 1px solid #DDD;
    border-radius: 5px;
    font-family: Arial, Helvetica, sans-serif;
    font-size: 16px;

}
    .decoration{
    text-decoration: none;
    color: black;
    cursor: pointer;
}

</style>
<table>
    <thead>
        <td>Id</td>
        <td>Nome</td>
        <td>Ano</td>
        <td>Cadastro</td>
        <td>Exemplares</td>
        <td>Controles</td>
    </thead>
    <tbody>
<?php
date_default_timezone_set('America/Sao_Paulo');
include('conexao.php');

$sql = 'SELECT * FROM tb_livro ORDER BY nm_livro ASC';
$executa = $GLOBALS['con']->query($sql);
/*
    repare que sempre que formos enviar um comando para o mysql, usaremos a linha
    acima, da mesma forma que usamos no cadastro.. nao muda nada

    .. como podemos ter mais de uma linha de resultados nesta consulat, iremos criar
    um laço de forma que ele percorra todos os resultados obtidos, linha a linha:
*/
while($livro = $executa->fetch_array()){    //convertemos a linha percorrida em array
    // agora acessamos os dados do livro, associando o nome da coluna desejada na tabela

    echo '<tr>
          <td>'.$livro['id_livro'].'</td>';
    echo '<td>'.$livro['nm_livro'].'</td>';
    echo '<td>'.date('Y',strtotime($livro['dt_ano'])).'</td>';
    echo '<td>'.date('Y',strtotime($livro['dt_cadastro'])).'</td>';
    echo '<td>'.$livro['qt_exemplares'].'</td>';
    echo '<td>
            <a href="editar.php?id_livro='.$livro['id_livro'].'">Editar</a>
            <a href="excluir.php?id_livro='.$livro['id_livro'].'">Excluir</a>
          </td>
          </tr>';
        }
        ?>
    </tbody>
</table>
<br>
<button class="field"><a href="cadastrar.php" class="decoration">Cadastrar Livros</a></button>
  