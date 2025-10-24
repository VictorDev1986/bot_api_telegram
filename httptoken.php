<?php

/*Token de acceso a la API de Telegram */
$boToken = "8316424195:AAFXdp_Eje2FwZf1ymvbUP57zAKzghjCE2I";

/*URL del webhook donde se recibirán las actualizaciones */
$webhookUrl = "https://bottelegram.victorsanchezt.com/index.php";

/* Configurar el webhook en Telegram mediante una solicitud HTTP */
$apiUrl = "https://api.telegram.org/bot$boToken/setWebhook?url=$webhookUrl";
$response = file_get_contents($apiUrl);

/* Verificar la respuesta de la solicitud */
if ($response === FALSE) {
    /* captura el error si la solicitud HTTP falla */
    $error = error_get_last();
    echo "Error al configurar el webhook: " . $error['message'];
} else {
    /* verifica la respuesta de la API de Telegram */
    $responseData = json_decode($response, true);
    if ($responseData['ok'] === true) {
        echo "Webhook configurado correctamente.";
    } else {
        echo "Error al configurar el webhook";
    }
}

?>