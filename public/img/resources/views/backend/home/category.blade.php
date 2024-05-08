<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    @include('inc.css')
    <title>Category</title>
  </head>

  <body>
    @include('inc.left')
    @include('inc.nav')
    @include('inc.right')


        <div class="br-mainpanel">

            <div class="bodyTitle">
                <i class="fa-duotone fa-house-chimney"></i>
                <span>Category Information</span>
            </div>

            <div class="card">
                <div class="col-12">
                    <div class="col-6">
                        <input type="text" class="form-control" placeholder="search" id="searchInput" onkeyup="myFunction()">
                    </div>
                    <div class="col-6">
                        <a href="/addCatagory" class="btn btn-primary" style="float: right;">Add Category</a>
                    </div>
                </div>
            <br>
            <br>
                <div class="col-12">
                    <table class="table table-striped" id="DataTable">
                        <tr>
                            <th scope="col">SL</th>
                            <th scope="col">Image</th>
                            <th scope="col">Category Name</th>
                            <th scope="col">Priority</th>
                            <th scope="col">Description</th>
                            <th scope="col">Action</th>
                        </tr>

                            @foreach ($category as $i=>$cat)
                                <tr>
                                    <td>{{ $i+1 }}</td>
                                    <td>
                                        <img src="{{ $cat->img }}" alt="" style="width:50px">
                                    </td>
                                    <td>{{ $cat->name }}</td>
                                    <td>{{ $cat->Priority }}</td>
                                    <td>{!! substr_replace($cat->description, "...", 30)!!}</td>
                                    <td>
                                        <form action="/editCategory" method="post" style="float:left">
                                            @csrf
                                            <input type="hidden" name="catId" value="{{ $cat->id }}">
                                                <button class="btn btn-light"><i class="fa-duotone fa-pen-to-square"></i></button>
                                        </form>
                                        <form action="deleteCategory" method="post" style="float:left">
                                            @csrf
                                            <input type="hidden" name="catId" value="{{ $cat->id }}">
                                                <button class="btn btn-light"><i class="fa-duotone fa-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach

                    </table>

                    <div class="col-12">
                        <div class="col-6">
                            Showing <span id="start">1</span> to <span id="end">10</span> of {{ $totalCategory->count()}} entries
                        </div>
                        <div class="col-6">

                            @php
                                $pages = ceil($totalCategory->count() / '10');
                            @endphp


                            <nav>
                                <ul class="pagination pagination-sm">
                                    @for ($i = 1; $i <= $pages; $i++)
                                        <li class="page-item" onclick="getData('{{ $i-1 }}')" id="page{{ $i }}"><span class="page-link">{{ $i }}</span></li>
                                    @endfor
                                </ul>
                              </nav>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    @include('inc.js')
<script>
    function myFunction() {
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("searchInput");
        filter = input.value.toUpperCase();
        table = document.getElementById("DataTable");
        tr = table.getElementsByTagName("tr");
        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[2];
            console.log(td);
            if (td) {
            txtValue = td.textContent || td.innerText;
            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
            }
        }
    }



$(window).on('load' ,  function(){
    $('#page1').addClass('active')
});


function getData(e){

   var page = parseInt(e) + 1;

   $('.page-item').removeClass('active');
   $('#page' + page).addClass('active');

    var loaded = e * 10;

    var  max = {{ $totalCategory->count() }};
    var start =  parseInt(e) * 10 + 1;
    var end =  parseInt(e) * 10 + 10;
    $('#start').html(start);

    if(max > end){
        $('#end').html(end);
    }else{
        $('#end').html(max);
    }

    $.ajax({
    type: 'POST',
    url: 'catagorylazy',
    data: { loaded: loaded },
    success: function(response) {
            $('#DataTable').html('');
            $("#DataTable").append(response);
        }
    });

}


</script>

  </body>
</html>
