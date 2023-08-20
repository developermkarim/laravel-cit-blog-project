<!DOCTYPE html>
<html lang="en">
<head>
    <title>Email</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<body>
<div class="container">
    <div class="row">
        <h2>{{ $subject }}</h2>
        <p>{!! $body !!}</p>
    </div>
</div>
   
</body>
</html>