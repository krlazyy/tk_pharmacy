<?php
// Include database connection file
require_once 'conn.php'; // Adjust this to your actual database connection file

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $contact_no = $_POST['contact_no'];

    // Generate a 6-digit OTP
    $otp = mt_rand(100000, 999999);

    // Check if the user exists in the database
    $stmt = $conn->prepare("SELECT * FROM users WHERE contact_no = ?");
    $stmt->bind_param("s", $contact_no); // Bind the parameter
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    if ($user) {
    // Update OTP for the user
    $stmt = $conn->prepare("UPDATE users SET user_otp = ? WHERE contact_no = ?");
    $stmt->bind_param("ss", $otp, $contact_no); // Bind the parameters
    $stmt->execute();


        // Prepare data for Infobip API
        $data = [
            'messages' => [
                [
                    'destinations' => [
                        ['to' => $contact_no]
                    ],
                    'from' => '447491163443',
                    'text' => "Tinig Kalinga OTP: ".$otp."
    from Tinig Kalinga Support."
                ]
            ]
        ];

        // Send SMS via Infobip API
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, 'https://5156lz.api.infobip.com/sms/2/text/advanced');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Authorization: App 2b430d6aff95354a30d25997062c8a31-5fba88d6-6bde-48a6-8340-f0f1bec271fb',
            'Content-Type: application/json',
            'Accept: application/json'
        ]);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));

        $response = curl_exec($ch);

        if (curl_errno($ch)) {
            echo 'Error: ' . curl_error($ch);
        } else {
            $httpStatus = curl_getinfo($ch, CURLINFO_HTTP_CODE);
            if ($httpStatus == 200) {
                // Redirect user to verify.php with success message
                header("location:verify.php?msg=Check your mobile for OTP and verify");
                echo json_encode(['success' => true, 'message' => 'OTP sent successfully!']);
            } else {
                echo json_encode(['success' => false, 'message' => 'Failed to send OTP.', 'details' => $response]);
            }
        }

        curl_close($ch);
    } else {
        // User not found
        echo json_encode(['success' => false, 'message' => 'User not found.']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid request method.']);
}
?>
