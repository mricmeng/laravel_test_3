@extends('layouts.app')

@section('content')
    <h2>Scan KHQR</h2>

    <p>
        <strong>{{$product->name}}</strong>
        <span>${{ number_format($product->price, 2)}}</span>
    </p>

    @if ($qr)
        <div>
            {!! QrCode::size(220)->generate($qr) !!}
        </div>  
    @else
        <div>
            Failed to Generate QR
        </div>
    @endif

    <div>
        <div id="countdown">120</div>
        <small>
            Expire in <span id="seconds">120</span>
        </small>

        <a href="{{route('home')}}">
            back
        </a>
    </div>

    <script>
        let timeLeft = 120;

        const countdownElement = document.getElementById('countdown');
        const secondsText = document.getElementById('seconds');

        const timer = setInterval(() => {
            timeLeft--;

            countdownElement.textContent = timeLeft;
            secondsText.textContent = timeLeft;

            if(timeLeft > 0){
                fetch("{{ route('verify.transaction') }}",{
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json",
                        "X-CSRF-TOKEN": "{{ csrf_token() }}"
                    },
                    body: JSON.stringify({
                        md5: "{{$md5}}"
                    })
                })
                .then(res => res.json())
                .then(data => {
                    if(data.responseCode === 0){
                        clearInterval(timer);
                        alert("Transaction successful!");
                        window.location.href = "{{ route('home') }}";
                    }else if(data.failed){
                        clearInterval(timer);
                        alert("Transaction failed. please try again.");
                        window.location.href = "{{ route('home')}}";
                    }
                })
                .catch(error => {
                    console.error("Error:", error);
                })
            }

            if(timeLeft <= 0){
                clearInterval(timer);
                alert('QR expired.');
                window.location.href = "{{ route('home') }}"
            }
        }, 1000);
    </script>
@endsection