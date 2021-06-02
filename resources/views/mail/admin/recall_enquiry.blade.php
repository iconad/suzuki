<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Zen Flat Invoice Email</title>
  <style type="text/css" media="screen">

    /* Force Hotmail to display emails at full width */
    .ExternalClass {
      display: block !important;
      width: 100%;
    }

    /* Force Hotmail to display normal line spacing */
    .ExternalClass,
    .ExternalClass p,
    .ExternalClass span,
    .ExternalClass font,
    .ExternalClass td,
    .ExternalClass div {
      line-height: 100%;
    }

    body,
    p,
    h1,
    h2,
    h3,
    h4,
    h5,
    h6 {
      margin: 0;
      padding: 0;
    }

    body,
    p,
    td {
      font-family: Arial, Helvetica, sans-serif;
      font-size: 15px;
      color: #333333;
      line-height: 1.5em;
    }

    h1 {
      font-size: 24px;
      font-weight: normal;
      line-height: 24px;
    }

    body,
    p {
      margin-bottom: 0;
      -webkit-text-size-adjust: none;
      -ms-text-size-adjust: none;
    }

    img {
      line-height: 100%;
      outline: none;
      text-decoration: none;
      -ms-interpolation-mode: bicubic;
    }

    a img {
      border: none;
    }

    .background {
      background-color: #333333;
    }

    table.background {
      margin: 0;
      padding: 0;
      width: 100% !important;
    }

    .block-img {
      display: block;
      line-height: 0;
    }

    a {
      color: white;
      text-decoration: none;
    }

    a,
    a:link {
      color: #2A5DB0;
      text-decoration: underline;
    }

    table td {
      border-collapse: collapse;
    }

    td {
      vertical-align: top;
      text-align: left;
    }

    .wrap {
      width: 600px;
    }

    .wrap-cell {
      padding-top: 30px;
      padding-bottom: 30px;
    }

    .header-cell,
    .body-cell,
    .footer-cell {
      padding-left: 20px;
      padding-right: 20px;
    }

    .header-cell {
      background-color: #eeeeee;
      font-size: 24px;
      color: #ffffff;
    }

    .body-cell {
      background-color: #ffffff;
      padding-top: 30px;
      padding-bottom: 34px;
    }

    .footer-cell {
      background-color: #eeeeee;
      text-align: center;
      font-size: 13px;
      padding-top: 30px;
      padding-bottom: 30px;
    }

    .card {
      width: 400px;
      margin: 0 auto;
    }

    .data-heading {
      text-align: right;
      padding: 10px;
      background-color: #ffffff;
      font-weight: bold;
    }

    .data-value {
      text-align: left;
      padding: 10px;
      background-color: #ffffff;
    }

    .force-full-width {
      width: 100% !important;
    }

  </style>
  <style type="text/css" media="only screen and (max-width: 600px)">
    @media only screen and (max-width: 600px) {
      body[class*="background"],
      table[class*="background"],
      td[class*="background"] {
        background: #eeeeee !important;
      }

      table[class="card"] {
        width: auto !important;
      }

      td[class="data-heading"],
      td[class="data-value"] {
        display: block !important;
      }

      td[class="data-heading"] {
        text-align: left !important;
        padding: 10px 10px 0;
      }

      table[class="wrap"] {
        width: 100% !important;
      }

      td[class="wrap-cell"] {
        padding-top: 0 !important;
        padding-bottom: 0 !important;
      }
    }
  </style>
</head>

<body leftmargin="0" marginwidth="0" topmargin="0" marginheight="0" offset="0" bgcolor="" class="background">
<table class="background" border="0" width="100%" cellspacing="0" cellpadding="0" align="center">
<tbody>
<tr>
<td class="background" align="center" valign="top" width="100%"><center>
<table class="wrap" width="600" cellspacing="0" cellpadding="0">
<tbody>
<tr>
<td class="wrap-cell" style="padding-top: 30px; padding-bottom: 30px;" valign="top">
<table class="force-full-width" cellspacing="0" cellpadding="0">
<tbody>
<tr>
<td class="header-cell" valign="top"><img src="https://suzuki.ae/assets/logo.png" alt="logo" width="196" height="60" /></td>
</tr>
<tr>
<td class="body-cell" valign="top">
<table style="height: 318px; width: 100%;" width="100%" cellspacing="0" cellpadding="0" bgcolor="#ffffff">
<tbody>
<tr style="height: 66px;">
<td style="padding-bottom: 20px; background-color: #ffffff; height: 66px;" valign="top">Hello Team,<br /><br />A new user submitted enquiry regarding the recall check on your vehicle “car” “year”.</td>
</tr>
<tr style="height: 208px;">
<td style="height: 208px;">
<table width="100%" cellspacing="0" cellpadding="0" bgcolor="#ffffff">
<tbody>
<tr>
<td style="padding: 20px 0;" align="center"><center>
<table class="card" cellspacing="0" cellpadding="0">
<tbody>
<tr>
<td style="background-color: gray; text-align: center; padding: 10px; color: white;">Information</td>
</tr>
<tr>
<td style="border: 1px solid green;">
<table width="100%" cellspacing="0" cellpadding="20">
<tbody>
<tr>
<td>
<table width="100%" cellspacing="0" cellpadding="0" bgcolor="#ffffff">
<tbody>
    <tr>
        <td class="data-heading" width="150">Name</td>
        <td class="data-value">{{$name}}</td>
    </tr>
    <tr>
        <td class="data-heading" width="150">Email</td>
        <td class="data-value">{{$email}}</td>
    </tr>
    <tr>
        <td class="data-heading" width="150">Phone</td>
        <td class="data-value">{{$mobile}}</td>
    </tr>
    <tr>
        <td class="data-heading" width="150">Chassis</td>
        <td class="data-value">{{$chassis}}</td>
    </tr>
    <tr>
        <td class="data-heading" width="150">Registration No</td>
        <td class="data-value">{{$registration}}</td>
    </tr>
    <tr>
        <td class="data-heading" width="150">Model</td>
        <td class="data-value">{{$model}}</td>
    </tr>
    <tr>
        <td class="data-heading" width="150">Year</td>
        <td class="data-value">{{$year}}</td>
    </tr>
</tbody>
</table>
</td>
</tr>
</tbody>
</table>
</td>
</tr>
</tbody>
</table>
</center></td>
</tr>
</tbody>
</table>
</td>
</tr>
<tr style="height: 44px;">
<td style="padding-top: 20px; background-color: #ffffff; height: 44px;">See you soon!<br />Your Awesome Co team</td>
</tr>
</tbody>
</table>
</td>
</tr>
<tr>
<td class="footer-cell" valign="top">
    <a href="https://suzuki.ae">Click here to unsubscribe if you no longer want our emails</a>
</td>
</tr>
</tbody>
</table>
</td>
</tr>
</tbody>
</table>
</center></td>
</tr>
</tbody>
</table>
</body>
</html>
