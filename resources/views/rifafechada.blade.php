<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Ooooops!</title>

    <link href="https://fonts.googleapis.com/css?family=Montserrat:200,400,700" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="{{ asset('css/rifa-fechada-style.css') }}" />
</head>

<body>

<section class="centered">
    <h1>Oooooooops!!!</h1>
    <div class="container">
        <span class="message" id="js-whoops"></span> <span class="message" id="js-appears"></span> <span class="message" id="js-error"></span> <span class="message" id="js-apology"></span>
        <div><span class="hidden" id="js-hidden">Message Here</span></div>
    </div>
</section>

</body>

<script>
    const messages = [
        ['Oops.', 'Foi mal.', 'Perdoe-nos.', 'Ah não.', 'Hm...', 'Lamentamos.', 'Opa!'],
        ['Infelizmente,', 'Parece que'],
        ['esta rifa foi fechada.', 'fechamos esta rifa.', 'encerramos essa rifa.', 'esta rifa encontra-se fechada.', 'esta rifa encontra-se encerrada.', 'esta rifa fechou.'],
        ['Desculpe!', 'Tente na próxima!', 'Não nos abandone!', 'Obrigado!', 'Volte sempre!', 'Até mais!']
    ];
</script>

<script src="{{ asset('js/random-messages.js') }}"></script>

</html>
