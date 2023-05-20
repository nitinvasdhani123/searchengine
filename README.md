Instructions to use this software
* ------------------------------------------------
-> Download xampp server to host the software locally
-> Setup the database and the mail configuration 
-> Download the project and paste to C:\xampp\htdocs\      
      then setup all the below process for successfully execution 
-> Read some file heading where you can change something to execute 
            forget.php
            signup.php



/*-------------- process 1 ---------------------------------------------------------------------*/
## Must download the xampp server first for locally hosting purpose
      Download from https://www.apachefriends.org/

# After installation the xampp
1. Start the apache server
2. Start the MYSQL server and the view the project
/*-----------------------------------------------------------------------------------*/



/*----------------- process 2 ------------------------------------------------------------------*/
## Must install the database into your system and create all the code according to the database file database.sql

/*-----------------------------------------------------------------------------------*/



/*------------------ process 3 -----------------------------------------------------------------*/
# Mail configuration
There are two steps to setup mail configuration
*Step 1
In C:\xampp\php\php.ini file find the mail function and comment all these lines and paste these

[mail function]
SMTP=smtp.gmail.com
smtp_port=465
sendmail_from = --- your company mail id those do you want to send email --
sendmail_path = "\"C:\xampp\sendmail\sendmail.exe\" -t"

*Step 2
In C:\xampp\sendmail\sendmail.ini
      *Check these lines and paste after comment the original line (comment with semicolon at stating the line)

[sendmail]
smtp_server=smtp.gmail.com
smtp_port=465
error_logfile=error.log
debug_logfile=debug.log
auth_username= -- your mail id
auth_password= your google generated app password  line 55
force_sender= -- your mail id


/*-----------------------------------------------------------------------------------*/

/*-----------------------------------------------------------------------------------*/
How to generate app password for xampp ?
step 1 -> Open the link https://myaccount.google.com/apppasswords 
step 2 -> select the app and device 
step 3 -> press Generate 
step 4 -> Copy the password
/*-----------------------------------------------------------------------------------*/

----------------------------------------------------------------------------------------
Now all the information available here during the project execution
step 1-> make database in phpmyadmin following details available in the database.sql file
step 2-> check the apache and mysql server are ON/Active otherwise the connection error or Page not found
step 3-> type in browser localhost/searchengine open the index.html and all the roots are given to access the search engine



Thank you !!
