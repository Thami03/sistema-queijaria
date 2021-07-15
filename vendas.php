
<?php
include ("config.php");
if(!isset($_SESSION['codigousuario'])) 
header("location: login.php");

$consulta = $conexao->query("SELECT * ,date_format(ven_datavenda,'%d/%m/%Y') as data1,
year(que_datafabricacao) as anofabricacao
FROM tb_vendas join tb_queijosproduzidos on ven_que_codigo = que_codigo where ven_pago='0'");
	
if(isset($_GET['excluir'])){
	$codigo = $_GET['excluir'];
	
	$consulta4 = $conexao->query("select * from tb_vendas where ven_codigo = $codigo");
	$resultado4 = $consulta4->fetch_assoc();
	$quantidade = $resultado4['ven_quantidade'];
	$produto = $resultado4['ven_que_codigo'];
	
	$consulta5 = $conexao->query("UPDATE tb_queijosproduzidos
	set que_quantidade = que_quantidade + $quantidade where que_codigo = $produto");
	
	$consulta2= $conexao->query("delete from tb_vendas where ven_codigo = $codigo");

	header("location: vendas.php");
}

if  (isset($_GET['pagar'])){
	$codigo = $_GET['pagar'];
	$consulta3= $conexao->query("UPDATE  tb_vendas SET ven_pago='1' where ven_codigo = $codigo");
	header("location: vendas.php");
		//echo "VENDA PAGA!";
}

?>
<?php include("ca.php");?>

<html>

<meta charset="utf-8">

<div class="container-fluid">

<div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h5 class="m-0 font-weight-bold text-primary"> Vendas não pagas</h5>
							<p>	Os três ícones abaixo são respectivamente, "Registrar Pagamento", "Editar venda" e "Cancelar venda".</p>

                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
								<div class="row">
								</div></div><div class="col-sm-12 col-md-6"><div id="dataTable_filter" class="dataTables_filter">
								</div></div></div>
								<div class="row"><div class="col-sm-12"><table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0" role="grid" aria-describedby="dataTable_info" style="width: 100%;">
                                    <thead>
                                        <tr role="row"><th class="gggg" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 54.8889px;">Produto</th>
										<th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 62.8889px;">Lote</th>
										<th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 62.8889px;">Cliente</th>
										<th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 62.8889px;">Data da Venda</th>
										<th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 47.8889px;">Valor da venda</th>
										<th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" style="width: 29.8889px;">Quantidade comprada</th>
										<th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" style="width: 29.8889px;">Opções</th>

</thead>
			<?php while($resultado = $consulta ->fetch_assoc()) { ?>

                                    <tbody>
                                        
                                    <tr role="row" class="odd">
                                        <td><?php echo $resultado['que_produto']; ?></td> 
										<td><?php echo $resultado['que_codigo']; ?>/<?php echo $resultado['anofabricacao']; ?></td> 
                                        <td><?php echo $resultado['ven_cliente']; ?></td> 
										<td><?php echo $resultado['data1']; ?></td> 
										<td>R$<?php echo $resultado['ven_valorvenda']; ?></td>
										<td><?php echo $resultado['ven_quantidade']; ?></td>	
										<td><a href="?pagar=<?php echo $resultado['ven_codigo']; ?>" alt="registrar pagamento"><i class="far fa-file-alt mr-1"></i></a> | <a href="editarvenda.php?codigo=<?php echo $resultado['ven_codigo']; ?>"><i class="fas fa-edit"></i></a>
										 | <a href="?excluir=<?php echo $resultado['ven_codigo']; ?>"><i class="fas fa-trash" alt="excluir"></i></a>
										</td>
									
	
	
                                    </tr>
                                        
                                          </tbody>
			<?php } ?>
					  
                                </table></div></div><div class="row"><div class="col-sm-12 col-md-5">
                            </div>
</div>
</html>
<?php include("ro.php");?>
