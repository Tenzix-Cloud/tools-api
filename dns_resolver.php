<?php
// Set the header to return JSON response
header('Content-Type: application/json');

// Check if 'domain' is provided in the query string
if (isset($_GET['domain'])) {
    $domain = $_GET['domain'];
    
    // Get DNS records for the domain
    $ip = gethostbyname($domain);
    
    // Check if DNS resolution was successful
    if ($ip !== $domain) {
        // Return the resolved IP address
        echo json_encode([
            'status' => 'success',
            'domain' => $domain,
            'ip' => $ip
        ]);
    } else {
        // Return an error if DNS resolution failed
        echo json_encode([
            'status' => 'error',
            'message' => 'DNS resolution failed.' 
        ]);
    }
} else {
    // Return an error if 'domain' is not provided
    echo json_encode([
        'status' => 'error',
        'message' => 'No domain provided. Use the ?domain=example.com parameter.'
    ]);
}
?>
