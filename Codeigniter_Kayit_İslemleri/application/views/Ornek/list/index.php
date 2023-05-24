<!DOCTYPE html>
<html lang="en">
<!--begin::Head-->

<head>
	<?= $CI->loadLayout("head"); ?>
	<style>
		.fkAccountWrapper {
			display: none
		}

		.inputNewTag {
			position: absolute;
			top: 28%;
			right: 1rem;
		}

		.inputInfoTag {
			position: absolute;
			top: 28%;
			right: 1rem;
		}

		.autocomplete-suggestions {
			border: 1px solid #ddd;
			background: #FFF;
			overflow: auto;
		}

		.autocomplete-suggestion {
			padding: 10px 5px;
			white-space: nowrap;
			border-bottom: 1px solid #ddd;
			overflow: hidden;
			background: #f5f8fa;
			cursor: pointer;
		}

		.autocomplete-selected {
			background: #F0F0F0;
		}

		.autocomplete-suggestions strong {
			font-weight: normal;
			color: #3399FF;
		}

		.autocomplete-group {
			padding: 2px 5px;
		}

		.autocomplete-group strong {
			display: block;
			border-bottom: 1px solid #000;
		}

		.dataTables_wrapper {
			width: 100% !important;
		}
	</style>

</head>

<body id="kt_body"
	class="header-fixed header-tablet-and-mobile-fixed toolbar-enabled toolbar-fixed <?= config('theme.navbar') == 'aside' ? 'aside-enabled aside-fixed' : '' ?>"
	style="--kt-toolbar-height:15px;--kt-toolbar-height-tablet-and-mobile:55px">
	<?= $CI->loadLayout("header") ?>
	<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
		<!--begin::Post-->
		<div class="post d-flex flex-column-fluid" id="kt_post">
			<!--begin::Container-->
			<div id="kt_content_container" class="container-xxl">
				<!--begin::Card-->
				<div class="card">
					<!--begin::Card header-->
					<div class="card-header border-0 pt-6">
						<!--begin::Card title-->
						<div class="card-title">
							<!--begin::Search-->
							<div class="d-flex align-items-center position-relative my-1">
								<!--begin::Svg Icon | path: icons/duotune/general/gen021.svg-->
								<span class="svg-icon svg-icon-1 position-absolute ms-6">
									<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
										fill="none">
										<rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1"
											transform="rotate(45 17.0365 15.1223)" fill="currentColor" />
										<path
											d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z"
											fill="currentColor" />
									</svg>
								</span>
								<!--end::Svg Icon-->
								<input type="text" data-table-action="search"
									class="form-control form-control-solid w-250px ps-14" placeholder="Müşteri Ara" />
							</div>
							<!--end::Search-->
						</div>
						<!--begin::Card title-->
						<!--begin::Card toolbar-->
						<div class="card-toolbar">
							<!--begin::Toolbar-->
							<div class="d-flex justify-content-end" data-kt-user-table-toolbar="base">
								<div class="export me-3">
									<div id="kt_datatable_example_1_export" class="d-none"></div>
									<!--begin::Export dropdown-->

									<div class="d-none" id="exportTitle">Potansiyel Müşteriler</div>
									<!--begin::Menu-->
									<div id="kt_datatable_example_1_export_menu"
										class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-bold fs-7 w-200px py-4"
										data-kt-menu="true">
										<!--begin::Menu item-->
										<div class="menu-item px-3">
											<a href="#" class="menu-link px-3" data-kt-export="excel">
												Excel'e aktar
											</a>
										</div>
										<!--end::Menu item-->
										<!--begin::Menu item-->
										<div class="menu-item px-3">
											<a href="#" class="menu-link px-3" data-kt-export="csv">
												CSV'e aktar
											</a>
										</div>
										<!--end::Menu item-->
										<!--begin::Menu item-->
										<div class="menu-item px-3">
											<a href="#" class="menu-link px-3" data-kt-export="pdf">
												PDF'e aktar
											</a>
										</div>
										<!--end::Menu item-->
										<!--begin::Menu item-->
										<div class="menu-item px-3">
											<a href="#" class="menu-link px-3" data-kt-export="print">
												Yazdır
											</a>
										</div>
										<!--end::Menu item-->
									</div>
									<!--end::Menu-->
									<!--end::Export dropdown-->
								</div>
								<?php
								if (isCanOr("add-potential-customer")) {
									?>
									<!--begin::Add user-->
									<button type="button" class="btn btn-primary np-add">
										<!--begin::Svg Icon | path: icons/duotune/arrows/arr075.svg-->
										<span class="svg-icon svg-icon-2">
											<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
												viewBox="0 0 24 24" fill="none">
												<rect opacity="0.5" x="11.364" y="20.364" width="16" height="2" rx="1"
													transform="rotate(-90 11.364 20.364)" fill="currentColor" />
												<rect x="4.36396" y="11.364" width="16" height="2" rx="1"
													fill="currentColor" />
											</svg>
										</span>
										<!--end::Svg Icon-->Yeni Oluştur
									</button>
									<!--end::Add user-->
									<?php
								}
								?>
							</div>
							<!--end::Toolbar-->
							<!--begin::Group actions-->
							<div class="d-flex justify-content-end align-items-center d-none"
								data-kt-user-table-toolbar="selected">
								<div class="fw-bolder me-5">
									<span class="me-2" data-kt-user-table-select="selected_count"></span>Selected
								</div>
								<button type="button" class="btn btn-danger"
									data-kt-user-table-select="delete_selected">
									Delete Selected
								</button>
							</div>
							<!--end::Group actions-->
						</div>
						<!--end::Card toolbar-->
					</div>
					<!--end::Card header-->
					<!--begin::Card body-->
					<div class="card-body py-4">
						<!--begin::Table-->
						<table class="table align-middle table-row-dashed fs-6 gy-5" id="customers-table">
							<!--begin::Table head-->
							<thead>
								<!--begin::Table row-->
								<tr class="text-start text-muted fw-bolder fs-7 text-uppercase gs-0">
									<th class="text-start w-50px pe-2">
										#
									</th>

									<th class="min-w-125px">AD</th>
									<th class="min-w-125px">SOYAD</th>
									<th class="min-w-125px">EMAİL</th>
									<th class="text- min-w-100px">İŞLEM</th>
								</tr>
								<!--end::Table row-->
							</thead>
							<!--end::Table head-->
							<!--begin::Table body-->
							<tbody class="text-gray-600 fw-bold">
								<?php foreach ($orneks as $ornek): ?>
									<tr>
										<td>
											<?php echo $ornek['ornekId'] ?>
										</td>
										<td>
											<?php echo $ornek['ornekAd'] ?>
										</td>
										<td>
											<?php echo $ornek['ornekSoyad'] ?>
										</td>
										<td>
											<?php echo $ornek['ornekEmail'] ?>
										</td>


										<td> <button data-url="<?php echo base_url('ornek/delete/' . $ornek['ornekId']); ?>"
												class="btn btn-sm btn-danger btn-outline remove-btn">
												<i class="fa fa-trash"></i> Sil
											</button>
											<button data-url="<?php echo base_url('ornek/find/' . $ornek['ornekId']); ?>"
												class="btn btn-sm btn-primary btn-outline update-btn">
												<i class="fa fa-pen"></i> Düzenle
											</button>
										</td>
									</tr>
								<?php endforeach; ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
			<!--end::Container-->
		</div>






		<!-- Düzenleme Formu Modal -->


		<div class="modal fade" id="duzenleModal" tabindex="-1" aria-labelledby="duzenleModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title text-center w-100" id="duzenleModalLabel">Kişiyi Düzenle</h5>
						<button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
					</div>
					<form method="post" id="editUserForm">

					<input type="hidden" name="userId" id="id" class="form-control">
					<div class="modal-body">
							<div class="mb-3">

								<label for="ad" class="form-label">Ad</label>
								<input type="text" name="ad" id="ad" class="form-control">

							</div>
							<div class="mb-3">
								<label for="soyad" class="form-label">Soyad</label>
								<input type="text" name="soyad" id="soyad" class="form-control">
							</div>
							<div class="mb-3">
								<label for="email" class="form-label">E-posta</label>
								<input type="email" name="email" id="email" class="form-control">

							</div>

						
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary btn-ipt" data-dismiss="modal">İptal</button>
						<button type="submit" class="btn btn-primary update-btn2">Kaydet</button>
					</div>
					</form>

				</div>
			</div>
		</div>

















		<!--end::Post-->
	</div>

	<div class="modal fade" id="kt_modal_add_customer" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
		aria-hidden="true">
		<!--begin::Modal dialog-->
		<div class="modal-dialog modal-dialog-centered modal-lg">
			<!--begin::Modal content-->
			<div class="modal-content">
				<!--begin::Modal header-->
				<div class="modal-header" id="kt_modal_add_user_header">
					<!--begin::Modal title-->
					<h2 class="fw-bolder">Yeni Kişi Oluştur</h2>
					<!--end::Modal title-->
					<!--begin::Close-->
					<div class="btn btn-icon btn-sm btn-active-icon-primary" data-bs-dismiss="modal">
						<!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
						<span class="svg-icon svg-icon-1">
							<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
								fill="none">
								<rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1"
									transform="rotate(-45 6 17.3137)" fill="currentColor" />
								<rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)"
									fill="currentColor" />
							</svg>
						</span>
						<!--end::Svg Icon-->
					</div>
					<!--end::Close-->
				</div>
				<!--end::Modal header-->
				<!--begin::Modal body-->
				<div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
					<!--begin::Form-->
					<form id="addCustomerForm" enctype="multipart/form-data" class="form"
						action="<?= base_url('ornek/create') ?>">

						<input type="hidden" name="action" value="ADD">
						<!--begin::Scroll-->
						<div class="d-flex flex-column scroll-y me-n7 pe-7" id="kt_modal_add_user_scroll"
							data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}"
							data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_add_user_header"
							data-kt-scroll-wrappers="#kt_modal_add_user_scroll" data-kt-scroll-offset="300px">
							<!--begin::Input group-->
							<!--end::Input group-->
							<div class="row">
								<div class="fv-row mb-7 text-center">

								</div>
								<div class="row">
									<div class="col-lg-12">
										<div class="fv-row row mb-5">
											<!--begin::Input group-->
											<div class="col-md-12 col-sm-12 fv-row">
												<!--begin::Label-->
												<label data-np-type="CORPORATE" class="required fw-bold fs-6 mb-2">
													Ad</label>
												<!--end::Label-->
												<!--begin::Input-->
												<input type="text" name="name"
													class="form-control form-control-lg form-control-solid" required>
												<!--end::Input-->
											</div>

											<!--end::Input group-->
										</div>
										<div class="fv-row row mb-5">
											<!--begin::Input group-->
											<div class="col-md-12 col-sm-12 fv-row">
												<!--begin::Label-->
												<label data-np-type="CORPORATE" class="required fw-bold fs-6 mb-2">
													Soyad</label>
												<!--end::Label-->
												<!--begin::Input-->
												<input type="text" name="surname"
													class="form-control form-control-lg form-control-solid" required>
												<!--end::Input-->
											</div>
											<!--end::Input group-->
										</div>
										<div class="fv-row row mb-5">
											<!--begin::Input group-->
											<div class="col-md-6 col-sm-12 fv-row">
												<!--begin::Label-->
												<label class="fw-bold fs-6 mb-2">Email</label>
												<!--end::Label-->
												<!--begin::Input-->
												<input type="email" name="email"
													class="form-control form-control-lg form-control-solid">
												<!--end::Input-->
											</div>
											<!--end::Input group-->
											<!--begin::Input group-->

											<!--end::Input group-->
										</div>
										<div class="fv-row row mb-5">

										</div>
									</div>
								</div>
							</div>
						</div>
						<!--end::Scroll-->
						<!--begin::Actions-->
						<div class="text-center pt-15">
							<button type="reset" class="btn btn-light me-3" data-kt-users-modal-action="cancel"
								data-bs-dismiss="modal">
								Kapat
							</button>
							<button type="submit" class="btn btn-primary" data-kt-users-modal-action="submit">
								<span class="indicator-label">Kaydet</span>
								<span class="indicator-progress">Please wait...
									<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
							</button>
						</div>
						<!--end::Actions-->
					</form>
					<!--end::Form-->
				</div>
				<!--end::Modal body-->
			</div>
			<!--end::Modal content-->
		</div>
		<!--end::Modal dialog-->
	</div>


	<div class="modal fade" data-bs-backdrop="static" data-bs-keyboard="false" id="addCustomerGroupModal" tabindex="-1"
		aria-hidden="true">
		<!--begin::Modal dialog-->
		<div class="modal-dialog modal-dialog-centered mw-650px">
			<!--begin::Modal content-->
			<div class="modal-content">
				<!--begin::Modal header-->
				<div class="modal-header" id="kt_modal_add_user_header">
					<!--begin::Modal title-->
					<h2 class="fw-bolder modal-title">Yeni Müşteri Grubu Oluştur</h2>
					<!--end::Modal title-->
					<!--begin::Close-->
					<div class="btn btn-icon btn-sm btn-active-icon-primary" data-bs-dismiss="modal">
						<!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
						<span class="svg-icon svg-icon-1">
							<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
								fill="none">
								<rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1"
									transform="rotate(-45 6 17.3137)" fill="currentColor" />
								<rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)"
									fill="currentColor" />
							</svg>
						</span>
						<!--end::Svg Icon-->
					</div>
					<!--end::Close-->
				</div>
				<!--end::Modal header-->
				<!--begin::Modal body-->
				<div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
					<!--begin::Form-->
					<form id="addCustomerGroupForm" enctype="multipart/form-data" class="form" action="#">
						<input type="hidden" name="action" value="ADD">
						<!--begin::Scroll-->
						<div class="d-flex flex-column scroll-y me-n7 pe-7" id="kt_modal_add_user_scroll"
							data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}"
							data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_add_user_header"
							data-kt-scroll-wrappers="#kt_modal_add_user_scroll" data-kt-scroll-offset="300px">
							<div class="row">
								<!--begin::Input group-->
								<div class="fv-row mb-7">
									<!--begin::Label-->
									<label class="fw-bold fs-6 mb-2">Başlık</label>
									<!--end::Label-->
									<!--begin::Input-->
									<div class="position-relative mb-3">
										<input class="form-control form-control-lg form-control-solid" type="text"
											name="title">
									</div>
									<!--end::Input-->
								</div>
							</div>
						</div>
						<!--end::Scroll-->
						<!--begin::Actions-->
						<div class="text-center pt-15">
							<button type="reset" class="btn btn-light me-3" data-bs-dismiss="modal">Kapat
							</button>
							<button type="submit" class="btn btn-primary" data-kt-users-modal-action="submit">
								<span class="indicator-label">Kaydet</span>
								<span class="indicator-progress">Please wait...
									<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
							</button>
						</div>
						<!--end::Actions-->
					</form>





















					<!--end::Form-->
				</div>
				<!--end::Modal body-->
			</div>
			<!--end::Modal content-->
		</div>
		<!--end::Modal dialog-->
	</div>


	<?= $CI->loadLayout("footer") ?>

	<!--begin::Page Vendors Javascript(used by this page)-->
	<script src="<?= public_url() ?>assets/plugins/custom/fullcalendar/fullcalendar.bundle.js"></script>
	<script src="<?= public_url() ?>assets/plugins/custom/datatables/datatables.bundle.js"></script>
	<!--end::Page Vendors Javascript-->
	<!--begin::Page Custom Javascript(used by this page)-->
	<script src="<?= public_url() ?>assets/js/widgets.bundle.js"></script>
	<script src="<?= public_url() ?>assets/js/custom/widgets.js"></script>
	<script src="<?= public_url() ?>assets/js/custom/apps/chat/chat.js"></script>
	<script src="<?= public_url() ?>assets/js/custom/utilities/modals/upgrade-plan.js"></script>
	<script src="<?= public_url() ?>assets/js/custom/utilities/modals/create-app.js"></script>
	<script src="<?= public_url() ?>assets/js/custom/utilities/modals/users-search.js"></script>
	<!--end::Page Custom Javascript-->
	<script>


var tempUSERID;
$(document).ready(function () {
    $('.remove-btn').click(function () {
        var url = $(this).data('url');

        Swal.fire({
            icon: 'warning',
            title: 'Bu öğeyi silmek istediğinize emin misiniz?',
            showCancelButton: true,
            confirmButtonText: 'Sil',
            cancelButtonText: 'Vazgeç'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: url,
                    type: 'POST',
                    success: function (response) {
                        // Silme işlemi başarılı olduğunda yapılacak işlemler
                        console.log(response);

                        // SweetAlert mesajını göster
                        Swal.fire({
                            icon: 'success',
                            title: 'Başarılı',
                            text: 'Öğe başarıyla silindi!',
                            showConfirmButton: false,
                            timer: 3500
                        });

                        location.reload(); // Sayfayı yeniden yükle
                    },
                    error: function (xhr, status, error) {
                        // Hata durumunda bildirim kutusu göster
                        Swal.fire({
                            icon: 'error',
                            title: 'Hata',
                            text: 'Öğe silinirken bir hata oluştu!',
                            showConfirmButton: false,
                            timer: 1500
                        });
                    }
                });
            }
        });
    });
});


		$(document).on("click", ".np-add", function (e) {
			e.preventDefault();
			$("#kt_modal_add_customer").modal("show");
		})



		$(document).on('submit', '#addCustomerForm', function (e) {
			e.preventDefault(); // Formun normal submit işlemini engelle

			var form = $(this);
			var url = form.attr('action'); // action attribute'undan URL'yi al
			var formData = new FormData(form[0]);

			$.ajax({
				type: 'POST',
				url: url,
				data: formData,
				processData: false,
				contentType: false,
				success: function (response) {
					// Başarılı bir şekilde yeni kişi oluşturulduğunda yapılacak işlemler
					console.log(response);

					// Bildirim kutusu göster
					Swal.fire({
						icon: 'success',
						title: 'Başarılı',
						text: 'Yeni kişi başarıyla oluşturuldu!',
						showConfirmButton: false,
						timer: 1500
					});

					// Sayfayı yenile
					location.reload();
				},
				error: function (xhr, status, error) {
					// Hata durumunda bildirim kutusu göster
					Swal.fire({
						icon: 'error',
						title: 'Hata',
						text: 'Kişi oluşturulurken bir hata oluştu!',
						showConfirmButton: false,
						timer: 1500
					});
				}
			});
		});


		// Düzenleme butonlarının seçimi
		$(document).on('click', '.update-btn', function () {
			var url = $(this).attr('data-url');

			$.ajax({
				type: 'GET',
				url: url,
				dataType: 'json',
				success: function (response) {
				
					$('#ad').val(response.data.ornekAd);
					$('#soyad').val(response.data.ornekSoyad);
					$('#email').val(response.data.ornekEmail);
				
					
					tempUSERID = response.data.ornekId;
					
					$('#duzenleModal').modal('show');
				}

			});
});

	$(document).on('submit', '#editUserForm', function(e){
		e.preventDefault();
		
		let formData = new FormData(this);
		formData.append('userId', tempUSERID);

		$.ajax({
			type:'POST',
			url: baseUrl + 'Ornek/update',
			dataType: 'json',
			data: formData,
			contentType: false,
			cache: false,
			processData: false,
			success: function(response){
				if(response.status ===1){
					Swal.fire({
                        icon:'success',
                        title: 'Başarılı',
                        text: response.message,
                        showConfirmButton: false,
                        
                    }).then(r => {
						window.location.reload();
					});
				
					setTimeout(function(){
						window.location.reload();
					}, 1500);
				
				}else{
					Swal.fire({
						icon:'error',
						title: 'Hata',
						text: response.message,
						showConfirmButton: false,
						
					});
				}
			}
		})
	})






		$(".update-btn").click(function () {
			$("#duzenleModal").modal("show");
		});



		$(".btn-close").click(function () {
			$("#duzenleModal").modal("hide");
		});





		$(".btn-ipt").click(function () {
			$("#duzenleModal").modal("hide");
		});






		$(document).ready(function () {
			var t = $("#customers-table").DataTable().on("draw", function () {
				KTMenu.createInstances();
				$('[data-bs-toggle="tooltip"]').tooltip();
			});

			// Hook export buttons

		})
	</script>
	<!--end::Javascript-->
</body>
<!--end::Body-->

</html>