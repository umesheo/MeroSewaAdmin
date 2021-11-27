<style>
    body {
        background-image: url({{url('images/background.png')}})
    }

    .count{
        width: 200px;
        height: 100px;
        border-radius: 20px;
        margin-top: 5px;
        margin-left: 5px;
        margin-bottom: 10px;
        text-align: center;
        padding-top: 6px;
        background-color: #1b1e21;
        color: white;
        border-left: 10px solid #007FFF;

        box-shadow: rgba(0, 0, 0, 0.25) 0px 54px 55px, rgba(0, 0, 0, 0.12) 0px -12px 30px, rgba(0, 0, 0, 0.12) 0px 4px 6px, rgba(0, 0, 0, 0.17) 0px 12px 13px, rgba(0, 0, 0, 0.09) 0px -3px 5px;

    }





</style>
<script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('App Users Details') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            {{--                            <div class="alert alert-success" role="alert">--}}
                            {{--                                {{ session::flash('status') }}--}}
                            {{--                            </div>--}}
                        @endif
                        <main class="mx-auto">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="card-header bg-dark text-white" style="border-radius: 20px;">
                                        <div class="logo">
                                            <div class="text">Mero Sewa:App User List</div>
                                            <div class="icon"><i class="fa fa-mobile fa-2x"
                                                                 style="display: inline-block;"></i></div>
                                        </div>
                                    </div>
                                    <table class="styled-table">
                                        <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Email</th>

                                        </tr>
                                        </thead>
                                        <tbody class="workersdata">
                                        @php
                                            $i =1;

                                        @endphp
                                        @if(count($all_users) <= 0)
                                            <tr>
                                                <td>No App Users Found</td>
                                            </tr>
                                            @else
                                        @foreach($all_users as $user)
                                            <tr>
                                                @if($user->displayName=="")
                                                    <td>UserName</td>
                                                @else
                                                <td>{{$user->displayName}}</td>
                                                @endif
                                                <td>{{$user->email}}</td>

                                            </tr>


                                        @endforeach
                                        @endif
                                        </tbody>
                                    </table>
                                    <div class="d-flex justify-content-center">
                                        {{ $all_users->links() }}
                                    </div>
                                </div>
                                <div class="col-md-6">

                                    <div class="count">
                                        <i class="fa fa-id-badge fa-2x" style="display: inline-block;"></i>
                                        <h4>{{$count}}</h4>
                                        <p>Total Users</p>
                                    </div>
{{--                                    <img src="/images/AppUser.png" style="width: 700px; height: 400px;"--}}
{{--                                         alt="Girl in a jacket">--}}
                                    <lottie-player src="https://assets3.lottiefiles.com/private_files/lf30_lmwiE8.json"  background="transparent"  speed="1"  style="width: 500px; height: 400px;"  loop  autoplay></lottie-player>

                                </div>
                            </div>
                        </main>
                    </div>

                </div>
            </div>

        </div>
@endsection

