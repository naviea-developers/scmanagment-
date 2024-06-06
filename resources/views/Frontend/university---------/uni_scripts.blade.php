<script type="text/javascript">
        //Tag user in sentry 
        // if (Cookies.get("jwt") != undefined && localStorage.student_profile) {
        //     Sentry.configureScope(function (scope) {
        //         scope.setTag("Authenticated", "true");
        //         scope.setUser({
        //             email: JSON.parse(localStorage.student_profile).data.email,
        //         });
        //     });
        // }
        var preferences;
        var student_email;
        // tippy('[data-tippy-content]');
        // $(document).ready(function () {

        //     $('.custom-select').on('change', function (e) {
        //         if (($("#searchType").val() == 'program')) {
        //             $('[name="search_keyword"]').attr('placeholder', 'What would you like to study?');
        //         } else if ($("#searchType").val() == 'school') {
        //             $('[name="search_keyword"]').attr('placeholder', 'Search uni name or city');
        //         } else {
        //             $('[name="search_keyword"]').attr('placeholder', 'Which topics interest you?');
        //         }
        //     });
        //     $('#search_btn').on('click', function () {
        //         if (($("#searchType").val() == 'program')) {
        //             location.href = location.protocol + "//" + location.host + "/search/?keyword=" + $('input[name="search_keyword"]').val();
        //         } else if ($("#searchType").val() == 'school') {
        //             location.href =
        //                 "/universities/?school=" +
        //                 $('input[name="search_keyword"]').val();
        //         } else {
        //             location.href =
        //                 "https://www.china-admissions.com/?s=" +
        //                 $('input[name="search_keyword"]').val();
        //         }


        //     });
        //     $('.program-page-search input[name="search_keyword"]').on("keypress", function (e) {
        //         if (e.which === 13) {
        //             //Disable textbox to prevent multiple submit
        //             $(this).attr("disabled", "disabled");
        //             if (($("#searchType").val() == 'program')) {
        //                 location.href = location.protocol + "//" + location.host + "/search/?keyword=" + $('input[name="search_keyword"]').val();
        //             } else if ($("#searchType").val() == 'school') {
        //                 location.href =
        //                     "/universities/?school=" +
        //                     $('input[name="search_keyword"]').val();
        //             } else {
        //                 location.href =
        //                     "https://www.china-admissions.com/?s=" +
        //                     $('input[name="search_keyword"]').val();
        //             }
        //         }
        //     });
           
        //     $(window).scroll(function () {
        //         if ($(this).scrollTop() > 100) {
        //             $('.scroll-top').fadeIn();
        //         } else {
        //             $('.scroll-top').fadeOut();
        //         }
        //     });

        //     $('.scroll-top').click(function () {
        //         $("html, body").animate({
        //             scrollTop: 0
        //         }, 100);
        //         return false;
        //     });
        //     lazyload();

        //     $.getJSON("/status/", function(data) {
        //         if (data.code == 0 && data.data.applied_student_count > 0) {
        //             $("#students_applied_today").html(`<p style="color: #4D4D4D;">${data.data.applied_student_count} students applied today</p>`);
        //         }
        //     });
        // });
    </script>



<script>
    



    

   
    $(document).ready(function () {
        var test_city=[];
        console.log(test_city);
        var cities = [];

       // all_cities.sort().forEach(function (i) { cities[i] = (cities[i] || 0) + 1; });

        for (c in cities) {
            console.log(cities[c]);
            city = ` <div class="field ">
                                <div class="control display-flex">
                                    <label class="checkbox" name="${cities[c].name}" data-value="${cities[c].id}">
                                        <input type="checkbox" class="search-checkbox">
                                        ${cities[c].name}
                                    </label>
                                    <div class="toggle-content-right-column">${cities[c].university_count}</div>

                                </div>
                            </div>`
            $(".cities-list").append(city);
        }
        $(".checkbox").click(function (e) {

        });
        $(".count").append(schools.size());
    });



</script>




<script type="text/javascript">

    function isFilterAlreadySelected(name, keyword) {
        selector = 'span.tag.filterTags[data-field="' + name + '"][data-keyword="' + keyword + '"]';

        if ($(selector).length > 0) {
            return true;
        }
        return false;
    }

    function addFilterTagHtml(name, keyword, label) {
        return '<span class="tag filterTags" data-field="' + name + '" data-keyword="' + keyword + '">' + label + '<span class="delete-tag"></span></span>';
    }

    function addFilterTag(name, keyword, label) {
        $('a.clear-filter').prev().fadeIn().after(addFilterTagHtml(name, keyword, label));
        $('.clear-filter').css('display', '');
    }


    //Handle url parameters

    function getUrlParameter(name) {
        name = name.replace(/[\[]/, '\\[').replace(/[\]]/, '\\]');
        var regex = new RegExp('[\\?&]' + name + '=([^&#]*)');
        var results = regex.exec(location.search);
        return results === null ? '' : decodeURIComponent(results[1].replace(/\+/g, ' '));
    };

    $(document).ready(function () {
        var searchQuery = getUrlParameter('school');
        console.log(searchQuery);
        if(searchQuery.length > 0 ){
            $("#search-input").val(searchQuery);
            data = schools.search(searchQuery)
            $(".count").html(schools.matchingItems.length);
            if (data.length == 0) {
                $(".list").html(
                    `<div class="no-result">
    <p>Suggestions: </p>
    <br>
    <ul style="list-style:disc;">
        <li>Please try searching again. </li>
        <li>If the program you are looking for is not listed  please complete the form <a href="https://www.china-admissions.com/apply-to-a-program-not-listed/ ">here</a>, and we will add the program and create your application. </li>
    </ul>
</div>`)
            }
        }

        filters = $('label.checkbox');
        filters.on('change', function (e) {
            e.preventDefault()
            name = $(this).attr('name');
            value = $(this).attr('data-value');
            label = $(this).text().trim();
            filters.find('input').prop('checked', false);
            $(this).find('input').prop('checked', true);

            elems = $('div.searchingTags_wrapper span.filterTags');
            elems.each(function (e) {
                $(this).remove();
            });
            schools.filter();
            addFilterTag(name, value, label);

            $(this).prop("selectedIndex", 0);

            data = schools.filter(function (item) {
                if (item.values().city == name) {
                    return true;

                } else {
                    return false;
                }
            });
            $(".count").html(schools.matchingItems.length);
        });

        $(document).on('click', '.delete-tag', function () {
            var tagText = $(this).parent().text();
            $(this).parent().remove();

            var tagValue = $(this).parent().data("keyword");
            //uncheck the filter box as well
            $('label.checkbox[data-value="' + tagValue + '"]').find('input').prop('checked', false);
            data = schools.filter();
            $(".count").html(schools.size());
        });
        $("#search-input").keyup(function (e) {
            data = schools.search($(this).val())
            $(".count").html(schools.matchingItems.length);
            if (data.length == 0) {
                $(".list").html(
                    `<div class="no-result">
    <p>Suggestions: </p>
    <br>
    <ul style="list-style:disc;">
        <li>Please try searching again. </li>
        <li>If the program you are looking for is not listed  please complete the form <a href="https://www.china-admissions.com/apply-to-a-program-not-listed/ ">here</a>, and we will add the program and create your application. </li>
    </ul>
</div>`)
            }


        });
        if (getUrlParameter("city")) {
            var city = getUrlParameter("city")
            var city_name = city.charAt(0).toUpperCase() + city.substring(1);
            var data = schools.filter(function (item) {
                if (item.values().city == city_name) {

                    return true;
                } else {
                    return false;
                }

            }
            );
            if (data.length == 0) {
                $(".list").html(
                    `<div class="no-result">
                    <p>Suggestions: </p>
                    <br>
                    <ul style="list-style:disc;">
                        <li>Please try searching again. </li>
                        <li>Apply to a Program Not Listed, Please complete the form <a href="https://www.china-admissions.com/apply-to-a-program-not-listed/ ">here</a>, and we will add the program and create your application. </li>
                    </ul>
                </div>`)
            }

            $(`[data-value='${city_name}']`).find('input').prop('checked', true);
            addFilterTag(city_name, city_name, city_name);
            $(".count").html(schools.matchingItems.length);
        }



    });




</script>