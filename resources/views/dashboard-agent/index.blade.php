@extends('dashboard-agent.layouts.app')
@section('content')
<div class="page-inner">
    @include('dashboard-agent.partials.welcome')
    @include('dashboard-agent.components.card')


    <div class="row">
        @include('dashboard-agent.partials.new-customers')
        @include('dashboard-agent.partials.new-products')
    </div>

</div>
@endsection

