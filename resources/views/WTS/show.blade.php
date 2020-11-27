@extends('layouts.app')

@section('content')
@include('inc.sidebar')
<style>
.emp-profile{
    padding: 5%;
    margin-top: 5%;
    margin-bottom: 5%;
    border-radius: 0.5rem;
    background: #fff;
}
</style>
<div class="container emp-profile">
    <h3 style="text-align: center; color: #000;">This Week's Training Sessions</h3><br>
    <table class="table table-sm table-dark" style="border-radius:0px 0px 15px 15px; background: #151516 !important; color: #ababab; ">
        <thead>
            <tr>
              <th scope="col">Day</th>
              <th scope="col">Session</th>
              <th scope="col">Day</th>
              <th scope="col">Session</th>
            </tr>
          </thead>
        <tbody>
          <tr>
            <td>Monday:</td>
            @if($wts->monday == ' - ')
            <td><strong>No Session</strong></td>
            @else
            <td><strong>{{$wts->monday}}</strong></td>
            @endif
            <td>Tuesday:</td>
            @if($wts->tuesday == ' - ')
            <td><strong>No Session</strong></td>
            @else
            <td><strong>{{$wts->tuesday}}</strong></td>
            @endif
          </tr>
          <tr>
            <td>Wednesday:</td>
            @if($wts->wednesday == ' - ')
            <td><strong>No Session</strong></td>
            @else
            <td><strong>{{$wts->wednesday}}</strong></td>
            @endif
            <td>Thursday:</td>
            @if($wts->thursday == ' - ')
            <td><strong>No Session</strong></td>
            @else
            <td><strong>{{$wts->thursday}}</strong></td>
            @endif
          </tr>
          <tr>
            <td>Friday:</td>
            @if($wts->friday == ' - ')
            <td><strong>No Session</strong></td>
            @else
            <td><strong>{{$wts->friday}}</strong></td>
            @endif
            <td>Saturday:</td>
            @if($wts->saturday == ' - ')
            <td><strong>No Session</strong></td>
            @else
            <td><strong>{{$wts->saturday}}</strong></td>
            @endif
          </tr>
          <tr>
            <td>Sunday:</td>
            @if($wts->sunday == ' - ')
            <td><strong>No Session</strong></td>
            @else
            <td><strong>{{$wts->sunday}}</strong></td>
            @endif
            <td> </td>
            <td> </td>
          </tr>
        </tbody>
      </table>
    <div class="container" style="text-align: center;">
        <a href="http://unbreakable.me/pts/{{$wts->coach_id}}"><button class="btn btn-dark" style="background-color: #4c648c">Request a Private Training Session</button></a><br>
    </div>

</div>
@endsection
