@component('mail::message')
# Repair Complete

Dear {{ $repair->car->client->name }},

We are pleased to inform you that the repair for your car ({{ $repair->car->make }} {{ $repair->car->model }}) has been completed. Below are the details of the repair.

## Repair Details
- Description: {{ $repair->description }}
- Date Started: {{ $repair->date_start }}
- Date Completed: {{ $repair->date_end }}

## Invoice
You can download your invoice from the application.

Thank you for choosing our services.

Best regards,  
El-Morabet Mechanics
<img src="https://images.vexels.com/media/users/3/304449/isolated/preview/a0bd79977e33945e73863d5e341e3861-cartoon-image-of-a-worker-with-a-wrench.png" alt="Company Logo" width="180px" height="180px">
@endcomponent
