@extends('user.layouts.master-layout')

@section('head')
@section('title','- Profile')
<style>

</style>

@endsection
@section('main_content')

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


    {{-- <div class="right_section" style="width: 95%;">
        <div class="d-flex">
            <div >
                <h4 style="color: var(--seller_text_color)">Personal Details</h4>
                <span style="color: var(--seller_text_color)">Update your information.</span>
            </div>
            <div style="margin-left: 10px">
                <a href="{{ route('user.edit_profile', auth()->user()->id) }}" class="btn" style="background-color:var(--button2_color); color:var(--button2_text_color)">Edit Profile</a>
            </div>
        </div>
        <div class="imgBox">

            <img src="{{asset('/public/upload/users/'.auth()->user()->image)}}" alt="">


            <label for="pp" id="ppBox">
                <i class="fa-solid fa-camera"></i>
            </label>
        </div>
    </div> --}}

    <form action="{{ route('update.user.profile.pic', auth()->user()->id) }}" method="post" enctype="multipart/form-data" id="userForm" style="margin-top:0%">
        @csrf

        <input type="file" name="image2" id="image2" style="display: none;">
        <input type="file" name="new_image" id="pp" style="display: none;" onchange="addfile(this)">

        <div class="card card-body mt-2 mb-3 shadow" style="background-color:var(--seller_background_color)">

            <div class="card card-body shadow" style="background-color:var(--seller_frontend_color); color:var(--seller_text_color)">
                
                
                
                
                <div class="right_section" style="width: 95%;">
                    <div class="d-flex">
                        <div >
                            <h4 style="color: var(--seller_text_color)">Personal Details</h4>
                            <span style="color: var(--seller_text_color)">Update your information.</span>
                        </div>
                        <div style="margin-left: 10px">
                            <a href="{{ route('user.edit_profile', auth()->user()->id) }}" class="btn" style="background-color:var(--button2_color); color:var(--button2_text_color)">Edit Profile</a>
                        </div>
                    </div>
                    <div class="imgBox">
            
                        <img src="{{asset('/public/upload/users/'.auth()->user()->image)}}" alt="">
            
            
                        <label for="pp" id="ppBox">
                            <i class="fa-solid fa-camera"></i>
                        </label>
                    </div>
                </div>
                
                <hr>
                
                
                
                
                <div class="row">
                    <div class="col-md-4 mt-3">
                        <label class="b"><b>Full Name:</b></label>
                        <p>{{ auth()->user()->name }}</p>
                    </div>

                    <div class="col-md-4 mt-3">
                        <label><b>Email Address:</b></label>
                        <p>{{ auth()->user()->email }}</p>
                    </div>
                    <div class="col-md-4 mt-3">
                        <label><b>Phone Number:</b></label>
                        <p>{{ auth()->user()->mobile }}</p>
                    </div>

                    {{-- Customer --}}
                    @if (auth()->user()->type == 1)
                        <div class="col-md-4 mt-3">
                        <label><b>Gender:</b></label>
                        <p>@if ( auth()->user()->gender == '0')
                                Male
                                @elseif ( auth()->user()->gender == '1')
                                Female
                            @else
                            @endif</p>
                        </div>
                        <div class="col-md-4 mt-3">
                            <label><b>Date of Birth:</b></label>
                            <p>{{ date('Y-d-m',strtotime(auth()->user()->dob)) }}</p>
                        </div>
                        <div class="col-md-4 mt-3">
                            <label><b>NID:</b></label>
                            <p>{{ auth()->user()->nid }}</p>
                        </div>
                    {{-- instructor --}}
                    @elseif (auth()->user()->type == 2)
                        <div class="col-md-4 mt-3">
                        <label><b>Gender:</b></label>
                        <p>@if ( auth()->user()->gender == '0')
                                Male
                                @elseif ( auth()->user()->gender == '1')
                                Female
                            @else

                            @endif</p>
                        </div>
                        <div class="col-md-4 mt-3">
                            <label><b>Date of Birth:</b></label>
                            <p>{{ date('d-m-Y',strtotime(auth()->user()->dob)) }}</p>
                        </div>
                        <div class="col-md-4 mt-3">
                            <label><b>NID:</b></label>
                            <p>{{ auth()->user()->nid }}</p>
                        </div>

                        <div class="col-md-4 mt-3">
                            <label><b>Designation:</b></label>
                            <p>{{ auth()->user()->designation }}</p>
                        </div>
                        <div class="col-md-4 mt-3">
                            <label><b>Institution:</b></label>
                            <p>{{ auth()->user()->institution }}</p>
                        </div>


                    @else

                    @endif
                    <div class="col-md-4 mt-3">
                        <label><b>Qualification:</b></label>
                        <p>{{ auth()->user()->qualification }}</p>
                    </div>
                    <div class="col-md-4 mt-3">
                        <label><b>Experience:</b></label>
                        <p>{{ auth()->user()->experience }}</p>
                    </div>
                    <div class="col-md-4 mt-3">
                        <label><b>Language:</b></label>
                      @if (auth()->user()->language == '1')
                        <p>Bangla</p>
                      @elseif (auth()->user()->language == '2')
                        <p>English</p>
                    @elseif (auth()->user()->language == '3')
                       <p>Hindi</p>
                    @elseif (auth()->user()->language == '4')
                      <p>Arabic</p>
                      @endif
                        {{-- <p>{{ auth()->user()->language }}</p> --}}
                    </div>

                    @if (auth()->user()->type == 1 || auth()->user()->type == 7)
                        <div class="col-md-4 mt-3">
                            <label><b>Continent:</b></label>
                            {{-- <p> --}}
                            <p>{{ auth()->user()->continents?->name }}</p>
                        </div>
                    @endif

                    <div class="col-md-4 mt-3">
                        <label><b>Country:</b></label>
                        {{-- <p> --}}
                        @if (auth()->user()->country == '1')
                          <p>Afghanistan</p>
                        @elseif (auth()->user()->country == '2')
                        <p>Aland Islands</p>
                        @elseif (auth()->user()->country == '3')
                        <p>Albania</p>
                        @elseif (auth()->user()->country == '4')
                        <p> Algeria</p>
                        @elseif (auth()->user()->country == '5')
                        <p>American Samoa</p>
                        @elseif (auth()->user()->country == '6')
                        <p>Andorra</p>
                        @elseif (auth()->user()->country == '7')
                        <p> Angola</p>
                        @elseif (auth()->user()->country == '8')
                        <p>Anguilla</p>
                        @elseif (auth()->user()->country == '9')
                        <p> Antarctica</p>
                        @elseif (auth()->user()->country == '10')
                        <p> Antigua and Barbuda</p>
                        @elseif (auth()->user()->country == '11')
                        <p> Argentina</p>
                        @elseif (auth()->user()->country == '12')
                        <p> Armenia</p>
                        @elseif (auth()->user()->country == '13')
                        <p> Aruba</p>
                        @elseif (auth()->user()->country == '14')
                        <p> Australia</p>
                        @elseif (auth()->user()->country == '15')
                        <p> Austria</p>
                        @elseif (auth()->user()->country == '16')
                        <p> Azerbaijan</p>
                        @elseif (auth()->user()->country == '17')
                        <p> Bahamas</p>
                        @elseif (auth()->user()->country == '18')
                        <p> Bahrain</p>
                        @elseif (auth()->user()->country == '19')
                        <p> Bangladesh</p>
                        @elseif (auth()->user()->country == '20')
                        <p> Barbados</p>
                        @elseif (auth()->user()->country == '21')
                        <p> Belarus</p>
                        @elseif (auth()->user()->country == '22')
                        <p> Belgium</p>
                        @elseif (auth()->user()->country == '23')
                        <p> Belize</p>
                        @elseif (auth()->user()->country == '24')
                        <p> Benin</p>
                        @elseif (auth()->user()->country == '25')
                        <p> Bermuda</p>
                        @elseif (auth()->user()->country == '26')
                        <p> Bhutan</p>
                        @elseif (auth()->user()->country == '27')
                        <p> Bolivia</p>
                        @elseif (auth()->user()->country == '28')
                        <p> Bonaire, Sint Eustatius and Saba</p>
                        @elseif (auth()->user()->country == '29')
                        <p> Bosnia and Herzegovina</p>
                        @elseif (auth()->user()->country == '30')
                        <p> Botswana</p>
                        @elseif (auth()->user()->country == '31')
                        <p> Bouvet Island</p>
                        @elseif (auth()->user()->country == '32')
                        <p> Brazil</p>
                        @elseif (auth()->user()->country == '33')
                        <p> British Indian Ocean Territory</p>
                        @elseif (auth()->user()->country == '34')
                        <p> Brunei</p>
                        @elseif (auth()->user()->country == '35')
                        <p> Bulgaria</p>
                        @elseif (auth()->user()->country == '36')
                        <p>Burkina Faso</p>
                        @elseif (auth()->user()->country == '37')
                        <p> Burundi</p>
                        @elseif (auth()->user()->country == '38')
                        <p> Cambodia</p>
                        @elseif (auth()->user()->country == '39')
                        <p> Cameroon</p>
                        @elseif (auth()->user()->country == '40')
                        <p> Canada</p>
                        @elseif (auth()->user()->country == '41')
                        <p>  Cape Verde</p>
                        @elseif (auth()->user()->country == '42')
                        <p> Cayman Islands </p>
                        @elseif (auth()->user()->country == '43')
                        <p> Central African Republic </p>
                        @elseif (auth()->user()->country == '44')
                        <p> Chad</p>
                        @elseif (auth()->user()->country == '45')
                        <p> Chile</p>
                        @elseif (auth()->user()->country == '46')
                        <p> China</p>
                        @elseif (auth()->user()->country == '47')
                        <p>Christmas Island </p>
                        @elseif (auth()->user()->country == '48')
                        <p> Cocos (Keeling) Islands </p>
                        @elseif (auth()->user()->country == '49')
                        <p> Colombia</p>
                        @elseif (auth()->user()->country == '50')
                        <p> Comoros</p>
                        @elseif (auth()->user()->country == '51')
                        <p> Congo</p>
                        @elseif (auth()->user()->country == '52')
                        <p>Cook Islands</p>
                        @elseif (auth()->user()->country == '53')
                        <p> Costa Rica</p>
                        @elseif (auth()->user()->country == '54')
                        <p>Ivory Coast</p>
                        @elseif (auth()->user()->country == '55')
                        <p> Croatia</p>
                        @elseif (auth()->user()->country == '56')
                        <p> Cuba</p>
                        @elseif (auth()->user()->country == '57')
                        <p> Curacao</p>
                        @elseif (auth()->user()->country == '58')
                        <p> Cyprus</p>
                        @elseif (auth()->user()->country == '59')
                        <p>Czech Republic</p>
                        @elseif (auth()->user()->country == '60')
                        <p>Democratic Republic of the Congo</p>
                        @elseif (auth()->user()->country == '61')
                        <p> Denmark</p>
                        @elseif (auth()->user()->country == '62')
                        <p> Djibouti</p>
                        @elseif (auth()->user()->country == '63')
                        <p> Dominica</p>
                        @elseif (auth()->user()->country == '64')
                        <p> Dominican Republic</p>
                        @elseif (auth()->user()->country == '65')
                        <p> Ecuador</p>
                        @elseif (auth()->user()->country == '66')
                        <p> Egypt</p>
                        @elseif (auth()->user()->country == '67')
                        <p>El Salvador</p>
                        @elseif (auth()->user()->country == '68')
                        <p> Equatorial Guinea</p>
                        @elseif (auth()->user()->country == '69')
                        <p> Eritrea</p>
                        @elseif (auth()->user()->country == '70')
                        <p> Estonia</p>
                        @elseif (auth()->user()->country == '71')
                        <p> Ethiopia</p>
                        @elseif (auth()->user()->country == '72')
                        <p> Falkland Islands (Malvinas)</p>
                        @elseif (auth()->user()->country == '73')
                        <p> Faroe Islands </p>
                        @elseif (auth()->user()->country == '74')
                        <p> Fiji</p>
                        @elseif (auth()->user()->country == '75')
                        <p> Finland</p>
                        @elseif (auth()->user()->country == '76')
                        <p> France</p>
                        @elseif (auth()->user()->country == '77')
                        <p> French Guiana</p>
                        @elseif (auth()->user()->country == '78')
                        <p> French Polynesia</p>
                        @elseif (auth()->user()->country == '79')
                        <p> French Southern Territories </p>
                        @elseif (auth()->user()->country == '80')
                        <p> Gabon</p>
                        @elseif (auth()->user()->country == '81')
                        <p> Gambia</p>
                        @elseif (auth()->user()->country == '82')
                        <p> Georgia</p>
                        @elseif (auth()->user()->country == '83')
                        <p> Germany</p>
                        @elseif (auth()->user()->country == '84')
                        <p> Ghana</p>
                        @elseif (auth()->user()->country == '85')
                        <p> Gibraltar</p>
                        @elseif (auth()->user()->country == '86')
                        <p> Greece</p>
                        @elseif (auth()->user()->country == '87')
                        <p> Greenland</p>
                        @elseif (auth()->user()->country == '88')
                        <p> Grenada</p>
                        @elseif (auth()->user()->country == '89')
                        <p> Guadaloupe</p>
                        @elseif (auth()->user()->country == '90')
                        <p> Guam</p>
                        @elseif (auth()->user()->country == '91')
                        <p> Guatemala</p>
                        @elseif (auth()->user()->country == '92')
                        <p> Guernsey</p>
                        @elseif (auth()->user()->country == '93')
                        <p> Guinea</p>
                        @elseif (auth()->user()->country == '94')
                        <p> Guinea-Bissau</p>
                        @elseif (auth()->user()->country == '95')
                        <p> Guyana</p>
                        @elseif (auth()->user()->country == '96')
                        <p> Haiti</p>
                        @elseif (auth()->user()->country == '97')
                        <p> Heard Island and McDonald Islands</p>
                        @elseif (auth()->user()->country == '98')
                        <p> Honduras</p>
                        @elseif (auth()->user()->country == '99')
                        <p> Hong Kong</p>
                        @elseif (auth()->user()->country == '100')
                        <p> Hungary</p>
                        @elseif (auth()->user()->country == '101')
                        <p> Iceland</p>
                        @elseif (auth()->user()->country == '102')
                        <p> India</p>
                        @elseif (auth()->user()->country == '103')
                        <p> Indonesia</p>
                        @elseif (auth()->user()->country == '104')
                        <p> Iran</p>
                        @elseif (auth()->user()->country == '105')
                        <p> Iraq</p>
                        @elseif (auth()->user()->country == '106')
                        <p> Ireland</p>
                        @elseif (auth()->user()->country == '107')
                        <p> Isle of Man</p>
                        @elseif (auth()->user()->country == '108')
                        <p> Israel</p>
                        @elseif (auth()->user()->country == '109')
                        <p> Italy</p>
                        @elseif (auth()->user()->country == '110')
                        <p> Jamaica</p>
                        @elseif (auth()->user()->country == '111')
                        <p> Japan</p>
                        @elseif (auth()->user()->country == '112')
                        <p> Jersey</p>
                        @elseif (auth()->user()->country == '113')
                        <p> Jordan</p>
                        @elseif (auth()->user()->country == '114')
                        <p> Kazakhstan</p>
                        @elseif (auth()->user()->country == '115')
                        <p> Kenya</p>
                        @elseif (auth()->user()->country == '116')
                        <p> Kiribati</p>
                        @elseif (auth()->user()->country == '117')
                        <p> Kosovo</p>
                        @elseif (auth()->user()->country == '118')
                        <p> Kuwait</p>
                        @elseif (auth()->user()->country == '119')
                        <p> Kyrgyzstan</p>
                        @elseif (auth()->user()->country == '120')
                        <p> Laos</p>
                        @elseif (auth()->user()->country == '121')
                        <p> Latvia</p>
                        @elseif (auth()->user()->country == '122')
                        <p> Lebanon</p>
                        @elseif (auth()->user()->country == '123')
                        <p> Lesotho</p>
                        @elseif (auth()->user()->country == '124')
                        <p> Liberia</p>
                        @elseif (auth()->user()->country == '125')
                        <p> Libya</p>
                        @elseif (auth()->user()->country == '126')
                        <p> Liechtenstein</p>
                        @elseif (auth()->user()->country == '127')
                        <p> Lithuania</p>
                        @elseif (auth()->user()->country == '128')
                        <p> Luxembourg</p>
                        @elseif (auth()->user()->country == '129')
                        <p> Macao</p>
                        @elseif (auth()->user()->country == '130')
                        <p> Macedonia</p>
                        @elseif (auth()->user()->country == '131')
                        <p> Madagascar</p>
                        @elseif (auth()->user()->country == '132')
                        <p> Malawi</p>
                        @elseif (auth()->user()->country == '133')
                        <p> Malaysia</p>
                        @elseif (auth()->user()->country == '134')
                        <p> Maldives</p>
                        @elseif (auth()->user()->country == '135')
                        <p> Mali</p>
                        @elseif (auth()->user()->country == '136')
                        <p> Malta</p>
                        @elseif (auth()->user()->country == '137')
                        <p> Marshall Islands </p>
                        @elseif (auth()->user()->country == '138')
                        <p> Martinique</p>
                        @elseif (auth()->user()->country == '139')
                        <p> Mauritania</p>
                        @elseif (auth()->user()->country == '140')
                        <p> Mauritius</p>
                        @elseif (auth()->user()->country == '141')
                        <p> Mayotte</p>
                        @elseif (auth()->user()->country == '142')
                        <p> Mexico</p>
                        @elseif (auth()->user()->country == '143')
                        <p> Micronesia</p>
                        @elseif (auth()->user()->country == '144')
                        <p> Moldava</p>
                        @elseif (auth()->user()->country == '145')
                        <p> Monaco</p>
                        @elseif (auth()->user()->country == '146')
                        <p> Mongolia</p>
                        @elseif (auth()->user()->country == '147')
                        <p> Montenegro</p>
                        @elseif (auth()->user()->country == '148')
                        <p> Montserrat</p>
                        @elseif (auth()->user()->country == '149')
                        <p> Morocco</p>
                        @elseif (auth()->user()->country == '150')
                        <p> Mozambique</p>
                        @elseif (auth()->user()->country == '151')
                        <p> Myanmar (Burma)</p>
                        @elseif (auth()->user()->country == '152')
                        <p> Namibia</p>
                        @elseif (auth()->user()->country == '153')
                        <p> Nauru</p>
                        @elseif (auth()->user()->country == '154')
                        <p> Nepal</p>
                        @elseif (auth()->user()->country == '155')
                        <p> Netherlands</p>
                        @elseif (auth()->user()->country == '156')
                        <p> New Caledonia</p>
                        @elseif (auth()->user()->country == '157')
                        <p> New Zealand</p>
                        @elseif (auth()->user()->country == '158')
                        <p> Nicaragua</p>
                        @elseif (auth()->user()->country == '159')
                        <p> Niger</p>
                        @elseif (auth()->user()->country == '160')
                        <p> Nigeria</p>
                        @elseif (auth()->user()->country == '161')
                        <p> Niue</p>
                        @elseif (auth()->user()->country == '162')
                        <p> Norfolk Island </p>
                        @elseif (auth()->user()->country == '163')
                        <p>  North Korea  </p>
                        @elseif (auth()->user()->country == '164')
                        <p> Northern Mariana Islands </p>
                        @elseif (auth()->user()->country == '165')
                        <p> Norway</p>
                        @elseif (auth()->user()->country == '166')
                        <p> Oman</p>
                        @elseif (auth()->user()->country == '167')
                        <p> Pakistan</p>
                        @elseif (auth()->user()->country == '168')
                        <p> Palau</p>
                        @elseif (auth()->user()->country == '169')
                        <p> Palestine</p>
                        @elseif (auth()->user()->country == '170')
                        <p> Panama</p>
                        @elseif (auth()->user()->country == '171')
                        <p>  Papua New Guinea </p>
                        @elseif (auth()->user()->country == '172')
                        <p>Paraguay</p>
                        @elseif (auth()->user()->country == '173')
                        <p>Peru</p>
                        @elseif (auth()->user()->country == '174')
                        <p>Phillipines</p>
                        @elseif (auth()->user()->country == '175')
                        <p>Pitcairn</p>
                        @elseif (auth()->user()->country == '176')
                        <p>Poland</p>
                        @elseif (auth()->user()->country == '177')
                        <p>Portugal</p>
                        @elseif (auth()->user()->country == '178')
                        <p>Puerto Rico </p>
                        @elseif (auth()->user()->country == '179')
                        <p>Qatar</p>
                        @elseif (auth()->user()->country == '180')
                        <p>Reunion</p>
                        @elseif (auth()->user()->country == '181')
                        <p>Romania</p>
                        @elseif (auth()->user()->country == '182')
                        <p>Russia</p>
                        @elseif (auth()->user()->country == '183')
                        <p>Rwanda</p>
                        @elseif (auth()->user()->country == '184')
                        <p>Saint Barthelemy </p>
                        @elseif (auth()->user()->country == '185')
                        <p>Saint Helena </p>
                        @elseif (auth()->user()->country == '186')
                        <p>Saint Kitts and Nevis</p>
                        @elseif (auth()->user()->country == '187')
                        <p>Saint Lucia</p>
                        @elseif (auth()->user()->country == '188')
                        <p>Saint Martin</p>
                        @elseif (auth()->user()->country == '189')
                        <p>Saint Pierre and Miquelon </p>
                        @elseif (auth()->user()->country == '190')
                        <p>Saint Vincent and the Grenadines</p>
                        @elseif (auth()->user()->country == '191')
                        <p>Samoa</p>
                        @elseif (auth()->user()->country == '192')
                        <p>San Marino </p>
                        @elseif (auth()->user()->country == '193')
                        <p>Sao Tome and Principe </p>
                        @elseif (auth()->user()->country == '194')
                        <p>Saudi Arabia </p>
                        @elseif (auth()->user()->country == '195')
                        <p>Senegal</p>
                        @elseif (auth()->user()->country == '196')
                        <p>Serbia</p>
                        @elseif (auth()->user()->country == '197')
                        <p>Seychelles</p>
                        @elseif (auth()->user()->country == '198')
                        <p> Sierra Leone</p>
                        @elseif (auth()->user()->country == '199')
                        <p>Singapore</p>
                        @elseif (auth()->user()->country == '200')
                        <p>Sint Maarten</p>
                        @elseif (auth()->user()->country == '201')
                        <p>Slovakia</p>
                        @elseif (auth()->user()->country == '202')
                        <p>Slovenia</p>
                        @elseif (auth()->user()->country == '203')
                        <p>Solomon Islands</p>
                        @elseif (auth()->user()->country == '204')
                        <p>Somalia</p>
                        @elseif (auth()->user()->country == '205')
                        <p>South Africa</p>
                        @elseif (auth()->user()->country == '206')
                        <p>South Georgia and the South Sandwich Islands</p>
                        @elseif (auth()->user()->country == '207')
                        <p>South Korea</p>
                        @elseif (auth()->user()->country == '208')
                        <p>South Sudan</p>
                        @elseif (auth()->user()->country == '209')
                        <p>Spain</p>
                        @elseif (auth()->user()->country == '210')
                        <p>Sri Lanka</p>
                        @elseif (auth()->user()->country == '211')
                        <p>Sudan</p>
                        @elseif (auth()->user()->country == '212')
                        <p>Suriname</p>
                        @elseif (auth()->user()->country == '213')
                        <p>Svalbard and Jan Mayen </p>
                        @elseif (auth()->user()->country == '214')
                        <p>Swaziland</p>
                        @elseif (auth()->user()->country == '215')
                        <p>Sweden</p>
                        @elseif (auth()->user()->country == '216')
                        <p>Switzerland</p>
                        @elseif (auth()->user()->country == '217')
                        <p>Syria</p>
                        @elseif (auth()->user()->country == '218')
                        <p>Taiwan</p>
                        @elseif (auth()->user()->country == '219')
                        <p>Tajikistan</p>
                        @elseif (auth()->user()->country == '220')
                        <p>Tanzania</p>
                        @elseif (auth()->user()->country == '221')
                        <p>Thailand</p>
                        @elseif (auth()->user()->country == '222')
                        <p>Timor-Leste (East Timor)</p>
                        @elseif (auth()->user()->country == '223')
                        <p>Togo</p>
                        @elseif (auth()->user()->country == '224')
                        <p>Tokelau</p>
                        @elseif (auth()->user()->country == '225')
                        <p>Tonga</p>
                        @elseif (auth()->user()->country == '226')
                        <p>Trinidad and Tobago</p>
                        @elseif (auth()->user()->country == '227')
                        <p>Tunisia</p>
                        @elseif (auth()->user()->country == '228')
                        <p>Turkey</p>
                        @elseif (auth()->user()->country == '229')
                        <p>Turkmenistan</p>
                        @elseif (auth()->user()->country == '230')
                        <p>Turks and Caicos Islands</p>
                        @elseif (auth()->user()->country == '231')
                        <p>Tuvalu</p>
                        @elseif (auth()->user()->country == '232')
                        <p>Uganda</p>
                        @elseif (auth()->user()->country == '233')
                        <p>Ukraine</p>
                        @elseif (auth()->user()->country == '234')
                        <p>United Arab Emirates</p>
                        @elseif (auth()->user()->country == '235')
                        <p>United Kingdom</p>
                        @elseif (auth()->user()->country == '236')
                        <p>United States</p>
                        @elseif (auth()->user()->country == '237')
                        <p>United States Minor Outlying Islands</p>
                        @elseif (auth()->user()->country == '238')
                        <p>Uruguay</p>
                        @elseif (auth()->user()->country == '239')
                        <p>Uzbekistan</p>
                        @elseif (auth()->user()->country == '240')
                        <p>Vanuatu</p>
                        @elseif (auth()->user()->country == '241')
                        <p>Vatican City</p>
                        @elseif (auth()->user()->country == '242')
                        <p>Venezuela</p>
                        @elseif (auth()->user()->country == '243')
                        <p>Vietnam</p>
                        @elseif (auth()->user()->country == '244')
                        <p>Virgin Islands, British</p>
                        @elseif (auth()->user()->country == '245')
                        <p>Virgin Islands, US</p>
                        @elseif (auth()->user()->country == '246')
                        <p>Wallis and Futuna</p>
                        @elseif (auth()->user()->country == '247')
                        <p> Western Sahara</p>
                        @elseif (auth()->user()->country == '248')
                        <p>Yemen</p>
                        @elseif (auth()->user()->country == '249')
                        <p>Zambia</p>
                        @elseif (auth()->user()->country == '250')
                        <p>Zimbabwe</p>
                        @endif
                        </select>
                    </div>
                    <div class="col-md-4 mt-3">
                        <label><b>Address:</b></label>
                        <p>{{ auth()->user()->address }}</p>
                    </div>
                </div>
            </div>
        </div>
    </form>


@endsection
@section('script')
<script>


</script>

<script>

    function addfile(arg){
        var file = arg.files[0];
        const fileInput = document.querySelector('#image2');
        const dataTransfer = new DataTransfer();
        dataTransfer.items.add(file);
        fileInput.files = dataTransfer.files;
          $('#userForm').submit();
    }
    </script>
@endsection
