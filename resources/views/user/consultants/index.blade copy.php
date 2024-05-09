@extends('user.layouts.master-layout')
@section('head')
@section('title','- Manage Student')

@endsection
@section('main_content')

<div class="right_section">
    <div>
        <h3 >Manage Student</h3>
    </div>
</div>

    {{-- success message start --}}
    @if(session()->has('message'))
    <div class="alert alert-success">
    {{session()->get('message')}}
    </div>
    <script>
        setTimeout(function(){
            $('.alert.alert-success').hide();
        }, 3000);
    </script>
    @endif
    {{-- success message start --}}

<div style="overflow-x:auto;">
    <table class="table table-striped mt-3" style="min-width: 800px;">
        <thead >
        <tr class="" style="background-color: var(--seller_frontend_color);color:var(--seller_text_color)">
            <th scope="col">SL</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Phone</th>
            <th scope="col">Continent</th>
            <th scope="col">Country</th>
            <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody>
            @php
                $i = 1;
            @endphp
            @if (count($students) > 0)
            @foreach ($students as $student)

            <tr>
            <td>{{ $i++ }}</td>
            <td>{{  $student->name }}</td>
            <td>{{  $student->email }}</td>
            <td>{{  $student->mobile }}</td>
            <td>{{  $student->continents?->name }}</td>
            <td>
               
                    @if ($student->country == '1')
                      <p>Afghanistan</p>
                    @elseif ($student->country == '2')
                    <p>Aland Islands</p>
                    @elseif ($student->country == '3')
                    <p>Albania</p>
                    @elseif ($student->country == '4')
                    <p> Algeria</p>
                    @elseif ($student->country == '5')
                    <p>American Samoa</p>
                    @elseif ($student->country == '6')
                    <p>Andorra</p>
                    @elseif ($student->country == '7')
                    <p> Angola</p>
                    @elseif ($student->country == '8')
                    <p>Anguilla</p>
                    @elseif ($student->country == '9')
                    <p> Antarctica</p>
                    @elseif ($student->country == '10')
                    <p> Antigua and Barbuda</p>
                    @elseif ($student->country == '11')
                    <p> Argentina</p>
                    @elseif ($student->country == '12')
                    <p> Armenia</p>
                    @elseif ($student->country == '13')
                    <p> Aruba</p>
                    @elseif ($student->country == '14')
                    <p> Australia</p>
                    @elseif ($student->country == '15')
                    <p> Austria</p>
                    @elseif ($student->country == '16')
                    <p> Azerbaijan</p>
                    @elseif ($student->country == '17')
                    <p> Bahamas</p>
                    @elseif ($student->country == '18')
                    <p> Bahrain</p>
                    @elseif ($student->country == '19')
                    <p> Bangladesh</p>
                    @elseif ($student->country == '20')
                    <p> Barbados</p>
                    @elseif ($student->country == '21')
                    <p> Belarus</p>
                    @elseif ($student->country == '22')
                    <p> Belgium</p>
                    @elseif ($student->country == '23')
                    <p> Belize</p>
                    @elseif ($student->country == '24')
                    <p> Benin</p>
                    @elseif ($student->country == '25')
                    <p> Bermuda</p>
                    @elseif ($student->country == '26')
                    <p> Bhutan</p>
                    @elseif ($student->country == '27')
                    <p> Bolivia</p>
                    @elseif ($student->country == '28')
                    <p> Bonaire, Sint Eustatius and Saba</p>
                    @elseif ($student->country == '29')
                    <p> Bosnia and Herzegovina</p>
                    @elseif ($student->country == '30')
                    <p> Botswana</p>
                    @elseif ($student->country == '31')
                    <p> Bouvet Island</p>
                    @elseif ($student->country == '32')
                    <p> Brazil</p>
                    @elseif ($student->country == '33')
                    <p> British Indian Ocean Territory</p>
                    @elseif ($student->country == '34')
                    <p> Brunei</p>
                    @elseif ($student->country == '35')
                    <p> Bulgaria</p>
                    @elseif ($student->country == '36')
                    <p>Burkina Faso</p>
                    @elseif ($student->country == '37')
                    <p> Burundi</p>
                    @elseif ($student->country == '38')
                    <p> Cambodia</p>
                    @elseif ($student->country == '39')
                    <p> Cameroon</p>
                    @elseif ($student->country == '40')
                    <p> Canada</p>
                    @elseif ($student->country == '41')
                    <p>  Cape Verde</p>
                    @elseif ($student->country == '42')
                    <p> Cayman Islands </p>
                    @elseif ($student->country == '43')
                    <p> Central African Republic </p>
                    @elseif ($student->country == '44')
                    <p> Chad</p>
                    @elseif ($student->country == '45')
                    <p> Chile</p>
                    @elseif ($student->country == '46')
                    <p> China</p>
                    @elseif ($student->country == '47')
                    <p>Christmas Island </p>
                    @elseif ($student->country == '48')
                    <p> Cocos (Keeling) Islands </p>
                    @elseif ($student->country == '49')
                    <p> Colombia</p>
                    @elseif ($student->country == '50')
                    <p> Comoros</p>
                    @elseif ($student->country == '51')
                    <p> Congo</p>
                    @elseif ($student->country == '52')
                    <p>Cook Islands</p>
                    @elseif ($student->country == '53')
                    <p> Costa Rica</p>
                    @elseif ($student->country == '54')
                    <p>Ivory Coast</p>
                    @elseif ($student->country == '55')
                    <p> Croatia</p>
                    @elseif ($student->country == '56')
                    <p> Cuba</p>
                    @elseif ($student->country == '57')
                    <p> Curacao</p>
                    @elseif ($student->country == '58')
                    <p> Cyprus</p>
                    @elseif ($student->country == '59')
                    <p>Czech Republic</p>
                    @elseif ($student->country == '60')
                    <p>Democratic Republic of the Congo</p>
                    @elseif ($student->country == '61')
                    <p> Denmark</p>
                    @elseif ($student->country == '62')
                    <p> Djibouti</p>
                    @elseif ($student->country == '63')
                    <p> Dominica</p>
                    @elseif ($student->country == '64')
                    <p> Dominican Republic</p>
                    @elseif ($student->country == '65')
                    <p> Ecuador</p>
                    @elseif ($student->country == '66')
                    <p> Egypt</p>
                    @elseif ($student->country == '67')
                    <p>El Salvador</p>
                    @elseif ($student->country == '68')
                    <p> Equatorial Guinea</p>
                    @elseif ($student->country == '69')
                    <p> Eritrea</p>
                    @elseif ($student->country == '70')
                    <p> Estonia</p>
                    @elseif ($student->country == '71')
                    <p> Ethiopia</p>
                    @elseif ($student->country == '72')
                    <p> Falkland Islands (Malvinas)</p>
                    @elseif ($student->country == '73')
                    <p> Faroe Islands </p>
                    @elseif ($student->country == '74')
                    <p> Fiji</p>
                    @elseif ($student->country == '75')
                    <p> Finland</p>
                    @elseif ($student->country == '76')
                    <p> France</p>
                    @elseif ($student->country == '77')
                    <p> French Guiana</p>
                    @elseif ($student->country == '78')
                    <p> French Polynesia</p>
                    @elseif ($student->country == '79')
                    <p> French Southern Territories </p>
                    @elseif ($student->country == '80')
                    <p> Gabon</p>
                    @elseif ($student->country == '81')
                    <p> Gambia</p>
                    @elseif ($student->country == '82')
                    <p> Georgia</p>
                    @elseif ($student->country == '83')
                    <p> Germany</p>
                    @elseif ($student->country == '84')
                    <p> Ghana</p>
                    @elseif ($student->country == '85')
                    <p> Gibraltar</p>
                    @elseif ($student->country == '86')
                    <p> Greece</p>
                    @elseif ($student->country == '87')
                    <p> Greenland</p>
                    @elseif ($student->country == '88')
                    <p> Grenada</p>
                    @elseif ($student->country == '89')
                    <p> Guadaloupe</p>
                    @elseif ($student->country == '90')
                    <p> Guam</p>
                    @elseif ($student->country == '91')
                    <p> Guatemala</p>
                    @elseif ($student->country == '92')
                    <p> Guernsey</p>
                    @elseif ($student->country == '93')
                    <p> Guinea</p>
                    @elseif ($student->country == '94')
                    <p> Guinea-Bissau</p>
                    @elseif ($student->country == '95')
                    <p> Guyana</p>
                    @elseif ($student->country == '96')
                    <p> Haiti</p>
                    @elseif ($student->country == '97')
                    <p> Heard Island and McDonald Islands</p>
                    @elseif ($student->country == '98')
                    <p> Honduras</p>
                    @elseif ($student->country == '99')
                    <p> Hong Kong</p>
                    @elseif ($student->country == '100')
                    <p> Hungary</p>
                    @elseif ($student->country == '101')
                    <p> Iceland</p>
                    @elseif ($student->country == '102')
                    <p> India</p>
                    @elseif ($student->country == '103')
                    <p> Indonesia</p>
                    @elseif ($student->country == '104')
                    <p> Iran</p>
                    @elseif ($student->country == '105')
                    <p> Iraq</p>
                    @elseif ($student->country == '106')
                    <p> Ireland</p>
                    @elseif ($student->country == '107')
                    <p> Isle of Man</p>
                    @elseif ($student->country == '108')
                    <p> Israel</p>
                    @elseif ($student->country == '109')
                    <p> Italy</p>
                    @elseif ($student->country == '110')
                    <p> Jamaica</p>
                    @elseif ($student->country == '111')
                    <p> Japan</p>
                    @elseif ($student->country == '112')
                    <p> Jersey</p>
                    @elseif ($student->country == '113')
                    <p> Jordan</p>
                    @elseif ($student->country == '114')
                    <p> Kazakhstan</p>
                    @elseif ($student->country == '115')
                    <p> Kenya</p>
                    @elseif ($student->country == '116')
                    <p> Kiribati</p>
                    @elseif ($student->country == '117')
                    <p> Kosovo</p>
                    @elseif ($student->country == '118')
                    <p> Kuwait</p>
                    @elseif ($student->country == '119')
                    <p> Kyrgyzstan</p>
                    @elseif ($student->country == '120')
                    <p> Laos</p>
                    @elseif ($student->country == '121')
                    <p> Latvia</p>
                    @elseif ($student->country == '122')
                    <p> Lebanon</p>
                    @elseif ($student->country == '123')
                    <p> Lesotho</p>
                    @elseif ($student->country == '124')
                    <p> Liberia</p>
                    @elseif ($student->country == '125')
                    <p> Libya</p>
                    @elseif ($student->country == '126')
                    <p> Liechtenstein</p>
                    @elseif ($student->country == '127')
                    <p> Lithuania</p>
                    @elseif ($student->country == '128')
                    <p> Luxembourg</p>
                    @elseif ($student->country == '129')
                    <p> Macao</p>
                    @elseif ($student->country == '130')
                    <p> Macedonia</p>
                    @elseif ($student->country == '131')
                    <p> Madagascar</p>
                    @elseif ($student->country == '132')
                    <p> Malawi</p>
                    @elseif ($student->country == '133')
                    <p> Malaysia</p>
                    @elseif ($student->country == '134')
                    <p> Maldives</p>
                    @elseif ($student->country == '135')
                    <p> Mali</p>
                    @elseif ($student->country == '136')
                    <p> Malta</p>
                    @elseif ($student->country == '137')
                    <p> Marshall Islands </p>
                    @elseif ($student->country == '138')
                    <p> Martinique</p>
                    @elseif ($student->country == '139')
                    <p> Mauritania</p>
                    @elseif ($student->country == '140')
                    <p> Mauritius</p>
                    @elseif ($student->country == '141')
                    <p> Mayotte</p>
                    @elseif ($student->country == '142')
                    <p> Mexico</p>
                    @elseif ($student->country == '143')
                    <p> Micronesia</p>
                    @elseif ($student->country == '144')
                    <p> Moldava</p>
                    @elseif ($student->country == '145')
                    <p> Monaco</p>
                    @elseif ($student->country == '146')
                    <p> Mongolia</p>
                    @elseif ($student->country == '147')
                    <p> Montenegro</p>
                    @elseif ($student->country == '148')
                    <p> Montserrat</p>
                    @elseif ($student->country == '149')
                    <p> Morocco</p>
                    @elseif ($student->country == '150')
                    <p> Mozambique</p>
                    @elseif ($student->country == '151')
                    <p> Myanmar (Burma)</p>
                    @elseif ($student->country == '152')
                    <p> Namibia</p>
                    @elseif ($student->country == '153')
                    <p> Nauru</p>
                    @elseif ($student->country == '154')
                    <p> Nepal</p>
                    @elseif ($student->country == '155')
                    <p> Netherlands</p>
                    @elseif ($student->country == '156')
                    <p> New Caledonia</p>
                    @elseif ($student->country == '157')
                    <p> New Zealand</p>
                    @elseif ($student->country == '158')
                    <p> Nicaragua</p>
                    @elseif ($student->country == '159')
                    <p> Niger</p>
                    @elseif ($student->country == '160')
                    <p> Nigeria</p>
                    @elseif ($student->country == '161')
                    <p> Niue</p>
                    @elseif ($student->country == '162')
                    <p> Norfolk Island </p>
                    @elseif ($student->country == '163')
                    <p>  North Korea  </p>
                    @elseif ($student->country == '164')
                    <p> Northern Mariana Islands </p>
                    @elseif ($student->country == '165')
                    <p> Norway</p>
                    @elseif ($student->country == '166')
                    <p> Oman</p>
                    @elseif ($student->country == '167')
                    <p> Pakistan</p>
                    @elseif ($student->country == '168')
                    <p> Palau</p>
                    @elseif ($student->country == '169')
                    <p> Palestine</p>
                    @elseif ($student->country == '170')
                    <p> Panama</p>
                    @elseif ($student->country == '171')
                    <p>  Papua New Guinea </p>
                    @elseif ($student->country == '172')
                    <p>Paraguay</p>
                    @elseif ($student->country == '173')
                    <p>Peru</p>
                    @elseif ($student->country == '174')
                    <p>Phillipines</p>
                    @elseif ($student->country == '175')
                    <p>Pitcairn</p>
                    @elseif ($student->country == '176')
                    <p>Poland</p>
                    @elseif ($student->country == '177')
                    <p>Portugal</p>
                    @elseif ($student->country == '178')
                    <p>Puerto Rico </p>
                    @elseif ($student->country == '179')
                    <p>Qatar</p>
                    @elseif ($student->country == '180')
                    <p>Reunion</p>
                    @elseif ($student->country == '181')
                    <p>Romania</p>
                    @elseif ($student->country == '182')
                    <p>Russia</p>
                    @elseif ($student->country == '183')
                    <p>Rwanda</p>
                    @elseif ($student->country == '184')
                    <p>Saint Barthelemy </p>
                    @elseif ($student->country == '185')
                    <p>Saint Helena </p>
                    @elseif ($student->country == '186')
                    <p>Saint Kitts and Nevis</p>
                    @elseif ($student->country == '187')
                    <p>Saint Lucia</p>
                    @elseif ($student->country == '188')
                    <p>Saint Martin</p>
                    @elseif ($student->country == '189')
                    <p>Saint Pierre and Miquelon </p>
                    @elseif ($student->country == '190')
                    <p>Saint Vincent and the Grenadines</p>
                    @elseif ($student->country == '191')
                    <p>Samoa</p>
                    @elseif ($student->country == '192')
                    <p>San Marino </p>
                    @elseif ($student->country == '193')
                    <p>Sao Tome and Principe </p>
                    @elseif ($student->country == '194')
                    <p>Saudi Arabia </p>
                    @elseif ($student->country == '195')
                    <p>Senegal</p>
                    @elseif ($student->country == '196')
                    <p>Serbia</p>
                    @elseif ($student->country == '197')
                    <p>Seychelles</p>
                    @elseif ($student->country == '198')
                    <p> Sierra Leone</p>
                    @elseif ($student->country == '199')
                    <p>Singapore</p>
                    @elseif ($student->country == '200')
                    <p>Sint Maarten</p>
                    @elseif ($student->country == '201')
                    <p>Slovakia</p>
                    @elseif ($student->country == '202')
                    <p>Slovenia</p>
                    @elseif ($student->country == '203')
                    <p>Solomon Islands</p>
                    @elseif ($student->country == '204')
                    <p>Somalia</p>
                    @elseif ($student->country == '205')
                    <p>South Africa</p>
                    @elseif ($student->country == '206')
                    <p>South Georgia and the South Sandwich Islands</p>
                    @elseif ($student->country == '207')
                    <p>South Korea</p>
                    @elseif ($student->country == '208')
                    <p>South Sudan</p>
                    @elseif ($student->country == '209')
                    <p>Spain</p>
                    @elseif ($student->country == '210')
                    <p>Sri Lanka</p>
                    @elseif ($student->country == '211')
                    <p>Sudan</p>
                    @elseif ($student->country == '212')
                    <p>Suriname</p>
                    @elseif ($student->country == '213')
                    <p>Svalbard and Jan Mayen </p>
                    @elseif ($student->country == '214')
                    <p>Swaziland</p>
                    @elseif ($student->country == '215')
                    <p>Sweden</p>
                    @elseif ($student->country == '216')
                    <p>Switzerland</p>
                    @elseif ($student->country == '217')
                    <p>Syria</p>
                    @elseif ($student->country == '218')
                    <p>Taiwan</p>
                    @elseif ($student->country == '219')
                    <p>Tajikistan</p>
                    @elseif ($student->country == '220')
                    <p>Tanzania</p>
                    @elseif ($student->country == '221')
                    <p>Thailand</p>
                    @elseif ($student->country == '222')
                    <p>Timor-Leste (East Timor)</p>
                    @elseif ($student->country == '223')
                    <p>Togo</p>
                    @elseif ($student->country == '224')
                    <p>Tokelau</p>
                    @elseif ($student->country == '225')
                    <p>Tonga</p>
                    @elseif ($student->country == '226')
                    <p>Trinidad and Tobago</p>
                    @elseif ($student->country == '227')
                    <p>Tunisia</p>
                    @elseif ($student->country == '228')
                    <p>Turkey</p>
                    @elseif ($student->country == '229')
                    <p>Turkmenistan</p>
                    @elseif ($student->country == '230')
                    <p>Turks and Caicos Islands</p>
                    @elseif ($student->country == '231')
                    <p>Tuvalu</p>
                    @elseif ($student->country == '232')
                    <p>Uganda</p>
                    @elseif ($student->country == '233')
                    <p>Ukraine</p>
                    @elseif ($student->country == '234')
                    <p>United Arab Emirates</p>
                    @elseif ($student->country == '235')
                    <p>United Kingdom</p>
                    @elseif ($student->country == '236')
                    <p>United States</p>
                    @elseif ($student->country == '237')
                    <p>United States Minor Outlying Islands</p>
                    @elseif ($student->country == '238')
                    <p>Uruguay</p>
                    @elseif ($student->country == '239')
                    <p>Uzbekistan</p>
                    @elseif ($student->country == '240')
                    <p>Vanuatu</p>
                    @elseif ($student->country == '241')
                    <p>Vatican City</p>
                    @elseif ($student->country == '242')
                    <p>Venezuela</p>
                    @elseif ($student->country == '243')
                    <p>Vietnam</p>
                    @elseif ($student->country == '244')
                    <p>Virgin Islands, British</p>
                    @elseif ($student->country == '245')
                    <p>Virgin Islands, US</p>
                    @elseif ($student->country == '246')
                    <p>Wallis and Futuna</p>
                    @elseif ($student->country == '247')
                    <p> Western Sahara</p>
                    @elseif ($student->country == '248')
                    <p>Yemen</p>
                    @elseif ($student->country == '249')
                    <p>Zambia</p>
                    @elseif ($student->country == '250')
                    <p>Zimbabwe</p>
                    @endif
            </td>
            <td>
                {{-- <a href="{{ route('frontend.edit_ebook', $student->id ) }}"><i class="fa-duotone fa fa-edit"></i></a>
                &nbsp; --}}
                <a href="{{ route('frontend.consultant_student_details', $student->id) }}"><i class="fa-duotone fa fa-eye"></i></a>
                {{-- &nbsp;
                <button class="btn text-danger delete-button" courseId="{{ $student->id }}"><i class="icon fa fa-trash tx-28"></i></button> --}}

            </td>

            @endforeach
            @endif
        </tbody>
  </table>
</div>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="script.js"></script>
<script>
$(document).ready(function() {
$(".delete-button").click(function() {
    $("#delete-modal").show();
    $("#course_id").val($(this).attr('courseId'))

});
$("#confirm-no").click(function() {
    $("#delete-modal").hide();
});
$("#confirm-yes").click(function() {
    $("#delete-modal").hide();
});
});

</script>


@endsection
