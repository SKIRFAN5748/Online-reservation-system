<?php
session_start();
include "../../conn.php";
$id=$_REQUEST['id'];
echo printReport($id);
function printReport($id)
{
    ob_start();
    $con = connect();
    $getCount = (connect()->query("SELECT tschedule.date as date, tschedule.time as time, tschedule.train_id as train, tschedule.route_id as route, tbooked.seat as seat, users.name as fullname, tbooked.code as code, tbooked.class as class FROM tbooked INNER JOIN tschedule ON tschedule.id = tbooked.schedule_id INNER JOIN users ON users.id = tbooked.user_id WHERE tbooked.schedule_id = '$id' ORDER BY class "));

    $output = "<style>
    .a {
        text-align:left;
        width: 10%;
    }
    .b{
        width: 20%
    }.c{
    width:30%;
    }
    table {
        border: 1px solid green;
        border-collapse: collapse;
        width: 100%;
        white-space: nowrap;
      }
      
   
          table th.shrink {
        white-space: nowrap
      }
      th{
        font-weight:bolder;

      }
      .shrink {
        white-space: nowrap;
        width: 40%;

      }
      
      table td.expand {
        width: 99%
      }
 
    </style>";
    $sn = 0;
    $schedule = getRouteFromSchedule($id);
    if ($getCount->num_rows < 1) {
        echo "<script>alert('No passenger yet for this schedule!');window.location='../admin.php'</script>";
        exit;
    }
    while ($row = $getCount->fetch_assoc()) {
        $date = $row['date'];
        $time = $row['time'];
        $train = getTrainName($row['train']);
        $route = getRouteFromSchedule($id);
        $time = formatTime($time);
        $sn++;
        $output .= '<tr><td class="a">' . $sn . '</td><td class="c">' . substr(ucwords(strtolower($row['fullname'])), 0, 15) . '</td><td class="shrink">' . $row['code'] . ' (' . ucwords(strtolower($row['class'])) . ')</td><td class="b">' . (strtoupper($row['seat'])) . '</td></tr>';
    }
    $start = '<table class="table" width="100%" border="1"><tr><th class="a">SN</th><th  class="c">Full Name</th><th  class="shrink">Code/Class</th><th  class="b">Seat No</th></tr>';
    $end = '</table>';
    $result = $start . $output . $end;
    // die($result);
    $file_name = preg_replace('/[^a-z0-9]+/', '-', strtolower('train_booking')) . ".pdf";
    require_once '../../TCPDF-main/tcpdf_autoconfig.php';

    // Include the main TCPDF library (search the library on the following directories).
    $tcpdf_include_dirs = array(
        realpath('../../TCPDF-main/tcpdf.php'),
        '/usr/share/php/tcpdf/tcpdf.php',
        '/usr/share/tcpdf/tcpdf.php',
        '/usr/share/php-tcpdf/tcpdf.php',
        '/var/www/tcpdf/tcpdf.php',
        '/var/www/html/tcpdf/tcpdf.php',
        '/usr/local/apache2/htdocs/tcpdf/tcpdf.php',
    );
    foreach ($tcpdf_include_dirs as $tcpdf_include_path) {
        if (@file_exists($tcpdf_include_path)) {
            require_once $tcpdf_include_path;
            break;
        }
    }

    class MYPDF extends TCPDF
    {
        //Page header
        public function Header()
        {
            // get the current page break margin
            $bMargin = $this->getBreakMargin();
            // get current auto-page-break mode
            $auto_page_break = $this->AutoPageBreak;
            // disable auto-page-break
            $this->SetAutoPageBreak(false, 0);
            // set bacground image
            $img_file = K_PATH_IMAGES . "watermark.jpg";
            // die($img_file);
            $this->Image($img_file, 0, 0, 210, 297, '', '', '', false, 300, '', false, false, 0);
            $this->SetAlpha(0.5);

            // restore auto-page-break status
            $this->SetAutoPageBreak($auto_page_break, $bMargin);
            // set the starting point for the page content
            $this->setPageMark();
        }
    }
    $pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
    // $pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, $pageLayout, true, 'UTF-8', false);
    // set document information
    $pdf->SetCreator(PDF_CREATOR);
    $pdf->SetAuthor("Admin");
    $pdf->SetTitle("Train Bookings " . " Ticket");
    $pdf->SetSubject('');
    $pdf->SetKeywords("Train Booking System, Rail, Rails, Railway, Booking, Project, System, Website, Portal ");


    // set default monospaced font
    $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

    // set margins
    $pdf->SetMargins(PDF_MARGIN_LEFT, 7, PDF_MARGIN_RIGHT);
    // $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
    // $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

    // set auto page breaks
    $pdf->SetAutoPageBreak(true, 5);

    // set image scale factor
    $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

    // set some language-dependent strings (optional)
    if (@file_exists(dirname(__FILE__) . '/lang/eng.php')) {
        require_once dirname(__FILE__) . '/lang/eng.php';
        $pdf->setLanguageArray($l);
    }

    // ---------------------------------------------------------

    // set default font subsetting mode
    $pdf->setFontSubsetting(true);

    // Set font
    // dejavusans is a UTF-8 Unicode font, if you only need to
    // print standard ASCII chars, you can use core fonts like
    // helvetica or times to reduce file size.
    $pdf->SetFont('dejavusans', '', 12, '', true);

    // Add a page
    // This method has several options, check the source code documentation for more information.
    $pdf->AddPage();
    // set text shadow effect
    $pdf->setTextShadow(array('enabled' => true, 'depth_w' => 0.2, 'depth_h' => 0.2, 'color' => array(196, 196, 196), 'opacity' => 1, 'blend_mode' => 'Normal'));
    // Set some content to print
    $html = '<h5 style="text-align:center"><img src="../../images/t.png" width="80" height="80"/><br/>ONLINE TICKET RESERVATION SYSTEM<br/> LIST OF BOOKINGS  FOR ' . $date . ' (' . $time . ')</h5> <div style="text-align:right; font-family:courier;font-weight:bold"><font size="+1">Train ' . $train . ' (' . $sn . ' Passengers) : ' . $schedule . ' </font></div>' . $result;
    // die($html);
    // Print text using writeHTMLCell()
    $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);
    // ---------------------------------------------------------

    // Close and output PDF document
    // This method has several options, check the source code documentation for more information.
    $pdf->Output($file_name, 'D');
    @unlink($src);
}
?>
<?php
function formatTime($time)
{
    $time = explode(":", $time);
    if ($time[0] > 12) {
        $string = ($time[0] - 12) . ":" . $time[1] . " PM";
    } else {
        $string = ($time[0]) . ":" . $time[1] . " AM";
    }
    return $string;
}
function getTrainName($id)
{
$val = connect()->query("SELECT name FROM train WHERE id = '$id'")->fetch_assoc();
return $val['name'];
}
function getRouteFromSchedule($id)
{
    $q = connect()->query("SELECT route_id as id FROM tschedule WHERE id = '$id'")->fetch_assoc();
    return getRoutePath($q['id']);
}
function getRoutePath($id)
{
$val = connect()->query("SELECT * FROM troute WHERE id = '$id'")->fetch_assoc();
return $val['start'] . " to " . $val['stop'];
}

?>