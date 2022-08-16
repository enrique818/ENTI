<div class="menu menu-column menu-rounded fw-bold fs-6" id="#kt_aside_menu" data-kt-menu="true">
										<div class="menu-item">
											<div class="menu-content pb-2">
												<span class="menu-section text-muted text-uppercase fs-8 ls-1">Panel</span>
											</div>
										</div>
{{-- 										
										<div class="menu-item">
											<a class="menu-link @if(Route::is('panel')) active @endif" href="{{route('panel')}}">
												<span class="menu-icon">
													<i class="far fa-address-card"></i>
												</span>
												<span class="menu-title">Mis datos</span>
											</a>
										</div>
 --}}
										<div class="menu-item">
											<a class="menu-link @if(Route::is('panel')) active @endif" href="{{route('panel')}}">
												<span class="menu-icon">
													<i class="far fa-user"></i>
												</span>
												<span class="menu-title">Mi perfil</span>
											</a>
										</div>
										<div class="menu-item">
											<div class="menu-content pt-8 pb-2">
												<span class="menu-section text-muted text-uppercase fs-8 ls-1">Conexiones</span>
											</div>
										</div>
										<div class="menu-item">
											<a class="menu-link @if(Route::is('conexiones.search')) active @endif" href="{{route('conexiones.search')}}">
												<span class="menu-icon">
													<i class="fas fa-hand-holding"></i>
												</span>
												<span class="menu-title">Buscar Conexiones</span>
											</a>
										</div>
										<div class="menu-item">
											<a class="menu-link @if(Route::is('conexiones.own')) active @endif" href="{{route('conexiones.own')}}">
												<span class="svg-icon svg-icon-3 me-2"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
												<path d="M8 22C7.4 22 7 21.6 7 21V9C7 8.4 7.4 8 8 8C8.6 8 9 8.4 9 9V21C9 21.6 8.6 22 8 22Z" fill="black"/>
												<path opacity="0.3" d="M4 15C3.4 15 3 14.6 3 14V6C3 5.4 3.4 5 4 5C4.6 5 5 5.4 5 6V14C5 14.6 4.6 15 4 15ZM13 19V3C13 2.4 12.6 2 12 2C11.4 2 11 2.4 11 3V19C11 19.6 11.4 20 12 20C12.6 20 13 19.6 13 19ZM17 16V5C17 4.4 16.6 4 16 4C15.4 4 15 4.4 15 5V16C15 16.6 15.4 17 16 17C16.6 17 17 16.6 17 16ZM21 18V10C21 9.4 20.6 9 20 9C19.4 9 19 9.4 19 10V18C19 18.6 19.4 19 20 19C20.6 19 21 18.6 21 18Z" fill="black"/>
												</svg></span>
												<span class="menu-title">Mis Conexiones</span>
											</a>
										</div>
										<div class="menu-item">
											<a class="menu-link @if(Route::is('conexiones.chat')) active @endif" href="{{route('conexiones.chat')}}">
												<span class="svg-icon svg-icon-3 me-2"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
												<path d="M8 22C7.4 22 7 21.6 7 21V9C7 8.4 7.4 8 8 8C8.6 8 9 8.4 9 9V21C9 21.6 8.6 22 8 22Z" fill="black"/>
												<path opacity="0.3" d="M4 15C3.4 15 3 14.6 3 14V6C3 5.4 3.4 5 4 5C4.6 5 5 5.4 5 6V14C5 14.6 4.6 15 4 15ZM13 19V3C13 2.4 12.6 2 12 2C11.4 2 11 2.4 11 3V19C11 19.6 11.4 20 12 20C12.6 20 13 19.6 13 19ZM17 16V5C17 4.4 16.6 4 16 4C15.4 4 15 4.4 15 5V16C15 16.6 15.4 17 16 17C16.6 17 17 16.6 17 16ZM21 18V10C21 9.4 20.6 9 20 9C19.4 9 19 9.4 19 10V18C19 18.6 19.4 19 20 19C20.6 19 21 18.6 21 18Z" fill="black"/>
												</svg></span>
												<span class="menu-title">Mis Chats</span>
											</a>
										</div>
										<div class="menu-item">
											<div class="menu-content pt-8 pb-2">
												<span class="menu-section text-muted text-uppercase fs-8 ls-1">Cursos</span>
											</div>
										</div>
										<div class="menu-item">
											<a class="menu-link @if(Route::is('cursos.mine')) active @endif" href="{{route('cursos.mine')}}">
												<span class="menu-icon">
													<i class="fas fa-book"></i>
												</span>
												<span class="menu-title">Cursos Enti</span>
											</a>
										</div>
										<div class="menu-item">
											<a class="menu-link @if(Route::is('cursos.search')) active @endif" href="{{route('cursos.search')}}">
												<span class="menu-icon">
													<i class="fas fa-video"></i>
												</span>
												<span class="menu-title">Cursos Externos Gratuitos</span>
											</a>
										</div>
										<div class="menu-item">
											<div class="menu-content pt-8 pb-2">
												<span class="menu-section text-muted text-uppercase fs-8 ls-1">Alianzas</span>
											</div>
										</div>
										<div class="menu-item">
											<a class="menu-link @if(Route::is('alianzas.search')) active @endif" href="{{route('alianzas.search')}}">
												<span class="menu-icon">
													<i class="fas fa-briefcase"></i>
												</span>
												<span class="menu-title">Buscar Alianzas</span>
											</a>
										</div>
										@can('admin', App\Models\User::class)
										<div class="menu-item">
											<div class="menu-content pt-8 pb-2">
												<span class="menu-section text-muted text-uppercase fs-8 ls-1">Administración</span>
											</div>
										</div>
										@can('viewAny', App\Models\Industria::class)
										<div class="menu-item">
											<a class="menu-link @if(Route::is('industrias.index')) active @endif" href="{{route('industrias.index')}}">
												<span class="menu-icon">
													<i class="fas fa-briefcase"></i>
												</span>
												<span class="menu-title">Industrias/Sectores</span>
											</a>
										</div>
										@endcan
										@can('viewAny', App\Models\User::class)
										<div class="menu-item">
											<a class="menu-link @if(Route::is('user.index')) active @endif" href="{{route('user.index')}}">
												<span class="menu-icon">
													<i class="fas fa-user"></i>
												</span>
												<span class="menu-title">Usuarios</span>
											</a>
										</div>
										@endcan
										@endcan

									</div>