<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    @include('inc.css')
    <title>FAQ</title>
  </head>

  <body>
    @include('inc.left')
    @include('inc.nav')
    @include('inc.right')


        <div class="br-mainpanel">

            <div class="bodyTitle">
                <i class="fa-duotone fa-house-chimney"></i>
                <span>FAQ Information</span>
            </div>

            <div class="card">
                <div class="col-12">
                    <div class="col-6">
                        <input type="text" class="form-control" placeholder="search" id="searchInput" onkeyup="myFunction()">
                    </div>
                    <div class="col-6">
                        <a href="/addfaq" class="btn btn-primary" style="float: right;">Add FAQ</a>
                    </div>
                </div>
                <br>
                <br>
                <div class="col-12">
                    <table class="table table-striped" id="DataTable">
                        <tr>
                            <th scope="col">SN</th>
                            <th scope="col">Title</th>
                            <th scope="col">Action</th>
                        </tr>

                        @foreach ($faq as $i=> $item)
                            <tr>
                                <td>{{ $i + 1 }}</td>
                                <td>{{ $item->question }}</td>
                                <td>
                                    <form action="editFaq" method="post" style="float:left">
                                        @csrf
                                        <input type="hidden" name="faqId" value="{{ $item->id }}">
                                        <button class="btn btn-light"><i class="fa-duotone fa-edit"></i></button>
                                    </form>
                                    <span style="float: left;font-size: 30px;font-weight: 100;"> | </span>
                                    <form action="deleteFaq" method="post" style="float:left">
                                        @csrf
                                        <input type="hidden" name="faqId"  value="{{ $item->id }}">
                                        <button class="btn btn-light"><i class="fa-duotone fa-trash"></i></button>
                                    </form>
                                </td>




                            </tr>
                        @endforeach

                    </table>
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
            td = tr[i].getElementsByTagName("td")[1];
            // console.log(td);
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
</script>

  </body>
</html>
