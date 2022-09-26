@extends('layouts.back')

@section('content')

<div class="main_content_iner ">
    <div class="container-fluid p-0">
       <div class="row justify-content-center">
          <div class="col-lg-12">
             <div class="white_card card_height_100 mb_30">
                <div class="white_card_header">
                   <div class="box_header m-0">
                      <div class="main-title">
                         <h3 class="m-0">How to Setup</h3>
                      </div>
                   </div>
                </div>
                <div class="white_card_body">
                   <div class="QA_section">
                      <div class="white_box_tittle list_header">
                         <h4>All Setup List</h4>
                         <div class="box_right d-flex lms_block">
                            <div class="add_button ms-2">
                            
                              <a href="{{route('admin.setup.create')}}" class="btn_1"><i class="fas fa-plus f_s_14 me-2"></i> Add New Record</a>
                            </div>
                         </div>


                      </div>
                      <div class="table-responsive m-b-30">
                         <table class="table table-striped">
                            <thead class="table-dark">
                               <tr>
                                  {{-- <th scope="col">#</th> --}}
                                  <th scope="col">Sr.No.</th>
                                  <th scope="col">Title</th>
                                  <th scope="col">Slug</th>
                                  <th scope="col">Status</th>
                                  <th scope="col">Action</th>
                               </tr>
                            </thead>
                            <tbody class="">
                                @foreach($setup as $index=>$list)
                                <tr >
                                    {{-- <th scope="row" tabindex="0" class="sorting_1">
                                        <label class="form-label primary_checkbox d-flex me-12 ">
                                          <input type="checkbox">
                                          <span class="checkmark"></span>
                                        </label>
                                    </th> --}}
                                    <td>{{$index+1}}</td>
                                    <td>{{$list->title}}</td>
                                    <td>{{$list->slug}}</td>
                                    <td>
                                       @if($list->status == 1)
                                          <span class="badge bg-success">Active</span>
                                       @else
                                          <span class="badge bg-danger">De-active</span>
                                       @endif
                                    </td>
                                    @php $eid = Crypt::encryptString($list->id); @endphp
                                    <td>
                                       <a href="{{ route('admin.setup.edit',$eid) }}" type="button" class="btn mb-3 btn-primary"><i class="fas fa-edit"></i></a> 

                                          <form action="{{ route('admin.setup.destroy', $eid) }}" method="POST" style="display:inline" id="form1" style="display: inline;">
                                             <input type="hidden" name="_method" value="DELETE">
                                             <input type="hidden" name="routename" value="{{Route::currentRouteName()}}">
                                             @csrf
                                             <button type="submit" class="btn mb-3 btn-danger show_confirm"   ><i class="fas fa-trash "></i></button>
                                          </form>
                                    
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                         </table>
                  
                      </div>
                   </div>
                </div>
             </div>
          </div>
          <div class="col-12"></div>
       </div>
    </div>
 </div>

@stop

@section('js')
<script type="text/javascript">
$("document").ready(function(){
   $(".show_confirm").click(function(){
   var conf =  confirm('Are you sure you want to delete this?'); 
    if (conf==true) {
     return true;
    } else {
      return false;
    }
   });
   
});
</script>
@endsection