<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Simplex PT-1</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    
    <style>
        body
        {
            background-image: url('back.jpeg');
            background-size: cover;
        }
    </style>
</head>
<body>
        <br><br><br>
        <br><br><br>
    <div class="col-md-3 mx-auto text-center card">
        
        <div class="card-body">
            <form action="gerar.php" method="GET">
                Quantidade de X: <input type="number" name="qtd_x" class="form-control">
                <br>
                Quantidade de F: <input type="number" name="qtd_f" class="form-control">
                <br>
                <button type="submit" class="btn btn-primary form-control">SALVAR</button>
            </form>
        </div>

    </div>
</body>
</html>