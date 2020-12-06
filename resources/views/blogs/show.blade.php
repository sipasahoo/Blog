@extends('blogs.layout')


@section('content')

    <div class="row">

        <div class="col-lg-12 margin-tb">

            <div class="pull-left">

                <h2> Show Blog</h2>

            </div>

            <div class="pull-right">

                <a class="btn btn-primary" href="{{ route('blogs.index') }}"> Back</a>

            </div>

        </div>

    </div>

   

    <div class="row">

        <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">

                <strong>Title:</strong>

                {{ $blogs->title }}

            </div>

        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">

                <strong>Content:</strong>

                {{ $blogs->content }}

            </div>

        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">

        <div class="form-group">

            <strong>Slug:</strong>

            {{ $blogs->slug }}

        </div>

        </div>
    </div>

@endsection