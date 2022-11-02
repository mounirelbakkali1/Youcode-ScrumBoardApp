<?php
include('scripts.php');
if(!isset($_SESSION['username'])) echo "<script>window.location.replace('login.php')</script>"

?>



<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8" />
	<title>YouCode | Scrum Board</title>
	<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
	<meta content="" name="description" />
	<meta content="" name="author" />
	<!-- ================== BEGIN core-css ================== -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
	<link href="assets/css/vendor.min.css" rel="stylesheet" />
	<link href="assets/css/default/app.css" rel="stylesheet" />
	<!-- ================== END core-css ================== -->
</head>

<body>

	<!--=================== JQUERY CDN =================================-->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>


	<!-- BEGIN #loader -->
	<div id="loader" class="app-loader">
		<span class="spinner"></span>
	</div>
	<!-- END #loader -->

	<!-- BEGIN #app -->
	<div id="app" class="app app-header-fixed app-sidebar-fixed">
		<!-- BEGIN #header -->
		<div id="header" class="app-header">
			<!-- BEGIN navbar-header -->
			<div class="navbar-header">
				<a href="index.html" class="navbar-brand text-light"><span class="navbar-logo"></span> <b class="me-1">YouCode</b> Projects</a>
				<button type="button" class="navbar-mobile-toggler" data-toggle="app-sidebar-mobile">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
			</div>
			<!-- END navbar-header -->
			<!-- BEGIN header-nav -->
			<div class="navbar-nav">
				<div class="navbar-item navbar-form">
					<form action="" method="POST" name="search">
						<div class="form-group">
							<input type="text" class="form-control" placeholder="Enter keyword" />
							<button type="submit" class="btn btn-search"><i class="fa fa-search"></i></button>
						</div>
					</form>
				</div>
				<div class="navbar-item dropdown">
					<a href="#" data-bs-toggle="dropdown" class="navbar-link dropdown-toggle icon">
						<i class="fa fa-bell"></i>
						<span class="badge">5</span>
					</a>
					<div class="dropdown-menu media-list dropdown-menu-end">
						<div class="dropdown-header">NOTIFICATIONS (5)</div>
						<a href="javascript:;" class="dropdown-item media">
							<div class="media-left">
								<i class="fa fa-bug media-object bg-gray-500"></i>
							</div>
							<div class="media-body">
								<h6 class="media-heading">Server Error Reports <i class="fa fa-exclamation-circle text-danger"></i></h6>
								<div class="text-muted fs-10px">3 minutes ago</div>
							</div>
						</a>
						<a href="javascript:;" class="dropdown-item media"> <!-- href js mean it listen to this link -->
							<div class="media-left">
								<img src="assets/img/user/user-1.jpg" class="media-object" alt="" />
								<i class="fab fa-facebook-messenger text-blue media-object-icon"></i>
							</div>
							<div class="media-body">
								<h6 class="media-heading">John Smith</h6>
								<p>Quisque pulvinar tellus sit amet sem scelerisque tincidunt.</p>
								<div class="text-muted fs-10px">25 minutes ago</div>
							</div>
						</a>
						<a href="javascript:;" class="dropdown-item media">
							<div class="media-left">
								<img src="assets/img/user/user-2.jpg" class="media-object" alt="" />
								<i class="fab fa-facebook-messenger text-blue media-object-icon"></i>
							</div>
							<div class="media-body">
								<h6 class="media-heading">Olivia</h6>
								<p>Quisque pulvinar tellus sit amet sem scelerisque tincidunt.</p>
								<div class="text-muted fs-10px">35 minutes ago</div>
							</div>
						</a>
						<a href="javascript:;" class="dropdown-item media">
							<div class="media-left">
								<i class="fa fa-plus media-object bg-gray-500"></i>
							</div>
							<div class="media-body">
								<h6 class="media-heading"> New User Registered</h6>
								<div class="text-muted fs-10px">1 hour ago</div>
							</div>
						</a>
						<a href="javascript:;" class="dropdown-item media">
							<div class="media-left">
								<i class="fa fa-envelope media-object bg-gray-500"></i>
								<i class="fab fa-google text-warning media-object-icon fs-14px"></i>
							</div>
							<div class="media-body">
								<h6 class="media-heading"> New Email From John</h6>
								<div class="text-muted fs-10px">2 hour ago</div>
							</div>
						</a>
						<div class="dropdown-footer text-center">
							<a href="javascript:;" class="text-decoration-none">View more</a>
						</div>
					</div>
				</div>
                <?php if(!isset($_SESSION['username'])) echo "<a href='signup.php' class='dropdown-item w-100px text-center mx-2 rounded-3 ' style='background-color: #3f4a53; color: white'>Login</a>";
                    else {
                ?>
                <div class="navbar-item navbar-user dropdown">
					<a href="#" class="navbar-link dropdown-toggle d-flex align-items-center" data-bs-toggle="dropdown">
						<img src="assets/img/user/user-13.jpg" alt="" />
						<span>
							<span class="d-none d-md-inline"><?php if(isset($_SESSION['username']))  echo $_SESSION['username'];?></span>
							<b class="caret"></b>
						</span>

					</a>
					<div class="dropdown-menu dropdown-menu-end me-1">
						<a href="javascript:;" class="dropdown-item">Edit Profile</a>
						<a href="javascript:;" class="dropdown-item d-flex align-items-center">
							Inbox
							<span class="badge bg-danger rounded-pill ms-auto pb-4px">2</span>
						</a>
						<a href="javascript:;" class="dropdown-item">Calendar</a>
						<a href="javascript:;" class="dropdown-item">Setting</a>
						<div class="dropdown-divider"></div>
                        <?php if(!isset($_SESSION['username'])) echo "<a href='signup.php' class='dropdown-item'>Login</a>";  ?>
						<a href="index.php?logout=true" class="dropdown-item" name="log-out">Log Out</a>
                        <?php if(isset($_GET['logout'])){
                            unset($_SESSION['username']);
                            echo "<script>window.location.replace('login.php')</script>";
                        } ?>
					</div>
				</div>
                <?php  }?>


			</div>
			<!-- END header-nav -->
		</div>
		<!-- END #header -->

		<!-- BEGIN #sidebar -->
		<div id="sidebar" class="app-sidebar">
			<!-- BEGIN scrollbar -->
			<div class="app-sidebar-content" data-scrollbar="true" data-height="100%">
				<!-- BEGIN menu -->
				<div class="menu">
					<div class="menu-profile">
						<a href="javascript:;" class="menu-profile-link" data-toggle="app-sidebar-profile" data-target="#appSidebarProfileMenu">
							<div class="menu-profile-cover with-shadow"></div>
							<div class="menu-profile-image">
								<img src="assets/img/user/user-13.jpg" alt="" />
							</div>
							<div class="menu-profile-info">
								<div class="d-flex align-items-center">
									<div class="flex-grow-1">
                                        <?php if(isset($_SESSION['username']))  echo $_SESSION['username'];?>
									</div>
									<div class="menu-caret ms-auto"></div>
								</div>
								<small>Front end developer</small>
							</div>
						</a>
					</div>
					<div id="appSidebarProfileMenu" class="collapse">
						<div class="menu-item pt-5px">
							<a href="javascript:;" class="menu-link">
								<div class="menu-icon"><i class="fa fa-cog"></i></div>
								<div class="menu-text">Settings</div>
							</a>
						</div>
						<div class="menu-item">
							<a href="javascript:;" class="menu-link">
								<div class="menu-icon"><i class="fa fa-pencil-alt"></i></div>
								<div class="menu-text"> Send Feedback</div>
							</a>
						</div>
						<div class="menu-item pb-5px">
							<a href="javascript:;" class="menu-link">
								<div class="menu-icon"><i class="fa fa-question-circle"></i></div>
								<div class="menu-text"> Helps</div>
							</a>
						</div>
						<div class="menu-divider m-0"></div>
					</div>
					<div class="menu-header">Navigation</div>

					<div class="menu-item">
						<a href="index.html" class="menu-link">
							<div class="menu-icon">
								<i class="fa fa-list-check"></i>
							</div>
							<div class="menu-text">Scrum Board</div>
						</a>
					</div>

					<!-- BEGIN minify-button -->
					<div class="menu-item d-flex">
						<a href="javascript:;" class="app-sidebar-minify-btn ms-auto" data-toggle="app-sidebar-minify"><i class="fa fa-angle-double-left"></i></a>
					</div>
					<!-- END minify-button -->
				</div>
				<!-- END menu -->
			</div>
			<!-- END scrollbar -->
		</div>
		<div class="app-sidebar-bg"></div>
		<div class="app-sidebar-mobile-backdrop"><a href="#" data-dismiss="app-sidebar-mobile" class="stretched-link"></a></div>
		<!-- END #sidebar -->

		<!-- BEGIN #content -->
		<div id="content" class="app-content" style="min-height: 100vh; background: url(assets/img/cover/cover-scrum-board.png) no-repeat fixed; background-size: 360px; background-position: right bottom;">
			<div class="d-flex align-items-center mb-3">
				<div>
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="javascript:;">Home</a></li>
						<li class="breadcrumb-item active">Scrum Board </li>
					</ol>
					<!-- BEGIN page-header -->
					<h1 class="page-header mb-0">
						Scrum Board
					</h1>
					<!-- END page-header -->
				</div>

				<div class="ms-auto">
					<a href="#modal-task" data-bs-toggle="modal" style="background-color: var(--app-theme); border: none;" class="btn btn-success btn-rounded px-4 rounded-pill"><i class="fa fa-plus fa-lg me-2 ms-n2 text-success-900"></i> Add Task</a>
				</div>
			</div>

			<div class="mb-3 d-md-flex fw-bold">
				<div class="dropdown-toggle">
					<a href="#" data-bs-toggle="dropdown" class="text-decoration-none text-dark"><i class="far fa-folder fa-fw text-dark text-opacity-50 me-1"></i> project/sprint-2 <b class="caret"></b></a>
					<div class="dropdown-menu dropdown-menu-start">
						<a href="#" class="dropdown-item"><i class="far fa-folder fa-fw fa-lg text-gray-500 me-1"></i> project/mobile-app-dev</a>
						<a href="#" class="dropdown-item"><i class="far fa-folder fa-fw fa-lg text-gray-500 me-1"></i> project/bootstrap-5</a>
						<a href="#" class="dropdown-item"><i class="far fa-folder fa-fw fa-lg text-gray-500 me-1"></i> project/mvc-version</a>
						<a href="#" class="dropdown-item"><i class="far fa-folder fa-fw fa-lg text-gray-500 me-1"></i> project/ruby-version</a>
					</div>
				</div>
				<div class="ms-md-4 mt-md-0 mt-2"><i class="fa fa-code-branch fa-fw me-1 text-dark text-opacity-50"></i> 1,392 pull request</div>
				<div class="ms-md-4 mt-md-0 mt-2"><i class="fa fa-users-cog fa-fw me-1 text-dark text-opacity-50"></i> 52 participant</div>
				<div class="ms-md-4 mt-md-0 mt-2"><i class="far fa-clock fa-fw me-1 text-dark text-opacity-50"></i> 14 day(s)</div>
			</div>

			<?php if (isset($_SESSION['message'])) : ?>
				<div class="alert alert-green alert-dismissible fade show">
					<strong>Success!</strong>
					<?php
					echo $_SESSION['message'];
					unset($_SESSION['message']);
					?>
					<button type="button" class="btn-close" data-bs-dismiss="alert"></button>
				</div>
			<?php endif ?>
			<div class="row">

				<div class="col-xl-4 col-lg-6">
					<div class="panel panel-inverse  bg-transparent">
						<div class="panel-heading">
							<h4 class="panel-title">To do (<span id="to-do-tasks-count">0</span>)</h4>
							<div class="panel-heading-btn">
								<a href="javascript:;" class="btn btn-xs btn-icon btn-default" data-toggle="panel-expand"><i class="fa fa-expand"></i></a>
								<a href="javascript:;" class="btn btn-xs btn-icon btn-success" data-toggle="panel-reload"><i class="fa fa-redo"></i></a>
								<a href="javascript:;" class="btn btn-xs btn-icon btn-warning" data-toggle="panel-collapse"><i class="fa fa-minus"></i></a>
								<a href="javascript:;" class="btn btn-xs btn-icon btn-danger" data-toggle="panel-remove"><i class="fa fa-times"></i></a>
							</div>
						</div>
						<div class="list-group list-group-flush rounded-bottom overflow-hidden panel-body p-0" id="to-do-tasks">
							<!-- TO DO TASKS HERE -->
							<?php
							//PHP CODE HERE
							//DATA FROM getTasks() FUNCTION
							$res = getTasks();
							while ($row = mysqli_fetch_row($res)) {
								if ($row[7] != 'To Do') continue;
							?>
								<div class="task pb-2 mt-2 bg-dark" id="<?php echo $row[4] ?>">
									<input type="hidden" value="<?php echo $row[0] ?>">
									<div class="card-task p-2">
										<div class="d-flex" id="task-info">
											<div class="d-flex justify-content-center align-middle p-2"><img src="./assets/img/icon-wait.png" style="width: 25px;height: 25px;" alt="icon-wait"></div>
											<div class="flex-fill p-2">
												<h6 style="width:85%;"><?php echo $row[1]; ?></h6>
												<p class="mb-1">#<?php echo $row[0] ?> Assigned at <span><?php echo $row[5]; ?></span></p>
												<p class="mb-1"><?php echo $row[6]  ?></p>
											</div>
											<button class="edit border-0 bg-transparent"><i class="bi bi-pencil-square"></i></button>
											<!-- <button class="delete border-0 bg-transparent"><i class="bi bi-x-lg"></i></button> -->
										</div>
										<div class="d-flex justify-content-end pe-2">
											<button class="px-4 fs-9px" id="type" style="background-color: var(--app-theme) ; border:none;  margin-left:5px;border-radius: 10px;">
												<?php echo $row[8]  ?><input type="hidden" value="<?php echo $row[2] ?>">
											</button>
											<button class="bg-transparent  px-4 fs-9px" id="priority" style="border: 2px var(--app-theme) solid; margin-left:5px;border-radius: 10px; color:var(--app-theme) ;">
												<?php echo $row[9]  ?><input type="hidden" value="<?php echo $row[3] ?>">
											</button>
										</div>
									</div>
								</div>
							<?php
							}
							?>

						</div>
					</div>
				</div>
				<div class="col-xl-4 col-lg-6">
					<div class="panel panel-inverse bg-transparent">
						<div class="panel-heading">
							<h4 class="panel-title">In Progress (<span id="in-progress-tasks-count">0</span>)</h4>
							<div class="panel-heading-btn">
								<a href="javascript:;" class="btn btn-xs btn-icon btn-default" data-toggle="panel-expand"><i class="fa fa-expand"></i></a>
								<a href="javascript:;" class="btn btn-xs btn-icon btn-success" data-toggle="panel-reload"><i class="fa fa-redo"></i></a>
								<a href="javascript:;" class="btn btn-xs btn-icon btn-warning" data-toggle="panel-collapse"><i class="fa fa-minus"></i></a>
								<a href="javascript:;" class="btn btn-xs btn-icon btn-danger" data-toggle="panel-remove"><i class="fa fa-times"></i></a>
							</div>
						</div>
						<div class="list-group list-group-flush rounded-bottom overflow-hidden panel-body p-0" id="in-progress-tasks">
							<!-- IN PROGRESS TASKS HERE -->
							<?php
							//PHP CODE HERE
							//DATA FROM getTasks() FUNCTION
							$res = getTasks();
							while ($row = mysqli_fetch_row($res)) {
								if ($row[7] != 'In Progress') continue;
							?>
								<div class="task pb-2 mt-2 bg-dark" id="<?php echo $row[4] ?>">
									<input type="hidden" value="<?php echo $row[0] ?>">
									<div class="card-task p-2">
										<div class="d-flex" id="task-info">
											<div class="d-flex justify-content-center align-middle p-2"><img src="./assets/img/loading.png" style="width: 25px;height: 25px;" alt="icon-wait"></div>
											<div class="flex-fill p-2">
												<h6 style="width:85%;"><?php echo $row[1]; ?></h6>
												<p class="mb-1">#<?php echo $row[0] ?> Assigned at <span><?php echo $row[5];  ?></span></p>
												<p class="mb-1"><?php echo $row[6]  ?></p>
											</div>
											<button class="edit border-0 bg-transparent"><i class="bi bi-pencil-square"></i></button>
											<!-- <button class="delete border-0 bg-transparent"><i class="bi bi-x-lg"></i></button> -->
										</div>
										<div class="d-flex justify-content-end pe-2">
											<button class="px-4  fs-9px" id="type" style="background-color: var(--app-theme) ; border:none;  margin-left:5px;border-radius: 10px;">
												<?php echo $row[8]  ?><input type="hidden" value="<?php echo $row[2] ?>">
											</button>
											<button class="bg-transparent px-4 fs-9px" id="priority" style="border: 2px var(--app-theme) solid; margin-left:5px;border-radius: 10px; color:var(--app-theme) ;">
												<?php echo $row[9]  ?><input type="hidden" value="<?php echo $row[3] ?>">
											</button>
										</div>
									</div>
								</div>
							<?php
							}
							?>
						</div>
					</div>
				</div>
				<div class="col-xl-4 col-lg-6">
					<div class="panel panel-inverse bg-transparent">
						<div class="panel-heading">
							<h4 class="panel-title">Done (<span id="done-tasks-count">0</span>)</h4>
							<div class="panel-heading-btn">
								<a href="javascript:;" class="btn btn-xs btn-icon btn-default" data-toggle="panel-expand"><i class="fa fa-expand"></i></a>
								<a href="javascript:;" class="btn btn-xs btn-icon btn-success" data-toggle="panel-reload"><i class="fa fa-redo"></i></a>
								<a href="javascript:;" class="btn btn-xs btn-icon btn-warning" data-toggle="panel-collapse"><i class="fa fa-minus"></i></a>
								<a href="javascript:;" class="btn btn-xs btn-icon btn-danger" data-toggle="panel-remove"><i class="fa fa-times"></i></a>
							</div>
						</div>
						<div class="list-group list-group-flush rounded-bottom overflow-hidden panel-body p-0" id="done-tasks">
							<!-- DONE TASKS HERE -->
							<?php
							//PHP CODE HERE
							//DATA FROM getTasks() FUNCTION
							$res = getTasks(); // it doens"t work when working with global variable
							while ($row = mysqli_fetch_row($res)) {
								if ($row[7] != 'Done') continue;
							?>
								<div class="task pb-2 mt-2 bg-dark" id="<?php echo $row[4]; ?>">
									<input type="hidden" value="<?php echo $row[0] ?>">
									<div class="card-task p-2">
										<div class="d-flex" id="task-info">
											<div class="d-flex justify-content-center align-middle p-2"><img src="./assets/img/check.png" style="width: 25px;height: 25px;" alt="icon-wait"></div>
											<div class="flex-fill p-2">
												<h6 style="width:85%;"><?php echo $row[1]; ?></h6>
												<p class="mb-1">#<?php echo $row[0] ?> Assigned at <span><?php echo $row[5]  ?></span></p>
												<p class="mb-1"><?php echo $row[6]  ?></p>
											</div>
											<button class="edit border-0 bg-transparent"><i class="bi bi-pencil-square"></i></button>
											<!-- <button class="delete border-0 bg-transparent"><i class="bi bi-x-lg"></i></button> -->
										</div>
										<div class="d-flex justify-content-end pe-2">
											<button class="px-4 fs-9px" id="type" style="background-color: var(--app-theme) ; border:none;  margin-left:5px;border-radius: 10px;">
												<?php echo $row[8]  ?><input type="hidden" value="<?php echo $row[2] ?>">
											</button>
											<button class="bg-transparent px-4  fs-9px" id="priority" style="border: 2px var(--app-theme) solid; margin-left:5px;border-radius: 10px; color:var(--app-theme) ;">
												<?php echo $row[9]  ?><input type="hidden" value="<?php echo $row[3] ?>">
											</button>
										</div>
									</div>
								</div>
							<?php
							}
							?>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- END #content -->


		<!-- BEGIN scroll-top-btn -->
		<a href="javascript:;" class="btn btn-icon btn-circle btn-success btn-scroll-to-top" data-toggle="scroll-to-top"><i class="fa fa-angle-up"></i></a>
		<!-- END scroll-top-btn -->
	</div>
	<!-- END #app -->
	<!-- TASK MODAL -->
	<div class="modal fade" id="modal-task">
		<div class="modal-dialog">
			<?php



			?>
			<div class="modal-content" style="color :black;">
				<form action="scripts.php" method="POST" id="form-task">
					<div class="modal-header">
						<h5 class="modal-title">Add Task</h5>
						<?php if (isset($_SESSION['err-empty'])) echo "err empty";
						unset($_SESSION['err-empty']) ?>
						<input type="hidden" name="id_of_modified_element" id="id">
						<a href="#" class="btn-close" data-bs-dismiss="modal"></a>
					</div>
					<div class="modal-body">
						<!-- FOR VALIDATION MESSAGE -->
						<?php if (isset($_SESSION['validation'])) : ?>
							<div class="alert alert-danger alert-dismissible fade show">
								<strong>Hint !</strong>
								<?php
								echo $_SESSION['validation'];
								echo "<script type='text/javascript'>
                                        var form = document.forms['form-task'];
                                        $(document).ready(function(){
                                        $('#modal-task').modal('show');
                                        form.title.value='" . $_SESSION['title'] . "';
                                        form.description.value='" . $_SESSION['description'] . "';
                                        form.task_type.value='" . $_SESSION['task_type'] . "';
                                        form.priority_id.value='" . $_SESSION['priority_id'] . "';
                                        form.status_id.value='" . $_SESSION['status_id'] . "';
                                        form.date.value='" . $_SESSION['date'] . "';
	                                        });
                                        </script>";
								unset($_SESSION['validation']);
								?>
								<button type="button" class="btn-close" data-bs-dismiss="alert"></button>
							</div>
						<?php endif ?>
						<!-- This Input Allows Storing Task Index  -->
						<input type="hidden" id="task-id">
						<div class="mb-3">
							<label class="form-label">Title</label>
							<input type="text" class="form-control" id="task-title" name="title" />
						</div>
						<div class="mb-3">
							<label class="form-label">Type</label>
							<div class="ms-3">
								<div class="form-check mb-1">
									<input class="form-check-input" name="task_type" type="radio" value="1" id="task-type-feature" />
									<label class="form-check-label" for="task-type-feature">Feature</label>
								</div>
								<div class="form-check">
									<input class="form-check-input" name="task_type" type="radio" value="2" id="task-type-bug" />
									<label class="form-check-label" for="task-type-bug">Bug</label>
								</div>
							</div>

						</div>
						<div class="mb-3">
							<label class="form-label">Priority</label>
							<select class="form-select" id="task-priority" name="priority_id">
								<option value="">Please select</option>
								<option value="1">Low</option>
								<option value="2">Medium</option>
								<option value="3">High</option>
								<option value="4">Critical</option>
							</select>
						</div>
						<div class="mb-3">
							<label class="form-label">Status</label>
							<select class="form-select" id="task-status" name="status_id">
								<option value="">Please select</option>
								<option value="1">To Do</option>
								<option value="2">In Progress</option>
								<option value="3">Done</option>
							</select>
						</div>
						<div class="mb-3">
							<label class="form-label">Date</label>
							<input type="datetime-local" class="form-control" id="task-date" name="date" />
						</div>
						<div class="mb-0">
							<label class="form-label">Description</label>
							<textarea class="form-control" rows="10" id="task-description" name="description"></textarea>
						</div>

					</div>
					<div class="modal-footer">
						<a href="#" class="btn btn-white" data-bs-dismiss="modal">Cancel</a>
						<button style="display:none;" type="submit" name="delete" class="btn btn-danger task-action-btn" id="task-delete-btn">Delete</button>
						<button style="display:none;" name="update" onclick="" class="btn btn-secondary task-action-btn" id="task-update-btn">Update</button>
						<button type="submit" name="save" onclick="" class="btn btn-primary task-action-btn" id="task-save-btn">Save</button>

					</div>
				</form>
			</div>
		</div>
	</div>

	<!-- ================== BEGIN core-js ================== -->
	<script src="assets/js/vendor.min.js"></script>
	<script src="assets/js/app.min.js"></script>
	<!-- ================== END core-js ================== -->
	<script src="scripts.js"></script>

	<script>
		//reloadTasks();
	</script>
</body>

</html>