<!DOCTYPE html>
<html>
<head>
    <title>{{ $slip->caller_name }}</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        body {
            font-family: 'freeserif', 'normal';
            margin: 0;
            padding: 0;
        }

        .container {
            margin-top: 3rem;
            padding: 2rem;
            border: 1px solid black;
        }

        h5, p, h4, h3 {
            text-align: center;
            margin: 0.5rem;
        }

        hr {
            margin-top: 1rem;
            margin-bottom: 1rem;
        }

        .row::after {
            content: "";
            clear: both;
            display: table;
        }

        .col-md-6 {
            width: 50%;
            float: left;
        }

        .col-md-12{
            width: 100%;
            float: left;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        th, td {
            padding: 10px;
            text-align: left;
            border: 1px solid black;
        }

        ul, ol {
            padding-left: 0;
        }

        ul li, ol li {
            list-style-type: none;
        }

        .rescuetable {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
          }

          .rescuetable .col-md-4 {
            width: 30%;
          }

          .rescuetable table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 1rem;
          }

          .rescuetable table th,
          .rescuetable table td {
            padding: 10px;
            text-align: center;
            border: 1px solid black;
          }

          .rescuetable caption {
            font-weight: bold;
            margin-bottom: 0.5rem;
          }

        .vardi th, .vardi td {
            padding: 3px;
            text-align: left;
            border: 0px solid black!important;
        }
    </style>
</head>
<body>
    <div class="container">
        <p><img class="logo" src="{{ public_path('/admin/images/Panvel_Municipal_Corporation.png') }}" height="80" width="80" alt="Left Logo"></p>
        {{-- <h5>परिशिष्ट - " ग "</h5> --}}
        {{-- <p>( ३ व ३ (ब) )</p> --}}
        <h3 style="text-align:center;"><b>पनवेल महानगरपालिका</h3>
        {{-- <p><b>आगीच्या वर्दीचा अहवाल</b></p> --}}
        <hr>
        <h3 class="text-center"> Slip Details (स्लिप तपशील) </h3><br>
        <table class="rescuetable">
            <tr>
                <th scope="col">Slip Date (स्लिप तारीख)</th>
                <th scope="col">Caller Name (कॉलरचे नाव)</th>
                <th scope="col">Caller Mobile Number (कॉलर मोबाईल नंबर)</th>
                <th scope="col">Incident Location (घटनेचे ठिकाण)</th>
                <th scope="col">LandMark (लँडमार्क)</th>
                <th scope="col">Incident Reason (घटनेचे कारण)</th>
                <th scope="col">Slip Status (स्लिप स्थिती)</th>
            </tr>
            <tr>
                <td>{{ $slip->slip_date }}</td>
                <td>{{ $slip->caller_name }}</td>
                <td>{{ $slip->caller_mobile_no }}</td>
                <td>{{ $slip->incident_location_address }}</td>
                <td>{{ $slip->land_mark }}</td>
                <td>{{ $slip->incident_reason }}</td>
                <td>{{ $slip->slip_status }}</td>
            </tr>
        </table>

        <br><h3 class="text-center"> Slip Action Form Details (स्लिप अँक्शन फॉर्म तपशील) </h3><br>
        <table class="rescuetable">
            <tr>
                <th scope="col">Call Date & Time (कॉल तारीख आणि वेळ)</th>
                <th scope="col">Name of the Centre (केंद्राचे नाव)</th>
                <th scope="col">Type of vehicle (वाहनाचा प्रकार)</th>
                <th scope="col">Vehicle No (वाहनाचा नंबर)</th>
                <th scope="col">Vehicle Departure Date & Time (वाहन सुटण्याची तारीख आणि वेळ)</th>
                <th scope="col">Arrival Time (पोहचल्याची तारीख आणि वेळ)</th>
                <th scope="col">Time of departure from the scene (घटनास्तळावरुन निघाल्याची तारीख आणि वेळ)</th>
                <th scope="col">Time of arrival at the centre (केंद्रामध्ये आल्याची वेळ)</th>
                <th scope="col">Total Distance In KM (एकूण अतंर)</th>
            </tr>
            <tr>
                <td>{{ $slipActionFormData->call_time }}</td>
                <td>{{ $slipActionFormData->center_name }}</td>
                <td>{{ $slipActionFormData->type_of_vehicle }}</td>
                <td>{{ $slipActionFormData->number_of_vehicle }}</td>
                <td>{{ $slipActionFormData->vehicle_departure_time }}</td>
                <td>{{ $slipActionFormData->vehicle_arrival_time }}</td>
                <td>{{ $slipActionFormData->vehicle_departure_from_scene_time }}</td>
                <td>{{ $slipActionFormData->vehicle_arrival_at_center_time }}</td>
                <td>{{ $slipActionFormData->total_distance }}</td>
            </tr>
        </table>

        <br><h3 class="text-center"> Worker Details (कामगार तपशील) </h3><br>
        <table class="rescuetable">
            <tr>
                <th scope="col">Worker Name (कर्मचारीच नाव)</th>
                <th scope="col">Worker Designation (कर्मचारीचं पदनाम)</th>
            </tr>
            @foreach ($workerDetails as $details)
                <tr>
                    <td>{{ $details->worker_name }}</td>
                    <td>{{ $details->designation_name }}</td>
                </tr>
            @endforeach
        </table>

        @if (count($additionalHelpDetails) > 0)
            <br><h3 class="text-center"> Additional Help Details (अतिरिक्त मदत तपशील) </h3><br>
            <table class="rescuetable">
                <tr>
                    <th scope="col">Fire Station Name (फायर स्टेशनचे नाव)</th>
                    <th scope="col">Type Of Vehicle (वाहन प्रकार)</th>
                    <th scope="col">Vehicle Number (वाहन क्रमांक)</th>
                    <th scope="col">No Of Fireman (फायरमनची संख्या)</th>
                    <th scope="col">Inform Call DateTime (कॉलची तारीख वेळ)</th>
                    <th scope="col">Vehicle Departure DateTime (वाहन सुटण्याची तारीख वेळ)</th>
                    <th scope="col">Vehicle Arrival DateTime (वाहनाच्या आगमनाची तारीख वेळ)</th>
                    <th scope="col">Vehicle Return DateTime (वाहन परतीची तारीख वेळ)</th>
                    <th scope="col">Time to return to the center (केंद्रावर परतण्याची वेळ)</th>
                    <th scope="col">Total K.M (एकूण कि.मी)</th>
                </tr>
                @foreach ($additionalHelpDetails as $details)
                    <tr>
                        <td>{{ $details->name }}</td>
                        <td>{{ $details->type_of_vehicle }}</td>
                        <td>{{ $details->vehicle_number }}</td>
                        <td>{{ $details->no_of_fireman }}</td>
                        <td>{{ $details->inform_call_time }}</td>
                        <td>{{ $details->vehicle_departure_time }}</td>
                        <td>{{ $details->vehicle_arrival_time }}</td>
                        <td>{{ $details->vehicle_return_time }}</td>
                        <td>{{ $details->vehicle_return_to_center_time }}</td>
                        <td>{{ $details->total_distance }}</td>
                    </tr>
                @endforeach
            </table>
        @else
            <br><h3 class="text-center"> No Additional Help Details available</h3><br>
        @endif

        @if (!empty($occuranceBookDetails))
            <br><h3 class="text-center"> Occurrence Book Details (घटना पुस्तक तपशील) </h3><br>
            <table class="rescuetable">
                <tr>
                    <th scope="col">Occurrence Book Date (घटना पुस्तक तारीख)</th>
                    <th scope="col">Occurrence Book Description (घटना पुस्तक वर्णन)</th>
                    <th scope="col">Occurrence Book Remark (घटना पुस्तक टिप्पणी)</th>
                </tr>
                <tr>
                    <td>{{ $occuranceBookDetails->occurance_book_date }}</td>
                    <td>{{ $occuranceBookDetails->occurance_book_description }}</td>
                    <td>{{ $occuranceBookDetails->occurance_book_remark }}</td>
                </tr>
            </table>
        @else
            <br><h3 class="text-center"> No Occurrence Book Details available</h3><br>
        @endif

    </div>
</body>
</html>
