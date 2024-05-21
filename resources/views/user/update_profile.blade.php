@extends('user.layouts.master-layout')
@section('head')
@section('title','- Update Profile')
<link href="{{asset('public/backend')}}/lib/summernote/summernote-bs4.css" rel="stylesheet">

@endsection
@section('main_content')


        {{-- success message start --}}
        @if(session()->has('message'))
        <div class="alert alert-success">
        {{-- <button type="button" class="close" data-bs-dismiss="alert" aria-hidden="true"></button> --}}
        {{session()->get('message')}}
        </div>
        <script>
            setTimeout(function(){
                $('.alert.alert-success').hide();
            }, 3000);
        </script>
        @endif
        {{-- success message start --}}

    <div class="container py-2" >
        <div class="card card-body shadow" style="background-color: var(--seller_background_color);">
            <div class="col-md-12">
                <div class="right_section">
                    <div>
                        <h4 style="color:var(--seller_text_color)">Edit Profile</h4>
                    </div>
                </div>


                <form action="{{ route('user.profile_info_update', auth()->user()->id) }}" method="POST" enctype="multipart/form-data" style="margin-top: 0%">
                    @csrf

                    <div class="card card-body mb-4 shadow" style="background-color:var(--seller_frontend_color); color:var(--seller_text_color)">
                        <div class="right_section">
                            <div>
                                <h4 class="mt-2 mb-4" style="color:var(--seller_text_color)">Profile Information </h4>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label class="mb-2">Full Name</label>
                                <input type="text" class="form-control  mb-2"   value="{{ auth()->user()->name }}"  name="name"  placeholder="Username"/>
                            </div>

                            <div class="col-md-6">
                                <label class="mb-2">Email Address</label>
                                <input type="email" class="form-control  mb-2" value="{{ auth()->user()->email }}" name="email" placeholder="Email Address"/>
                            </div>
                            <div class="col-md-6">
                                <label class="mb-2">Mobile Number</label>
                                <input type="text" class="form-control  mb-2" value="{{ auth()->user()->mobile }}" name="mobile"  placeholder="Mobile Number"/>
                            </div>

                            <div class="col-md-6">
                                <label class="mb-2">Gender</label>
                                <select  class="form-control" name="gender" required>
                                    <option value="">Select Gender</option>
                                    <option @if(auth()->user()->gender == '0')  Selected @endif value="0">Male</option>
                                    <option @if(auth()->user()->gender == '1')  Selected @endif value="1">Female</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="mb-2">Date of Birth</label>
                                <input type="date" class="form-control  mb-2 " value="{{ auth()->user()->dob }}" name="dob"/>
                            </div>
                            <div class="col-md-6">
                                <label class="mb-2">NID Number</label>
                                <input type="text" class="form-control  mb-2 " value="{{ auth()->user()->nid }}" name="nid"  placeholder="NID"/>
                            </div>


                            <div class="col-md-6">
                                <label class="mb-2">Qualification</label>
                                <input type="text" class="form-control  mb-2 " value="{{ auth()->user()->qualification }}" name="qualification"  placeholder="qualification"/>
                            </div>
                            <div class="col-md-6">
                                <label class="mb-2">Experience</label>
                                <input type="text" class="form-control  mb-2 " value="{{ auth()->user()->experience }}" name="experience"  placeholder="experience"/>
                            </div>
                            <div class="col-md-6">
                                <label class="mb-2">Language</label>
                                <select class="form-select form-control" name="language">
                                    <option value="">select one language</option>
                                    <option @if(auth()->user()->language == '1')  Selected @endif value="1"> Bangla </option>
                                    <option @if(auth()->user()->language == '2')  Selected @endif value="2" >English </option>
                                    <option @if(auth()->user()->language == '3')  Selected @endif value="3" >Hindi </option>
                                    <option @if(auth()->user()->language == '4')  Selected @endif value="4" >Arabic </option>
                                </select>
                                {{-- <input type="text" class="form-control  mb-2 " value="{{ auth()->user()->language }}" name="language"  placeholder="language"/> --}}
                            </div>


                            @if (auth()->user()->type == 1 || auth()->user()->type == 7)
                                <div class="col-sm-6">
                                    <label class="mb-2">Continent</label>
                                    <select  class="form-control" name="continent_id" required>
                                        <option value="">Select Continent</option>
                                    @foreach ($continents as $continent)
                                    <option @if(@$continent->id ==  @auth()->user()->continents->id)  Selected @endif  value="{{ @$continent->id }}">{{ @$continent->name }}</option>
                                    @endforeach
                                    </select>
                                </div>
                            @endif

                            <div class="col-md-6">
                                <label class="mb-2">Country</label>
                                <select class="form-select form-control" name="country">
                                    <option value="">select one country</option>
                                    <option @if(auth()->user()->country == '1')  Selected @endif value="1"> Afghanistan </option>
                                    <option @if(auth()->user()->country == '2')  Selected @endif value="2" >Aland Islands </option>
                                    <option @if(auth()->user()->country == '3')  Selected @endif value="3" >Albania </option>
                                    <option @if(auth()->user()->country == '4')  Selected @endif value="4" >Algeria </option>
                                    <option @if(auth()->user()->country == '5')  Selected @endif value="5" >American Samoa </option>
                                    <option @if(auth()->user()->country == '6')  Selected @endif value="6" >Andorra </option>
                                    <option @if(auth()->user()->country == '7')  Selected @endif value="7" >Angola </option>
                                    <option @if(auth()->user()->country == '8')  Selected @endif value="8" >Anguilla </option>
                                    <option @if(auth()->user()->country == '9')  Selected @endif value="9" >Antarctica </option>
                                    <option @if(auth()->user()->country == '10')  Selected @endif value="10" >Antigua and Barbuda </option>
                                    <option @if(auth()->user()->country == '11')  Selected @endif value="11" >Argentina </option>
                                    <option @if(auth()->user()->country == '12')  Selected @endif value="12" >Armenia </option>
                                    <option @if(auth()->user()->country == '13')  Selected @endif value="13" >Aruba </option>
                                    <option @if(auth()->user()->country == '14')  Selected @endif value="14" >Australia </option>
                                    <option @if(auth()->user()->country == '15')  Selected @endif value="15" >Austria </option>
                                    <option @if(auth()->user()->country == '16')  Selected @endif value="16" >Azerbaijan </option>
                                    <option @if(auth()->user()->country == '17')  Selected @endif value="17" >Bahamas </option>
                                    <option @if(auth()->user()->country == '18')  Selected @endif value="18" >Bahrain </option>
                                    <option @if(auth()->user()->country == '19')  Selected @endif value="19" >Bangladesh </option>
                                    <option @if(auth()->user()->country == '20')  Selected @endif value="20" >Barbados </option>
                                    <option @if(auth()->user()->country == '21')  Selected @endif value="21" >Belarus </option>
                                    <option @if(auth()->user()->country == '22')  Selected @endif value="22" >Belgium </option>
                                    <option @if(auth()->user()->country == '23')  Selected @endif value="23" >Belize </option>
                                    <option @if(auth()->user()->country == '24')  Selected @endif value="24" >Benin </option>
                                    <option @if(auth()->user()->country == '25')  Selected @endif value="25" >Bermuda </option>
                                    <option @if(auth()->user()->country == '26')  Selected @endif value="26" >Bhutan </option>
                                    <option @if(auth()->user()->country == '27')  Selected @endif value="27" >Bolivia </option>
                                    <option @if(auth()->user()->country == '28')  Selected @endif value="28" >Bonaire, Sint Eustatius and Saba </option>
                                    <option @if(auth()->user()->country == '29')  Selected @endif value="29" > Bosnia and Herzegovina </option>
                                    <option @if(auth()->user()->country == '30')  Selected @endif value="30" >Botswana </option>
                                    <option @if(auth()->user()->country == '31')  Selected @endif value="31" >Bouvet Island </option>
                                    <option @if(auth()->user()->country == '32')  Selected @endif value="32" >Brazil </option>
                                    <option @if(auth()->user()->country == '33')  Selected @endif value="33" >British Indian Ocean Territory </option>
                                    <option @if(auth()->user()->country == '34')  Selected @endif value="34" >Brunei </option>
                                    <option @if(auth()->user()->country == '35')  Selected @endif value="35" >Bulgaria </option>
                                    <option @if(auth()->user()->country == '36')  Selected @endif value="36" >Burkina Faso </option>
                                    <option @if(auth()->user()->country == '37')  Selected @endif value="37" >Burundi </option>
                                    <option @if(auth()->user()->country == '38')  Selected @endif value="38" >Cambodia </option>
                                    <option @if(auth()->user()->country == '39')  Selected @endif value="39" >Cameroon </option>
                                    <option @if(auth()->user()->country == '40')  Selected @endif value="40" >Canada </option>
                                    <option @if(auth()->user()->country == '41')  Selected @endif value="41" >Cape Verde </option>
                                    <option @if(auth()->user()->country == '42')  Selected @endif value="42" >Cayman Islands </option>
                                    <option @if(auth()->user()->country == '43')  Selected @endif value="43" >Central African Republic </option>
                                    <option @if(auth()->user()->country == '44')  Selected @endif value="44" >Chad </option>
                                    <option @if(auth()->user()->country == '45')  Selected @endif value="45" >Chile </option>
                                    <option @if(auth()->user()->country == '46')  Selected @endif value="46" >China </option>
                                    <option @if(auth()->user()->country == '47')  Selected @endif value="47" >Christmas Island </option>
                                    <option @if(auth()->user()->country == '48')  Selected @endif value="48" >Cocos (Keeling) Islands </option>
                                    <option @if(auth()->user()->country == '49')  Selected @endif value="49" >Colombia </option>
                                    <option @if(auth()->user()->country == '50')  Selected @endif value="50" >Comoros </option>
                                    <option @if(auth()->user()->country == '51')  Selected @endif value="51" >Congo </option>
                                    <option @if(auth()->user()->country == '52')  Selected @endif value="52" >Cook Islands </option>
                                    <option @if(auth()->user()->country == '53')  Selected @endif value="53" >Costa Rica </option>
                                    <option @if(auth()->user()->country == '54')  Selected @endif value="54" >Ivory Coast </option>
                                    <option @if(auth()->user()->country == '55')  Selected @endif value="55" >Croatia </option>
                                    <option @if(auth()->user()->country == '56')  Selected @endif value="56" >Cuba </option>
                                    <option @if(auth()->user()->country == '57')  Selected @endif value="57" >Curacao </option>
                                    <option @if(auth()->user()->country == '58')  Selected @endif value="58" >Cyprus </option>
                                    <option @if(auth()->user()->country == '59')  Selected @endif value="59" >Czech Republic </option>
                                    <option @if(auth()->user()->country == '60')  Selected @endif value="60" >Democratic Republic of the Congo </option>
                                    <option @if(auth()->user()->country == '61')  Selected @endif value="61" >Denmark </option>
                                    <option @if(auth()->user()->country == '62')  Selected @endif value="62" >Djibouti </option>
                                    <option @if(auth()->user()->country == '63')  Selected @endif value="63" >Dominica </option>
                                    <option @if(auth()->user()->country == '64')  Selected @endif value="64" >Dominican Republic </option>
                                    <option @if(auth()->user()->country == '65')  Selected @endif value="65" >Ecuador </option>
                                    <option @if(auth()->user()->country == '66')  Selected @endif value="66" >Egypt </option>
                                    <option @if(auth()->user()->country == '67')  Selected @endif value="67" >El Salvador </option>
                                    <option @if(auth()->user()->country == '68')  Selected @endif value="68" >Equatorial Guinea </option>
                                    <option @if(auth()->user()->country == '69')  Selected @endif value="69" >Eritrea </option>
                                    <option @if(auth()->user()->country == '70')  Selected @endif value="70" >Estonia </option>
                                    <option @if(auth()->user()->country == '71')  Selected @endif value="71" > Ethiopia </option>
                                    <option @if(auth()->user()->country == '72')  Selected @endif value="72" > Falkland Islands (Malvinas) </option>
                                    <option @if(auth()->user()->country == '73')  Selected @endif value="73" > Faroe Islands </option>
                                    <option @if(auth()->user()->country == '74')  Selected @endif value="74" > Fiji </option>
                                    <option @if(auth()->user()->country == '75')  Selected @endif value="75" > Finland </option>
                                    <option @if(auth()->user()->country == '76')  Selected @endif value="76" > France </option>
                                    <option @if(auth()->user()->country == '77')  Selected @endif value="77" > French Guiana </option>
                                    <option @if(auth()->user()->country == '78')  Selected @endif value="78" > French Polynesia </option>
                                    <option @if(auth()->user()->country == '79')  Selected @endif value="79" > French Southern Territories </option>
                                    <option @if(auth()->user()->country == '80')  Selected @endif value="80" > Gabon </option>
                                    <option @if(auth()->user()->country == '81')  Selected @endif value="81" > Gambia </option>
                                    <option @if(auth()->user()->country == '82')  Selected @endif value="82" > Georgia </option>
                                    <option @if(auth()->user()->country == '83')  Selected @endif value="83" > Germany </option>
                                    <option @if(auth()->user()->country == '84')  Selected @endif value="84" > Ghana </option>
                                    <option @if(auth()->user()->country == '85')  Selected @endif value="85" > Gibraltar </option>
                                    <option @if(auth()->user()->country == '86')  Selected @endif value="86" > Greece </option>
                                    <option @if(auth()->user()->country == '87')  Selected @endif value="87" > Greenland </option>
                                    <option @if(auth()->user()->country == '88')  Selected @endif value="88" > Grenada </option>
                                    <option @if(auth()->user()->country == '89')  Selected @endif value="89" > Guadaloupe </option>
                                    <option @if(auth()->user()->country == '90')  Selected @endif value="90" > Guam </option>
                                    <option @if(auth()->user()->country == '91')  Selected @endif value="91" > Guatemala </option>
                                    <option @if(auth()->user()->country == '92')  Selected @endif value="92" > Guernsey </option>
                                    <option @if(auth()->user()->country == '93')  Selected @endif value="93" > Guinea </option>
                                    <option @if(auth()->user()->country == '94')  Selected @endif value="94" > Guinea-Bissau </option>
                                    <option @if(auth()->user()->country == '95')  Selected @endif value="95" > Guyana </option>
                                    <option @if(auth()->user()->country == '96')  Selected @endif value="96" > Haiti </option>
                                    <option @if(auth()->user()->country == '97')  Selected @endif value="97" > Heard Island and McDonald Islands </option>
                                    <option @if(auth()->user()->country == '98')  Selected @endif value="98" > Honduras </option>
                                    <option @if(auth()->user()->country == '99')  Selected @endif value="99" > Hong Kong </option>
                                    <option @if(auth()->user()->country == '100')  Selected @endif value="100" > Hungary </option>
                                    <option @if(auth()->user()->country == '101')  Selected @endif value="101" > Iceland </option>
                                    <option @if(auth()->user()->country == '102')  Selected @endif value="102" > India </option>
                                    <option @if(auth()->user()->country == '103')  Selected @endif value="103" > Indonesia </option>
                                    <option @if(auth()->user()->country == '104')  Selected @endif value="104" > Iran </option>
                                    <option @if(auth()->user()->country == '105')  Selected @endif value="105" > Iraq </option>
                                    <option @if(auth()->user()->country == '106')  Selected @endif value="106" > Ireland </option>
                                    <option @if(auth()->user()->country == '107')  Selected @endif value="107" > Isle of Man </option>
                                    <option @if(auth()->user()->country == '108')  Selected @endif value="108" > Israel </option>
                                    <option @if(auth()->user()->country == '109')  Selected @endif value="109" > Italy </option>
                                    <option @if(auth()->user()->country == '110')  Selected @endif value="110" > Jamaica </option>
                                    <option @if(auth()->user()->country == '111')  Selected @endif value="111" > Japan </option>
                                    <option @if(auth()->user()->country == '112')  Selected @endif value="112" > Jersey </option>
                                    <option @if(auth()->user()->country == '113')  Selected @endif value="113" > Jordan </option>
                                    <option @if(auth()->user()->country == '114')  Selected @endif value="114" > Kazakhstan </option>
                                    <option @if(auth()->user()->country == '115')  Selected @endif value="115" > Kenya </option>
                                    <option @if(auth()->user()->country == '116')  Selected @endif value="116" > Kiribati </option>
                                    <option @if(auth()->user()->country == '117')  Selected @endif value="117" > Kosovo </option>
                                    <option @if(auth()->user()->country == '118')  Selected @endif value="118" > Kuwait </option>
                                    <option @if(auth()->user()->country == '119')  Selected @endif value="119" > Kyrgyzstan </option>
                                    <option @if(auth()->user()->country == '120')  Selected @endif value="120" > Laos </option>
                                    <option @if(auth()->user()->country == '121')  Selected @endif value="121" > Latvia </option>
                                    <option @if(auth()->user()->country == '122')  Selected @endif value="122" > Lebanon </option>
                                    <option @if(auth()->user()->country == '123')  Selected @endif value="123" > Lesotho </option>
                                    <option @if(auth()->user()->country == '124')  Selected @endif value="124" > Liberia </option>
                                    <option @if(auth()->user()->country == '125')  Selected @endif value="125" > Libya </option>
                                    <option @if(auth()->user()->country == '126')  Selected @endif value="126" > Liechtenstein </option>
                                    <option @if(auth()->user()->country == '127')  Selected @endif value="127" > Lithuania </option>
                                    <option @if(auth()->user()->country == '128')  Selected @endif value="128" > Luxembourg </option>
                                    <option @if(auth()->user()->country == '129')  Selected @endif value="129" > Macao </option>
                                    <option @if(auth()->user()->country == '130')  Selected @endif value="130" > Macedonia </option>
                                    <option @if(auth()->user()->country == '131')  Selected @endif value="131" > Madagascar </option>
                                    <option @if(auth()->user()->country == '132')  Selected @endif value="132" > Malawi </option>
                                    <option @if(auth()->user()->country == '133')  Selected @endif value="133" > Malaysia </option>
                                    <option @if(auth()->user()->country == '134')  Selected @endif value="134" > Maldives </option>
                                    <option @if(auth()->user()->country == '135')  Selected @endif value="135" > Mali </option>
                                    <option @if(auth()->user()->country == '136')  Selected @endif value="136" > Malta </option>
                                    <option @if(auth()->user()->country == '137')  Selected @endif value="137" > Marshall Islands </option>
                                    <option @if(auth()->user()->country == '138')  Selected @endif value="138" > Martinique </option>
                                    <option @if(auth()->user()->country == '139')  Selected @endif value="139" > Mauritania </option>
                                    <option @if(auth()->user()->country == '140')  Selected @endif value="140" > Mauritius </option>
                                    <option @if(auth()->user()->country == '141')  Selected @endif value="141" > Mayotte </option>
                                    <option @if(auth()->user()->country == '142')  Selected @endif value="142" > Mexico </option>
                                    <option @if(auth()->user()->country == '143')  Selected @endif value="143" > Micronesia </option>
                                    <option @if(auth()->user()->country == '144')  Selected @endif value="144" > Moldava </option>
                                    <option @if(auth()->user()->country == '145')  Selected @endif value="145" > Monaco </option>
                                    <option @if(auth()->user()->country == '146')  Selected @endif value="146" > Mongolia </option>
                                    <option @if(auth()->user()->country == '147')  Selected @endif value="147" > Montenegro </option>
                                    <option @if(auth()->user()->country == '148')  Selected @endif value="148" > Montserrat </option>
                                    <option @if(auth()->user()->country == '149')  Selected @endif value="149" > Morocco </option>
                                    <option @if(auth()->user()->country == '150')  Selected @endif value="150" > Mozambique </option>
                                    <option @if(auth()->user()->country == '151')  Selected @endif value="151" > Myanmar (Burma) </option>
                                    <option @if(auth()->user()->country == '152')  Selected @endif value="152" > Namibia </option>
                                    <option @if(auth()->user()->country == '153')  Selected @endif value="153" > Nauru </option>
                                    <option @if(auth()->user()->country == '154')  Selected @endif value="154" > Nepal </option>
                                    <option @if(auth()->user()->country == '155')  Selected @endif value="155" > Netherlands </option>
                                    <option @if(auth()->user()->country == '156')  Selected @endif value="156" > New Caledonia </option>
                                    <option @if(auth()->user()->country == '157')  Selected @endif value="157" > New Zealand </option>
                                    <option @if(auth()->user()->country == '158')  Selected @endif value="158" > Nicaragua </option>
                                    <option @if(auth()->user()->country == '159')  Selected @endif value="159" > Niger </option>
                                    <option @if(auth()->user()->country == '160')  Selected @endif value="160" > Nigeria </option>
                                    <option @if(auth()->user()->country == '161')  Selected @endif value="161" > Niue </option>
                                    <option @if(auth()->user()->country == '162')  Selected @endif value="162" > Norfolk Island </option>
                                    <option @if(auth()->user()->country == '163')  Selected @endif value="163" > North Korea </option>
                                    <option @if(auth()->user()->country == '164')  Selected @endif value="164" > Northern Mariana Islands </option>
                                    <option @if(auth()->user()->country == '165')  Selected @endif value="165" > Norway </option>
                                    <option @if(auth()->user()->country == '166')  Selected @endif value="166" > Oman </option>
                                    <option @if(auth()->user()->country == '167')  Selected @endif value="167" > Pakistan </option>
                                    <option @if(auth()->user()->country == '168')  Selected @endif value="168" > Palau </option>
                                    <option @if(auth()->user()->country == '169')  Selected @endif value="169" > Palestine </option>
                                    <option @if(auth()->user()->country == '170')  Selected @endif value="170" > Panama </option>
                                    <option @if(auth()->user()->country == '171')  Selected @endif value="171" > Papua New Guinea </option>
                                    <option @if(auth()->user()->country == '172')  Selected @endif value="172" > Paraguay </option>
                                    <option @if(auth()->user()->country == '173')  Selected @endif value="173" > Peru </option>
                                    <option @if(auth()->user()->country == '174')  Selected @endif value="174" > Phillipines </option>
                                    <option @if(auth()->user()->country == '175')  Selected @endif value="175" > Pitcairn </option>
                                    <option @if(auth()->user()->country == '176')  Selected @endif value="176" > Poland </option>
                                    <option @if(auth()->user()->country == '177')  Selected @endif value="177" > Portugal </option>
                                    <option @if(auth()->user()->country == '178')  Selected @endif value="178" > Puerto Rico </option>
                                    <option @if(auth()->user()->country == '179')  Selected @endif value="179" > Qatar </option>
                                    <option @if(auth()->user()->country == '180')  Selected @endif value="180" > Reunion </option>
                                    <option @if(auth()->user()->country == '181')  Selected @endif value="181" > Romania </option>
                                    <option @if(auth()->user()->country == '182')  Selected @endif value="182" > Russia </option>
                                    <option @if(auth()->user()->country == '183')  Selected @endif value="183" > Rwanda </option>
                                    <option @if(auth()->user()->country == '184')  Selected @endif value="184" > Saint Barthelemy  </option>
                                    <option @if(auth()->user()->country == '185')  Selected @endif value="185" > Saint Helena </option>
                                    <option @if(auth()->user()->country == '186')  Selected @endif value="186" > Saint Kitts and Nevis </option>
                                    <option @if(auth()->user()->country == '187')  Selected @endif value="187" > Saint Lucia </option>
                                    <option @if(auth()->user()->country == '188')  Selected @endif value="188" > Saint Martin </option>
                                    <option @if(auth()->user()->country == '189')  Selected @endif value="189" > Saint Pierre and Miquelon </option>
                                    <option @if(auth()->user()->country == '190')  Selected @endif value="190" > Saint Vincent and the Grenadines </option>
                                    <option @if(auth()->user()->country == '191')  Selected @endif value="191" > Samoa </option>
                                    <option @if(auth()->user()->country == '192')  Selected @endif value="192" > San Marino </option>
                                    <option @if(auth()->user()->country == '193')  Selected @endif value="193" > Sao Tome and Principe </option>
                                    <option @if(auth()->user()->country == '194')  Selected @endif value="194" > Saudi Arabia  </option>
                                    <option @if(auth()->user()->country == '195')  Selected @endif value="195" > Senegal </option>
                                    <option @if(auth()->user()->country == '196')  Selected @endif value="196" > Serbia </option>
                                    <option @if(auth()->user()->country == '197')  Selected @endif value="197" > Seychelles </option>
                                    <option @if(auth()->user()->country == '198')  Selected @endif value="198" > Sierra Leone </option>
                                    <option @if(auth()->user()->country == '199')  Selected @endif value="199" > Singapore </option>
                                    <option @if(auth()->user()->country == '200')  Selected @endif value="200" > Sint Maarten </option>
                                    <option @if(auth()->user()->country == '201')  Selected @endif value="201" > Slovakia </option>
                                    <option @if(auth()->user()->country == '202')  Selected @endif value="202" > Slovenia </option>
                                    <option @if(auth()->user()->country == '203')  Selected @endif value="203" > Solomon Islands </option>
                                    <option @if(auth()->user()->country == '204')  Selected @endif value="204" > Somalia </option>
                                    <option @if(auth()->user()->country == '205')  Selected @endif value="205" > South Africa </option>
                                    <option @if(auth()->user()->country == '206')  Selected @endif value="206" > South Georgia and the South Sandwich Islands </option>
                                    <option @if(auth()->user()->country == '207')  Selected @endif value="207" > South Korea </option>
                                    <option @if(auth()->user()->country == '208')  Selected @endif value="208" > South Sudan </option>
                                    <option @if(auth()->user()->country == '209')  Selected @endif value="209" > Spain </option>
                                    <option @if(auth()->user()->country == '210')  Selected @endif value="210" > Sri Lanka </option>
                                    <option @if(auth()->user()->country == '211')  Selected @endif value="211" > Sudan </option>
                                    <option @if(auth()->user()->country == '212')  Selected @endif value="212" > Suriname </option>
                                    <option @if(auth()->user()->country == '213')  Selected @endif value="213" > Svalbard and Jan Mayen </option>
                                    <option @if(auth()->user()->country == '214')  Selected @endif value="214" > Swaziland </option>
                                    <option @if(auth()->user()->country == '215')  Selected @endif value="215" > Sweden </option>
                                    <option @if(auth()->user()->country == '216')  Selected @endif value="216" > Switzerland </option>
                                    <option @if(auth()->user()->country == '217')  Selected @endif value="217" > Syria </option>
                                    <option @if(auth()->user()->country == '218')  Selected @endif value="218" > Taiwan </option>
                                    <option @if(auth()->user()->country == '219')  Selected @endif value="219" > Tajikistan </option>
                                    <option @if(auth()->user()->country == '220')  Selected @endif value="220" > Tanzania </option>
                                    <option @if(auth()->user()->country == '221')  Selected @endif value="221" > Thailand </option>
                                    <option @if(auth()->user()->country == '222')  Selected @endif value="222" > Timor-Leste (East Timor) </option>
                                    <option @if(auth()->user()->country == '223')  Selected @endif value="223" > Togo </option>
                                    <option @if(auth()->user()->country == '224')  Selected @endif value="224" > Tokelau </option>
                                    <option @if(auth()->user()->country == '225')  Selected @endif value="225" > Tonga </option>
                                    <option @if(auth()->user()->country == '226')  Selected @endif value="226" > Trinidad and Tobago </option>
                                    <option @if(auth()->user()->country == '227')  Selected @endif value="227" > Tunisia </option>
                                    <option @if(auth()->user()->country == '228')  Selected @endif value="228" > Turkey </option>
                                    <option @if(auth()->user()->country == '229')  Selected @endif value="229" > Turkmenistan </option>
                                    <option @if(auth()->user()->country == '230')  Selected @endif value="230" > Turks and Caicos Islands </option>
                                    <option @if(auth()->user()->country == '231')  Selected @endif value="231" > Tuvalu </option>
                                    <option @if(auth()->user()->country == '232')  Selected @endif value="232" > Uganda </option>
                                    <option @if(auth()->user()->country == '233')  Selected @endif value="233" > Ukraine </option>
                                    <option @if(auth()->user()->country == '234')  Selected @endif value="234" > United Arab Emirates </option>
                                    <option @if(auth()->user()->country == '235')  Selected @endif value="235" > United Kingdom </option>
                                    <option @if(auth()->user()->country == '236')  Selected @endif value="236" > United States </option>
                                    <option @if(auth()->user()->country == '237')  Selected @endif value="237" > United States Minor Outlying Islands </option>
                                    <option @if(auth()->user()->country == '238')  Selected @endif value="238" > Uruguay </option>
                                    <option @if(auth()->user()->country == '239')  Selected @endif value="239" > Uzbekistan </option>
                                    <option @if(auth()->user()->country == '240')  Selected @endif value="240" > Vanuatu </option>
                                    <option @if(auth()->user()->country == '241')  Selected @endif value="241" > Vatican City </option>
                                    <option @if(auth()->user()->country == '242')  Selected @endif value="242" > Venezuela </option>
                                    <option @if(auth()->user()->country == '243')  Selected @endif value="243" > Vietnam </option>
                                    <option @if(auth()->user()->country == '244')  Selected @endif value="244" > Virgin Islands, British </option>
                                    <option @if(auth()->user()->country == '245')  Selected @endif value="245" > Virgin Islands, US </option>
                                    <option @if(auth()->user()->country == '246')  Selected @endif value="246" > Wallis and Futuna </option>
                                    <option @if(auth()->user()->country == '247')  Selected @endif value="247" > Western Sahara </option>
                                    <option @if(auth()->user()->country == '248')  Selected @endif value="248" > Yemen </option>
                                    <option @if(auth()->user()->country == '249')  Selected @endif value="249" > Zambia </option>
                                    <option @if(auth()->user()->country == '250')  Selected @endif value="250" > Zimbabwe </option>
                                </select>

                                {{-- <input type="text" class="form-control  mb-2 " value="{{ auth()->user()->country }}" name="country"  placeholder="country"/> --}}
                            </div>
                            {{-- <div class="col-md-6">
                                <label class="mb-2">Country</label>
                                <input type="text" class="form-control  mb-2 " value="{{ auth()->user()->country }}" name="country"  placeholder="country"/>
                            </div> --}}

                            <div class="col-md-12 mt-3 mb-3">
                                <label class="mb-2">Address</label>
                                <input type="text" class="form-control  mb-2" value="{{ auth()->user()->address }}" name="address" placeholder="Address"/>
                            </div>


                            @if (auth()->user()->type == 2)
                            <hr>
                            <div class="right_section">
                                <div>
                                    <h4 style="color: white">Social Links</h4>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label class="mb-2">Facebook</label>
                                <input type="text" class="form-control  mb-2 " value="{{ auth()->user()->facebook_id }}" name="facebook_id"  placeholder="Facebook URL"/>
                            </div>
                            <div class="col-md-6">
                                <label class="mb-2">Twitter</label>
                                <input type="text" class="form-control  mb-2 " value="{{ auth()->user()->twitter_id }}" name="twitter_id"  placeholder="Twitter URL"/>
                            </div>
                            <div class="col-md-6">
                                <label class="mb-2">Google Plus</label>
                                <input type="text" class="form-control  mb-2 " value="{{ auth()->user()->google_id }}" name="google_id"  placeholder="Google Plus URL"/>
                            </div>
                            <div class="col-md-6">
                                <label class="mb-2">Instagram</label>
                                <input type="text" class="form-control  mb-2 " value="{{ auth()->user()->instagram_id }}" name="instagram_id"  placeholder="Instagram URL"/>
                            </div>
                        @endif




                           
                            {{-- Customer --}}
                            @if (auth()->user()->type == 1)
                                
                            {{-- Teacher --}}
                            @elseif (auth()->user()->type == 2)
                            <hr>
                            <div class="right_section">
                                <div>
                                    <h4 style="color: white">Bank Information</h4>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label class="mb-2">Bank Name</label>
                                <input type="text" class="form-control  mb-2 " value="{{ auth()->user()->bank_name }}" name="bank_name"  placeholder="Bank Name"/>
                            </div>
                            <div class="col-md-6">
                                <label class="mb-2">Bank Code/IFSC</label>
                                <input type="text" class="form-control  mb-2 " value="{{ auth()->user()->bank_code_ifsc }}" name="bank_code_ifsc"  placeholder="Bank Code/IFSC"/>
                            </div>
                            <div class="col-md-6">
                                <label class="mb-2">Account Number</label>
                                <input type="text" class="form-control  mb-2 " value="{{ auth()->user()->bank_account_number }}" name="bank_account_number"  placeholder="Account Number"/>
                            </div>
                            <div class="col-md-6">
                                <label class="mb-2">Account Holder Name</label>
                                <input type="text" class="form-control  mb-2 " value="{{ auth()->user()->bank_ac_holder_name }}" name="bank_ac_holder_name"  placeholder="Account Holder Name"/>
                            </div>
                            <div class="col-md-12">
                                <label class="mb-2">PayPal ID</label>
                                <input type="text" class="form-control  mb-2 " value="{{ auth()->user()->paypal_id_num }}" name="paypal_id_num"  placeholder="PayPal ID"/>
                            </div>

                            


                            {{-- Seller --}}
                            @elseif (auth()->user()->type == 5)
                            <hr>
                            <div class="right_section">
                                <div>
                                    <h4 style="color:var(--seller_text_color)">Bank Information</h4>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label class="mb-2">Bank Name</label>
                                <input type="text" class="form-control  mb-2 " value="{{ auth()->user()->bank_name }}" name="bank_name"  placeholder="Bank Name"/>
                            </div>
                            <div class="col-md-6">
                                <label class="mb-2">Bank Code/IFSC</label>
                                <input type="text" class="form-control  mb-2 " value="{{ auth()->user()->bank_code_ifsc }}" name="bank_code_ifsc"  placeholder="Bank Code/IFSC"/>
                            </div>
                            <div class="col-md-6">
                                <label class="mb-2">Account Number</label>
                                <input type="text" class="form-control  mb-2 " value="{{ auth()->user()->bank_account_number }}" name="bank_account_number"  placeholder="Account Number"/>
                            </div>
                            <div class="col-md-6">
                                <label class="mb-2">Account Holder Name</label>
                                <input type="text" class="form-control  mb-2 " value="{{ auth()->user()->bank_ac_holder_name }}" name="bank_ac_holder_name"  placeholder="Account Holder Name"/>
                            </div>
                            <div class="col-md-12">
                                <label class="mb-2">PayPal ID</label>
                                <input type="text" class="form-control  mb-2 " value="{{ auth()->user()->paypal_id_num }}" name="paypal_id_num"  placeholder="PayPal ID"/>
                            </div>

                            {{-- Affiliate --}}
                            @elseif (auth()->user()->type == 6)
                                

                            @else

                            @endif
                            <hr class="mt-3">
                        </div>

                        
                        <div class="col-md-12 ">
                            <label class="mb-2">About</label>
                            <textarea type="text"  id="summernote_three" class="form-control  mb-2"  name="description" placeholder="Details">{!! auth()->user()->description !!}</textarea>
                        </div>

                        <div class="row mt-3">
                            @if (auth()->user()->type == 2 || auth()->user()->type == 1)
                        
                            {{-- Certificer Content --}}
                            <hr>
                            <div class="right_section">
                                <div>
                                    <h4 style="color:var(--seller_text_color)">Certificates</h4>
                                </div>
                            </div>
                            
                            <div class="mg-t-10 mg-sm-t-0 add-data-content">
                                @if(auth()->user()->certificate->count() == 0)
                                <div class="d-flex align-items-center mt-2 row">
                                    <div class="col-md-7">
                                        <label class="form-control-label"><b>Certificate Name:</b></label>
                                        <div class="d-flex  align-items-center select-add-section " >
                                            <input type="text" name="certificates_name[]" value="{{ old('$certificates_name') }}" class=" form-control" placeholder="Certificate Name">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-control-label"><b>Certificate File:</b></label>
                                        <div class="d-flex  align-items-center select-add-section">
                                            <input type="file" name="certificates_file[]" accept="image/jpeg,image/gif,image/png,application/pdf" value="{{ old('$certificates_file') }}" class=" form-control">
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-1">
                                        <a id="plus-btn-data-content" href="javascript:void(0)" class="plus-btn-data-content px-1 p-0 m-0 ml-2"><i class="fas fa-plus"></i></a>
                                    </div>
                                </div>
                                @else
                                @foreach (auth()->user()->certificate as $k=>$item)
                                <div class="d-flex align-items-center mt-2 row">
                                    <div class="col-md-7">
                                        <label class="form-control-label"><b>Certificate Name:</b></label>
                                        <div class="d-flex  align-items-center select-add-section " >
                                            <input type="text" name="old_certificates_name[{{ $item->id }}]" value="{{ $item->certificates_name }}" class=" form-control" placeholder="Certificate Name">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <label class="form-control-label"><b>Certificate File:</b></label>
                                        <div class="d-flex  align-items-center select-add-section">
                                            <input type="file" accept="image/jpeg,image/gif,image/png,application/pdf" name="old_certificates_file[{{ $item->id }}]"  value="{{ $item->certificates_file }}" class=" form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                        <label class="form-control-label"><b>View:</b></label>
                                        <div class="d-flex  align-items-center select-add-section">
                                            <a class="btn btn-primary"  data-toggle="modal" data-target="#certificateModal{{ $k }}"> &nbsp;<i class="fa-solid fa-eye"></i></a>
                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                        @if($k == auth()->user()->certificate->count() - 1)
                                        <a id="plus-btn-data-content" href="javascript:void(0)" class="plus-btn-data-content px-1 p-0 m-0 ml-2"><i class="fas fa-plus"></i></a>
                                        @else
                                        <a audio_file_id="{{ $item->id }}" href="javascript:void(0)" class="minus-btn-data-old-audio px-1 p-0 m-0 ml-2"><i class="fas fa-minus-circle"></i></a>
                                        @endif
                                    </div>
                                </div>



                                 <!-- Modal -->
                                <div class="modal fade" id="certificateModal{{ $k }}" tabindex="-1" role="dialog" aria-labelledby="audioModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                        <h5 class="modal-title" id="audioModalLabel" style="color: black">{{ $item->certificates_name }}</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        </div>
                                        <div class="modal-body">
                                            @if ($item->extension == 'pdf')
                                                <iframe src="{{ $item->certificates_file_show  }}" width="100%" height="500"></iframe>
                                            @else
                                            <img src="{{ $item->certificates_file_show  }}" alt="image" style="height: 300px; width:450px">
                                            @endif
                                        </div>
                                        <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                    </div>
                                </div>


                                @endforeach 
                                @endif
                            </div>
                           

                            @endif
                        </div>

                        
                    </div>
                    

                    <button class="btn mt-3 shadow" type="submit" style="background-color:var(--button2_color); color:var(--button2_text_color)">Update Profile</button>
                </form>

            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

@endsection


@section('script')

<script src="{{asset('public/backend')}}/lib/summernote/summernote-bs4.min.js"></script>

<!--- Start Summernote Editor Js ---->
<script>

    $(document).ready(function() {
        /*** summernote editor one ***/
        $('#summernote').summernote({
            height: 150
        })
        /*** summernote editor two ***/
        $('#summernote_two').summernote({
            height: 150
        })

        $('#summernote_three').summernote({
            height: 150
        })
        $('#summernote_four').summernote({
            height: 150
        })

    });

    </script>
<!--- End Summernote Editor Js ---->



<script>

    //Audio Contents start
    $(document).ready(function() {
            $(document).on('click','#plus-btn-data-content',function(){



                var myvar = '<div class="d-flex align-items-center mt-2 row">'+
    '                                            <div class="col-md-7">'+
    '                                                <label class="form-control-label"><b>Certificate Name:</b></label>'+
    '                                                <div class="d-flex  align-items-center select-add-section " >'+
    '                                                    <input type="text" name="certificates_name[]" value="{{ old('$certificates_name') }}" class=" form-control" placeholder="Certificate Name">'+
    '                                                </div>'+
    '                                            </div>'+
    '                                            <div class="col-md-4">'+
    '                                                <label class="form-control-label"><b>Certificate File:</b></label>'+
    '                                                <div class="d-flex  align-items-center select-add-section">'+
    '                                                    <input type="file"  name="certificates_file[]" accept="image/jpeg,image/gif,image/png,application/pdf" value="{{ old('$certificates_file') }}" class=" form-control">'+
    '                                                </div>'+
    '                                            </div>'+
    '                                            <div class="col-md-1">'+
    '                                             <a href="javascript:void(0)" class="minus-btn-data-content px-1 p-0 m-0 ml-2"><i class="fas fa-minus-circle"></i></a>'+
    '                                            </div>'+
    '                                        </div>';


    $('.add-data-content').prepend(myvar);
                //console.log();
            });

            $(document).on('click','.minus-btn-data-content',function(){
                $(this).parent().parent().remove();
            });


        });
        $(document).on('click','.minus-btn-data-old-audio',function(){
            console.log(this);
             $(this).parent().parent().parent().append('<input type="hidden" name="delete_certificates_file[]" value="'+$(this).attr('audio_file_id')+'">');
             $(this).parent().parent().remove();
        });

    //Audio Contents end
    </script>



@endsection
