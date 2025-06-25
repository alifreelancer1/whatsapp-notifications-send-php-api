<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $number = $_POST['number'];
    $message = $_POST['message'];
    $priority = $_POST['priority'] ?? 1; // Default priority is 1

    // Validate phone number format (must start with + and be 10 to 15 digits)
    if (!preg_match('/^\+\d{10,15}$/', $number)) {
        echo "Invalid phone number format. It must include the country code (e.g., +923001234567).";
        exit;
    }

    // Validate priority (must be 1, 2, or 3)
    if (!in_array($priority, [1, 2, 3])) {
        echo "Invalid priority level. It must be 1, 2, or 3.";
        exit;
    }

    $curl = curl_init();

    curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://wcrm.bestmallbey.shop/api/submit-request',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => array(
            'appkey' => 'a96e4b8a-33e0-43d9-a652-45d6c01cf52a',
            'authkey' => '5IsI8tQaImrsza83HA4U1oxakmbXPfJPQx8yg6H57P7eQaC6FA',
            'to' => $number,
            'message' => $message,
            'priority' => $priority,
            'sandbox' => 'false'
        ),
    ));

    $response = curl_exec($curl);
    $httpCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
    $error = curl_error($curl);
    curl_close($curl);

    if ($error) {
        echo "cURL Error: " . htmlspecialchars($error);
        exit;
    }

    if ($httpCode == 200) {
        $responseData = json_decode($response, true);
        if (isset($responseData['message_id']) && isset($responseData['status'])) {
            echo "Message queued successfully. Message ID: " . htmlspecialchars($responseData['message_id']) . ", Status: " . htmlspecialchars($responseData['status']);
        } else {
            echo "Unexpected API response: " . htmlspecialchars($response);
        }
    } else {
        echo "API Error (HTTP $httpCode): " . htmlspecialchars($response);
    }
} else {
    echo "Invalid request method.";
}
?>