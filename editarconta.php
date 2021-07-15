<?php
include ("config.php");
if(!isset($_SESSION['codigousuario'])) 
header("location: login.php");

$codigo = $_GET['codigo'];

if(isset($_POST['novaconta'])) 
{
	extract($_POST);
		$consulta = $conexao->query("UPDATE tb_metas set met_meta = '$meta', 
		met_datalimite = '$data' where met_codigo = $codigo");

	$consulta = $conexao->query("UPDATE tb_contas set 
	con_datapagamento='$data1', con_valor='$novaconta', con_descricao ='$novadescricao'
	 where con_codigo = $codigo");
	header("Location: estatisticas.php");
	echo " CONTA EDITADA!";
	
}
$consulta2 = $conexao->query("select *,date_format(con_datapagamento,'%d/%m/%y') as data1
 from tb_contas 
where con_codigo = $codigo");
$resultado2 = $consulta2->fetch_assoc();


?>
<?php include("ca.php");?>

<html>

	
<meta charset="utf-8">

<div class="container-fluid">



<div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h5 class="m-0 font-weight-bold text-primary"> Editar Despesa</h5>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
								<div class="row">
								</div></div><div class="col-sm-12 col-md-6"><div id="dataTable_filter" class="dataTables_filter">
								</div></div></div>
								<div class="row"><div class="col-sm-12"><table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0" role="grid" aria-describedby="dataTable_info" style="width: 100%;">
					<form action="?codigo=<?php echo $codigo; ?>" method="post">

								 <thead>
                                        <tr role="row"><th class="gggg" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 54.8889px;">Descrição do pagamento</th>
										<th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 62.8889px;"> Valor do pagamento</th>
										<th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" style="width: 29.8889px;">Data do pagamento</th>
										<th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Start date: activate to sort column ascending" style="width: 63.8889px;">Opções</th>

									</thead>

                                    <tbody>
                                        
                                    <tr role="row" class="odd">
                                        <td><input type="text" name="novadescricao" value="<?php echo $resultado2['con_descricao'] ?>"></td> 
										<td><input type="float" name="novaconta" value="<?php echo $resultado2['con_valor'] ?>"></td> 
										<td><input type="date" name="data1" value="<?php echo $resultado2['con_datapagamento'] ?>"></td>
										<td><button input type="submit"class="btn btn-success btn-circle"> <i class="fas fa-check"></i>
										</a> </button></td>	

	
                                    </tr>
                                        
                                          </tbody>
					</form>

                                </table></div></div><div class="row"><div class="col-sm-12 col-md-5">
                            </div>
                            </div>
                            </div>
                            </div>
                            </div>

</html>
<?php include("ro.php");?>
