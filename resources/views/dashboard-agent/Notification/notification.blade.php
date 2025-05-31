@extends('dashboard.layouts.app')

@section('title')
Notification
@endsection

@include('dashboard.components.alerts')
@section('content')
<div class="page-inner">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">

        </ol>
    </nav>
            <div>

                <!-- div 2 -->
                <div class="col-xl-4" style="width: 80%; padding-left:300px">
                    <div class="card custom-card" style="width: 100%; min-width: 900px; margin: auto; box-shadow: 0 4px 10px rgba(0,0,0,0.15); border-radius: 15px;">
                        <div style="display:flex;justify-content:space-between;padding:5px 10px">

                            <h4 class="card-title font-weight-bold" style="font-size: 1.5rem; color:rgb(6, 1, 17);padding: 8px 0">
                                Notification :
                            </h4>
                            @if(auth()->user()->unreadNotifications->isNotEmpty())
                            <form action="{{route('markAllNotificationAsRead')}}" method="post" style="padding-top:10px" >
                                @csrf
                                @method('post')
                                <button type="submit" class="fancy-btn btn-view" style="width: 95%;">Make all notifications As read</button>
                            </form>
                            @endif
                        </div>

                    <div class="card-body">
                        <div style="padding-left: 20px;">
                            <ul class="list-group">

                                @foreach (auth()->user()->notifications as $notification)

                                    <li class="list-group-item pb-4 {{ is_null($notification->read_at) ? 'unread' : '' }}" style="border-radius:10px;margin-bottom:3px; position:relative">
                                        <div style="position:absolute; top:5px; right:10px">
                                            <button type="submit" style="background:none;border:none;font-weight:bold;font-size:18px;line-height:1;color:#aaa"  data-bs-toggle="modal" data-bs-target="#actionModalNotificationDestroy-{{ $notification->id }}" title="Take Action">&times;</button>
                                        </div>



                                        <a href="{{route('agent.markNotificationAsRead',$notification->id)}}">
                                        <div class="d-flex" style="gap:15px">
                                            @if($notification->type == 'App\Notifications\acceptedMobileNotification')
                                                <div class="notif-icon notif-primary circle_icon circle_icon_pink">
                                                    <i class="fa fa-user-plus"></i>
                                                </div>
                                                <div class="notif-content" style="color:black">
                                                    <p class="block">{{ $notification->data['message'] }}</p>
                                                    <p class="time date">{{ $notification->created_at->diffForHumans() }}</p>
                                                </div>
                                            @elseif($notification->type == 'App\Notifications\rejectedMobileNotification')
                                                <div class="notif-icon notif-danger circle_icon circle_icon_info">
                                                    <i class="fa fa-user-tag"></i>
                                                </div>
                                                <div class="notif-content" style="color:black">
                                                    <p class="block">{{ $notification->data['message'] }}</p>
                                                    <p class="time date">{{ $notification->created_at->diffForHumans() }}</p>
                                                </div>
                                            @endif
                                        </div>
                                </a>
                            </li>
                            @include('../../dashboardmodals.notification-destroy')

                        @endforeach


                            </ul>

                    </div>
                    </div>
                </div>
                <!-- end div2 -->
            </div>
            </div>



</div> <!-- /.page-inner -->
@endsection
