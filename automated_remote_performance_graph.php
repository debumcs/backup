<?php // content="text/plain; charset=utf-8"

require_once ('mis_graphs/jpgraph/jpgraph.php');
require_once ('mis_graphs/jpgraph/jpgraph_bar.php');
require_once ('mis_graphs/jpgraph/jpgraph_line.php');

if(!$gWidth){$gWidth = '1200';}
if(!$gHight){$gHight = '500';}
if(!$fileName){$fileName = 'remote_performance_graph_'.date("YmdHis").'.jpeg';}

$dataBarx	=	$arr_mtd_date;
$dataBarY1	=	$arr_total_remotes_offered;
$dataLineY2	=	$arr_remote_abandon_per;

// Create the graph. These two calls are always required
$graph = new Graph($gWidth,$gHight,'auto');
$graph->SetScale("textlin");
$graph->SetY2Scale("lin",0,100);
$graph->SetY2OrderBack(false);
$graph->img->SetMargin(35,35,10,60);

//$graph->title("Remote Offered Vs Remote Abandon");
$graph->title->SetFont(FF_ARIAL, FS_NORMAL, 14);
$graph->title->Set("Remote Offered Vs Remote Abandon");
$graph->title->SetMargin(10);

$graph->SetBox(false);

$graph->ygrid->SetFill(false);
$graph->yaxis->HideLine(false);
$graph->yaxis->HideTicks(false,false);
$graph->xaxis->SetFont(FF_ARIAL,FS_NORMAL,7);
$graph->xaxis->SetColor('black');
$graph->xaxis->SetTickLabels($dataBarx);
$graph->xaxis->SetLabelAngle(0);

// Create the bar plots
$b2plot = new BarPlot($dataBarY1);
$lplot = new LinePlot($dataLineY2);

$graph->Add($b2plot);
$graph->AddY2($lplot);


$b2plot->SetColor("#4a81b9");
$b2plot->SetFillColor("#4a81b9");
$b2plot->SetLegend('Total Remote Offered');
$b2plot->value->Show();
$b2plot->value->SetFormat("%d");


$lplot->SetBarCenter();
$lplot->SetColor("#962c1b");
$lplot->SetLegend('Remote Abandon %');
$lplot->SetWeight(3);
$lplot->mark->SetType(MARK_FILLEDCIRCLE,'',1.0);
$lplot->mark->SetWeight(2);
$lplot->mark->SetWidth(3);
$lplot->mark->setColor("#FFFFFF");
$lplot->mark->setFillColor("#FFFFFF");
$lplot->value->Show();
$lplot->value->SetFormat("%.2f%%");
$lplot->value->SetMargin(15);
$lplot->value->setColor("#000");
$lplot->value->SetFont(FF_FONT1,FS_BOLD,7);


//$graph->legend->SetFrameWeight(1);
$graph->legend->SetColumns(14);
$graph->legend->SetColor('#4E4E4E','#00A78A');
$graph->legend->SetPos(0.40,0.97,'bottom','bottom');

// Display the graph
$graph->Stroke();

?>