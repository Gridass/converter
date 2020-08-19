@include('layouts.app')

<script>
    $.getJSON("https://www.cbr-xml-daily.ru/daily_json.js", function (data) {
        $('#UAH').text(data.Valute.UAH.Value.toFixed(2));
        $('#EUR').text(data.Valute.EUR.Value.toFixed(2));
        $('#USD').text(data.Valute.USD.Value.toFixed(2));
        $('#GBP').text(data.Valute.GBP.Value.toFixed(2));
        $('#CNY').text(data.Valute.CNY.Value.toFixed(2));
        $('#PLN').text(data.Valute.PLN.Value.toFixed(2));
    });
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

1EUR = <span id="EUR"></span> <br>
1USD = <span id="USD"></span> <br>
1UAH = <span id="UAH"></span> <br>
1GBP = <span id="GBP"></span> <br>
1CNY = <span id="CNY"></span> <br>
1PLN = <span id="PLN"></span> <br>
<script>
    window.onload = function () {
        $.getJSON("https://www.cbr-xml-daily.ru/daily_json.js", function (data) { // Получаем курс валют
            let s1 = data.Valute.USD.Value; // Получаем Доллар
            let s2 = data.Valute.EUR.Value;
            let s3 = data.Valute.UAH.Value;
            let s4 = data.Valute.GBP.Value;
            let s5 = data.Valute.CNY.Value;
            let s6 = data.Valute.PLN.Value;
            let c = {'USD': s1, 'EUR': s2, 'UAH': s3, 'GBP': s4, 'CNY': s5, 'PLN': s6, 'RUB': '1'}; // Устанавливаем курс валют

            let val = document.getElementById('val'); // Получаем элемент ввода данных
            let currency1 = document.getElementById('cur1'); // Получаем первый селект
            let currency2 = document.getElementById('cur2'); // Получаем второй селект
            let result = document.getElementsByClassName('convert_result')[0]; // Получаем поле куда будем писать результат
            function summ() { // Делаем функцию
                let z = 0;
                if (currency1.value === currency2.value) { // Если оба значения в селектах равны
                    result.innerText = val.value; // То просто вписываем данные из поля ввода
                } else {
                    if (currency1.value != 'RUB') { // Если не равны рублю, то
                        z = val.value * c[currency1.value]; // Переводим сумму в рубли
                        result.innerHTML = Math.ceil((z / c[currency2.value]) * 100) / 10; // Делим на курс и округляем до сотых
                    } else { // Если не равны
                        result.innerHTML = Math.ceil((val.value * c[currency2.value]) * 100) / 10
                        gi; // Умножаем на курс и округляем до сотых
                    }
                }
            }

            val.oninput = function () { // При вводе данных в поле вызываем функцию.
                summ();
            };
            currency1.onchange = function () { // При смене первого селекта вызываем функцию.
                summ();
            };
            currency2.onchange = function () { // При смене второго селекта вызываем функцию.
                summ();
            }

        });
    }
</script>
<div class="convert_block_item">
    <input type="number" id="val" placeholder="введите сумму..."/>
    <select id="cur1">
        <option>USD</option>
        <option>EUR</option>
        <option>UAH</option>
        <option>CNY</option>
        <option>GBP</option>
        <option>PLN</option>
    </select>
    <select id="cur2">
        <option>USD</option>
        <option>EUR</option>
        <option>CNY</option>
        <option>UAH</option>
        <option>GBP</option>
        <option>PLN</option>
    </select>
</div>

<div class="convert_block_item">
    <div class="convert_result">= 00,000</div>

</div>

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
