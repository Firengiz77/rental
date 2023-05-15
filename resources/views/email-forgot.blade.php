<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Email</title>
</head>
<body>

    <h1 style="font-weight:700">RentAl-a Xoş Gəlmisiniz</h1>
    <h2>Şifrənizi unutmusunuzsa aşağıdakı linkə keçid edərək şifrənizi yeniləyə bilərsiniz </h2>
    <h4 >{!! $body !!}</h4>
    <a href="{{$action_link}}" style="text-decoration: none">Reset Password</a>

    <blockquote style="color: rgb(238, 31, 31)">QEYD: Əgər bu siz deyilsinizsə,Linkə keçid etməyin</blockquote>
    
</body>
</html>