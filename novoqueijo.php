
<?php
include ("config.php");
if(!isset($_SESSION['codigousuario'])) 
header("location: login.php");


if(isset($_POST['novoqueijo'])) 
{
	extract($_POST);
	$consulta = $conexao->query("INSERT into tb_queijosproduzidos 
	(que_produto, que_datafabricacao,que_valorvenda,que_quantidade, que_usu_codigo) 
	values ('$novoqueijo','$datadafabricacao','$valordavenda','$quantidade', 1)");
	header("Location: estoque.php");
	echo " NOVO QUEIJO ADICIONADO!";
	
}


?>
<?php include("ca.php");?>

<html>

<meta charset="utf-8">


<div class="container-fluid">

<div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h5 class="m-0 font-weight-bold text-primary"> Novo produto</h5>
						<p>	Adicione um novo produto ao estoque.</p>

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
                                        <tr role="row"><th class="gggg" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 54.8889px;">Produto   </th>
										<th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 62.8889px;"> Data de fabricação</th>
										<th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" style="width: 29.8889px;">Valor unitário</th>
										<th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" style="width: 29.8889px;">Disponível</th>                                  
										<th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" style="width: 29.8889px;">Opções</th>

								   </thead>

                                    <tbody>
                                        
                                    <tr role="row" class="odd">
                                        <td><input type="text" placeholder=" Nome do produto" name="novoqueijo" required></td> 
										<td><input type="date" name="datadafabricacao" required></td> 
										<td><input type="number" placeholder="R$ 00.00" name="valordavenda" step="0.1" required></td>
										<td><input type="text" placeholder=" Quantidade fabricada" name="quantidade" required></td>

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
