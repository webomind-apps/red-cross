<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <meta content="text/html; charset=utf-8" http-equiv="Content-Type">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Red Cross</title>
</head>

{{-- {{dd($signature)}} --}}
  <body style="margin:0;padding:0;background-color:#FFF">
    <center>
      <table align="center" border="0" cellpadding="0" cellspacing="0" id="bodyTable" width="100%" style="border-collapse:collapse;mso-table-lspace:0;mso-table-rspace:0;padding:0;background-color:#FFF;height:99px;margin:0;width:100%">
        <tbody >
          <tr>
            <td align="center" id="bodyCell" valign="top" style="border-collapse:collapse;mso-table-lspace:0;mso-table-rspace:0;padding-top:50px;padding-left:20px;padding-bottom:20px;padding-right:20px;border-top:0;height:99px;margin:0;width:100%">
              <table border="0" cellpadding="0" cellspacing="0" class="templateContainer" width="100%" style="border-collapse:collapse;mso-table-lspace:0;mso-table-rspace:0;border:0 solid #FFF;background-color:#FFF">
                <tbody>
                  <tr>
                    <td class="templateContainerInner" style="border-collapse:collapse;mso-table-lspace:0;mso-table-rspace:0;padding:0">
                      <table border="0" cellpadding="0" cellspacing="0" width="100%" style="border-collapse:collapse;mso-table-lspace:0;mso-table-rspace:0">
                        <tr style="border: 3px solid #000;">
                          <td align="center" valign="top" style="border-collapse:collapse;mso-table-lspace:0;mso-table-rspace:0">
                            <table border="0" cellpadding="0" cellspacing="0" class="templateRow" width="100%" style="border-collapse:collapse;mso-table-lspace:0;mso-table-rspace:0">
                                <thead>
                                    <tr>
                                      <th valign="top" class="kmTextContent" style="color:#000000;font-size:16px;text-align:center; font-weight: 500; padding-top: 10px;">
                                        THROUGH HUMANITY TO PEACE
                                      </th>
                                    </tr>
                                </thead>
                                <tbody>
                                <tr>
                                  <td class="rowContainer kmFloatLeft" valign="top" style="border-collapse:collapse;mso-table-lspace:0;mso-table-rspace:0">
                                    <tbody class="kmTableBlockOuter">
                                        <tr>
                                          <td class="kmTableBlockInner" valign="top" >
                                            <table align="left" border="0" cellpadding="0" cellspacing="0" class="kmTable" width="100%">
                                              <thead>
                                                <tr>
                                                  <th valign="top" class="kmTextContent" style="text-align: right;">
                                                    {{-- <img src="./cropped-Final-Logo.png" height="90px" alt="">  --}}
                                                    <img src="{{ public_path('admin/img/red-cross.png')}}" height="90px" alt=""> 
                                                  </th>
                                                  <th valign="top" class="kmTextContent">
                                                    <h2 style="line-height: 0; font-size: 31px; margin-top: 20px;">Indian Red Cross Society</h2>
                                                    <p style="line-height: 0; font-size: 14px;font-weight: 500;font-family:Helvetica, Arial;"> (CONSTITUTED UNDER ACT XV OF 1920) </P>
                                                    <p style="line-height: 0; font-size: 14px;font-weight: 500;padding-top: 3px;font-family:Helvetica, Arial; "> (KARNATAKA STATE BRANCH) </p>
                                                    <h5 style="line-height: 0; font-size: 25px; margin-top: 25px; color: #FF1414;font-family:Helvetica, Arial;">JUNIOR RED CROSS</h5>
                                                  </th>
                                                  <th valign="top" class="kmTextContent" style="text-align: left;">
                                                    <img src="{{ public_path('admin/img/red-cross.png')}}" height="90px" alt=""> 
                                                    {{-- <img src="{{ public_path('storage/signature')}}" height="90px" alt="">  --}}
                                                  </th>
                                                </tr>
                                              </thead>
             
                                            </table>
                                          </td>
                                        </tr>
                                      </tbody>
                                    <table border="0" cellpadding="0" cellspacing="0" width="100%" >
                                      <tbody class="kmTextBlockOuter">
                                        <tr>
                                          <td class="kmTextBlockInner">
                                            <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%">
                                              <tbody>
                                                <tr>
                                                  <td >
                                                    <p style="text-align: center;font-weight: 600; margin-top: -20px; font-size: 15px; font-family:Helvetica, Arial;">
                                                        #26, Red Cross Bhavan, 1st Floor Race Course Road, Bengaluru - 560001. Ph : 080-2226-4205
                                                    </p>
                                                  </td>
                                                </tr>
                                              </tbody>
                                            </table>
                                          </td>
                                        </tr>
                                      </tbody>
                                    </table>
                                    <table border="0" cellpadding="0" cellspacing="0" class="kmTableBlock kmTableMobile" width="100%" style="border-collapse:collapse;mso-table-lspace:0;mso-table-rspace:0">
                                      <tbody class="kmTableBlockOuter">
                                        <tr>
                                            <td class="kmTableBlockInner" valign="top" >
                                              <table align="center" border="0" cellpadding="0" cellspacing="0" class="kmTable" width="100%">
                                                <thead>
                                                  <tr>
                                                    <th valign="top" class="kmTextContent" style="text-align: right;">
                                                        No: <span style="font-size: 22px; padding-left: 10px; border-bottom: 2px dotted #1d1d1d;">{{ $receipt }} </span>
                                                    </th>
                                                    <th valign="top" class="kmTextContent" style="text-align: center;">
                                                      <span style="text-align: center;padding: 0px 5px;color: #FF1414;font-weight: 900; border-radius: 4px; font-size: 22px; margin-left: 40%; border: 1px solid #FF1414;">RECEIPT</span>
                                                    </th>
                                                    <th valign="top" class="kmTextContent" style="text-align: center;">
                                                        Date : <span style="font-size: 20px; padding-left: 10px; border-bottom: 2px dotted #1d1d1d;">{{ $transaction_date }}</span>
                                                    </th>
                                                  </tr>
                                                </thead>
                                              </table>
                                            </td>
                                          </tr>
                                      </tbody>
                                    </table>
                                    <table border="0" cellpadding="0" cellspacing="0" class="kmTableBlock kmTableMobile" width="100%" style="border-collapse:collapse;mso-table-lspace:0;mso-table-rspace:0">
                                      <tbody class="kmTableBlockOuter">
                                        <tr>
                                          <td class="kmTableBlockInner" valign="top">
                                            <table align="left" border="0" cellpadding="0" cellspacing="0" class="kmTable" width="100%">
                                                
                                                <thead>
                                                    <th valign="top" width="100%" class="kmTextContent">
                                                        <p style="text-align: left; padding-left: 20px; font-size: 17px;font-family:Helvetica, Arial;font-weight: 400;">Received with thanks from 
                                                            <span style="border-bottom: 2px dotted #1d1d1d; font-weight: bold; font-size: 16px; margin-left: 10px;font-style: italic; ">
                                                              The head master of {{$name}}, {{ $address}} 
                                                            </span> 
                                                          
                                                        </p>
                                                        <p style="text-align: left; padding-left: 20px; font-size: 17px;font-family:Helvetica, Arial; font-weight: 400;">a sum of Rupees 
                                                            <span style="border-bottom: 2px dotted #1d1d1d; font-weight: bold; font-size: 16px; margin-left: 10px;font-style: italic; ">
                                                               Rs. {{$total}} (Rs. {{$total_paid}})
                                                            </span> 
                                                        </p>
                                                        <p style="text-align: left; padding-left: 20px; font-size: 17px;font-family:Helvetica, Arial; font-weight: 400;">by online Payment towards school registration fees of 
                                                            <span style="border-bottom: 2px dotted #1d1d1d; font-weight: bold; font-size: 16px; margin-left: 10px;font-style: italic; ">
                                                               Rs. {{$school_registration_annual_fee}} (Rs. {{ $school_registration_annual_fee_amount}})
                                                            </span> 
                                                        </p>
                                                        <p style="text-align: left; padding-left: 20px; font-size: 17px;font-family:Helvetica, Arial; font-weight: 400;">and student membership fees of
                                                            <span style="border-bottom: 2px dotted #1d1d1d; font-weight: bold; font-size: 16px; margin-left: 10px;font-style: italic; ">
                                                                Rs. {{$school_student_memebership_fee}} (Rs. {{$school_student_memebership_fee_amount}})
                                                            </span> 
                                                            <br>
                                                            {{-- <span style="border-bottom: 2px dotted #1d1d1d; font-weight: bold; font-size: 16px; margin-left: 10px;font-style: italic; ">
                                                                ( {{$no_of_students_paid}} students * Rs.{{$school_student_memebership_fee_amount}} ) + Rs.{{ $school_registration_annual_fee_amount }}
                                                            </span>  --}}
                                                        </p>
                                                    </th>
                            
                                                </thead>
      
                                            </table>
                                          </td>
                                        </tr>
                                      </tbody>
                                    </table>
                                    <table border="0" cellpadding="0" cellspacing="0" class="kmTableBlock kmTableMobile" width="100%" style="padding:10px 0 10px 0">
                                      <tbody class="kmTableBlockOuter">
                                        <tr>
                                          <td class="kmTableBlockInner" valign="top" >
                                            <table align="left" border="0" cellpadding="0" cellspacing="0" class="kmTable" width="100%" >
                                              <thead>
                                                <tr>
                                                  <th valign="top" class="kmTextContent" style="text-align: left; padding-left:20px">
                                                    <p style="font-size: 18px;font-weight: 400;">Total Payment : <span style="font-size: 20px; border-bottom: 2px solid #000;font-style: italic;font-weight: bold; ">Rs. {{$total}} (Rs. {{$total_paid}})</span></p>
                                                  </th>
                                                  <th valign="top" class="kmTextContent" style="text-align: center">
                                                    <img src="{{ public_path("storage/{$signature}") }}" height="50px" alt="" srcset="" style="text-align: center;">
                                                    <p style="line-height: 0; margin-top: 0px;font-size: 15px">General Secretary</p>
                                                  </th>
                                                </tr>
                                              </thead>             
                                            </table>
                                          </td>
                                        </tr>
                                      </tbody>
                                    </table>
                                  </td>
                                </tr>
                              </tbody>
                            </table>
                          </td>
                        </tr>
                      
                      </table>
                    </td>
                  </tr>
                </tbody>
              </table>
            </td>
          </tr>
        </tbody>
      </table>
   
  </body>

  </html>


