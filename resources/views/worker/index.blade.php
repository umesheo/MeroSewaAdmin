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
        background-color: #00BDFE;
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
        max-width: 500px;
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
        width: 30%;
        border: 1px solid #16a085;
        border-radius: 35px;

    }
    .form-style-5 input[type="submit"]:hover,
    .form-style-5 input[type="button"]:hover
    {
        background: #109177;
    }
</style>
@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Workers Details') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <main class="mx-auto m-4">
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="card">
                                        <div class="card-header bg-dark text-white">
                                            <h4>Mero Sewa:Workers List</h4>
                                        </div>
                                        <div class="card-body">
                                            <table class="styled-table">
                                                <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Name</th>
                                                    <th>Email</th>
                                                    <th>Phone</th>
                                                    <th>Address</th>
                                                </tr>
                                                </thead>
                                                <tbody class="workersdata">

                                                <!-- and so on... -->
                                                </tbody>
                                            </table>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">

                                    <div class="card">
                                        <div class="card-header bg-dark text-white">
                                            <h4>Add Workers</h4>
                                        </div>
                                        <div class="card-body">
                                            <div class="form-style-5">
                                            <form action="{{url('add-worker')}}" method="POST" id="createWorkerForm">
                                                @csrf
                                                <fieldset>
                                                    <legend><span class="number">1</span> Worker Details</legend>
                                                    <input type="text" name="Name" placeholder="Name *">
                                                    <input type="email" name="Email" placeholder="Email *">
                                                    <input type="text" name="Phone" placeholder="Phone Number*">
                                                    <input type="text" name="Address" placeholder="Address*">
                                                    <input type="text" name="Category" placeholder="Category*">

                                                </fieldset>

                                                <input type="submit" value="Submit" />
                                            </form>

                                        </div>
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

