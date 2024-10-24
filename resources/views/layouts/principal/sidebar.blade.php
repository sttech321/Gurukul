@vite(['resources/css/app.css'])
<x-app-layout>
	<a id="show-sidebar" class="btn btn-sm btn-dark" href="#">
		<i class="fas fa-bars"></i>
	</a>
	<nav id="sidebar" class="sidebar-wrapper">
		<div class="sidebar-content">
			<div class="sidebar-brand">
				<!-- <a href="#"> <img width="120" src="/image/login-img.png" /></a> -->
				<a href="{{ route('dashboard') }}"><span class="logo">GuruKul</span> </a>
				<div id="close-sidebar">
					<i class="fas fa-times"></i>
				</div>
			</div>
			<div class="sidebar-header flexBetween">
				<div class="leftSec">
					<div class="user-pic">
						<img width="230" src="/image/person.jpg" alt="user picture">
					</div>
					<div class="user-info">
						<span class="user-name">Jhon
							<strong>Smith</strong>
						</span>
						<span class="user-role">Administrator</span>
					</div>
				</div>
				<div class="rightSec">
					<div class="dropdown toggle">
						<input id="t1" type="checkbox">
						<label for="t1" class="cursorPointer"><i class="fa fa-ellipsis-v whiteText" aria-hidden="true"></i></label>
						<ul class="dropdown-menu-field">
							<li class="autoHeight">
								<div class="dropdown-top flexBetween">
									<div class="leftSec">
										<div class="user-pic">
											<img data-v-139b8be6="" width="230" src="/image/person.jpg" alt="user picture">
										</div>
										<div class="user-info">
											<span class="user-name">Jhon
												<strong>Smith</strong>
											</span>
											<span class="user-role">Administrator</span>
										</div>
									</div>
								</div>
							</li>
							<li>
								<x-responsive-nav-link class="menuListItem" :href="route('profile.edit')">
									<i class="fa fa-user" aria-hidden="true"></i> {{ __('Profile') }}
								</x-responsive-nav-link>
							</li>
							<li>
								<!-- Authentication -->
								<form class="menuListItem" method="POST" action="{{ route('logout') }}">
									@csrf

									<x-responsive-nav-link :href="route('logout')"
										onclick="event.preventDefault();
                                        this.closest('form').submit();">
										<i class="fa fa-cog" aria-hidden="true"></i> {{ __('Log Out') }}
									</x-responsive-nav-link>
								</form>
							</li>
						</ul>
					</div>
				</div>
			</div>
			<div class="sidebar-menu">
				<ul>
					<li>
						<a href="{{ route('teacher.form.create') }}">
							<div class="imgIconWrap">
								<img width="20" height="20" src="/images/student-registration.svg" alt="sidebar icon">
							</div>
							<span>Teacher Registration</span>
						</a>
					</li>
					<li>
						<a href="{{ route('student.registrations') }}">
							<div class="imgIconWrap">
								<img width="20" height="20" src="/images/teacher-registration.svg" alt="sidebar icon">
							</div>
							<span>Student Registration</span>
						</a>
					</li>			
				</ul>
			</div>
		</div>
	</nav>
	<!-- sidebar-wrapper  -->

</x-app-layout>