@extends('layouts.master')
@section('pageTitle')
    @lang('site.pageTitle_add_user')
@endsection
@section('css')
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

                    <span class="text-muted mt-1 tx-13 mr-2 mb-0 active"> / @lang('site.add')</span>
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
                    <h4>@lang('site.pageTitle_add_user')</h4>
                </div>
                <div class="card-body">
                    @include('partials._error')
                    <form class="form-horizontal" method="POST" action="{{ route('dashboard.users.store') }}">
                        {{ csrf_field() }}
                        {{ method_field('post') }}
                        {{-- row1 --}}
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    {{-- <label for="first_Name">@lang('site.firstName')</label> --}}
                                    <input type="text" class="form-control" id="first_Name" name="first_Name"
                                        placeholder="@lang('site.firstName')" value="{{ old('first_Name') }}">
                                </div>

                            </div>

                            <div class="col-6">
                                <div class="form-group">
                                    {{-- <label for="last_Name">@lang('site.lastName')</label> --}}
                                    <input type="text" class="form-control" id="last_Name" name="last_Name"
                                        value="{{ old('last_Name') }}" placeholder="@lang('site.lastName')">
                                </div>

                            </div>

                        </div>
                        {{-- row2 --}}
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    {{-- <label for="password">@lang('site.password')</label> --}}
                                    <input type="password" class="form-control" id="password" name="password"
                                        placeholder="@lang('site.password')">
                                </div>

                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    {{-- <label for="password">@lang('site.password_confermation')</label> --}}
                                    <input type="password" class="form-control" id="password_confirmation"
                                        name="password_confirmation" placeholder="@lang('site.password_confirmation')">
                                </div>

                            </div>



                        </div>
                        {{-- row 3 --}}
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    {{-- <label for="email">@lang('site.email')</label> --}}
                                    <input type="email" class="form-control" id="email" name="email"
                                        value="{{ old('email') }}" placeholder="@lang('site.email')">
                                </div>
                            </div>
                        </div>




                    </div>
                </div>


            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">@lang('site.permissions')</h4>
                    <div class="row">
                        <div class="col-12">
                            <h3>@lang('site.permissions')</h3>
                            <div class="panel panel-primary tabs-style-2 form-group">
                                <div class=" tab-menu-heading">
                                    <div class="tabs-menu1">
                                        <!-- Tabs -->
                                        <ul class="nav panel-tabs main-nav-line">
                                            <li><a href="#users" class="nav-link active" data-toggle="tab">@lang('site.users')</a></li>

                                        </ul>
                                    </div>
                                </div>
                                <div class="panel-body tabs-menu-body main-content-body-right border">
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="users">

                                            <div class="custom-checkbox custom-control">

                                                <label class="ml-2" > <input name="permissions[]" value="create_users"  type="checkbox" > @lang('site.create')</label>
                                                <label class="ml-2" > <input name="permissions[]" value="read_users"  type="checkbox" > @lang('site.read')</label>
                                                <label class="ml-2" > <input name="permissions[]" value="update_users"  type="checkbox" > @lang('site.update')</label>
                                                <label class="ml-2" > <input name="permissions[]" value="delete_users"  type="checkbox" > @lang('site.delete')</label>
                                            </div>


                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-dark"><span
                                class="fa fa-plus pl-2"></span>@lang('site.add')</button>
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
@endsection
