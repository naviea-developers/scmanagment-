@section('title')
    Admin - teacher Edit
@endsection

@extends('Backend.layouts.layouts')

@section('main_contain')

    <!-- ########## START: MAIN PANEL ########## -->
    <div class="br-mainpanel">
        <div class="br-pageheader">
          <nav class="breadcrumb pd-0 mg-0 tx-12">
            <a class="breadcrumb-item" href="{{route('admin.dashboard')}}">Home</a>
            <a class="breadcrumb-item" href="{{route('admin.teacher.index')}}"> <i class="icon ion-reply text-22"></i> All teacher</a>
          </nav>
        </div><!-- br-pageheader -->

        <div class="br-pagebody">
          <div class="br-section-wrapper">
            <h6 class="br-section-label text-center mb-4">Update teacher</h6>
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

                    <form action="{{ route('admin.teacher.update', $teacher->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="row mt-4">
                            <div class="col-sm-4" >
                                <label class="form-control-label">Teacher Image: <span class="tx-danger">*</span></label>
                                <div class="mt-1 mr-2" style="position:relative;box-shadow: 0px 0px 1px 1px;width: 150px;">
                                    <img class="display-upload-img" style="width: 150px;height: 70px;" src="{{ $teacher->image_show }}" alt="">
                                    <input type="file" name="image" class="form-control upload-img" placeholder="Enter Activity Image" style="position: absolute;top: 0;opacity: 0;height: 100%;">
                                </div>
                            </div>
                        </div>

                        <div class="row mt-4">
                            <div class="col-sm-4">
                                <label class="form-control-label">Teacher Name: <span class="tx-danger">*</span></label>
                                <div class="mg-t-10 mg-sm-t-0">
                                <input type="text" name="name" class="form-control" placeholder="Enter Teacher Name" value="{{ $teacher->name}}" required>
                            </div>
                            </div>
                            <div class="col-sm-4">
                                <label class="form-control-label">Mobile Number: <span class="tx-danger">*</span></label>
                                <div class="cmg-t-10 mg-sm-t-0">
                                <input value="{{ $teacher->mobile}}" type="text" name="mobile" class="form-control" placeholder="Enter Mobile Number" required>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <label class="form-control-label">Email: <span class="tx-danger">*</span></label>
                                <div class="mg-t-10 mg-sm-t-0">
                                    <input value="{{ $teacher->email }}" type="email" name="email" class="form-control" placeholder="Enter Email" required>
                                </div>
                            </div>
                        </div>

                        <div class="row mt-4">
                            <div class="col-sm-4">
                                <label class=" form-control-label">NID:</label>
                                <div class="mg-t-10 mg-sm-t-0">
                                    <input value="{{ $teacher->nid }}" type="text" name="nid" class="form-control" placeholder="Enter NID">
                                </div>
                            </div>

                            <div class="col-sm-4">
                                <label class=" form-control-label">Gender:</label>
                                <select  class="form-control" name="gender" required>
                                    <option value="">Select Gender</option>
                                    <option  value="0" @if ($teacher->gender=='0') Selected  @endif>Male</option>
                                    <option  value="1" @if ($teacher->gender=='1') Selected  @endif>Female</option>
                                </select>
                            </div>

                            <div class="col-sm-4">
                                <label class=" form-control-label">Date of Birth:</label>
                                <div class="mg-t-10 mg-sm-t-0">
                                    <input value="{{ $teacher->dob }}" type="date" name="dob" class="form-control" placeholder="Enter Date of Birth">
                                </div>
                            </div>
                        </div>

                        <div class="row mt-4">
                            <div class="col-sm-4">
                                <label class=" form-control-label">Qualification:</label>
                                <div class="mg-t-10 mg-sm-t-0">
                                    <input value="{{ $teacher->qualification}}" type="text" name="qualification" class="form-control" placeholder="Enter qualification">
                                </div>
                            </div>

                            <div class="col-sm-4">
                                <label class=" form-control-label">Experience:</label>
                                <div class="mg-t-10 mg-sm-t-0">
                                    <input value="{{ $teacher->experience}}" type="text" name="experience" class="form-control" placeholder="Enter experience">
                                </div>
                            </div>

                            <div class="col-sm-4">
                                <label class=" form-control-label">Language:</label>
                                <div class="mg-t-10 mg-sm-t-0">
                                    <select class="form-select form-control" name="language">
                                        <option value="">select one language</option>
                                        <option @if($teacher->language == '1')  Selected @endif value="1"> Bangla </option>
                                        <option @if($teacher->language == '2')  Selected @endif value="2" >English </option>
                                        <option @if($teacher->language == '3')  Selected @endif value="3" >Hindi </option>
                                        <option @if($teacher->language == '4')  Selected @endif value="4" >Arabic </option>
                                    </select>
                                    {{-- <input value="{{ $teacher->language}}" type="text" name="language" class="form-control" placeholder="Enter language"> --}}
                                </div>
                            </div>

                        </div>

                        <div class="row mt-4">
                            <div class="col-sm-4">
                                <label class=" form-control-label">Institution:</label>
                                <div class="mg-t-10 mg-sm-t-0">
                                    <input value="{{ $teacher->institution}}" type="text" name="institution" class="form-control" placeholder="Enter institution name">
                                </div>
                            </div>

                            <div class="col-sm-4">
                                <label class=" form-control-label">Designation:</label>
                                <div class="mg-t-10 mg-sm-t-0">
                                    <input value="{{ $teacher->designation }}" type="text" name="designation" class="form-control" placeholder="Enter designation">
                                </div>
                            </div>

                            <div class="col-sm-4">
                                <label class=" form-control-label">Country:</label>
                                <div class="mg-t-10 mg-sm-t-0">
                                    <select class="form-control" name="country">
                                        <option value="">select one country</option>
                                        <option @if($teacher->country == '1')  Selected @endif value="1"> Afghanistan </option>
                                        <option @if($teacher->country == '2')  Selected @endif value="2" >Aland Islands </option>
                                        <option @if($teacher->country == '3')  Selected @endif value="3" >Albania </option>
                                        <option @if($teacher->country == '4')  Selected @endif value="4" >Algeria </option>
                                        <option @if($teacher->country == '5')  Selected @endif value="5" >American Samoa </option>
                                        <option @if($teacher->country == '6')  Selected @endif value="6" >Andorra </option>
                                        <option @if($teacher->country == '7')  Selected @endif value="7" >Angola </option>
                                        <option @if($teacher->country == '8')  Selected @endif value="8" >Anguilla </option>
                                        <option @if($teacher->country == '9')  Selected @endif value="9" >Antarctica </option>
                                        <option @if($teacher->country == '10')  Selected @endif value="10" >Antigua and Barbuda </option>
                                        <option @if($teacher->country == '11')  Selected @endif value="11" >Argentina </option>
                                        <option @if($teacher->country == '12')  Selected @endif value="12" >Armenia </option>
                                        <option @if($teacher->country == '13')  Selected @endif value="13" >Aruba </option>
                                        <option @if($teacher->country == '14')  Selected @endif value="14" >Australia </option>
                                        <option @if($teacher->country == '15')  Selected @endif value="15" >Austria </option>
                                        <option @if($teacher->country == '16')  Selected @endif value="16" >Azerbaijan </option>
                                        <option @if($teacher->country == '17')  Selected @endif value="17" >Bahamas </option>
                                        <option @if($teacher->country == '18')  Selected @endif value="18" >Bahrain </option>
                                        <option @if($teacher->country == '19')  Selected @endif value="19" >Bangladesh </option>
                                        <option @if($teacher->country == '20')  Selected @endif value="20" >Barbados </option>
                                        <option @if($teacher->country == '21')  Selected @endif value="21" >Belarus </option>
                                        <option @if($teacher->country == '22')  Selected @endif value="22" >Belgium </option>
                                        <option @if($teacher->country == '23')  Selected @endif value="23" >Belize </option>
                                        <option @if($teacher->country == '24')  Selected @endif value="24" >Benin </option>
                                        <option @if($teacher->country == '25')  Selected @endif value="25" >Bermuda </option>
                                        <option @if($teacher->country == '26')  Selected @endif value="26" >Bhutan </option>
                                        <option @if($teacher->country == '27')  Selected @endif value="27" >Bolivia </option>
                                        <option @if($teacher->country == '28')  Selected @endif value="28" >Bonaire, Sint Eustatius and Saba </option>
                                        <option @if($teacher->country == '29')  Selected @endif value="29" > Bosnia and Herzegovina </option>
                                        <option @if($teacher->country == '30')  Selected @endif value="30" >Botswana </option>
                                        <option @if($teacher->country == '31')  Selected @endif value="31" >Bouvet Island </option>
                                        <option @if($teacher->country == '32')  Selected @endif value="32" >Brazil </option>
                                        <option @if($teacher->country == '33')  Selected @endif value="33" >British Indian Ocean Territory </option>
                                        <option @if($teacher->country == '34')  Selected @endif value="34" >Brunei </option>
                                        <option @if($teacher->country == '35')  Selected @endif value="35" >Bulgaria </option>
                                        <option @if($teacher->country == '36')  Selected @endif value="36" >Burkina Faso </option>
                                        <option @if($teacher->country == '37')  Selected @endif value="37" >Burundi </option>
                                        <option @if($teacher->country == '38')  Selected @endif value="38" >Cambodia </option>
                                        <option @if($teacher->country == '39')  Selected @endif value="39" >Cameroon </option>
                                        <option @if($teacher->country == '40')  Selected @endif value="40" >Canada </option>
                                        <option @if($teacher->country == '41')  Selected @endif value="41" >Cape Verde </option>
                                        <option @if($teacher->country == '42')  Selected @endif value="42" >Cayman Islands </option>
                                        <option @if($teacher->country == '43')  Selected @endif value="43" >Central African Republic </option>
                                        <option @if($teacher->country == '44')  Selected @endif value="44" >Chad </option>
                                        <option @if($teacher->country == '45')  Selected @endif value="45" >Chile </option>
                                        <option @if($teacher->country == '46')  Selected @endif value="46" >China </option>
                                        <option @if($teacher->country == '47')  Selected @endif value="47" >Christmas Island </option>
                                        <option @if($teacher->country == '48')  Selected @endif value="48" >Cocos (Keeling) Islands </option>
                                        <option @if($teacher->country == '49')  Selected @endif value="49" >Colombia </option>
                                        <option @if($teacher->country == '50')  Selected @endif value="50" >Comoros </option>
                                        <option @if($teacher->country == '51')  Selected @endif value="51" >Congo </option>
                                        <option @if($teacher->country == '52')  Selected @endif value="52" >Cook Islands </option>
                                        <option @if($teacher->country == '53')  Selected @endif value="53" >Costa Rica </option>
                                        <option @if($teacher->country == '54')  Selected @endif value="54" >Ivory Coast </option>
                                        <option @if($teacher->country == '55')  Selected @endif value="55" >Croatia </option>
                                        <option @if($teacher->country == '56')  Selected @endif value="56" >Cuba </option>
                                        <option @if($teacher->country == '57')  Selected @endif value="57" >Curacao </option>
                                        <option @if($teacher->country == '58')  Selected @endif value="58" >Cyprus </option>
                                        <option @if($teacher->country == '59')  Selected @endif value="59" >Czech Republic </option>
                                        <option @if($teacher->country == '60')  Selected @endif value="60" >Democratic Republic of the Congo </option>
                                        <option @if($teacher->country == '61')  Selected @endif value="61" >Denmark </option>
                                        <option @if($teacher->country == '62')  Selected @endif value="62" >Djibouti </option>
                                        <option @if($teacher->country == '63')  Selected @endif value="63" >Dominica </option>
                                        <option @if($teacher->country == '64')  Selected @endif value="64" >Dominican Republic </option>
                                        <option @if($teacher->country == '65')  Selected @endif value="65" >Ecuador </option>
                                        <option @if($teacher->country == '66')  Selected @endif value="66" >Egypt </option>
                                        <option @if($teacher->country == '67')  Selected @endif value="67" >El Salvador </option>
                                        <option @if($teacher->country == '68')  Selected @endif value="68" >Equatorial Guinea </option>
                                        <option @if($teacher->country == '69')  Selected @endif value="69" >Eritrea </option>
                                        <option @if($teacher->country == '70')  Selected @endif value="70" >Estonia </option>
                                        <option @if($teacher->country == '71')  Selected @endif value="71" > Ethiopia </option>
                                        <option @if($teacher->country == '72')  Selected @endif value="72" > Falkland Islands (Malvinas) </option>
                                        <option @if($teacher->country == '73')  Selected @endif value="73" > Faroe Islands </option>
                                        <option @if($teacher->country == '74')  Selected @endif value="74" > Fiji </option>
                                        <option @if($teacher->country == '75')  Selected @endif value="75" > Finland </option>
                                        <option @if($teacher->country == '76')  Selected @endif value="76" > France </option>
                                        <option @if($teacher->country == '77')  Selected @endif value="77" > French Guiana </option>
                                        <option @if($teacher->country == '78')  Selected @endif value="78" > French Polynesia </option>
                                        <option @if($teacher->country == '79')  Selected @endif value="79" > French Southern Territories </option>
                                        <option @if($teacher->country == '80')  Selected @endif value="80" > Gabon </option>
                                        <option @if($teacher->country == '81')  Selected @endif value="81" > Gambia </option>
                                        <option @if($teacher->country == '82')  Selected @endif value="82" > Georgia </option>
                                        <option @if($teacher->country == '83')  Selected @endif value="83" > Germany </option>
                                        <option @if($teacher->country == '84')  Selected @endif value="84" > Ghana </option>
                                        <option @if($teacher->country == '85')  Selected @endif value="85" > Gibraltar </option>
                                        <option @if($teacher->country == '86')  Selected @endif value="86" > Greece </option>
                                        <option @if($teacher->country == '87')  Selected @endif value="87" > Greenland </option>
                                        <option @if($teacher->country == '88')  Selected @endif value="88" > Grenada </option>
                                        <option @if($teacher->country == '89')  Selected @endif value="89" > Guadaloupe </option>
                                        <option @if($teacher->country == '90')  Selected @endif value="90" > Guam </option>
                                        <option @if($teacher->country == '91')  Selected @endif value="91" > Guatemala </option>
                                        <option @if($teacher->country == '92')  Selected @endif value="92" > Guernsey </option>
                                        <option @if($teacher->country == '93')  Selected @endif value="93" > Guinea </option>
                                        <option @if($teacher->country == '94')  Selected @endif value="94" > Guinea-Bissau </option>
                                        <option @if($teacher->country == '95')  Selected @endif value="95" > Guyana </option>
                                        <option @if($teacher->country == '96')  Selected @endif value="96" > Haiti </option>
                                        <option @if($teacher->country == '97')  Selected @endif value="97" > Heard Island and McDonald Islands </option>
                                        <option @if($teacher->country == '98')  Selected @endif value="98" > Honduras </option>
                                        <option @if($teacher->country == '99')  Selected @endif value="99" > Hong Kong </option>
                                        <option @if($teacher->country == '100')  Selected @endif value="100" > Hungary </option>
                                        <option @if($teacher->country == '101')  Selected @endif value="101" > Iceland </option>
                                        <option @if($teacher->country == '102')  Selected @endif value="102" > India </option>
                                        <option @if($teacher->country == '103')  Selected @endif value="103" > Indonesia </option>
                                        <option @if($teacher->country == '104')  Selected @endif value="104" > Iran </option>
                                        <option @if($teacher->country == '105')  Selected @endif value="105" > Iraq </option>
                                        <option @if($teacher->country == '106')  Selected @endif value="106" > Ireland </option>
                                        <option @if($teacher->country == '107')  Selected @endif value="107" > Isle of Man </option>
                                        <option @if($teacher->country == '108')  Selected @endif value="108" > Israel </option>
                                        <option @if($teacher->country == '109')  Selected @endif value="109" > Italy </option>
                                        <option @if($teacher->country == '110')  Selected @endif value="110" > Jamaica </option>
                                        <option @if($teacher->country == '111')  Selected @endif value="111" > Japan </option>
                                        <option @if($teacher->country == '112')  Selected @endif value="112" > Jersey </option>
                                        <option @if($teacher->country == '113')  Selected @endif value="113" > Jordan </option>
                                        <option @if($teacher->country == '114')  Selected @endif value="114" > Kazakhstan </option>
                                        <option @if($teacher->country == '115')  Selected @endif value="115" > Kenya </option>
                                        <option @if($teacher->country == '116')  Selected @endif value="116" > Kiribati </option>
                                        <option @if($teacher->country == '117')  Selected @endif value="117" > Kosovo </option>
                                        <option @if($teacher->country == '118')  Selected @endif value="118" > Kuwait </option>
                                        <option @if($teacher->country == '119')  Selected @endif value="119" > Kyrgyzstan </option>
                                        <option @if($teacher->country == '120')  Selected @endif value="120" > Laos </option>
                                        <option @if($teacher->country == '121')  Selected @endif value="121" > Latvia </option>
                                        <option @if($teacher->country == '122')  Selected @endif value="122" > Lebanon </option>
                                        <option @if($teacher->country == '123')  Selected @endif value="123" > Lesotho </option>
                                        <option @if($teacher->country == '124')  Selected @endif value="124" > Liberia </option>
                                        <option @if($teacher->country == '125')  Selected @endif value="125" > Libya </option>
                                        <option @if($teacher->country == '126')  Selected @endif value="126" > Liechtenstein </option>
                                        <option @if($teacher->country == '127')  Selected @endif value="127" > Lithuania </option>
                                        <option @if($teacher->country == '128')  Selected @endif value="128" > Luxembourg </option>
                                        <option @if($teacher->country == '129')  Selected @endif value="129" > Macao </option>
                                        <option @if($teacher->country == '130')  Selected @endif value="130" > Macedonia </option>
                                        <option @if($teacher->country == '131')  Selected @endif value="131" > Madagascar </option>
                                        <option @if($teacher->country == '132')  Selected @endif value="132" > Malawi </option>
                                        <option @if($teacher->country == '133')  Selected @endif value="133" > Malaysia </option>
                                        <option @if($teacher->country == '134')  Selected @endif value="134" > Maldives </option>
                                        <option @if($teacher->country == '135')  Selected @endif value="135" > Mali </option>
                                        <option @if($teacher->country == '136')  Selected @endif value="136" > Malta </option>
                                        <option @if($teacher->country == '137')  Selected @endif value="137" > Marshall Islands </option>
                                        <option @if($teacher->country == '138')  Selected @endif value="138" > Martinique </option>
                                        <option @if($teacher->country == '139')  Selected @endif value="139" > Mauritania </option>
                                        <option @if($teacher->country == '140')  Selected @endif value="140" > Mauritius </option>
                                        <option @if($teacher->country == '141')  Selected @endif value="141" > Mayotte </option>
                                        <option @if($teacher->country == '142')  Selected @endif value="142" > Mexico </option>
                                        <option @if($teacher->country == '143')  Selected @endif value="143" > Micronesia </option>
                                        <option @if($teacher->country == '144')  Selected @endif value="144" > Moldava </option>
                                        <option @if($teacher->country == '145')  Selected @endif value="145" > Monaco </option>
                                        <option @if($teacher->country == '146')  Selected @endif value="146" > Mongolia </option>
                                        <option @if($teacher->country == '147')  Selected @endif value="147" > Montenegro </option>
                                        <option @if($teacher->country == '148')  Selected @endif value="148" > Montserrat </option>
                                        <option @if($teacher->country == '149')  Selected @endif value="149" > Morocco </option>
                                        <option @if($teacher->country == '150')  Selected @endif value="150" > Mozambique </option>
                                        <option @if($teacher->country == '151')  Selected @endif value="151" > Myanmar (Burma) </option>
                                        <option @if($teacher->country == '152')  Selected @endif value="152" > Namibia </option>
                                        <option @if($teacher->country == '153')  Selected @endif value="153" > Nauru </option>
                                        <option @if($teacher->country == '154')  Selected @endif value="154" > Nepal </option>
                                        <option @if($teacher->country == '155')  Selected @endif value="155" > Netherlands </option>
                                        <option @if($teacher->country == '156')  Selected @endif value="156" > New Caledonia </option>
                                        <option @if($teacher->country == '157')  Selected @endif value="157" > New Zealand </option>
                                        <option @if($teacher->country == '158')  Selected @endif value="158" > Nicaragua </option>
                                        <option @if($teacher->country == '159')  Selected @endif value="159" > Niger </option>
                                        <option @if($teacher->country == '160')  Selected @endif value="160" > Nigeria </option>
                                        <option @if($teacher->country == '161')  Selected @endif value="161" > Niue </option>
                                        <option @if($teacher->country == '162')  Selected @endif value="162" > Norfolk Island </option>
                                        <option @if($teacher->country == '163')  Selected @endif value="163" > North Korea </option>
                                        <option @if($teacher->country == '164')  Selected @endif value="164" > Northern Mariana Islands </option>
                                        <option @if($teacher->country == '165')  Selected @endif value="165" > Norway </option>
                                        <option @if($teacher->country == '166')  Selected @endif value="166" > Oman </option>
                                        <option @if($teacher->country == '167')  Selected @endif value="167" > Pakistan </option>
                                        <option @if($teacher->country == '168')  Selected @endif value="168" > Palau </option>
                                        <option @if($teacher->country == '169')  Selected @endif value="169" > Palestine </option>
                                        <option @if($teacher->country == '170')  Selected @endif value="170" > Panama </option>
                                        <option @if($teacher->country == '171')  Selected @endif value="171" > Papua New Guinea </option>
                                        <option @if($teacher->country == '172')  Selected @endif value="172" > Paraguay </option>
                                        <option @if($teacher->country == '173')  Selected @endif value="173" > Peru </option>
                                        <option @if($teacher->country == '174')  Selected @endif value="174" > Phillipines </option>
                                        <option @if($teacher->country == '175')  Selected @endif value="175" > Pitcairn </option>
                                        <option @if($teacher->country == '176')  Selected @endif value="176" > Poland </option>
                                        <option @if($teacher->country == '177')  Selected @endif value="177" > Portugal </option>
                                        <option @if($teacher->country == '178')  Selected @endif value="178" > Puerto Rico </option>
                                        <option @if($teacher->country == '179')  Selected @endif value="179" > Qatar </option>
                                        <option @if($teacher->country == '180')  Selected @endif value="180" > Reunion </option>
                                        <option @if($teacher->country == '181')  Selected @endif value="181" > Romania </option>
                                        <option @if($teacher->country == '182')  Selected @endif value="182" > Russia </option>
                                        <option @if($teacher->country == '183')  Selected @endif value="183" > Rwanda </option>
                                        <option @if($teacher->country == '184')  Selected @endif value="184" > Saint Barthelemy  </option>
                                        <option @if($teacher->country == '185')  Selected @endif value="185" > Saint Helena </option>
                                        <option @if($teacher->country == '186')  Selected @endif value="186" > Saint Kitts and Nevis </option>
                                        <option @if($teacher->country == '187')  Selected @endif value="187" > Saint Lucia </option>
                                        <option @if($teacher->country == '188')  Selected @endif value="188" > Saint Martin </option>
                                        <option @if($teacher->country == '189')  Selected @endif value="189" > Saint Pierre and Miquelon </option>
                                        <option @if($teacher->country == '190')  Selected @endif value="190" > Saint Vincent and the Grenadines </option>
                                        <option @if($teacher->country == '191')  Selected @endif value="191" > Samoa </option>
                                        <option @if($teacher->country == '192')  Selected @endif value="192" > San Marino </option>
                                        <option @if($teacher->country == '193')  Selected @endif value="193" > Sao Tome and Principe </option>
                                        <option @if($teacher->country == '194')  Selected @endif value="194" > Saudi Arabia  </option>
                                        <option @if($teacher->country == '195')  Selected @endif value="195" > Senegal </option>
                                        <option @if($teacher->country == '196')  Selected @endif value="196" > Serbia </option>
                                        <option @if($teacher->country == '197')  Selected @endif value="197" > Seychelles </option>
                                        <option @if($teacher->country == '198')  Selected @endif value="198" > Sierra Leone </option>
                                        <option @if($teacher->country == '199')  Selected @endif value="199" > Singapore </option>
                                        <option @if($teacher->country == '200')  Selected @endif value="200" > Sint Maarten </option>
                                        <option @if($teacher->country == '201')  Selected @endif value="201" > Slovakia </option>
                                        <option @if($teacher->country == '202')  Selected @endif value="202" > Slovenia </option>
                                        <option @if($teacher->country == '203')  Selected @endif value="203" > Solomon Islands </option>
                                        <option @if($teacher->country == '204')  Selected @endif value="204" > Somalia </option>
                                        <option @if($teacher->country == '205')  Selected @endif value="205" > South Africa </option>
                                        <option @if($teacher->country == '206')  Selected @endif value="206" > South Georgia and the South Sandwich Islands </option>
                                        <option @if($teacher->country == '207')  Selected @endif value="207" > South Korea </option>
                                        <option @if($teacher->country == '208')  Selected @endif value="208" > South Sudan </option>
                                        <option @if($teacher->country == '209')  Selected @endif value="209" > Spain </option>
                                        <option @if($teacher->country == '210')  Selected @endif value="210" > Sri Lanka </option>
                                        <option @if($teacher->country == '211')  Selected @endif value="211" > Sudan </option>
                                        <option @if($teacher->country == '212')  Selected @endif value="212" > Suriname </option>
                                        <option @if($teacher->country == '213')  Selected @endif value="213" > Svalbard and Jan Mayen </option>
                                        <option @if($teacher->country == '214')  Selected @endif value="214" > Swaziland </option>
                                        <option @if($teacher->country == '215')  Selected @endif value="215" > Sweden </option>
                                        <option @if($teacher->country == '216')  Selected @endif value="216" > Switzerland </option>
                                        <option @if($teacher->country == '217')  Selected @endif value="217" > Syria </option>
                                        <option @if($teacher->country == '218')  Selected @endif value="218" > Taiwan </option>
                                        <option @if($teacher->country == '219')  Selected @endif value="219" > Tajikistan </option>
                                        <option @if($teacher->country == '220')  Selected @endif value="220" > Tanzania </option>
                                        <option @if($teacher->country == '221')  Selected @endif value="221" > Thailand </option>
                                        <option @if($teacher->country == '222')  Selected @endif value="222" > Timor-Leste (East Timor) </option>
                                        <option @if($teacher->country == '223')  Selected @endif value="223" > Togo </option>
                                        <option @if($teacher->country == '224')  Selected @endif value="224" > Tokelau </option>
                                        <option @if($teacher->country == '225')  Selected @endif value="225" > Tonga </option>
                                        <option @if($teacher->country == '226')  Selected @endif value="226" > Trinidad and Tobago </option>
                                        <option @if($teacher->country == '227')  Selected @endif value="227" > Tunisia </option>
                                        <option @if($teacher->country == '228')  Selected @endif value="228" > Turkey </option>
                                        <option @if($teacher->country == '229')  Selected @endif value="229" > Turkmenistan </option>
                                        <option @if($teacher->country == '230')  Selected @endif value="230" > Turks and Caicos Islands </option>
                                        <option @if($teacher->country == '231')  Selected @endif value="231" > Tuvalu </option>
                                        <option @if($teacher->country == '232')  Selected @endif value="232" > Uganda </option>
                                        <option @if($teacher->country == '233')  Selected @endif value="233" > Ukraine </option>
                                        <option @if($teacher->country == '234')  Selected @endif value="234" > United Arab Emirates </option>
                                        <option @if($teacher->country == '235')  Selected @endif value="235" > United Kingdom </option>
                                        <option @if($teacher->country == '236')  Selected @endif value="236" > United States </option>
                                        <option @if($teacher->country == '237')  Selected @endif value="237" > United States Minor Outlying Islands </option>
                                        <option @if($teacher->country == '238')  Selected @endif value="238" > Uruguay </option>
                                        <option @if($teacher->country == '239')  Selected @endif value="239" > Uzbekistan </option>
                                        <option @if($teacher->country == '240')  Selected @endif value="240" > Vanuatu </option>
                                        <option @if($teacher->country == '241')  Selected @endif value="241" > Vatican City </option>
                                        <option @if($teacher->country == '242')  Selected @endif value="242" > Venezuela </option>
                                        <option @if($teacher->country == '243')  Selected @endif value="243" > Vietnam </option>
                                        <option @if($teacher->country == '244')  Selected @endif value="244" > Virgin Islands, British </option>
                                        <option @if($teacher->country == '245')  Selected @endif value="245" > Virgin Islands, US </option>
                                        <option @if($teacher->country == '246')  Selected @endif value="246" > Wallis and Futuna </option>
                                        <option @if($teacher->country == '247')  Selected @endif value="247" > Western Sahara </option>
                                        <option @if($teacher->country == '248')  Selected @endif value="248" > Yemen </option>
                                        <option @if($teacher->country == '249')  Selected @endif value="249" > Zambia </option>
                                        <option @if($teacher->country == '250')  Selected @endif value="250" > Zimbabwe </option>
                                    </select>
                                    {{-- <input value="{{ $teacher->country }}" type="text" name="country" class="form-control" placeholder="Enter country"> --}}
                                </div>
                            </div>

                            <div class="col-sm-4 mt-3">
                                <label class=" form-control-label">Address:</label>
                                <div class="mg-t-10 mg-sm-t-0">
                                    <input value="{{ $teacher->address }}" type="text" name="address" class="form-control" placeholder="Enter address">
                                </div>
                            </div>

                            <div class="col-sm-4 mt-3">
                                <label class="form-control-label">Status: </label>
                                <div class=" mg-t-10 mg-sm-t-0">
                                  <select class="form-control" name="status">
                                    <option @if($teacher->status == 1) @selected(true) @endif value="1">Active</option>
                                    <option @if($teacher->status == 0) @selected(true) @endif value="0">Inactive</option>
                                </select>
                                </div>
                            </div>

                        </div>

                        <div class="row mt-4 mb-5">
                            <div class="col-sm-12">
                                <label class=" form-control-label">Description:</label>
                                <div class="mg-t-10 mg-sm-t-0">
                                    <textarea id="summernote" type="text" name="description" class="form-control" placeholder="Enter description">{{ $teacher->description }}</textarea>
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
                                <input type="text" class="form-control  mb-2 " value="{{ $teacher->bank_name }}" name="bank_name"  placeholder="Bank Name"/>
                            </div>
                            <div class="col-md-6">
                                <label class="mb-2">Bank Code/IFSC</label>
                                <input type="text" class="form-control  mb-2 " value="{{ $teacher->bank_code_ifsc }}" name="bank_code_ifsc"  placeholder="Bank Code/IFSC"/>
                            </div>
                            <div class="col-md-6">
                                <label class="mb-2">Account Number</label>
                                <input type="text" class="form-control  mb-2 " value="{{ $teacher->bank_account_number }}" name="bank_account_number"  placeholder="Account Number"/>
                            </div>
                            <div class="col-md-6">
                                <label class="mb-2">Account Holder Name</label>
                                <input type="text" class="form-control  mb-2 " value="{{ $teacher->bank_ac_holder_name }}" name="bank_ac_holder_name"  placeholder="Account Holder Name"/>
                            </div>
                            <div class="col-md-12">
                                <label class="mb-2">PayPal ID</label>
                                <input type="text" class="form-control  mb-2 " value="{{ $teacher->paypal_id_num }}" name="paypal_id_num"  placeholder="PayPal ID"/>
                            </div>


                        </div>




                        <hr>
                            <div class="right_section">
                                <div>
                                    <h4>Certificates</h4>
                                </div>
                            </div>
                            
                            <div class="mg-t-10 mg-sm-t-0 add-data-content">
                                @if($teacher->certificate->count() == 0)
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
                                @foreach ($teacher->certificate as $k=>$item)
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
                                        @if($k == $teacher->certificate->count() - 1)
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
                        <div class="row mt-4">
                          <div class="col-sm-12 mg-t-10 mg-sm-t-0 text-right">
                            <a href="{{route('admin.teacher.index')}}" type="button" class="btn btn-secondary text-white mr-2" >Cancel</a>
                            <button type="submit" class="btn btn-info ">Update changes</button>
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
