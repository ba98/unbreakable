@extends('layouts.app')

@section('content')
@include('inc.sidebar')
<style>
    .card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  max-width: 300px;
  margin: auto;
  text-align: center;
  border-radius: 15px;
  margin-bottom: 15px;
}
</style>
<?php
use App\User;

$numOfCols = 3;
$rowCount = 0;
$bootstrapColWidth = 12 / $numOfCols;
?>
<div class="container">
    <div class="row">
        @foreach ($wts as $tariningSchedule)
        <div class="col-md-<?php echo $bootstrapColWidth; ?>">
            <?php
                $coach = User::where('id','=', $tariningSchedule->coach_id)->first();
                $coachImage = $coach->image;
            ?>
            <div class="card">
            <a href="wts/{{$tariningSchedule->id}}"><img src="../storage/images/{{$coachImage}}" alt="{{$coach->name}}" style="object-fit: cover; width: 230px; height: 230px; border-radius:15px;"></a>
            <a href="wts/{{$tariningSchedule->id}}" style="color:#000; margin-top: 10px;"><h4>Coach: {{$tariningSchedule->coach_name}}</h4></a>
            </div>
        </div>
        <?php
            $rowCount++;
            if($rowCount % $numOfCols == 0) echo '</div><br> <div class="row">';
            ?>
            @endforeach
        </div>
    </div>
</div>
@endsection
