





<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office">
<head>
    <meta charset="utf-8"> <!-- utf-8 works for most cases -->
    <meta name="viewport" content="width=device-width"> <!-- Forcing initial-scale shouldn't be necessary -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge"> <!-- Use the latest (edge) version of IE rendering engine -->
    <meta name="x-apple-disable-message-reformatting">  <!-- Disable auto-scale in iOS 10 Mail entirely -->
    <title></title> <!-- The title tag shows in email notifications, like Android 4.4. -->

    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700" rel="stylesheet">

    <!-- CSS Reset : BEGIN -->
    <style>

        /* What it does: Remove spaces around the email design added by some email clients. */
        /* Beware: It can remove the padding / margin and add a background color to the compose a reply window. */
        html,
body {
    margin: 0 auto !important;
    padding: 0 !important;
    height: 100% !important;
    width: 100% !important;
	font-family: 'Lato', sans-serif;
	font-weight: 400;
	font-size: 15px;
	line-height: 1.8;
	color: rgba(0,0,0,.4);
}

/* What it does: Stops email clients resizing small text. */
* {
    -ms-text-size-adjust: 100%;
    -webkit-text-size-adjust: 100%;
}

/* What it does: Centers email on Android 4.4 */
div[style*="margin: 16px 0"] {
    margin: 0 !important;
}

/* What it does: Stops Outlook from adding extra spacing to tables. */
table,
td {
    mso-table-lspace: 0pt !important;
    mso-table-rspace: 0pt !important;
}

/* What it does: Fixes webkit padding issue. */
table {
    border-spacing: 0 !important;
    border-collapse: collapse !important;
    table-layout: fixed !important;
    margin: 0 auto !important;
}

    </style>

    <!-- CSS Reset : END -->

    <!-- Progressive Enhancements : BEGIN -->
 <style>


h1,h2,h3,h4,h5,h6{
	font-family: sans-serif;
	color: #000000;
	margin-top: 0;
	font-weight: 400;
}



table{
}
/*LOGO*/

.logo h1{
	margin: 0;
}
.logo h1 a{
	color: #30e3ca;
	font-size: 24px;
	font-weight: 700;
	font-family: 'Lato', sans-serif;
}

.hero{
	position: relative;
	z-index: 0;
}
.text1{
	color:black;
	margin: 0 0;
}
.hero .text .login{
	margin-bottom: 20px;
}
.hero .text{
	color: black;
}

.hero .text p{
	margin-bottom: 0;
}

.section-title {
  margin: 0;
  margin: 0;
  font-size: 30px;
  font-weight: 700;
  text-transform: uppercase;
  font-family: "Poppins", sans-serif;
  color: #4689ac;
  line-height: 1;
  letter-spacing: 0.5px;
}
.password_a {
  background-color: #f44336;
  color: white;
  padding: 14px 25px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
}

a:hover, a:active {
  background-color: red;
}

    </style>


</head>

<body width="100%" style="margin: 0; padding: 0 !important; mso-line-height-rule: exactly;>
	<center style="width: 100%;">
    <div style="display: none; font-size: 1px;max-height: 0px; max-width: 0px; opacity: 0; overflow: hidden; mso-hide: all; font-family: sans-serif;">
      &zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;
    </div>
    <div style="max-width: 600px; margin: 0 auto; background-color: #f1f1f1;" class="email-container">
    	<!-- BEGIN BODY -->
      	
		<table align="left" role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%" style="margin: auto; background-color: #f1f1f1;">
			<tr>
				<td valign="start" class="hero bg_white" style="padding: 2em 0 4em 0;">
					<table>
                   

						<tr>
							<td>
								<div class="text" style="padding: 10px 2.5em;">
									<p>We've received a request to reset the password.
									</p>
								</div>
							</td>
						</tr>
						<tr>
							<td>
								<div class="text" style="padding: 0 2.5em;">
								<span class="login">Use the OTP below to set up a new password for your account.

                                       {{@$data1['otp']}}

                                    </span>
								</div>
							</td>
						</tr>
						
					
						<!-- <tr>
							<td>
								<div class="text" style="padding: 0 2.5em;">
									<p>Any query please feel free to ask.</p>
								</div>
							</td>
						</tr> -->
						 <tr>
							<td>
								<div class="text" style="padding: 10px 2.5em;">
									<span>Thank you</span>
								</div>
							</td>
						</tr> 
						 <tr>
							<td>
								<div class="text" style="padding: 0 2.5em;">
									<span>Regards</span>
								</div>
							</td>
						</tr> 
						<tr>
							<td>
								<div class="text" style="padding: 0 2.5em;">
									<span><strong>Foodapp</strong></span>
								</div>
							</td>
						</tr>
					</table>
				</td>
			</tr><!-- end tr -->
      		<!-- 1 Column Text + Button : END -->
      	</table>
          </td>
        </tr><!-- end: tr -->
      </table>

    </div>
  </center>
</body>
</html>
