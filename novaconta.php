
<?php
include ("config.php");
if(!isset($_SESSION['codigousuario'])) 
header("location: login.php");


if(isset($_POST['novaconta'])) 
{
	extract($_POST);
	$consulta = $conexao->query("INSERT into tb_contas 
	(con_valor, con_datapagamento, con_descricao,con_usu_codigo) 
	values ('$novaconta','$data1','$novadescricao', 1)");
	header("Location: estatisticas.php");
	echo " NOVA CONTA ADICIONADA!";
	
}


?>
<?php include("ca.php");?>

<html>

<meta charset="utf-8">
	
<div class="container-fluid">


<div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h5 class="m-0 font-weight-bold text-primary"> Nova Despesa</h5>
							<p>	Adicione uma nova conta/despesa de seu negócio ao sistema.</p>

                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
								<div class="row">
								</div></div><div class="col-sm-12 col-md-6"><div id="dataTable_filter" class="dataTables_filter">
								</div></div></div>
								<div class="row"><div class="col-sm-12"><table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0" role="grid" aria-describedby="dataTable_info" style="width: 100%;">
                                 <form action="?" method="POST">

								 <thead>
                                        <tr role="row"><th class="gggg" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 54.8889px;">Descrição  </th>
										<th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 62.8889px;"> Data do pagamento</th>
										<th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" style="width: 29.8889px;">Valor do pagamento</th>
                                   		<th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" style="width: 29.8889px;">Opções</th>

								   </thead>

                                    <tbody>
                                        
                                    <tr role="row" class="odd">
										<td><input type="text"  placeholder="Descrição da despesa" name="novadescricao" required></td>									
										<td><input type="date" name="data1" required></td> 
                                        <td><input  type="number" placeholder="R$ 00.00" name="novaconta" required step="0.1"></td> 
										
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
