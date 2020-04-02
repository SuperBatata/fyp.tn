
<?php
    session_start();
    require_once 'includes/functions.php';
    client_only();
?>

<?php require_once 'header.php'; ?>

<div class="container">
    <div class="row profile">
		<div class="col-md-3">
			<div class="profile-sidebar">
				<!-- SIDEBAR USERPIC -->
				<div class="profile-userpic">
					<img src="../src/user.png" class="img-responsive" alt="">
				</div>
				<!-- END SIDEBAR USERPIC -->
				<!-- SIDEBAR USER TITLE -->
				<div class="profile-usertitle">
					<div class="profile-usertitle-name">
						prenom nom
					</div>
					<div class="profile-usertitle-job">
						username
					</div>
				</div>
				<!-- END SIDEBAR USER TITLE -->
				
				<!-- SIDEBAR MENU -->
				<div class="profile-usermenu">
					<ul class="nav">
						<li >
							<a href="compte.php">
							<i class="glyphicon glyphicon-home"></i>
							Profile </a>
						</li>
						<li class="active">
							<a  data-toggle="modal" data-target="#editprofil">
							<i class="glyphicon glyphicon-user"></i>
							Modifier le profile </a>
						</li>
						<li>
							<a href="#" target="_blank">
							<i class="glyphicon glyphicon-ok"></i>
							Tasks </a>
						</li>
						<li>
							<a href="#">
							<i class="glyphicon glyphicon-flag"></i>
							Help </a>
						</li>
					</ul>
				</div>
                <!-- END MENU -->
                
			   
           <div class="portlet light bordered">
                                                <!-- STAT -->
                                                <div class="row list-separated profile-stat">
                                                    <div class="col-md-4 col-sm-4 col-xs-6">
                                                        <div class="uppercase profile-stat-title"> 37 </div>
                                                        <div class="uppercase profile-stat-text"> Projects </div>
                                                    </div>
                                                    <div class="col-md-4 col-sm-4 col-xs-6">
                                                        <div class="uppercase profile-stat-title"> 51 </div>
                                                        <div class="uppercase profile-stat-text"> Tasks </div>
                                                    </div>
                                                    <div class="col-md-4 col-sm-4 col-xs-6">
                                                        <div class="uppercase profile-stat-title"> 61 </div>
                                                        <div class="uppercase profile-stat-text"> Uploads </div>
                                                    </div>
                                                </div>
                                                <!-- END STAT -->
                                                 <div>
                                                    <h4 class="profile-desc-title">About Jason Davis</h4>
                                                    <span class="profile-desc-text"> Lorem ipsum dolor sit amet diam nonummy nibh dolore. </span>
                                                    <div class="margin-top-20 profile-desc-link">
                                                        <i class="fa fa-globe"></i>
                                                        <a href="https://www.apollowebstudio.com">apollowebstudio.com</a>
                                                    </div>
                                                    <div class="margin-top-20 profile-desc-link">
                                                        <i class="fa fa-twitter"></i>
                                                        <a href="https://www.twitter.com/jasondavisfl/">@jasondavisfl</a>
                                                    </div>
                                                    <div class="margin-top-20 profile-desc-link">
                                                        <i class="fa fa-facebook"></i>
                                                        <a href="https://www.facebook.com/">JasonDavisFL</a>
 </div></div></div>                   
                                           
        
        
			</div>
		</div>
		<div class="col-md-9">
            <div class="profile-content">
                    <h3>Information personnel</h3>
                
                <form class="form-horizontal" role="form">
                <div class="form-group">
                    <label class="col-lg-3 control-label">A propos :</label>
                    <div class="col-lg-8">
                        <textarea class="form-control" rows="5" placeholder="My Bio"></textarea>
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="col-lg-3 control-label">Email:</label>
                    <div class="col-lg-8">
                    <input class="form-control" type="text" value="janesemail@gmail.com">
                    </div>
                </div>
                
                
                <div class="form-group">
                    <label class="col-md-3 control-label">Mot de passe :</label>
                    <div class="col-md-8">
                    <input class="form-control" type="password" value="11111122333">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label">Confirmer mot de passe :</label>
                    <div class="col-md-8">
                    <input class="form-control" type="password" value="11111122333">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label">Changer photo de profile:</label>
                    <div class="col-md-8">
                        <input type="file" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label"></label>
                    <div class="col-md-8">
                    <input type="button" class="btn btn-primary" value="Save Changes">
                    <span></span>
                    <input type="reset" class="btn btn-default" value="Cancel">
                    </div>
                </div>
                </form>
            </div>
		</div>
	</div>
</div>



<?php require_once 'footer.php'; ?>