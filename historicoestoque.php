
<?php
include ("config.php");
if(!isset($_SESSION['codigousuario'])) 
header("location: login.php");

//$consulta1 = $conexao-> query ("select *
//from tb_queijosproduzidos where que_usu_codigo=".$_SESSION['codigousuario']);
//$resultado1 = $consulta1->fetch_assoc();

$consulta = $conexao-> query ("select *,date_format(que_datafabricacao,'%d/%m/%Y') as data1,
year(que_datafabricacao) as anofabricacao from tb_queijosproduzidos where que_quantidade <=0");

?>
<?php include("ca.php");?>
 <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

	
<div class="container-fluid">

<div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h5 class="m-0 font-weight-bold text-primary"> Histórico do estoque</h5>
							<p>	Veja aqui a listagem de produtos que já foram vendidos e estão com o estoque zero.</p>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
								<div class="row">
								</div></div><div class="col-sm-12 col-md-6"><div id="dataTable_filter" class="dataTables_filter">
								</div></div></div>
								<div class="row"><div class="col-sm-12"><table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0" role="grid" aria-describedby="dataTable_info" style="width: 100%;">
                                    <thead>
                                        <tr role="row"><th class="gggg" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 54.8889px;">Lote</th>
										<th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 62.8889px;">Produtos Produzidos</th>
										<th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 62.8889px;">Valor unitário</th>
										<th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 62.8889px;">Data de fabricaçãao</th>
										<th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" style="width: 29.8889px;">Quantidade</th>
                                    </thead>
									<tbody>
			<?php while($resultado = $consulta ->fetch_assoc()) { ?>

                                    
                                        
                                    <tr role="row" class="odd">
										<td><?php echo $resultado['que_codigo']; ?>/<?php echo $resultado['anofabricacao']; ?></td> 
                                        <td><?php echo $resultado['que_produto']; ?></td> 
										<td><?php echo $resultado['que_valorvenda']; ?></td>
										<td><?php echo $resultado['data1']; ?></td> 
										<td><?php echo $resultado['que_quantidade']; ?></td>
										
	
                                    </tr>
                                        
                                          
			<?php } ?>
					  </tbody>
                                </table></div></div><div class="row"><div class="col-sm-12 col-md-5">
                            </div>
 </div>
 </div>
 </div>
 </div>


	
<?php include("ro.php");?>
    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>
