<div class="sidebar-menu">

		<div class="sidebar-menu-inner">

			<header class="logo-env">

				<!-- logo -->
				<div class="logo">
                    <a href="{{url('home')}}">
						<img src="{{ asset('backend/assets/images/pos_logo.png') }}" width="100"  alt="" />
					</a>
				</div>

				<!-- logo collapse icon -->
				<div class="sidebar-collapse">
					<a href="#" class="sidebar-collapse-icon"><!-- add class "with-animation" if you want sidebar to have animation during expanding/collapsing transition -->
						<i class="entypo-menu"></i>
					</a>
				</div>


				<!-- open/close menu icon (do not remove if you want to enable menu on mobile devices) -->
				<div class="sidebar-mobile-menu visible-xs">
					<a href="#" class="with-animation"><!-- add class "with-animation" to support animation -->
						<i class="entypo-menu"></i>
					</a>
				</div>

			</header>


			<ul id="main-menu" class="main-menu">
				<!-- add class "multiple-expanded" to allow multiple submenus to open -->
				<!-- class "auto-inherit-active-class" will automatically add "active" class for parent elements who are marked already with class "active" -->
				<li class="{{ 'home' == request()->path() ? 'active' : ''}}">
                    <a href="{{url('home')}}">
						<i class="entypo-home"></i>
						<span class="title">Inicio</span>
					</a>

				</li>
                <li class="{{ 'clients' == request()->path() ? 'active' : ''}}">
                    <a href="{{url('clients')}}">
                        <i class="entypo-users"></i>
                        <span class="title">Clientes</span>
                    </a>

                </li>
                <li class="{{ 'pos' == request()->path() ? 'active' : ''}}">
                    <a href="{{url('pos')}}">
                        <i class="entypo-window"></i>
                        <span class="title">POS</span>
                    </a>

                </li>
                <li class="{{ 'inventory' == request()->path() ? 'active' : ''}}">
                    <a href="{{url('inventory')}}">
                        <i class="entypo-tag"></i>
                        <span class="title">Inventario</span>
                    </a>

                </li>
                <li class="{{ 'sales_history' == request()->path() ? 'active' : ''}}">
                    <a href="{{url('sales_history')}}">
                        <i class="entypo-basket"></i>
                        <span class="title">Historial de Venta</span>
                    </a>

                </li>
                <li class="{{ 'orders' == request()->path() ? 'active' : ''}}">
                    <a href="{{url('orders')}}">
                        <i class="entypo-box"></i>
                        <span class="title">Pedidos</span>
                    </a>

                </li>
                <li class="{{ 'service' == request()->path() ? 'active' : ''}}">
                    <a href="{{url('service')}}">
                        <i class="entypo-user"></i>
                        <span class="title">Servicios</span>
                    </a>

                </li>
                <li class="{{ 'accounts_receivable' == request()->path() ? 'active' : ''}}">
                    <a href="{{url('accounts_receivable')}}">
                        <i class="entypo-calendar"></i>
                        <span class="title">Cuentas por Cobrar</span>
                    </a>

                </li>
				<li class="has-sub">
					<a href="">
						<i class="entypo-chart-bar"></i>
						<span class="title">Reportes</span>
					</a>
					<ul>
						<li class="{{ 'sales_report' == request()->path() ? 'active' : ''}}">
							<a href="{{url('sales_report')}}">
                                <i class="entypo-credit-card"></i>
								<span class="title">Ventas</span>
							</a>
						</li>
						<li class="{{ 'cleared_sales_report' == request()->path() ? 'active' : ''}}">
							<a href="{{url('cleared_sales_report')}}">
                                <i class="entypo-check"></i>
								<span class="title">Liquidados</span>
							</a>
						</li>
						<li class="{{ 'pending_sales_report' == request()->path() ? 'active' : ''}}">
							<a href="{{url('pending_sales_report')}}">
                                <i class="entypo-attention"></i>
								<span class="title">Pendientes</span>
							</a>
						</li>

					</ul>
				</li>
				<li class="{{ 'accounts_payable' == request()->path() ? 'active' : ''}}">
					<a href="{{url('accounts_payable')}}" >
						<i class="entypo-credit-card"></i>
						<span class="title">Cuentas por pagar</span>
					</a>
				</li>
				<li class="has-sub">
					<a href="">
						<i class="entypo-cog"></i>
						<span class="title">Config</span>
					</a>
					<ul>
						<li class="{{ 'providers' == request()->path() ? 'active' : ''}}">
							<a href="{{url('providers')}}">
                                <i class="entypo-users"></i>
								<span class="title">Proveedores</span>
							</a>
						</li>
                        <li class="{{ 'users' == request()->path() ? 'active' : ''}}">
							<a href="{{url('users')}}">
                                <i class="entypo-users"></i>
								<span class="title">Usuarios</span>
							</a>
						</li>

					</ul>
				</li>

			</ul>

		</div>

	</div>
