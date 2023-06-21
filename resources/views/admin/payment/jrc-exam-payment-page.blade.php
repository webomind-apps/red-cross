{{-- <button id="rzp-button1">Pay</button> --}}

@php
    $amount = $order->amount;
    // dd('hi');
@endphp
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" referrerpolicy="no-referrer"></script>
<script>
    var options = {
        "key": "rzp_live_E8hpT2UELTssWx", // Enter the Key ID generated from the Dashboard
        "amount": "{{ $amount }}", // Amount is in currency subunits. Default currency is INR. Hence, 50000 refers to 50000 paise
        "currency": "{{ $order->currency }}",
        "name": "Red Cross",
        "description": "Red Cross Payments",
        "order_id": "{{ $order->id }}", //This is a sample Order ID. Pass the `id` obtained in the response of Step 1
        "handler": function(response) {
            $.ajax({
                url: '{{ route('jrc-exam-payment-success') }}',
                type: 'get',
                dataType: 'json',
                data: {
                    razorpay_payment_id: response.razorpay_payment_id,
                    razorpay_order_id: response.razorpay_order_id,
                    razorpay_signature: response.razorpay_signature,
                    order_id: "{{ $order->id }}",
                },
                success: function(success) {
                    console.log('payment response', success);
                    $('#razorpay_payment_id').val(success[0].razorpay_payment_id)
                    $('#razorpay_signature').val(success[0].razorpay_signature)
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
        "modal": {
            "ondismiss": function() {
                window.location.replace("{{ route('jrc-exam-form')}}");
                // alert('cancelled');
            }
        }

    };
    var rzp1 = new Razorpay(options);

    rzp1.on('payment.failed', function(response) {
        // console.log('response failed', response);
        // alert('payment failed');
        window.location.replace("{{ route('payment-failed')}}");
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


<form id='thankYouForm' action={{ route('jrc-thank-you') }} method='POST' hidden>
    {{ csrf_field() }}
    {{-- new cod/\ --}}
    <input type="hidden" name="order_id" id="order_id" value="{{ $order->id }}">
    <input type="hidden" name="razorpay_payment_id" id="razorpay_payment_id">
    <input type="hidden" name="razorpay_signature" id="razorpay_signature">
    <input type='submit'>
</form>


