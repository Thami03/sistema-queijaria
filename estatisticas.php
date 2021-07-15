
<?php
include ("config.php");
if(!isset($_SESSION['codigousuario'])) 
header("location: login.php");

$consulta1 = $conexao-> query ("select *,date_format(con_datapagamento,'%d/%m/%Y') as data1
from tb_contas where con_usu_codigo=".$_SESSION['codigousuario'] . " and con_pago = 0");

if(isset($_GET['excluir'])){
	$codigo = $_GET['excluir'];
	$consulta2= $conexao->query("delete from tb_contas where con_codigo = $codigo");
	header("location: estatisticas.php");
}
if  (isset($_GET['pagar'])){
	$codigo = $_GET['pagar'];
	$consulta3= $conexao->query("UPDATE  tb_contas SET con_pago='1' where con_codigo = $codigo");
	header("location: estatisticas.php");
		echo "CONTA PAGA!";

}

?>
<?php include("ca.php");?>

<html>

<meta charset="utf-8">


	<div class="container-fluid">

	
<div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h5 class="m-0 font-weight-bold text-primary"> Despesas não pagas</h5>
							<p> Abaixo estão as contas/despesas que ainda não foram pagas. Os três ícones abaixo são respectivamente, "Registrar pagamento", "Editar pagamento" e "Cancelar pagamento".</p>

                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
								<div class="row">
								</div></div><div class="col-sm-12 col-md-6"><div id="dataTable_filter" class="dataTables_filter">
								</div></div></div>
								<div class="row"><div class="col-sm-12"><table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0" role="grid" aria-describedby="dataTable_info" style="width: 100%;">
                                    <thead>
                                        <tr role="row"><th class="gggg" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 54.8889px;">Descrição </th>
										<th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 62.8889px;">Data do pagamento</th>
										<th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" style="width: 29.8889px;">Valor do pagamento</th>
										<th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Start date: activate to sort column ascending" style="width: 63.8889px;">Opções</th>
                                    </thead>
			<?php while($resultado = $consulta1 ->fetch_assoc()) { ?>

                                    <tbody>
                                        
                                    <tr role="row" class="odd">
                                        <td><?php echo $resultado['con_descricao']; ?></td> 
										<td><?php echo $resultado['data1']; ?></td> 
										<td>R$ <?php echo $resultado['con_valor']; ?></td>
										<td><a href="?pagar=<?php echo $resultado['con_codigo']; ?>"><i class="far fa-file-alt mr-1"></i></a> | <a href="editarconta.php?codigo=<?php echo $resultado['con_codigo']; ?>"><i class="fas fa-edit"></i></a>
										 | <a href="?excluir=<?php echo $resultado['con_codigo']; ?>"><i class="fas fa-trash"></i></a>
										</td>	
	
	
                                    </tr>
                                        
                                          </tbody>
			<?php } ?>
					  
                                </table></div></div><div class="row"><div class="col-sm-12 col-md-5">
                            </div>
			                            </div>
                            </div>
                            </div>
																																					
                            </div>

</html>
<?php include("ro.php");?>
