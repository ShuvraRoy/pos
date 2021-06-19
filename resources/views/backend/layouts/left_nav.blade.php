<div class="sidebar-menu">

		<div class="sidebar-menu-inner">

			<header class="logo-env">

				<!-- logo -->
				<div class="logo">
                    <a href="{{url('home')}}">
						<img src="backend/assets/images/pos_logo.png" width="100"  alt="" />
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
				<li >
                    <a href="{{url('home')}}">
						<i class="entypo-home"></i>
						<span class="title">Inicio</span>
					</a>

				</li>
                <li >
                    <a href="{{url('clients')}}">
                        <i class="entypo-users"></i>
                        <span class="title">Clientes</span>
                    </a>

                </li>
                <li >
                    <a href="index.html">
                        <i class="entypo-window"></i>
                        <span class="title">POS</span>
                    </a>

                </li>
                <li >
                    <a href="index.html">
                        <i class="entypo-tag"></i>
                        <span class="title">Inventario</span>
                    </a>

                </li>
                <li >
                    <a href="index.html">
                        <i class="entypo-basket"></i>
                        <span class="title">Historial de Venta</span>
                    </a>

                </li>
                <li >
                    <a href="index.html">
                        <i class="entypo-box"></i>
                        <span class="title">Pedidos</span>
                    </a>

                </li>
                <li >
                    <a href="index.html">
                        <i class="entypo-user"></i>
                        <span class="title">Servicios</span>
                    </a>

                </li>
                <li >
                    <a href="index.html">
                        <i class="entypo-calendar"></i>
                        <span class="title">Cuentas por Cobrar</span>
                    </a>

                </li>
				<li class="has-sub">
					<a href="layout-api.html">
						<i class="entypo-chart-bar"></i>
						<span class="title">Reportes</span>
					</a>
					<ul>
						<li>
							<a href="layout-api.html">
                                <i class="entypo-credit-card"></i>
								<span class="title">Ventas</span>
							</a>
						</li>
						<li>
							<a href="layout-collapsed-sidebar.html">
                                <i class="entypo-check"></i>
								<span class="title">Liquidados</span>
							</a>
						</li>
						<li>
							<a href="layout-fixed-sidebar.html">
                                <i class="entypo-attention"></i>
								<span class="title">Pendientes</span>
							</a>
						</li>

					</ul>
				</li>
				<li>
					<a href="{{url('dropdown')}}" target="_blank">
						<i class="entypo-credit-card"></i>
						<span class="title">Cuentas por pagar</span>
					</a>
				</li>
				<li class="has-sub">
					<a href="ui-panels.html">
						<i class="entypo-cog"></i>
						<span class="title">Config</span>
					</a>
					<ul>
						<li>
							<a href="ui-panels.html">
								<span class="title">Proveedores</span>
							</a>
						</li>
						<li>
							<a href="ui-tiles.html">
								<span class="title">Usuarios</span>
							</a>
						</li>

					</ul>
				</li>

			</ul>

		</div>

	</div>
