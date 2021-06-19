<div class="row">

			<!-- Profile Info and Notifications -->
			<div class="col-md-6 col-sm-8 clearfix">

				<ul class="user-info pull-left pull-none-xsm">

					<!-- Profile Info -->
					<li class="profile-info dropdown"><!-- add class "pull-right" if you want to place this from right -->

						<a href="#" class="dropdown-toggle" data-toggle="dropdown">
							<img src="backend/assets/images/thumb-1@2x.png" alt="" class="img-circle" width="44" />
                            {{ Auth::user()->name }}
						</a>

						<ul class="dropdown-menu">

							<!-- Reverse Caret -->
							<li class="caret"></li>

							<!-- Profile sub-links -->
							<li>
								<a href="extra-timeline.html">
									<i class="entypo-user"></i>
									Edit Profile
								</a>
							</li>

{{--							<li>--}}
{{--								<a href="mailbox.html">--}}
{{--									<i class="entypo-mail"></i>--}}
{{--									Inbox--}}
{{--								</a>--}}
{{--							</li>--}}

							<li>
								<a href="extra-calendar.html">
									<i class="entypo-calendar"></i>
									Calendar
								</a>
							</li>

							<li>
                                <a class="entypo-logout right" href="{{ url('/logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>
                                <form id="logout-form" action="{{  url('/logout')  }}" class="d-none">

                                </form>
							</li>
						</ul>
					</li>

				</ul>

				<ul class="user-info pull-left pull-right-xs pull-none-xsm">


				</ul>

			</div>


			<!-- Raw Links -->
        </div>

<br><br>

<div>







