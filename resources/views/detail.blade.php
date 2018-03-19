<h2>{{$id}}</h2>
<h3>{{$alias}}</h3>

<?php
foreach ($array as $value) {
    echo "<p>$value</p>";
}
?>
<hr>

@foreach($array as $value)
    <p>{{$value}}</p>
@endforeach