@extends('emails.layout.master')
 @section ('content')
 <tbody>
    <tr>
        <td style="font-size:0;padding:30px 30px 18px;" align="left">
            <div class="mj-content" style="cursor:auto;color:#000000;font-family:Proxima Nova, Arial, Arial, Helvetica, sans-serif;font-size:24px;line-height:22px;">Sponsor Bonus {{$data['percentage']}}% Received!!</div>
        </td>
    </tr>
    <tr>
        <td style="font-size:0;padding:0 30px 16px;" align="left">
            <div class="mj-content" style="cursor:auto;color:#000000;font-family:Proxima Nova, Arial, Arial, Helvetica, sans-serif;font-size:15px;line-height:22px;">Dear <b>{{$data['sponsor_name']}}</b></div>
        </td>
    </tr>
   
    <tr>
        <td style="font-size:0;padding:0 30px 16px;" align="left">
            <div class="mj-content" style="cursor:auto;color:#000000;font-family:Proxima Nova, Arial, Arial, Helvetica, sans-serif;font-size:15px;line-height:22px;">
              @if($data['type'] == 'direct-sponsor')
                <p>
                  Your referral <b>{{$data['referral_name']}}</b> has just purchased package {{$data['package_price']}} USD. <br />
                  You got 20% ({{ 0.2*$data['package_price']}} USD) of that. <br />
                  Please check your account for more detail.
                </p>
              @endif

              @if($data['type'] == 'dual-team')
                <p>
                 
                  You got 11% ({{0.11*$data['package_price']}} USD) of {{$data['package_price']}}. <br />
                  Please check your account for more detail.
                </p>
              @endif

          </div>
        </td>
    </tr>
     <tr>
        <td style="font-size:0;padding:0 30px 16px;" align="left">
            <div class="mj-content" style="cursor:auto;color:#000000;font-family:Proxima Nova, Arial, Arial, Helvetica, sans-serif;font-size:15px;line-height:22px;">Best Regards, <br /> <b>Richy Support Team</b></div>
        </td>
    </tr>
   
</tbody>
@endsection