<?php
	include "config.php";
	
	// read JSon input
	$data_back = json_decode(file_get_contents('php://input'));
 
	$details;
	
	if(isset($_POST['firstname']) && isset($_POST['lastname']) && isset($_POST['email']) && isset($_POST['contact']) && isset($_POST['password']))
	{
		if(!empty($_POST['firstname']) && !empty($_POST['lastname']) && !empty($_POST['email']) && !empty($_POST['contact']) && !empty($_POST['password']))
		{
			$customer_name = $_POST['firstname'];
			$customer_last_name = $_POST['lastname'];
			$customer_email = $_POST['email'];
			$customer_contact = $_POST['contact'];
			$customer_password = md5($_POST['password']);
			
			$query = "select customer_name,customer_last_name,customer_email,customer_contact,customer_password from customers where customer_email = '".$customer_email."'";
			$stm = $conn->prepare($query);
			if ($stm)
			{
			    $stm->execute();
        		$stm->bind_result($customer_name,$customer_last_name,$customer_email,$customer_contact,$customer_password);
        		$stm->store_result();
        		$count1=$stm->num_rows;
        		
        		if($count1!=0)
        		{
        		    $details = array('status'=>"2",'message'=>"Alredy you are Register... Please Login...");
        		}
        		else
        		{
        		    $q_dp="insert into customers(customer_name,customer_last_name,customer_email,customer_contact,customer_password) values(?,?,?,?,?)";
        			$stdp=$conn->prepare($q_dp);
        			
        			if($stdp)
        			{
        				$stdp->bind_param('sssss',$customer_name,$customer_last_name,$customer_email,$customer_contact,$customer_password);
        				$stdp->execute();
        				$i_id=$stdp->insert_id;
        				$details = array('status'=>"1",'message'=>"Your Registration has been Successfully... Please Login..", 'id'=>$i_id);
        				
        				require "../phpmailer/PHPMailerAutoload.php";
        $mail = new PHPMailer;
        $mail->Host = 'smtp.gmail.com';     //Sets the SMTP hosts of your Email hosting, this for Godaddy
        $mail->Port = 587;                              //Sets the default SMTP server port
        $mail->SMTPAuth = true;                         //Sets SMTP authentication. Utilizes the Username and Password variables
        $mail->SMTPSecure='tls';
        $mail->Username = 'info@devkidswonder.com';                  //Sets SMTP username
        $mail->Password = 'DKV@1995';                        //Sets connection prefix. Options are "", "ssl" or "tls"
        $mail->setFrom('info@devkidswonder.com','Dev Kids Wonder'); //Sets the From name of the message
        $mail->addAddress($customer_email);      //Adds a "To" address
        
                                    //Sets word wrapping on the body of the message to a given number of characters
        $mail->isHTML(true);                            //Sets message type to HTML  
        // $mail->AddAttachment($path, '', $encoding = 'base64', $type = 'application/pdf');
        // $pdf->Output("","F");
        $mail->Subject = 'WELCOME TO DEV KIDS WONDER';               //Sets the Subject of the message
        $mail->Body = '<!doctype html>
<html>
  <head>
    <meta name="viewport" content="width=device-width" />
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Invoice for item(s) from your order '.$order_number.'</title>
    <style>
      /* -------------------------------------
          GLOBAL RESETS
      ------------------------------------- */
      
      /*All the styling goes here*/
      
      img {
        border: none;
        -ms-interpolation-mode: bicubic;
        max-width: 100%; 
      }

      body {
        background-color: #f6f6f6;
        font-family: sans-serif;
        -webkit-font-smoothing: antialiased;
        font-size: 14px;
        line-height: 1.4;
        margin: 0;
        padding: 0;
        -ms-text-size-adjust: 100%;
        -webkit-text-size-adjust: 100%; 
      }

      table {
        border-collapse: separate;
        mso-table-lspace: 0pt;
        mso-table-rspace: 0pt;
        width: 100%; }
        table td {
          font-family: sans-serif;
          font-size: 14px;
          vertical-align: top; 
      }

      /* -------------------------------------
          BODY & CONTAINER
      ------------------------------------- */

      .body {
        background-color: #f6f6f6;
        width: 100%; 
      }

      /* Set a max-width, and make it display as block so it will automatically stretch to that width, but will also shrink down on a phone or something */
      .container {
        display: block;
        margin: 0 auto !important;
        /* makes it centered */
        max-width: 580px;
        padding: 10px;
        width: 580px; 
      }

      /* This should also be a block element, so that it will fill 100% of the .container */
      .content {
        box-sizing: border-box;
        display: block;
        margin: 0 auto;
        max-width: 580px;
        padding: 10px; 
      }

      /* -------------------------------------
          HEADER, FOOTER, MAIN
      ------------------------------------- */
      .main {
        background-image: linear-gradient(to right top, #fdd4db, #f8d2e4, #eed2ee, #dfd4f6, #cdd6fb);
        border-radius: 3px;
        width: 100%; 
        text-align: justify;
      }

      .wrapper {
        box-sizing: border-box;
        padding: 20px; 
      }

      .content-block {
        padding-bottom: 10px;
        padding-top: 10px;
      }

      .footer {
        clear: both;
        margin-top: 10px;
        text-align: center;
        width: 100%; 
      }
        .footer td,
        .footer p,
        .footer span,
        .footer a {
          color: #999999;
          font-size: 12px;
          text-align: center;
      }

      /* -------------------------------------
          TYPOGRAPHY
      ------------------------------------- */
      h1,
      h2,
      h3,
      h4 {
        color: #38447b;
        font-family: sans-serif;
        font-weight: 550;
        line-height: 1.4;
        margin: 0;
        margin-bottom: 30px; 
        text-align: center;
        text-shadow: 4px 2px 10px rgba(0,0,0,0.3);
      }

      h1 {
        font-size: 35px;
        font-weight: 300;
        text-align: center;
        text-transform: capitalize; 
      }

      p,
      ul,
      ol {
        font-family: sans-serif;
        font-size: 14px;
        font-weight: normal;
        margin: 0;
        margin-bottom: 15px; 
      }
        p li,
        ul li,
        ol li {
          list-style-position: inside;
          margin-left: 5px; 
      }

      a {
        color: #e53252;
        text-decoration: underline; 
        cursor:pointer;
      }

      /* -------------------------------------
          BUTTONS
      ------------------------------------- */
      .btn {
        box-sizing: border-box;
        width: 100%; }
        .btn > tbody > tr > td {
          padding-bottom: 15px; }
        .btn table {
          width: auto; 
      }
        .btn table td {
          background-color: #ffffff;
          border-radius: 5px;
          text-align: center; 
      }
        .btn a {
          background-color: #ffffff;
          border: solid 1px #e53252;
          border-radius: 5px;
          box-sizing: border-box;
          color: #e53252;
          cursor: pointer;
          display: inline-block;
          font-size: 14px;
          font-weight: bold;
          margin: 0;
          padding: 12px 25px;
          text-decoration: none;
          text-transform: capitalize; 
      }

      .btn-primary table td {
        background-color: #e53252; 
      }

      .btn-primary a {
        background-color: #e53252;
        border-color: #e53252;
        color: #ffffff; 
        cursor:pointer;
      }

      /* -------------------------------------
          OTHER STYLES THAT MIGHT BE USEFUL
      ------------------------------------- */
      .last {
        margin-bottom: 0; 
      }

      .first {
        margin-top: 0; 
      }

      .align-center {
        text-align: center; 
      }

      .align-right {
        text-align: right; 
      }

      .align-left {
        text-align: left; 
      }

      .clear {
        clear: both; 
      }

      .mt0 {
        margin-top: 0; 
      }

      .mb0 {
        margin-bottom: 0; 
      }

      .preheader {
        color: transparent;
        display: none;
        height: 0;
        max-height: 0;
        max-width: 0;
        opacity: 0;
        overflow: hidden;
        mso-hide: all;
        visibility: hidden;
        width: 0; 
      }

      .powered-by a {
        text-decoration: none; 
      }

      hr {
        border: 0;
        border-bottom: 1px solid #f6f6f6;
        margin: 20px 0; 
      }

      /* -------------------------------------
          RESPONSIVE AND MOBILE FRIENDLY STYLES
      ------------------------------------- */
      @media only screen and (max-width: 620px) {
        table[class=body] h1 {
          font-size: 28px !important;
          margin-bottom: 10px !important; 
        }
        table[class=body] p,
        table[class=body] ul,
        table[class=body] ol,
        table[class=body] td,
        table[class=body] span,
        table[class=body] a {
          font-size: 16px !important; 
        }
        table[class=body] .wrapper,
        table[class=body] .article {
          padding: 10px !important; 
        }
        table[class=body] .content {
          padding: 0 !important; 
        }
        table[class=body] .container {
          padding: 0 !important;
          width: 100% !important; 
        }
        table[class=body] .main {
          border-left-width: 0 !important;
          border-radius: 0 !important;
          border-right-width: 0 !important; 
        }
        table[class=body] .btn table {
          width: 100% !important; 
        }
        table[class=body] .btn a {
          width: 100% !important; 
        }
        table[class=body] .img-responsive {
          height: auto !important;
          max-width: 100% !important;
          width: auto !important; 
        }
      }

      /* -------------------------------------
          PRESERVE THESE STYLES IN THE HEAD
      ------------------------------------- */
      @media all {
        .ExternalClass {
          width: 100%; 
        }
        .ExternalClass,
        .ExternalClass p,
        .ExternalClass span,
        .ExternalClass font,
        .ExternalClass td,
        .ExternalClass div {
          line-height: 100%; 
        }
        .apple-link a {
          color: inherit !important;
          font-family: inherit !important;
          font-size: inherit !important;
          font-weight: inherit !important;
          line-height: inherit !important;
          text-decoration: none !important; 
        }
        .btn-primary table td:hover {
          background-color: #34495e !important; 
        }
        .btn-primary a:hover {
          background-color: #34495e !important;
          border-color: #34495e !important; 
        } 
      }
      .bg_blue{
        padding-top: 20px;
        background-color: #1B9BA3;
      }
      img{
        padding: 10px;
      }
    </style>
  </head>
  <body class="">
    
    <table role="presentation" border="0" cellpadding="0" cellspacing="0" class="body">
      <tr>
        <td>&nbsp;</td>
        <td class="container">
          <div class="content">

            <!-- START CENTERED WHITE CONTAINER -->
            <table role="presentation" class="main">

              <!-- START MAIN CONTENT AREA -->
              <tr>
                <td class="wrapper">
                  <table role="presentation" border="0" cellpadding="0" cellspacing="0">
                    <tr>
                      <div align="center"><img src="http://devkidswonder.com/images/logo.png" width="20%"></div>
                    </tr>
                    <tr>
                      <td>
                        <h2>WELCOME TO DEV KIDS WONDER</h2>
                        
                        <table role="presentation" border="0" cellpadding="0" cellspacing="0" class="btn btn-primary">
                          <tbody>
                            <tr>
                              <td align="center">
                                <table role="presentation" border="0" cellpadding="0" cellspacing="0">
                                  <tbody>
                                    <tr>
                                      <td><a href="http://devkidswonder.com/" target="_blank">Visit Site</a> </td>
                                    </tr>
                                  </tbody>
                                </table>
                              </td>
                            </tr>
                          </tbody>
                        </table>
                        
                      </td>
                    </tr>
                  </table>
                </td>
              </tr>

            <!-- END MAIN CONTENT AREA -->
            </table>
            <!-- END CENTERED WHITE CONTAINER -->

            <!-- START FOOTER -->
            <div class="footer">
              <table role="presentation" border="0" cellpadding="0" cellspacing="0">
                <tr>
                  <td class="content-block">
                    <span class="apple-link">A-117 TO A-124, FIRST FLOOR SWAGAT RAINFOREST 2, OPP. SWAMINARAYAN DHAM, KUDASAN, GANDHINAGAR 382421.<br>
+91 8000247321</span>
                    
                  </td>
                </tr>
                
              </table>
            </div>
            <!-- END FOOTER -->

          </div>
        </td>
        <td>&nbsp;</td>
      </tr>
    </table>
  </body>
</html>
';
$mail->send();
            
        			}
        		}
			}
			else 
        	{
        		$details = array('status'=>"0",'message'=>"connection error exist");
        	}
		}
		else
			$details = array('status'=>"0",'message'=>"Parameter is Empty");
	}
	else
		$details = array('status'=>"0",'message'=>"parameter missing");
	
	echo json_encode($details);
	
	$conn->close();
?>