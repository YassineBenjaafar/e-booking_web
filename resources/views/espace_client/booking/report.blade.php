<h1 align="center">Booking Report</h1>
<ul>
    <li>Booking entity : {{ $booking->entity->label }}</li>
    <li>Start Date :  {{ $booking->start_date }}</li>
    <li>End Date :  {{ $booking->end_date }}</li>
    <li>Number of Days :  {{ (strtotime($booking->end_date) - strtotime($booking->start_date)) / 86400 }}</li>
    <li>Price :  {{ $booking->entity->price }}</li>
    <li>Booking Total Price :  {{ $booking->amount }}</li>
</ul>                 

