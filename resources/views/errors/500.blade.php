<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>500 - Internal Server Error</title>
    <!-- ربط ملف الـ CSS -->
    <link href="{{ asset('assets/css/500-page.css') }}" rel="stylesheet">
</head>
<body class="loading">
    <h1>500</h1>
    <h2>Unexpected Error <b>:(</b></h2>
    
    <div class="gears">
        <div class="gear one">
            <div class="bar"></div>
            <div class="bar"></div>
            <div class="bar"></div>
        </div>
        <div class="gear two">
            <div class="bar"></div>
            <div class="bar"></div>
            <div class="bar"></div>
        </div>
        <div class="gear three">
            <div class="bar"></div>
            <div class="bar"></div>
            <div class="bar"></div>
        </div>
    </div>

    <!-- ربط ملف الـ JavaScript -->
    <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
    <script src="{{ asset('assets/500-page/main.js') }}" type="text/javascript"></script>
</body>
</html>