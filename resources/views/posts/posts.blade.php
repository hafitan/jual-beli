@extends('layouts.master')
@section('content')

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Laravel Ajax CRUD</title>
        <style>
            body {
                background-color: lightgray !important;
            }

        </style>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    </head>
    <body>
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card strpied-tabled-with-hover">
                            <div class="card-header">
                                <h4 class="card-title">LARAVEL CRUD AJAX</h4>
                                <a href="javascript:void(0)" class="btn btn-success mb-2 card-category" id="btn-create-post">TAMBAH</a>
                            </div>
                            <div class="card-body">
                                <div class="card strpied-tabled-with-hover">
                                    <table class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <td>Title</td>
                                                <td>Content</td>
                                                <td>Aksi</td>
                                            </tr>
                                        </thead>
                                        <tbody id="table-posts">
                                            @foreach ($posts as $post)
                                                <tr id="index_{{ $post->id }}">
                                                    <td>{{ $post->title }}</td>
                                                    <td>{{ $post->content }}</td>
                                                    <td style="text-align: center">
                                                        <a href="javascript:void(0)" id="btn-edit-post" data-id="{{ $post->id }}" class="btn btn-primary btn-sm" >EDIT</a>
                                                        <a href="javascript:void(0)" id="btn-delete-post" data-id="{{ $post->id }}" class="btn btn-danger btn-sm">DELETE</a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
    </html>

    {{-- <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card strpied-tabled-with-hover">
                        <div class="card-header ">
                            <h4 class="card-title">Striped Table with Hover</h4>
                            <p class="card-category">Here is a subtitle for this table</p>
                        </div>
                        <div class="card-body table-full-width table-responsive">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <td>Title</td>
                                        <td>Content</td>
                                        <td>Aksi</td>
                                    </tr>
                                </thead>
                                <tbody id="table-posts">
                                    @foreach ($posts as $post)
                                        <tr id="index_{{ $post->id }}">
                                            <td>{{ $post->title }}</td>
                                            <td>{{ $post->content }}</td>
                                            <td class="text-center">
                                                <a href="javascript:void(0)" id="btn-edit-post" data-id="{{ $post->id }}" class="btn btn-primary btn-sm" >EDIT</a>
                                                <a href="javascript:void(0)" id="btn-delete-post" data-id="{{ $post->id }}" class="btn btn-danger btn-sm">DELETE</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
    @include('posts.components.modal-create')
    @include('posts.components.modal-edit')
    @include('posts.components.delete-post')
    @endsection
