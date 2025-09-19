<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Countdown</title>
    <style>
        #countdown {
            font-size: 124px;
            font-weight: bold;
        }
    </style>
</head>
<body>
<div id="countdown"></div>

<script>
    function updateCountdown() {
        var now = new Date();
        var target = new Date(now);
        target.setHours(15);
        target.setMinutes(45);
        target.setSeconds(0);

        var diff = Math.max(target - now, 0) / 1000;
        var hours = Math.floor(diff / 3600);
        var minutes = Math.floor((diff % 3600) / 60);
        var seconds = Math.floor(diff % 60);

        document.getElementById('countdown').textContent = 'Nog: ' + hours + ' uur ' + minutes + ' minuten ' + seconds + ' seconden';
    }

    // Eerst updaten om de seconde
    updateCountdown();
    var interval = setInterval(updateCountdown, 1000);
</script>
</body>
</html>
