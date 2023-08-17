<x-mail::message>
# Welcome My ecommerce {{ $details['name'] }}
# Thank u
Name :{{ $details['name'] }}<br>
Email :{{ $details['email'] }}<br>
Phone :{{ $details['phone'] }}<br>
This gift for u.Please tell me how sweet this!<br>
<img src="{{asset('https://i.postimg.cc/nrB3pdXM/images.jpg')}}" style="width:30%" alt="App Logo">
<x-mail::table>
| Name       | Email         | Phone  |
| ------------- |:-------------:| --------:|
|{{ $details['name'] }}| {{ $details['email'] }} | {{ $details['phone'] }}   |

</x-mail::table>
<x-mail::button :url="('https://www.facebook.com/')" color="success">
Click me
</x-mail::button>
{{-- <x-mail::panel>
This is the panel content.
</x-mail::panel> --}}
Thanks,<br>
{{ config('app.name') }}
</x-mail::message>