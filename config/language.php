<?php

class Language {


	
}

// define(' ',' ');

define('CrazyTitle','Am Corn Fussed!');//


define('Emptyform',"Complete the form: You left something empty, too bad!");
define('NOmatch',"PAssword did not match");
define('Email_Exist', 'Email already chossen by someone else');
define('Reg_Success','Thank you for creating email with us.');
define('QueryFail','Sorry, there was an error, try again later: code: 00001a');// error code for mysql query fail
define('Wrong_pass','Wrong Username and password');
define('messageSent','Message Sent succesfully');
define('smtpfail','trouble sending mail');
define('LogonSuccess','chill, lets prepare your dashboard! <img src="CORDOVA/img/c_loader_gr.gif" />');
define('LogonSuccessExam','chill, lets prepare your Exam Hall! <img src="CORDOVA/img/c_loader_gr.gif" />');

define('MailBoxInactive','Your Account is not activated yet by admin');
define('MailBoxEmpty','your mailbox is empty, no new messages');
define('sqlEr','Er');// sql error, unknown colum or so



// create faculty
define(' ',' ');




// GET HELP FUNCTIONS
$ur = "haswokf_cf_chdhlowgrebscb";
define('ur',str_shuffle(substr($ur, mt_rand(0, (strlen($ur) - 12)), 12)));// a random string to handle the css classing
define('HelpTitle', 'Need Help?');// title to be used for each pop up help: can be made dynamic to show greetings
define('CreatingCategory','Warning: name is not changeable. For code enter eg: Electronic = elect, Education=edu (do not input numbers here). thanks ');
// creating faculty
define('InvalidDuration',"Duration must be a figure and cannot be more than 8");
define('QueriesFail',"Failed: ");
define('QueriesDone',"Success: Action completed!");

define('CategoryCreated',"Success: category created!");

// creating Attribute
define('CreatingAttribute','Warning: name cannot be changed, name eg = color');
define('CreatedAttr','Success: Atribute created! you may now add values!');
define('UsedAttr','Sorry, You cannot Delete this: delete the attribute sets first');
define('FacChange','Sorry, You cannot change departments Faculty, delete it instead');

define('CreatingAdmissionBatch','Create admission batch and students can start applying');

// logon section
define('ConnectionError','Connection Refused');// db connection, password, sb not found etc
define('TableError','Connection Refused');// table colum or table nt found or sql wrong


// creating auction
define('CreatingAuction','Auction name must differ. Entry Ammount: how much bidders must pay to participate in this auction. Short name: unique name with no space but short. Joining End Date: date at which user will stop joining/registering to participate in this auction');
define('StopInPast','Hmm, how can you STOP before you START Auction?(stop date cannot be lower than start date )');
define('CrazyDates','Hmm,  it seems like the zombie apocalypse is started, how can we be going back to the past dates and times');
define('StartInPast','Hmm, how can you START Auction in the past?(you start today, not in the past )');
define('InspectInPast','Hmm, Expection date cannot be in the past? (like in the movie )');
define('AuctionCreated','Congratulations! This auction has been created successfully, it is closed, it is marked as upcoming Auction, bidders cannot join yet. please go to upcoming auctions to enable it and add products');
define('JoinError',"Joining End Date is beyond Auction End date");



?>
