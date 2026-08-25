<?php

/**
 * Random Joke Generator Class
 * Menggunakan JokeAPI untuk mengambil joke acak
 * MIT License
 */

class JokeGenerator {
    
    private $apiBaseUrl = 'https://v2.jokeapi.dev/joke';
    private $timeout = 10;
    
    /**
     * Get Random Joke
     * Mengambil joke acak dari API
     * 
     * @param array $options Options untuk API request
     *                        - categories: Array kategori (General, Programming, Knock-Knock, etc)
     *                        - type: 'single' atau 'twopart'
     *                        - lang: Bahasa (en, cs, de, es, fr, pt)
     *                        - blacklistFlags: Array flag untuk di-blacklist (nsfw, religious, political, racist, sexist, explicit)
     *                        - idRange: Range ID joke (contoh: '0-10')
     *                        - amount: Jumlah joke yang diambil (default: 1)
     * 
     * @return array Response dari API berisi joke atau error
     */
    public function getRandomJoke($options = []) {
        $url = $this->buildUrl($options);
        return $this->callAPI($url);
    }
    
    /**
     * Get Joke by Category
     * Mengambil joke berdasarkan kategori tertentu
     * 
     * @param string $category Kategori joke (General, Programming, Knock-Knock, Miscellaneous, Religious, Political)
     * @param array $options Options tambahan
     * 
     * @return array Response dari API
     */
    public function getJokeByCategory($category, $options = []) {
        $options['categories'] = [$category];
        return $this->getRandomJoke($options);
    }
    
    /**
     * Get Programming Joke
     * Mengambil joke tentang programming
     * 
     * @param array $options Options tambahan
     * 
     * @return array Response dari API
     */
    public function getProgrammingJoke($options = []) {
        return $this->getJokeByCategory('Programming', $options);
    }
    
    /**
     * Get Knock-Knock Joke
     * Mengambil joke tipe Knock-Knock
     * 
     * @param array $options Options tambahan
     * 
     * @return array Response dari API
     */
    public function getKnockKnockJoke($options = []) {
        $options['type'] = 'twopart';
        return $this->getJokeByCategory('Knock-Knock', $options);
    }
    
    /**
     * Get General Joke
     * Mengambil joke umum
     * 
     * @param array $options Options tambahan
     * 
     * @return array Response dari API
     */
    public function getGeneralJoke($options = []) {
        return $this->getJokeByCategory('General', $options);
    }
    
    /**
     * Get Multiple Jokes
     * Mengambil beberapa joke sekaligus
     * 
     * @param int $amount Jumlah joke yang ingin diambil
     * @param array $options Options tambahan
     * 
     * @return array Response dari API berisi multiple jokes
     */
    public function getMultipleJokes($amount = 5, $options = []) {
        $options['amount'] = $amount;
        return $this->getRandomJoke($options);
    }
    
    /**
     * Get Available Categories
     * Mengambil list kategori yang tersedia
     * 
     * @return array Array berisi kategori yang tersedia
     */
    public function getAvailableCategories() {
        return [
            'General',
            'Programming',
            'Knock-Knock',
            'Miscellaneous',
            'Religious',
            'Political'
        ];
    }
    
    /**
     * Get Available Blacklist Flags
     * Mengambil list flag yang bisa di-blacklist
     * 
     * @return array Array berisi available flags
     */
    public function getAvailableFlags() {
        return [
            'nsfw',
            'religious',
            'political',
            'racist',
            'sexist',
            'explicit'
        ];
    }
    
    /**
     * Get Available Languages
     * Mengambil list bahasa yang tersedia
     * 
     * @return array Array berisi available languages
     */
    public function getAvailableLanguages() {
        return [
            'en' => 'English',
            'cs' => 'Czech',
            'de' => 'German',
            'es' => 'Spanish',
            'fr' => 'French',
            'pt' => 'Portuguese'
        ];
    }
    
    /**
     * Format Single Joke
     * Format joke tipe single untuk display
     * 
     * @param array $joke Data joke dari API
     * 
     * @return string Formatted joke
     */
    public function formatSingleJoke($joke) {
        if (!isset($joke['joke'])) {
            return 'Error: Joke content not found';
        }
        
        $output = "📝 Joke\n";
        $output .= "─────────────────────\n";
        $output .= $joke['joke'] . "\n";
        $output .= "─────────────────────\n";
        
        if (isset($joke['category'])) {
            $output .= "Category: " . $joke['category'] . "\n";
        }
        if (isset($joke['type'])) {
            $output .= "Type: " . $joke['type'] . "\n";
        }
        
        return $output;
    }
    
    /**
     * Format Two-Part Joke
     * Format joke tipe twopart (setup + delivery) untuk display
     * 
     * @param array $joke Data joke dari API
     * 
     * @return string Formatted joke
     */
    public function formatTwoPartJoke($joke) {
        if (!isset($joke['setup']) || !isset($joke['delivery'])) {
            return 'Error: Joke content not found';
        }
        
        $output = "🎭 Knock-Knock Joke\n";
        $output .= "─────────────────────\n";
        $output .= "Setup: " . $joke['setup'] . "\n\n";
        $output .= "Delivery: " . $joke['delivery'] . "\n";
        $output .= "─────────────────────\n";
        
        if (isset($joke['category'])) {
            $output .= "Category: " . $joke['category'] . "\n";
        }
        if (isset($joke['type'])) {
            $output .= "Type: " . $joke['type'] . "\n";
        }
        
        return $output;
    }
    
    /**
     * Format Joke (Auto-detect type)
     * Format joke secara otomatis berdasarkan tipenya
     * 
     * @param array $joke Data joke dari API
     * 
     * @return string Formatted joke
     */
    public function formatJoke($joke) {
        if (isset($joke['type'])) {
            if ($joke['type'] === 'single') {
                return $this->formatSingleJoke($joke);
            } else if ($joke['type'] === 'twopart') {
                return $this->formatTwoPartJoke($joke);
            }
        }
        
        return json_encode($joke, JSON_PRETTY_PRINT);
    }
    
    /**
     * Format Multiple Jokes
     * Format multiple jokes untuk display
     * 
     * @param array $jokes Array dari jokes
     * 
     * @return string Formatted jokes
     */
    public function formatMultipleJokes($jokes) {
        $output = "🎉 Multiple Jokes\n";
        $output .= "═════════════════════════════════════\n\n";
        
        foreach ($jokes as $index => $joke) {
            $output .= "Joke #" . ($index + 1) . ":\n";
            $output .= $this->formatJoke($joke) . "\n\n";
        }
        
        return $output;
    }
    
    /**
     * Build API URL
     * Membangun URL untuk API request
     * 
     * @param array $options Options untuk query
     * 
     * @return string URL lengkap untuk API request
     */
    private function buildUrl($options = []) {
        $categories = $options['categories'] ?? ['Any'];
        $categoryString = implode(',', $categories);
        
        $url = $this->apiBaseUrl . '/' . $categoryString;
        
        $queryParams = [];
        
        // Type parameter
        if (isset($options['type'])) {
            $queryParams['type'] = $options['type'];
        }
        
        // Language parameter
        if (isset($options['lang'])) {
            $queryParams['lang'] = $options['lang'];
        }
        
        // Blacklist flags parameter
        if (isset($options['blacklistFlags'])) {
            $flags = is_array($options['blacklistFlags']) 
                ? implode(',', $options['blacklistFlags']) 
                : $options['blacklistFlags'];
            $queryParams['blacklistFlags'] = $flags;
        }
        
        // ID Range parameter
        if (isset($options['idRange'])) {
            $queryParams['idRange'] = $options['idRange'];
        }
        
        // Amount parameter
        if (isset($options['amount'])) {
            $queryParams['amount'] = $options['amount'];
        }
        
        // Build query string
        if (!empty($queryParams)) {
            $url .= '?' . http_build_query($queryParams);
        }
        
        return $url;
    }
    
    /**
     * Call API
     * Melakukan HTTP request ke JokeAPI
     * 
     * @param string $url URL untuk API request
     * 
     * @return array Response dari API
     */
    private function callAPI($url) {
        $options = [
            'http' => [
                'method' => 'GET',
                'header' => "User-Agent: Random-Joke-Generator\r\n",
                'timeout' => $this->timeout
            ]
        ];
        
        $context = stream_context_create($options);
        
        try {
            $response = @file_get_contents($url, false, $context);
            
            if ($response === false) {
                return [
                    'error' => true,
                    'message' => 'Failed to connect to API',
                    'details' => error_get_last()
                ];
            }
            
            $result = json_decode($response, true);
            
            if (json_last_error() !== JSON_ERROR_NONE) {
                return [
                    'error' => true,
                    'message' => 'Invalid JSON response from API',
                    'json_error' => json_last_error_msg()
                ];
            }
            
            return $result;
            
        } catch (Exception $e) {
            return [
                'error' => true,
                'message' => $e->getMessage()
            ];
        }
    }
}

?>
