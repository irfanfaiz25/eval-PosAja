<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Login</title>

    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

</head>

<body>
    <section class="bg-blue-200">

        @livewire('login-form')

    </section>

    <script>
        function hideAlert() {
            var alert = document.getElementById("alert-notification")
            alert.classList.add("hidden")
        }
    </script>

</body>

</html>
