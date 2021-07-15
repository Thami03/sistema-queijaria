<?php
include ("config.php");
if(!isset($_SESSION['codigousuario'])) 
header("location: login.php");

$codigo = $_GET['codigo'];

if(isset($_POST['novavenda'])) 
{
	extract($_POST);
	
	$consulta4 = $conexao->query("select * from tb_vendas where ven_codigo = $codigo");
	$resultado4 = $consulta4->fetch_assoc();
	$quantidade_antiga = $resultado4['ven_quantidade'];
	$produto = $resultado4['ven_que_codigo'];
	if($quantidade < $quantidade_antiga) {
		$diferenca = $quantidade_antiga - $quantidade;
		$consulta5 = $conexao->query("UPDATE tb_queijosproduzidos
			set que_quantidade = que_quantidade + $diferenca where que_codigo = $produto");
	}
	if($quantidade > $quantidade_antiga) {
		$diferenca = $quantidade - $quantidade_antiga;
		$consulta5 = $conexao->query("UPDATE tb_queijosproduzidos
			set que_quantidade = que_quantidade - $diferenca where que_codigo = $produto");
	}
	
	$consulta = $conexao->query("UPDATE tb_vendas set
	ven_cliente='$novavenda', ven_valorvenda='$valordavenda', 
	ven_datavenda='$data1', ven_quantidade='$quantidade'
	 where ven_codigo = $codigo");
	header("Location: vendas.php");
	echo " VENDA EDITADA!";
	
}
$consulta2 = $conexao->query("select *,date_format(ven_datavenda,'%d/%m/%y') as data1
 from tb_vendas 
where ven_codigo = $codigo");
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
                            <h5 class="m-0 font-weight-bold text-primary"> Editar Venda</h5>
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
                                        <tr role="row"><th class="gggg" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 54.8889px;">Cliente</th>
										<th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 62.8889px;"> Valor da venda</th>
										<th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" style="width: 29.8889px;">Data da venda</th>
										<th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Start date: activate to sort column ascending" style="width: 63.8889px;">Quantidade</th>
										<th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Start date: activate to sort column ascending" style="width: 63.8889px;">Opções</th>

									</thead>

                                    <tbody>
                                        
                                    <tr role="row" class="odd">
                                        <td><input type="text" name="novavenda" value="<?php echo $resultado['ven_cliente'] ?>"></td> 
										<td><input type="number" name="valordavenda" value="<?php echo $resultado['ven_valorvenda'] ?>"></td> 
										<td><input type="date" name="data1" value="<?php echo $resultado['ven_datavenda'] ?>"></td>
										<td><input type="text" name="quantidade" value="<?php echo $resultado['ven_quantidade'] ?>"></td>	
										<td><button input type="submit"class="btn btn-success btn-circle"> <i class="fas fa-check"></i>
										</a> </button></td>	

	
	
                                    </tr>
                                        
                                          </tbody>
					</form>

                                </table></div></div><div class="row"><div class="col-sm-12 col-md-5">
                            </div>

</div>
</html>
<?php include("ro.php");?>
