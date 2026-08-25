<?php

/**
 * Random Joke Generator - Usage Examples
 * Contoh penggunaan class JokeGenerator
 */

require_once 'JokeGenerator.php';

// Initialize Joke Generator
$jokeGen = new JokeGenerator();

echo "╔════════════════════════════════════════════════════╗\n";
echo "║     Random Joke Generator - Usage Examples         ║\n";
echo "╚════════════════════════════════════════════════════╝\n\n";

// ============================================
// 1. Get Random Joke (Simple)
// ============================================

echo "Example 1: Get Random Joke (Simple)\n";
echo "───────────────────────────────────\n";
$joke = $jokeGen->getRandomJoke();

if (isset($joke['error']) && $joke['error']) {
    echo "Error: " . $joke['message'] . "\n";
} else {
    echo $jokeGen->formatJoke($joke);
}

echo "\n\n";

// ============================================
// 2. Get Programming Joke
// ============================================

echo "Example 2: Get Programming Joke\n";
echo "────────────────────────────────\n";
$progJoke = $jokeGen->getProgrammingJoke();

if (isset($progJoke['error']) && $progJoke['error']) {
    echo "Error: " . $progJoke['message'] . "\n";
} else {
    echo $jokeGen->formatJoke($progJoke);
}

echo "\n\n";

// ============================================
// 3. Get Knock-Knock Joke
// ============================================

echo "Example 3: Get Knock-Knock Joke\n";
echo "────────────────────────────────\n";
$knockKnock = $jokeGen->getKnockKnockJoke();

if (isset($knockKnock['error']) && $knockKnock['error']) {
    echo "Error: " . $knockKnock['message'] . "\n";
} else {
    echo $jokeGen->formatJoke($knockKnock);
}

echo "\n\n";

// ============================================
// 4. Get General Joke
// ============================================

echo "Example 4: Get General Joke\n";
echo "───────────────────────────\n";
$general = $jokeGen->getGeneralJoke();

if (isset($general['error']) && $general['error']) {
    echo "Error: " . $general['message'] . "\n";
} else {
    echo $jokeGen->formatJoke($general);
}

echo "\n\n";

// ============================================
// 5. Get Joke by Specific Category
// ============================================

echo "Example 5: Get Joke by Specific Category (Miscellaneous)\n";
echo "──────────────────────────────────────────────────────────\n";
$misc = $jokeGen->getJokeByCategory('Miscellaneous');

if (isset($misc['error']) && $misc['error']) {
    echo "Error: " . $misc['message'] . "\n";
} else {
    echo $jokeGen->formatJoke($misc);
}

echo "\n\n";

// ============================================
// 6. Get Multiple Jokes
// ============================================

echo "Example 6: Get Multiple Jokes (3 jokes)\n";
echo "───────────────────────────────────────\n";
$multipleJokes = $jokeGen->getMultipleJokes(3);

if (isset($multipleJokes['error']) && $multipleJokes['error']) {
    echo "Error: " . $multipleJokes['message'] . "\n";
} else {
    if (isset($multipleJokes['jokes'])) {
        echo $jokeGen->formatMultipleJokes($multipleJokes['jokes']);
    } else {
        echo $jokeGen->formatJoke($multipleJokes);
    }
}

echo "\n\n";

// ============================================
// 7. Get Joke with Blacklist Flags
// ============================================

echo "Example 7: Get Joke with Blacklist Flags (exclude NSFW)\n";
echo "────────────────────────────────────────────────────────\n";
$safeJoke = $jokeGen->getRandomJoke([
    'blacklistFlags' => ['nsfw', 'explicit']
]);

if (isset($safeJoke['error']) && $safeJoke['error']) {
    echo "Error: " . $safeJoke['message'] . "\n";
} else {
    echo $jokeGen->formatJoke($safeJoke);
}

echo "\n\n";

// ============================================
// 8. Get Specific Joke Type (Single)
// ============================================

echo "Example 8: Get Specific Joke Type (Single only)\n";
echo "────────────────────────────────────────────────\n";
$singleJoke = $jokeGen->getRandomJoke([
    'type' => 'single'
]);

if (isset($singleJoke['error']) && $singleJoke['error']) {
    echo "Error: " . $singleJoke['message'] . "\n";
} else {
    echo $jokeGen->formatJoke($singleJoke);
}

echo "\n\n";

// ============================================
// 9. Get Specific Joke Type (Two-Part)
// ============================================

echo "Example 9: Get Specific Joke Type (Two-Part only)\n";
echo "──────────────────────────────────────────────────\n";
$twoPartJoke = $jokeGen->getRandomJoke([
    'type' => 'twopart'
]);

if (isset($twoPartJoke['error']) && $twoPartJoke['error']) {
    echo "Error: " . $twoPartJoke['message'] . "\n";
} else {
    echo $jokeGen->formatJoke($twoPartJoke);
}

echo "\n\n";

// ============================================
// 10. Get Joke in Different Language
// ============================================

echo "Example 10: Get Joke in German Language\n";
echo "───────────────────────────────────────\n";
$germanJoke = $jokeGen->getRandomJoke([
    'lang' => 'de'
]);

if (isset($germanJoke['error']) && $germanJoke['error']) {
    echo "Error: " . $germanJoke['message'] . "\n";
} else {
    echo $jokeGen->formatJoke($germanJoke);
}

echo "\n\n";

// ============================================
// 11. Get Multiple Programming Jokes with Options
// ============================================

echo "Example 11: Get Multiple Programming Jokes (5 jokes)\n";
echo "─────────────────────────────────────────────────────\n";
$multiProg = $jokeGen->getJokeByCategory('Programming', [
    'amount' => 5,
    'type' => 'single'
]);

if (isset($multiProg['error']) && $multiProg['error']) {
    echo "Error: " . $multiProg['message'] . "\n";
} else {
    if (isset($multiProg['jokes'])) {
        echo $jokeGen->formatMultipleJokes($multiProg['jokes']);
    } else {
        echo $jokeGen->formatJoke($multiProg);
    }
}

echo "\n\n";

// ============================================
// 12. List Available Options
// ============================================

echo "Example 12: Available Options\n";
echo "─────────────────────────────\n\n";

echo "📂 Available Categories:\n";
$categories = $jokeGen->getAvailableCategories();
foreach ($categories as $cat) {
    echo "  • " . $cat . "\n";
}

echo "\n🚩 Available Blacklist Flags:\n";
$flags = $jokeGen->getAvailableFlags();
foreach ($flags as $flag) {
    echo "  • " . $flag . "\n";
}

echo "\n🌍 Available Languages:\n";
$languages = $jokeGen->getAvailableLanguages();
foreach ($languages as $code => $name) {
    echo "  • " . $code . " - " . $name . "\n";
}

echo "\n\n";

// ============================================
// 13. Advanced Example: Custom Joke Builder
// ============================================

echo "Example 13: Advanced - Custom Joke Builder\n";
echo "──────────────────────────────────────────\n\n";

function customJokeBuilder($jokeGen) {
    echo "Building custom joke request...\n\n";
    
    $options = [
        'categories' => ['Programming', 'Miscellaneous'],
        'type' => 'single',
        'blacklistFlags' => ['nsfw', 'explicit', 'political'],
        'amount' => 2
    ];
    
    echo "Options:\n";
    echo "  • Categories: " . implode(', ', $options['categories']) . "\n";
    echo "  • Type: " . $options['type'] . "\n";
    echo "  • Blacklist: " . implode(', ', $options['blacklistFlags']) . "\n";
    echo "  • Amount: " . $options['amount'] . "\n\n";
    
    $result = $jokeGen->getRandomJoke($options);
    
    if (isset($result['error']) && $result['error']) {
        echo "Error: " . $result['message'] . "\n";
    } else {
        if (isset($result['jokes'])) {
            echo $jokeGen->formatMultipleJokes($result['jokes']);
        } else {
            echo $jokeGen->formatJoke($result);
        }
    }
}

customJokeBuilder($jokeGen);

echo "\n";

// ============================================
// 14. Error Handling Example
// ============================================

echo "Example 14: Error Handling\n";
echo "──────────────────────────\n";

$invalidJoke = $jokeGen->getJokeByCategory('InvalidCategory');

if (isset($invalidJoke['error']) && $invalidJoke['error']) {
    echo "❌ Error detected!\n";
    echo "Message: " . $invalidJoke['message'] . "\n";
} else {
    echo "✅ Success!\n";
    echo $jokeGen->formatJoke($invalidJoke);
}

echo "\n";

// ============================================
// 15. Performance Test: Get Multiple Jokes Fast
// ============================================

echo "Example 15: Performance Test - Get 10 Random Jokes\n";
echo "──────────────────────────────────────────────────\n\n";

$startTime = microtime(true);
$performanceJokes = $jokeGen->getMultipleJokes(10);
$endTime = microtime(true);

if (isset($performanceJokes['error']) && $performanceJokes['error']) {
    echo "Error: " . $performanceJokes['message'] . "\n";
} else {
    $executionTime = ($endTime - $startTime) * 1000; // Convert to milliseconds
    
    if (isset($performanceJokes['jokes'])) {
        $count = count($performanceJokes['jokes']);
    } else {
        $count = 1;
    }
    
    echo "✅ Successfully retrieved " . $count . " jokes\n";
    echo "⏱️  Execution time: " . round($executionTime, 2) . " ms\n";
    echo "📊 Average per joke: " . round($executionTime / $count, 2) . " ms\n\n";
    
    if (isset($performanceJokes['jokes'])) {
        echo "First 3 jokes preview:\n";
        for ($i = 0; $i < min(3, count($performanceJokes['jokes'])); $i++) {
            echo "\nJoke #" . ($i + 1) . ":\n";
            echo $jokeGen->formatJoke($performanceJokes['jokes'][$i]);
        }
    }
}

echo "\n";
echo "╔════════════════════════════════════════════════════╗\n";
echo "║            End of Examples                         ║\n";
echo "╚════════════════════════════════════════════════════╝\n";

?>
