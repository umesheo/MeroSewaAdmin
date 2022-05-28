<style>
    body{
        background-image: url({{url('images/background.png')}})
    }

    .styled-table {
        border-collapse: collapse;

        font-size: 0.9em;
        font-family: sans-serif;
        min-width: 400px;
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
        position: center;
        margin: 20px auto;
    }
    .styled-table thead tr {
        background-color: #0096FF;
        color: #ffffff;
        text-align: left;
    }
    .styled-table th,
    .styled-table td {
        padding: 12px 15px;
    }
    .styled-table tbody tr {
        border-bottom: 1px solid #dddddd;
    }

    .styled-table tbody tr:nth-of-type(even) {
        background-color: #f3f3f3;
    }

    .styled-table tbody tr:last-of-type {
        border-bottom: 2px solid #00BDFE;
    }
    .styled-table tbody tr.active-row {
        font-weight: bold;
        color: #009879;
    }
    .css-button-rounded {
        background:	#00A36C;
        color: #fff;
        display: block;
        padding: 10px 5px;
        text-align: center;
        text-decoration: none;
        width: 100px;
        margin-bottom: 10px;
        border-radius: 20px; // the rounded corners are here
    }
    .form-style-5{
        max-width: 600px;
        padding: 10px 20px;
        background: #f4f7f8;
        margin: 10px auto;
        padding: 20px;
        background: #f4f7f8;
        border-radius: 8px;
        font-family: Georgia, "Times New Roman", Times, serif;
    }
    .form-style-5 fieldset{
        border: none;
    }
    .form-style-5 legend {
        font-size: 1.4em;
        margin-bottom: 10px;
    }
    .form-style-5 label {
        display: block;
        margin-bottom: 8px;
    }
    .form-style-5 input[type="text"],
    .form-style-5 input[type="date"],
    .form-style-5 input[type="datetime"],
    .form-style-5 input[type="email"],
    .form-style-5 input[type="number"],
    .form-style-5 input[type="search"],
    .form-style-5 input[type="time"],
    .form-style-5 input[type="url"],
    .form-style-5 textarea,
    .form-style-5 select {
        font-family: Georgia, "Times New Roman", Times, serif;
        background: rgba(255,255,255,.1);
        border: none;
        border-radius: 4px;
        font-size: 16px;
        margin: 0;
        outline: 0;
        padding: 7px;
        width: 100%;
        box-sizing: border-box;
        -webkit-box-sizing: border-box;
        -moz-box-sizing: border-box;
        background-color: #e8eeef;
        color:#8a97a0;
        -webkit-box-shadow: 0 1px 0 rgba(0,0,0,0.03) inset;
        box-shadow: 0 1px 0 rgba(0,0,0,0.03) inset;
        margin-bottom: 30px;

    }
    .form-style-5 input[type="text"]:focus,
    .form-style-5 input[type="date"]:focus,
    .form-style-5 input[type="datetime"]:focus,
    .form-style-5 input[type="email"]:focus,
    .form-style-5 input[type="number"]:focus,
    .form-style-5 input[type="search"]:focus,
    .form-style-5 input[type="time"]:focus,
    .form-style-5 input[type="url"]:focus,
    .form-style-5 textarea:focus,
    .form-style-5 select:focus{
        background: #d2d9dd;
    }
    .form-style-5 select{
        -webkit-appearance: menulist-button;
        height:35px;
    }
    .form-style-5 .number {
        background: #1abc9c;
        color: #fff;
        height: 30px;
        width: 30px;
        display: inline-block;
        font-size: 0.8em;
        margin-right: 4px;
        line-height: 30px;
        text-align: center;
        text-shadow: 0 1px 0 rgba(255,255,255,0.2);
        border-radius: 15px 15px 15px 0px;
    }

    .form-style-5 input[type="submit"],
    .form-style-5 input[type="button"]
    {
        position: relative;
        display: block;
        padding: 5px 5px 5px 5px;
        color: #FFF;
        margin: 0 auto;
        background: #1abc9c;
        font-size: 18px;
        text-align: center;
        font-style: normal;
        width: 50%;
        border: 1px solid #16a085;
        border-radius: 35px;

    }
    .form-style-5 input[type="submit"]:hover,
    .form-style-5 input[type="button"]:hover
    {
        background: #109177;
    }
    .logo{
        display: inline-block;
        width: 100%;

    }
    .icon{
        size: 300px;
    }
    .icon, .text {
        display:inline;
    }

    .text{
        margin-left:10px;
        padding-right: 10px;
        font-size: 24px;
        font-weight: 300;
    }
</style>
<script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
@extends('layouts.app')

@section('content')

    <div class="container" style="margin-top: 0px;">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Workers Details') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session::flash('status') }}
                            </div>
                        @endif
                        <main class="mx-auto">
                            <div class="row">
                                <div class="col-md-12">

                                        <div class="card-header bg-dark text-white" style="border-radius: 20px;">
                                            <div class="logo">
                                                <div class="text">Edit Workers Data</div>
                                                <div class="icon"><i class="fa fa-edit fa-2x" style="display: inline-block;"></i></div>

                                            </div>


                                        </div>
                                        <div class="card-body">
                                            <div class="form-style-5">
                                                <form action="{{url('update-worker/'.$key)}}" method="POST" id="createWorkerForm" enctype='multipart/form-data'>
                                                    @csrf
                                                    @method('PUT')
                                                    <fieldset>
                                                        <legend><span class="number">1</span> Worker Details</legend>
                                                        <input type="text" name="Name" value="{{$editData['Name']}}" placeholder="Name *" required>

                                                        <input type="text" name="Phone" value="{{$editData['PhoneNumber']}}" placeholder="Phone Number*" required>
                                                        <input type="text" name="Address" value="{{$editData['Address']}}" placeholder="Address*" required>
                                                        <input type="text" name="Category" value="{{$editData['Category']}}" placeholder="Category*" required>
                                                        <input type="text" name="NearbyLocation" value="{{$editData['NearbyLocation']}}" placeholder="Near By Location*" required>
                                                        <img src="{{$editData['URL']}}"
                                                        style="height: 48px; width: 50px;">
                                                        <input type="file" id="upload" value="{{$editData['URL']}}" class="inputfile" name="image"
                                                               accept="image/*" style="" >
                                                        <label for="upload" style="text-align: center;"> <i
                                                                class="fa fa-camera icon" style="margin-right: 5px;"></i>Choose
                                                            image to update</label>

                                                    </fieldset>

                                                    <input type="submit" value="Update" />
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

