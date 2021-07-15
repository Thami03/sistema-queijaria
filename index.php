
<?php
include ("config.php");
if(!isset($_SESSION['codigousuario'])) 
header("location: login.php");

$consulta = $conexao->query("select sum(ven_valorvenda) as hoje from tb_vendas where year(ven_datavenda) = year (now()) 
and month(ven_datavenda)= month(now()) and day(ven_datavenda)= day(now())");
$resultado2 = $consulta->fetch_assoc();

$consulta2 = $conexao->query("SELECT sum(ven_valorvenda) as setedias from tb_vendas where ven_datavenda
BETWEEN DATE_ADD(now(), INTERVAL -7 DAY) AND DATE_ADD(now(), INTERVAL +1 DAY)");
$resultado3 = $consulta2->fetch_assoc();


?>
<?php include("ca.php");?>

<div class="container-fluid">

<div class="row">

						<div class="col-xl-4 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                              Faturamento de Hoje</div> <br>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">R$ <?php echo $resultado2['hoje'] ?></div>
                                        </div> 
                                        <div class="col-auto">
                                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div> - Valor total de vendas realizadas.
                            </div>
                        </div>
						<div class="col-xl-4 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                               Faturamento dos últimos 7 dias</div> <br>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">R$ <?php echo $resultado3['setedias'] ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div> - Valor total de vendas realizadas.
                            </div>
                        </div>


<br>

						<div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Sobre o site</h6>
                                </div>
                                <div class="card-body">
                                    <p>Esse sistema foi desenvolvido com o objetivo de<br> 
									ajudar pequenas queijarias, auxiliando em <br>
									diversas coisas, como estoque e finanças.</p>
                                </div>
                            </div>


	
</div>
              
                                <!-- grafico vendas -->
						
						<div class="row">

                        <!-- Area Chart -->
                        <div class="col-xl-8 col-lg-7">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Relatório de Vendas</h6>
                                    <div class="dropdown no-arrow">
                                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink" style="">
                                            <div class="dropdown-header">Dropdown Header:</div>
                                            <a class="dropdown-item" href="#">Action</a>
                                            <a class="dropdown-item" href="#">Another action</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="#">Something else here</a>
                                        </div>
                                    </div>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <div class="chart-area"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
                                        <canvas id="myAreaChart" width="416" height="287" style="display: block; height: 320px; width: 463px;" class="chartjs-render-monitor"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- grafico queijo sobre o estoque-->
						
						
                        <div class="col-xl-4 col-lg-5">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Produtos do Estoque</h6>
                                   <div class="dropdown no-arrow">
                                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink" style="">
                                            <div class="dropdown-header">Dropdown Header:</div>
                                            <a class="dropdown-item" href="#">Action</a>
                                            <a class="dropdown-item" href="#">Another action</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="#">Something else here</a>
                                        </div>
                                    </div>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <div class="chart-pie pt-4 pb-2"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
                                        <canvas id="myPieChart" width="416" height="220" style="display: block; height: 245px; width: 463px;" class="chartjs-render-monitor"></canvas>
                                    </div>
                                    <div class="mt-4 text-center small">
                                        <span class="mr-2">
                                            <i class="fas fa-circle text-primary"></i> Produtos do Estoque
                                        </span>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
						
						
</div>

</html>
<?php include("ro.php");?>

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script>
	// Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#858796';

function number_format(number, decimals, dec_point, thousands_sep) {
  // *     example: number_format(1234.56, 2, ',', ' ');
  // *     return: '1 234,56'
  number = (number + '').replace(',', '').replace(' ', '');
  var n = !isFinite(+number) ? 0 : +number,
    prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
    sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
    dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
    s = '',
    toFixedFix = function(n, prec) {
      var k = Math.pow(10, prec);
      return '' + Math.round(n * k) / k;
    };
  // Fix for IE parseFloat(0.55).toFixed(0) = 0;
  s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
  if (s[0].length > 3) {
    s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
  }
  if ((s[1] || '').length < prec) {
    s[1] = s[1] || '';
    s[1] += new Array(prec - s[1].length + 1).join('0');
  }
  return s.join(dec);
}
<?php

$mes1 = 0;$mes2 = 0;$mes3 = 0;$mes4 = 0;$mes5 = 0;$mes6 = 0;
$mes7 = 0;$mes8 = 0;$mes9 = 0;$mes10 = 0;$mes11 = 0;$mes12 = 0;

$consulta4 = $conexao->query("select sum(ven_valorvenda) as total from tb_vendas where year(ven_datavenda) = year (now()) 
and month(ven_datavenda)= 1");
$resultado4 = $consulta4->fetch_assoc();
if($resultado4['total']>0) $mes1 = $resultado4['total'];


$consulta5 = $conexao->query("select sum(ven_valorvenda) as total from tb_vendas where year(ven_datavenda) = year (now()) 
and month(ven_datavenda)= 2");
$resultado5 = $consulta5->fetch_assoc();
if($resultado5['total']>0) $mes2 = $resultado5['total'];


$consulta6 = $conexao->query("select sum(ven_valorvenda) as total from tb_vendas where year(ven_datavenda) = year (now()) 
and month(ven_datavenda)= 3");
$resultado6 = $consulta6->fetch_assoc();
if($resultado6['total']>0) $mes3 = $resultado6['total'];

// corrigir a partir deste
$consulta4 = $conexao->query("select sum(ven_valorvenda) as total from tb_vendas where year(ven_datavenda) = year (now()) 
and month(ven_datavenda)= 4");
$resultado4 = $consulta4->fetch_assoc();
if($resultado4['total']>0) $mes4 = $resultado4['total'];


$consulta4 = $conexao->query("select sum(ven_valorvenda) as total from tb_vendas where year(ven_datavenda) = year (now()) 
and month(ven_datavenda)= 5");
$resultado4 = $consulta4->fetch_assoc();
if($resultado4['total']>0) $mes5 = $resultado4['total'];

$consulta4 = $conexao->query("select sum(ven_valorvenda) as total from tb_vendas where year(ven_datavenda) = year (now()) 
and month(ven_datavenda)= 6");
$resultado4 = $consulta4->fetch_assoc();
if($resultado4['total']>0) $mes6 = $resultado4['total'];



$consulta4 = $conexao->query("select sum(ven_valorvenda) as total from tb_vendas where year(ven_datavenda) = year (now()) 
and month(ven_datavenda)= 7");
$resultado4 = $consulta4->fetch_assoc();
if($resultado4['total']>0) $mes7 = $resultado4['total'];

$consulta4 = $conexao->query("select sum(ven_valorvenda) as total from tb_vendas where year(ven_datavenda) = year (now()) 
and month(ven_datavenda)= 8");
$resultado4 = $consulta4->fetch_assoc();
if($resultado4['total']>0) $mes8 = $resultado4['total'];


$consulta4 = $conexao->query("select sum(ven_valorvenda) as total from tb_vendas where year(ven_datavenda) = year (now()) 
and month(ven_datavenda)= 9");
$resultado4 = $consulta4->fetch_assoc();
if($resultado4['total']>0) $mes9 = $resultado4['total'];

$consulta4 = $conexao->query("select sum(ven_valorvenda) as total from tb_vendas where year(ven_datavenda) = year (now()) 
and month(ven_datavenda)= 10");
$resultado4 = $consulta4->fetch_assoc();
if($resultado4['total']>0) $mes10 = $resultado4['total'];

$consulta4 = $conexao->query("select sum(ven_valorvenda) as total from tb_vendas where year(ven_datavenda) = year (now()) 
and month(ven_datavenda)= 11");
$resultado4 = $consulta4->fetch_assoc();
if($resultado4['total']>0) $mes11 = $resultado4['total'];

$consulta4 = $conexao->query("select sum(ven_valorvenda) as total from tb_vendas where year(ven_datavenda) = year (now()) 
and month(ven_datavenda)= 12");
$resultado4 = $consulta4->fetch_assoc();
if($resultado4['total']>0) $mes12 = $resultado4['total'];

?>
// Area Chart Example
var ctx = document.getElementById("myAreaChart");
var myLineChart = new Chart(ctx, {
  type: 'line',
  data: {
    labels: ["Janeiro", "Fevereiro", "Março", "Abril", "Maio", "Junho", "Julho", "Agosto", "Setembro", "Outubro", "Novembro", "Dezembro"],
    datasets: [{
      label: "Faturamento",
      lineTension: 0.3,
      backgroundColor: "rgba(78, 115, 223, 0.05)",
      borderColor: "rgba(78, 115, 223, 1)",
      pointRadius: 3,
      pointBackgroundColor: "rgba(78, 115, 223, 1)",
      pointBorderColor: "rgba(78, 115, 223, 1)",
      pointHoverRadius: 3,
      pointHoverBackgroundColor: "rgba(78, 115, 223, 1)",
      pointHoverBorderColor: "rgba(78, 115, 223, 1)",
      pointHitRadius: 10,
      pointBorderWidth: 2,
      data: [<?php echo $mes1. "," .$mes2. "," .$mes3. "," .$mes4. "," .$mes5. "," .$mes6. "," .$mes7. "," .$mes8. "," .$mes9. "," .$mes10. "," .$mes11. "," .$mes12; ?>],
    }],
  },
  options: {
    maintainAspectRatio: false,
    layout: {
      padding: {
        left: 10,
        right: 25,
        top: 25,
        bottom: 0
      }
    },
    scales: {
      xAxes: [{
        time: {
          unit: 'date'
        },
        gridLines: {
          display: false,
          drawBorder: false
        },
        ticks: {
          maxTicksLimit: 7
        }
      }],
      yAxes: [{
        ticks: {
          maxTicksLimit: 5,
          padding: 10,
          // Include a dollar sign in the ticks
          callback: function(value, index, values) {
            return 'R$ ' + number_format(value);
          }
        },
        gridLines: {
          color: "rgb(234, 236, 244)",
          zeroLineColor: "rgb(234, 236, 244)",
          drawBorder: false,
          borderDash: [2],
          zeroLineBorderDash: [2]
        }
      }],
    },
    legend: {
      display: false
    },
    tooltips: {
      backgroundColor: "rgb(255,255,255)",
      bodyFontColor: "#858796",
      titleMarginBottom: 10,
      titleFontColor: '#6e707e',
      titleFontSize: 14,
      borderColor: '#dddfeb',
      borderWidth: 1,
      xPadding: 15,
      yPadding: 15,
      displayColors: false,
      intersect: false,
      mode: 'index',
      caretPadding: 10,
      callbacks: {
        label: function(tooltipItem, chart) {
          var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
          return datasetLabel + ': R$ ' + number_format(tooltipItem.yLabel);
        }
      }
    }
  }
});


// Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#858796';

<?php
$consulta8 = $conexao->query("select que_produto from tb_queijosproduzidos where que_quantidade>0");
$consulta9 = $conexao->query("select que_quantidade from tb_queijosproduzidos where que_quantidade>0");
?>

// Pie Chart Example
var ctx = document.getElementById("myPieChart");
var myPieChart = new Chart(ctx, {
  type: 'doughnut',
  data: {
    labels: [<?php
	$p = 0;
	while($resultado8 = $consulta8->fetch_assoc()){
		if($p==1) echo ",";
		echo "'".$resultado8['que_produto']."'";
		$p = 1;
	}
	?>],
    datasets: [{
      data: [<?php
	$p = 0;
	while($resultado9 = $consulta9->fetch_assoc()){
		if($p==1) echo ",";
		echo $resultado9['que_quantidade'];
		$p = 1;
	}
	?>],
      backgroundColor: ['#5a5c69', '#1cc88a', '#e74a3b', '#f6c23e', '#4e73df', '#00FFFF', '#F4A460','#836FFF'],
      hoverBackgroundColor: ['#5a5c69', '#1cc88a', '#e74a3b','#f6c23e', '#4e73df','#00FFFF', '#F4A460','#836FFF'],
      hoverBorderColor: "rgba(234, 236, 244, 1)",
    }],
  },
  options: {
    maintainAspectRatio: false,
    tooltips: {
      backgroundColor: "rgb(255,255,255)",
      bodyFontColor: "#858796",
      borderColor: '#dddfeb',
      borderWidth: 1,
      xPadding: 15,
      yPadding: 15,
      displayColors: true,
      caretPadding: 10,
    },
    legend: {
      display: true
    },
    cutoutPercentage: 80,
  },
});

	
	</script>
