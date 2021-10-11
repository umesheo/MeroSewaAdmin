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
                                            <form action="#" method="POST" id="createWorkerForm">
                                                <div class="mb-3">
                                                    <label for="formGroupExampleInput" class="form-label">Name</label>
                                                    <input type="text" class="form-control" id="Name" name="Name" placeholder="Enter Your Name">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="formGroupExampleInput2" class="form-label">Email</label>
                                                    <input type="email" class="form-control" id="Email" name="Email" placeholder="Enter your Email Address">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="formGroupExampleInput2" class="form-label">Phone</label>
                                                    <input type="text" class="form-control" id="Phone" name="Phone" placeholder="Enter Your Phone Number">
                                                </div>
                                            </form>
                                            <div class="mb-3">
                                                <label for="formGroupExampleInput2" class="form-label">Address</label>
                                                <input type="text" class="form-control" id="Address" name="Address" placeholder="Enter Your Address">
                                            </div>
                                            <div class="card-footer">
                                                <button id="createWorkerButton"  type="button" class="css-button-rounded">Create</button>
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

