let createCard = (carta) => {
		let url = "{{route('user.show', ['user' => 'userId'])}}";
		let urlChat = "{{route('user.chat', ['user' => 'userId'])}}";
		url = url.replace('userId', carta.id);
		urlChat = urlChat.replace('userId', carta.id);
		let desc = '';
		if (carta.descripcion == null) {
			carta.descripcion = '';
			desc = `<div class="d-flex flex-center flex-wrap mb-2" style="max-width: 100%">
					<p class="text-truncate text-center" style="-webkit-line-clamp: 3; display: -webkit-box; -webkit-box-orient: vertical; white-space: normal;">${carta.descripcion}</p>
				</div>`;
		}
		if (carta.ventas_anuales == null) {
			carta.ventas_anuales = '';
		}
		let industria = '';
		if (carta.industria_nombre != '') {
			if (carta.perfil == 'startup' || carta.perfil == 'expertos' || carta.perfil == 'influencer'){
				industria = `<div class="fw-bold text-gray-500 mb-2">${carta.industria_nombre}</div>`;
			}else{
				industria = `<div class="fw-bold text-gray-500 mb-2"></div>`;				
			}	
		}
		let ventas = ``;
		if (carta.perfil == 'startup' && carta.ventas_anuales != '') {
			ventas = `<div class="fw-bold text-gray-500 mb-2">${carta.ventas_anuales}</div>`;
		}
		return `<div class="col-md-6 col-xxl-4">
		<div class="card h-100">
			<div class="card-body d-flex flex-center flex-column p-9">
				<div class="symbol symbol-65px symbol-circle mb-5">
					<img src="${carta.asset_img}" alt="image" />
				</div>
				<a href="#" class="fs-4 text-gray-800 text-hover-primary fw-bolder mb-0">${carta.nombre}</a>
				<div class="fw-bold text-gray-400 mb-2"><span class="badge badge-primary">${carta.rol}</span></div>
				<div class="fw-bold text-gray-600 mb-2">${carta.pais}</div>
				${industria}
				${ventas}
				${desc}
				<div class="h-100 d-flex justify-content-center align-items-end">
					<a href="${urlChat}" class="btn me-2 btn-sm btn-light-rosa">
						Abrir chat
						<span class="svg-icon svg-icon-4 ms-1"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
						<path d="M19 10C18.9 10 18.9 10 18.8 10C18.9 9.7 19 9.3 19 9C19 7.3 17.7 6 16 6C15.4 6 14.8 6.2 14.3 6.5C13.4 5 11.8 4 10 4C7.2 4 5 6.2 5 9C5 9.3 5.00001 9.7 5.10001 10H5C3.3 10 2 11.3 2 13C2 14.7 3.3 16 5 16H9L13.4 20.4C14 21 15 20.6 15 19.8V16H19C20.7 16 22 14.7 22 13C22 11.3 20.7 10 19 10Z" fill="black"/>
						</svg></span>
					</a>
					<a href="${url}" class="btn btn-sm btn-light-primary">
						Ver perfil
						<span class="svg-icon svg-icon-4 ms-1">
							<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
								<rect opacity="0.5" x="18" y="13" width="13" height="2" rx="1" transform="rotate(-180 18 13)" fill="black" />
								<path d="M15.4343 12.5657L11.25 16.75C10.8358 17.1642 10.8358 17.8358 11.25 18.25C11.6642 18.6642 12.3358 18.6642 12.75 18.25L18.2929 12.7071C18.6834 12.3166 18.6834 11.6834 18.2929 11.2929L12.75 5.75C12.3358 5.33579 11.6642 5.33579 11.25 5.75C10.8358 6.16421 10.8358 6.83579 11.25 7.25L15.4343 11.4343C15.7467 11.7467 15.7467 12.2533 15.4343 12.5657Z" fill="black" />
							</svg>
						</span>
					</a>
				</div>
			</div>
		</div>
	</div>`;
	};