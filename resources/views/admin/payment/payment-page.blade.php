{{-- <button id="rzp-button1">Pay</button> --}}

@php
    // dd($order);
    $amount = $order->amount;
    
@endphp
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" referrerpolicy="no-referrer"></script>
<script>
    var options = {
        "key": "rzp_test_AEKYB9rRlafhix", // Enter the Key ID generated from the Dashboard
        "amount": "{{ $amount }}", // Amount is in currency subunits. Default currency is INR. Hence, 50000 refers to 50000 paise
        "currency": "{{ $order->currency }}",
        "name": "Red Cross",
        "description": "Red Cross Payments",
        // "image": "https://example.com/your_logo",
        "order_id": "{{ $order->id }}", //This is a sample Order ID. Pass the `id` obtained in the response of Step 1
        "handler": function(response) {
            // alert(response.razorpay_payment_id);
            // alert(response.razorpay_order_id);
            // alert(response.razorpay_signature)

            // if (typeof response.razorpay_payment_id == 'undefined' || response.razorpay_payment_id < 1) {
            //     redirect_url = '{{ route('thank-you') }}';
            // } else {
            //     redirect_url = '{{ route('thank-you') }}';
            // }
            // location.href = redirect_url;

            $.ajax({
                url: '{{ route('payment-success') }}',
                type: 'get',
                dataType: 'json',
                data: {
                    razorpay_payment_id: response.razorpay_payment_id,
                    razorpay_order_id: response.razorpay_order_id,
                    razorpay_signature: response.razorpay_signature,
                    order_id: "{{ $order->id }}",

                },
                success: function(success) {
                    console.log(success);
                    // window.location.href = decodeURIComponent("{{ route('thank-you', ['amount' => $order->amount, 'email' => $order->notes->email, 'councellor_email' => $order->notes->councellor_email]) }}");
                    $('#thankYouForm').attr('validated', true);
                    $('#thankYouForm').submit();
                }
            });
        },
        "prefill": {
            "name": "{{ $order->notes->school_name }}",
            "email": "{{ $order->notes->email }}",
            "contact": "{{ $order->notes->phone_number }}"
        },
        "notes": {
            "address": "{{ $order->notes->address }}"
        },
        "theme": {
            "color": "#3399cc"
        },

    };
    var rzp1 = new Razorpay(options);

    rzp1.on('payment.failed', function(response) {
        console.log('response', response);
        // alert(response.error.code);
        // alert(response.error.description);
        // alert(response.error.source);
        // alert(response.error.step);
        // alert(response.error.reason);
        // alert(response.error.metadata.order_id);
        // alert(response.error.metadata.payment_id);
    });

    window.addEventListener('DOMContentLoaded', function() {
        rzp1.open();
        // console.log('page loaded');
        document.getElementById('rzp-button1').onclick = function(e) {
            rzp1.open();
            e.preventDefault();
        }
    }, true);
</script>


<form id='thankYouForm' action={{ route('thank-you') }} method='GET' style="display: none">
    <input type="text" value="{{ $order->amount/100 }}" name="amount">
    <input type="text" value="{{ $order->notes->email }}" name="email">
    <input type="text" value="{{ $order->notes->councellor_email }}" name="councellor_email">
    <input type='submit' id='thankYouForm'>
    <button>Send</button>
</form>
