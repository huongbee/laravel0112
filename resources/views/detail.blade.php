<h2>{{$id}}</h2>
<h3>{{$alias}}</h3>

<?php
foreach ($array as $value) {
    echo "<p>$value</p>";
}
echo '<br>';
$a =1;
$b =2;

if($a > $b) echo 'đúng';
else echo "sai";
?>
<hr>

@foreach($array as $value)
    <p>{{$value}}</p>
@endforeach

<br>

@if(1>2) đúng
@else sai
@endif

