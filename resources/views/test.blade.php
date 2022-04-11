<?php
$names = ['ahmed', 'ali', 'amr'];
?>


@foreach($names as $name)
<p>{{ $name }}</p>
@endforeach