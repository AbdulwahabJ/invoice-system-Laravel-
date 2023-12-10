@extends('layouts.master')
@section('title')
الاقسام
@stop
@section('css')
        <!-- Internal Data table css -->
        <link href="{{ URL::asset('assets/plugins/datatable/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" />
        <link href="{{ URL::asset('assets/plugins/datatable/css/buttons.bootstrap4.min.css') }}" rel="stylesheet">
        <link href="{{ URL::asset('assets/plugins/datatable/css/responsive.bootstrap4.min.css') }}" rel="stylesheet" />
        <link href="{{ URL::asset('assets/plugins/datatable/css/jquery.dataTables.min.css') }}" rel="stylesheet">
        <link href="{{ URL::asset('assets/plugins/datatable/css/responsive.dataTables.min.css') }}" rel="stylesheet">
        <link href="{{ URL::asset('assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet">
@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">الاعدادات</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ الاقسام</span>
						</div>
					</div>
					<div class="d-flex my-xl-auto right-content">
						<div class="pr-1 mb-3 mb-xl-0">
							<button type="button" class="btn btn-info btn-icon ml-2"><i class="mdi mdi-filter-variant"></i></button>
						</div>
						<div class="pr-1 mb-3 mb-xl-0">
							<button type="button" class="btn btn-danger btn-icon ml-2"><i class="mdi mdi-star"></i></button>
						</div>
						<div class="pr-1 mb-3 mb-xl-0">
							<button type="button" class="btn btn-warning  btn-icon ml-2"><i class="mdi mdi-refresh"></i></button>
						</div>
						<div class="mb-3 mb-xl-0">
							<div class="btn-group dropdown">
								<button type="button" class="btn btn-primary">14 Aug 2019</button>
								<button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split" id="dropdownMenuDate" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<span class="sr-only">Toggle Dropdown</span>
								</button>
								<div class="dropdown-menu dropdown-menu-left" aria-labelledby="dropdownMenuDate" data-x-placement="bottom-end">
									<a class="dropdown-item" href="#">2015</a>
									<a class="dropdown-item" href="#">2016</a>
									<a class="dropdown-item" href="#">2017</a>
									<a class="dropdown-item" href="#">2018</a>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- breadcrumb -->
@endsection
@section('content')

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- row -->
				<div class="row">

                         @If(session()->has('Add'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong> {{ session()->get('Add') }}</strong>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                            </div>
                        @endif
                             @If(session()->has('edit'))
                                 <div class="alert alert-success alert-dismissible fade show" role="alert">
                                     <strong> {{ session()->get('edit') }}</strong>
                                     <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                         <span aria-hidden="true">&times;</span>
                                     </button>
                                 </div>
                             @endif

                             @If(session()->has('delete'))
                                 <div class="alert alert-success alert-dismissible fade show" role="alert">
                                     <strong> {{ session()->get('delete') }}</strong>
                                     <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                         <span aria-hidden="true">&times;</span>
                                     </button>
                                 </div>
                             @endif

                             @if(session()->has('Error'))
                                 <div id="errorAlert" class="alert alert-danger alert-dismissible fade show" role="alert">
                                     <strong> {{ session()->get('Error') }}</strong>
                                     <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                         <span aria-hidden="true">&times;</span>
                                     </button>
                                 </div>
                             @endif



                <!--div-->
                <div class="col-xl-12">
                    <div class="card mg-b-20">
                        <div class="card-header pb-0">
                            <div class="d-flex justify-content-between">
                                <a class="modal-effect btn btn-outline-primary btn-block" data-effect="effect-scale" data-toggle="modal" href="#modaldemo10">اضافة قسم</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="example1" class="table key-buttons text-md-nowrap">
                                    <thead>
                                    <tr>
                                        <th class="border-bottom-0">#</th>
                                        <th class="border-bottom-0">اسم القسم</th>
                                        <th class="border-bottom-0">ملاحظات</th>
                                        <th class="border-bottom-0">العمليات</th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php $i=0 ?>
                                    @foreach($sections as $section)
                                        <?php $i++?>
                                        <tr>
                                            <td> {{$i}}</td>
                                            <td>{{$section->section_name}}</td>
                                            <td>{{$section->description}}</td>
                                            <td>
                                                <a class="modal-effect btn btn-sm btn-info" data-effect="effect-scale"
                                                   data-id="{{ $section->id }}" data-section_name="{{ $section->section_name }}"
                                                   data-section_description="{{ $section->description }}" data-toggle="modal" href="#modaldemo8"
                                                   title="تعديل"><i class="las la-pen"></i></a>

                                                <a class="modal-effect btn btn-sm btn-danger" data-effect="effect-scale"
                                                   data-id="{{ $section->id }}" data-section_name="{{ $section->section_name }}" data-toggle="modal"
                                                   href="#modaldemo9" title="حذف"><i class="las la-trash"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!--/div-->


                             <!--add-->
                             <div class="modal" id="modaldemo10">
                                 <div class="modal-dialog" role="document">
                                     <div class="modal-content modal-content-demo">
                                         <div class="modal-header">
                                             <h6 class="modal-title">اضاقة قسم</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                                         </div>

                                         <div class="modal-body">
                                             <form action="{{route('sections.store')}}" method="post" autocomplete="off">

                                                 {{csrf_field()}}

                                                 <div class = "form-group">
                                                     <input type="hidden" class="form-control" id="id" name="id">
                                                     <label for="exampleInputEmail">اسم القسم</label>
                                                     <input type="text" class="form-control" id="section_name" name="section_name"  required>
                                                 </div>

                                                 <div class = "form-group">
                                                     <label for="exampleInput2">الملاحظات</label>
                                                     <textarea  class="form-control" id="section_description" name="description" rows="3"></textarea>
                                                 </div>


                                                 <div class="modal-footer">
                                                     <button class="btn btn-success" type="submit">اضافة</button>
                                                     <button class="btn ripple btn-secondary" data-dismiss="modal" type="button">اغلاق</button>
                                                 </div>

                                             </form>
                                         </div>
                                     </div>
                                 </div>

                             </div>


    <!--Edit-->
                <div class="modal" id="modaldemo8">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content modal-content-demo">
                            <div class="modal-header">
                                <h6 class="modal-title">تعديل قسم</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                            </div>

                            <div class="modal-body">
                                <form action="{{route('sections.update')}}" method="post" autocomplete="off">

                                    {{csrf_field()}}

                                <div class = "form-group">
                                    <input type="hidden" class="form-control" id="id" name="id">
                                    <label for="exampleInputEmail">اسم القسم</label>
                                    <input type="text" class="form-control" id="section_name" name="section_name"  required>
                                </div>

                                <div class = "form-group">
                                <label for="exampleInput2">الملاحظات</label>
                                    <textarea  class="form-control" id="section_description" name="description" rows="3"></textarea>
                            </div>


                            <div class="modal-footer">
                                <button class="btn btn-success" type="submit">تأكيد</button>
                                <button class="btn ripple btn-secondary" data-dismiss="modal" type="button">اغلاق</button>
                            </div>

                            </form>
                        </div>
                    </div>
                </div>

            </div>
                             <!-- delete -->

                             <div class="modal" id="modaldemo9">
                                 <div class="modal-dialog modal-dialog-centered" role="document">
                                     <div class="modal-content modal-content-demo">
                                         <div class="modal-header">
                                             <h6 class="modal-title">حذف القسم</h6><button aria-label="Close" class="close" data-dismiss="modal"
                                                                                           type="button"><span aria-hidden="true">&times;</span></button>
                                         </div>
                                         <form action="{{route('sections.destroy')}}" method="post">
                                             {{method_field('delete')}}
                                             {{csrf_field()}}
                                             <div class="modal-body">
                                                 <p>هل انت متاكد من عملية الحذف ؟</p><br>
                                                 <input type="hidden" name="id" id="id" value="">
                                                 <input class="form-control" name="section_name" id="section_name" type="text" readonly>
                                             </div>
                                             <div class="modal-footer">
                                                 <button type="button" class="btn btn-secondary" data-dismiss="modal">الغاء</button>
                                                 <button type="submit" class="btn btn-danger">حذف</button>
                                             </div>

                                     </form>
                                     </div>
                                 </div>
                             </div>
            <!-- row closed -->


        </div>

        <!-- Container closed -->
    </div>

    <!-- main-content closed -->
@endsection

@section('js')
<!-- Internal Data tables -->
<script src="{{URL::asset('assets/plugins/datatable/js/jquery.dataTables.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.dataTables.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/responsive.dataTables.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/jquery.dataTables.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.bootstrap4.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.buttons.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/jszip.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/pdfmake.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/vfs_fonts.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/buttons.html5.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/buttons.print.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/buttons.colVis.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/responsive.bootstrap4.min.js')}}"></script>
<!--Internal  Datatable js -->
<script src="{{URL::asset('assets/js/table-data.js')}}"></script>
<script src="{{URL::asset('assets/js/modal.js')}}"></script>

<script>
    $('#modaldemo8').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget)
        var id = button.data('id')
        var section_name = button.data('section_name')
        var section_description = button.data('section_description')
        var modal = $(this)
        modal.find('.modal-body #id').val(id);
        modal.find('.modal-body #section_name').val(section_name);
        modal.find('.modal-body #section_description').val(section_description);
    })
</script>

<script>
    $('#modaldemo9').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget)
        var id = button.data('id')
        var section_name = button.data('section_name')
        var modal = $(this)
        modal.find('.modal-body #id').val(id);
        modal.find('.modal-body #section_name').val(section_name);
    })
</script>

@endsection
