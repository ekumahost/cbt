
	                    <div class="dropdown user-menu">
	                        <button class="dropdown-toggle" id="dd-user-menu" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img src="<?php
                                $admin__id = $_SESSION['StaffID'];
                                $image_url = $tool->dbstr($col="staff_image",$table="staff",$_sql="`staff_id` = '$admin__id'");
                                echo image_lead.$image_url;?>" width="35" height="35" alt="img">
	                        </button>
	                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dd-user-menu">
	                            <a class="dropdown-item" href="#"><img src="<?php
                                    echo image_lead.$image_url;?>" width="35" height="35" alt="img">
                                    Profile</a>
	                            <a class="dropdown-item" href="#"><span class="font-icon glyphicon glyphicon-cog"></span>Settings</a>
	                            <a class="dropdown-item" href="#"><span class="font-icon glyphicon glyphicon-question-sign"></span>Help</a>
	                           
							   <div class="dropdown-divider"></div>
							 <a class="dropdown-item" href="?Tera=SLEEP"><span class="font-icon glyphicon glyphicon-log-out"></span>Sleep</a>

	                            <a class="dropdown-item" href="../logout.cbt"><span class="font-icon glyphicon glyphicon-log-out"></span>Logout</a>
	                        </div>
	                    </div>
	
	                    <button type="button" class="burger-right">
	                        <i class="font-icon-menu-addl"></i>
	                    </button>