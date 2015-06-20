<html>
<head>
   <title> Google Authenticator </title>
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <meta name="author" name="iStorry">
   <link type="text/css" rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.4/css/bootstrap.min.css" />
    <style>
        * {
            -webkit-user-select: none;
            -khtml-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }
        
        input {
            -webkit-user-select: auto !important;
            -khtml-user-select: auto !important;
            -moz-user-select: auto !important;
            -ms-user-select: auto !important;
            user-select: auto !important;
        }
        
        * {
            -webkit-touch-callout: none;
            -moz-touch-callout: none;
            -ms-touch-callout: none;
            touch-callout: none;
        }
        
        * {
            -webkit-user-drag: none;
            -moz-user-drag: none;
            -ms-user-drag: none;
            user-drag: none;
        }
        
        body {
            font-family: 'Courier New';
            font-size: small;
            font-style: normal;
            padding-top: 100px;
            padding-bottom: 100px;
            overflow: hidden;
            text-align: center;
        }
        
        .main-swift {
            max-width: 330px;
            padding: 15px;
            margin: 0 auto;
        }
        
        .main-input {
            display: block;
            padding: 9.5px;
            margin: 0 0 10px;
            font-size: 13px;
            line-height: 1.42857143;
            word-break: break-all;
            word-wrap: break-word;
            border: 1px solid #ccc;
            border-radius: 4px;
            width: 300px;
        }
        
        .main-input-button {
            display: block;
            padding: 9.5px;
            margin: 0 0 10px;
            font-size: 13px;
            line-height: 1.42857143;
            word-break: break-all;
            word-wrap: break-word;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        
        .main-news {
            padding: 9.5px;
        }
        
        p {
            text-align: center;
            font-size: 14px;
        }
        
        span {
            color: red;
        }
        
        .main-button {
            width: 300px;
            padding: 9.5px;
        }
        
        .main-input:focus {
            z-index: 2;
        }
        
        .main-input input[type="number"] {
            margin-bottom: -1px;
            border-bottom-right-radius: 0;
            border-bottom-left-radius: 0;
        }
        
        .main-input input[type="text"] {
            margin-bottom: 10px;
            border-top-left-radius: 0;
            border-top-right-radius: 0;
        }
        
        .main-box {
            display: block;
            padding: 9.5px;
            margin: 0 0 10px;
            font-size: 13px;
            line-height: 1.42857143;
            color: #333;
            word-break: break-all;
            word-wrap: break-word;
            background-color: #f5f5f5;
            border: 1px solid #ccc;
            border-radius: 4px;
            text-align: center;
        }
        
        .xx {
            display: block;
            margin-left: auto;
            margin-right: auto
        }
        
        .spinner {
            width: 40px;
            height: 40px;
            margin: 100px auto;
        }
        
        .double-bounce1,
        .double-bounce2 {
            width: 100%;
            height: 100%;
            border-radius: 50%;
            background-color: #ed5565;
            opacity: 0.6;
            position: absolute;
            top: 0;
            left: 0;
            -webkit-animation: bounce 2.0s infinite ease-in-out;
            animation: bounce 2.0s infinite ease-in-out;
        }
        
        .double-bounce2 {
            -webkit-animation-delay: -1.0s;
            animation-delay: -1.0s;
        }
        
        @-webkit-keyframes bounce {
            0%, 100% {
                -webkit-transform: scale(0.0)
            }
            50% {
                -webkit-transform: scale(1.0)
            }
        }
        
        @keyframes bounce {
            0%, 100% {
                transform: scale(0.0);
                -webkit-transform: scale(0.0);
            }
            50% {
                transform: scale(1.0);
                -webkit-transform: scale(1.0);
            }
        }
        
        .break {
            padding-top: 200%;
        }
        
        .submit {
            width: 100%;
            height: 100%;
            text-align: center;
            margin: 0 auto;
        }
        .image {
        	padding-bottom: 3%;
        }
    </style>
</head>
<?php
include dirname(__FILE__) . '/class.authenticator.php';
$auth = new Authenticator();
$secret = $auth->generateSecret();
$img = $auth->getURL('Test',$secret);
?>
    <body>
    	<div class="main-swift">
    	<div class="main-box">  Google Authenticator Example </div>
        <form method="POST">
        		<img src="<?php echo $auth->getURL('Test',$secret); ?>" alt="Google Authenticator" alt="Google" class="image">
        		<input type="text" name="secret" class="main-input" value="<?php echo $secret; ?>" readonly>
        		<input type="text" name="opt" class="main-input" placeholder="6 Digit Code">
        	<div class="main-button">
            	<button type="submit" class=" btn btn btn-primary btn-block"> Check Code  </button>
        	</div>
        </form>
    </body>
</html>
<?php
  if(isset($_POST['opt'])){
      if ($auth->checkOTP($_POST['secret'],$_POST['opt'])) {
        print('<script> alert("Code Valid !"); </script>');
  }else{
        print('<script> alert("Code Invalid !"); </script>');
  }
}
?>
