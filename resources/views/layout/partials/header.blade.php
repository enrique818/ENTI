<div id="kt_header" class="header bg-morado">
						<div class="container-fluid d-flex flex-stack">
							<div class="d-flex align-items-center me-5">
								<div class="d-lg-none btn btn-icon btn-active-color-white w-30px h-30px ms-n2 me-3" id="kt_aside_toggle">
									<span class="svg-icon svg-icon-2">
										<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
											<path d="M21 7H3C2.4 7 2 6.6 2 6V4C2 3.4 2.4 3 3 3H21C21.6 3 22 3.4 22 4V6C22 6.6 21.6 7 21 7Z" fill="black" />
											<path opacity="0.3" d="M21 14H3C2.4 14 2 13.6 2 13V11C2 10.4 2.4 10 3 10H21C21.6 10 22 10.4 22 11V13C22 13.6 21.6 14 21 14ZM22 20V18C22 17.4 21.6 17 21 17H3C2.4 17 2 17.4 2 18V20C2 20.6 2.4 21 3 21H21C21.6 21 22 20.6 22 20Z" fill="black" />
										</svg>
									</span>
								</div>
								<a href="{{route('panel')}}">
									<img alt="Logo" src="{{asset('enti/logo-dark.png')}}" class="h-25px h-lg-30px" />
								</a>
								<div class="ms-5 ms-md-10">
								</div>
							</div>

							<div class="d-flex align-items-center">
								<div class="d-flex align-items-center flex-shrink-0">
									<div class="d-flex align-items-center ms-1 me-4">
										<div class="btn btn-icon btn-color-white bg-hover-white bg-hover-opacity-10 w-30px h-30px h-40px w-40px position-relative" id="abrir_notificaciones">
											<span class="svg-icon svg-icon-2">
												<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
													<path opacity="0.3" d="M20 3H4C2.89543 3 2 3.89543 2 5V16C2 17.1046 2.89543 18 4 18H4.5C5.05228 18 5.5 18.4477 5.5 19V21.5052C5.5 22.1441 6.21212 22.5253 6.74376 22.1708L11.4885 19.0077C12.4741 18.3506 13.6321 18 14.8167 18H20C21.1046 18 22 17.1046 22 16V5C22 3.89543 21.1046 3 20 3Z" fill="black" />
													<rect x="6" y="12" width="7" height="2" rx="1" fill="black" />
													<rect x="6" y="7" width="12" height="2" rx="1" fill="black" />
												</svg>
											</span>
											<span class="position-absolute start-100 translate-middle  badge badge-circle badge-danger" style="top: 15%;" id="cantidadNotificaciones"></span>
										</div>
									</div>
									<div class="d-flex align-items-center ms-1" id="kt_header_user_menu_toggle">
										<div class="btn btn-flex align-items-center bg-hover-white bg-hover-opacity-10 py-2 px-2 px-md-3" data-kt-menu-trigger="click" data-kt-menu-attach="parent" data-kt-menu-placement="bottom-end">
											<div class="d-none d-md-flex flex-column align-items-end justify-content-center me-2 me-md-4">
												<span class="text-muted fs-8 fw-bold lh-1 mb-1">{{auth()->user()->nombre}}</span>
												<span class="text-white fs-8 fw-bolder lh-1">
													{{auth()->user()->rol}}
												</span>
											</div>
											<div class="symbol symbol-30px symbol-md-40px">
												<img src="{{asset(auth()->user()->img)}}" alt="image" />
											</div>
										</div>
										<div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg menu-state-primary fw-bold py-4 fs-6 w-275px" data-kt-menu="true">
											<div class="menu-item px-3">
												<div class="menu-content d-flex align-items-center px-3">
													<div class="symbol symbol-50px me-5">
														<img alt="Logo" src="{{asset(auth()->user()->img)}}" />
													</div>
													<div class="d-flex flex-column">
														<div class="fw-bolder d-flex align-items-center fs-5">{{auth()->user()->nombre}}</div>
														<a href="#" class="fw-bold text-muted text-hover-primary fs-7">{{auth()->user()->email}}</a>
													</div>
												</div>
											</div>
											<div class="separator my-2"></div>
											<div class="menu-item px-5">
												<a href="{{route('panel')}}" class="menu-link px-5">Mis datos</a>
											</div>
											<div class="menu-item px-5">
												<a href="{{route('user.profile')}}" class="menu-link px-5">Mi perfil</a>
											</div>
											<div class="separator my-2"></div>
											<div class="menu-item px-5">
												<a href="{{route('logout')}}" class="menu-link px-5">Salir</a>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>