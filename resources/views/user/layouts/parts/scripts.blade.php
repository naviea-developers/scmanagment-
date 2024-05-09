<!-- --------------- bootstrap start ---------------->

<script
src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
crossorigin="anonymous"
></script>

<!-- --------------- bootstrap end ---------------->
<!-- ------------------ swiper-------------- -->
<script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>

<!-- ------------------ sweet Alart-------------- -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<!-- ------------ script files-------------- -->
<script src="{{ asset('public/frontend') }}/js/navbar.js"></script>
<script src="{{ asset('public/frontend') }}/js/bannerslider.js"></script>
<script src="{{ asset('public/frontend') }}/js/dropdown.js"></script>
<script src="{{ asset('public/frontend') }}/js/landing-modal.js"></script>
<script src="{{ asset('public/frontend') }}/js/landing-modal.js"></script>
<script src="{{ asset('public/frontend') }}/js/User-profile-modal.js"></script>
<!-- -------------- slick carousel--------- -->
<script src="{{ asset('public/frontend') }}/js/Jquery.js"></script>
<script src="{{ asset('public/frontend') }}/js/slick.min.js"></script>


<script>
const fileInput = document.getElementById('file');
const fileNameDisplay = document.getElementById('file-name');

fileInput.addEventListener('change', (event) => {
  const fileName = event.target.files[0].name;
  fileNameDisplay.textContent = `Selected File: ${fileName}`;
});
</script>


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