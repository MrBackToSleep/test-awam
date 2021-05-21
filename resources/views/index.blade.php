<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Calcul de taux de change</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

    <!-- Fontawesome CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">

    <!-- Jquery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>

    <style>
        .card-body > div > div {
            margin-bottom: 10px;
        }
        input.inputMoney {
            text-align: right;
            margin-bottom: auto;
        }
        select.moneySelector {
            min-width: 70px !important;
            max-width: 90px !important;
        }
    </style>
</head>
<body class="antialiased">
<div class="container">
    <div class="card mt-5">
        <div class="card-header">
            <i class="fas fa-coins mr-2"></i>
            Calcul de taux de change
        </div>
        <div class="card-body">
            <div class="row alert alert-danger d-none" id="error">
                <div class="col-12 mb-0">
                    <i class="fas fa-exclamation-triangle mr-2"></i>
                    <span id="message"></span>
                </div>
            </div>
            <div class="row d-flex justify-content-center align-items-center">
                <div class="col-12 col-md-3">
                    <div class="input-group">
                        <input type="text" min="0" class="form-control inputMoney" name="montant1" placeholder="0.00">
                        <select class="form-select moneySelector bg-light" name="devise1">
                            @foreach($devises as $devise)
                                <option value="{{$devise->code}}">{{$devise->symbole}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-12 col-md-1 text-center">
                    <span>+</span>
                </div>
                <div class="col-12 col-md-3">
                    <div class="input-group">
                        <input type="text" min="0" class="form-control inputMoney" name="montant2" placeholder="0.00">
                        <select class="form-select moneySelector bg-light" name="devise2" >
                            @foreach($devises as $devise)
                                <option value="{{$devise->code}}">{{$devise->symbole}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-12 col-md-3">
                    <input type="submit" class="btn btn-primary w-100" id="calculBtn" value="Calculer">
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-12 text-center">
                    <p>Résultat : <span id="resultat" class="h2"></span></p>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $( "#calculBtn" ).click(function() {
        let montant1 = $("input[name=montant1]")[0].value;
        let montant2 = $("input[name=montant2]")[0].value;
        let devise1  = $("select[name=devise1]")[0].value;
        let devise2  = $("select[name=devise2]")[0].value;
        $.ajax({
            url: "{{route('devises_calcul')}}",
            type: 'POST',
            data: {
                "_token": "{{ csrf_token() }}",
                'montant1': montant1,
                'montant2': montant2,
                'devise1' : devise1,
                'devise2' : devise2,
            }
        }).done(function(data) {
            if(data === 'isNaN'){
                $('#error span#message').text('Calcul impossible ! Veuillez vérifier votre saisie puis réessayez.');
                $('#error').removeClass('d-none');
            }else{
                $('#error').addClass('d-none');
                $('#resultat').text(data);
            }
        });
    });
</script>

</body>
</html>
