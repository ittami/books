@extends('layouts.app')
@section('content')
<!-- //////////////////////// -->
<!-- //////////////////////// -->
<!-- //////////////////////// -->

<div class="inv-blog-wrap bg7 add-padd-xs padding-lg-t150  marg-sm-t50">
    <div class="container  ">
        <div class="row">
            <div class="col-md-8 padd-lr0">

                <article class="inv-stories-item inv-stories-item5 inv-stories-post margin-lg-b60 ">
                    <div class="inv-stories-content">
                        <div class='col-xs-8 col-md-6'><img src="{{ $book->cover }}" alt="" class="inv-img">
                            <ul>    
                                <li>
                                    ISBN:{{ $book->isbn }}
                                </li>
                                <li>
                                    Book Rating:{{ $book->rating }} 
                                </li>
                            </ul>
                        </div>
                        <div class='h4' ><h4>{{ $book->title }}</h4> </div>
                        <div class="col-xs-8 col-md-6 inv-stories-info h5">
                            @foreach($book->authers as $auther)
                            <a href="/authers/{{$auther->id}}/autherProfile">Created By:{{ $auther->name }}</a>
                            @endforeach

                        </div>
                        <div class="col-md-6 inv-stories-info p">

                            <p>{{ $book->description }}</p>
                        </div>
                        <div class="col-md-4 inv-start-form inv-stories-footer" >



                            <button id ='button1' data-book-id ="{{ $book->id }}"  data-status='want' class='bootstrap-select '>
                                {{($book->user_has_book)?'Am Over IT':'I need this book'}}</button>                            
                            <button id ='button2' data-book-id ="{{ $book->id }}"   data-status='have' class='bootstrap-select '>
                                {{($book->user_has_book)?'Am Over IT':'I got this book'}} </button>                            

                        </div> 
                        <div class="soc-net">
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
                    </div>
                </article>
            </div>
            <div class="col-md-4 padd-lr0">
                <aside class="inv-widgets">
                    <div class="inv-widget-search">
                        <div class="form">
                            <input type="text" placeholder="Search ..">
                            <button><i class="fa fa-search"></i></button>
                        </div>
                    </div>
                    <div style='height: 20px;'></div>
                    <section class="inv-tags">
                        <header>
                            <h5>Genres Cloud</h5>
                        </header>
                        @foreach($book->genres as $genre)
                        <a class="inv-tag bg-12"> {{ $genre->name }}  </a>
                        @endforeach

                    </section>
                </aside>
            </div>
        </div>
    </div>
</div>
@endsection
@section('footing')
<script type='text/javascript'>

    $('.bootstrap-select').click(function () {
        var selector = $(this);
        var bookId = selector.attr('data-book-id');
        var statusValue = selector.attr('data-status');
        $.ajax({
            url: '/bookAdding',
            type: 'POST',
            beforeSend: function (xhr) {
                var token = $('meta[name="csrf_token"]').attr('content');
                if (token) {
                    return xhr.setRequestHeader('X-CSRF-TOKEN', token);
                }
            },
            data: {
                book_id: bookId,
                status: statusValue
            },
            dataType: 'json',
            success: function (response) {
                console.log(response);
                if (response.book_interest == 1) {
                    if (statusValue == 'want') {
                        selector.html('AM over this');
                        $('#button2').hide();
                    } else if (statusValue == 'have') {
                        selector.html('AM over this');

                        $('#button1').hide();
                    }

                } else if (response.book_interest == 0) {

                    if (statusValue == 'want') {
                        $('#button2').show();
                        selector.html('I need this book');
                    } else if (statusValue == 'have') {
                        $('#button1').show();
                        selector.html('I got this book');
                    }

                }

            }

        });
    });

</script>


@endsection