<script>
    var base_url = "{{ url('/') }}";
    console.log(base_url);
</script>
<script src="{{asset('public/backend')}}/lib/jquery/jquery.min.js"></script>
<script src="{{asset('public/backend')}}/lib/jquery-ui/ui/widgets/datepicker.js"></script>
<!---- bootstarp Js ----->
<script src="{{asset('public/backend')}}/lib/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="{{asset('public/backend')}}/lib/perfect-scrollbar/perfect-scrollbar.min.js"></script>
<script src="{{asset('public/backend')}}/lib/moment/min/moment.min.js"></script>
<script src="{{asset('public/backend')}}/lib/peity/jquery.peity.min.js"></script>
<script src="{{asset('public/backend')}}/lib/rickshaw/vendor/d3.min.js"></script>
<script src="{{asset('public/backend')}}/lib/rickshaw/vendor/d3.layout.min.js"></script>
<script src="{{asset('public/backend')}}/lib/rickshaw/rickshaw.min.js"></script>
<script src="{{asset('public/backend')}}/lib/jquery.flot/jquery.flot.js"></script>
<script src="{{asset('public/backend')}}/lib/jquery.flot/jquery.flot.resize.js"></script>
<script src="{{asset('public/backend')}}/lib/flot-spline/js/jquery.flot.spline.min.js"></script>
<script src="{{asset('public/backend')}}/lib/jquery-sparkline/jquery.sparkline.min.js"></script>
<script src="{{asset('public/backend')}}/lib/echarts/echarts.min.js"></script>
{{-- <script src="http://maps.google.com/maps/api/js?key=AIzaSyAq8o5-8Y5pudbJMJtDFzb8aHiWJufa5fg"></script> --}}
<script src="{{asset('public/backend')}}/lib/moment/min/moment.min.js"></script>
<script src="{{asset('public/backend')}}/lib/peity/jquery.peity.min.js"></script>
<script src="{{asset('public/backend')}}/lib/highlightjs/highlight.pack.min.js"></script>
<script src="{{asset('public/backend')}}/lib/gmaps/gmaps.min.js"></script>
{{-- <script src="{{asset('public/backend')}}/js/map.shiftworker.js"></script> --}}
 {{-- //unhide --}}
<script src="{{asset('public/backend')}}/lib/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="{{asset('public/backend')}}/lib/datatables.net-dt/js/dataTables.dataTables.min.js"></script>
<script src="{{asset('public/backend')}}/lib/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
<script src="{{asset('public/backend')}}/lib/datatables.net-responsive-dt/js/responsive.dataTables.min.js"></script>


{{-- <script src="{{asset('public/backend')}}/lib/select2/js/select2.full.min.js"></script> --}}

<!--- Form Editor Js---->
<script src="{{asset('public/backend')}}/lib/summernote/summernote-bs4.min.js"></script>
<script src="{{asset('public/backend')}}/lib/peity/jquery.peity.min.js"></script>
<script src="{{asset('public/backend')}}/lib/highlightjs/highlight.pack.min.js"></script>
<script src="{{asset('public/backend')}}/lib/medium-editor/js/medium-editor.min.js"></script>
<!--- Form Editor Js---->
<script src="{{ asset('public/backend/js') }}/flatpickr.js"></script>
<script src="{{ asset('public/backend/js') }}/flatpickr-monthSelect.js"></script>
<script src="{{ asset('public/backend/js') }}/toastr.min.js"></script>
 <!--- Start ajax link-------->
{{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script> --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.3.4/axios.min.js"></script>
 <!--- End ajax link-------->
<!------All Custom js File link------>
<script src="{{asset('public/backend')}}/js/customjs.js"></script>
<!------All Custom js File link------>

<!--- start bracket Main Js ---->
<script src="{{asset('public/backend')}}/js/bracket.js"></script>
<!--- end bracket Main Js ---->
<script src="{{asset('public/backend')}}/js/suneditor.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>

    $(document).ready(function() {
        console.log("hi");
    $('.select2').select2();
    });
  $(function(){
    'use strict'

    // FOR DEMO ONLY
    // menu collapsed by default during first page load or refresh with screen
    // having a size between 992px and 1299px. This is intended on this page only
    // for better viewing of widgets demo.
    // $(window).resize(function(){
    //   minimizeMenu();
    // });

    // minimizeMenu();

    function minimizeMenu() {
      if(window.matchMedia('(min-width: 992px)').matches && window.matchMedia('(max-width: 1299px)').matches) {
        // show only the icons and hide left menu label by default
        $('.menu-item-label,.menu-item-arrow').addClass('op-lg-0-force d-lg-none');
        $('body').addClass('collapsed-menu');
        $('.show-sub + .br-menu-sub').slideUp();
      } else if(window.matchMedia('(min-width: 1300px)').matches && !$('body').hasClass('collapsed-menu')) {
        $('.menu-item-label,.menu-item-arrow').removeClass('op-lg-0-force d-lg-none');
        $('body').removeClass('collapsed-menu');
        $('.show-sub + .br-menu-sub').slideDown();
      }
    }
  });
</script>

    <!----- Start Datatable Js---------->

    <script>
        // console.log($('#sun-editor').len());
        if($('#sun-editor').length > 0){
         const suneditor=SUNEDITOR.create('sun-editor',{
            buttonList: [
                ['undo', 'redo', 'font', 'fontSize', 'formatBlock'],
                ['bold', 'underline', 'italic', 'strike', 'subscript', 'superscript', 'removeFormat'],
                '/', //Line break
                ['fontColor', 'hiliteColor', 'outdent', 'indent', 'align', 'horizontalRule', 'list', 'table'],
                ['link', 'image', 'video', 'fullScreen', 'showBlocks', 'codeView', 'preview', 'print', 'save']
            ],
            width: '100%',
            height:204
        });
        $(document).click(function() {
            document.getElementById('sun-editor').value = suneditor.getContents();
        });
        }
        $(function(){
        'use strict';

        $('#datatable1').DataTable({
            responsive: true,
            language: {
            searchPlaceholder: 'Search...',
            sSearch: '',
            lengthMenu: '_MENU_ items/page',
            }
        });

        $('#datatable2').DataTable({
            bLengthChange: false,
            searching: false,
            responsive: true
        });

        // Select2
        $('.dataTables_length select').select2({ minimumResultsForSearch: Infinity });

        });
    </script>

    <!----- End Datatable Js---------->

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
            $('#summernotefour').summernote({
                height: 150
            })
            $('#summernotesix').summernote({
                height: 150
            })
            $('#summernote_seven').summernote({
                height: 150
            })


        });

        </script>
    <!--- End Summernote Editor Js ---->

    <script>
       // console.log($('#showAlpha').length);
        if($('#showAlpha').length > 0){
            $('#showAlpha').spectrum({
                color: 'rgba(23,162,184,0.5)',
                showAlpha: true
            });
        }


    </script>

    <!--- Start Bootstrap Model Script-------->

    <script>
        $(function(){

          // showing modal with effect
          $('.modal-effect').on('click', function(e){
            e.preventDefault();

            var effect = $(this).attr('data-effect');
            $('#modaldemo8').addClass(effect);
            $('#modaldemo8').modal('show');
          });

          // hide modal with effect
          $('#modaldemo8').on('hidden.bs.modal', function (e) {
            $(this).removeClass (function (index, className) {
                return (className.match (/(^|\s)effect-\S+/g) || []).join(' ');
            });
          });
        });
    </script>

    <!--- End Bootstrap Model Script-------->

  <!--- Start ajax Sub Category Get Script-------->
    <script>
        $('body').on("change",'#cat',function(){
            let id = $(this).val();
            getSubCategory(id,"subCat");
        });
        $('body').on("change",'#phar_cat',function(){
            console.log("this");
            let id = $(this).val();
            getSubCategory(id,"phar_subCat");
        });
        function getSubCategory(id,outid){
            let url = '{{ url("/get/subcat/") }}/' + id;
            axios.get(url)
                .then(res => {
                    console.log(res);
                $('#'+outid).empty();
                    let html = '';
                    html += '<option value="">Select Sub category</option>'
                    res.data.forEach(element => {
                        html += "<option value=" + element.id + ">" + element.name + "</option>"
                    });


                    $('#'+outid).append(html);
                    $('#'+outid).val("").change();
                });
        }

 <!--- End ajax Sub Category Get Script-------->

  <!--- Start ajax Childd Category Get Script-------->

        $('body').on("change",'#subCat',function(){
            let id = $(this).val() == "" ? 0 :  $(this).val();
            gechildCategory(id,"childCat");

        });
        $('body').on("change",'#phar_subCat',function(){
            let id = $(this).val() == "" ? 0 :  $(this).val();
            gechildCategory(id,"phar_childCat");

        });
        function gechildCategory(id,outid){
            let url = '{{ url("/get/childcat/") }}/' + id;
            axios.get(url)
                .then(res => {
                    console.log(res);
                $('#'+outid).empty();
                   let html = '';
                    html += '<option value="">Select Child category</option>'
                    res.data.forEach(element => {
                        html += "<option value=" + element.id + ">" + element.name + "</option>"
                    });

                   $('#'+outid).append(html);
                });
        }

    </script>
 <!--- End ajax Child Category Get Script-------->

 <!--- Start on click image show Script-------->
 <script>
 $(document).on('change','.upload-img',function(){
    var files = $(this).get(0).files;
    var reader = new FileReader();
    reader.readAsDataURL(files[0]);
    var arg=this;
    reader.addEventListener("load", function(e) {
        var image = e.target.result;
        $(arg).parent().find('.display-upload-img').attr('src', image);
    });
});
</script>
 <!--- End on click image show Script-------->
<script>
    $(document).on('click','.changePass',function(){
        console.log(this);
        $('#user_id_pass').val($(this).attr('value'));
        $('#changePassword').modal('show');
    })
</script>



<script>
    $('body').on("change",'#class',function(){
        let id = $(this).val();
            // console.log(id);
        getSection(id,"section");
        getSubject(id,"subject");
        getGroup(id,"group");
        getStudent(id,"student");
    });
    $('body').on("change",'#class-edit',function(){
        let id = $(this).val();
            // console.log(id);
        getSection(id,"section-edit");
        getSubject(id,"subject-edit");
        getGroup(id,"group-edit");
        getStudent(id,"student-edit");
    });
    $('body').on("change",'#class-filter',function(){
        let id = $(this).val();
            // console.log(id);
        getSection(id,"section-filter");
        getSubject(id,"subject-filter");
        getGroup(id,"group-filter");
        getStudent(id,"student-filter");
    });

    $('body').on("change",'#routine_class',function(){
        let id = $(this).val();
        getSection(id,"routine_class_section");

    });

    function getSection(id,outid){
        let url = '{{ url("get/school_section/") }}/' + id;
        axios.get(url)
            .then(res => {
                console.log(res);
            $('#'+outid).empty();
                let html = '';
                html += '<option value="">Select Section</option>'
                res.data.forEach(element => {
                    html += "<option value=" + element.id + ">" + element.name + "</option>"
                });


                $('#'+outid).append(html);
                $('#'+outid).val("").change();
            });
    }

    function getSubject(id,outid){
        let url = '{{ url("get/subject/") }}/' + id;
        axios.get(url)
            .then(res => {
                console.log(res);
            $('#'+outid).empty();
                let html = '';
                html += '<option value="">Select Subject</option>'
                res.data.forEach(element => {
                    html += "<option value=" + element.id + ">" + element.name + "</option>"
                });


                $('#'+outid).append(html);
                $('#'+outid).val("").change();
            });
    }

   

    function getGroup(id,outid){
      let url = '{{ url("get/group/") }}/' + id;
      axios.get(url)
          .then(res => {
              console.log(res);
          $('#'+outid).empty();
              let html = '';
              html += '<option value="">Select group</option>'
              res.data.forEach(element => {
                  html += "<option value=" + element.id + ">" + element.name + "</option>"
              });
              $('#'+outid).append(html);
              $('#'+outid).val("").change();
          });
    }

    function getStudent(id,outid){
      let url = '{{ url("get/student/") }}/' + id;
      axios.get(url)
          .then(res => {
              console.log(res);
          $('#'+outid).empty();
              let html = '';
              html += '<option value="">Select student</option>'
              res.data.forEach(element => {
                  html += "<option value=" + element.id + ">" + element.student_name + "( Roll-"+element.roll_number+")"+ "</option>"
              });
              $('#'+outid).append(html);
              $('#'+outid).val("").change();
          });
    }


    $('body').on("change",'#bulding',function(){
        let id = $(this).val();
        //    console.log(id);
        getFloor(id,"floor");
    });

    $('body').on("change",'#bulding-edit',function(){
        let id = $(this).val();
        //    console.log(id);
        getFloor(id,"floor-edit");
    });

    function getFloor(id,outid){
        let url = '{{ url("get/floor/") }}/' + id;
        axios.get(url)
            .then(res => {
                console.log(res);
            $('#'+outid).empty();
                let html = '';
                html += '<option value="">Select floor</option>'
                res.data.forEach(element => {
                    html += "<option value=" + element.id + ">" + element.name + "</option>"
                });


                $('#'+outid).append(html);
                $('#'+outid).val("").change();
            });
    }

    $('body').on("change",'#floor',function(){
        let id = $(this).val();
        //    console.log(id);
        getRoom(id,"room");
    });

    $('body').on("change",'#floor-edit',function(){
        let id = $(this).val();
        //    console.log(id);
        getRoom(id,"room-edit");
    });

    function getRoom(id,outid){
        let url = '{{ url("get/room/") }}/' + id;
        axios.get(url)
            .then(res => {
                console.log(res);
            $('#'+outid).empty();
                let html = '';
                html += '<option value="">Select room</option>'
                res.data.forEach(element => {
                    html += "<option value=" + element.id + ">" + element.name + "</option>"
                });


                $('#'+outid).append(html);
                $('#'+outid).val("").change();
            });
    }




    $('body').on("change",'#subject',function(){
        let id = $(this).val();
        //    console.log(id);
        getLession(id,"lession");
    });

    $('body').on("change",'#subject-edit',function(){
        let id = $(this).val();
        //    console.log(id);
        getLession(id,"lession-edit");
    });

    function getLession(id,outid){
        let url = '{{ url("/get/lession/") }}/' + id;
        axios.get(url)
            .then(res => {
                console.log(res);
            $('#'+outid).empty();
                let html = '';
                html += '<option value="">Select Lession</option>'
                res.data.forEach(element => {
                    html += "<option value=" + element.id + ">" + element.name + "</option>"
                });


                $('#'+outid).append(html);
                $('#'+outid).val("").change();
            });
    }

        
</script>


{{-- form js --}}
<script>
    function listView(){
        datatable.draw();
        $('.data-update').hide();
        $('.data-create').hide();
        $('.data-list').show();

    }
    function createView(){
        $('.data-update').hide();
        $('.data-list').hide();
        $('.data-create').show();
    }
    function editView(){
        $('.data-create').hide();
        $('.data-list').hide();
        $('.data-update').show();
    }
    $('.btn-new').on('click',function(){
        createView();
        //datatable.destroy();
    });
    $(document).on('click','.btn-cancel',function(){
        listView();
    });
    $('.btn-create').on('click',function(e){
       e.preventDefault();
        var form_data = new FormData($('#data-form-create')[0]);
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url : $('#data-form-create').attr('action'),
            data : form_data,
            type : 'POST',
            contentType: false,
            cache: false,
            processData:false,
            success : function(res){
                if(res.status == "error"){
                    console.log(res);
                    var e_option = "";
                    res.errors.forEach(function(v){
                        e_option += '<div class="alert alert-danger">'+v+'</div>';
                    });
                    $('#create_errors').html(e_option);
                }
                else if(res.status == "yes"){
                    $('#data-form-create')[0].reset();
                    $('#create_errors').html('');
                    listView();
                    
                    Swal.fire({
                        position: "top-end",
                        icon: "success",
                        title: res.msg,
                        showConfirmButton: false,
                        timer: 1500
                    });
                   
                }else{
                    Swal.fire({
                        position: "top-end",
                        icon: "error",
                        title: res.msg,
                        showConfirmButton: false,
                        timer: 1500
                    });
                }
            },
            error:function(e){
                Swal.fire({
                    position: "top-end",
                    icon: "error",
                    title: e,
                    showConfirmButton: false,
                    timer: 1500
                });
            }
        });
    });
    $(document).on('click','.btn-update',function(e){
        e.preventDefault();
        var form_data = new FormData($('#data-form-update')[0]);
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url : $('#data-form-update').attr('action'),
            data : form_data,
            type : 'POST',
            contentType: false,
            cache: false,
            processData:false,
            success : function(res){
                if(res.status == "error"){
                    console.log(res);
                    var e_option = "";
                    res.errors.forEach(function(v){
                        e_option += '<div class="alert alert-danger">'+v+'</div>';
                    });
                    $('#update_errors').html(e_option);
                }
                else if(res.status == "yes"){
                    $('#data-form-update')[0].reset();
                    listView();
                    
                    Swal.fire({
                        position: "top-end",
                        icon: "success",
                        title: res.msg,
                        showConfirmButton: false,
                        timer: 1500
                    });
                   
                }else{
                    Swal.fire({
                        position: "top-end",
                        icon: "error",
                        title: res.msg,
                        showConfirmButton: false,
                        timer: 1500
                    });
                }
            },
            error:function(e){
                Swal.fire({
                    position: "top-end",
                    icon: "error",
                    title: e,
                    showConfirmButton: false,
                    timer: 1500
                });
            }
        });
    });

    $(document).on('click','.data_edit',function(e){
        e.preventDefault();
        var url  = $(this).attr('href');

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type : 'GET',
            url : url,
            success : function(res){
               // console.log(res);
                $('.data-edit-res').html(res);
                editView();
            },
            error:function(e){
                Swal.fire({
                    position: "top-end",
                    icon: "error",
                    title: e.responseJSON.message,
                    showConfirmButton: false,
                    timer: 1500
                });
            }
        });
    });
    $(document).on('click','.btn-delete',function(e){
        e.preventDefault();
        var form_data = new FormData($('#data-form-delete')[0]);
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url : $('#data-form-delete').attr('action'),
            data : form_data,
            type : 'POST',
            contentType: false,
            cache: false,
            processData:false,
            success : function(res){
                console.log(res);
                if(res.status == "yes"){
                    $('#data-form-delete')[0].reset();
                    listView();
                     $('#datamodalshow').modal('hide');
                    //console.log($('#datamodalshow'));
                    //$('#datamodalshow').modal('toggle');
                    Swal.fire({
                        position: "top-end",
                        icon: "success",
                        title: res.msg,
                        showConfirmButton: false,
                        timer: 1500
                    });
                   
                }else{
                    Swal.fire({
                        position: "top-end",
                        icon: "error",
                        title: res.msg,
                        showConfirmButton: false,
                        timer: 1500
                    });
                }
            },
            error:function(e){
               // console.log(e.responseJSON.message);
                Swal.fire({
                    position: "top-end",
                    icon: "error",
                    title: e.responseJSON.message,
                    showConfirmButton: false,
                    timer: 1500
                });
            }
        });
    });
    $(document).on('click','.data_status',function(e){
        e.preventDefault();
        var url  = $(this).attr('href');

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type : 'GET',
            url : url,
            success : function(res){
                if(res.status == "yes"){
                    listView();
                    
                    Swal.fire({
                        position: "top-end",
                        icon: "success",
                        title: res.msg,
                        showConfirmButton: false,
                        timer: 1500
                    });
                   
                }else{
                    Swal.fire({
                        position: "top-end",
                        icon: "error",
                        title: res.msg,
                        showConfirmButton: false,
                        timer: 1500
                    });
                }
            },
            error:function(e){
                Swal.fire({
                    position: "top-end",
                    icon: "error",
                    title: e,
                    showConfirmButton: false,
                    timer: 1500
                });
            }
        })
    });

    function dataDelete(url,t_datatble= 0){
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type : 'GET',
            url :url,
            success : function(res){
                if(res.status == "yes"){
                    if(t_datatble == 0){
                        s_data.draw();
                    }else{
                        datatable.draw();
                    }
                    
                    Swal.fire({
                        position: "top-end",
                        icon: "success",
                        title: res.msg,
                        showConfirmButton: false,
                        timer: 1500
                    });
                
                }else{
                    Swal.fire({
                        position: "top-end",
                        icon: "error",
                        title: res.msg,
                        showConfirmButton: false,
                        timer: 1500
                    });
                }
            },
            error:function(e){
                Swal.fire({
                    position: "top-end",
                    icon: "error",
                    title: e.responseJSON.message,
                    showConfirmButton: false,
                    timer: 1500
                });
            }
        });
    }


    $(document).on('click','.btn-change-pass',function(e){
        e.preventDefault();
        var form_data = new FormData($('#data-form-change-pass')[0]);
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url : $('#data-form-change-pass').attr('action'),
            data : form_data,
            type : 'POST',
            contentType: false,
            cache: false,
            processData:false,
            success : function(res){
                console.log(res);
                if(res.status == "yes"){
                    $('#data-form-change-pass')[0].reset();
                    listView();
                     $('#changePassword').modal('hide');
                    //console.log($('#datamodalshow'));
                    //$('#datamodalshow').modal('toggle');
                    Swal.fire({
                        position: "top-end",
                        icon: "success",
                        title: res.msg,
                        showConfirmButton: false,
                        timer: 1500
                    });
                   
                }else{
                    Swal.fire({
                        position: "top-end",
                        icon: "error",
                        title: res.msg,
                        showConfirmButton: false,
                        timer: 1500
                    });
                }
            },
            error:function(e){
               // console.log(e.responseJSON.message);
                Swal.fire({
                    position: "top-end",
                    icon: "error",
                    title: e.responseJSON.message,
                    showConfirmButton: false,
                    timer: 1500
                });
            }
        });
    });

</script>