{{-- <button id="rzp-button1">Pay</button> --}}

@php
    $amount = $order->amount;
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
                    console.log('payment response', success);
                    $('#razorpay_payment_id').val(success[0].razorpay_payment_id)
                    $('#razorpay_signature').val(success[0].razorpay_signature)
                    $('#thankYouForm').submit();

                    // window.location.href = decodeURIComponent("{{ route('thank-you', ['amount' => $order->amount, 'email' => $order->notes->email, 'councellor_email' => $order->notes->councellor_email]) }}");
                    // $('#thankYouForm').submit();
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
                window.location.replace("{{ route('index')}}");
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


<form id='thankYouForm' action={{ route('thank-you') }} method='POST' hidden>
    {{ csrf_field() }}

    {{-- new cod/\ --}}
    <input type="hidden" name="order_id" id="order_id" value="{{ $order->id }}">
    <input type="hidden" name="razorpay_payment_id" id="razorpay_payment_id">
    <input type="hidden" name="razorpay_signature" id="razorpay_signature">

    {{-- <input type="text" value="{{ $order->amount / 100 }}" name="amount">
    <input type="text" value="{{ $order->notes->email }}" name="email">
    <input type="text" value="{{ $order->notes->address }}" name="address">
    <input type="text" value="{{ $order->notes->school_name }}" name="school_name">
    <input type="text" value="{{ $order->notes->councellor_email }}" name="councellor_email">
    <input type="text" value="{{ $order->notes->school_registration_annual_fee }}"
        name="school_registration_annual_fee">
    <input type="text" value="{{ $order->notes->no_of_students_paid }}" name="no_of_students_paid">
    <input type="text" value="{{ $order->notes->school_student_memebership_fee }}"
        name="school_student_memebership_fee">
    <input type="text" value="{{ $order->notes->convenience_amount }}" name="convenience_amount">
    <input type="text" value="{{ $order->notes->signature }}" name="signature">
    <input type="text" value="{{ $order->notes->transaction_date }}" name="transaction_date">
    <input type="text" value="{{ $order->notes->total }}" name="total"> --}}


    <input type='submit'>
    {{-- <button>Send</button> --}}
</form>
