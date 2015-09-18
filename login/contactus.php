 <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,300,600' rel='stylesheet' type='text/css'>
  <script src="js/jquery.js"></script>
  <script src="js/script.js"></script>
  
  <!-- CSS code for IE Browser -->
  <!--[if lt IE 10]>
    <link href="css/form-style-ie.css" rel="stylesheet" type="text/css" />  
  <![endif]-->
  
    <!-- If you don't want a logo, delete all of these code -->
   
    <!-- Till here -->
    
    <div class='form'>
      <h1>تماس با ما</h1>
      <div class='line'></div>
      
      
      
      <form name="registration-form" class='input-form' id='registration-form' method='POST' action=''>
        <span class='ie-placeholders'>:نام 
        <input type='text' name='ipt-email' placeholder='' id='ipt-email2' />
        </span>
        <div id="login_repeat" class="equal"></div>
        <span class='ie-placeholders'>ایمیل </span>
        <input type='text' name='email' placeholder='' id='ipt-email' />
        <span class='ie-placeholders'><div id="equal" class="equal"></div><div id="equal2" class="equal"></div></span><div id="equal1" class="equal"></div><br />
        <span class='ie-placeholders'>پیام خود را وارد نمایید</span>
        <div id="ghavanin" class="equal"></div><div id="over_flow" class="over_flow">
          <label for="textarea"></label>
          <textarea name="textarea" id="textarea" cols="45" rows="5"></textarea>
        </div>
        <input type='submit' class='btn-register btn-orange' onclick="return check_f_all();" name="send" value='ارسال' id="send" />
        <input type="hidden" name="MM_insert" value="registration-form" />
      </form>
      
    <!-- ERROR STATE --></div>
    
 