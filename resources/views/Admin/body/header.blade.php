@php
    $prefix = Request::route()->getPrefix();
    $route = Route::current()->getName();
@endphp            
            
            <!-- HEADER -->
                <div class="header hor-header">
					<div class="container">
						<div class="d-flex">
							<a class="animated-arrow hor-toggle horizontal-navtoggle"><span></span></a>
							<div class="">
								<a class="header-brand1" href="#">
									<img src="{{asset('backend/assets/images/brand/logo-azizi.png')}}" class="header-brand-img desktop-logo" alt="logo">
									<img src="{{asset('backend/assets/images/brand/azizi.png')}}" class="header-brand-img light-logo" alt="logo">
								</a><!-- LOGO -->
							</div>
							<div class="d-flex  ml-auto header-right-icons header-search-icon">
								<div class="dropdown d-md-flex">
									<a class="nav-link icon full-screen-link nav-link-bg">
										<i class="fe fe-maximize fullscreen-button"></i>
									</a>
								</div><!-- FULL-SCREEN -->
								<div class="dropdown d-md-flex notifications">
									<a class="nav-link icon" data-toggle="dropdown">
										<i class="fe fe-bell"></i>
										<span class="nav-unread badge badge-success badge-pill">2</span>
									</a>
									<div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
										<div class="notifications-menu">
											<a class="dropdown-item d-flex pb-3" href="#">
												<div class="fs-16 text-primary mr-3">
													<i class="fa fa-commenting-o"></i>
												</div>
												<div class="">
													<strong>3 New Comments.</strong>
												</div>
											</a>
										</div>
										<div class="dropdown-divider"></div>
										<a href="#" class="dropdown-item text-center">View all Notification</a>
									</div>
								</div><!-- NOTIFICATIONS -->
								<div class="dropdown d-md-flex message">
									<a class="nav-link icon text-center" data-toggle="dropdown">
										<i class="fe fe-mail"></i>
										<span class="nav-unread badge badge-danger badge-pill">3</span>
									</a>
									<div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
										<div class="message-menu">
											<a class="dropdown-item d-flex pb-3" href="#">
												<span class="avatar avatar-md brround mr-3 align-self-center cover-image" data-image-src="{{asset('upload/walid.jpg')}}"></span>
												<div>
													<strong>Ahmad Walid</strong> Hey! there I' am available....
													<div class="small text-muted">
														3 hours ago
													</div>
												</div>
											</a>
										</div>
										<div class="dropdown-divider"></div>
										<a href="#" class="dropdown-item text-center">See all Messages</a>
									</div>
								</div><!-- MESSAGE-BOX -->
								<div class="dropdown profile-1">
									<a href="#" data-toggle="dropdown" class="nav-link pr-2 leading-none d-flex">
										<span>
											<img src="{{asset('upload/walid.jpg')}}" alt="profile-user" class="avatar  profile-user brround cover-image">
										</span>
									</a>
									<div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
										<div class="drop-heading">
											<div class="text-center">
												<h5 class="text-dark mb-0">Ahmad Walid Azizi</h5>
												<small class="text-muted">Administrator</small>
											</div>
										</div>
										<div class="dropdown-divider m-0"></div>
										<a class="dropdown-item" href="{{route('edit.profile')}}">
											<i class="dropdown-icon mdi mdi-account-outline"></i> Profile
										</a>
										<a class="dropdown-item" href="{{route('admin.logout')}}">
											<i class="dropdown-icon mdi  mdi-logout-variant"></i> Sign out
										</a>
									</div>
								</div>
								<div class="dropdown d-md-flex header-settings">
									<a href="#" class="nav-link icon " data-toggle="sidebar-right" data-target=".sidebar-right">
										<i class="fe fe-align-right"></i>
									</a>
								</div><!-- SIDE-MENU -->
							</div>
						</div>
					</div>
				</div>
				<!-- End HEADER -->

                <!--/Horizontal-main -->
                <div class="sticky">
                    <div class="horizontal-main hor-menu clearfix">
                        <div class="horizontal-mainwrapper container clearfix">
                            <!--Nav-->
                            <nav class="horizontalMenu clearfix">
                                <ul class="horizontalMenu-list">
                                    <li aria-haspopup="true" class="{{ ($route == 'dashboard') ?'active':'' }}"><a href="{{route('dashboard')}}" class=""><i class="ti-package"></i> Home</a></li>
                                    <li aria-haspopup="true"><a href="#" class="sub-icon"><i class="ti-user"></i> Profile <i class="fa fa-angle-down horizontal-icon"></i></a>
                                        <ul class="sub-menu">
                                            <li aria-haspopup="true"><a href="{{route('edit.profile')}}">Profile</a>
                                            <li aria-haspopup="true" class="{{ ($route == 'view.user') ? 'active' : '' }}"><a href="{{route('view.user')}}">View Users</a></li>
                                        </ul>
                                    </li>
                                    <li aria-haspopup="true"><a href="#" class="sub-icon"><i class="ti-layers"></i> Setup <i class="fa fa-angle-down horizontal-icon"></i></a>
                                        <div class="horizontal-megamenu clearfix">
                                            <div class="container">
                                                <div class="mega-menubg">
                                                    <div class="row">
                                                        <div class="col-lg-6 col-md-12 col-xs-12 link-list">
                                                            <ul>
                                                                <li><h3 class="fs-14 font-weight-bold mb-1">Class Management</h3></li>
                                                                <li aria-haspopup="true" class="{{ ($route == 'student.class.view') ? 'active' : '' }}"><a href="{{route('student.class.view')}}"> Class Management</a></li>
                                                                <li aria-haspopup="true" class="{{ ($route == 'student.year.view') ? 'active' : '' }}"><a href="{{route('student.year.view')}}"> Year Management</a></li>
                                                                <!--<li aria-haspopup="true" class="{{ ($route == 'student.group.view') ? 'active' : '' }}"><a href="{{route('student.group.view')}}"> Grade Management</a></li>-->
                                                                <li aria-haspopup="true" class="{{ ($route == 'student.shift.view') ? 'active' : '' }}"><a href="{{route('student.shift.view')}}"> Shift Management</a></li>
                                                            </ul>
                                                        </div>
                                                        <div class="col-lg-6 col-md-12 col-xs-12 link-list">
                                                            <ul>
                                                                <li><h3 class="fs-14 font-weight-bold mb-3">Subjects Management</h3></li>
                                                                <li aria-haspopup="true" class="{{ ($route == 'subject.view') ? 'active' : '' }}"><a href="{{route('subject.view')}}">Subjects</a></li>
                                                                <li aria-haspopup="true" class="{{ ($route == 'assign.subject.view') ? 'active' : '' }}"><a href="{{route('assign.subject.view')}}">Assign Subjects</a></li>
                                                                <li aria-haspopup="true" class="{{ ($route == 'exam.type.view') ? 'active' : '' }}"><a href="{{route('exam.type.view')}}">Exam Type</a></li>
                                                                
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li aria-haspopup="true"><a href="#" class="sub-icon"><i class="ti-layers"></i> Academic <i class="fa fa-angle-down horizontal-icon"></i></a>
                                        <div class="horizontal-megamenu clearfix">
                                            <div class="container">
                                                <div class="mega-menubg">
                                                    <div class="row">
                                                        <div class="col-lg-2 col-md-12 col-xs-12 link-list">
                                                            <ul>
                                                                <li><h3 class="fs-14 font-weight-bold mb-2">Registration</h3></li>
                                                                <li aria-haspopup="true" class="{{ ($route == 'designation.view') ? 'active' : '' }}"><a href="{{route('designation.view')}}">Designation</a></li>
                                                                <li aria-haspopup="true" class="{{ ($route == 'student.registration.view') ? 'active' : '' }}"><a href="{{route('student.registration.view')}}"> Students Enrollment</a></li>
                                                                <li class="{{ ($route == 'employee.registration.view') ? 'active' : '' }}"><a href="{{route('employee.registration.view')}}"> Employee Enrollment</a></li>
                                                            </ul>
                                                        </div>
                                                        <div class="col-lg-2 col-md-12 col-xs-12 link-list">
                                                            <ul>
                                                                <li><h3 class="fs-14 font-weight-bold mb-2">Attendance</h3></li>
                                                                <li aria-haspopup="true" class="#"><a href="#"> Students Attendance</a></li>
                                                                <li class="{{ ($route == 'employee.attendance.view') ? 'active' : '' }}"><a href="{{route('employee.attendance.view')}}">Employee Attandance</a></li>
                                                                <li class="{{ ($route == 'employee.leave.view') ? 'active' : '' }}"><a href="{{route('employee.leave.view')}}">Employee Leave</a></li>
                                                            </ul>
                                                        </div>
                                                        <div class="col-lg-2 col-md-12 col-xs-12 link-list">
                                                            <ul>
                                                                <li><h3 class="fs-14 font-weight-bold mb-2">Timetable</h3></li>
                                                                <li aria-haspopup="true" class="{{ ($route == 'student.timetable.view') ? 'active' : '' }}"><a href="{{route('student.timetable.view')}}"> Students Timetable</a></li>
                                                                <li aria-haspopup="true" class="{{ ($route == 'teacher.timetable.view') ? 'active' : '' }}"><a href="{{route('teacher.timetable.view')}}"> Employee Timetable</a></li>
                                                            </ul>
                                                        </div>
                                                        <div class="col-lg-3 col-md-12 col-xs-12 link-list">
                                                            <ul>
                                                                <li><h3 class="fs-14 font-weight-bold mb-3">Students Assessment</h3></li>
                                                                
                                                            </ul>
                                                        </div>
                                                        <div class="col-lg-3 col-md-12 col-xs-12 link-list">
                                                            <ul>
                                                                <li><h3 class="fs-14 font-weight-bold mb-3">Employees Assessment</h3></li>
                                                                
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li aria-haspopup="true"><a href="#" class="sub-icon"><i class="ti-layers"></i> Exams <i class="fa fa-angle-down horizontal-icon"></i></a>
                                        <ul class="sub-menu">
                                            <li aria-haspopup="true" class="{{ ($route == 'marks.view') ? 'active' : '' }}"><a href="{{route('marks.view')}}">Marks Entry View</a></li>
                                            <li aria-haspopup="true" class="{{ ($route == 'student.marks.edit') ? 'active' : '' }}"><a href="{{route('student.marks.edit')}}">Edit Marks</a></li>
                                            <li class="{{ ($route == 'marks.grade.view') ? 'active' : '' }}"><a href="{{route('marks.grade.view')}}"> Marks Grade</a></li>
                                        </ul>
                                    </li>
                                    <li aria-haspopup="true"><a href="#" class="sub-icon"><i class="ti-layers"></i> Report <i class="fa fa-angle-down horizontal-icon"></i></a>
                                        <div class="horizontal-megamenu clearfix">
                                            <div class="container">
                                                <div class="mega-menubg">
                                                    <div class="row">
                                                        <div class="col-lg-6 col-md-12 col-xs-12 link-list">
                                                            <ul>
                                                                <li><h3 class="fs-14 font-weight-bold mb-3">Attendance</h3></li>
                                                                <li class="{{ ($route == 'monthly.employee.attendance.view') ? 'active' : '' }}"><a href="{{route('monthly.employee.attendance.view')}}">Employee Attendance</a></li>
                                                            </ul>
                                                        </div>
                                                        <div class="col-lg-6 col-md-12 col-xs-12 link-list">
                                                            <ul>
                                                                <li><h3 class="fs-14 font-weight-bold mb-3">Exams Result Sheet</h3></li>
                                                                <li class="{{ ($route == 'mark.sheet.view') ? 'active' : '' }}"><a href="{{route('mark.sheet.view')}}">Mark Sheet Generate</a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </nav>
                            <!--Nav-->
                        </div>
                    </div>
                </div>
                <!--/Horizontal-main -->
                <!-- Mobile Header -->
                <div class="mobile-header hor-mobile-header">
                    <div class="container">
                        <div class="d-flex">
                            <a class="animated-arrow hor-toggle horizontal-navtoggle"><span></span></a>
                            <a class="header-brand" href="{{route('dashboard')}}">
                                <img src="{{asset('backend/assets/images/brand/logo-azizi.png')}}" class="header-brand-img desktop-logo" alt="logo">
                                <img src="{{asset('backend/assets/images/brand/logo-azizi.png')}}" class="header-brand-img desktop-logo mobile-light" alt="logo">
                            </a>
                            <div class="d-flex order-lg-2 ml-auto header-right-icons">
                                <button class="navbar-toggler navresponsive-toggler d-md-none" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-4"
                                    aria-controls="navbarSupportedContent-4" aria-expanded="false" aria-label="Toggle navigation">
                                    <span class="navbar-toggler-icon fe fe-more-vertical text-white"></span>
                                </button>
                                <div class="dropdown profile-1">
                                    <a href="#" data-toggle="dropdown" class="nav-link pr-2 leading-none d-flex">
                                        <span>
                                            <img src="{{asset('upload/walid.jpg')}}" alt="profile-user" class="avatar  profile-user brround cover-image">
                                        </span>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                        <div class="drop-heading">
                                            <div class="text-center">
                                                <h5 class="text-dark mb-0">Ahmad Walid Azizi</h5>
                                                <small class="text-muted">Administrator</small>
                                            </div>
                                        </div>
                                        <div class="dropdown-divider m-0"></div>
                                        <a class="dropdown-item" href="{{route('edit.profile')}}">
                                            <i class="dropdown-icon mdi mdi-account-outline"></i> Profile
                                        </a>
                                        <a class="dropdown-item" href="{{route('admin.logout')}}">
                                            <i class="dropdown-icon mdi  mdi-logout-variant"></i> Sign out
                                        </a>
                                    </div>
                                </div>
                                <div class="dropdown d-md-flex header-settings">
                                    <a href="#" class="nav-link icon " data-toggle="sidebar-right" data-target=".sidebar-right">
                                        <i class="fe fe-align-right"></i>
                                    </a>
                                </div><!-- SIDE-MENU -->
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mb-1 navbar navbar-expand-lg  responsive-navbar navbar-dark d-md-none bg-white">
                    <div class="collapse navbar-collapse" id="navbarSupportedContent-4">
                        <div class="d-flex order-lg-2 ml-auto">
                            <div class="dropdown d-md-flex">
                                <a class="nav-link icon full-screen-link nav-link-bg">
                                    <i class="fe fe-maximize fullscreen-button"></i>
                                </a>
                            </div><!-- FULL-SCREEN -->
                            <div class="dropdown d-md-flex notifications">
                                <a class="nav-link icon" data-toggle="dropdown">
                                    <i class="fe fe-bell"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                    <div class="notifications-menu">
                                        <a class="dropdown-item d-flex pb-3" href="#">
                                            <div class="fs-16 text-primary mr-3">
                                                <i class="fa fa-commenting-o"></i>
                                            </div>
                                            <div class="">
                                                <strong>3 New Comments.</strong>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="dropdown-divider"></div>
                                    <a href="#" class="dropdown-item text-center">View all Notification</a>
                                </div>
                            </div><!-- NOTIFICATIONS -->
                            <div class="dropdown d-md-flex message">
                                <a class="nav-link icon text-center" data-toggle="dropdown">
                                    <i class="fe fe-mail"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                    <div class="message-menu">
                                        <a class="dropdown-item d-flex pb-3" href="#">
                                            <span class="avatar avatar-md brround mr-3 align-self-center cover-image" data-image-src="{{asset('upload/walid.jpg')}}"></span>
                                            <div>
                                                <strong>Ahmad Walid</strong> Hey! there I' am available....
                                                <div class="small text-muted">
                                                    3 hours ago
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="dropdown-divider"></div>
                                    <a href="#" class="dropdown-item text-center">See all Messages</a>
                                </div>
                            </div><!-- MESSAGE-BOX -->
                        </div>
                    </div>
                </div>
                <!-- /Mobile Header -->