<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Document</title>
</head>

<body>
    <div class="wrapper">
        <div class="row">
            <div class="col-sm-5 mx-auto">
                <div class="card">
                    <div class="card-body mx-auto">
                        <h5 class="card-title">Autenticar o Aplicativo</h5>
                        <p class="card-text">Está função é utilizada para autenticar o aplicativo na loja de venda.</p>
                        <button id="btn-autenticar" class="btn btn-primary btn-block">Autenticar</button>
                        <div class="col mt-3 w-100 p-0">
                            <div class="input-group">
                                <div class="col">
                                    <div class="form-check mx-auto">
                                        <input class="form-check-input" type="radio" name="exampleRadios" id="radioHomologacao" value="option1" checked>
                                        <label class="form-check-label" for="exampleRadios1">
                                            Homologação
                                        </label>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-check mx-auto">
                                        <input class="form-check-input" type="radio" name="exampleRadios" id="radioProducao" value="option2">
                                        <label class="form-check-label" for="exampleRadios2">
                                            Produção
                                        </label>
                                    </div>
                                </div>     
                            </div>
                            <div class="input-group mt-3">
                                <input type="text" class="form-control" id="link-url" placeholder="URL de Autenticação" aria-describedby="inputGroupPrepend2" required>
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroupPrepend2">
                                        <button class="btn btn-primary btn-block">
                                            Copiar
                                        </button>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous">
    </script>

    <script type="text/javascript">
        $("#btn-autenticar").on("click", function() {

            if($("#radioHomologacao").prop("checked")){
                alert('Homologacao');
            }else{
                alert('Producao');
            }

            $.ajax({
                url: './controller/controller_shopee.php',
                type: 'post',
                success: function(result) {
                    $("#link-url:text").val(result);
                    window.open(result, 'janela', 'width=1000, height=600, top=250, left=699, scrollbars=yes, status=no, toolbar=no, location=no, directories=no, menubar=no, resizable=no, fullscreen=no');
                },
                error: function(e, ts, et) {
                    console.log(ts.responseText);
                }
            });
        })
    </script>
</body>

</html>