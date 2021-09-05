<!DOCTYPE html
    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Demystifying Email Design</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- icon library for buttons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
</head>

<body style="margin: 0; padding: 0;">
    <table border="0" cellpadding="0" cellspacing="0" width="100%">
        <tr>
            <td style="padding: 10px 0 30px 0;">
                <table align="center" border="0" cellpadding="0" cellspacing="0" width="600"
                    style="border: 1px solid #cccccc; border-collapse: collapse;">
                    <tr>
                        <td align="center" bgcolor="white"
                            style="padding: 40px 0 30px 0; color: #153643; font-size: 28px; font-weight: bold; font-family: Arial, sans-serif;">
                            <img src="https://i.ibb.co/tKPLCSp/header.png" alt="Creating Email Magic" width="300"
                                height="230" style="display: block;" />
                        </td>
                    </tr>
                    <tr>
                        <td bgcolor="#ffffff" style="padding: 40px 30px 40px 30px;">
                            <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                <tr>
                                    @if ($booking->state_id == 1)
                                        <td style="color: #153643; font-family: Arial, sans-serif; font-size: 24px;">
                                            <b>Your booking has been confirmed</b>
                                            <b>Thank you for booking with us : {{ $booking->employee->first_name . " " .  $booking->employee->last_name }}</b>
                                        </td>
                                </tr>
                                <tr>
                                    <td
                                        style="padding: 20px 0 30px 0; color: #153643; font-family: Arial, sans-serif; font-size: 16px; line-height: 20px;">
                                        this document is the proof of Your booking confirmation.
                                        You will find all the information concerning your booking in
                                         <a href="http://127.0.0.1:8000/bookings/confirmed">lien</a>.
                                    </td>
                                    @endif

                                    @if ($booking->state_id == 2)
                                        <td style="color: #153643; font-family: Arial, sans-serif; font-size: 24px;">
                                            <b>Your booking has been canceled</b>
                                            <b>we are deeply sorry : {{ $booking->employee->first_name . " " . $booking->employee->last_name}}</b>
                                        </td>
                                </tr>
                                <tr>
                                    <td
                                        style="padding: 20px 0 30px 0; color: #153643; font-family: Arial, sans-serif; font-size: 16px; line-height: 20px;">
                                        here you will find all the information concerning your cancellation of
                                        booking in the <a
                                            href="http://127.0.0.1:8000/bookings/annuler">lien</a>.
                                    </td>
                                    @endif

                                    @if ($booking->state_id == 3)
                                        <td style="color: #153643; font-family: Arial, sans-serif; font-size: 24px;">
                                            <b>your reservation is being processed</b>
                                            <b>Thank you for bookings with us : {{ $booking->employee->first_name . " " . $booking->employee->last_name}}</b>
                                        </td>
                                </tr>
                                <tr>
                                    <td
                                        style="padding: 20px 0 30px 0; color: #153643; font-family: Arial, sans-serif; font-size: 16px; line-height: 20px;">
                                        your booking is being processed, you will be notified once
                                        the point-based selection will be executed.
                                        You will find all the information concerning your booking in
                                        le <a href="http://127.0.0.1:8000/bookings/encours">lien</a>.
                                    </td>
                                    @endif

                                </tr>
                                <tr>
                                    <td>
                                        <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                            <tr>

                                                <td style="font-size: 0; line-height: 0;" width="20">
                                                    &nbsp;
                                                </td>
                                                <td width="260" valign="top">
                                                    <table border="0" cellpadding="0" cellspacing="0" width="100%">


                                                    </table>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td bgcolor="#2f89fc" style="padding: 30px 30px 30px 30px;">
                            <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                <tr>
                                    <td style="color: #ffffff; font-family: Arial, sans-serif; font-size: 14px;"
                                        width="75%">
                                        Hébergement Vacances 2020 © all rights reserved &reg;<br />
                                    </td>
                                    <td align="right" width="25%">
                                        <table border="0" cellpadding="0" cellspacing="0">
                                            <tr>
                                                <td
                                                    style="font-family: Arial, sans-serif; font-size: 12px; font-weight: bold;">
                                                    <a href="" style="color: #ffffff;">
                                                        <span class="fa fa-twitter" aria-hidden="true"></span>
                                                    </a>
                                                </td>
                                                <td style="font-size: 0; line-height: 0;" width="20">&nbsp;</td>
                                                <td
                                                    style="font-family: Arial, sans-serif; font-size: 12px; font-weight: bold;">
                                                    <a href="" style="color: #ffffff;">
                                                        <span class="fa fa-facebook-f" aria-hidden="true"></span>
                                                    </a>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>

</html>
