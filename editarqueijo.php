<?php
include ("config.php");
if(!isset($_SESSION['codigousuario'])) 
header("location: login.php");

$codigo = $_GET['codigo'];

if(isset($_POST['novoqueijo'])) 
{
	extract($_POST);
		$consulta = $conexao->query("UPDATE tb_metas set met_meta = '$meta', 
		met_datalimite = '$data' where met_codigo = $codigo");

	$consulta = $conexao->query("UPDATE tb_queijosproduzidos set
	que_produto='$novoqueijo', que_dataproducao='$data1', 
	que_quantidade='$quantidade', que_datafabricacao='$data2', 
	que_valorvenda='$valordavenda' where que_codigo = $codigo");
	header("Location: estoque.php");
	echo " QUEIJO EDITADO!";
	
}
$consulta2 = $conexao->query("select *,date_format(que_dataproducao,'%d/%m/%y') as data1
,date_format(que_datafabricacao,'%d/%m/%y') as data2 from tb_queijosproduzidos 
where que_codigo = $codigo");
$resultado = $consulta2->fetch_assoc();


?>
<?php include("ca.php");?>

<html>
<head>
	
	</head>
	
<meta charset="utf-8">
	

<div class="container-fluid">

<div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h5 class="m-0 font-weight-bold text-primary"> Editar produto</h5>
							<p>	Edite um ou mais campos abaixo.</p>

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
                                        <tr role="row"><th class="gggg" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 54.8889px;">Produto</th>
										<th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 62.8889px;"> Quantidade</th>
										<th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" style="width: 29.8889px;">Data de fabricação</th>
										<th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Start date: activate to sort column ascending" style="width: 63.8889px;">Valor unitário</th>
										<th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Start date: activate to sort column ascending" style="width: 63.8889px;">Opções</th>

									</thead>

                                    <tbody>
                                        
                                    <tr role="row" class="odd">
                                        <td><input type="text" name="novoqueijo" value="<?php echo $resultado['que_produto'] ?>"></td> 
										<td><input type="float" name="quantidade" value="<?php echo $resultado['que_quantidade'] ?>"></td> 
										<td><input type="date" name="data2" value="<?php echo $resultado['que_datafabricacao'] ?>"></td>
										<td><input type="float" name="valordavenda" value="<?php echo $resultado['que_valorvenda'] ?>"></td>	
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
