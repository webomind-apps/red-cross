@extends('admin.layout.master')

@section('page-contents')
    <!-- /.container-fluid -->
    <div class="container-fluid">

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header d-flex justify-content-between py-3">
                <h6 class="my-auto font-weight-bold text-primary">Add Your Payment Details</h6>
                <!-- <a href="add-payment.html" class="btn btn-primary btn-icon-split">
                                                                                            <span class="icon text-white-50">
                                                                                                <i class="fas fa-plus"></i>
                                                                                            </span>
                                                                                            <span class="text">Update</span>
                                                                                        </a> -->
            </div>
            <div class="card-body">
                <form action="{{ route('admin.school-registration-payment.store') }}" method="POST">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputEmail4">Dise No</label>
                            <input type="text" class="form-control" id="dise_code" name="dise_code" placeholder="Dise No"
                                required>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="inputAddress">School type</label>
                            <select name="school_type" id="school_type" aria-label="Default select example"
                                class="custom-select custom-select-sm form-control form-control-sm" required>
                                <option selected>--Select School type--</option>
                                <option value="0">Government</option>
                                <option value="1">Private</option>
                                <option value="2">Aided</option>
                            </select>
                        </div>
                        <div class="col-lg-4">
                            <div class="input-group">
                                <input type="text" name="id" id="id" class="input" hidden>

                            </div>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <label for="inputPassword4">School Name</label>
                            <input type="text" class="form-control" id="school_name" name="school_name"
                                placeholder="School Name">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="inputAddress">District</label>
                            <input type="text" class="form-control" id="district" name="district"
                                placeholder="District">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="inputAddress2">Taluk</label>
                            <input type="text" class="form-control" id="taluk" name="taluk" placeholder="Taluk">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="inputAddress">Pin Code</label>
                            <input type="text" class="form-control" id="pin_code" name="pin_code"
                                placeholder="Pin Code">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputAddress2">Phone No</label>
                            <input type="number" class="form-control" id="phone_number" name="phone_number"
                                placeholder="Phone No">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputAddress">Mail Id</label>
                            <input type="text" class="form-control" id="email" name="email" placeholder="Mail Id">
                        </div>
                        <div class="form-group col-md-12">
                            <label for="inputAddress">Address</label>
                            <input type="text" class="form-control" id="address" name="address" placeholder="Address">
                        </div>
                    </div>
                    <label for="inputAddress2">JRC counselor details</label>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="inputAddress">Name</label>
                            <input type="text" class="form-control" id="councellor_name" name="councellor_name"
                                placeholder="Name" required>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputAddress2">Phone No</label>
                            <input type="number" class="form-control" id="councellor_phone" name="councellor_phone"
                                placeholder="Phone No" required>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputAddress2">Email</label>
                            <input type="text" class="form-control" id="councellor_email" name="councellor_email"
                                placeholder="Email" required>
                        </div>
                    </div>
                    <label for="inputAddress2">Student payment details</label>
                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <label for="inputEmail4">8th Student</label>
                            <input type="number" class="form-control" id="no_of_students_class_eight"
                                name="no_of_students_class_eight" onkeyup="total_no_students();"
                                placeholder="No. of students" required>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="inputPassword4">9th Student</label>
                            <input type="number" class="form-control" id="no_of_students_class_nine"
                                name="no_of_students_class_nine" onkeyup="total_no_students();"
                                placeholder="No. of students" required>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="inputAddress">10th Student</label>
                            <input type="number" class="form-control" id="no_of_students_class_ten"
                                name="no_of_students_class_ten" onkeyup="total_no_students();"
                                placeholder="No. of students" required>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="inputAddress2">Total Student</label>
                            <input type="number" class="form-control" id="total_students" name="total_students"
                                placeholder="Total no. of students" required>
                        </div>

                        <div class="form-group col-md-4">
                            <label for="inputPassword4">School registration annual fee</label>
                            <input type="number" class="form-control" id="school_registration_annual_fee"
                                name="school_registration_annual_fee" placeholder="School registration annual fee">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputAddress">Student membership fee</label>
                            <input type="number" class="form-control" id="school_student_memebership_fee"
                                name="school_student_memebership_fee" placeholder="Student membership fee">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputAddress">Number of students paid</label>
                            <input type="number" class="form-control" id="no_of_students_paid"
                                name="no_of_students_paid" placeholder="Number of students paid" required>
                        </div>
                    </div>

                    <div class="form-row">
                        {{-- <label class="pt-1 text-danger fw-bold">2020 - 2021</label> --}}

                        <div class="col-lg-1 text-center my-auto check-mark">
                            <label class="inputAddress2"> {{ $year ? $year->name : '' }}
                            </label>
                            <input type="checkbox" name="year[]" id="current_year" class="largerCheckbox"
                                value={{ $year ? $year->id : '' }} checked>
                        </div>

                        <div class="form-group col-md-2" id="paid" style="display: none">
                            <div class="input-group">
                                {{-- <label class="user-label">Total fees(₹)</label> --}}
                                <input type="number" name="total_fees_bal[]" id="total_fees_bal" class="form-control"
                                    placeholder="Total fees">
                                <h6>Total students* student memebership fee + school registration fee
                                </h6>

                            </div>
                        </div>
                        <div class="form-group col-md-2" id="total_amount_paid" style="display: none">
                            <div class="input-group">
                                {{-- <label class="user-label">Total fees paid(₹)</label> --}}
                                <input type="number" name="total_amount_paid[]" id="total_amount_paid_now"
                                    class="form-control" placeholder="Total fees paid">

                            </div>
                        </div>

                        <div class="form-group col-md-2">
                            <div class="input-group">
                                <input required="" type="number" name="total_fees[]" id="total_fees"
                                    autocomplete="off" class="form-control" placeholder="Total fees to be paid">
                            </div>
                        </div>

                        <div class="form-group col-md-2">
                            <div class="input-group">
                                <input required="" type="number" name="paid_amount[]" id="paid_amount"
                                    autocomplete="off" class="form-control paid_amount" placeholder="Amount paying now">
                            </div>
                        </div>
                        <div class="form-group col-md-2">
                            <div class="input-group">
                                <input required="" type="number" name="balance_amount[]" id="balance_amount"
                                    autocomplete="off" class="form-control" placeholder="Balance to be paid">
                            </div>
                        </div>

                        <input type="number" name="current_year" id="current_year" hidden
                            value="{{ $year ? $year->id : '' }}" autocomplete="off" class="input">
                    </div>
                    <div id="previous"></div>

                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="inputAddress">Total</label>
                            <input type="text" class="form-control" id="total" name="total"
                                placeholder="Total">
                        </div>
                        <input type="text" class="form-control" id="convenience" name="convenience"
                            placeholder="Convenience" hidden>
                        <div class="form-group col-md-4">
                            <label for="inputAddress2">Convenience</label>
                            <input type="text" class="form-control" id="convenience_amount" name="convenience_amount"
                                placeholder="Convenience">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputAddress2">Total to be paid</label>
                            <input type="text" class="form-control" id="total_to_be_paid" name="total_to_be_paid"
                                placeholder="Total to be paid">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="inputAddress">Payment Metod</label>
                            <select name="mode_of_payment" id="mode_of_payment" aria-label="Default select example"
                                class="custom-select custom-select-sm form-control form-control-sm" required>
                                <option selected>Mode Of Payment</option>
                                <option value="1">Demand Draft</option>
                                <option value="2">Cheque</option>
                                <option value="3">NEFT</option>
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputAddress">Cheque/DD/NEFT No.</label>
                            <input type="text" class="form-control" id="payment_method" name="payment_method"
                                placeholder="Cheque/DD/NEFT No.">
                        </div>

                        <div class="form-group col-md-4">
                            <label for="inputAddress">Transaction Date</label>
                            <input type="date" class="form-control" id="transaction_date" name="transaction_date"
                                placeholder="Transaction Date">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary mt-3">
                        <span class="text">Add</span>
                    </button>
                </form>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
@endsection

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" referrerpolicy="no-referrer"></script>

<script>
    //fill the form when dise number filled
    $(document).ready(function() {
        $('#dise_code').on('change', function() {
            let dise = $('#dise_code').val();
            var url = "{{ url('data') }}";
            $.ajax({
                type: "GET",
                url: url,
                data: {
                    dise
                },
                dataType: "json",
                success: function(answer) {
                    // console.log(answer.dise_code);
                    if (answer.dise_code != dise) {
                        alert('enter valid dise code');
                    }
                    $('#id').val(answer['id']);
                    $('#school_name').val(answer['school_name']);
                    $('#district').val(answer['district']);
                    $('#taluk').val(answer['taluk']);
                    $('#pin_code').val(answer['pin_code']);
                    $('#phone_number').val(answer['phone_number']);
                    $('#email').val(answer['email']);
                    $('#address').val(answer['address']);
                    $('#councellor_name').val(answer['councellor_name']);
                    $('#councellor_email').val(answer['councellor_email']);
                    $('#councellor_phone').val(answer['councellor_phone']);
                },
            });
        });
    });

    $(document).ready(function() {
        $('#dise_code').on('change', function() {
            var url = "{{ url('master-price-data') }}";
            $.ajax({
                type: "GET",
                url: url,
                dataType: "json",
                success: function(answer) {
                    // console.log('2', answer);
                    $('#school_registration_annual_fee').val(answer[
                        'school_registration_annual_fee']);
                    $('#school_student_memebership_fee').val(answer[
                        'school_student_memebership_fee']);
                    $('#convenience').val(answer[
                        'convenience']);
                },
            });
        });
    });

    //calculate total number of students 
    window.total_no_students = function total_no_students() {
        var class8 = document.getElementById('no_of_students_class_eight').value || 0;
        var class9 = document.getElementById('no_of_students_class_nine').value || 0;
        var class10 = document.getElementById('no_of_students_class_ten').value || 0;
        var total_no_students = parseInt(class8) + parseInt(class9) + parseInt(class10);
        document.getElementById('total_students').value = total_no_students;

        var school_student_memebership_fee = document.getElementById(
            'school_student_memebership_fee').value || 0;
        var school_registration_annual_fee = document.getElementById(
            'school_registration_annual_fee').value || 0;

        var total_fees = parseInt(total_no_students) * parseInt(school_student_memebership_fee) + parseInt(
            school_registration_annual_fee);
        document.getElementById('total_fees').value = total_fees;

    };

    //calculate amount beign paid
    $(document).ready(function() {
        $('#no_of_students_paid').on('change', function() {
            var no_of_students_paid = document.getElementById('no_of_students_paid').value || 0;
            var school_student_memebership_fee = document.getElementById(
                'school_student_memebership_fee').value || 0;
            var school_registration_annual_fee = document.getElementById(
                'school_registration_annual_fee').value || 0;

            var paid_amount = parseInt(no_of_students_paid) * parseInt(school_student_memebership_fee) +
                parseInt(school_registration_annual_fee);
            document.getElementById('paid_amount').value = paid_amount;

            var total_fees = document.getElementById('total_fees').value;

            var balance_amount = total_fees - paid_amount;
            document.getElementById('balance_amount').value = balance_amount;

        });
    });

    $(document).ready(function() {
        $('#dise_code').on('change', function() {
            let dise = $('#dise_code').val();
            var url = "{{ url('previous-years-data') }}";
            $.ajax({
                type: "GET",
                url: url,
                data: {
                    dise
                },
                dataType: "json",
                success: function(answer) {

                    // console.log('3', answer);

                    var financial_years = answer.financial_years;
                    var balance = answer.balance;
                    var school_data = answer.school_data;
                    var students_data = answer.students_data;
                    var payment_data = answer.payment_data;
                    console.log('financial_years', financial_years);


                    $('#total_fees_bal').val(balance?.total_amount)
                    $('#total_amount_paid_now').val(balance?.amount_to_be_paid)

                    $('#total_fees').val(balance?.balance)
                    $('#no_of_students_class_eight').val(school_data
                        ?.no_of_students_class_eight)
                    $('#no_of_students_class_nine').val(school_data
                        ?.no_of_students_class_nine)
                    $('#no_of_students_class_ten').val(school_data
                        ?.no_of_students_class_ten)
                    $('#total_students').val(school_data?.total_students)
                    $('#no_of_students_paid').val(school_data?.no_of_students_paid)
                    $('#no_of_students_paid').val(school_data?.no_of_students_paid)


                    if (balance) {
                        var paid = document.getElementById('paid');
                        var total_amount_paid = document.getElementById(
                            'total_amount_paid');
                        paid.style.display = "block";
                        total_amount_paid.style.display = "block";
                    }

                    var htm = '';

                    for (i = 0; i < financial_years.length; i++) {
                        if (financial_years[i].balances.length > 0 && financial_years[i]
                            .status == 0) {
                            console.log('here', financial_years[i].registration_fees);
                            // console.log('students_data',students_data[i]);
                            var name = financial_years[i].name
                            var year_id = financial_years[i].id;
                            var paid_amount = financial_years[i].balances[0]?.paid_amount;
                            var balance = financial_years[i].balances[0]?.balance;
                            var total_amount = financial_years[i].balances[0]?.total_amount;
                            var total_amount_paid = financial_years[i].balances[0]
                                ?.amount_to_be_paid;

                            var no_of_students_class_eight = students_data[i].registrations[
                                0]?.no_of_students_class_eight;
                            var no_of_students_class_nine = students_data[i].registrations[
                                0]?.no_of_students_class_nine;
                            var no_of_students_class_ten = students_data[i].registrations[0]
                                ?.no_of_students_class_ten;
                            var total_students = students_data[i].registrations[0]
                                ?.total_students;
                            var school_registration_annual_fee = students_data[i]
                                .registrations[0]?.school_registration_annual_fee;
                            var school_student_memebership_fee = students_data[i]
                                .registrations[0]?.school_student_memebership_fee;


                            var previous_paid_amount = financial_years[i].registration_fees[
                                0].paid_amount;
                            var paid_on = financial_years[i].registration_fees[0]
                                .created_at;


                            htm += `<div class="col-lg-12">
                                    <div class="row" id=row-` + i + `>
                                        
                                        <label for="inputAddress2">${name}</label>
                                        <div class="col-lg-1 text-center my-auto check-mark">
                                            <input type="checkbox" name="year[]" id="year` + i + `"
                                                class="largerCheckbox" value=${year_id} >   
                                        </div>  

                                        <div class="form-group col-md-2">
                                            <label for="inputAddress2">total fees</label>
                                                <input type="number" name="total_fees_bal[]"
                                                    id="total_fees_bal-` + i + `" autocomplete="off" class="form-control"
                                                    value=${total_amount}>
                                                    <h6>${total_students} students*  ${school_student_memebership_fee} (student memebership fee) +  ${school_registration_annual_fee} (school registration fee)</h6>

                                        </div>
                                        <div class="form-group col-md-2">
                                            <label for="inputAddress2">total paid fees</label>
                                                <input type="number" name="total_fees_bal[]"
                                                    id="total_fees_bal-` + i + `" autocomplete="off" class="form-control"
                                                    value=${total_amount_paid}>`;

                            for (j = 0; j < financial_years[i].registration_fees
                                .length; j++) {
                                var previous_paid_amount = financial_years[i]
                                    .registration_fees[j].paid_amount;
                                var paid_on = financial_years[i].registration_fees[j]
                                    .created_at;
                                htm +=
                                    `<h6>Payment ${j+1} - ${previous_paid_amount} paid on ${paid_on}</h6>`;
                            }

                            htm += `</div>                                          
                                            <div class="form-group col-md-2">                                               
                                                    <label class="user-label">Balance(₹)</label>
                                                    <input type="number" name="total_fees[]"
                                                        id="total_fees-` + i + `" autocomplete="off" class="form-control"
                                                        value=${balance}>                                                
                                            </div>
                                            <div class="form-group col-md-2">
                                                
                                                    <label class="user-label">Amount paying now(₹)</label>
                                                    <input  type="number" name="paid_amount[]"
                                                        id="paid_amount-` + i + `" autocomplete="off"  class="form-control paid_amount">                                               
                                            </div>
                                            <div class="form-group col-md-2">
                                               
                                                    <label class="user-label">Balance to be paid(₹)</label>
                                                    <input type="number" name="balance_amount[]"
                                                        id="balance_amount-` + i + `" autocomplete="off" class="form-control" value="">
                                                   
                                               
                                            </div>
                                            <input type="number" name="previous_financial_year[]"
                                                id="previous_financial_year-` + i + `" autocomplete="off" class="form-control"
                                                    value=${year_id} hidden>
                                        </div>
                                    </div> `;
                        }
                    }
                    $('#previous').html("");
                    $('#previous').append(htm);

                },
            });
        });
    });

    $(document).on('change', '.paid_amount', function() {
        calculateTotal()

    });
    $(document).on('change', '#paid_amount', function() {
        calculateBalance()

    });

    $(document).on('change', '#no_of_students_paid', function() {
        calculateTotal()

    });
</script>

<script>
    function calculateBalance() {
        var total_fees = $('#total_fees').val();
        var paid_amount = $('#paid_amount').val();
        var balance = total_fees - paid_amount;
        $('#balance_amount').val(balance);
    }

    function calculateTotal() {
        // alert('changed')
        var total1 = 0;
        var total = 0;

        $('.paid_amount').each(function() {


            var val = $(this).val();

            var id = $(this).attr('id');
            var index = id.split("-")[1];

            if (val != '') {
                var total_fees = '#total_fees-' + index;
                var paid_fees = val;
                var balance_fees = '#balance_amount-' + index;

                var balance = $(total_fees).val() - paid_fees;
                $(balance_fees).val(balance)
                // console.log('value', balance);
                total1 = total1 + parseInt(val);

                $('#total').val(total1);
            }
        })

        var convenience = $('#convenience').val();
        // console.log('convenience', convenience);
        var convenience_amount = Math.ceil((convenience / 100) * total1)

        $('#convenience_amount').val(convenience_amount);

        var total_to_be_paid = parseInt(total1 + convenience_amount);
        console.log('convenience_amount', convenience_amount);
        console.log('total1', total1);

        $('#total_to_be_paid').val(total_to_be_paid);

    }
</script>
