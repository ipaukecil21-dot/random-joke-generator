<?php

/**
 * Random Joke Generator - API Backend
 * Handles API requests from the web interface
 */

require_once 'JokeGenerator.php';

header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type');

// Handle preflight requests
if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(200);
    exit();
}

try {
    // Initialize Joke Generator
    $jokeGen = new JokeGenerator();
    
    // Get parameters from request
    $category = isset($_GET['category']) ? trim($_GET['category']) : 'Any';
    $type = isset($_GET['type']) ? trim($_GET['type']) : '';
    $lang = isset($_GET['lang']) ? trim($_GET['lang']) : 'en';
    $amount = isset($_GET['amount']) ? (int)$_GET['amount'] : 1;
    $blacklist = isset($_GET['blacklist']) ? trim($_GET['blacklist']) : '';
    
    // Validate amount
    if ($amount < 1 || $amount > 10) {
        $amount = 1;
    }
    
    // Build options array
    $options = [];
    
    // Set category
    if ($category && $category !== 'Any') {
        $options['categories'] = [$category];
    }
    
    // Set type
    if ($type) {
        $options['type'] = $type;
    }
    
    // Set language
    if ($lang) {
        $options['lang'] = $lang;
    }
    
    // Set blacklist flags
    if ($blacklist) {
        $flags = array_filter(array_map('trim', explode(',', $blacklist)));
        if (!empty($flags)) {
            $options['blacklistFlags'] = $flags;
        }
    }
    
    // Set amount
    if ($amount > 1) {
        $options['amount'] = $amount;
    }
    
    // Get joke(s)
    $result = $jokeGen->getRandomJoke($options);
    
    // Check for errors
    if (isset($result['error']) && $result['error']) {
        http_response_code(400);
        echo json_encode([
            'error' => true,
            'message' => $result['message'] ?? 'Failed to fetch joke'
        ]);
    } else {
        http_response_code(200);
        echo json_encode($result);
    }
    
} catch (Exception $e) {
    http_response_code(500);
    echo json_encode([
        'error' => true,
        'message' => 'Server error: ' . $e->getMessage()
    ]);
}

?>
