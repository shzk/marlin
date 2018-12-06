<html>
<head>
    <title><?=$this->e($title)?></title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
</head>
<body>
<ul>
    <li><a href="/home">Home</a></li>
    <li><a href="/about">About</a></li>
</ul>
<?=$this->section('content')?>

</body>
</html>