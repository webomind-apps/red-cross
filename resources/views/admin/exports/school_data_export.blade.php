<table>
    <thead>
        <tr>

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
        </tr>
        <tr>

        </tr>
        <tr>

        </tr>
    </thead>
    <tbody>
        @foreach ($schooldatas as $schooldata)
            
            <tr>
                <td>{{ $schooldata->dise_code }}</td>
                <td>{{ $schooldata->school_name }}</td>
                <td>{{ $schooldata->district }}</td>
                <td>{{ $schooldata->taluk }}</td>
                <td>{{ $schooldata->pin_code }}</td>
                <td>{{ $schooldata->address }}</td>
                <td>{{ $schooldata->email }}</td>
                <td>{{ $schooldata->phone_number }}</td>
                <td>{{ $schooldata->councellor_name }}</td>
                <td>{{ $schooldata->councellor_phone }}</td>
                <td>{{ $schooldata->councellor_email }}</td>
            </tr>
            
        @endforeach
    </tbody>
</table>
