// *********************** Start Admin Home Script **************************
// *********************** Start Admin Home Script **************************

// ######### Start Category  Delete Bootstrap model Model Script ##########

$(document).ready(function () {
    $(document).on("click", "#homeCatdelete", function () {
        var cat_id = $(this).val();
        $("#homeDeleteCategory").modal("show");
        $("#category_id").val(cat_id);
    });
});

// ######### End Category  Delete Bootstrap model Model Script ##########

// ######### Sub Category  Delete Bootstrap model Model Script ##########

$(document).ready(function () {
    $(document).on("click", "#homeSubCatdelete", function () {
        var sub_cat_id = $(this).val();
        $("#homeDeleteSubCategory").modal("show");
        $("#subcategory_id").val(sub_cat_id);
    });
});

// ######### End Sub Category  Delete Bootstrap model Model Script ##########

// ######### Child Category  Delete Bootstrap model Model Script ##########

$(document).ready(function () {
    $(document).on("click", "#homechildCatdelete", function () {
        var child_cat_id = $(this).val();
        $("#homeDeletechildCategory").modal("show");
        $("#child_category_id").val(child_cat_id);
    });
});

// ######### End Child Category  Delete Bootstrap model Model Script ##########

// ######### Banner Delete Bootstrap model Model Script ##########

$(document).ready(function () {
    $(document).on("click", "#homebannerdelete", function () {
        var home_banner_id = $(this).val();
        $("#homebannermodel").modal("show");
        $("#home_banner_id").val(home_banner_id);
    });
});

// ######### End Banner Delete Bootstrap model Model Script ##########

// ######### Home Slider  Delete Bootstrap model Model Script ##########

$(document).ready(function () {
    $(document).on("click", "#homesliderdelete", function () {
        var slider_id = $(this).val();
        $("#homeslidermodel").modal("show");
        $("#slider_id").val(slider_id);
    });
});

// ######### End Home Slider Delete Bootstrap model Model Script ##########

// ######### Home Client  Delete Bootstrap model Model Script ##########

$(document).ready(function () {
    $(document).on("click", "#homeclientdelete", function () {
        var home_client_id = $(this).val();
        $("#homeclientmodel").modal("show");
        $("#home_client_id").val(home_client_id);
    });
});

// ######### End Home Client Delete Bootstrap model Model Script ##########

// ######### Home Delete Bootstrap model Model Script ##########
$(document).ready(function () {
    $(document).on("click", "#dataDeleteModal", function () {
        var id = $(this).val();
        $("#datamodalshow").modal("show");
        $("#modal_data_id").val(id);
    });
});

// ######### End Home Delete Bootstrap model Model Script ##########

//////////////////// ######### Start Blog Scripts ########## ///////////////////////

// sub category and child category dependent dropdown
$(document).ready(function () {
    // sub category dependent
    jQuery("#cat_id").on("change", function () {
        var categoryID = $(this).val();

        if (categoryID) {
            $.ajax({
                url: base_url + "/admin/blog-subcategory/" + categoryID,
                type: "GET",
                dataType: "json",
                success: function (data) {
                    $("#sub_cat_id").empty();
                    $("#sub_cat_id").append(
                        '<option value="">Select Sub Category</option>'
                    );
                    $.each(data, function (key, value) {
                        $("#sub_cat_id").append(
                            '<option value="' +
                                value.id +
                                '">' +
                                value.sub_cat_name +
                                "</option>"
                        );
                    });
                },
            });
        } else {
            $("#sub_cat_id").empty();
        }
    });

    // child category dependent

    jQuery("#sub_cat_id").on("change", function () {
        var subcategoryID = $(this).val();

        if (subcategoryID) {
            $.ajax({
                url: base_url + "/admin/blog-child-category/" + subcategoryID,
                type: "GET",
                dataType: "json",
                success: function (data) {
                    $("#child_cat_id").empty();
                    $("#child_cat_id").append(
                        '<option value="">Select Child Category</option>'
                    );
                    $.each(data, function (key, value) {
                        $("#child_cat_id").append(
                            '<option value="' +
                                value.id +
                                '">' +
                                value.child_cat_name +
                                "</option>"
                        );
                    });
                },
            });
        } else {
            $("#child_cat_id").empty();
        }
    });
});



//////////////////// ######### End Blog Scripts ########## ///////////////////////

//////////////////// ######### End Blog Scripts ########## ///////////////////////



// *********************** End Admin Home Script **************************
// *********************** End Admin Home Script **************************

// *********************** Start Admin Services Script ********************
// *********************** Start Admin Services Script ********************

// patient-test dependent dropdown for pharmacy product
$(document).ready(function () {
    // patient test dependent
    jQuery("#test_to_diagostic_id").on("change", function () {
        var DiagnostcId = $(this).val();

        if (DiagnostcId) {
            $.ajax({
                url: base_url + "/test/" + DiagnostcId,
                type: "GET",
                dataType: "json",
                success: function (data) {
                    $("#test_id").empty();

                    $.each(data, function (key, value) {
                        $("#test_id").append(
                            '<option value="' +
                                value.id +
                                '">' +
                                value.test_name +
                                "</option>"
                        );
                    });
                },
            });
        } else {
            $("#test_id").empty();
        }
    });
});


// *********************** End Admin Services Script **************************
// *********************** End Admin Services Script **************************

// *********************** Start Admin Telemadicine Script **************************
// *********************** Start Admin Telemadicine Script **************************

// ######### Start Telemadicine Appointment Delete model Model Script ##########

$(document).ready(function () {
    $(document).on("click", "#AppointmentDelete", function () {
        var appointment_id = $(this).val();
        $("#DeleteAppointment").modal("show");
        $("#appointment_id").val(appointment_id);
    });
});

// ######### End Telemadicine Appointment Delete model Model Script ##########

// ######### Start Telemadicine Consultation Category Delete model Model Script ##########

$(document).ready(function () {
    $(document).on("click", "#ConsultationCatDelete", function () {
        var consulation_cat = $(this).val();
        $("#DeleteConsultationCat").modal("show");
        $("#consulation_cat").val(consulation_cat);
    });
});

// ######### End Telemadicine Consultation Category Delete model Model Script ##########

// *********************** End Admin Telemadicine Script **************************
// *********************** End Admin Telemadicine Script ***********************

// *********************** Start Admin Parmacy Script ********************
// *********************** Start Admin Parmacy Script ********************

// ######### Start Pharmacy Category Delete model Model Script ##########

$(document).ready(function () {
    $(document).on("click", "#PharCatDelete", function () {
        var phar_cat_id = $(this).val();
        $("#DeletePharCat").modal("show");
        $("#phar_cat_id").val(phar_cat_id);
    });
});

// ######### End Pharmacy Category Delete model Model Script ##########

// ######### Start Pharmacy Product Delete model Model Script ##########

$(document).ready(function () {
    $(document).on("click", "#PharProductDelete", function () {
        var phar_proiduct_id = $(this).val();
        $("#DeletePharProduct").modal("show");
        $("#phar_proiduct_id").val(phar_proiduct_id);
    });
});

// sub category and child category dependent dropdown for pharmacy product
$(document).ready(function () {
    // sub category dependent
    jQuery("#product_cat_id").on("change", function () {
        var pharCatId = $(this).val();

        if (pharCatId) {
            $.ajax({
                url: base_url + "/admin/product-subcategory/" + pharCatId,
                type: "GET",
                dataType: "json",
                success: function (data) {
                    $("#product_sub_cat_id").empty();
                    $("#product_sub_cat_id").append(
                        '<option value="">Select Sub Category</option>'
                    );
                    $.each(data, function (key, value) {
                        $("#product_sub_cat_id").append(
                            '<option value="' +
                                value.id +
                                '">' +
                                value.sub_cat_name +
                                "</option>"
                        );
                    });
                },
            });
        } else {
            $("#product_sub_cat_id").empty();
        }
    });

    // child category dependent

    jQuery("#product_sub_cat_id").on("change", function () {
        var PharSubCatId = $(this).val();

        if (PharSubCatId) {
            $.ajax({
                url: base_url + "/admin/product-child-category/" + PharSubCatId,
                type: "GET",
                dataType: "json",
                success: function (data) {
                    $("#product_child_cat_id").empty();
                    $("#product_child_cat_id").append(
                        '<option value="">Select Child Category</option>'
                    );
                    $.each(data, function (key, value) {
                        $("#product_child_cat_id").append(
                            '<option value="' +
                                value.id +
                                '">' +
                                value.child_cat_name +
                                "</option>"
                        );
                    });
                },
            });
        } else {
            $("#product_child_cat_id").empty();
        }
    });
});

// ######### End Pharmacy Product Delete model Model Script ##########

// ######### Start Pharmacy Sub Category Delete model Model Script ##########

$(document).ready(function () {
    $(document).on("click", "#PharSubCatDelete", function () {
        var phar_sub_cat_id = $(this).val();
        $("#DeletePharSubCat").modal("show");
        $("#phar_sub_cat_id").val(phar_sub_cat_id);
    });
});

// ######### End Pharmacy Sub Category Delete model Model Script ##########

// ######### Start Pharmacy Child Category Delete model Model Script ##########

$(document).ready(function () {
    $(document).on("click", "#PharChildCatDelete", function () {
        var phar_child_cat_id = $(this).val();
        $("#DeletePharChildCat").modal("show");
        $("#phar_child_cat_id").val(phar_child_cat_id);
    });
});

// ######### End Pharmacy Child Category Delete model Model Script ##########

// ######### Start Pharmacy Banner Delete model Model Script ##########

$(document).ready(function () {
    $(document).on("click", "#pharmacyBannerDelete", function () {
        var phar_banner_id = $(this).val();
        $("#PharmacyDeleteBanner").modal("show");
        $("#phar_banner_id").val(phar_banner_id);
    });
});

// ######### End Pharmacy Banner Delete model Model Script ##########

// ######### Start Pharmacy Slider Delete model Model Script ##########

$(document).ready(function () {
    $(document).on("click", "#pharmacySliderDelete", function () {
        var phar_slider_id = $(this).val();
        $("#pharmacyDeleteSlider").modal("show");
        $("#phar_slider_id").val(phar_slider_id);
    });
});

// ######### End Pharmacy Slider Delete model Model Script ##########

// ######### Start Pharmacy Partner  Delete model Model Script ##########

$(document).ready(function () {
    $(document).on("click", "#DeletepharmacyPartner", function () {
        var phar_partner_id = $(this).val();
        $("#pharmacyPartnerDelete").modal("show");
        $("#phar_partner_id").val(phar_partner_id);
    });
});

// ######### End Pharmacy  Partner Delete model Model Script ##########

// ######### Start Pharmacy Client  Delete model Model Script ##########

$(document).ready(function () {
    $(document).on("click", "#pharmacyClientDelete", function () {
        var phar_client_id = $(this).val();
        $("#pharmacyDeleteClient").modal("show");
        $("#phar_client_id").val(phar_client_id);
    });
});

// ######### End Pharmacy  Client Delete model Model Script ##########

// ######### Start Pharmacy advartisement  Delete model Model Script ##########

$(document).ready(function () {
    $(document).on("click", "#pharadvertisementDelete", function () {
        var phar_ad_id = $(this).val();
        $("#DeletePharAdvertisement").modal("show");
        $("#phar_ad_id").val(phar_ad_id);
    });
});

// ######### End Pharmacy  advartisement Delete model Model Script ##########

// ######### Start Pharmacy Brand  Delete model Model Script ##########

$(document).ready(function () {
    $(document).on("click", "#pharmacyBrandDelete", function () {
        var phar_brand_id = $(this).val();
        $("#pharmacyDeleteBrand").modal("show");
        $("#phar_brand_id").val(phar_brand_id);
    });
});

// ######### End Pharmacy  Brand Delete model Model Script ##########

// *********************** End Admin Parmacy Script ********************
// *********************** End Admin Parmacy Script ********************

// *********************** Start User Management Script **************************
// *********************** Start User Management Script **************************

// ######### Start User Delete  model Model Script ##########

$(document).ready(function () {
    $(document).on("click", "#userdelete", function () {
        var user_id = $(this).val();
        $("#DeleteUser").modal("show");
        $("#user_id").val(user_id);
    });
});

// ######### End User Delete model Model Script ##########

// *********************** End User Management Script **************************
// *********************** End User Management Script **************************

// *********************** Start  Address  Script **************************
// *********************** Start  Address  Script **************************

// ######### Start Continent Delete model Model Script ##########
$(document).ready(function () {
    $(document).on("click", "#ContinentDelete", function () {
        var continent_id = $(this).val();
        $("#DeleteContinent").modal("show");
        $("#continent_id").val(continent_id);
    });
});
// ######### End Continent Delete model Model Script ##########

// ######### Start Country Delete model Model Script ##########
$(document).ready(function () {
    $(document).on("click", "#CountryDelete", function () {
        var country_id = $(this).val();
        $("#DeleteCountry").modal("show");
        $("#country_id").val(country_id);
    });
});
// ######### End Country Delete model Model Script ##########

// ######### Start Division Delete model Model Script ##########
$(document).ready(function () {
    $(document).on("click", "#DivisionDelete", function () {
        var div_id = $(this).val();
        $("#DeleteDivision").modal("show");
        $("#div_id").val(div_id);
    });
});
// ######### End Division Delete model Model Script ##########

// ######### Start Distric Delete model Model Script ##########
$(document).ready(function () {
    $(document).on("click", "#DistrictDelete", function () {
        var dist_id = $(this).val();
        $("#DeleteDistrict").modal("show");
        $("#dist_id").val(dist_id);
    });
});
// ######### End Distric Delete model Model Script ##########

// ######### Start thana Delete model Model Script ##########
$(document).ready(function () {
    $(document).on("click", "#ThanaDelete", function () {
        var tha_id = $(this).val();
        $("#DeleteThana").modal("show");
        $("#tha_id").val(tha_id);
    });
});
// ######### End thana Delete model Model Script ##########

/**###### Address Country  dependent ######******/
$(document).ready(function () {
    // country dependent
    jQuery("#continent_id").on("change", function () {
        var continentID = $(this).val();

        if (continentID) {
            $.ajax({
                url: base_url + "/admin/address-country/" + continentID,
                type: "GET",
                dataType: "json",
                success: function (data) {
                    $("#country_id").empty();
                    $("#country_id").append(
                        '<option value="">Select Country</option>'
                    );
                    $.each(data, function (key, value) {
                        $("#country_id").append(
                            '<option value="' +
                                value.id +
                                '">' +
                                value.sub_cont_name +
                                "</option>"
                        );
                    });
                },
            });
        } else {
            $("#country_id").empty();
        }
    });
});

/**###### Address Division  dependent ######******/
$(document).ready(function () {
    // Division dependent
    jQuery("#country_id").on("change", function () {
        var countryID = $(this).val();

        if (countryID) {
            $.ajax({
                url: base_url + "/admin/address-division/" + countryID,
                type: "GET",
                dataType: "json",
                success: function (data) {
                    $("#division_id").empty();
                    $("#division_id").append(
                        '<option value="">Select Division</option>'
                    );
                    $.each(data, function (key, value) {
                        $("#division_id").append(
                            '<option value="' +
                                value.id +
                                '">' +
                                value.div_name +
                                "</option>"
                        );
                    });
                },
            });
        } else {
            $("#division_id").empty();
        }
    });
});

/**###### Address District  dependent ######******/
$(document).ready(function () {
    // division dependent
    jQuery("#division_id").on("change", function () {
        var divisionID = $(this).val();

        if (divisionID) {
            $.ajax({
                url: base_url + "/admin/address-district/" + divisionID,
                type: "GET",
                dataType: "json",
                success: function (data) {
                    $("#district_id").empty();
                    $("#district_id").append(
                        '<option value="">Select District</option>'
                    );
                    $.each(data, function (key, value) {
                        $("#district_id").append(
                            '<option value="' +
                                value.id +
                                '">' +
                                value.dist_name +
                                "</option>"
                        );
                    });
                },
            });
        } else {
            $("#district_id").empty();
        }
    });
});

/**###### Address Thana  dependent ######******/
$(document).ready(function () {
    // Thana dependent
    jQuery("#district_id").on("change", function () {
        var districtID = $(this).val();

        if (districtID) {
            $.ajax({
                url: base_url + "/admin/address-thana/" + districtID,
                type: "GET",
                dataType: "json",
                success: function (data) {
                    $("#thana_id").empty();
                    $("#thana_id").append(
                        '<option value="">Select Thana</option>'
                    );
                    $.each(data, function (key, value) {
                        $("#thana_id").append(
                            '<option value="' +
                                value.id +
                                '">' +
                                value.tha_name +
                                "</option>"
                        );
                    });
                },
            });
        } else {
            $("#thana_id").empty();
        }
    });
});

// *********************** End  Address  Script **************************
// *********************** End  Address  Script **************************

// *********************** Start Ambulance Section Script **************************
// *********************** Start Ambulance Section Script **************************

// ######### Start Ambulance Category  model Model Script ##########

$(document).ready(function () {
    $(document).on("click", "#DeleteCategoryAmbulance", function () {
        var ambulance_cat_id = $(this).val();
        $("#AmbulanceDeleteCategory").modal("show");
        $("#ambulance_cat_id").val(ambulance_cat_id);
    });
});

// ######### End Ambulance Category model Model Script ##########

// ######### Start Ambulance Pakage model Model Script ##########

$(document).ready(function () {
    $(document).on("click", "#AmbulancePakageDelete", function () {
        var am_pakage_id = $(this).val();
        $("#DeleteAmbulancePakage").modal("show");
        $("#am_pakage_id").val(am_pakage_id);
    });
});

// ######### End Ambulance Pakage model Model Script ##########

// *********************** End Ambulance Section Script **************************
// *********************** End Ambulance Section Script **************************

// ***********************  Start SiteSetting Section Script **************************
// ***********************  Start SiteSetting Section Script **************************

// ######### Start office Address Card model Model Script ##########

$(document).ready(function () {
    $(document).on("click", "#DeleteFooterAddress", function () {
        var office_id = $(this).val();
        $("#officeAddressDelete").modal("show");
        $("#office_id").val(office_id);
    });
});

// ######### End office Address Card model Model Script ##########

// ######### Start Payment Card model Model Script ##########

$(document).ready(function () {
    $(document).on("click", "#PaymentCardDelete", function () {
        var payment_card_id = $(this).val();
        $("#DeletePaymentCard").modal("show");
        $("#payment_card_id").val(payment_card_id);
    });
});

// ######### End Payment Card model Model Script ##########

// ***********************  End SiteSetting Section Script **************************
// ***********************  End SiteSetting Section Script **************************

// ***********************  start Pakage Category Delete **************************

$(document).ready(function () {
    $(document).on("click", "#PakageCategoryDelete", function () {
        var pakage_cat_id = $(this).val();
        $("#DeletePakagecategory").modal("show");
        $("#pakage_cat_id").val(pakage_cat_id);
    });
});

// ***********************  End  Pakage category Delete **************************

// ***********************  start Pakage  Delete **************************

$(document).ready(function () {
    $(document).on("click", "#PakageDelete", function () {
        var pakage_id = $(this).val();
        $("#DeletePakage").modal("show");
        $("#pakage_id").val(pakage_id);
    });
});

// ***********************  End  Pakage  Delete **************************

// ***********************  start categories  Delete **************************

$(document).ready(function () {
    $(document).on("click", "#homeCatdelete", function () {
        var cat_id = $(this).val();
        $("#DeletePakage").modal("show");
        $("#cat_id").val(cat_id);
    });
});

// ***********************  End  categories  Delete **************************
