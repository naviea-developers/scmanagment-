@extends('backend.master')

@section('title', 'Manage Brand')

<link rel="stylesheet" href="{{ URL::asset('css/custom/category.css') }}">

@section('content')

<div class="br-mainpanel">

        <div class="p-2">

            <div class="br-section-wrapper">

                <div class="br-pagetitle">
                    <i class="fa-duotone fa-gear"></i>
                    <div>
                      <h4>View All Brand</h4>
                      <p class="mg-b-0">All Brand Details Here</p>
                    </div>
                  </div>


                <input type="text" placeholder="Search Data" id="myInput">
                <a href="{{ route('addBrand') }}" class="btn btn-primary btn-sm float-right">Add Brand</a>
                    <br>
                    <br>
                  <table class="table table-striped">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Category Name</th>
                        <th scope="col">Subcategory Name</th>
                        <th scope="col">Brand Name</th>
                        <th scope="col">Brand Logo</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody id="dataTable">
                        @foreach ($brand as $i=>$bnd)
                          
                          <tr>
                              <td>{{ $i+1 }}</td>
                              <td>
                                @foreach ($category as $cat)
                                
                                    @if($bnd->catId == $cat->catId)
                                        {{ $cat->categoryName }}
                                    @endif
                                    
                                @endforeach
                              </td>
                              <td>
                                  {{ $bnd->subcatId }}
                              </td>
                              
                              <td>
                                  {{ $bnd->brandName }}
                              </td>
                              <td>
                                  <img src="{{ url('/backend/brand').'/'.$bnd->logo }}" alt="">
                              </td>
                               <td>
                                <a href="editBrand/{{ $bnd->bid }}" style="color: #4fd128c7">
                                    <i class="fa-duotone fa-edit"></i>
                                </a>
                                <a href="deletebrand/{{ $bnd->bid }}" style="color: #000">
                                    <i class="fa-duotone fa-trash-can"></i>
                                </a>
                            </td>
                          </tr>
                          
                        @endforeach
                    </tbody>
                  </table>



            </div>


        </div>


<script>
$(document).ready(function(){
    $("#myInput").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#dataTable tr").filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
    });
});
</script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/gh/alfrcr/paginathing/dist/paginathing.min.js"></script>
<script type="text/javascript">
  jQuery(document).ready(function ($) {
    const listElement = $('.list-group');

    for (let i = 1; i <= 1500; i++) {
      listElement.append('<li class="list-group-item"> Item ' + i + '</li>');
    }

    listElement.paginathing({
      perPage: 5,
      limitPagination: 9,
      containerClass: 'panel-footer mt-4',
      pageNumbers: true,
      ulClass: 'pagination flex-wrap justify-content-center',
    })

    $('.table tbody').paginathing({
      perPage: 10,
      insertAfter: '.table',
    //   pageNumbers: true,
      ulClass: 'pagination flex-wrap justify-content-center'
    });
  });
</script>
</div>
@stop
