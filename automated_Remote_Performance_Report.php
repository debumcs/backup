<?php
include_once '../ajaxlist/timezoneConverter.php';
require_once("../adminconfig_new.php");
include_once("../Smtp_mail.php");
/*
$todaydate = date('Y-m-d');
if(mysqli_connect_errno()){
    echo mysqli_connect_error();
}

$RosterMsg='';
$roster_status = checkRosterStatus_misReport();  // function in Smtp_mail.php
if($roster_status != false)
{$RosterMsg = "<span style='color:red; size:13;'>".$roster_status."</span><br><br>";}

$mail_from = '';
$subject = '';
$finalMessage = '';
$att = '';
$message = '';
$fileName = '';

$numberOfDays = 6;

for ($i=0; $i<$numberOfDays; $i++){
    $forPrev = $i+1;    
	$MTDDate  = date('Y-m-d',strtotime($todaydate . " -$forPrev day"));
	callRemotePerformanceReport($MTDDate);    
}

function callRemotePerformanceReport($MTDDate){
    global $coni, $servername,$dbusername,$dbpassword,$dbname;

    $coni->close(); 
    $coni = new MySQLI($servername,$dbusername,$dbpassword,$dbname);
    $resultSelect = $coni->query("Call Reportdb.get_remote_performance_report('".$MTDDate."')");
    if($resultSelect){        
        $coni->next_result();
    }
    else die($coni->error);
}

    $mail_to = '';
    $mail_from = '';
    $subject = '';
    $preQuery = "Select * from `qresolve`.`reportschdl` where id=100";
    $preResult = $coni->query($preQuery);
    $preRow = $preResult->fetch_array();

    $report_name    = $preRow['report_name'];
    $mail_to        = $preRow['mail_to'];
    $mail_from      = trim($preRow['mail_from']);
    $mail_cc        = $preRow['mail_cc'];

    $reportDate = date('Y-m-d', strtotime(' -1 day'));
	$fromDate = date('Y-m-01', strtotime($reportDate));
	$toDate   = $reportDate;
	
    $subject    = 'Automated : '.$report_name.' '.date('d-M, Y', strtotime($toDate));
    $to         = $mail_to;
    $from       = $mail_from;
    */
	
    $reportDate = date('Y-m-d', strtotime(' -1 day'));
	$fromDate = '2017-10-20';
	$toDate   = '2017-10-26';
	
    $html = '';
    
	$arr_mtd_date = array();
	$arr_total_remotes_offered = array();
	$arr_remote_abandon_per = array();
	
	$queryMonth = "SELECT '".$fromDate."' as m_mtd_date, SUM(agent_available) AS m_agent_available, SUM(present_agents) AS m_present_agents, SUM(remote_transfered) AS m_remote_transfered, 
SUM(calling_cards) AS m_calling_cards, SUM(total_remotes_offered) AS m_total_remotes_offered, SUM(remote_answered_incl_c_card) AS m_remote_answered_incl_c_card, 
ROUND(SUM(remote_answered_incl_c_card)/SUM(present_agents),2) AS m_remote_per_fte, SUM(remote_abandon) AS m_remote_abandon, 
SUM(unique_customer_remote_abandon) AS m_unique_customer_remote_abandon, SUM(calling_card_remote_abandon) AS m_calling_card_remote_abandon, 
SUM(bau_remote_abandon) AS m_bau_remote_abandon, ROUND(SUM(remote_abandon)*100/SUM(total_remotes_offered),2) AS m_remote_abandon_per, 
SEC_TO_TIME(ROUND(SUM(TIME_TO_SEC(average_wait_time))/(DATEDIFF('".$toDate."','".$fromDate."')+1),0)) AS m_average_wait_time 
FROM Reportdb.remote_performance_report WHERE mtd_date BETWEEN '".$fromDate."' AND '".$toDate."' order by mtd_date asc";
	
    $resultMonth = $coni->query($queryMonth)or die($coni->error);
    
	$rowMonth = $resultMonth->fetch_array();
	
	$html.= "<table cellSpacing='0' cellPadding='0' border='0'><thead>
	<tr >
	<th style='border: #a6a6a6 0.25pt double; padding: 0in 5.4pt 0in 5.4pt; font-size:10pt;color:#002060; background: #fabf8f; height: 27pt; width:30pt;'>Date</th>
	<th style='background:#d9d9d9; border: #a6a6a6 0.25pt double; padding: 0in 5.4pt 0in 5.4pt; height: 13.5pt; font-size:10pt;color:#002060;'>Agents Available in System</th>
	<th style='background:#d9d9d9; border: #a6a6a6 0.25pt double; padding: 0in 5.4pt 0in 5.4pt; height: 13.5pt; font-size:10pt;color:#002060;'>Present Agents</th>
	<th style='background:#c4bd97; border: #a6a6a6 0.25pt double; padding: 0in 5.4pt 0in 5.4pt; height: 13.5pt; font-size:10pt;color:#002060;'>Tier - 3 Remotes Transferred</th>
	<th style='background:#c4bd97; border: #a6a6a6 0.25pt double; padding: 0in 5.4pt 0in 5.4pt; height: 13.5pt; font-size:10pt;color:#002060;'>Calling Cards</th>
	<th style='background:#c4bd97; border: #a6a6a6 0.25pt double; padding: 0in 5.4pt 0in 5.4pt; height: 13.5pt; font-size:10pt;color:#002060;'>Total Remotes Offered</th>
	<th style='background:#95b3d7; border: #a6a6a6 0.25pt double; padding: 0in 5.4pt 0in 5.4pt; height: 13.5pt; font-size:10pt;color:#002060;'>Remote Answered including C card</th>
	<th style='background:#95b3d7; border: #a6a6a6 0.25pt double; padding: 0in 5.4pt 0in 5.4pt; height: 13.5pt; font-size:10pt;color:#002060;'>Remote Per FTE</th>
	<th style='background:#c4d79b; border: #a6a6a6 0.25pt double; padding: 0in 5.4pt 0in 5.4pt; height: 13.5pt; font-size:10pt;color:#002060;'>Remote Abandon</th>
	<th style='background:#c4d79b; border: #a6a6a6 0.25pt double; padding: 0in 5.4pt 0in 5.4pt; height: 13.5pt; font-size:10pt;color:#002060;'>Unique customer Remote Abandon</th>
	<th style='background:#c4d79b; border: #a6a6a6 0.25pt double; padding: 0in 5.4pt 0in 5.4pt; height: 13.5pt; font-size:10pt;color:#002060;'>Calling Card Remote Abandon</th>
	<th style='background:#c4d79b; border: #a6a6a6 0.25pt double; padding: 0in 5.4pt 0in 5.4pt; height: 13.5pt; font-size:10pt;color:#002060;'>BAU Remote Abandon</th>
	<th style='background:#c4d79b; border: #a6a6a6 0.25pt double; padding: 0in 5.4pt 0in 5.4pt; height: 13.5pt; font-size:10pt;color:#002060;'>Remote Abandon %</th>
	<th style='background:#ccc0da; border: #a6a6a6 0.25pt double; padding: 0in 5.4pt 0in 5.4pt; height: 13.5pt; font-size:10pt;color:#002060;'>Average wait Time in Queue</th>
	</tr>
	</thead><tbody>";
	$html .="<tr><td style='background:#fde9d9; border: #a6a6a6 0.25pt double; padding: 2.4pt 5.4pt 2.4pt 5.4pt; font-size:10pt;color:#002060;text-align:center;'>".date('M,y',strtotime($rowMonth['m_mtd_date']))."</td>";
	$html .="<td style='background:#f2f2f2; border: #a6a6a6 0.25pt double; padding: 2.4pt 5.4pt 2.4pt 5.4pt; font-size:10pt;color:#002060;text-align:center;'>".$rowMonth['m_agent_available']."</td>";
	$html .="<td style='background:#f2f2f2; border: #a6a6a6 0.25pt double; padding: 2.4pt 5.4pt 2.4pt 5.4pt; font-size:10pt;color:#002060;text-align:center;'>".$rowMonth['m_present_agents']."</td>";
	$html .="<td style='background:#ddd9c4; border: #a6a6a6 0.25pt double; padding: 2.4pt 5.4pt 2.4pt 5.4pt; font-size:10pt;color:#002060;text-align:center;'>".$rowMonth['m_remote_transfered']."</td>";
	$html .="<td style='background:#ddd9c4; border: #a6a6a6 0.25pt double; padding: 2.4pt 5.4pt 2.4pt 5.4pt; font-size:10pt;color:#002060;text-align:center;'>".$rowMonth['m_calling_cards']."</td>";
	$html .="<td style='background:#ddd9c4; border: #a6a6a6 0.25pt double; padding: 2.4pt 5.4pt 2.4pt 5.4pt; font-size:10pt;color:#002060;text-align:center;'>".$rowMonth['m_total_remotes_offered']."</td>";
	$html .="<td style='background:#dce6f1; border: #a6a6a6 0.25pt double; padding: 2.4pt 5.4pt 2.4pt 5.4pt; font-size:10pt;color:#002060;text-align:center;'>".$rowMonth['m_remote_answered_incl_c_card']."</td>";
	$html .="<td style='background:#dce6f1; border: #a6a6a6 0.25pt double; padding: 2.4pt 5.4pt 2.4pt 5.4pt; font-size:10pt;color:#002060;text-align:center;'>".$rowMonth['m_remote_per_fte']."</td>";
	$html .="<td style='background:#ebf1de; border: #a6a6a6 0.25pt double; padding: 2.4pt 5.4pt 2.4pt 5.4pt; font-size:10pt;color:#002060;text-align:center;'>".$rowMonth['m_remote_abandon']."</td>";
	$html .="<td style='background:#ebf1de; border: #a6a6a6 0.25pt double; padding: 2.4pt 5.4pt 2.4pt 5.4pt; font-size:10pt;color:#002060;text-align:center;'>".$rowMonth['m_unique_customer_remote_abandon']."</td>";
	$html .="<td style='background:#ebf1de; border: #a6a6a6 0.25pt double; padding: 2.4pt 5.4pt 2.4pt 5.4pt; font-size:10pt;color:#002060;text-align:center;'>".$rowMonth['m_calling_card_remote_abandon']."</td>";
	$html .="<td style='background:#ebf1de; border: #a6a6a6 0.25pt double; padding: 2.4pt 5.4pt 2.4pt 5.4pt; font-size:10pt;color:#002060;text-align:center;'>".$rowMonth['m_bau_remote_abandon']."</td>";
	$html .="<td style='background:#ebf1de; border: #a6a6a6 0.25pt double; padding: 2.4pt 5.4pt 2.4pt 5.4pt; font-size:10pt;color:#002060;text-align:center;'>".$rowMonth['m_remote_abandon_per']."</td>";
	$html .="<td style='background:#e4dfec; border: #a6a6a6 0.25pt double; padding: 2.4pt 5.4pt 2.4pt 5.4pt; font-size:10pt;color:#002060;text-align:center;'>".$rowMonth['m_average_wait_time']."</td></tr>";
	$html.= "</tbody></table><br><br>";
	
	
    $queryData = "SELECT mtd_date, agent_available, present_agents, remote_transfered, calling_cards, total_remotes_offered, remote_answered_incl_c_card, remote_per_fte, remote_abandon, unique_customer_remote_abandon, calling_card_remote_abandon, bau_remote_abandon, remote_abandon_per, average_wait_time FROM Reportdb.remote_performance_report WHERE mtd_date BETWEEN '".$fromDate."' AND '".$toDate."' order by mtd_date asc";
    $mainResult = $coni->query($queryData)or die($coni->error);
    $dataNumber = $mainResult->num_rows;
	
	$html.= "<table cellSpacing='0' cellPadding='0' border='0'><thead>
	<tr >
	<th rowspan='2' style='border: #a6a6a6 0.25pt double; padding: 0in 5.4pt 0in 5.4pt; font-size:10pt;color:#002060; background: #fabf8f; height: 27pt; width:30pt;'>Date</th>
	
	<th colspan='2' style='border: #a6a6a6 0.25pt double; padding: 0in 5.4pt 0in 5.4pt; background: gray; height: 27pt; font-size:10pt;color:white;'>Agent Availability/Present</th>
	<th colspan='3' style='border: #a6a6a6 0.25pt double; padding: 0in 5.4pt 0in 5.4pt; background: #948a54; height: 27pt; font-size:10pt;color:white;'>Remotes Offered</th>
	<th colspan='2' style='border: #a6a6a6 0.25pt double; padding: 0in 5.4pt 0in 5.4pt; background: #538dd5; height: 27pt; font-size:10pt;color:white;'>Remote Answered including C card</th>
	<th colspan='5' style='border: #a6a6a6 0.25pt double; padding: 0in 5.4pt 0in 5.4pt; background: #76933c; height: 27pt; font-size:10pt;color:white;' >Remote Abandon</th>
	<th style='border: #a6a6a6 0.25pt double; padding: 0in 5.4pt 0in 5.4pt; background: #60497a; height: 27pt; font-size:10pt;color:white;'>Avg. Wait Time</th>
	</tr>
	<tr>
	<th style='background:#d9d9d9; border: #a6a6a6 0.25pt double; padding: 0in 5.4pt 0in 5.4pt; height: 13.5pt; font-size:10pt;color:#002060;'>Agents Available in System</th>
	<th style='background:#d9d9d9; border: #a6a6a6 0.25pt double; padding: 0in 5.4pt 0in 5.4pt; height: 13.5pt; font-size:10pt;color:#002060;'>Present Agents</th>
	<th style='background:#c4bd97; border: #a6a6a6 0.25pt double; padding: 0in 5.4pt 0in 5.4pt; height: 13.5pt; font-size:10pt;color:#002060;'>Tier - 3 Remotes Transferred</th>
	<th style='background:#c4bd97; border: #a6a6a6 0.25pt double; padding: 0in 5.4pt 0in 5.4pt; height: 13.5pt; font-size:10pt;color:#002060;'>Calling Cards</th>
	<th style='background:#c4bd97; border: #a6a6a6 0.25pt double; padding: 0in 5.4pt 0in 5.4pt; height: 13.5pt; font-size:10pt;color:#002060;'>Total Remotes Offered</th>
	<th style='background:#95b3d7; border: #a6a6a6 0.25pt double; padding: 0in 5.4pt 0in 5.4pt; height: 13.5pt; font-size:10pt;color:#002060;'>Remote Answered including C card</th>
	<th style='background:#95b3d7; border: #a6a6a6 0.25pt double; padding: 0in 5.4pt 0in 5.4pt; height: 13.5pt; font-size:10pt;color:#002060;'>Remote Per FTE</th>
	<th style='background:#c4d79b; border: #a6a6a6 0.25pt double; padding: 0in 5.4pt 0in 5.4pt; height: 13.5pt; font-size:10pt;color:#002060;'>Remote Abandon</th>
	<th style='background:#c4d79b; border: #a6a6a6 0.25pt double; padding: 0in 5.4pt 0in 5.4pt; height: 13.5pt; font-size:10pt;color:#002060;'>Unique customer Remote Abandon</th>
	<th style='background:#c4d79b; border: #a6a6a6 0.25pt double; padding: 0in 5.4pt 0in 5.4pt; height: 13.5pt; font-size:10pt;color:#002060;'>Calling Card Remote Abandon</th>
	<th style='background:#c4d79b; border: #a6a6a6 0.25pt double; padding: 0in 5.4pt 0in 5.4pt; height: 13.5pt; font-size:10pt;color:#002060;'>BAU Remote Abandon</th>
	<th style='background:#c4d79b; border: #a6a6a6 0.25pt double; padding: 0in 5.4pt 0in 5.4pt; height: 13.5pt; font-size:10pt;color:#002060;'>Remote Abandon %</th>
	<th style='background:#ccc0da; border: #a6a6a6 0.25pt double; padding: 0in 5.4pt 0in 5.4pt; height: 13.5pt; font-size:10pt;color:#002060;'>Average wait Time in Queue</th>
	</tr>
	</thead><tbody>";
	
    if($dataNumber > 0){
        while($row = $mainResult->fetch_array()){
			$html .="<tr><td style='background:#fde9d9; border: #a6a6a6 0.25pt double; padding: 2.4pt 5.4pt 2.4pt 5.4pt; font-size:10pt;color:#002060;text-align:center;'>".date('d-M',strtotime($row['mtd_date']))."</td>";
			$html .="<td style='background:#f2f2f2; border: #a6a6a6 0.25pt double; padding: 2.4pt 5.4pt 2.4pt 5.4pt; font-size:10pt;color:#002060;text-align:center;'>".$row['agent_available']."</td>";
			$html .="<td style='background:#f2f2f2; border: #a6a6a6 0.25pt double; padding: 2.4pt 5.4pt 2.4pt 5.4pt; font-size:10pt;color:#002060;text-align:center;'>".$row['present_agents']."</td>";
			$html .="<td style='background:#ddd9c4; border: #a6a6a6 0.25pt double; padding: 2.4pt 5.4pt 2.4pt 5.4pt; font-size:10pt;color:#002060;text-align:center;'>".$row['remote_transfered']."</td>";
			$html .="<td style='background:#ddd9c4; border: #a6a6a6 0.25pt double; padding: 2.4pt 5.4pt 2.4pt 5.4pt; font-size:10pt;color:#002060;text-align:center;'>".$row['calling_cards']."</td>";
			$html .="<td style='background:#ddd9c4; border: #a6a6a6 0.25pt double; padding: 2.4pt 5.4pt 2.4pt 5.4pt; font-size:10pt;color:#002060;text-align:center;'>".$row['total_remotes_offered']."</td>";
			$html .="<td style='background:#dce6f1; border: #a6a6a6 0.25pt double; padding: 2.4pt 5.4pt 2.4pt 5.4pt; font-size:10pt;color:#002060;text-align:center;'>".$row['remote_answered_incl_c_card']."</td>";
			$html .="<td style='background:#dce6f1; border: #a6a6a6 0.25pt double; padding: 2.4pt 5.4pt 2.4pt 5.4pt; font-size:10pt;color:#002060;text-align:center;'>".$row['remote_per_fte']."</td>";
			$html .="<td style='background:#ebf1de; border: #a6a6a6 0.25pt double; padding: 2.4pt 5.4pt 2.4pt 5.4pt; font-size:10pt;color:#002060;text-align:center;'>".$row['remote_abandon']."</td>";
			$html .="<td style='background:#ebf1de; border: #a6a6a6 0.25pt double; padding: 2.4pt 5.4pt 2.4pt 5.4pt; font-size:10pt;color:#002060;text-align:center;'>".$row['unique_customer_remote_abandon']."</td>";
			$html .="<td style='background:#ebf1de; border: #a6a6a6 0.25pt double; padding: 2.4pt 5.4pt 2.4pt 5.4pt; font-size:10pt;color:#002060;text-align:center;'>".$row['calling_card_remote_abandon']."</td>";
			$html .="<td style='background:#ebf1de; border: #a6a6a6 0.25pt double; padding: 2.4pt 5.4pt 2.4pt 5.4pt; font-size:10pt;color:#002060;text-align:center;'>".$row['bau_remote_abandon']."</td>";
			$html .="<td style='background:#ebf1de; border: #a6a6a6 0.25pt double; padding: 2.4pt 5.4pt 2.4pt 5.4pt; font-size:10pt;color:#002060;text-align:center;'>".$row['remote_abandon_per']."</td>";
			$html .="<td style='background:#e4dfec; border: #a6a6a6 0.25pt double; padding: 2.4pt 5.4pt 2.4pt 5.4pt; font-size:10pt;color:#002060;text-align:center;'>".$row['average_wait_time']."</td></tr>";
			
			$arr_mtd_date[] = date('d-M',strtotime($row['mtd_date']));
			$arr_total_remotes_offered[] = $row['total_remotes_offered'];
			$arr_remote_abandon_per[] = $row['remote_abandon_per'];
        }
    }
$html.= "</tbody></table>";

include("mis_graphs/automated_remote_performance_graph.php");

$html.="<br/><br/><div style='color: #002060; width:100%; text-align:center;'><b>-- End Of The Report --</b></div>";	


$message.=$RosterMsg."<div style='color: #002060;'>Please find below Remote Performance Report till ".date('d M, Y', strtotime($toDate)).".<br><br>
Formula:<br>
<font size=2>Agents Available in System: Agent count including leave and Week off<br>
Present Agents: Total agent present basis Avaya login<br>
Total report offered: Tier - 3 Remote Transferred + Calling Cards + Remote Abandon</font><br><br></div>";
$message.="<div><img src='".$fileName."'></div><div><br></div>";	
$message.=$html;

//echo crm_smtp_mail_final($to,$mail_cc,'',$from,$subject,$message,$att,$_SERVER['PHP_SELF']);
//unlink($fileName);

?>