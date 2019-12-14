<?php

$db = mysqli_connect('localhost','root','','carpool');

$list_query = "Select a.origin, a.destination, a.departure_time, b.vehicle_type, b.vehicle_name, c.name, d.ad_id
from route_details a, vehicle_details b, user c, ad_details d
where a.ad_id = b.ad_id and d.id = c.id and b.ad_id = d.ad_id and d.open_for_booking='y'";

$results = mysqli_query($db, $list_query);

?>