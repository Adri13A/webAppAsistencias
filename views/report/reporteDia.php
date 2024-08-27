<?php
require_once('../pdf/TCPDF-main/tcpdf.php');
require_once('../../controllers/asistenciaController.php');

// Obtener datos del formulario (suponiendo que recibes el filtro de día, mes y año)
$year = $_POST['year'];
$month = $_POST['month']; // Mes
$day = $_POST['day']; 	   // Día

// Crear instancia de TCPDF
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// Establecer información del documento
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('WEBAPP');
$pdf->SetTitle('Reporte de Asistencias');
$pdf->SetSubject('Reporte de Asistencias');
$pdf->SetKeywords('TCPDF, PDF, reporte, asistencias');

// Establecer márgenes
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// Establecer auto página
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// Establecer la fuente
$pdf->SetFont('dejavusans', '', 12);

// Agregar una página
$pdf->AddPage();

$objControl = new asistenciaController();
$rows = $objControl->readDiaAsistencia($year, $month, $day);


// Establecer la variable de control según si hay resultados o no
$_SESSION['hayResultados'] = ($rows) ? true : false;

// Aquí puedes procesar los datos y generar el contenido del PDF, como una tabla con los alumnos, indicando asistencias y faltas, y posiblemente una gráfica de pastel

$currentDate = null; // Variable para almacenar la fecha actual

if ($rows) {

     // Generar el contenido del PDF
     foreach ($rows as $row) {

          $fecha = date('Y-m-d', strtotime($row['fecha'])); // Obtener solo la fecha sin la hora

          // Verificar si la fecha actual es diferente a la fecha anterior
          if ($fecha != $currentDate) {
               // Agregar una nueva página si no es la primera fecha
               if ($currentDate !== null) {
                    $pdf->AddPage();
               }

               // Imprimir la fecha como encabezado de la sección
               $pdf->Cell(0, 10, 'Fecha: ' . $fecha, 0, 1, 'C');

               // Imprimir el encabezado de la tabla
               $pdf->Cell(50, 10, 'Nombre usuario', 1, 0, 'C');
               $pdf->Cell(50, 10, 'Status', 1, 0, 'C');
               $pdf->Cell(50, 10, 'Fecha', 1, 1, 'C');

               // Actualizar la fecha actual
               $currentDate = $fecha;
          }

          // Cambiar el valor de $row['statusAsistencia'] por el correspondiente estado de asistencia
          $statusAsistencia = '';
          switch ($row['statusAsistencia']) {
               case 0:
                    $statusAsistencia = 'Falta';
                    $color = array(227, 93, 106); // Rojo para faltas
                    break;
               case 1:
                    $statusAsistencia = 'Asistencia';
                    $color = array(25, 135, 84); // Verde para asistencias
                    break;
               case 2:
                    $statusAsistencia = 'Justificante';
                    $color = array(173, 181, 189); // Gris para justificantes
                    break;
               default:
                    $statusAsistencia = 'Desconocido';
                    $color = array(0, 0, 0); // Negro para estados desconocidos
          }



          // Agregar las celdas al PDF con color de fondo
          $pdf->SetFillColor($color[0], $color[1], $color[2]);
          $pdf->Cell(50, 10, $row['nombre_usuario'], 1, 0, 'C', true);
          $pdf->Cell(50, 10, $statusAsistencia, 1, 0, 'C', true);
          $pdf->Cell(50, 10, $fecha, 1, 1, 'C', true);
     }


     // Agregar la gráfica de pastel (puedes usar bibliotecas como jpgraph o pChart)
     // ...

     // Generar el nombre del archivo PDF con el año
     $nombreArchivo = 'reporte_asistencias_' . $fecha . '.pdf';

     // Generar el PDF
    $pdfContent = $pdf->Output($nombreArchivo, 'S');

     // Codificar el contenido del PDF en base64 para enviarlo como parte de la URL
     // Iniciar una sesión para almacenar los datos del PDF
     session_start();
     $_SESSION['pdfContent'] = $pdfContent;

     // Redirigir a la página que mostrará el PDF
     header("Location: mostrar_pdf.php");
     exit();

     // Enviar el PDF al navegador para descargarlo automáticamente
     //header('Content-Type: application/pdf');
     //header('Content-Disposition: attachment; filename="reporte_asistencias.pdf"');
     //echo $pdfContent;

     // O guardar el PDF en el servidor
     // file_put_contents('reporte_asistencias.pdf', $pdfContent);
     // Si hay resultados, generar el PDF y enviarlo al navegador
} else {
     // Redirigir de nuevo al formulario con el mensaje de que no hay resultados
     header("Location: reporteAsistencias.php?hayResultados=false");
     exit();
}
