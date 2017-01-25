@extends('layouts.app')
@section('content')

<div class="inv-blog-wrap bg7 add-padd-xs padding-lg-t115  marg-sm-t50">
    <div class="container  ">
        <div class="row">
            <div class="col-md-7 padd-lr0">
                <article class="inv-stories-item inv-stories-item5 inv-stories-post margin-lg-b60 ">
                    <div class="inv-stories-content">
                        <div class='col-md-5'><img src="{{ $auther->image }}"  class="inv-categorys2 inv-category-item inv-category-head"  alt=''></div>
                        <div class="col-md-7 inv-stories-info p">
                            <h2 class='h2'>{{ $auther->name }}</h2>
                            <p>{{ $auther->description }}</p>
                        </div>

                        <div class="inv-start-form inv-stories-footer">

                            <button   id='following-auther' data-auther-id="{{$auther->id}}"  data-token="{{ csrf_token() }}" > 
                                {{ ($auther->user_is_following_auther)?'Unfollow Auther' : 'Follow Auther' }}

                            </button>
                        </div>

                        <ul>
                            <li>
                                <a href="" class='fa fa-twitter bg20'></a>
                            </li>
                            <li>
                                <a href="" class='fa fa-facebook bg17'></a>
                            </li>
                            <li>
                                <a href="" class='fa fa-google-plus bg18'></a>
                            </li>
                            <li>
                                <a href="" class='fa fa-share-alt'></a>
                            </li>
                        </ul>
                    
            </div>
            </article>
        </div>
        <div class="col-md-5 padd-lr0">
            <aside class="inv-widgets">
                <section class="inv-widget-posts">
                    <section class="inv-tags">
                        <header>
                            <h5>Auther Books</h5>
                        </header>
                        <article class="inv-stories-item inv-stories-item5 inv-stories-post margin-lg-b60 ">
                            <div class="inv-stories-item">
                                @foreach($auther->books()->limit(2)->get() as $book)
                                <ul>
                                    <li>
                                        <a href="/booksList/{{ $book->id }}/add">
                                            <img src="{{ $book->cover }}" alt="" class='inv-listing-img'>{{$book->title}}
                                        </a>
                                    </li>
                                </ul>

                                @endforeach

                                <a href="/authers/{{$auther->id}}/autherProfile/books">All {{$auther->name}} Books </a>
                            </div>
                        </article>
                    </section>
                </section>
            </aside>
        </div>
    </div>
</div>
</div>


@endsection
@section('footing')
<script type='text/javascript'>

    $("#following-auther").click(function () {
        var autherId = $(this).attr('data-auther-id');
        var selector = $(this);
        $.ajax({

            url: '/autherFollowing',
            type: 'post',
            beforeSend: function (xhr) {
                var token = $('meta[name="csrf_token"]').attr('content');
                
                if (token) {
                    return xhr.setRequestHeader('X-CSRF-TOKEN', token);
                }
            },
            data: {
                auther_id: autherId
            },

            dataType: 'json',
            success: function (response) {

                if (response.follow == 1) {
                    selector.html('Unfollow Auther');
                } else if (response.follow == 0) {
                    selector.html('Follow Auther');
                }
            }
        });
    });


</script>
@endsection