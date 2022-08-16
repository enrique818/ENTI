<div id="kt_drawer_chat" class="bg-body" data-kt-drawer="true" data-kt-drawer-name="chat" data-kt-drawer-activate="true" data-kt-drawer-overlay="true" data-kt-drawer-width="{default:'300px', 'md': '500px'}" data-kt-drawer-direction="end" data-kt-drawer-toggle="#abrir_notificaciones" data-kt-drawer-close="#cerrar_notificaciones">
	<div class="card w-100 rounded-0 border-0" id="kt_drawer_chat_messenger">
		<div class="card-header pe-5" id="kt_drawer_chat_messenger_header">
			<div class="card-title">
				<div class="d-flex justify-content-center flex-column me-3">
					<a href="#" class="fs-4 fw-bolder text-gray-900 text-hover-primary me-1 mb-2 lh-1">Notificaciones</a>
					<div class="mb-0 lh-1">
						<span class="badge badge-warning badge-circle w-10px h-10px me-1"></span>
						<span class="fs-7 fw-bold text-muted">Pendientes</span>
					</div>
				</div>
			</div>
			<div class="card-toolbar">
				<div class="btn btn-sm btn-icon btn-active-light-primary" id="cerrar_notificaciones">
					<span class="svg-icon svg-icon-2">
						<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
							<rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="black" />
							<rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="black" />
						</svg>
					</span>
				</div>
			</div>
		</div>
		<div class="card-body" id="kt_drawer_chat_messenger_body">
			<notifications 
			:notifications="notifications"
			v-on:solicitudcambio="modifyNotificacion"
			></notifications>
		</div>
	</div>
</div>