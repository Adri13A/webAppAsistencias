<?php
session_start();

// Obtener el contenido del PDF de la sesión
$pdfContent = isset($_SESSION['pdfContent']) ? $_SESSION['pdfContent'] : '';

// Si hay contenido del PDF, mostrarlo en una nueva ventana del navegador
if ($pdfContent) {
    header('Content-Type: application/pdf');
    header('Content-Disposition: inline; filename="reporte_asistencias.pdf"');
    header('Content-Length: ' . strlen($pdfContent));
    echo $pdfContent;
} else {
    // Si no hay contenido del PDF, mostrar un mensaje de error
    echo "No se pudo encontrar el PDF.";
}
?>
