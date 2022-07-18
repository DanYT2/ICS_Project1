Hello {{ $mailData['name'] }},

<p>Thank you for booking an appointment with us</p>
<p>The details of your appointment are as follows:</p>
<br>
<p>Date: {{ $mailData['date'] }}</p>
<p>Time: {{ $mailData['time'] }}</p>
<p>Doctor: Dr. {{ $mailData['doctorName'] }}</p>
<hr>

<p>We look forward to your attendance.</p>
<p>Our contact details are as follows:</p>
<p>Telephone: +254 752 023 254</p>
<p>email: ozi@gmail.com</p>



{{--@component('mail::message')
  # Appointment created

  You have successfully created an appointment

  The details are as follows:
  Date: {{ $mailData['date'] }}
  Time: {{ $mailData['time'] }}
  Doctor: Dr. {{ $mailData['doctorName'] }}

  @component('mail::button', ['url' => $url])
    View Appointment
  @endcomponent

  Thanks,<br>
  {{ config('app.name') }}--}}

@endcomponent