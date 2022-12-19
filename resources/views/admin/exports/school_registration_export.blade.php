<table>
    <thead>
        <tr>
            {{-- {{ dd($schoolregistrations) }} --}}

        </tr>
        <tr>

        </tr>
        <tr>
            <th>Dise Code</th>
            <th>School Name</th>
            <th>District</th>
            <th>Taluk</th>
            <th>Pin code</th>
            <th>Address</th>
            <th>Email</th>
            <th>Phone number</th>
            <th>Councellor name</th>
            <th>Councellor phone</th>
            <th>Councellor email</th>
            <th>no of students in class eight</th>
            <th>no of students in class nine</th>
            <th>no of students in class ten</th>
            <th>total students</th>
            <th>school registration annual fee</th>
            <th>school student memebership fee</th>
            <th>no of students paid</th>
            <th>total paid</th>
        </tr>
        <tr>

        </tr>
        <tr>

        </tr>
    </thead>
    <tbody>
        @foreach ($schoolregistrations as $schoolregistration)
            <tr>
                <td>{{ $schoolregistration->dise_code }}</td>
                <td>{{ $schoolregistration->school_name }}</td>
                <td>{{ $schoolregistration->district }}</td>
                <td>{{ $schoolregistration->taluk }}</td>
                <td>{{ $schoolregistration->pin_code }}</td>
                <td>{{ $schoolregistration->address }}</td>
                <td>{{ $schoolregistration->email }}</td>
                <td>{{ $schoolregistration->phone_number }}</td>
                <td>{{ $schoolregistration->councellor_name }}</td>
                <td>{{ $schoolregistration->councellor_phone }}</td>
                <td>{{ $schoolregistration->councellor_email }}</td>
                <td>{{ $schoolregistration->no_of_students_class_eight }}</td>
                <td>{{ $schoolregistration->no_of_students_class_nine }}</td>
                <td>{{ $schoolregistration->no_of_students_class_ten }}</td>
                <td>{{ $schoolregistration->total_students }}</td>
                <td>{{ $schoolregistration->school_registration_annual_fee }}</td>
                <td>{{ $schoolregistration->school_student_memebership_fee }}</td>
                <td>{{ $schoolregistration->no_of_students_paid }}</td>
                <td>{{ $schoolregistration->total_to_be_paid }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
