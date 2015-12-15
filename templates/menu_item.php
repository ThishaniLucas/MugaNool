<?php session_start(); ?>
<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1" style="width:94%;">
              <form class="navbar-form navbar-left" role="search" style="padding:0px;width:50%;">
                <div class="form-group" style="padding:0px;width:100%;">
                  <input type="text" class="form-control" placeholder="Search & Find Friends" style="padding:0px;width:90%;">
                  <button type="submit" class="btn btn-default" style=""><span class="glyphicon glyphicon-search"></span></button>
                </div>
              </form>
              
              <ul class="nav navbar-nav navbar-right">
              	<li><a href="#" title="Home"><span class="glyphicon glyphicon-home"></span></a></li>
                
                <li class="dropdown"><a href="#" title="friend requests" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-user"></span> &nbsp;<span class="badge" style="font-size:9px;margin-bottom:3px;" id="request_count">4</span></a>
                <ul class="dropdown-menu list-group" role="menu">
                   <div class="list-group">
                      <a href="#" class="list-group-item active">
                        Friend one
                      </a>
                      <a href="#" class="list-group-item"> Friend one</a>
                      <a href="#" class="list-group-item"> Friend one</a>
                      <a href="#" class="list-group-item"> Friend one</a>
                      <a href="#" class="list-group-item"> Friend one</a>
                    </div>
                  </ul>
                
                </li>
                
                <li class="dropdown"><a href="#" title="Messages" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-envelope"></span> &nbsp;<span class="badge" style="font-size:9px;margin-bottom:3px;" id="message_count">4</span></a>
                <ul class="dropdown-menu" role="menu">
                    <div class="list-group">
                      <a href="#" class="list-group-item active">
                        Friend one
                      </a>
                      <a href="#" class="list-group-item"> Friend one</a>
                      <a href="#" class="list-group-item"> Friend one</a>
                      <a href="#" class="list-group-item"> Friend one</a>
                      <a href="#" class="list-group-item"> Friend one</a>
                    </div>
                  </ul>
                
                </li>
                
                <li class="dropdown"><a href="#" title="notifications" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-bell"></span> &nbsp;<span class="badge" style="font-size:9px;margin-bottom:3px;" id="notification_count">4</span></a>
                <ul class="dropdown-menu" role="menu">
                   <div class="list-group">
                      <a href="#" class="list-group-item active">
                        Friend one
                      </a>
                      <a href="#" class="list-group-item"> Friend one</a>
                      <a href="#" class="list-group-item"> Friend one</a>
                      <a href="#" class="list-group-item"> Friend one</a>
                      <a href="#" class="list-group-item"> Friend one</a>
                    </div>
                  </ul>
                </li>
                
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" title="Profile	"><span class="caret"></span></a>
                  <ul class="dropdown-menu" role="menu">
                    <li id="profile_menu_right"><a href="http://localhost/SocialNetworkingApp/profile.php?u=<?php echo $_SESSION['user_logged']; ?>"><span class="glyphicon glyphicon-user" > Profile</a></li>
                     <li class="divider"></li>
                    <li><a href="#"><span class="glyphicon glyphicon-cog"> Settings</a></li>
                     <li class="divider"></li>
                     <li id="change_password_menu_right"><a href="http://localhost/SocialNetworkingApp/change_password.php"><span class="glyphicon glyphicon-lock"> Change_Password</a></li><li class="divider"></li>
                    <li id="logout_menu_right"><a href="http://localhost/SocialNetworkingApp/logout.php"><span class="glyphicon glyphicon-off"> Logout</a></li>
                  </ul>
                </li>
              </ul>
               </div>
          </div><!-- /.container-fluid -->
          </div>
        </nav>
    </header>
    
    <section id="my_section">
