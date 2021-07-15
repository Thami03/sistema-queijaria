
<?php
include ("config.php");
if(!isset($_SESSION['codigousuario'])) 
header("location: login.php");


if(isset($_POST['novavenda'])) 
{
	extract($_POST);
	$consulta = $conexao->query("INSERT into tb_vendas 
	(ven_que_codigo, ven_cliente, ven_valorvenda, ven_datavenda,ven_quantidade,ven_usu_codigo) 
	values ('$novavenda','$cliente','$valordavenda','$data1','$quantidade', 1)");
	$consulta3 = $conexao->query("UPDATE tb_queijosproduzidos
	set que_quantidade = que_quantidade - $quantidade where que_codigo = $novavenda");
	header("Location: vendas.php");
	echo " NOVA VENDA ADICIONADA!";
	
}
$consulta2 = $conexao->query("SELECT * , year(que_datafabricacao) as anofabricacao
FROM tb_queijosproduzidos where que_quantidade>0 order by que_produto");


?>
<?php include("ca.php");?>

<html>

<meta charset="utf-8">
	

<div class="container-fluid">

<div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h5 class="m-0 font-weight-bold text-primary"> Nova venda</h5>
							<p>	Adicione uma nova venda ao sistema.</p>

                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
								<div class="row">
								</div></div><div class="col-sm-12 col-md-6"><div id="dataTable_filter" class="dataTables_filter">
								</div></div></div>
								<div class="row"><div class="col-sm-12">
								<form action="?" method="POST">
								Escolha o produto: <select name="novavenda" class="form-control" id="novavenda">
									<?php while($resultado2 = $consulta2->fetch_assoc()) { ?>
										<option value="<?php echo $resultado2['que_codigo'] ?>"><?php echo $resultado2['que_produto'] ?> | Lote: <?php echo $resultado2['que_codigo'] ?>/<?php echo $resultado2['anofabricacao']; ?> | <?php echo $resultado2['que_quantidade']; ?> unidades disponíveis | Preço unitário: R$ <?php echo $resultado2['que_valorvenda']; ?> </option>
									<?php } ?>
								</select>
								<table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0" role="grid" aria-describedby="dataTable_info" style="width: 100%;">
                                 

								 <thead>
								 
                                        <tr role="row"><th class="gggg" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 54.8889px;">Cliente </th>
										<th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 62.8889px;"> Valor da venda (R$)</th>
										<th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" style="width: 29.8889px;">Data da venda</th>
                                   		<th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" style="width: 29.8889px;">Quantidade (un, litros, etc.)</th>
                                   		<th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" style="width: 29.8889px;">Opções</th>

								   </thead>

                                    <tbody>
                                        
                                    <tr role="row" class="odd">

                                        <td><input type="text" placeholder="Nome do cliente" name="cliente"></td> 
										<td><input type="number" placeholder="R$ 00.00" name="valordavenda" step="0.1" required></td> 
										<td><input type="date" name="data1" required></td>					
										<td><input type="text"placeholder="Quantidade comprada" name="quantidade" required></td>
										<td><button input type="submit"class="btn btn-success btn-circle"> <i class="fas fa-check"></i>
										</a> </button></td>	

	
	
                                    </tr>
                                        
                                          </tbody>
								

                                </table></form></div></div><div class="row"><div class="col-sm-12 col-md-5">
                            </div>
</div>
</html>
<?php include("ro.php");?>
