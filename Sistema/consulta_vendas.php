<?php
  
  // Incluir arquivo de dados
  include 'baseDados.php';
  $DBMagico = new BancoDados;
  // excluir registro da tabela
  if(isset($_GET['deleteId']) && !empty($_GET['deleteId'])) {
      $deleteId = $_GET['deleteId'];
      $DBMagico->excluir_venda($deleteId);
  }
     
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Consulta Vendas</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"/>
  <style>
  .home{
    background-image: linear-gradient(to right,rgb(0, 92, 197), rgb(90, 20, 220));
    text-decoration: none;
    color: white;
    cursor: pointer;
    border-radius: 10px;
    font-size: 15px;
    padding: 10px;
}
body{
    font-family: Roboto Flex;
    background-image: linear-gradient(to right, rgb(20, 147, 220), rgb(11, 30, 54));
    color: white;
}
.table{
  color:white;
}
.card{
  background-image: linear-gradient(to right, rgb(20, 147, 220), rgb(11, 30, 54));
  color: white;;
}

</style>
</head>
<body>
<a class="home" href="principal.php">Home</a>
<div class="card text-center" style="padding:15px;">
  <h4>Consulta Vendas</h4>
</div><br><br> 
<div class="container">
  <?php
    if (isset($_GET['msg1']) == "insert") {
      echo "<div class='alert alert-success alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert'>×</button>
              Seu registro foi inserido com sucesso!
            </div>";
      } 
    if (isset($_GET['msg2']) == "update") {
      echo "<div class='alert alert-success alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert'>×</button>
              Seu registro foi atualizado com sucesso!
            </div>";
    }
    if (isset($_GET['msg3']) == "delete") {
      echo "<div class='alert alert-success alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert'>×</button>
              Registro Excluido com sucesso!
            </div>";
    }
  ?>
  <h2><div class="form-group">
                      <label for="id_venda">Vendas</label><a href="vendas.php" style="float:right;"><button class="btn btn-success"><i class="fas fa-plus"></i></button></a>
                      </h2>

  <table class="table table-hover">
    <thead>
      <tr>
        <th>Id_Venda</th>
        <th>Id_cliente</th>
        <th>Valor Total</th>
        <th>Nota Fiscal</th>
        <th>Data da Venda<th>
        
      </tr>
    </thead>
    <tbody>
        <?php 
          $vendas = $DBMagico->selecionar_venda(); 
          foreach ($vendas as $venda) {
        ?>
        <tr>
          <td><?php echo $venda['id_venda'] ?></td>
          <td><?php echo $venda['id_cl'] ?></td>
          <td><?php echo $venda['vl_vendatotal'] ?></td>
          <td><?php echo $venda['vl_notafiscal'] ?></td>
          <td><?php echo $venda['dt_venda'] ?></td>
          
         <td>
            <button class="btn btn-primary mr-2"><a href="update_vendas.php?editId=<?php echo $venda['id_venda'] ?>">
              <i class="fa fa-pencil text-white" aria-hidden="true"></i></a></button>
            <button class="btn btn-danger"><a href="consulta_vendas.php?deleteId=<?php echo $venda['id_venda'] ?>" onclick="confirm('Tem certeza que deseja excluir o registro?')">
              <i class="fa fa-trash text-white" aria-hidden="true"></i>
            
            </a></button>
          </td>
        </tr>
      <?php } ?>
    </tbody>
  </table>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>