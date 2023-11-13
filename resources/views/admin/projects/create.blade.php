@extends('layouts.admin')

@section('content')

    <section class="create py-5 col-6 mx-auto">
        <div class="container">

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li> {{ $error }} </li>
                        @endforeach
                    </ul>
                </div>
            @endif



            <form action=" {{ route('admin.projects.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="mb-5">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" name="title" id="title"
                        class="form-control @error('title') is-invalid @enderror" placeholder="" aria-describedby="helpId"
                        value="{{ old('title') }}">
                    <small id="titleHelper" class="text-muted">Type a title of Project</small>
                    @error('title')
                        <div class="text-danger"> {{ $message }} </div>
                    @enderror
                </div>

                <div class="mb-5">
                    <label for="cover_image" class="form-label">Image</label>
                    <input type="file" name="cover_image" id="cover_image"
                        class="form-control @error('content') is-invalid @enderror" placeholder=""
                        aria-describedby="helpId">
                    <small id="imageHelper" class="text-muted">Upload an image</small>
                    @error('cover_image')
                        <div class="text-danger"> {{ $message }} </div>
                    @enderror
                </div>

                <div class="mb-5">
                    <label for="description" class="form-label">Description</label>
                    <textarea class="form-control @error('description') is-invalid @enderror" name="description" id="description"
                        cols="30" rows="5" placeholder="Type a description">{{ old('description') }}</textarea>
                    @error('description')
                        <div class="text-danger"> {{ $message }} </div>
                    @enderror
                </div>

                <div class="mb-5">
                    <label for="github" class="form-label">
                        <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="30" height="30"
                            viewBox="0 0 30 30">
                            <path
                                d="M15,3C8.373,3,3,8.373,3,15c0,5.623,3.872,10.328,9.092,11.63C12.036,26.468,12,26.28,12,26.047v-2.051 c-0.487,0-1.303,0-1.508,0c-0.821,0-1.551-0.353-1.905-1.009c-0.393-0.729-0.461-1.844-1.435-2.526 c-0.289-0.227-0.069-0.486,0.264-0.451c0.615,0.174,1.125,0.596,1.605,1.222c0.478,0.627,0.703,0.769,1.596,0.769 c0.433,0,1.081-0.025,1.691-0.121c0.328-0.833,0.895-1.6,1.588-1.962c-3.996-0.411-5.903-2.399-5.903-5.098 c0-1.162,0.495-2.286,1.336-3.233C9.053,10.647,8.706,8.73,9.435,8c1.798,0,2.885,1.166,3.146,1.481C13.477,9.174,14.461,9,15.495,9 c1.036,0,2.024,0.174,2.922,0.483C18.675,9.17,19.763,8,21.565,8c0.732,0.731,0.381,2.656,0.102,3.594 c0.836,0.945,1.328,2.066,1.328,3.226c0,2.697-1.904,4.684-5.894,5.097C18.199,20.49,19,22.1,19,23.313v2.734 c0,0.104-0.023,0.179-0.035,0.268C23.641,24.676,27,20.236,27,15C27,8.373,21.627,3,15,3z">
                            </path>
                        </svg>
                        Github link</label>
                    <div class="input-group">
                        <span class="input-group-text" id="github">https://</span>
                        <input type="text" name="github" class="form-control" id="github" aria-describedby=""
                            basic-addon4" value="{{ old('github') }}">
                        @error('github')
                            <div class="text-danger"> {{ $message }} </div>
                        @enderror
                    </div>
                    <div class="form-text" id="basic-addon4">Insert your github link.</div>
                </div>

                <div class="mb-5">
                    <label for="link" class="form-label">
                        <svg xmlns="http://www.w3.org/2000/svg" height="1.5em"
                            viewBox="0 0 640 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                            <path
                                d="M579.8 267.7c56.5-56.5 56.5-148 0-204.5c-50-50-128.8-56.5-186.3-15.4l-1.6 1.1c-14.4 10.3-17.7 30.3-7.4 44.6s30.3 17.7 44.6 7.4l1.6-1.1c32.1-22.9 76-19.3 103.8 8.6c31.5 31.5 31.5 82.5 0 114L422.3 334.8c-31.5 31.5-82.5 31.5-114 0c-27.9-27.9-31.5-71.8-8.6-103.8l1.1-1.6c10.3-14.4 6.9-34.4-7.4-44.6s-34.4-6.9-44.6 7.4l-1.1 1.6C206.5 251.2 213 330 263 380c56.5 56.5 148 56.5 204.5 0L579.8 267.7zM60.2 244.3c-56.5 56.5-56.5 148 0 204.5c50 50 128.8 56.5 186.3 15.4l1.6-1.1c14.4-10.3 17.7-30.3 7.4-44.6s-30.3-17.7-44.6-7.4l-1.6 1.1c-32.1 22.9-76 19.3-103.8-8.6C74 372 74 321 105.5 289.5L217.7 177.2c31.5-31.5 82.5-31.5 114 0c27.9 27.9 31.5 71.8 8.6 103.9l-1.1 1.6c-10.3 14.4-6.9 34.4 7.4 44.6s34.4 6.9 44.6-7.4l1.1-1.6C433.5 260.8 427 182 377 132c-56.5-56.5-148-56.5-204.5 0L60.2 244.3z" />
                        </svg>
                        Link</label>
                    <div class="input-group">
                        <span class="input-group-text" id="link">https://</span>
                        <input type="text" name="link" class="form-control" id="link" aria-describedby=""
                            basic-addon4" value="{{ old('link') }}">
                        @error('link')
                            <div class="text-danger"> {{ $message }} </div>
                        @enderror
                    </div>
                    <div class="form-text" id="basic-addon4">Insert Link.</div>
                </div>

                <button type="submit" class="btn btn-primary">Add</button>
                <a class="text-decoration-none btn btn-primary" href="{{ route('admin.projects.index') }}">Go to project
                    table</a>

            </form>
        </div>
    </section>


@endsection
