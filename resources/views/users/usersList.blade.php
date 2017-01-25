@extends('layouts.app')
@section('content')

<div style="height:100px;"></div>
<div class="container padd-lr0">
    <div class="row">
        <div class="col-xs-12">
            <div class="inv-listing-filter margin-lg-t5">
                <div class="inv-start-form">
                    <form method='post' action='' class="fillter-wrap">
                        
                        <label for="key" class=' col-lg-3'>
                            <input id="key" type="text" placeholder="Search book by name" >
                        </label>
                        <label for="key" class=' col-lg-3'>
                            <input id="key" type="text" placeholder="search book by Author" >
                        </label>
                        <label for="key" class=' col-lg-3'>
                            <input id="key" type="text" placeholder=" search Book by Genre" >
                        </label>
                        <button class="button bg6 activbut" type="button" name="button" >Submit</button>
                    </form>
                </div>
            </div>
            
        </div>
    </div>
</div>

<div class="bg7">
    <div class="inv-listing-result inv-listing-result-js2 listpage">
        <div class="container padd-lr0">
            <div class="row">
                <div class="col-xs-12">
                    <header class="inv-listing-header">
                        <h2 class="h2">Users</h2>
                        <div class="inv-list-btn">
                            <a href="" class="fa fa-th-list " data-list="inv-listing-result-style2"></a>
                            <a href="" class="fa fa-th active" data-list="inv-listing-result-style1"></a>
                        </div>
                    </header>
                </div>    
                @foreach($users as $user)
                <div class="col-xs-12">
                    <div class="change-block-size col-lg-4 col-sm-6">
                        <div class="inv-places2-item">
                            <div class="inv-places2-info bg6">
                                <h3>
                                    <a href='/usersList/{{$user->id}}/userProfile' class="h3 offset-2">{{ $user->name }}</a>
                                </h3>
                            </div>
                            <div class="bg8 inv-list-style2 inv-places2-row">
                                <div class="inv-places2-info">
                                    <ul>
                                        <li >
                                            User Provider : {{ $user->registered_from }}
                                        </li>
                                        <li>
                                            Registered At : {{ $user->created_at }}
                                        </li>
                                        <li>
                                            <form method="POST" action="/usersList/{{ $user->id }}/follow" class="fillter-wrap">
                                                {{csrf_field()}}
                                                <button type="submit" class="button activbut bg6">
                                                    {{ $user->user_is_following_user?'Unfollow User':'Follow User' }} 
                                                </button>
                                            </form>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>






@endsection



