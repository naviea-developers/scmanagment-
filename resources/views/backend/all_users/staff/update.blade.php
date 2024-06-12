
<div class="br-section-wrapper data-update">
  <h6 class="br-section-label text-center mb-4">Update staff</h6>
    {{-- validate start  --}}
    
    <div id="update_errors"></div>
    {{-- validate End  --}}

  <!----- Start Add Category Form input ------->
  <div class="col-xl-12 mx-auto">
      <div class="form-layout form-layout-4 py-5">

          <form id="data-form-update" action="{{ route('admin.staff.update', $staff->id) }}" method="post" enctype="multipart/form-data">
              @csrf

              
              <div class="row mt-4">
                <div class="col-sm-4" >
                    <label class="form-control-label">Staff Image: <span class="tx-danger">*</span></label>
                    <div class="mt-1 mr-2" style="position:relative;box-shadow: 0px 0px 1px 1px;width: 150px;">
                        <img class="display-upload-img" style="width: 150px;height: 70px;" src="{{ $staff->image_show }}" alt="">
                        <input type="file" name="image" class="form-control upload-img" placeholder="Enter Activity Image" style="position: absolute;top: 0;opacity: 0;height: 100%;">
                    </div>
                </div>
            </div>

            <div class="row mt-4">
                <div class="col-sm-4">
                    <label class="form-control-label">Staff Name: <span class="tx-danger">*</span></label>
                    <div class="mg-t-10 mg-sm-t-0">
                    <input type="text" name="name" class="form-control" placeholder="Enter Staff Name" value="{{ $staff->name}}" required>
                </div>
                </div>

                <div class="col-sm-4">
                    <label class=" form-control-label">Designation:</label>
                    <select  class="form-control" name="designation_id" required>
                        <option value="">Select Designation</option>
                        @foreach ($designations as $designation)
                        <option @if ($designation->id == $staff->designation_id) Selected @endif  value="{{ $designation->id }}">{{ $designation->name }}</option>
                        @endforeach
                    </select>
                </div>

               


                <div class="col-sm-4">
                    <label class="form-control-label">Mobile Number: <span class="tx-danger">*</span></label>
                    <div class="cmg-t-10 mg-sm-t-0">
                    <input value="{{ $staff->mobile}}" type="text" name="mobile" class="form-control" placeholder="Enter Mobile Number" required>
                    </div>
                </div>
                <div class="col-sm-4 mt-3">
                    <label class="form-control-label">Email: <span class="tx-danger">*</span></label>
                    <div class="mg-t-10 mg-sm-t-0">
                        <input value="{{ $staff->email }}" type="email" name="email" class="form-control" placeholder="Enter Email" required>
                    </div>
                </div>

                <div class="col-sm-4 mt-3">
                    <label class=" form-control-label">NID:</label>
                    <div class="mg-t-10 mg-sm-t-0">
                        <input value="{{ $staff->nid }}" type="text" name="nid" class="form-control" placeholder="Enter NID">
                    </div>
                </div>

                <div class="col-sm-4 mt-3">
                    <label class=" form-control-label">Gender:</label>
                    <select  class="form-control" name="gender" required>
                        <option value="">Select Gender</option>
                        <option  value="0" @if ($staff->gender=='0') Selected  @endif>Male</option>
                        <option  value="1" @if ($staff->gender=='1') Selected  @endif>Female</option>
                    </select>
                </div>

                <div class="col-sm-4 mt-3">
                    <label class=" form-control-label">Date of Birth:</label>
                    <div class="mg-t-10 mg-sm-t-0">
                        <input value="{{ $staff->dob }}" type="date" name="dob" class="form-control" placeholder="Enter Date of Birth">
                    </div>
                </div>

                <div class="col-sm-4 mt-3">
                    <label class=" form-control-label">Qualification:</label>
                    <div class="mg-t-10 mg-sm-t-0">
                        <input value="{{ $staff->qualification}}" type="text" name="qualification" class="form-control" placeholder="Enter qualification">
                    </div>
                </div>

                <div class="col-sm-4 mt-3">
                    <label class=" form-control-label">Experience:</label>
                    <div class="mg-t-10 mg-sm-t-0">
                        <input value="{{ $staff->experience}}" type="text" name="experience" class="form-control" placeholder="Enter experience">
                    </div>
                </div>

                <div class="col-sm-4 mt-3">
                    <label class=" form-control-label">Language:</label>
                    <div class="mg-t-10 mg-sm-t-0">
                        <select class="form-select form-control" name="language">
                            <option value="">select one language</option>
                            <option @if($staff->language == '1')  Selected @endif value="1"> Bangla </option>
                            <option @if($staff->language == '2')  Selected @endif value="2" >English </option>
                            <option @if($staff->language == '3')  Selected @endif value="3" >Hindi </option>
                            <option @if($staff->language == '4')  Selected @endif value="4" >Arabic </option>
                        </select>
                    </div>
                </div>


                <div class="col-sm-4 mt-3">
                    <label class=" form-control-label">Institution:</label>
                    <div class="mg-t-10 mg-sm-t-0">
                        <input value="{{ $staff->institution}}" type="text" name="institution" class="form-control" placeholder="Enter institution name">
                    </div>
                </div>


                <div class="col-sm-4 mt-3">
                    <label class=" form-control-label">Country:</label>
                    <div class="mg-t-10 mg-sm-t-0">
                        <select class="form-control" name="country">
                            <option value="">select one country</option>
                            <option @if($staff->country == '1')  Selected @endif value="1"> Afghanistan </option>
                            <option @if($staff->country == '2')  Selected @endif value="2" >Aland Islands </option>
                            <option @if($staff->country == '3')  Selected @endif value="3" >Albania </option>
                            <option @if($staff->country == '4')  Selected @endif value="4" >Algeria </option>
                            <option @if($staff->country == '5')  Selected @endif value="5" >American Samoa </option>
                            <option @if($staff->country == '6')  Selected @endif value="6" >Andorra </option>
                            <option @if($staff->country == '7')  Selected @endif value="7" >Angola </option>
                            <option @if($staff->country == '8')  Selected @endif value="8" >Anguilla </option>
                            <option @if($staff->country == '9')  Selected @endif value="9" >Antarctica </option>
                            <option @if($staff->country == '10')  Selected @endif value="10" >Antigua and Barbuda </option>
                            <option @if($staff->country == '11')  Selected @endif value="11" >Argentina </option>
                            <option @if($staff->country == '12')  Selected @endif value="12" >Armenia </option>
                            <option @if($staff->country == '13')  Selected @endif value="13" >Aruba </option>
                            <option @if($staff->country == '14')  Selected @endif value="14" >Australia </option>
                            <option @if($staff->country == '15')  Selected @endif value="15" >Austria </option>
                            <option @if($staff->country == '16')  Selected @endif value="16" >Azerbaijan </option>
                            <option @if($staff->country == '17')  Selected @endif value="17" >Bahamas </option>
                            <option @if($staff->country == '18')  Selected @endif value="18" >Bahrain </option>
                            <option @if($staff->country == '19')  Selected @endif value="19" >Bangladesh </option>
                            <option @if($staff->country == '20')  Selected @endif value="20" >Barbados </option>
                            <option @if($staff->country == '21')  Selected @endif value="21" >Belarus </option>
                            <option @if($staff->country == '22')  Selected @endif value="22" >Belgium </option>
                            <option @if($staff->country == '23')  Selected @endif value="23" >Belize </option>
                            <option @if($staff->country == '24')  Selected @endif value="24" >Benin </option>
                            <option @if($staff->country == '25')  Selected @endif value="25" >Bermuda </option>
                            <option @if($staff->country == '26')  Selected @endif value="26" >Bhutan </option>
                            <option @if($staff->country == '27')  Selected @endif value="27" >Bolivia </option>
                            <option @if($staff->country == '28')  Selected @endif value="28" >Bonaire, Sint Eustatius and Saba </option>
                            <option @if($staff->country == '29')  Selected @endif value="29" > Bosnia and Herzegovina </option>
                            <option @if($staff->country == '30')  Selected @endif value="30" >Botswana </option>
                            <option @if($staff->country == '31')  Selected @endif value="31" >Bouvet Island </option>
                            <option @if($staff->country == '32')  Selected @endif value="32" >Brazil </option>
                            <option @if($staff->country == '33')  Selected @endif value="33" >British Indian Ocean Territory </option>
                            <option @if($staff->country == '34')  Selected @endif value="34" >Brunei </option>
                            <option @if($staff->country == '35')  Selected @endif value="35" >Bulgaria </option>
                            <option @if($staff->country == '36')  Selected @endif value="36" >Burkina Faso </option>
                            <option @if($staff->country == '37')  Selected @endif value="37" >Burundi </option>
                            <option @if($staff->country == '38')  Selected @endif value="38" >Cambodia </option>
                            <option @if($staff->country == '39')  Selected @endif value="39" >Cameroon </option>
                            <option @if($staff->country == '40')  Selected @endif value="40" >Canada </option>
                            <option @if($staff->country == '41')  Selected @endif value="41" >Cape Verde </option>
                            <option @if($staff->country == '42')  Selected @endif value="42" >Cayman Islands </option>
                            <option @if($staff->country == '43')  Selected @endif value="43" >Central African Republic </option>
                            <option @if($staff->country == '44')  Selected @endif value="44" >Chad </option>
                            <option @if($staff->country == '45')  Selected @endif value="45" >Chile </option>
                            <option @if($staff->country == '46')  Selected @endif value="46" >China </option>
                            <option @if($staff->country == '47')  Selected @endif value="47" >Christmas Island </option>
                            <option @if($staff->country == '48')  Selected @endif value="48" >Cocos (Keeling) Islands </option>
                            <option @if($staff->country == '49')  Selected @endif value="49" >Colombia </option>
                            <option @if($staff->country == '50')  Selected @endif value="50" >Comoros </option>
                            <option @if($staff->country == '51')  Selected @endif value="51" >Congo </option>
                            <option @if($staff->country == '52')  Selected @endif value="52" >Cook Islands </option>
                            <option @if($staff->country == '53')  Selected @endif value="53" >Costa Rica </option>
                            <option @if($staff->country == '54')  Selected @endif value="54" >Ivory Coast </option>
                            <option @if($staff->country == '55')  Selected @endif value="55" >Croatia </option>
                            <option @if($staff->country == '56')  Selected @endif value="56" >Cuba </option>
                            <option @if($staff->country == '57')  Selected @endif value="57" >Curacao </option>
                            <option @if($staff->country == '58')  Selected @endif value="58" >Cyprus </option>
                            <option @if($staff->country == '59')  Selected @endif value="59" >Czech Republic </option>
                            <option @if($staff->country == '60')  Selected @endif value="60" >Democratic Republic of the Congo </option>
                            <option @if($staff->country == '61')  Selected @endif value="61" >Denmark </option>
                            <option @if($staff->country == '62')  Selected @endif value="62" >Djibouti </option>
                            <option @if($staff->country == '63')  Selected @endif value="63" >Dominica </option>
                            <option @if($staff->country == '64')  Selected @endif value="64" >Dominican Republic </option>
                            <option @if($staff->country == '65')  Selected @endif value="65" >Ecuador </option>
                            <option @if($staff->country == '66')  Selected @endif value="66" >Egypt </option>
                            <option @if($staff->country == '67')  Selected @endif value="67" >El Salvador </option>
                            <option @if($staff->country == '68')  Selected @endif value="68" >Equatorial Guinea </option>
                            <option @if($staff->country == '69')  Selected @endif value="69" >Eritrea </option>
                            <option @if($staff->country == '70')  Selected @endif value="70" >Estonia </option>
                            <option @if($staff->country == '71')  Selected @endif value="71" > Ethiopia </option>
                            <option @if($staff->country == '72')  Selected @endif value="72" > Falkland Islands (Malvinas) </option>
                            <option @if($staff->country == '73')  Selected @endif value="73" > Faroe Islands </option>
                            <option @if($staff->country == '74')  Selected @endif value="74" > Fiji </option>
                            <option @if($staff->country == '75')  Selected @endif value="75" > Finland </option>
                            <option @if($staff->country == '76')  Selected @endif value="76" > France </option>
                            <option @if($staff->country == '77')  Selected @endif value="77" > French Guiana </option>
                            <option @if($staff->country == '78')  Selected @endif value="78" > French Polynesia </option>
                            <option @if($staff->country == '79')  Selected @endif value="79" > French Southern Territories </option>
                            <option @if($staff->country == '80')  Selected @endif value="80" > Gabon </option>
                            <option @if($staff->country == '81')  Selected @endif value="81" > Gambia </option>
                            <option @if($staff->country == '82')  Selected @endif value="82" > Georgia </option>
                            <option @if($staff->country == '83')  Selected @endif value="83" > Germany </option>
                            <option @if($staff->country == '84')  Selected @endif value="84" > Ghana </option>
                            <option @if($staff->country == '85')  Selected @endif value="85" > Gibraltar </option>
                            <option @if($staff->country == '86')  Selected @endif value="86" > Greece </option>
                            <option @if($staff->country == '87')  Selected @endif value="87" > Greenland </option>
                            <option @if($staff->country == '88')  Selected @endif value="88" > Grenada </option>
                            <option @if($staff->country == '89')  Selected @endif value="89" > Guadaloupe </option>
                            <option @if($staff->country == '90')  Selected @endif value="90" > Guam </option>
                            <option @if($staff->country == '91')  Selected @endif value="91" > Guatemala </option>
                            <option @if($staff->country == '92')  Selected @endif value="92" > Guernsey </option>
                            <option @if($staff->country == '93')  Selected @endif value="93" > Guinea </option>
                            <option @if($staff->country == '94')  Selected @endif value="94" > Guinea-Bissau </option>
                            <option @if($staff->country == '95')  Selected @endif value="95" > Guyana </option>
                            <option @if($staff->country == '96')  Selected @endif value="96" > Haiti </option>
                            <option @if($staff->country == '97')  Selected @endif value="97" > Heard Island and McDonald Islands </option>
                            <option @if($staff->country == '98')  Selected @endif value="98" > Honduras </option>
                            <option @if($staff->country == '99')  Selected @endif value="99" > Hong Kong </option>
                            <option @if($staff->country == '100')  Selected @endif value="100" > Hungary </option>
                            <option @if($staff->country == '101')  Selected @endif value="101" > Iceland </option>
                            <option @if($staff->country == '102')  Selected @endif value="102" > India </option>
                            <option @if($staff->country == '103')  Selected @endif value="103" > Indonesia </option>
                            <option @if($staff->country == '104')  Selected @endif value="104" > Iran </option>
                            <option @if($staff->country == '105')  Selected @endif value="105" > Iraq </option>
                            <option @if($staff->country == '106')  Selected @endif value="106" > Ireland </option>
                            <option @if($staff->country == '107')  Selected @endif value="107" > Isle of Man </option>
                            <option @if($staff->country == '108')  Selected @endif value="108" > Israel </option>
                            <option @if($staff->country == '109')  Selected @endif value="109" > Italy </option>
                            <option @if($staff->country == '110')  Selected @endif value="110" > Jamaica </option>
                            <option @if($staff->country == '111')  Selected @endif value="111" > Japan </option>
                            <option @if($staff->country == '112')  Selected @endif value="112" > Jersey </option>
                            <option @if($staff->country == '113')  Selected @endif value="113" > Jordan </option>
                            <option @if($staff->country == '114')  Selected @endif value="114" > Kazakhstan </option>
                            <option @if($staff->country == '115')  Selected @endif value="115" > Kenya </option>
                            <option @if($staff->country == '116')  Selected @endif value="116" > Kiribati </option>
                            <option @if($staff->country == '117')  Selected @endif value="117" > Kosovo </option>
                            <option @if($staff->country == '118')  Selected @endif value="118" > Kuwait </option>
                            <option @if($staff->country == '119')  Selected @endif value="119" > Kyrgyzstan </option>
                            <option @if($staff->country == '120')  Selected @endif value="120" > Laos </option>
                            <option @if($staff->country == '121')  Selected @endif value="121" > Latvia </option>
                            <option @if($staff->country == '122')  Selected @endif value="122" > Lebanon </option>
                            <option @if($staff->country == '123')  Selected @endif value="123" > Lesotho </option>
                            <option @if($staff->country == '124')  Selected @endif value="124" > Liberia </option>
                            <option @if($staff->country == '125')  Selected @endif value="125" > Libya </option>
                            <option @if($staff->country == '126')  Selected @endif value="126" > Liechtenstein </option>
                            <option @if($staff->country == '127')  Selected @endif value="127" > Lithuania </option>
                            <option @if($staff->country == '128')  Selected @endif value="128" > Luxembourg </option>
                            <option @if($staff->country == '129')  Selected @endif value="129" > Macao </option>
                            <option @if($staff->country == '130')  Selected @endif value="130" > Macedonia </option>
                            <option @if($staff->country == '131')  Selected @endif value="131" > Madagascar </option>
                            <option @if($staff->country == '132')  Selected @endif value="132" > Malawi </option>
                            <option @if($staff->country == '133')  Selected @endif value="133" > Malaysia </option>
                            <option @if($staff->country == '134')  Selected @endif value="134" > Maldives </option>
                            <option @if($staff->country == '135')  Selected @endif value="135" > Mali </option>
                            <option @if($staff->country == '136')  Selected @endif value="136" > Malta </option>
                            <option @if($staff->country == '137')  Selected @endif value="137" > Marshall Islands </option>
                            <option @if($staff->country == '138')  Selected @endif value="138" > Martinique </option>
                            <option @if($staff->country == '139')  Selected @endif value="139" > Mauritania </option>
                            <option @if($staff->country == '140')  Selected @endif value="140" > Mauritius </option>
                            <option @if($staff->country == '141')  Selected @endif value="141" > Mayotte </option>
                            <option @if($staff->country == '142')  Selected @endif value="142" > Mexico </option>
                            <option @if($staff->country == '143')  Selected @endif value="143" > Micronesia </option>
                            <option @if($staff->country == '144')  Selected @endif value="144" > Moldava </option>
                            <option @if($staff->country == '145')  Selected @endif value="145" > Monaco </option>
                            <option @if($staff->country == '146')  Selected @endif value="146" > Mongolia </option>
                            <option @if($staff->country == '147')  Selected @endif value="147" > Montenegro </option>
                            <option @if($staff->country == '148')  Selected @endif value="148" > Montserrat </option>
                            <option @if($staff->country == '149')  Selected @endif value="149" > Morocco </option>
                            <option @if($staff->country == '150')  Selected @endif value="150" > Mozambique </option>
                            <option @if($staff->country == '151')  Selected @endif value="151" > Myanmar (Burma) </option>
                            <option @if($staff->country == '152')  Selected @endif value="152" > Namibia </option>
                            <option @if($staff->country == '153')  Selected @endif value="153" > Nauru </option>
                            <option @if($staff->country == '154')  Selected @endif value="154" > Nepal </option>
                            <option @if($staff->country == '155')  Selected @endif value="155" > Netherlands </option>
                            <option @if($staff->country == '156')  Selected @endif value="156" > New Caledonia </option>
                            <option @if($staff->country == '157')  Selected @endif value="157" > New Zealand </option>
                            <option @if($staff->country == '158')  Selected @endif value="158" > Nicaragua </option>
                            <option @if($staff->country == '159')  Selected @endif value="159" > Niger </option>
                            <option @if($staff->country == '160')  Selected @endif value="160" > Nigeria </option>
                            <option @if($staff->country == '161')  Selected @endif value="161" > Niue </option>
                            <option @if($staff->country == '162')  Selected @endif value="162" > Norfolk Island </option>
                            <option @if($staff->country == '163')  Selected @endif value="163" > North Korea </option>
                            <option @if($staff->country == '164')  Selected @endif value="164" > Northern Mariana Islands </option>
                            <option @if($staff->country == '165')  Selected @endif value="165" > Norway </option>
                            <option @if($staff->country == '166')  Selected @endif value="166" > Oman </option>
                            <option @if($staff->country == '167')  Selected @endif value="167" > Pakistan </option>
                            <option @if($staff->country == '168')  Selected @endif value="168" > Palau </option>
                            <option @if($staff->country == '169')  Selected @endif value="169" > Palestine </option>
                            <option @if($staff->country == '170')  Selected @endif value="170" > Panama </option>
                            <option @if($staff->country == '171')  Selected @endif value="171" > Papua New Guinea </option>
                            <option @if($staff->country == '172')  Selected @endif value="172" > Paraguay </option>
                            <option @if($staff->country == '173')  Selected @endif value="173" > Peru </option>
                            <option @if($staff->country == '174')  Selected @endif value="174" > Phillipines </option>
                            <option @if($staff->country == '175')  Selected @endif value="175" > Pitcairn </option>
                            <option @if($staff->country == '176')  Selected @endif value="176" > Poland </option>
                            <option @if($staff->country == '177')  Selected @endif value="177" > Portugal </option>
                            <option @if($staff->country == '178')  Selected @endif value="178" > Puerto Rico </option>
                            <option @if($staff->country == '179')  Selected @endif value="179" > Qatar </option>
                            <option @if($staff->country == '180')  Selected @endif value="180" > Reunion </option>
                            <option @if($staff->country == '181')  Selected @endif value="181" > Romania </option>
                            <option @if($staff->country == '182')  Selected @endif value="182" > Russia </option>
                            <option @if($staff->country == '183')  Selected @endif value="183" > Rwanda </option>
                            <option @if($staff->country == '184')  Selected @endif value="184" > Saint Barthelemy  </option>
                            <option @if($staff->country == '185')  Selected @endif value="185" > Saint Helena </option>
                            <option @if($staff->country == '186')  Selected @endif value="186" > Saint Kitts and Nevis </option>
                            <option @if($staff->country == '187')  Selected @endif value="187" > Saint Lucia </option>
                            <option @if($staff->country == '188')  Selected @endif value="188" > Saint Martin </option>
                            <option @if($staff->country == '189')  Selected @endif value="189" > Saint Pierre and Miquelon </option>
                            <option @if($staff->country == '190')  Selected @endif value="190" > Saint Vincent and the Grenadines </option>
                            <option @if($staff->country == '191')  Selected @endif value="191" > Samoa </option>
                            <option @if($staff->country == '192')  Selected @endif value="192" > San Marino </option>
                            <option @if($staff->country == '193')  Selected @endif value="193" > Sao Tome and Principe </option>
                            <option @if($staff->country == '194')  Selected @endif value="194" > Saudi Arabia  </option>
                            <option @if($staff->country == '195')  Selected @endif value="195" > Senegal </option>
                            <option @if($staff->country == '196')  Selected @endif value="196" > Serbia </option>
                            <option @if($staff->country == '197')  Selected @endif value="197" > Seychelles </option>
                            <option @if($staff->country == '198')  Selected @endif value="198" > Sierra Leone </option>
                            <option @if($staff->country == '199')  Selected @endif value="199" > Singapore </option>
                            <option @if($staff->country == '200')  Selected @endif value="200" > Sint Maarten </option>
                            <option @if($staff->country == '201')  Selected @endif value="201" > Slovakia </option>
                            <option @if($staff->country == '202')  Selected @endif value="202" > Slovenia </option>
                            <option @if($staff->country == '203')  Selected @endif value="203" > Solomon Islands </option>
                            <option @if($staff->country == '204')  Selected @endif value="204" > Somalia </option>
                            <option @if($staff->country == '205')  Selected @endif value="205" > South Africa </option>
                            <option @if($staff->country == '206')  Selected @endif value="206" > South Georgia and the South Sandwich Islands </option>
                            <option @if($staff->country == '207')  Selected @endif value="207" > South Korea </option>
                            <option @if($staff->country == '208')  Selected @endif value="208" > South Sudan </option>
                            <option @if($staff->country == '209')  Selected @endif value="209" > Spain </option>
                            <option @if($staff->country == '210')  Selected @endif value="210" > Sri Lanka </option>
                            <option @if($staff->country == '211')  Selected @endif value="211" > Sudan </option>
                            <option @if($staff->country == '212')  Selected @endif value="212" > Suriname </option>
                            <option @if($staff->country == '213')  Selected @endif value="213" > Svalbard and Jan Mayen </option>
                            <option @if($staff->country == '214')  Selected @endif value="214" > Swaziland </option>
                            <option @if($staff->country == '215')  Selected @endif value="215" > Sweden </option>
                            <option @if($staff->country == '216')  Selected @endif value="216" > Switzerland </option>
                            <option @if($staff->country == '217')  Selected @endif value="217" > Syria </option>
                            <option @if($staff->country == '218')  Selected @endif value="218" > Taiwan </option>
                            <option @if($staff->country == '219')  Selected @endif value="219" > Tajikistan </option>
                            <option @if($staff->country == '220')  Selected @endif value="220" > Tanzania </option>
                            <option @if($staff->country == '221')  Selected @endif value="221" > Thailand </option>
                            <option @if($staff->country == '222')  Selected @endif value="222" > Timor-Leste (East Timor) </option>
                            <option @if($staff->country == '223')  Selected @endif value="223" > Togo </option>
                            <option @if($staff->country == '224')  Selected @endif value="224" > Tokelau </option>
                            <option @if($staff->country == '225')  Selected @endif value="225" > Tonga </option>
                            <option @if($staff->country == '226')  Selected @endif value="226" > Trinidad and Tobago </option>
                            <option @if($staff->country == '227')  Selected @endif value="227" > Tunisia </option>
                            <option @if($staff->country == '228')  Selected @endif value="228" > Turkey </option>
                            <option @if($staff->country == '229')  Selected @endif value="229" > Turkmenistan </option>
                            <option @if($staff->country == '230')  Selected @endif value="230" > Turks and Caicos Islands </option>
                            <option @if($staff->country == '231')  Selected @endif value="231" > Tuvalu </option>
                            <option @if($staff->country == '232')  Selected @endif value="232" > Uganda </option>
                            <option @if($staff->country == '233')  Selected @endif value="233" > Ukraine </option>
                            <option @if($staff->country == '234')  Selected @endif value="234" > United Arab Emirates </option>
                            <option @if($staff->country == '235')  Selected @endif value="235" > United Kingdom </option>
                            <option @if($staff->country == '236')  Selected @endif value="236" > United States </option>
                            <option @if($staff->country == '237')  Selected @endif value="237" > United States Minor Outlying Islands </option>
                            <option @if($staff->country == '238')  Selected @endif value="238" > Uruguay </option>
                            <option @if($staff->country == '239')  Selected @endif value="239" > Uzbekistan </option>
                            <option @if($staff->country == '240')  Selected @endif value="240" > Vanuatu </option>
                            <option @if($staff->country == '241')  Selected @endif value="241" > Vatican City </option>
                            <option @if($staff->country == '242')  Selected @endif value="242" > Venezuela </option>
                            <option @if($staff->country == '243')  Selected @endif value="243" > Vietnam </option>
                            <option @if($staff->country == '244')  Selected @endif value="244" > Virgin Islands, British </option>
                            <option @if($staff->country == '245')  Selected @endif value="245" > Virgin Islands, US </option>
                            <option @if($staff->country == '246')  Selected @endif value="246" > Wallis and Futuna </option>
                            <option @if($staff->country == '247')  Selected @endif value="247" > Western Sahara </option>
                            <option @if($staff->country == '248')  Selected @endif value="248" > Yemen </option>
                            <option @if($staff->country == '249')  Selected @endif value="249" > Zambia </option>
                            <option @if($staff->country == '250')  Selected @endif value="250" > Zimbabwe </option>
                        </select>
                        {{-- <input value="{{ $staff->country }}" type="text" name="country" class="form-control" placeholder="Enter country"> --}}
                    </div>
                </div>

                <div class="col-sm-4 mt-3">
                    <label class=" form-control-label">Address:</label>
                    <div class="mg-t-10 mg-sm-t-0">
                        <input value="{{ $staff->address }}" type="text" name="address" class="form-control" placeholder="Enter address">
                    </div>
                </div>
                <div><h4 class="mt-3">Social Links</h4> </div>
                <div class="col-md-6">
                    <label class="mb-2">Facebook</label>
                    <input type="text" class="form-control  mb-2 " value="{{ $staff->facebook_id }}" name="facebook_id"  placeholder="Facebook URL"/>
                </div>
                <div class="col-md-6">
                    <label class="mb-2">Twitter</label>
                    <input type="text" class="form-control  mb-2 " value="{{ $staff->twitter_id }}" name="twitter_id"  placeholder="Twitter URL"/>
                </div>
                <div class="col-md-6">
                    <label class="mb-2">Google Plus</label>
                    <input type="text" class="form-control  mb-2 " value="{{ $staff->google_id }}" name="google_id"  placeholder="Google Plus URL"/>
                </div>
                <div class="col-md-6">
                    <label class="mb-2">Instagram</label>
                    <input type="text" class="form-control  mb-2 " value="{{ $staff->instagram_id }}" name="instagram_id"  placeholder="Instagram URL"/>
                </div>

                <div class="col-sm-4 mt-3">
                    <label class="form-control-label">Status: </label>
                    <div class=" mg-t-10 mg-sm-t-0">
                      <select class="form-control" name="status">
                        <option @if($staff->status == 1) @selected(true) @endif value="1">Active</option>
                        <option @if($staff->status == 0) @selected(true) @endif value="0">Inactive</option>
                    </select>
                    </div>
                </div>

            </div>

            <div class="row mt-4 mb-5">
                <div class="col-sm-12">
                    <label class=" form-control-label">Description:</label>
                    <div class="mg-t-10 mg-sm-t-0">
                        <textarea id="summernote" type="text" name="description" class="form-control" placeholder="Enter description">{{ $staff->description }}</textarea>
                    </div>
                </div>
            </div>

            <hr>
            <div class="row">
                <div class="right_section col-md-12">
                    <div>
                        <h4 >Bank Information</h4>
                    </div>
                </div>
                <div class="col-md-6">
                    <label class="mb-2">Bank Name</label>
                    <input type="text" class="form-control  mb-2 " value="{{ $staff->bank_name }}" name="bank_name"  placeholder="Bank Name"/>
                </div>
                <div class="col-md-6">
                    <label class="mb-2">Bank Code/IFSC</label>
                    <input type="text" class="form-control  mb-2 " value="{{ $staff->bank_code_ifsc }}" name="bank_code_ifsc"  placeholder="Bank Code/IFSC"/>
                </div>
                <div class="col-md-6">
                    <label class="mb-2">Account Number</label>
                    <input type="text" class="form-control  mb-2 " value="{{ $staff->bank_account_number }}" name="bank_account_number"  placeholder="Account Number"/>
                </div>
                <div class="col-md-6">
                    <label class="mb-2">Account Holder Name</label>
                    <input type="text" class="form-control  mb-2 " value="{{ $staff->bank_ac_holder_name }}" name="bank_ac_holder_name"  placeholder="Account Holder Name"/>
                </div>
                <div class="col-md-12">
                    <label class="mb-2">PayPal ID</label>
                    <input type="text" class="form-control  mb-2 " value="{{ $staff->paypal_id_num }}" name="paypal_id_num"  placeholder="PayPal ID"/>
                </div>


            </div>

            <hr>
                <div class="right_section">
                    <div>
                        <h4>Certificates</h4>
                    </div>
                </div>
                
                <div class="mg-t-10 mg-sm-t-0 add-data-content">
                    @if($staff->certificate->count() == 0)
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
                    @foreach ($staff->certificate as $k=>$item)
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
                                <input type="file"  name="old_certificates_file[{{ $item->id }}]" accept="image/jpeg,image/gif,image/png,application/pdf" value="{{ $item->certificates_file }}" class=" form-control">
                            </div>
                        </div>
                        <div class="col-md-1">
                            <label class="form-control-label"><b>View:</b></label>
                            <div class="d-flex  align-items-center select-add-section">
                                <a class="btn btn-primary"  data-toggle="modal" data-target="#certificateModal{{ $k }}"> &nbsp;<i class="fa fa-solid fa-eye" style="color: white"></i></a>
                            </div>
                        </div>
                        <div class="col-md-1">
                            @if($k == $staff->certificate->count() - 1)
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
                                {{-- <embed src="{{ $item->certificate_file  }}" type="application/pdf" class="embed-responsive-item" width="100%" height="600px"></iframe> --}}
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
            <hr>
             

              <div class="row mt-3">
                <div class="col-sm-12 mg-t-10 mg-sm-t-0 text-right">
                  <a href="javascript:void(0);" type="button" class="btn-cancel btn btn-secondary text-white mr-2" >Cancel</a>
                  <button type="submit" class="btn btn-info btn-update">Update</button>
                </div>
              </div>
          </form>

      </div><!-- form-layout -->
  </div><!-- col-6 -->
  <!----- Start Add Category Form input ------->
</div><!-- br-section-wrapper -->
        
