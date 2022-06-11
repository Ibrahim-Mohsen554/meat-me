@extends('layouts.master')
@section('pageTitle')
    @lang('site.pageTitle_edit_user')
@endsection
@section('css')
<link href="{{ URL::asset('assets/plugins/datatable/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" />
<link href="{{ URL::asset('assets/plugins/datatable/css/buttons.bootstrap4.min.css') }}" rel="stylesheet">
<link href="{{ URL::asset('assets/plugins/datatable/css/responsive.bootstrap4.min.css') }}" rel="stylesheet" />
<link href="{{ URL::asset('assets/plugins/datatable/css/jquery.dataTables.min.css') }}" rel="stylesheet">
<link href="{{ URL::asset('assets/plugins/datatable/css/responsive.dataTables.min.css') }}" rel="stylesheet">
<link href="{{ URL::asset('assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet">

<!---Internal Fileupload css-->
<link href="{{ URL::asset('assets/plugins/fileuploads/css/fileupload.css') }}" rel="stylesheet" type="text/css" />
<!---Internal Fancy uploader css-->
<link href="{{ URL::asset('assets/plugins/fancyuploder/fancy_fileupload.css') }}" rel="stylesheet" />
<!--Internal Sumoselect css-->
<link rel="stylesheet" href="{{ URL::asset('assets/plugins/sumoselect/sumoselect-rtl.css') }}">
<!--Internal  TelephoneInput css-->
<link rel="stylesheet" href="{{ URL::asset('assets/plugins/telephoneinput/telephoneinput-rtl.css') }}">
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <div class="d-flex">
                    <h4 class="content-title mb-0 my-auto"><a href="{{ route('dashboard.index') }}">@lang('site.dashboard')</a>
                    </h4>
                    <h4 class="content-title mb-0 my-auto"><a href="{{ route('dashboard.users.index') }}"> >
                            @lang('site.users')</a></h4>

                    <span class="text-muted mt-1 tx-13 mr-2 mb-0 active"> / @lang('site.edit')</span>
                </div>
            </div>
        </div>

    </div>
    <!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header pb-0">
                    <h4>@lang('site.pageTitle_edit_user')</h4>
                </div>
                <div class="card-body">
                    @include('partials._error')
                    <form class="form-horizontal" method="POST" action="{{ route('dashboard.users.update', $user->id) }}">
                        {{ csrf_field() }}
                        {{ method_field('put') }}
                        {{-- row1 --}}
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    {{-- <label for="first_Name">@lang('site.firstName')</label> --}}
                                    <input type="text" class="form-control" id="first_Name" name="first_Name"
                                        placeholder="@lang('site.firstName')" value="{{ $user->first_Name }}">
                                </div>

                            </div>

                            <div class="col-6">
                                <div class="form-group">
                                    {{-- <label for="last_Name">@lang('site.lastName')</label> --}}
                                    <input type="text" class="form-control" id="last_Name" name="last_Name"
                                        value="{{ $user->last_Name }}" placeholder="@lang('site.lastName')">
                                </div>

                            </div>

                        </div>

                        {{-- row 3 --}}
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    {{-- <label for="email">@lang('site.email')</label> --}}
                                    <input type="email" class="form-control" id="email" name="email"
                                        value="{{ $user->email }}" placeholder="@lang('site.email')">
                                </div>
                            </div>
                        </div>

                            <div class="row">

                                <div class="col-sm-6 col-md-6">
                                    <input type="file" name="image" id="name" class="dropify"  data-height="70""/>
                                </div>
                            </div>


                </div>
            </div>


            <div class="card">
                <div class="card-body">
                    <div class="row mb-4 mt-2">
                        <div class="col-12">
                            <h3>@lang('Roles')</h3>
                            <div class="custom-checkbox custom-control">
                                @php

                                    $roles = ['admin', 'customer', 'supplier'];

                                @endphp


                                @foreach ($roles as $index => $role)
                                    <label class="ml-2">
                                        <input name="role" {{ $user->hasRole($role) ? 'checked' : '' }}
                                            value="{{ $index + 2 }}" type="radio">{{ $role }}
                                    </label>
                                @endforeach


                            </div>
                        </div>
                    </div>
                    <h4 class="card-title">@lang('site.permissions')</h4>
                    <div class="row">
                        <div class="col-12">
                            <h3>@lang('site.permissions')</h3>
                            <div class="panel panel-primary tabs-style-2 form-group">
                                <div class=" tab-menu-heading">
                                    <div class="tabs-menu1">
                                        @php
                                            $models = ['users', 'categories', 'products', 'suppliers', 'customers'];
                                            $maps = ['create', 'read', 'update', 'delete'];
                                        @endphp
                                        <!-- Tabs -->
                                        <ul class="nav panel-tabs main-nav-line">

                                            @foreach ($models as $index => $model)
                                                <li><a href="#{{ $model }}"
                                                        class="nav-link {{ $index == 0 ? 'active' : '' }}"
                                                        data-toggle="tab">@lang('site.' . $model)</a></li>
                                            @endforeach


                                        </ul>
                                    </div>
                                </div>
                                <div class="panel-body tabs-menu-body main-content-body-right border">
                                    <div class="tab-content">
                                        @foreach ($models as $index => $model)
                                            <div class="tab-pane {{ $index == 0 ? 'active' : '' }}"
                                                id="{{ $model }}">
                                                <div class="custom-checkbox custom-control">

                                                    @foreach ($maps as $map)
                                                        <label class="ml-2"> <input name="permissions[] "
                                                                {{ $user->hasPermission($map . '_' . $model) ? 'checked' : '' }}
                                                                value="{{ $map }}_{{ $model }}"
                                                                type="checkbox">@lang('site.' . $map)</label>
                                                    @endforeach


                                                </div>
                                            </div>
                                        @endforeach


                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-dark"><span
                                class="fa fa-edit pl-2"></span>@lang('site.edit')</button>
                    </div>
                </div>
            </div>
            </form>
        </div>
    </div>
    <!-- row closed -->
    </div>
    <!-- Container closed -->
    </div>
    <!-- main-content closed -->
@endsection
@section('js')
    <!-- Internal Select2 js-->
    <script src="{{ URL::asset('assets/plugins/select2/js/select2.min.js') }}"></script>
    <!--Internal Fileuploads js-->
    <script src="{{ URL::asset('assets/plugins/fileuploads/js/fileupload.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/fileuploads/js/file-upload.js') }}"></script>
    <!--Internal Fancy uploader js-->
    <script src="{{ URL::asset('assets/plugins/fancyuploder/jquery.ui.widget.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/fancyuploder/jquery.fileupload.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/fancyuploder/jquery.iframe-transport.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/fancyuploder/jquery.fancy-fileupload.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/fancyuploder/fancy-uploader.js') }}"></script>
    <!--Internal  Form-elements js-->
    <script src="{{ URL::asset('assets/js/advanced-form-elements.js') }}"></script>
    <script src="{{ URL::asset('assets/js/select2.js') }}"></script>
    <!--Internal Sumoselect js-->
    <script src="{{ URL::asset('assets/plugins/sumoselect/jquery.sumoselect.js') }}"></script>
    <!--Internal  Datepicker js -->
    <script src="{{ URL::asset('assets/plugins/jquery-ui/ui/widgets/datepicker.js') }}"></script>
    <!--Internal  jquery.maskedinput js -->
    <script src="{{ URL::asset('assets/plugins/jquery.maskedinput/jquery.maskedinput.js') }}"></script>
    <!--Internal  spectrum-colorpicker js -->
    <script src="{{ URL::asset('assets/plugins/spectrum-colorpicker/spectrum.js') }}"></script>
    <!-- Internal form-elements js -->
    <script src="{{ URL::asset('assets/js/form-elements.js') }}"></script>
@endsection
