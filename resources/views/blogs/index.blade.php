@extends('layouts.app')

@section('content')



    <div class="row">

        <div class="col-lg-12 margin-tb">

            <!-- <div class="pull-left">

                <h2>Blog Listing</h2>

            </div> -->

            <div class="pull-right">

                <a class="btn btn-success" href="{{ route('blogs.create') }}"> Create New Blog</a>

            </div>

        </div>

    </div>

   

    @if ($message = Session::get('success'))

        <div class="alert alert-success">

            <p>{{ $message }}</p>

        </div>

    @endif

   

    <table class="table table-bordered">

        <tr>
            <th>No</th>
            <th>Title</th>
            <th>Content</th>
            <th>Slug</th>
            <th width="280px">Action</th>
        </tr>

        @foreach ($blogs as $blog)

        <tr>

            <td>{{ ++$i }}</td> <td>{{ $blog->title }}</td>
            <td>{{ $blog->content }}</td>
            <td>{{ $blog->slug }}</td>
            <td>
                <a class="btn btn-info" href="{{ route('blogs.show', $blog->id) }}" >View</a>
                <a class="btn btn-primary" href="{{ route('blogs.edit', $blog->id) }}" >Edit</a>
                <!-- <a class="btn btn-danger" href="{{ route('blogs.destroy', $blog->id) }}" onclick="return confirm('Are you sure to delete?')">Delete</a> -->
                <a class="btn btn-danger" href="{{ route('blogs.index') }}" 
                   onclick="event.preventDefault(); 
                    document.getElementById( 
                      'delete-form-{{$blog->id}}').submit();"> 
                 Delete  
                </a> 
                <form id="delete-form-{{$blog->id}}"  
                  + action="{{route('blogs.destroy', $blog->id)}}" 
                  method="post"> 
                @csrf @method('DELETE') 
            </form> 
            </td>
        </tr>
        @endforeach
    </table>

    {{$blogs->links('vendor.pagination.default')}}

    <!-- {!! $blogs->links() !!} -->

      

@endsection