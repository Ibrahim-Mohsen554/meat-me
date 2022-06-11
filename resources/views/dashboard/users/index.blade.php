@extends('layouts.master')
@section('pageTitle')
    @lang('site.users')
@endsection
@section('css')
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
                <h4 class="content-title mb-0 my-auto"><a href="{{ route('dashboard.index') }}">@lang('site.dashboard')</a></h4>
                <span class="text-muted mt-1 tx-13 mr-2 mb-0"> / @lang('site.users')</span>
            </div>
        </div>

    </div>
    <!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row">
        <div class="col-xl-12">
            {{-- @include('notify::messages') --}}

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="card">

                <div class="card-header pb-0">
                    @if (auth()->user()->hasPermission('create_users'))

                    <a class=" btn btn-dark " href="{{ route('dashboard.users.create') }}"> <i class="fa fa-plus"></i> @lang('site.add')</a>
                    @else
                    <a class=" btn btn-dark disabled " href="#"> <i class="fa fa-plus"></i> @lang('site.add')</a>

                    @endif
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table text-md-nowrap" id="example1">
                            <thead>
                                <tr>
                                    <th class="wd-15p border-bottom-0" style="width: 3%">#</th>
                                    <th class="wd-15p border-bottom-0">@lang('site.firstName')</th>
                                    <th class="wd-20p border-bottom-0">@lang('site.lastName')</th>
                                    <th class="wd-20p border-bottom-0"style="width: 5%">@lang('site.email')</th>
                                    <th class="wd-20p border-bottom-0"style="width: 10%">@lang('site.image')</th>
                                    <th class="wd-20p border-bottom-0 "style="width: 12%">@lang('site.userType')</th>
                                    <th class="wd-15p border-bottom-0">@lang('site.createdAt')</th>
                                    <th class="wd-25p border-bottom-0">@lang('site.action')</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($users->count() > 0)
                                    @foreach ($users as $index => $user)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>{{ $user->first_Name }}</td>
                                            <td>{{ $user->last_Name }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td><img src="{{ $user->image_path }}" alt="" srcset="" style="width: 100px" class="img-thumbnail"></td>
                                            <td>@if ($user->hasRole('customer') )
                                                <span class="bg-dark text-white pl-3 pr-3">Customer</span>
                                                @elseif ($user->hasRole('supplier'))
                                                <span class="bg-dark text-white  pl-3 pr-3">supplier</span>
                                                @elseif ($user->hasRole('admin'))
                                                <span class="bg-dark text-white  pl-3 pr-3">Admin</span>
                                            @endif</td>

                                            <td>{{ $user->created_at->format('m-d-Y') }}</td>

                                            <td>

                                                @if (auth()->user()->hasPermission('update_users'))
                                                   <a class=" btn btn-sm btn-info"
                                                    href="{{ route('dashboard.users.edit', $user->id) }}"
                                                    title="@lang('site.edit')"><i class="las la-pen"></i></a>
                                                    @else
                                                    <a class=" btn btn-sm btn-info disabled"
                                                    href="#"
                                                    title="@lang('site.edit')"><i class="las la-pen"></i></a>
                                                @endif

                                                @if (auth()->user()->hasPermission('delete_users'))

                                                <form action="{{ route('dashboard.users.destroy', $user->id) }}" method="post" style="display: inline-block">
                                                    {{ csrf_field() }}
                                                    {{ method_field('delete') }}

                                                    <button class=" btn btn-sm btn-danger delete" type="submit"
                                                        title="@lang('site.delete')"><i class="las la-trash"></i></button>
                                                </form>
                                                @else
                                                         <button class=" btn btn-sm btn-danger delete disabled" type="submit" title="@lang('site.delete')"><i class="las la-trash " ></i></button>
                                                @endif

                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                 @lang('site.no_data_found')
                                @endif

                            </tbody>
                        </table>
                    </div>
                </div>
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
    <script src="{{ URL::asset('assets/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/responsive.dataTables.min.js') }}"></script>
    @if (app()->getLocale() == 'ar')
        <script src="{{ URL::asset('assets/plugins/datatable/js/jquery.dataTables_ar.js') }}"></script>
    @else
        <script src="{{ URL::asset('assets/plugins/datatable/js/jquery.dataTables.js') }}"></script>
    @endif


    <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.bootstrap4.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.buttons.min.js') }}">
        < /scrip> <
        script src = "{{ URL::asset('assets/plugins/datatable/js/buttons.bootstrap4.min.js') }}" >
    </script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/jszip.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/pdfmake.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/vfs_fonts.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/buttons.html5.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/buttons.print.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/buttons.colVis.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/responsive.bootstrap4.min.js') }}"></script>
    <!--Internal  Datatable js -->
    <script src="{{ URL::asset('assets/js/table-data.js') }}"></script>
    <script>
        $('.delete').click(function(e) {
                    var that = $(this)

                    e.preventDefault();

                    //     var n = new Noty({
                    //         text: "@lang('site.confirm_delete')",
                    //         type:"alert",
                    //         killer:true,
                    //         button:[

                    //            Noty.button("@lang('site.yes')",'btn btn-success mr-2',function(){
                    //             that.closest('form').submit();
                    //            }) ,

                    //            Noty.button("@lang('site.yes')",'btn btn-success mr-2',function(){
                    //                 n.close();
                    //            })


                    //         ]
                    //     }).show();
                    // })

                  var n =  new Noty({
                        type: 'warning',
                        layout: 'topRight',
                        theme: 'nest',
                        text: "@lang('site.confirm_delete')",
                        timeout: 2000,
                        killer: true,
                        buttons:[

                               Noty.button("@lang('site.yes')",'btn btn-success mr-2',function(){
                                that.closest('form').submit();
                               }) ,

                               Noty.button("@lang('site.no')",'btn btn-dark mr-2',function(){
                                    n.close();
                               })


                            ]
                    }).show();
                })
    </script>
@endsection
