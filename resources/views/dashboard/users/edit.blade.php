@extends('layouts.master')
@section('pageTitle')
    @lang('site.pageTitle_edit_user')
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
@endsection
