<?php 
$message = new Helen();
$tool = new Helen();

//$adminid = AdminID;

// gettingthe admin mails
//$unread = $message->MYCount("SELECT COUNT(subject) AS num FROM `core_emails` WHERE `read`='0' AND `to_user` = '$adminid'");
//$unread_query = "SELECT * FROM `core_emails` WHERE `read`='0' AND `to_user` = '$adminid' ORDER BY id DESC LIMIT 7";
//$sent_query = "SELECT * FROM `core_emails` WHERE `read`='0' AND `from_user` = '$adminid' ORDER BY id DESC LIMIT 7";


?> 


 <div class="dropdown dropdown-notification messages">
	                        <a href="?Tera=Emails"
	                           class="header-alarm dropdown-toggle active"
	                           id="dd-messages"
	                           data-toggle="dropdown"
	                           aria-haspopup="true"
	                           aria-expanded="false">
	                           <i class="font-icon-mail">&nbsp;<span class="label label-pill" style="position:fixed;top:18px; right:130px"><?php //echo $unread;?></span></i>

	                        </a>
	                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-messages" aria-labelledby="dd-messages">
	                            <div class="dropdown-menu-messages-header">
	                                <ul class="nav" role="tablist">
	                                    <li class="nav-item">
	                                        <a class="nav-link active"
	                                           data-toggle="tab"
	                                           href="#tab-incoming"
	                                           role="tab">
	                                            Inbox
	                                            <span class="label label-pill label-danger"><?php //echo $unread;?></span>
	                                        </a>
	                                    </li>
	                                    <li class="nav-item">
	                                        <a class="nav-link"
	                                           data-toggle="tab"
	                                           href="#tab-outgoing"
	                                           role="tab">Outbox</a>
	                                    </li>
	                                </ul>
	                                <!--<button type="button" class="create">
	                                    <i class="font-icon font-icon-pen-square"></i>
	                                </button>-->
	                            </div>
	                            <div class="tab-content">
	                               
								   <div class="tab-pane active" id="tab-incoming" role="tabpanel">
	                                    <div class="dropdown-menu-messages-list">
	                                      <?php 
										  try{
										  $stmtmail = $pdo->prepare($unread_query);
                                          $stmtmail->execute();
                                          while($mails = $stmtmail->fetch(PDO::FETCH_ASSOC)){
											   $uid= $mails['from_user']; 
											   $sendertype= $mails['sender'];
											   $sendertype = $tool->dbstr('name','static_email_sender',"id = '$sendertype'");										 

											   if($mails['sender']==1){// bidders
												 $name = $tool->dbstr('bi_fname','web_bidders',"id = '$uid'").' ';										 
			                                     $name .= $tool->dbstr('bi_lname','web_bidders',"id = '$uid'");
                                                 $image_url = $tool->dbstr('bi_image_url','web_bidders',"id = '$uid'");
                                                  if(empty($image_url)){$image_url=avater;}
											   }elseif($mails['sender']==2 || 3){// auctioners or Admin
												 $name = $tool->dbstr('fname','web_users',"web_users_id = '$uid'").' ';										 
			                                     $name .= $tool->dbstr('lname','web_users',"web_users_id = '$uid'");
                                                 $image_url = $tool->dbstr('image_url','web_users',"web_users_id = '$uid'");
                                                  if(empty($image_url)){$image_url=avater;}  
											   }elseif($mails['sender']==4){// HyperTera
												  $name = $mails['name'];
                                                 $image_url =$image_url=htnlogo;  
											   
											   }else{
												 $name = 'Uknown';
                                                 $image_url =$image_url=htnlogo;  
											     
											   }
											  ?>

										 
										  
										  
											<a href="#" class="mess-item">
	                                            <span class="avatar-preview avatar-preview-32"><img src="<?php echo $image_url;?>" alt="image"></span>
	                                            <span class="mess-item-name"><?php echo $name;?>(<?php echo $sendertype;?>)</span>
	                                            <span class="mess-item-txt"><?php echo $mails['subject'];?> </span>
	                                        </a>
										  <?php }
										  }catch (Exception $e) { echo "Error: " . $e->getMessage();}
                                          ?>
										 
										 
										 
	                                    </div>
	                                </div>
									
									
									
									
	                                <div class="tab-pane" id="tab-outgoing" role="tabpanel">
	                                    <div class="dropdown-menu-messages-list">
	                                        <a href="#" class="mess-item">
	                                            <span class="avatar-preview avatar-preview-32"><img src="../CORDOVA/img/avatar-2-64.png" alt=""></span>
	                                            <span class="mess-item-name">Sunny Oko(Public)</span>
	                                            <span class="mess-item-txt">what do you mean bodered, are you sick?..</span>
	                                        </a>
	                                      
	                                    </div>
	                                </div>
	                            </div>
	                            <div class="dropdown-menu-notif-more">
	                                <a href="?Tera=Emails">See more</a>
	                            </div>
	                        </div>
	                    </div>
	