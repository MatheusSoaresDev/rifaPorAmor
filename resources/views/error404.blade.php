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
    <h1>Error 404</h1>
    <div class="container">
        <span class="message" id="js-whoops"></span> <span class="message" id="js-appears"></span> <span class="message" id="js-error"></span> <span class="message" id="js-apology"></span>
        <div><span class="hidden" id="js-hidden">Message Here</span></div>
    </div>
</section>

</body>

<script>
    const messages = [
        ['Oops.', 'Atenção.', 'Opa.', 'Eitaaa.', 'Ah não.', 'Lamentamos.'],
        [' '],
        ['Pagina não encontrada,', 'Esta página não existe.', 'Procuramos... mas não encontramos essa página.', 'Essa pagina não existe mais.', 'Houve um erro na busca dessa página.', 'Pagina inexistente.'],
        ['Tente novamente!', 'Confira se o link está correto!', 'Tente corrigir o link da página!']
    ];
</script>

<script src="{{ asset('js/random-messages.js') }}"></script>

</html>
