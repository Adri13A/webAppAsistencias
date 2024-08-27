<?php 
require_once('../../controllers/asistenciaController.php');

$year = $_POST['year']; // Año

$objControl = new asistenciaController();
$rows = $objControl->readAnioAsistencia($year);

// Verificar si no hay asistencias para el año proporcionado
if(empty($rows)) {
    // Redirigir de vuelta a la página de reportes con un mensaje de advertencia
    header("Location: reporteAño.php?sinAño=false");
    exit();
}

// Contadores para los diferentes estados de asistencia
$countAsistencia = 0;
$countFalta = 0;
$countJustificante = 0;

// Calcular los recuentos de asistencias, faltas y justificaciones
foreach ($rows as $row) {
    switch ($row['statusAsistencia']) {
        case 0:
            $countFalta++;
            break;
        case 1:
            $countAsistencia++;
            break;
        case 2:
            $countJustificante++;
            break;
        default:
            break;
    }
}
?>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
    google.charts.load('current', {'packages':['corechart']});
    google.charts.setOnLoadCallback(drawChart);
    function drawChart() {
        var data = google.visualization.arrayToDataTable([
            ['Asistencia', 'Cantidad'],
            ['Asistencias', <?php echo $countAsistencia; ?>],
            ['Faltas', <?php echo $countFalta; ?>],
            ['Justificantes', <?php echo $countJustificante; ?>]
        ]);
        var options = {
            title: 'Asistencias por estado de asistencia',
            pieHole: 0.4
        };
        var chart = new google.visualization.PieChart(document.getElementById('piechart'));
        chart.draw(data, options);

        // Convertir la gráfica a una imagen y descargarla
        var imgUri = chart.getImageURI();
        var link = document.createElement("a");
        link.href = imgUri;
        link.download = "grafica_pastel_"+ <?= $year ?>+".png";
        document.body.appendChild(link);
        link.click();
        document.body.removeChild(link);
    }
</script>

<div id="piechart" style="width: 900px; height: 500px;"></div>
