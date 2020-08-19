@include('layouts.app')

<div class="container">
    <script>
        $.getJSON("https://www.cbr-xml-daily.ru/daily_json.js", function(data) {
            $('#EUR').text(data.Valute.EUR.Value.toFixed(2));
            $('#USD').text(data.Valute.USD.Value.toFixed(2));
        });

    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    Курс:<br>
    €1 = <span id="EUR"></span> <br>
    $1 = <span id="USD"></span> <br>
{{--    <p>--}}
{{--    <div id="informer-calc">курсы валют</div>--}}

{{--    <script>var iframe = '<ifra'+'me width="200" height="112" fram'+'eborder="0" src="https://informer.minfin.com.ua/gen/calc/nbu/?color=yellow" vspace="0" scrolling="no" hspace="0" allowtransparency="true"style="width:200px;height:112px;ove'+'rflow:hidden;"></iframe>';--}}
{{--    var cl = 'informer-calc';--}}
{{--    document.getElementById(cl).innerHTML = iframe;--}}
{{--    </script>--}}




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
