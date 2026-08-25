# Random Joke Generator

Random Joke Generator adalah library PHP yang mengintegrasikan API eksternal (JokeAPI) untuk mengambil dan menampilkan joke acak dengan berbagai kategori dan filter.

## Lisensi

MIT License - Silakan lihat file [LICENSE](LICENSE) untuk detail lengkap.

## Fitur Utama

### 🎉 Joke Categories
- ✅ General - Joke umum
- ✅ Programming - Joke tentang programming
- ✅ Knock-Knock - Joke tipe Knock-Knock
- ✅ Miscellaneous - Joke miscellaneous
- ✅ Religious - Joke religious
- ✅ Political - Joke political

### 🎭 Joke Types
- ✅ Single - Joke satu baris
- ✅ Two-Part - Joke dengan setup dan delivery

### 🔧 Advanced Features
- ✅ Filter by category
- ✅ Filter by type (single/twopart)
- ✅ Blacklist flags untuk konten sensitif
- ✅ Multiple language support
- ✅ Get multiple jokes at once
- ✅ Auto-format joke untuk display

### 🌍 Supported Languages
- English (en)
- Czech (cs)
- German (de)
- Spanish (es)
- French (fr)
- Portuguese (pt)

### 🚩 Blacklist Flags
- nsfw - Not safe for work
- religious - Religious content
- political - Political content
- racist - Racist content
- sexist - Sexist content
- explicit - Explicit content

## Instalasi

### Melalui Git Clone

```bash
git clone https://github.com/ipaukecil21-dot/random-joke-generator.git
cd random-joke-generator
```

### Melalui Composer

```bash
composer require ipaukecil21-dot/random-joke-generator
```

## Quick Start

### 1. Basic Setup

```php
<?php
require_once 'JokeGenerator.php';

// Initialize Joke Generator
$jokeGen = new JokeGenerator();

// Get random joke
$joke = $jokeGen->getRandomJoke();
echo $jokeGen->formatJoke($joke);
```

### 2. Get Programming Joke

```php
$progJoke = $jokeGen->getProgrammingJoke();
echo $jokeGen->formatJoke($progJoke);
```

### 3. Get Knock-Knock Joke

```php
$knockKnock = $jokeGen->getKnockKnockJoke();
echo $jokeGen->formatJoke($knockKnock);
```

### 4. Get Multiple Jokes

```php
$jokes = $jokeGen->getMultipleJokes(5); // Get 5 jokes
echo $jokeGen->formatMultipleJokes($jokes['jokes']);
```

### 5. Get Joke with Filters

```php
$safeJoke = $jokeGen->getRandomJoke([
    'blacklistFlags' => ['nsfw', 'explicit'],
    'type' => 'single'
]);
echo $jokeGen->formatJoke($safeJoke);
```

## API Reference

### Core Methods

#### `getRandomJoke($options = [])`
Mengambil random joke dengan berbagai pilihan filter.

**Parameters:**
```php
[
    'categories' => ['General', 'Programming'],  // Array kategori
    'type' => 'single',                          // 'single' atau 'twopart'
    'lang' => 'en',                              // Bahasa (en, cs, de, es, fr, pt)
    'blacklistFlags' => ['nsfw', 'explicit'],    // Array flag untuk di-blacklist
    'idRange' => '0-100',                        // Range ID joke
    'amount' => 1                                // Jumlah joke
]
```

**Return:** Array dengan joke data atau error

**Example:**
```php
$joke = $jokeGen->getRandomJoke();
$joke = $jokeGen->getRandomJoke(['type' => 'single']);
$jokes = $jokeGen->getRandomJoke(['amount' => 5]);
```

---

#### `getJokeByCategory($category, $options = [])`
Mengambil joke berdasarkan kategori spesifik.

**Parameters:**
- `$category` (string): Kategori joke
- `$options` (array): Additional options

**Return:** Array dengan joke data

**Example:**
```php
$joke = $jokeGen->getJokeByCategory('Programming');
$joke = $jokeGen->getJokeByCategory('Knock-Knock', ['amount' => 3]);
```

---

#### `getProgrammingJoke($options = [])`
Mengambil joke tentang programming.

**Return:** Array dengan programming joke

**Example:**
```php
$joke = $jokeGen->getProgrammingJoke();
```

---

#### `getKnockKnockJoke($options = [])`
Mengambil joke tipe Knock-Knock.

**Return:** Array dengan knock-knock joke

**Example:**
```php
$joke = $jokeGen->getKnockKnockJoke();
```

---

#### `getGeneralJoke($options = [])`
Mengambil joke umum (General category).

**Return:** Array dengan general joke

**Example:**
```php
$joke = $jokeGen->getGeneralJoke();
```

---

#### `getMultipleJokes($amount = 5, $options = [])`
Mengambil beberapa joke sekaligus.

**Parameters:**
- `$amount` (int): Jumlah joke yang ingin diambil (default: 5, max: 10)
- `$options` (array): Additional options

**Return:** Array dengan multiple jokes

**Example:**
```php
$jokes = $jokeGen->getMultipleJokes(10);
$jokes = $jokeGen->getMultipleJokes(3, ['type' => 'twopart']);
```

---

### Formatting Methods

#### `formatJoke($joke)`
Format joke secara otomatis berdasarkan tipenya.

**Parameters:**
- `$joke` (array): Data joke dari API

**Return:** String formatted joke

**Example:**
```php
$joke = $jokeGen->getRandomJoke();
echo $jokeGen->formatJoke($joke);
```

---

#### `formatSingleJoke($joke)`
Format joke tipe single.

**Parameters:**
- `$joke` (array): Data joke

**Return:** String formatted single joke

---

#### `formatTwoPartJoke($joke)`
Format joke tipe two-part (setup + delivery).

**Parameters:**
- `$joke` (array): Data joke

**Return:** String formatted two-part joke

---

#### `formatMultipleJokes($jokes)`
Format multiple jokes untuk display.

**Parameters:**
- `$jokes` (array): Array dari jokes

**Return:** String formatted multiple jokes

---

### Utility Methods

#### `getAvailableCategories()`
Mengambil list kategori yang tersedia.

**Return:** Array berisi kategori

**Example:**
```php
$categories = $jokeGen->getAvailableCategories();
// Output: ['General', 'Programming', 'Knock-Knock', ...]
```

---

#### `getAvailableFlags()`
Mengambil list flag yang bisa di-blacklist.

**Return:** Array berisi available flags

**Example:**
```php
$flags = $jokeGen->getAvailableFlags();
// Output: ['nsfw', 'religious', 'political', ...]
```

---

#### `getAvailableLanguages()`
Mengambil list bahasa yang tersedia.

**Return:** Array berisi bahasa dengan code dan name

**Example:**
```php
$languages = $jokeGen->getAvailableLanguages();
// Output: ['en' => 'English', 'de' => 'German', ...]
```

---

## Contoh Penggunaan Lengkap

Lihat file [examples.php](examples.php) untuk 15 contoh penggunaan lengkap:

1. Get Random Joke (Simple)
2. Get Programming Joke
3. Get Knock-Knock Joke
4. Get General Joke
5. Get Joke by Specific Category
6. Get Multiple Jokes
7. Get Joke with Blacklist Flags
8. Get Specific Joke Type (Single)
9. Get Specific Joke Type (Two-Part)
10. Get Joke in Different Language
11. Get Multiple Programming Jokes with Options
12. List Available Options
13. Advanced - Custom Joke Builder
14. Error Handling
15. Performance Test

Jalankan dengan:
```bash
php examples.php
```

## Error Handling

Semua method mengembalikan array response. Untuk handle error, cek field `error`:

```php
$joke = $jokeGen->getRandomJoke();

if (isset($joke['error']) && $joke['error']) {
    echo "Error: " . $joke['message'] . "\n";
} else {
    echo $jokeGen->formatJoke($joke);
}
```

## Advanced Usage

### Custom Joke Builder

```php
$options = [
    'categories' => ['Programming', 'Miscellaneous'],
    'type' => 'single',
    'blacklistFlags' => ['nsfw', 'explicit'],
    'amount' => 5
];

$jokes = $jokeGen->getRandomJoke($options);

if (isset($jokes['jokes'])) {
    echo $jokeGen->formatMultipleJokes($jokes['jokes']);
} else {
    echo $jokeGen->formatJoke($jokes);
}
```

### Get Safe Jokes for Kids

```php
$kidsJoke = $jokeGen->getRandomJoke([
    'blacklistFlags' => ['nsfw', 'explicit', 'political', 'religious'],
    'categories' => ['General', 'Miscellaneous']
]);

echo $jokeGen->formatJoke($kidsJoke);
```

### Get Jokes in Specific Language

```php
$germanJoke = $jokeGen->getRandomJoke(['lang' => 'de']);
$spanishJoke = $jokeGen->getRandomJoke(['lang' => 'es']);

echo $jokeGen->formatJoke($germanJoke);
echo $jokeGen->formatJoke($spanishJoke);
```

### Performance: Get Multiple Jokes Efficiently

```php
$startTime = microtime(true);

$jokes = $jokeGen->getMultipleJokes(10);

$endTime = microtime(true);
$executionTime = ($endTime - $startTime) * 1000;

echo "Retrieved " . count($jokes['jokes']) . " jokes in " . round($executionTime, 2) . " ms\n";
```

## Persyaratan

- PHP 7.2 atau lebih tinggi
- Extension `curl` atau `allow_url_fopen` diaktifkan
- Internet connection (untuk API request)

## API Endpoint

Project ini menggunakan JokeAPI:
- Base URL: `https://v2.jokeapi.dev/joke`
- Documentation: [JokeAPI Docs](https://jokeapi.dev/)

## Response Format

### Single Joke Response
```json
{
    "error": false,
    "category": "Programming",
    "type": "single",
    "joke": "Why do programmers prefer dark mode? Because light attracts bugs!",
    "flags": {
        "nsfw": false,
        "religious": false,
        "political": false,
        "racist": false,
        "sexist": false,
        "explicit": false
    },
    "id": 0,
    "safe": true
}
```

### Two-Part Joke Response
```json
{
    "error": false,
    "category": "Knock-Knock",
    "type": "twopart",
    "setup": "Knock knock",
    "delivery": "Who's there?",
    "flags": { ... },
    "id": 1,
    "safe": true
}
```

## Troubleshooting

### 1. Connection Error
**Problem:** `Failed to connect to API`
**Solusi:**
- Cek koneksi internet
- Pastikan `allow_url_fopen` diaktifkan di php.ini
- Atau gunakan `curl` extension

### 2. No Results Found
**Problem:** API mengembalikan error dengan `amount` > 10
**Solusi:** Gunakan `amount` maksimal 10, atau buat multiple requests

### 3. Invalid Category
**Problem:** Joke dengan kategori tidak valid mengembalikan error
**Solusi:** Gunakan `getAvailableCategories()` untuk melihat kategori yang valid

### 4. JSON Decode Error
**Problem:** `Invalid JSON response from API`
**Solusi:** Cek API endpoint URL dan format response

## Performance Tips

1. **Cache Results**: Cache joke results untuk mengurangi API calls
2. **Batch Requests**: Gunakan `getMultipleJokes()` instead of multiple single requests
3. **Use Filters**: Filter by type atau category untuk hasil yang lebih relevan

## Kontribusi

Kami menerima pull requests! Untuk kontribusi besar, buka issue terlebih dahulu untuk diskusi.

## Changelog

### v1.0.0 (2026-08-25)
- Initial release
- Full JokeAPI integration
- Support untuk 6 categories
- Multiple filtering options
- Language support
- Auto-formatting

## Support

Jika Anda memiliki pertanyaan atau menemukan bug, silakan buka issue di repository ini.

## External API

Project ini menggunakan **JokeAPI** yang gratis dan tidak memerlukan API key:
- Website: https://jokeapi.dev/
- Documentation: https://jokeapi.dev/

---

**Version:** 1.0.0  
**Last Updated:** 2026-08-25  
**Author:** ipaukecil21-dot
