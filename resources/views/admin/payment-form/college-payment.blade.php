<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="text/html; charset=utf-8" http-equiv="Content-Type">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Red Cross</title>
</head>

{{-- {{dd($request)}} --}}

<body style="margin:0;padding:0;background-color:#FFF">
    <center>
        <table align="center" border="0" cellpadding="0" cellspacing="0" id="bodyTable" width="100%"
            style="border-collapse:collapse;mso-table-lspace:0;mso-table-rspace:0;padding:0;background-color:#FFF;height:99px;margin:0;width:100%">
            <tbody>
                <tr>


                    <th valign="top" width="100%" class="kmTextContent">

                        <h5
                            style="text-align: center; padding-left: 24px; font-size: 17px;font-family:Helvetica, Arial; font-weight: 400; color:#FF1414">
                            REDCROSS PAYMENT DETAILS - {{ $current_year }}</h5>
                        <p
                            style="text-align: left; padding-left: 18px; font-size: 17px;font-family:Helvetica, Arial; font-weight: 400;">
                            Receipt no. : <b>{{ $receipt_no }}</b>
                        </p>
                        <p
                            style="text-align: left; padding-left: 18px; font-size: 17px;font-family:Helvetica, Arial; font-weight: 400;">
                            Dise code/College code : <b>{{ $request->dise_code }}</b>
                        </p>
                        <p
                            style="text-align: left; padding-left: 18px; font-size: 17px;font-family:Helvetica, Arial; font-weight: 400;">
                            College name : <b>{{ $request->college_name }}</b>
                        </p>
                        <p
                            style="text-align: left; padding-left: 18px; font-size: 17px;font-family:Helvetica, Arial; font-weight: 400;">
                            District : <b>{{ $request->district }}</b>
                        </p>
                        <p
                            style="text-align: left; padding-left: 18px; font-size: 17px;font-family:Helvetica, Arial; font-weight: 400;">
                            Taluk : <b>{{ $request->taluk }}</b>
                        </p>
                        <p
                            style="text-align: left; padding-left: 18px; font-size: 17px;font-family:Helvetica, Arial; font-weight: 400;">
                            Pin code : <b>{{ $request->pin_code }}</b>
                        </p>
                        <p
                            style="text-align: left; padding-left: 18px; font-size: 17px;font-family:Helvetica, Arial; font-weight: 400;">
                            Phone Number : <b>{{ $request->phone_number }}</b>
                        </p>
                        <p
                            style="text-align: left; padding-left: 18px; font-size: 17px;font-family:Helvetica, Arial; font-weight: 400;">
                            Email : <b>{{ $request->email }}</b>
                        </p>
                        <p
                            style="text-align: left; padding-left: 18px; font-size: 17px;font-family:Helvetica, Arial; font-weight: 400;">
                            Address : <b>{{ $request->address }}</b>
                        </p>
                        <p
                            style="text-align: left; padding-left: 18px; font-size: 17px;font-family:Helvetica, Arial; font-weight: 400;">
                            Councellor Name : <b>{{ $request->councellor_name }}</b>
                        </p>
                        <p
                            style="text-align: left; padding-left: 18px; font-size: 17px;font-family:Helvetica, Arial; font-weight: 400;">
                            Councellor Email : <b>{{ $request->councellor_email }}</b>
                        </p>
                        <p
                            style="text-align: left; padding-left: 18px; font-size: 17px;font-family:Helvetica, Arial; font-weight: 400;">
                            Councellor Phone : <b>{{ $request->councellor_phone }}</b>
                        </p>

                        <p
                            style="text-align: left; padding-left: 18px; font-size: 17px;font-family:Helvetica, Arial; font-weight: 400;">
                            No. of students in 1st PUC : <b>{{ $request->no_of_students_first_puc }}</b>
                        </p>
                        <p
                            style="text-align: left; padding-left: 18px; font-size: 17px;font-family:Helvetica, Arial; font-weight: 400;">
                            No. of students in 2nd PUC : <b>{{ $request->no_of_students_second_puc }}</b>
                        </p>

                        <p
                            style="text-align: left; padding-left: 18px; font-size: 17px;font-family:Helvetica, Arial; font-weight: 400;">
                            Total No. of Students : <b>{{ $request->total_students }}</b>
                        </p>
                        <p
                            style="text-align: left; padding-left: 18px; font-size: 17px;font-family:Helvetica, Arial; font-weight: 400;">
                            School registration annual fee : <b>{{ $request->college_registration_annual_fee }}</b>
                        </p>
                        <p
                            style="text-align: left; padding-left: 18px; font-size: 17px;font-family:Helvetica, Arial; font-weight: 400;">
                            Student membership fee : <b>{{ $request->college_student_memebership_fee }}</b>
                        </p>
                        <p
                            style="text-align: left; padding-left: 18px; font-size: 17px;font-family:Helvetica, Arial; font-weight: 400;">
                            No. of students paid : <b>{{ $request->no_of_students_paid }}</b>
                        </p>
                        <p
                            style="text-align: left; padding-left: 18px; font-size: 17px;font-family:Helvetica, Arial; font-weight: 400;">
                            No. of students paid : <b>{{ $request->no_of_students_paid }}</b>
                        </p>
                        <p
                            style="text-align: left; padding-left: 18px; font-size: 17px;font-family:Helvetica, Arial; font-weight: 400;">
                            Total : <b>Rs.{{ $request->total }}</b>
                        </p>
                        <p
                            style="text-align: left; padding-left: 18px; font-size: 17px;font-family:Helvetica, Arial; font-weight: 400;">
                            Convenience Amount : <b>Rs.{{ $request->convenience_amount }}</b>
                        </p>
                        <p
                            style="text-align: left; padding-left: 18px; font-size: 17px;font-family:Helvetica, Arial; font-weight: 400;">
                            Total paid : <b>Rs.{{ $request->total_to_be_paid }}</b>
                        </p>
                        <p
                            style="text-align: left; padding-left: 18px; font-size: 17px;font-family:Helvetica, Arial; font-weight: 400;">
                            Mode. of payment : <b>
                                @if ($request->mode_of_payment == 1)
                                    Demand Draft
                                @elseif($request->mode_of_payment == 2)
                                    Cheque
                                @elseif($request->mode_of_payment == 3)
                                    NEFT
                                @endif
                            </b>
                        </p>
                        <p
                            style="text-align: left; padding-left: 18px; font-size: 17px;font-family:Helvetica, Arial; font-weight: 400;">
                            Transaction Date : <b>{{ $request->transaction_date }}</b>
                        </p>
                    </th>

                </tr>
            </tbody>
        </table>
</body>

</html>