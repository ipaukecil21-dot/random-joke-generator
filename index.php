<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Random Joke Generator</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }

        .container {
            background: white;
            border-radius: 20px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
            max-width: 600px;
            width: 100%;
            padding: 40px;
        }

        .header {
            text-align: center;
            margin-bottom: 30px;
        }

        .header h1 {
            color: #333;
            font-size: 2.5em;
            margin-bottom: 10px;
        }

        .header p {
            color: #666;
            font-size: 1.1em;
        }

        .joke-section {
            background: #f8f9fa;
            border-radius: 15px;
            padding: 30px;
            margin-bottom: 30px;
            min-height: 150px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .joke-content {
            display: none;
        }

        .joke-content.active {
            display: block;
        }

        .joke-type {
            color: #667eea;
            font-size: 0.9em;
            font-weight: 600;
            text-transform: uppercase;
            margin-bottom: 10px;
        }

        .joke-text {
            color: #333;
            font-size: 1.3em;
            line-height: 1.6;
            margin-bottom: 15px;
            font-weight: 500;
        }

        .joke-setup {
            color: #333;
            font-size: 1.2em;
            margin-bottom: 20px;
            font-weight: 500;
        }

        .joke-delivery {
            color: #667eea;
            font-size: 1.2em;
            font-weight: 600;
            padding-left: 20px;
            border-left: 4px solid #667eea;
        }

        .joke-meta {
            color: #999;
            font-size: 0.9em;
            margin-top: 15px;
            padding-top: 15px;
            border-top: 1px solid #e0e0e0;
        }

        .loading {
            text-align: center;
            color: #667eea;
            display: none;
        }

        .loading.active {
            display: block;
        }

        .spinner {
            border: 4px solid #f3f3f3;
            border-top: 4px solid #667eea;
            border-radius: 50%;
            width: 40px;
            height: 40px;
            animation: spin 1s linear infinite;
            margin: 20px auto;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        .controls {
            display: grid;
            gap: 15px;
        }

        .control-group {
            display: flex;
            flex-direction: column;
        }

        label {
            color: #333;
            font-weight: 600;
            margin-bottom: 8px;
            font-size: 0.95em;
        }

        select, input[type="text"], input[type="number"] {
            padding: 12px;
            border: 2px solid #e0e0e0;
            border-radius: 8px;
            font-size: 1em;
            transition: border-color 0.3s;
        }

        select:focus, input:focus {
            outline: none;
            border-color: #667eea;
        }

        .checkbox-group {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 10px;
        }

        .checkbox-item {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .checkbox-item input[type="checkbox"] {
            width: 18px;
            height: 18px;
            cursor: pointer;
        }

        .checkbox-item label {
            margin-bottom: 0;
            font-weight: 500;
            cursor: pointer;
        }

        .button-group {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 15px;
            margin-top: 20px;
        }

        button {
            padding: 14px 28px;
            border: none;
            border-radius: 8px;
            font-size: 1em;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .btn-primary {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(102, 126, 234, 0.4);
        }

        .btn-primary:active {
            transform: translateY(0);
        }

        .btn-secondary {
            background: #e0e0e0;
            color: #333;
        }

        .btn-secondary:hover {
            background: #d0d0d0;
        }

        .info-message {
            background: #e3f2fd;
            color: #1976d2;
            padding: 12px;
            border-radius: 8px;
            margin-bottom: 15px;
            font-size: 0.95em;
            display: none;
        }

        .info-message.active {
            display: block;
        }

        .error-message {
            background: #ffebee;
            color: #c62828;
            padding: 12px;
            border-radius: 8px;
            margin-bottom: 15px;
            font-size: 0.95em;
            display: none;
        }

        .error-message.active {
            display: block;
        }

        .success-message {
            background: #e8f5e9;
            color: #2e7d32;
            padding: 12px;
            border-radius: 8px;
            margin-bottom: 15px;
            font-size: 0.95em;
            display: none;
        }

        .success-message.active {
            display: block;
        }

        .joke-counter {
            text-align: center;
            color: #999;
            font-size: 0.9em;
            margin-top: 15px;
        }

        @media (max-width: 600px) {
            .container {
                padding: 20px;
            }

            .header h1 {
                font-size: 1.8em;
            }

            .button-group {
                grid-template-columns: 1fr;
            }

            .checkbox-group {
                grid-template-columns: 1fr;
            }

            .joke-text {
                font-size: 1.1em;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>🎉 Joke Generator</h1>
            <p>Get a laugh with a random joke!</p>
        </div>

        <div class="info-message" id="infoMessage"></div>
        <div class="error-message" id="errorMessage"></div>
        <div class="success-message" id="successMessage"></div>

        <!-- Joke Display Section -->
        <div class="joke-section">
            <div class="loading" id="loading">
                <div class="spinner"></div>
                <p>Loading joke...</p>
            </div>

            <div class="joke-content" id="jokeContent">
                <!-- Content will be inserted here by JavaScript -->
            </div>

            <div id="emptyState" style="text-align: center; color: #999;">
                <p style="font-size: 1.1em;">Click "Get Joke" to start laughing! 😄</p>
            </div>
        </div>

        <!-- Controls Section -->
        <div class="controls">
            <div class="control-group">
                <label for="category">Category:</label>
                <select id="category">
                    <option value="Any">Any</option>
                    <option value="General">General</option>
                    <option value="Programming">Programming</option>
                    <option value="Knock-Knock">Knock-Knock</option>
                    <option value="Miscellaneous">Miscellaneous</option>
                    <option value="Religious">Religious</option>
                    <option value="Political">Political</option>
                </select>
            </div>

            <div class="control-group">
                <label for="jokeType">Joke Type:</label>
                <select id="jokeType">
                    <option value="">Any Type</option>
                    <option value="single">Single Line</option>
                    <option value="twopart">Two-Part</option>
                </select>
            </div>

            <div class="control-group">
                <label for="language">Language:</label>
                <select id="language">
                    <option value="en">English (en)</option>
                    <option value="cs">Czech (cs)</option>
                    <option value="de">German (de)</option>
                    <option value="es">Spanish (es)</option>
                    <option value="fr">French (fr)</option>
                    <option value="pt">Portuguese (pt)</option>
                </select>
            </div>

            <div class="control-group">
                <label>Safety Filters:</label>
                <div class="checkbox-group">
                    <div class="checkbox-item">
                        <input type="checkbox" id="filterNSFW" checked>
                        <label for="filterNSFW">NSFW</label>
                    </div>
                    <div class="checkbox-item">
                        <input type="checkbox" id="filterExplicit" checked>
                        <label for="filterExplicit">Explicit</label>
                    </div>
                    <div class="checkbox-item">
                        <input type="checkbox" id="filterReligious">
                        <label for="filterReligious">Religious</label>
                    </div>
                    <div class="checkbox-item">
                        <input type="checkbox" id="filterPolitical">
                        <label for="filterPolitical">Political</label>
                    </div>
                </div>
            </div>

            <div class="control-group">
                <label for="amount">Number of Jokes:</label>
                <input type="number" id="amount" min="1" max="10" value="1">
            </div>

            <div class="button-group">
                <button class="btn-primary" onclick="getJoke()">Get Joke</button>
                <button class="btn-secondary" onclick="resetForm()">Reset</button>
            </div>
        </div>

        <div class="joke-counter">
            <span id="jokeCount">0</span> jokes loaded
        </div>
    </div>

    <script>
        let jokeCount = 0;

        function getJoke() {
            const category = document.getElementById('category').value;
            const jokeType = document.getElementById('jokeType').value;
            const language = document.getElementById('language').value;
            const amount = parseInt(document.getElementById('amount').value);

            // Build blacklist flags
            const blacklistFlags = [];
            if (document.getElementById('filterNSFW').checked) blacklistFlags.push('nsfw');
            if (document.getElementById('filterExplicit').checked) blacklistFlags.push('explicit');
            if (document.getElementById('filterReligious').checked) blacklistFlags.push('religious');
            if (document.getElementById('filterPolitical').checked) blacklistFlags.push('political');

            // Show loading
            showLoading();
            clearMessages();

            // Build API URL
            let url = 'get-joke.php?';
            url += 'category=' + encodeURIComponent(category);
            url += '&type=' + encodeURIComponent(jokeType);
            url += '&lang=' + encodeURIComponent(language);
            url += '&amount=' + amount;
            if (blacklistFlags.length > 0) {
                url += '&blacklist=' + encodeURIComponent(blacklistFlags.join(','));
            }

            // Fetch joke
            fetch(url)
                .then(response => response.json())
                .then(data => {
                    hideLoading();
                    if (data.error) {
                        showError(data.message || 'Error fetching joke');
                    } else {
                        displayJoke(data);
                        jokeCount++;
                        document.getElementById('jokeCount').textContent = jokeCount;
                        showSuccess('Joke loaded successfully!');
                    }
                })
                .catch(error => {
                    hideLoading();
                    showError('Failed to fetch joke: ' + error.message);
                });
        }

        function displayJoke(data) {
            const jokeContent = document.getElementById('jokeContent');
            const emptyState = document.getElementById('emptyState');

            emptyState.style.display = 'none';
            jokeContent.innerHTML = '';
            jokeContent.classList.add('active');

            // Handle multiple jokes
            if (data.jokes) {
                let html = '';
                data.jokes.forEach((joke, index) => {
                    html += formatJokeHTML(joke, index + 1);
                });
                jokeContent.innerHTML = html;
            } else {
                jokeContent.innerHTML = formatJokeHTML(data);
            }
        }

        function formatJokeHTML(joke, number) {
            let html = '<div style="margin-bottom: 20px;">';
            
            if (number) {
                html += '<div style="color: #999; font-size: 0.9em; margin-bottom: 10px;">Joke #' + number + '</div>';
            }

            html += '<div class="joke-type">' + (joke.category || 'General') + ' - ' + (joke.type || 'single') + '</div>';

            if (joke.type === 'twopart') {
                html += '<div class="joke-setup">' + joke.setup + '</div>';
                html += '<div class="joke-delivery">' + joke.delivery + '</div>';
            } else {
                html += '<div class="joke-text">' + joke.joke + '</div>';
            }

            html += '</div>';
            return html;
        }

        function showLoading() {
            document.getElementById('loading').classList.add('active');
            document.getElementById('jokeContent').classList.remove('active');
            document.getElementById('emptyState').style.display = 'none';
        }

        function hideLoading() {
            document.getElementById('loading').classList.remove('active');
        }

        function showError(message) {
            const errorMsg = document.getElementById('errorMessage');
            errorMsg.textContent = message;
            errorMsg.classList.add('active');
        }

        function showSuccess(message) {
            const successMsg = document.getElementById('successMessage');
            successMsg.textContent = message;
            successMsg.classList.add('active');
            setTimeout(() => {
                successMsg.classList.remove('active');
            }, 3000);
        }

        function showInfo(message) {
            const infoMsg = document.getElementById('infoMessage');
            infoMsg.textContent = message;
            infoMsg.classList.add('active');
        }

        function clearMessages() {
            document.getElementById('errorMessage').classList.remove('active');
            document.getElementById('successMessage').classList.remove('active');
            document.getElementById('infoMessage').classList.remove('active');
        }

        function resetForm() {
            document.getElementById('category').value = 'Any';
            document.getElementById('jokeType').value = '';
            document.getElementById('language').value = 'en';
            document.getElementById('amount').value = '1';
            document.getElementById('filterNSFW').checked = true;
            document.getElementById('filterExplicit').checked = true;
            document.getElementById('filterReligious').checked = false;
            document.getElementById('filterPolitical').checked = false;
            
            document.getElementById('jokeContent').classList.remove('active');
            document.getElementById('emptyState').style.display = 'block';
            clearMessages();
        }

        // Allow Enter key to get joke
        document.addEventListener('keypress', function(event) {
            if (event.key === 'Enter') {
                getJoke();
            }
        });
    </script>
</body>
</html>
