<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Upload de arquivos com PHP</title>
 
    <!-- CDN Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
        integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u"
        crossorigin="anonymous">
    </head>
    <body>
      <div class="container">
        <h1 class="text-center">Formulário de Upload de Arquivos</h1>
 
        <form name="form" action="back.php" method="post" enctype="multipart/form-data">
           <input type="hidden" name="enviou" value="1">
           Arquivo PDF:<br>
           <input type="file" name="arquivo">
           <br><br>
           <input type="submit" class="btn btn-primary" value="Enviar">
        </form>
      </div>
    </body>
</html>