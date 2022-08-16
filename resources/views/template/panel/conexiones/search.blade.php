@extends('layout.profile')
@section('title',  "Buscar conexiones")

@section('content')
<div class="row g-6 mb-6 g-xl-9 mb-xl-9" id="primero">
	<div class="col-12">
		<div class="card">
			<div class="card-header">
				<h4 class="card-title">Selecciona el tipo de perfil</h4>
			</div>
			<div class="card-body">
				<div class="d-flex flex-wrap">
					<div class="fv-row">
											<div class="row align-items-stretch">
												<div class="col-lg-6 mb-10">
													<input type="radio" class="btn-check" name="perfil" value="startup"  checked="checked" id="startup" />
													<label class="btn btn-outline btn-outline-dashed btn-outline-default p-7 d-flex align-items-center h-100" for="startup">
														<!--begin::Svg Icon | path: icons/duotune/communication/com005.svg-->
														<span class="svg-icon svg-icon-muted svg-icon-2hx"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
														<path opacity="0.3" d="M4.05424 15.1982C8.34524 7.76818 13.5782 3.26318 20.9282 2.01418C21.0729 1.98837 21.2216 1.99789 21.3618 2.04193C21.502 2.08597 21.6294 2.16323 21.7333 2.26712C21.8372 2.37101 21.9144 2.49846 21.9585 2.63863C22.0025 2.7788 22.012 2.92754 21.9862 3.07218C20.7372 10.4222 16.2322 15.6552 8.80224 19.9462L4.05424 15.1982ZM3.81924 17.3372L2.63324 20.4482C2.58427 20.5765 2.5735 20.7163 2.6022 20.8507C2.63091 20.9851 2.69788 21.1082 2.79503 21.2054C2.89218 21.3025 3.01536 21.3695 3.14972 21.3982C3.28408 21.4269 3.42387 21.4161 3.55224 21.3672L6.66524 20.1802L3.81924 17.3372ZM16.5002 5.99818C16.2036 5.99818 15.9136 6.08615 15.6669 6.25097C15.4202 6.41579 15.228 6.65006 15.1144 6.92415C15.0009 7.19824 14.9712 7.49984 15.0291 7.79081C15.0869 8.08178 15.2298 8.34906 15.4396 8.55884C15.6494 8.76862 15.9166 8.91148 16.2076 8.96935C16.4986 9.02723 16.8002 8.99753 17.0743 8.884C17.3484 8.77046 17.5826 8.5782 17.7474 8.33153C17.9123 8.08486 18.0002 7.79485 18.0002 7.49818C18.0002 7.10035 17.8422 6.71882 17.5609 6.43752C17.2796 6.15621 16.8981 5.99818 16.5002 5.99818Z" fill="currentColor"/>
														<path d="M4.05423 15.1982L2.24723 13.3912C2.15505 13.299 2.08547 13.1867 2.04395 13.0632C2.00243 12.9396 1.9901 12.8081 2.00793 12.679C2.02575 12.5498 2.07325 12.4266 2.14669 12.3189C2.22013 12.2112 2.31752 12.1219 2.43123 12.0582L9.15323 8.28918C7.17353 10.3717 5.4607 12.6926 4.05423 15.1982ZM8.80023 19.9442L10.6072 21.7512C10.6994 21.8434 10.8117 21.9129 10.9352 21.9545C11.0588 21.996 11.1903 22.0083 11.3195 21.9905C11.4486 21.9727 11.5718 21.9252 11.6795 21.8517C11.7872 21.7783 11.8765 21.6809 11.9402 21.5672L15.7092 14.8442C13.6269 16.8245 11.3061 18.5377 8.80023 19.9442ZM7.04023 18.1832L12.5832 12.6402C12.7381 12.4759 12.8228 12.2577 12.8195 12.032C12.8161 11.8063 12.725 11.5907 12.5653 11.4311C12.4057 11.2714 12.1901 11.1803 11.9644 11.1769C11.7387 11.1736 11.5205 11.2583 11.3562 11.4132L5.81323 16.9562L7.04023 18.1832Z" fill="currentColor"/>
														</svg></span>
														<!--end::Svg Icon-->
														<span class="d-block fw-bold text-start">
															<span class="text-dark fw-bolder d-block fs-4 mb-2">{{__('categorias.startup')}}</span>
															<span class="text-muted fw-bold fs-6">{{__('categorias.startupd')}}</span>
														</span>
													</label>
												</div>
												<div class="col-lg-6 mb-10">
													<input type="radio" id="capital" class="btn-check" name="perfil" value="firma"/>
													<label class="btn btn-outline btn-outline-dashed btn-outline-default p-7 d-flex align-items-center  h-100" for="capital">
														<!--begin::Svg Icon | path: icons/duotune/communication/com005.svg-->
														<span class="svg-icon svg-icon-muted svg-icon-2hx"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
														<path opacity="0.3" d="M16.163 17.55C17.0515 16.6633 17.6785 15.5488 17.975 14.329C18.2389 13.1884 18.8119 12.1425 19.631 11.306L12.694 4.36902C11.8574 5.18796 10.8115 5.76088 9.67099 6.02502C8.15617 6.3947 6.81277 7.27001 5.86261 8.50635C4.91245 9.74268 4.41238 11.266 4.44501 12.825C4.46196 13.6211 4.31769 14.4125 4.0209 15.1515C3.72412 15.8905 3.28092 16.5617 2.71799 17.125L2.28699 17.556C2.10306 17.7402 1.99976 17.9897 1.99976 18.25C1.99976 18.5103 2.10306 18.7598 2.28699 18.944L5.06201 21.719C5.24614 21.9029 5.49575 22.0062 5.75601 22.0062C6.01627 22.0062 6.26588 21.9029 6.45001 21.719L6.88101 21.288C7.44427 20.725 8.11556 20.2819 8.85452 19.9851C9.59349 19.6883 10.3848 19.5441 11.181 19.561C12.1042 19.58 13.0217 19.4114 13.878 19.0658C14.7343 18.7201 15.5116 18.2046 16.163 17.55Z" fill="currentColor"/>
														<path d="M19.631 11.306L12.694 4.36902L14.775 2.28699C14.9591 2.10306 15.2087 1.99976 15.469 1.99976C15.7293 1.99976 15.9789 2.10306 16.163 2.28699L21.713 7.83704C21.8969 8.02117 22.0002 8.27075 22.0002 8.53101C22.0002 8.79126 21.8969 9.04085 21.713 9.22498L19.631 11.306ZM13.041 10.959C12.6427 10.5604 12.1194 10.3112 11.5589 10.2532C10.9985 10.1952 10.4352 10.332 9.96375 10.6405C9.4923 10.949 9.14148 11.4105 8.97034 11.9473C8.79919 12.4841 8.81813 13.0635 9.02399 13.588L2.98099 19.631L4.36899 21.019L10.412 14.975C10.9364 15.1816 11.5161 15.2011 12.0533 15.0303C12.5904 14.8594 13.0523 14.5086 13.361 14.037C13.6697 13.5654 13.8065 13.0018 13.7482 12.4412C13.6899 11.8805 13.4401 11.357 13.041 10.959Z" fill="currentColor"/>
														</svg></span>
														<!--end::Svg Icon-->
														<span class="d-block fw-bold text-start">
															<span class="text-dark fw-bolder d-block fs-4 mb-2">{{__('categorias.firma')}}</span>
															<span class="text-muted fw-bold fs-6">{{__('categorias.firmad')}}</span>
														</span>
													</label>
												</div>
												<div class="col-lg-6 mb-10">
													<input type="radio" id="inversionistas" class="btn-check" name="perfil" value="inversionista" />
													<label class="btn btn-outline btn-outline-dashed btn-outline-default p-7 d-flex align-items-center  h-100" for="inversionistas">
														<!--begin::Svg Icon | path: icons/duotune/communication/com005.svg-->
														<span class="svg-icon svg-icon-muted svg-icon-2hx"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
														<path d="M17.8 8.79999L13 13.6L9.7 10.3C9.3 9.89999 8.7 9.89999 8.3 10.3L2.3 16.3C1.9 16.7 1.9 17.3 2.3 17.7C2.5 17.9 2.7 18 3 18C3.3 18 3.5 17.9 3.7 17.7L9 12.4L12.3 15.7C12.7 16.1 13.3 16.1 13.7 15.7L19.2 10.2L17.8 8.79999Z" fill="currentColor"/>
														<path opacity="0.3" d="M22 13.1V7C22 6.4 21.6 6 21 6H14.9L22 13.1Z" fill="currentColor"/>
														</svg></span>
														<!--end::Svg Icon-->
														<span class="d-block fw-bold text-start">
															<span class="text-dark fw-bolder d-block fs-4 mb-2">{{__('categorias.inversionista')}}</span>
															<span class="text-muted fw-bold fs-6">{{__('categorias.inversionistad')}}</span>
														</span>
													</label>
												</div>
												<div class="col-lg-6 mb-10">
													<input type="radio" id="expertos" class="btn-check" name="perfil" value="expertos"  />
													<label class="btn btn-outline btn-outline-dashed btn-outline-default p-7 d-flex align-items-center  h-100" for="expertos">
														<!--begin::Svg Icon | path: icons/duotune/communication/com005.svg-->
														<span class="svg-icon svg-icon-muted svg-icon-2hx"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
														<path opacity="0.3" d="M18 21.6C16.3 21.6 15 20.3 15 18.6V2.50001C15 2.20001 14.6 1.99996 14.3 2.19996L13 3.59999L11.7 2.3C11.3 1.9 10.7 1.9 10.3 2.3L9 3.59999L7.70001 2.3C7.30001 1.9 6.69999 1.9 6.29999 2.3L5 3.59999L3.70001 2.3C3.50001 2.1 3 2.20001 3 3.50001V18.6C3 20.3 4.3 21.6 6 21.6H18Z" fill="currentColor"/>
														<path d="M12 12.6H11C10.4 12.6 10 12.2 10 11.6C10 11 10.4 10.6 11 10.6H12C12.6 10.6 13 11 13 11.6C13 12.2 12.6 12.6 12 12.6ZM9 11.6C9 11 8.6 10.6 8 10.6H6C5.4 10.6 5 11 5 11.6C5 12.2 5.4 12.6 6 12.6H8C8.6 12.6 9 12.2 9 11.6ZM9 7.59998C9 6.99998 8.6 6.59998 8 6.59998H6C5.4 6.59998 5 6.99998 5 7.59998C5 8.19998 5.4 8.59998 6 8.59998H8C8.6 8.59998 9 8.19998 9 7.59998ZM13 7.59998C13 6.99998 12.6 6.59998 12 6.59998H11C10.4 6.59998 10 6.99998 10 7.59998C10 8.19998 10.4 8.59998 11 8.59998H12C12.6 8.59998 13 8.19998 13 7.59998ZM13 15.6C13 15 12.6 14.6 12 14.6H10C9.4 14.6 9 15 9 15.6C9 16.2 9.4 16.6 10 16.6H12C12.6 16.6 13 16.2 13 15.6Z" fill="currentColor"/>
														<path d="M15 18.6C15 20.3 16.3 21.6 18 21.6C19.7 21.6 21 20.3 21 18.6V12.5C21 12.2 20.6 12 20.3 12.2L19 13.6L17.7 12.3C17.3 11.9 16.7 11.9 16.3 12.3L15 13.6V18.6Z" fill="currentColor"/>
														</svg></span>
														<!--end::Svg Icon-->
														<span class="d-block fw-bold text-start">
															<span class="text-dark fw-bolder d-block fs-4 mb-2">{{__('categorias.expertos')}}</span>
															<span class="text-muted fw-bold fs-6">{{__('categorias.expertosd')}}</span>
														</span>
													</label>
												</div>
												<div class="col-lg-6 mb-10">
													<input type="radio" id="mentores" class="btn-check" name="perfil" value="mentores"  />
													<label class="btn btn-outline btn-outline-dashed btn-outline-default p-7 d-flex align-items-center  h-100" for="mentores">
														<!--begin::Svg Icon | path: icons/duotune/communication/com005.svg-->
														<span class="svg-icon svg-icon-muted svg-icon-2hx"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
														<path d="M16.0173 9H15.3945C14.2833 9 13.263 9.61425 12.7431 10.5963L12.154 11.7091C12.0645 11.8781 12.1072 12.0868 12.2559 12.2071L12.6402 12.5183C13.2631 13.0225 13.7556 13.6691 14.0764 14.4035L14.2321 14.7601C14.2957 14.9058 14.4396 15 14.5987 15H18.6747C19.7297 15 20.4057 13.8774 19.912 12.945L18.6686 10.5963C18.1487 9.61425 17.1285 9 16.0173 9Z" fill="currentColor"/>
														<rect opacity="0.3" x="14" y="4" width="4" height="4" rx="2" fill="currentColor"/>
														<path d="M4.65486 14.8559C5.40389 13.1224 7.11161 12 9 12C10.8884 12 12.5961 13.1224 13.3451 14.8559L14.793 18.2067C15.3636 19.5271 14.3955 21 12.9571 21H5.04292C3.60453 21 2.63644 19.5271 3.20698 18.2067L4.65486 14.8559Z" fill="currentColor"/>
														<rect opacity="0.3" x="6" y="5" width="6" height="6" rx="3" fill="currentColor"/>
														</svg></span>
														<!--end::Svg Icon-->
														<span class="d-block fw-bold text-start">
															<span class="text-dark fw-bolder d-block fs-4 mb-2">{{__('categorias.mentores')}}</span>
															<span class="text-muted fw-bold fs-6">{{__('categorias.mentoresd')}}</span>
														</span>
													</label>
												</div>
												<div class="col-lg-6 mb-10">
													<input type="radio" id="influencer" class="btn-check" name="perfil" value="influencer"  />
													<label class="btn btn-outline btn-outline-dashed btn-outline-default p-7 d-flex align-items-center  h-100" for="influencer">
														<!--begin::Svg Icon | path: icons/duotune/communication/com005.svg-->
														<span class="svg-icon svg-icon-muted svg-icon-2hx"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
														<path opacity="0.3" d="M15 19H7C5.9 19 5 18.1 5 17V7C5 5.9 5.9 5 7 5H15C16.1 5 17 5.9 17 7V17C17 18.1 16.1 19 15 19Z" fill="currentColor"/>
														<path d="M8.5 2H13.4C14 2 14.5 2.4 14.6 3L14.9 5H6.89999L7.2 3C7.4 2.4 7.9 2 8.5 2ZM7.3 21C7.4 21.6 7.9 22 8.5 22H13.4C14 22 14.5 21.6 14.6 21L14.9 19H6.89999L7.3 21ZM18.3 10.2C18.5 9.39995 18.5 8.49995 18.3 7.69995C18.2 7.29995 17.8 6.90002 17.3 6.90002H17V10.9H17.3C17.8 11 18.2 10.7 18.3 10.2Z" fill="currentColor"/>
														</svg></span>
														<!--end::Svg Icon-->
														<span class="d-block fw-bold text-start">
															<span class="text-dark fw-bolder d-block fs-4 mb-2">{{__('categorias.influencer')}}</span>
															<span class="text-muted fw-bold fs-6">{{__('categorias.influencerd')}}</span>
														</span>
													</label>
												</div>
											</div>
										</div>
										<div class="d-flex justify-content-end w-100">
											<button type="button" id="next" class="btn btn-lg btn-primary">Buscar
											<span class="svg-icon svg-icon-4 ms-1">
												<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
													<rect opacity="0.5" x="18" y="13" width="13" height="2" rx="1" transform="rotate(-180 18 13)" fill="black" />
													<path d="M15.4343 12.5657L11.25 16.75C10.8358 17.1642 10.8358 17.8358 11.25 18.25C11.6642 18.6642 12.3358 18.6642 12.75 18.25L18.2929 12.7071C18.6834 12.3166 18.6834 11.6834 18.2929 11.2929L12.75 5.75C12.3358 5.33579 11.6642 5.33579 11.25 5.75C10.8358 6.16421 10.8358 6.83579 11.25 7.25L15.4343 11.4343C15.7467 11.7467 15.7467 12.2533 15.4343 12.5657Z" fill="black" />
												</svg>
											</span>
											</button>
										</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="d-none" id="segundo">
	<div class="d-flex mb-2">
		<button type="button" class="btn btn-lg btn-primary me-3" id="back">
			<span class="svg-icon svg-icon-4 me-1">
				<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
				<rect opacity="0.5" x="6" y="11" width="13" height="2" rx="1" fill="black" />
				<path d="M8.56569 11.4343L12.75 7.25C13.1642 6.83579 13.1642 6.16421 12.75 5.75C12.3358 5.33579 11.6642 5.33579 11.25 5.75L5.70711 11.2929C5.31658 11.6834 5.31658 12.3166 5.70711 12.7071L11.25 18.25C11.6642 18.6642 12.3358 18.6642 12.75 18.25C13.1642 17.8358 13.1642 17.1642 12.75 16.75L8.56569 12.5657C8.25327 12.2533 8.25327 11.7467 8.56569 11.4343Z" fill="black" />
				</svg>
			</span>
		Anterior</button>
	</div>
	<div class="row g-6 mb-6 g-xl-9 mb-xl-9">
		<div class="col-12">
			<div class="card">
				<div class="card-header">
					<h4 class="card-title">Filtros</h4>
				</div>
				<div class="card-body">
					<form id="formFiltros">
						<div class="d-flex flex-wrap">
							<x-select name="pais" label="País" placeholder="Selecciona el país">
								<x-slot name="values">
									<option selected>Todos</option>
									<option value="Afganistán" id="AF">Afganistán</option>
									<option value="Albania" id="AL">Albania</option>
									<option value="Alemania" id="DE">Alemania</option>
									<option value="Andorra" id="AD">Andorra</option>
									<option value="Angola" id="AO">Angola</option>
									<option value="Anguila" id="AI">Anguila</option>
									<option value="Antártida" id="AQ">Antártida</option>
									<option value="Antigua y Barbuda" id="AG">Antigua y Barbuda</option>
									<option value="Antillas holandesas" id="AN">Antillas holandesas</option>
									<option value="Arabia Saudí" id="SA">Arabia Saudí</option>
									<option value="Argelia" id="DZ">Argelia</option>
									<option value="Argentina" id="AR">Argentina</option>
									<option value="Armenia" id="AM">Armenia</option>
									<option value="Aruba" id="AW">Aruba</option>
									<option value="Australia" id="AU">Australia</option>
									<option value="Austria" id="AT">Austria</option>
									<option value="Azerbaiyán" id="AZ">Azerbaiyán</option>
									<option value="Bahamas" id="BS">Bahamas</option>
									<option value="Bahrein" id="BH">Bahrein</option>
									<option value="Bangladesh" id="BD">Bangladesh</option>
									<option value="Barbados" id="BB">Barbados</option>
									<option value="Bélgica" id="BE">Bélgica</option>
									<option value="Belice" id="BZ">Belice</option>
									<option value="Benín" id="BJ">Benín</option>
									<option value="Bermudas" id="BM">Bermudas</option>
									<option value="Bhután" id="BT">Bhután</option>
									<option value="Bielorrusia" id="BY">Bielorrusia</option>
									<option value="Birmania" id="MM">Birmania</option>
									<option value="Bolivia" id="BO">Bolivia</option>
									<option value="Bosnia y Herzegovina" id="BA">Bosnia y Herzegovina</option>
									<option value="Botsuana" id="BW">Botsuana</option>
									<option value="Brasil" id="BR">Brasil</option>
									<option value="Brunei" id="BN">Brunei</option>
									<option value="Bulgaria" id="BG">Bulgaria</option>
									<option value="Burkina Faso" id="BF">Burkina Faso</option>
									<option value="Burundi" id="BI">Burundi</option>
									<option value="Cabo Verde" id="CV">Cabo Verde</option>
									<option value="Camboya" id="KH">Camboya</option>
									<option value="Camerún" id="CM">Camerún</option>
									<option value="Canadá" id="CA">Canadá</option>
									<option value="Chad" id="TD">Chad</option>
									<option value="Chile" id="CL">Chile</option>
									<option value="China" id="CN">China</option>
									<option value="Chipre" id="CY">Chipre</option>
									<option value="Ciudad estado del Vaticano" id="VA">Ciudad estado del Vaticano</option>
									<option value="Colombia" id="CO">Colombia</option>
									<option value="Comores" id="KM">Comores</option>
									<option value="Congo" id="CG">Congo</option>
									<option value="Corea" id="KR">Corea</option>
									<option value="Corea del Norte" id="KP">Corea del Norte</option>
									<option value="Costa del Marfíl" id="CI">Costa del Marfíl</option>
									<option value="Costa Rica" id="CR">Costa Rica</option>
									<option value="Croacia" id="HR">Croacia</option>
									<option value="Cuba" id="CU">Cuba</option>
									<option value="Dinamarca" id="DK">Dinamarca</option>
									<option value="Djibouri" id="DJ">Djibouri</option>
									<option value="Dominica" id="DM">Dominica</option>
									<option value="Ecuador" id="EC">Ecuador</option>
									<option value="Egipto" id="EG">Egipto</option>
									<option value="El Salvador" id="SV">El Salvador</option>
									<option value="Emiratos Arabes Unidos" id="AE">Emiratos Arabes Unidos</option>
									<option value="Eritrea" id="ER">Eritrea</option>
									<option value="Eslovaquia" id="SK">Eslovaquia</option>
									<option value="Eslovenia" id="SI">Eslovenia</option>
									<option value="España" id="ES">España</option>
									<option value="Estados Unidos" id="US">Estados Unidos</option>
									<option value="Estonia" id="EE">Estonia</option>
									<option value="c" id="ET">Etiopía</option>
									<option value="Ex-República Yugoslava de Macedonia" id="MK">Ex-República Yugoslava de Macedonia</option>
									<option value="Filipinas" id="PH">Filipinas</option>
									<option value="Finlandia" id="FI">Finlandia</option>
									<option value="Francia" id="FR">Francia</option>
									<option value="Gabón" id="GA">Gabón</option>
									<option value="Gambia" id="GM">Gambia</option>
									<option value="Georgia" id="GE">Georgia</option>
									<option value="Georgia del Sur y las islas Sandwich del Sur" id="GS">Georgia del Sur y las islas Sandwich del Sur</option>
									<option value="Ghana" id="GH">Ghana</option>
									<option value="Gibraltar" id="GI">Gibraltar</option>
									<option value="Granada" id="GD">Granada</option>
									<option value="Grecia" id="GR">Grecia</option>
									<option value="Groenlandia" id="GL">Groenlandia</option>
									<option value="Guadalupe" id="GP">Guadalupe</option>
									<option value="Guam" id="GU">Guam</option>
									<option value="Guatemala" id="GT">Guatemala</option>
									<option value="Guayana" id="GY">Guayana</option>
									<option value="Guayana francesa" id="GF">Guayana francesa</option>
									<option value="Guinea" id="GN">Guinea</option>
									<option value="Guinea Ecuatorial" id="GQ">Guinea Ecuatorial</option>
									<option value="Guinea-Bissau" id="GW">Guinea-Bissau</option>
									<option value="Haití" id="HT">Haití</option>
									<option value="Holanda" id="NL">Holanda</option>
									<option value="Honduras" id="HN">Honduras</option>
									<option value="Hong Kong R. A. E" id="HK">Hong Kong R. A. E</option>
									<option value="Hungría" id="HU">Hungría</option>
									<option value="India" id="IN">India</option>
									<option value="Indonesia" id="ID">Indonesia</option>
									<option value="Irak" id="IQ">Irak</option>
									<option value="Irán" id="IR">Irán</option>
									<option value="Irlanda" id="IE">Irlanda</option>
									<option value="Isla Bouvet" id="BV">Isla Bouvet</option>
									<option value="Isla Christmas" id="CX">Isla Christmas</option>
									<option value="Isla Heard e Islas McDonald" id="HM">Isla Heard e Islas McDonald</option>
									<option value="Islandia" id="IS">Islandia</option>
									<option value="Islas Caimán" id="KY">Islas Caimán</option>
									<option value="Islas Cook" id="CK">Islas Cook</option>
									<option value="Islas de Cocos o Keeling" id="CC">Islas de Cocos o Keeling</option>
									<option value="Islas Faroe" id="FO">Islas Faroe</option>
									<option value="Islas Fiyi" id="FJ">Islas Fiyi</option>
									<option value="Islas Malvinas Islas Falkland" id="FK">Islas Malvinas Islas Falkland</option>
									<option value="Islas Marianas del norte" id="MP">Islas Marianas del norte</option>
									<option value="Islas Marshall" id="MH">Islas Marshall</option>
									<option value="Islas menores de Estados Unidos" id="UM">Islas menores de Estados Unidos</option>
									<option value="Islas Palau" id="PW">Islas Palau</option>
									<option value="Islas Salomón" d="SB">Islas Salomón</option>
									<option value="Islas Tokelau" id="TK">Islas Tokelau</option>
									<option value="Islas Turks y Caicos" id="TC">Islas Turks y Caicos</option>
									<option value="Islas Vírgenes EE.UU." id="VI">Islas Vírgenes EE.UU.</option>
									<option value="Islas Vírgenes Reino Unido" id="VG">Islas Vírgenes Reino Unido</option>
									<option value="Israel" id="IL">Israel</option>
									<option value="Italia" id="IT">Italia</option>
									<option value="Jamaica" id="JM">Jamaica</option>
									<option value="Japón" id="JP">Japón</option>
									<option value="Jordania" id="JO">Jordania</option>
									<option value="Kazajistán" id="KZ">Kazajistán</option>
									<option value="Kenia" id="KE">Kenia</option>
									<option value="Kirguizistán" id="KG">Kirguizistán</option>
									<option value="Kiribati" id="KI">Kiribati</option>
									<option value="Kuwait" id="KW">Kuwait</option>
									<option value="Laos" id="LA">Laos</option>
									<option value="Lesoto" id="LS">Lesoto</option>
									<option value="Letonia" id="LV">Letonia</option>
									<option value="Líbano" id="LB">Líbano</option>
									<option value="Liberia" id="LR">Liberia</option>
									<option value="Libia" id="LY">Libia</option>
									<option value="Liechtenstein" id="LI">Liechtenstein</option>
									<option value="Lituania" id="LT">Lituania</option>
									<option value="Luxemburgo" id="LU">Luxemburgo</option>
									<option value="Macao R. A. E" id="MO">Macao R. A. E</option>
									<option value="Madagascar" id="MG">Madagascar</option>
									<option value="Malasia" id="MY">Malasia</option>
									<option value="Malawi" id="MW">Malawi</option>
									<option value="Maldivas" id="MV">Maldivas</option>
									<option value="Malí" id="ML">Malí</option>
									<option value="Malta" id="MT">Malta</option>
									<option value="Marruecos" id="MA">Marruecos</option>
									<option value="Martinica" id="MQ">Martinica</option>
									<option value="Mauricio" id="MU">Mauricio</option>
									<option value="Mauritania" id="MR">Mauritania</option>
									<option value="Mayotte" id="YT">Mayotte</option>
									<option value="México" id="MX">México</option>
									<option value="Micronesia" id="FM">Micronesia</option>
									<option value="Moldavia" id="MD">Moldavia</option>
									<option value="Mónaco" id="MC">Mónaco</option>
									<option value="Mongolia" id="MN">Mongolia</option>
									<option value="Montserrat" id="MS">Montserrat</option>
									<option value="Mozambique" id="MZ">Mozambique</option>
									<option value="Namibia" id="NA">Namibia</option>
									<option value="Nauru" id="NR">Nauru</option>
									<option value="Nepal" id="NP">Nepal</option>
									<option value="Nicaragua" id="NI">Nicaragua</option>
									<option value="Níger" id="NE">Níger</option>
									<option value="Nigeria" id="NG">Nigeria</option>
									<option value="Niue" id="NU">Niue</option>
									<option value="Norfolk" id="NF">Norfolk</option>
									<option value="Noruega" id="NO">Noruega</option>
									<option value="Nueva Caledonia" id="NC">Nueva Caledonia</option>
									<option value="Nueva Zelanda" id="NZ">Nueva Zelanda</option>
									<option value="Omán" id="OM">Omán</option>
									<option value="Panamá" id="PA">Panamá</option>
									<option value="Papua Nueva Guinea" id="PG">Papua Nueva Guinea</option>
									<option value="Paquistán" id="PK">Paquistán</option>
									<option value="Paraguay" id="PY">Paraguay</option>
									<option value="Perú" id="PE">Perú</option>
									<option value="Pitcairn" id="PN">Pitcairn</option>
									<option value="Polinesia francesa" id="PF">Polinesia francesa</option>
									<option value="Polonia" id="PL">Polonia</option>
									<option value="Portugal" id="PT">Portugal</option>
									<option value="Puerto Rico" id="PR">Puerto Rico</option>
									<option value="Qatar" id="QA">Qatar</option>
									<option value="Reino Unido" id="UK">Reino Unido</option>
									<option value="República Centroafricana" id="CF">República Centroafricana</option>
									<option value="República Checa" id="CZ">República Checa</option>
									<option value="República de Sudáfrica" id="ZA">República de Sudáfrica</option>
									<option value="República Democrática del Congo Zaire" id="CD">República Democrática del Congo Zaire</option>
									<option value="República Dominicana" id="DO">República Dominicana</option>
									<option value="Reunión" id="RE">Reunión</option>
									<option value="Ruanda" id="RW">Ruanda</option>
									<option value="Rumania" id="RO">Rumania</option>
									<option value="Rusia" id="RU">Rusia</option>
									<option value="Samoa" id="WS">Samoa</option>
									<option value="Samoa occidental" id="AS">Samoa occidental</option>
									<option value="San Kitts y Nevis" id="KN">San Kitts y Nevis</option>
									<option value="San Marino" id="SM">San Marino</option>
									<option value="San Pierre y Miquelon" id="PM">San Pierre y Miquelon</option>
									<option value="San Vicente e Islas Granadinas" id="VC">San Vicente e Islas Granadinas</option>
									<option value="Santa Helena" id="SH">Santa Helena</option>
									<option value="Santa Lucía" id="LC">Santa Lucía</option>
									<option value="Santo Tomé y Príncipe" id="ST">Santo Tomé y Príncipe</option>
									<option value="Senegal" id="SN">Senegal</option>
									<option value="Serbia y Montenegro" id="YU">Serbia y Montenegro</option>
									<option value="Sychelles" id="SC">Seychelles</option>
									<option value="Sierra Leona" id="SL">Sierra Leona</option>
									<option value="Singapur" id="SG">Singapur</option>
									<option value="Siria" id="SY">Siria</option>
									<option value="Somalia" id="SO">Somalia</option>
									<option value="Sri Lanka" id="LK">Sri Lanka</option>
									<option value="Suazilandia" id="SZ">Suazilandia</option>
									<option value="Sudán" id="SD">Sudán</option>
									<option value="Suecia" id="SE">Suecia</option>
									<option value="Suiza" id="CH">Suiza</option>
									<option value="Surinam" id="SR">Surinam</option>
									<option value="Svalbard" id="SJ">Svalbard</option>
									<option value="Tailandia" id="TH">Tailandia</option>
									<option value="Taiwán" id="TW">Taiwán</option>
									<option value="Tanzania" id="TZ">Tanzania</option>
									<option value="Tayikistán" id="TJ">Tayikistán</option>
									<option value="Territorios británicos del océano Indico" id="IO">Territorios británicos del océano Indico</option>
									<option value="Territorios franceses del sur" id="TF">Territorios franceses del sur</option>
									<option value="Timor Oriental" id="TP">Timor Oriental</option>
									<option value="Togo" id="TG">Togo</option>
									<option value="Tonga" id="TO">Tonga</option>
									<option value="Trinidad y Tobago" id="TT">Trinidad y Tobago</option>
									<option value="Túnez" id="TN">Túnez</option>
									<option value="Turkmenistán" id="TM">Turkmenistán</option>
									<option value="Turquía" id="TR">Turquía</option>
									<option value="Tuvalu" id="TV">Tuvalu</option>
									<option value="Ucrania" id="UA">Ucrania</option>
									<option value="Uganda" id="UG">Uganda</option>
									<option value="Uruguay" id="UY">Uruguay</option>
									<option value="Uzbekistán" id="UZ">Uzbekistán</option>
									<option value="Vanuatu" id="VU">Vanuatu</option>
									<option value="Venezuela" id="VE">Venezuela</option>
									<option value="Vietnam" id="VN">Vietnam</option>
									<option value="Wallis y Futuna" id="WF">Wallis y Futuna</option>
									<option value="Yemen" id="YE">Yemen</option>
									<option value="Zambia" id="ZM">Zambia</option>
									<option value="Zimbabue" id="ZW">Zimbabue</option>
								</x-slot>
							</x-select>
							<x-select name="industria_id" label="Industria/Sector" placeholder="Selecciona la industria/sector">
								<x-slot name="values">
									<option selected>Todas</option>
								@foreach($industrias??[] as $v => $d)
									<option value="{{$v}}">{{$d}}</option>
								@endforeach
								</x-slot>
							</x-select>
							<x-select name="ventas" label="Ventas Anuales" placeholder="Seleccione la cantidad de ventas anuales">
								<x-slot name="values">
									<option value="">Seleccione la cantidad de ventas anuales</option>
									<option value="5">{{__('categorias.ventas.5')}}</option>
									<option value="10">{{__('categorias.ventas.10')}}</option>
									<option value="20">{{__('categorias.ventas.20')}}</option>
									<option value="50">{{__('categorias.ventas.50')}}</option>
									<option value="100">{{__('categorias.ventas.100')}}</option>
									<option value="max">{{__('categorias.ventas.max')}}</option>
								</x-slot>
							</x-select>
							<x-select name="capital_institucional" label="¿Ha recibido Capital Institucional? Ejemplo: Ángel Inversionista, Firma de Capital Privado" placeholder="Seleccione si ha recibido capital Institucional">
								<x-slot name="values">
									<option value="">Seleccione si ha recibido capital Institucional</option>
									<option value="si">Si</option>
									<option value="no">No</option>
								</x-slot>
							</x-select>
							<x-select name="prestamo_financiero" label="¿Ha recibidos préstamos del sistema financiero?" placeholder="Seleccione si ha recibido prestamos del sistema financiero">
								<x-slot name="values">
									<option value="">Seleccione si ha recibido prestamos del sistema financiero</option>
									<option value="si">Si</option>
									<option value="no">No</option>
								</x-slot>
							</x-select>
							<x-select name="equipo" label="Tamaño del equipo" placeholder="Seleccione el tamaño del equipo">
								<x-slot name="values">
									<option value="">Seleccione el tamaño de su equipo</option>
									<option value="1">{{__('categorias.equipo.1')}}</option>
									<option value="5">{{__('categorias.equipo.5')}}</option>
									<option value="10">{{__('categorias.equipo.10')}}</option>
									<option value="50">{{__('categorias.equipo.50')}}</option>
									<option value="mas">{{__('categorias.equipo.mas')}}</option>
								</x-slot>
							</x-select>
							<div class="row px-3" id="capitalcontenedor">
								<h5>Tipo de Capital (puedes seleccionar mas de una opción)</h5>
								<label class="form-check form-check-custom form-check-solid  form-check-sm mb-2">
								    <input name="tipo_capital[]" class="form-check-input" type="checkbox" value="1"/>
								    <span class="form-check-label">
								        {{__('categorias.tipo_capital.1')}}
								    </span>
								</label>
								<label class="form-check form-check-custom form-check-solid  form-check-sm mb-2">
								    <input name="tipo_capital[]" class="form-check-input" type="checkbox" value="2"/>
								    <span class="form-check-label">
								        {{__('categorias.tipo_capital.2')}}
								    </span>
								</label>
								<label class="form-check form-check-custom form-check-solid  form-check-sm mb-2">
								    <input name="tipo_capital[]" class="form-check-input" type="checkbox" value="4"/>
								    <span class="form-check-label">
								        {{__('categorias.tipo_capital.4')}}
								    </span>
								</label>
								<label class="form-check form-check-custom form-check-solid  form-check-sm mb-2">
								    <input name="tipo_capital[]" class="form-check-input" type="checkbox" value="8"/>
								    <span class="form-check-label">
								        {{__('categorias.tipo_capital.8')}}
								    </span>
								</label>
								<label class="form-check form-check-custom form-check-solid  form-check-sm mb-2">
								    <input name="tipo_capital[]" class="form-check-input" type="checkbox" value="16"/>
								    <span class="form-check-label">
								        {{__('categorias.tipo_capital.16')}}
								    </span>
								</label>
							</div>
							<x-select name="experiencia" label="Años de experiencia" placeholder="Seleccione sus Años de experiencia">
								<x-slot name="values">
									<option value="">Seleccione sus Años de experiencia</option>
									<option value="1">{{__('categorias.experiencia.1')}}</option>
									<option value="5">{{__('categorias.experiencia.5')}}</option>
									<option value="10">{{__('categorias.experiencia.10')}}</option>
									<option value="mas">{{__('categorias.experiencia.mas')}}</option>
								</x-slot>
							</x-select>
							<x-select name="fundador" label="¿Ha sido fundador de alguna compañia?" placeholder="Seleccione si ha sido fundador de una compañia">
								<x-slot name="values">
									<option value="">Seleccione si ha sido fundador de una compañia</option>
									<option value="si">Si</option>
									<option value="no">No</option>
								</x-slot>
							</x-select>
							<div class="row px-3" id="formacioncontenedor">
								<h5>Tipo de Formación (puedes seleccionar mas de una opción)</h5>
								<label class="form-check form-check-custom form-check-solid  form-check-sm mb-2">
								    <input name="formacion[]" class="form-check-input" type="checkbox" value="1"/>
								    <span class="form-check-label">
								        {{__('categorias.formacion.1')}}
								    </span>
								</label>
								<label class="form-check form-check-custom form-check-solid  form-check-sm mb-2">
								    <input name="formacion[]" class="form-check-input" type="checkbox" value="2"/>
								    <span class="form-check-label">
								        {{__('categorias.formacion.2')}}
								    </span>
								</label>
								<label class="form-check form-check-custom form-check-solid  form-check-sm mb-2">
								    <input name="formacion[]" class="form-check-input" type="checkbox" value="4"/>
								    <span class="form-check-label">
								        {{__('categorias.formacion.4')}}
								    </span>
								</label>
								<label class="form-check form-check-custom form-check-solid  form-check-sm mb-2">
								    <input name="formacion[]" class="form-check-input" type="checkbox" value="8"/>
								    <span class="form-check-label">
								        {{__('categorias.formacion.8')}}
								    </span>
								</label>
								<label class="form-check form-check-custom form-check-solid  form-check-sm mb-2">
								    <input name="formacion[]" class="form-check-input" type="checkbox" value="16"/>
								    <span class="form-check-label">
								        {{__('categorias.formacion.16')}}
								    </span>
								</label>
							</div>
							<x-select name="seguidores" label="Número de seguidores" placeholder="Seleccione su número de seguidores">
								<x-slot name="values">
									<option value="">Seleccione su número de seguidores</option>
									<option value="20">{{__('categorias.seguidores.20')}}</option>
									<option value="50">{{__('categorias.seguidores.50')}}</option>
									<option value="100">{{__('categorias.seguidores.100')}}</option>
									<option value="250">{{__('categorias.seguidores.250')}}</option>
									<option value="mas">{{__('categorias.seguidores.mas')}}</option>
								</x-slotvalues>
							</x-select>					
						<div class="row px-3" id="plataformacontenedor">
                                    <h5>Tipo de plataforma (puedes seleccionar mas de una opción)</h5>
                                    <label class="form-check form-check-custom form-check-solid  form-check-sm mb-2">
                                        <input name="social_platform[]" class="form-check-input" type="checkbox" value="1"/>
                                        <span class="form-check-label">
                                            {{__('categorias.sociales.1')}}
                                            </span>
                                    </label>
                                    <label class="form-check form-check-custom form-check-solid  form-check-sm mb-2">
                                        <input name="social_platform[]" class="form-check-input" type="checkbox" value="2"/>
                                        <span class="form-check-label">
                                            {{__('categorias.sociales.2')}}
                                            </span>
                                    </label>
                                    <label class="form-check form-check-custom form-check-solid  form-check-sm mb-2">
                                        <input name="social_platform[]" class="form-check-input" type="checkbox" value=" 4"/>
                                        <span class="form-check-label">
                                            {{__('categorias.sociales.4')}}
                                            </span>
                                    </label>
                                
                                    <label class="form-check form-check-custom form-check-solid  form-check-sm mb-2">
                                        <input name="social_platform[]" class="form-check-input" type="checkbox" value="16"/>
                                        <span class="form-check-label">
                                            {{__('categorias.sociales.16')}}
                                            </span>
                                    </label>
                                    <label class="form-check form-check-custom form-check-solid  form-check-sm mb-2">
                                        <input name="social_platform[]" class="form-check-input" type="checkbox" value="32"/>
                                        <span class="form-check-label">
                                            {{__('categorias.sociales.32')}}
                                            </span>
                                    </label>	
                                </div>	
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<div class="row g-6 mb-6 g-xl-9 mb-xl-9  align-items-stretch" id="conexiones">
	</div>
</div>
@endsection

@push('js-scripts')
<script>
	let next = document.getElementById('next');
	let back = document.getElementById('back');
	let primero = document.getElementById('primero');
	let segundo = document.getElementById('segundo');

	let inp_pais = document.getElementById('inp_pais');
	let inp_industria_id = document.getElementById('inp_industria_id');
	let inp_ventas = document.getElementById('inp_ventas');
	let inp_capital_institucional = document.getElementById('inp_capital_institucional');
	let inp_prestamo_financiero = document.getElementById('inp_prestamo_financiero');
	let inp_equipo = document.getElementById('inp_equipo');
	let capitalcontenedor = document.getElementById('capitalcontenedor');
	let inp_experiencia = document.getElementById('inp_experiencia');
	let inp_fundador = document.getElementById('inp_fundador');
	let formacioncontenedor = document.getElementById('formacioncontenedor');
	let inp_seguidores = document.getElementById('inp_seguidores');
	let plataformacontenedor = document.getElementById('plataformacontenedor');

	next.addEventListener('click', () => {
		primero.classList.add('d-none');
		segundo.classList.remove('d-none');
	});

	back.addEventListener('click', () => {
		segundo.classList.add('d-none');
		primero.classList.remove('d-none');
	});
	$('#inp_pais').change(() => {
		buscar();
	});
	$('#inp_industria_id').change(() => {
		buscar();
	});
	$('#inp_ventas').change(() => {
		buscar();
	});
	$('#inp_capital_institucional').change(() => {
		buscar();
	});
	$('#inp_prestamo_financiero').change(() => {
		buscar();
	});
	$('#inp_equipo').change(() => {
		buscar();
	});
	$('#inp_experiencia').change(() => {
		buscar();
	});
	$('#inp_fundador').change(() => {
		buscar();
	});
	$('#inp_seguidores').change(() => {
		buscar();
	});
	$('#capitalcontenedor input[type="checkbox"]').change(() => {
		buscar();
	});
	$('#formacioncontenedor input[type="checkbox"]').change(() => {
		buscar();
	});
	 $('#plataformacontenedor input[type="checkbox"]').change(() => {
		buscar();
	});

	$('input[type=radio][name=perfil]').change(function() {
		setFiltros(this.value);
		buscar();
	});

	let setFiltros = (value) => {
		if (value == 'startup') {
			inp_ventas.classList.remove('d-none');
			inp_equipo.classList.remove('d-none');
			inp_capital_institucional.classList.remove('d-none');
			inp_prestamo_financiero.classList.remove('d-none');
		} else {
			inp_ventas.classList.add('d-none');
			inp_equipo.classList.add('d-none');
			inp_capital_institucional.classList.add('d-none');
			inp_prestamo_financiero.classList.add('d-none');
		}
		if (value == 'firma') {
			capitalcontenedor.classList.remove('d-none');
		} else {
			capitalcontenedor.classList.add('d-none');
		}
		if (value == 'mentores' || value == 'expertos') {
			inp_experiencia.classList.remove('d-none');
			inp_fundador.classList.remove('d-none');
		} else {
			inp_experiencia.classList.add('d-none');
			inp_fundador.classList.add('d-none');
		}
		if (value == 'inversionista') {
			formacioncontenedor.classList.remove('d-none');
		} else {
			formacioncontenedor.classList.add('d-none');
		}
		if (value == 'influencer') {
			inp_seguidores.classList.remove('d-none');
			plataformacontenedor.classList.remove('d-none');
		} else {
			inp_seguidores.classList.add('d-none');
			plataformacontenedor.classList.add('d-none');
		}
		if (value == 'startup' || value == 'influencer' || value == 'expertos') {
			inp_industria_id.classList.remove('d-none');
		} else {
			inp_industria_id.classList.add('d-none');
		}
	};
	setFiltros('startup');
	let conexiones = document.getElementById('conexiones');
	@include('template.panel.conexiones.createCard')
	let buscar = async () => {
		let sendData = new FormData(document.getElementById('formFiltros'));
		sendData.append('perfil', document.querySelector('input[type=radio][name=perfil]:checked').value);
		await axios.post("{{route('conexiones.get')}}", sendData)
		.then((response) => {
			let text = ``;
			let conections = response.data.conexiones;
			for (let key in conections) {
				text += createCard(conections[key]);
			}
			conexiones.innerHTML = text;;
		});

	};
	buscar();
</script>
@endpush