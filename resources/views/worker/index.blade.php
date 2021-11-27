<style>
    body {
        background-image: url({{url('images/background1.png')}})
    }

    .count{
        width: 200px;
        height: 100px;
        border-radius: 20px;
        margin-top: 1px;
        margin-left: 5px;
        margin-bottom: 10px;
        text-align: center;
        padding-top: 6px;
        background-color: #1b1e21;
        color: white;
        border-left: 10px solid #007FFF;

        box-shadow: rgba(0, 0, 0, 0.25) 0px 54px 55px, rgba(0, 0, 0, 0.12) 0px -12px 30px, rgba(0, 0, 0, 0.12) 0px 4px 6px, rgba(0, 0, 0, 0.17) 0px 12px 13px, rgba(0, 0, 0, 0.09) 0px -3px 5px;

    }
    label {

        background-color: #e8eeef;
        color: black;
        padding: 0.5rem;
        font-family: Georgia, "Times New Roman", Times, serif;
        border-radius: 0.3rem;
        cursor: pointer;

    }

    input[type=file] {


    }

    ::-webkit-file-upload-button {
        display: none;
    }


    .searchBox {
     position: absolute;
        top: 33%;
        left: 50%;
        transform: translate(-50%,-50%);
        background: #2f3640;
        height: 40px;
        border-radius: 40px;

    }
    .searchBox:hover > .searchButton{
        width: 240px;
        padding: 0 6px;
    }
    .searchBox:hover > .search-btn{
       background: white;
    }
    .searchButton{
        text-align: center;
        border: none;
        background: none;
        outline: none;
        float: left;
        padding: 0;
        color: white;
        font-size:16px ;
        transition: 0.4s;
        line-height: 40px;
        width: 0px;
    }
    .search-btn{
        color: #007FFF;
        float: left;
        width: 40px;
        height: 40px;
        border-radius: 50%;
        background: #2f3640;
        display: flex;
        justify-content: center;
        align-items: center;
        transition: 0.4s;


    }

</style>
<script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
@extends('layouts.app')
@section('content')
    <div class="container" >
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card" style="padding-top: 1px; border-radius: 10px; box-shadow: rgba(26, 188, 156, 0.4) 5px 5px, rgba(26, 188, 156, 0.3) 10px 10px, rgba(26, 188, 156, 0.2) 15px 15px, rgba(26, 188, 156, 0.1) 20px 20px, rgba(26, 188, 156, 0.05) 25px 25px;">
                    <div class="card-header">{{ __('Workers Details') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session::flash('status') }}
                            </div>
                        @endif
                        <main class="mx-0">
                            <div class="row">
                                <div class="col-md-9">

                                    <div class="count" style="display: inline-block">
                                        <i class="fa fa-id-badge fa-2x" style="display: inline-block; margin-top: 1px;"></i>
                                        <h2 style="display: inline-block">{{$total_count}}</h2>
                                        <p>Total Workers</p>
                                    </div>
                                    <div class="lotte" style="display: inline-block">
                                        <lottie-player src="https://assets9.lottiefiles.com/packages/lf20_9evakyqx.json"  background="transparent"  speed="1"  style="width: 200px; height: 70px;"  loop  autoplay></lottie-player>
                                    </div>
                                    <div class="card-header bg-dark text-white" style="border-radius: 20px;">
                                        <div class="logo">
                                            <div class="text">Mero Sewa:Workers List</div>
                                            <div class="icon"><i class="fa fa-users fa-2x"
                                                                 style="display: inline-block;"></i></div>

                                        </div>


                                    </div>
                                    <form class="form-group" id="search" style="margin-bottom: 70px;" autocomplete="off">
                                        <div class="searchBox">
                                        <input type="search"  name="search" id="" class="searchButton" value="{{$search}}" placeholder="Search for name,number">

                                        <a class="search-btn" onclick="document.getElementById('search').submit();">
                                            <i class="fa fa-search" aria-hidden="true"></i>
                                        </a>
                                        </div>
                                    </form>
                                    <table class="styled-table" id="workertable">
                                        <thead>
                                        <tr>

                                            <th>Name</th>
                                            <th>Address</th>
                                            <th>Image</th>
                                            <th>PhoneNumber</th>
                                            <th>Category</th>
                                            <th>Edit</th>
                                            <th>Delete</th>
                                        </tr>
                                        </thead>
                                        <tbody class="workersdata">
                                        @php $i=1;
                                        @endphp
                                        @if(count($workers) <= 0)
                                            <tr>
                                                <td colspan="8">No Records Found</td>
                                            </tr>
                                        @else

                                        @foreach($workers as $key => $item)

                                            <tr>

                                                <td>{{$item['Name']}}</td>
                                                <td>{{$item['Address']}}</td>
                                                <td><img src="{{$item['URL']}}"
                                                         style="height: 48px; width: 50px;"></td>
                                                <td>{{$item['PhoneNumber']}}</td>
                                                <td>{{$item['Category']}}</td>
                                                <td><a href="{{url('edit-worker/'.$key)}}"
                                                       class="btn btn-sm btn-primary badge-pill" style="background-color: #3bb78f;
background-image: linear-gradient(315deg, #3bb78f 0%, #0bab64 74%);border-radius: 5px;"><i class="fa fa-edit fa-lg"
                                                                                           style="padding-right: 5px;"></i>Edit</a>
                                                </td>
                                                <td><a href="{{url('delete-worker/'.$key)}}"
                                                       class="btn btn-sm btn-danger badge-pill" style="background-color: #fc9842;
background-image: linear-gradient(315deg, #fc9842 0%, #fe5f75 74%);border-radius: 5px;"><i class="fa fa-trash fa-lg"
                                                                                           style="padding-right: 5px;"></i>Delete</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                        @endif
                                        </tbody>
                                    </table>
                                    <div class="d-flex justify-content-center" style="margin-top: 5px;">
                                        {{ $workers->links() }}
                                    </div>


                                </div>

                                <div class="col-md-3">


                                    <div class="card-header bg-dark text-white" style="border-radius: 20px;">
                                        <div class="logo">
                                            <div class="text">Add Workers</div>
                                            <div class="icon"><i class="fa fa-user-plus fa-2x"
                                                                 style="display: inline-block;"></i></div>

                                        </div>

                                    </div>
                                    <div class="card-body">
                                        <div class="form-style-5">
                                            <form action="{{url('add-worker')}}" method="POST" id="createWorkerForm"
                                                  enctype='multipart/form-data'>
                                                @csrf
                                                <fieldset>
                                                    <legend><span class="number">1</span> Worker Details</legend>
                                                    <input type="text" name="Name" placeholder="Name *">

                                                    <input type="text" name="Phone" placeholder="Phone Number*">
                                                    <input type="text" name="Address" placeholder="Address*">
                                                    <input type="text" name="Category" placeholder="Category*">

                                                    <input type="file" id="upload" class="inputfile" name="image"
                                                           accept="image/*">
                                                    <label for="upload" style="text-align: center;"> <i
                                                            class="fa fa-camera icon" style="margin-right: 5px;"></i>Choose
                                                        image</label>


                                                </fieldset>


                                                <input type="submit" value="Submit"/>
                                            </form>

                                        </div>
                                    </div>

                                </div>
                            </div>
                        </main>
                    </div>

                </div>
            </div>

        </div>
@endsection


