@extends('layouts.back')
@section('content')
<div class="main_content_iner ">
    <div class="container-fluid p-0">
       <div class="row justify-content-center">
          <div class="col-lg-12">
             <div class="white_card card_height_100 mb_30">
               <div class="white_card_header white_box_tittle pink_bg">
                  <div class="box_header m-0">
                     <div class="main-title">
                        <h3 class="m-0 text_white"> Posts List</h3>
                        
                     </div>
                     
                  </div>
               </div>
                <div class="white_card_body">
                   <div class="QA_section">
                      <div class="white_box_tittle list_header">
                         <h4>All Posts List</h4>
                         <div class="box_right d-flex lms_block">
                           <div class="serach_field_2">
                              <div class="search_inner">
                                 <form active="#">
                                    <div class="search_field">
                                       <input type="text" placeholder="Search content here...">
                                    </div>
                                       <button type="button"> <i class="ti-search"></i> </button>
                                 </form>
                              </div>
                           </div>
                           <div class="add_button ms-2">
                              <a href="{{route('admin.posts.create')}}" class="btn_1"><i class="fas fa-plus f_s_14 me-2"></i> Add New Record</a>
                           </div>
                         </div>


                      </div>
                      <div class="table-responsive m-b-30">
                         <table class="table table-striped">
                            <thead class="table-dark">
                               <tr>
                                  <th scope="col">Sr.No.</th>
                                  <th scope="col">Title</th>
                                  <th scope="col">Slug</th>
                                  <th scope="col">Image</th>
                                  <th scope="col">Info</th>
                                  <th scope="col">Action</th>
                               </tr>
                            </thead>
                            <tbody class="">
                                @php $i=1; @endphp
                                @foreach($post as $list)
                                <tr class="tbs">
                                    <td><span class="badge bg-dark">{{$i}} </span></td>
                                    <td><b>{{ucwords($list->title)}}</b></td>
                                    <td>{{$list->slug}}</td>
                                    <td><img src="{{url($list->image)}}" width="120px"></td>
                                    <td>
                                       <b>Category:</b> <span class="badge bg-info">{{$list->category->name}}</span><br/><br/>
                                       <b>Status:</b> 
                                          @if($list->status == 1)
                                             <span class="badge bg-success">Active</span>
                                          @else
                                             <span class="badge bg-danger">Deactive</span>
                                          @endif
                                       <br/><br/>
                                       <b>No.of Faqs:</b> <span class="badge bg-warning">{{count($list->faq)}}</span>
                                    </td>
                                    @php $eid = Crypt::encryptString($list->id); @endphp
                                    <td>
                                        <a href="{{ route('admin.posts.edit',$eid) }}" type="button" class="btn mb-3 btn-primary"><i class="fas fa-edit"></i></a> 

                                          <form action="{{ route('admin.posts.destroy', $eid) }}" method="POST" style="display:inline" id="form1" style="display: inline;">
                                             <input type="hidden" name="_method" value="DELETE">
                                             @csrf
                                             <button type="submit" class="btn mb-3 btn-danger show_confirm"   ><i class="fas fa-trash "></i></button>
                                          </form>
                                     
                                    </td>
                                </tr>
                                @php $i++; @endphp
                                @endforeach
                            </tbody>
                         </table>
                         {{ $post->links() }}
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

   $(".search_field input").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("tbody .tbs").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });


});
</script>
@endsection