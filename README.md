#Registration 

Here, user take a step forward to register themself.

1. Input field like lastname, firstname, email address, username, password and confirm password are kept.
2. Validation:
                For lastname and firstname where one cannot pass number, only letters are allowed. 
                The same username cannot be kept mutiple times.
                The correct format of email should be entered.Also, user cannot use a email address mutiple times. 
                The password and confirm password should match to get access. 
3. The password strength meter is kept where number should be 0 to 9, use of lowercase and Uppercase,atleast 8 character, and special character should be used. 
4. Using of google reCAPTCHA  to verify human or bot.
5. Multiple user can register from time to time. 
6. Their credentails will be kept safe at database using password encryption. 


#Login-System

I have created the login-System which is effective to work,secure and strong. 

1. Allow multiple user login
2. Get user password as hash password
3. Check user for the password expiration policy
4. Verifies user's password through database
5. Multi login system by username 
6. If user forgot password then otp is directly send to existing email address and one can change password through some procedure.  

A simple Login System:

User can register an account,  then in case of forget password, user need to give their email address which should be match on database. user will received a OTP code send by PHPMailer.

Once User's password gets expired, they can reset his/her password, user will received a new otp code in existing email address send by PHPMailer to reset his/her new password.

How to use this source code:
Requirement:

1) Install xampp
   Here is the link to install xampp: apachefriends.org/index.html

First step:

1) Download this repo
2) Create a folder name as wxyz -> extract to your xampp folder -> htdocs -> on folder wxyz
3) Go to phpmyadmin -> create database wxyz
4) Copy all the query command from login.sql  -> paste it under the database wxyz sql.
5) Copy the path of index.html -> paste the link -> before C:\xampp\htdocs\login-system-main\index.php ->
   modify to http://localhost:81/AdvanceCyberSecurity/index.php
6) Put on your email account which is use for sending out an email.
7) Modify the account and password under file -> ControllerUserData.php
8) Now you are ready to run your adavanced cyber security project !
9) Happy Coding 😁
