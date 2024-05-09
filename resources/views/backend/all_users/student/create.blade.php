@section('title')
    Admin - Add New Student
@endsection

@extends('Backend.layouts.layouts')

@section('main_contain')

    <!-- ########## START: MAIN PANEL ########## -->
    <div class="br-mainpanel">
        <div class="br-pageheader">
          <nav class="breadcrumb pd-0 mg-0 tx-12">
            <a class="breadcrumb-item" href="{{route('admin.dashboard')}}">Home</a>
            <a class="breadcrumb-item" href="{{route('admin.student.index')}}"> <i class="icon ion-reply text-22"></i> All Students</a>
          </nav>
        </div><!-- br-pageheader -->

        <div class="br-pagebody">
          <div class="br-section-wrapper">
            <h6 class="br-section-label text-center mb-4"> Add New Student</h6>
               {{-- validate start  --}}
               @if(count($errors) > 0)
               @foreach($errors->all() as $error)
                   <div class="alert alert-danger">{{ $error }}</div>
               @endforeach
               @endif
               {{-- validate End  --}}

            <!----- Start Add Category Form input ------->
            <div class="col-xl-12 mx-auto">
                <div class="form-layout form-layout-4 py-5">

                    <form action="{{ route('admin.student.store') }}" method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="row mt-4">
                            <div class="col-sm-4" >
                                <label class="form-control-label">Student Image: <span class="tx-danger">*</span></label>
                                <div class="mt-1 mr-2" style="position:relative;box-shadow: 0px 0px 1px 1px;width: 150px;">
                                    <img class="display-upload-img" style="width: 150px;height: 70px;" src="{{ asset("public/frontend/images/No-image.jpg") }}" alt="">
                                    <input type="file" name="image" class="form-control upload-img" placeholder="Enter Activity Image" style="position: absolute;top: 0;opacity: 0;height: 100%;">
                                </div>
                            </div>

                            {{-- <div class="col-sm-4" >
                                <label class="form-control-label">Teacher Video: <span class="tx-danger">*</span></label>
                                <div class="mt-1 mr-2" style="position:relative;box-shadow: 0px 0px 1px 1px;width: 150px;">
                                    <img class="display-upload-img" style="width: 150px;height: 70px;" src="{{ asset("public/frontend/images/no-video.jpg") }}" alt="">
                                    <input type="file" name="video" class="form-control upload-img" placeholder="Enter Activity Image" style="position: absolute;top: 0;opacity: 0;height: 100%;">
                                </div>
                            </div> --}}
                        </div>

                        <div class="row mt-4">
                            <div class="col-sm-4">
                                <label class="form-control-label">Student Name: <span class="tx-danger">*</span></label>
                                <div class="mg-t-10 mg-sm-t-0">
                                    <input type="text" name="name" class="form-control" placeholder="Enter Student Name" value="{{ old('name') }}" required>
                                </div>
                            </div>

                            <div class="col-sm-4">
                              <label class="form-control-label">Father Name: <span class="tx-danger">*</span></label>
                              <div class="mg-t-10 mg-sm-t-0">
                                  <input type="text" name="father_name" class="form-control" placeholder="Enter Foather Name" value="{{ old('father_name') }}" required>
                              </div>
                           </div>

                           <div class="col-sm-4">
                              <label class="form-control-label">Mother Name: <span class="tx-danger">*</span></label>
                              <div class="mg-t-10 mg-sm-t-0">
                                  <input type="text" name="mother_name" class="form-control" placeholder="Enter Mother Name" value="{{ old('mother_name') }}" required>
                              </div>
                           </div>

                           <div class="col-sm-4 mt-4">
                              <label class="form-control-label">Father/Mother NID: <span class="tx-danger">*</span></label>
                              <div class="mg-t-10 mg-sm-t-0">
                                  <input type="text" name="father_mother_nid" class="form-control" placeholder="Enter Fother/Mother NID" value="{{ old('father_mother_nid') }}" required>
                              </div>
                           </div>

                            <div class="col-sm-4 mt-4">
                                <label class="form-control-label">Mobile Number: <span class="tx-danger">*</span></label>
                                <div class="cmg-t-10 mg-sm-t-0">
                                <input value="{{ old('mobile') }}" type="text" name="mobile" class="form-control" placeholder="Enter Mobile Number" required>
                                </div>
                            </div>
                            <div class="col-sm-4 mt-4">
                                <label class="form-control-label">Email: <span class="tx-danger">*</span></label>
                                <div class="mg-t-10 mg-sm-t-0">
                                    <input value="{{ old('email') }}" type="email" name="email" class="form-control" placeholder="Enter Email" required>
                                </div>
                            </div>
                        </div>

                        <div class="row mt-4">
                            <div class="col-sm-4">
                                <label class=" form-control-label">NID:</label>
                                <div class="mg-t-10 mg-sm-t-0">
                                    <input value="{{ old('nid') }}" type="text" name="nid" class="form-control" placeholder="Enter NID">
                                </div>
                            </div>

                            <div class="col-sm-4">
                                <label class=" form-control-label">Gender:</label>
                                <select  class="form-control" name="gender" required>
                                    <option value="">Select Gender</option>
                                    <option  value="0">Male</option>
                                    <option  value="1">Female</option>
                                </select>
                            </div>

                            <div class="col-sm-4">
                                <label class=" form-control-label">Date of Birth:</label>
                                <div class="mg-t-10 mg-sm-t-0">
                                    <input value="{{ old('dob') }}" type="date" name="dob" class="form-control" placeholder="Enter Date of Birth">
                                </div>
                            </div>
                        </div>

                        <div class="row mt-4">
                           <div class="col-sm-4">
                              <label class=" form-control-label">Previous School:</label>
                              <div class="mg-t-10 mg-sm-t-0">
                                  <input value="{{ old('previous_school') }}" type="text" name="previous_school" class="form-control" placeholder="Enter previous school">
                              </div>
                          </div>

                            <div class="col-sm-4">
                                <label class=" form-control-label">Qualification:</label>
                                <div class="mg-t-10 mg-sm-t-0">
                                    <input value="{{ old('qualification') }}" type="text" name="qualification" class="form-control" placeholder="Enter qualification">
                                </div>
                            </div>

                            <div class="col-sm-4">
                                <label class=" form-control-label">Experience:</label>
                                <div class="mg-t-10 mg-sm-t-0">
                                    <input value="{{ old('experience') }}" type="text" name="experience" class="form-control" placeholder="Enter experience">
                                </div>
                            </div>

                        </div>

                        <div class="row mt-4">

                           <div class="col-sm-4">
                              <label class=" form-control-label">Language:</label>
                              <div class="mg-t-10 mg-sm-t-0">
                                  <select class="form-select form-control" name="language">
                                      <option value="">select one language</option>
                                      <option value="1">Bangla</option>
                                      <option value="2" >English</option>
                                      <option value="3">Hindi</option>
                                      <option value="4" >Arabic</option>
                                  </select>
                                  {{-- <input value="{{ old('language') }}" type="text" name="language" class="form-control" placeholder="Enter language"> --}}
                              </div>
                          </div>

                            <div class="col-sm-4">
                                <label class=" form-control-label">Country:</label>
                                <div class="mg-t-10 mg-sm-t-0">
                                    <select class="form-control" name="country">
                                        <option value="">Select One Country</option>
                                        <option value="1"> Afghanistan </option>
                                        <option value="2" >Aland Islands </option>
                                         <option value="3" >
                                            Albania</option>
                                         <option value="4" >
                                            Algeria</option>
                                         <option value="5" >
                                            American Samoa</option>
                                         <option value="6" >
                                            Andorra</option>
                                         <option value="7" >
                                            Angola</option>
                                         <option value="8" >
                                            Anguilla</option>
                                         <option value="9" >
                                            Antarctica</option>
                                         <option value="10" >
                                            Antigua and Barbuda</option>
                                         <option value="11" >
                                            Argentina</option>
                                         <option value="12" >
                                            Armenia</option>
                                         <option value="13" >
                                            Aruba</option>
                                         <option value="14" >
                                            Australia</option>
                                         <option value="15" >
                                            Austria</option>
                                         <option value="16" >
                                            Azerbaijan</option>
                                         <option value="17" >
                                            Bahamas</option>
                                         <option value="18" >
                                            Bahrain</option>
                                         <option value="19" >
                                            Bangladesh</option>
                                         <option value="20" >
                                            Barbados</option>
                                         <option value="21" >
                                            Belarus</option>
                                         <option value="22" >
                                            Belgium</option>
                                         <option value="23" >
                                            Belize</option>
                                         <option value="24" >
                                            Benin</option>
                                         <option value="25" >
                                            Bermuda</option>
                                         <option value="26" >
                                            Bhutan </option>
                                         <option value="27" >
                                            Bolivia</option>
                                         <option value="28" >
                                            Bonaire, Sint Eustatius and Saba </option>
                                         <option value="29" >
                                            Bosnia and Herzegovina</option>
                                         <option value="30" >
                                            Botswana</option>
                                         <option value="31" >
                                            Bouvet Island</option>
                                         <option value="32" >
                                            Brazil</option>
                                         <option value="33" >
                                            British Indian Ocean Territory</option>
                                         <option value="34" >
                                            Brunei</option>
                                         <option value="35" >
                                            Bulgaria</option>
                                         <option value="36" >
                                            Burkina Faso</option>
                                         <option value="37" >
                                            Burundi</option>
                                         <option value="38" >
                                            Cambodia</option>
                                         <option value="39" >
                                            Cameroon</option>
                                         <option value="40" >
                                            Canada                                    </option>
                                         <option value="41" >
                                            Cape Verde                                    </option>
                                         <option value="42" >
                                            Cayman Islands                                    </option>
                                         <option value="43" >
                                            Central African Republic                                    </option>
                                         <option value="44" >
                                            Chad                                    </option>
                                         <option value="45" >
                                            Chile                                    </option>
                                         <option value="46" >
                                            China                                    </option>
                                         <option value="47" >
                                            Christmas Island                                    </option>
                                         <option value="48" >
                                            Cocos (Keeling) Islands                                    </option>
                                         <option value="49" >
                                            Colombia                                    </option>
                                         <option value="50" >
                                            Comoros                                    </option>
                                         <option value="51" >
                                            Congo                                    </option>
                                         <option value="52" >
                                            Cook Islands                                    </option>
                                         <option value="53" >
                                            Costa Rica                                    </option>
                                         <option value="55" >
                                            Croatia                                    </option>
                                         <option value="56" >
                                            Cuba                                    </option>
                                         <option value="57" >
                                            Curacao                                    </option>
                                         <option value="58" >
                                            Cyprus                                    </option>
                                         <option value="59" >
                                            Czech Republic                                    </option>
                                         <option value="60" >
                                            Democratic Republic of the Congo                                    </option>
                                         <option value="61" >
                                            Denmark                                    </option>
                                         <option value="62" >
                                            Djibouti                                    </option>
                                         <option value="63" >
                                            Dominica                                    </option>
                                         <option value="64" >
                                            Dominican Republic                                    </option>
                                         <option value="65" >
                                            Ecuador                                    </option>
                                         <option value="66" >
                                            Egypt                                    </option>
                                         <option value="67" >
                                            El Salvador                                    </option>
                                         <option value="68" >
                                            Equatorial Guinea                                    </option>
                                         <option value="69" >
                                            Eritrea                                    </option>
                                         <option value="70" >
                                            Estonia                                    </option>
                                         <option value="71" >
                                            Ethiopia                                    </option>
                                         <option value="72" >
                                            Falkland Islands (Malvinas)                                    </option>
                                         <option value="73" >
                                            Faroe Islands                                    </option>
                                         <option value="74" >
                                            Fiji                                    </option>
                                         <option value="75" >
                                            Finland                                    </option>
                                         <option value="76" >
                                            France                                    </option>
                                         <option value="77" >
                                            French Guiana                                    </option>
                                         <option value="78" >
                                            French Polynesia                                    </option>
                                         <option value="79" >
                                            French Southern Territories                                    </option>
                                         <option value="80" >
                                            Gabon                                    </option>
                                         <option value="81" >
                                            Gambia                                    </option>
                                         <option value="82" >
                                            Georgia                                    </option>
                                         <option value="83" >
                                            Germany                                    </option>
                                         <option value="84" >
                                            Ghana                                    </option>
                                         <option value="85" >
                                            Gibraltar                                    </option>
                                         <option value="86" >
                                            Greece                                    </option>
                                         <option value="87" >
                                            Greenland                                    </option>
                                         <option value="88" >
                                            Grenada                                    </option>
                                         <option value="89" >
                                            Guadaloupe                                    </option>
                                         <option value="90" >
                                            Guam                                    </option>
                                         <option value="91" >
                                            Guatemala                                    </option>
                                         <option value="92" >
                                            Guernsey                                    </option>
                                         <option value="93" >
                                            Guinea                                    </option>
                                         <option value="94" >
                                            Guinea-Bissau                                    </option>
                                         <option value="95" >
                                            Guyana                                    </option>
                                         <option value="96" >
                                            Haiti                                    </option>
                                         <option value="97" >
                                            Heard Island and McDonald Islands                                    </option>
                                         <option value="98" >
                                            Honduras                                    </option>
                                         <option value="99" >
                                            Hong Kong                                    </option>
                                         <option value="100" >
                                            Hungary                                    </option>
                                         <option value="101" >
                                            Iceland                                    </option>
                                         <option value="102" >
                                            India                                    </option>
                                         <option value="103" >
                                            Indonesia                                    </option>
                                         <option value="104" >
                                            Iran                                    </option>
                                         <option value="105" >
                                            Iraq                                    </option>
                                         <option value="106" >
                                            Ireland                                    </option>
                                         <option value="107" >
                                            Isle of Man                                    </option>
                                         <option value="108" >
                                            Israel                                    </option>
                                         <option value="109" >
                                            Italy                                    </option>
                                         <option value="54" >
                                            Ivory Coast                                    </option>
                                         <option value="110" >
                                            Jamaica                                    </option>
                                         <option value="111" >
                                            Japan                                    </option>
                                         <option value="112" >
                                            Jersey                                    </option>
                                         <option value="113" >
                                            Jordan                                    </option>
                                         <option value="114" >
                                            Kazakhstan                                    </option>
                                         <option value="115" >
                                            Kenya                                    </option>
                                         <option value="116" >
                                            Kiribati                                    </option>
                                         <option value="117" >
                                            Kosovo                                    </option>
                                         <option value="118" >
                                            Kuwait                                    </option>
                                         <option value="119" >
                                            Kyrgyzstan                                    </option>
                                         <option value="120" >
                                            Laos                                    </option>
                                         <option value="121" >
                                            Latvia                                    </option>
                                         <option value="122" >
                                            Lebanon                                    </option>
                                         <option value="123" >
                                            Lesotho                                    </option>
                                         <option value="124" >
                                            Liberia                                    </option>
                                         <option value="125" >
                                            Libya                                    </option>
                                         <option value="126" >
                                            Liechtenstein                                    </option>
                                         <option value="127" >
                                            Lithuania                                    </option>
                                         <option value="128" >
                                            Luxembourg                                    </option>
                                         <option value="129" >
                                            Macao                                    </option>
                                         <option value="130" >
                                            Macedonia                                    </option>
                                         <option value="131" >
                                            Madagascar                                    </option>
                                         <option value="132" >
                                            Malawi                                    </option>
                                         <option value="133" >
                                            Malaysia                                    </option>
                                         <option value="134" >
                                            Maldives                                    </option>
                                         <option value="135" >
                                            Mali                                    </option>
                                         <option value="136" >
                                            Malta                                    </option>
                                         <option value="137" >
                                            Marshall Islands                                    </option>
                                         <option value="138" >
                                            Martinique                                    </option>
                                         <option value="139" >
                                            Mauritania                                    </option>
                                         <option value="140" >
                                            Mauritius                                    </option>
                                         <option value="141" >
                                            Mayotte                                    </option>
                                         <option value="142" >
                                            Mexico                                    </option>
                                         <option value="143" >
                                            Micronesia                                    </option>
                                         <option value="144" >
                                            Moldava                                    </option>
                                         <option value="145" >
                                            Monaco                                    </option>
                                         <option value="146" >
                                            Mongolia                                    </option>
                                         <option value="147" >
                                            Montenegro                                    </option>
                                         <option value="148" >
                                            Montserrat                                    </option>
                                         <option value="149" >
                                            Morocco                                    </option>
                                         <option value="150" >
                                            Mozambique                                    </option>
                                         <option value="151" >
                                            Myanmar (Burma)                                    </option>
                                         <option value="152" >
                                            Namibia                                    </option>
                                         <option value="153" >
                                            Nauru                                    </option>
                                         <option value="154" >
                                            Nepal                                    </option>
                                         <option value="155" >
                                            Netherlands                                    </option>
                                         <option value="156" >
                                            New Caledonia                                    </option>
                                         <option value="157" >
                                            New Zealand                                    </option>
                                         <option value="158" >
                                            Nicaragua                                    </option>
                                         <option value="159" >
                                            Niger                                    </option>
                                         <option value="160" >
                                            Nigeria                                    </option>
                                         <option value="161" >
                                            Niue                                    </option>
                                         <option value="162" >
                                            Norfolk Island                                    </option>
                                         <option value="163" >
                                            North Korea                                    </option>
                                         <option value="164" >
                                            Northern Mariana Islands                                    </option>
                                         <option value="165" >
                                            Norway                                    </option>
                                         <option value="166" >
                                            Oman                                    </option>
                                         <option value="167" >
                                            Pakistan                                    </option>
                                         <option value="168" >
                                            Palau                                    </option>
                                         <option value="169" >
                                            Palestine                                    </option>
                                         <option value="170" >
                                            Panama                                    </option>
                                         <option value="171" >
                                            Papua New Guinea                                    </option>
                                         <option value="172" >
                                            Paraguay                                    </option>
                                         <option value="173" >
                                            Peru                                    </option>
                                         <option value="174" >
                                            Phillipines                                    </option>
                                         <option value="175" >
                                            Pitcairn                                    </option>
                                         <option value="176" >
                                            Poland                                    </option>
                                         <option value="177" >
                                            Portugal                                    </option>
                                         <option value="178" >
                                            Puerto Rico                                    </option>
                                         <option value="179" >
                                            Qatar                                    </option>
                                         <option value="180" >
                                            Reunion                                    </option>
                                         <option value="181" >
                                            Romania                                    </option>
                                         <option value="182" >
                                            Russia                                    </option>
                                         <option value="183" >
                                            Rwanda                                    </option>
                                         <option value="184" >
                                            Saint Barthelemy                                    </option>
                                         <option value="185" >
                                            Saint Helena                                    </option>
                                         <option value="186" >
                                            Saint Kitts and Nevis                                    </option>
                                         <option value="187" >
                                            Saint Lucia                                    </option>
                                         <option value="188" >
                                            Saint Martin                                    </option>
                                         <option value="189" >
                                            Saint Pierre and Miquelon                                    </option>
                                         <option value="190" >
                                            Saint Vincent and the Grenadines                                    </option>
                                         <option value="191" >
                                            Samoa                                    </option>
                                         <option value="192" >
                                            San Marino                                    </option>
                                         <option value="193" >
                                            Sao Tome and Principe                                    </option>
                                         <option value="194" >
                                            Saudi Arabia                                    </option>
                                         <option value="195" >
                                            Senegal                                    </option>
                                         <option value="196" >
                                            Serbia                                    </option>
                                         <option value="197" >
                                            Seychelles                                    </option>
                                         <option value="198" >
                                            Sierra Leone                                    </option>
                                         <option value="199" >
                                            Singapore                                    </option>
                                         <option value="200" >
                                            Sint Maarten                                    </option>
                                         <option value="201" >
                                            Slovakia                                    </option>
                                         <option value="202" >
                                            Slovenia                                    </option>
                                         <option value="203" >
                                            Solomon Islands                                    </option>
                                         <option value="204" >
                                            Somalia                                    </option>
                                         <option value="205" >
                                            South Africa                                    </option>
                                         <option value="206" >
                                            South Georgia and the South Sandwich Islands</option>
                                         <option value="207" >
                                            South Korea                                    </option>
                                         <option value="208" >
                                            South Sudan                                    </option>
                                         <option value="209" >
                                            Spain                                    </option>
                                         <option value="210" >
                                            Sri Lanka                                    </option>
                                         <option value="211" >
                                            Sudan                                    </option>
                                         <option value="212" >
                                            Suriname                                    </option>
                                         <option value="213" >
                                            Svalbard and Jan Mayen                                    </option>
                                         <option value="214" >
                                            Swaziland                                    </option>
                                         <option value="215" >
                                            Sweden                                    </option>
                                         <option value="216" >
                                            Switzerland                                    </option>
                                         <option value="217" >
                                            Syria                                    </option>
                                         <option value="218" >
                                            Taiwan                                    </option>
                                         <option value="219" >
                                            Tajikistan                                    </option>
                                         <option value="220" >
                                            Tanzania                                    </option>
                                         <option value="221" >
                                            Thailand                                    </option>
                                         <option value="222" >
                                            Timor-Leste (East Timor)</option>
                                         <option value="223" >
                                            Togo</option>
                                         <option value="224" >
                                            Tokelau</option>
                                         <option value="225" >
                                            Tonga</option>
                                         <option value="226" >
                                            Trinidad and Tobago</option>
                                         <option value="227" >
                                            Tunisia</option>
                                         <option value="228" >
                                            Turkey</option>
                                         <option value="229" >
                                            Turkmenistan</option>
                                         <option value="230" >
                                            Turks and Caicos Islands</option>
                                         <option value="231" >
                                            Tuvalu</option>
                                         <option value="232" >
                                            Uganda</option>
                                         <option value="233" >
                                            Ukraine</option>
                                         <option value="234" >
                                            United Arab Emirates</option>
                                         <option value="235" >
                                            United Kingdom</option>
                                         <option value="236" >
                                            United States</option>
                                         <option value="237" >
                                            United States Minor Outlying Islands</option>
                                         <option value="238" >
                                            Uruguay</option>
                                         <option value="239" >
                                            Uzbekistan</option>
                                         <option value="240" >
                                            Vanuatu</option>
                                         <option value="241" >
                                            Vatican City</option>
                                         <option value="242" >
                                            Venezuela</option>
                                         <option value="243" >
                                            Vietnam</option>
                                         <option value="244" >
                                            Virgin Islands, British</option>
                                         <option value="245" >
                                            Virgin Islands, US</option>
                                         <option value="246" >
                                            Wallis and Futuna</option>
                                         <option value="247" >
                                            Western Sahara</option>
                                         <option value="248" >
                                            Yemen</option>
                                         <option value="249" >
                                            Zambia</option>
                                         <option value="250" >
                                            Zimbabwe</option>
                                    </select>
                                </div>
                            </div>


                            <div class="col-sm-4">
                                <label class=" form-control-label">Present Address:</label>
                                <div class="mg-t-10 mg-sm-t-0">
                                    <input value="{{ old('address') }}" type="text" name="address" class="form-control" placeholder="Enter Present address">
                                </div>
                            </div>

                            <div class="col-sm-4 mt-4">
                              <label class=" form-control-label">permanent address:</label>
                              <div class="mg-t-10 mg-sm-t-0">
                                  <input value="{{ old('per_address') }}" type="text" name="address" class="form-control" placeholder="Enter permanent address">
                              </div>
                           </div>

                        </div>


                        <div class="row mt-4 mb-5">
                            <div class="col-sm-12">
                                <label class=" form-control-label">Description:</label>
                                <div class="mg-t-10 mg-sm-t-0">
                                    <textarea value="{{ old('description') }}" id="summernote" type="text" name="description" class="form-control" placeholder="Enter description"></textarea>
                                </div>
                            </div>

                        </div>


                        <hr>
                        <div class="right_section">
                            <div>
                                <h4>Certificates</h4>
                            </div>
                        </div>
                        
                        <div class="mg-t-10 mg-sm-t-0 add-data-content">
                            
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
                           
                        </div>



                        <hr>
                        <div class="row mt-3">
                          <div class="col-sm-12 mg-t-10 mg-sm-t-0 text-right">
                            <a href="{{route('admin.teacher.index')}}" type="button" class="btn btn-secondary text-white mr-2" >Cancel</a>
                            <button type="submit" class="btn btn-info ">Save</button>
                          </div>
                        </div>
                    </form>

                </div><!-- form-layout -->
            </div><!-- col-6 -->
            <!----- Start Add Category Form input ------->
          </div><!-- br-section-wrapper -->
        </div><!-- br-pagebody -->

    </div><!-- br-mainpanel -->
    <!-- ########## END: MAIN PANEL ########## -->
@endsection


@section('script')
    
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
