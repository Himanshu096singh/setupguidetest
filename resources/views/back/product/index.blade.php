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
                         <h3 class="m-0">Products List</h3>
                      </div>
                   </div>
                </div>
                <div class="white_card_body">
                   <div class="QA_section">
                      <div class="white_box_tittle list_header">
                         <h4>All Products List</h4>
                         <div class="box_right d-flex lms_block">
                            <div class="add_button ms-2">
                            
                              <a href="{{route('admin.product.create')}}" class="btn_1"><i class="fas fa-plus f_s_14 me-2"></i> Add New Record</a>
                              {{-- <a href="{{route('admin.company.deletedrecords')}}" class="btn btn-danger"><i class="fas fa-trash f_s_14 me-2"></i> Deleted Records</a>  --}}
                            </div>
                         </div>


                      </div>
                      <div class="table-responsive m-b-30">
                         <table class="table table-striped">
                            <thead class="table-dark">
                               <tr>
                                  <th scope="col">Sr.No.</th>
                                  <th scope="col">Name</th>
                                  <th scope="col">Slug</th>
                                  <th scope="col">Category</th>
                                  <th scope="col">Conpany</th>
                                  <th scope="col">Status</th>
                                  <th scope="col">No. of FAQ</th>
                                  <th scope="col">Action</th>
                               </tr>
                            </thead>
                            <tbody class="">
                                @foreach($product as $index=>$list)
                                <tr >
                                   <td>{{$index+1}}</td>
                                    <td>{{$list->name}}</td>
                                    <td>{{$list->slug}}</td>
                                    <td>{{$list->category ? $list->category->name : '' }}</td>
                                    <td>{{$list->company ? $list->company->name : '' }}</td>
                                    <td>
                                       @if($list->status == 1)
                                          <span class="badge bg-success">Active</span>
                                       @else
                                          <span class="badge bg-danger">De-active</span>
                                       @endif
                                    </td>
                                    <td><span class="badge bg-danger"> {{count($list->faqs)}}</span></td>
                                    @php $eid = Crypt::encryptString($list->id); @endphp
                                    <td>
                                       <a href="{{ route('admin.product.edit',$eid) }}" type="button" class="btn mb-3 btn-primary"><i class="fas fa-edit"></i></a> 

                                          <form action="{{ route('admin.product.destroy', $eid) }}" method="POST" style="display:inline" id="form1" style="display: inline;">
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