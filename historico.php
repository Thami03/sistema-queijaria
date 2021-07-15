
<?php
include ("config.php");
if(!isset($_SESSION['codigousuario'])) 
header("location: login.php");

$consulta = $conexao-> query ("select *,date_format(con_datapagamento,'%d/%m/%Y') as con_datapagamento
from tb_contas where con_usu_codigo=".$_SESSION['codigousuario']);
$consulta1 = $conexao-> query ("select * from tb_contas where con_pago = 1;");
$resultado1 = $consulta->fetch_assoc();

?>
<?php include("ca.php");?>

    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

<div class="container-fluid">

		<div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h5 class="m-0 font-weight-bold text-primary"> Despesas Pagas</h5>
							<p>Relatório de contas/despesas já pagas.</p>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
								<div class="row">
								</div></div><div class="col-sm-12 col-md-6"><div id="dataTable_filter" class="dataTables_filter">
								</div></div></div>
								<div class="row"><div class="col-sm-12">
								<div class="table-responsive">
								<table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0" role="grid" aria-describedby="dataTable_info" style="width: 100%;">
                                    <thead>
                                        <tr role="row"><th class="gggg" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 54.8889px;"> Descrição</th>
										<th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 62.8889px;">Valor do pagamento</th>
										<th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" style="width: 29.8889px;">Data do pagamento</th>
                                    </thead>

   <tbody>
			<?php while($resultado = $consulta1 ->fetch_assoc()) { ?>
                                 

			<tr role="row" class="odd">

				<td><?php echo $resultado['con_descricao']; ?></td> 
				<td><?php echo $resultado['con_valor']; ?></td> 
				<td><?php echo $resultado1['con_datapagamento']; ?></td> 
			</tr>
			
								
		
			<?php } ?>	</tbody>
			                          </table></div></div></div><div class="row"><div class="col-sm-12 col-md-5">

		</div>
		</div>
		</div>
		</div>
		</div>
		</div>
		</div>

</html>
<?php include("ro.php");?>
    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>
