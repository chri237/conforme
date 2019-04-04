@extends('admin.tpl.admintpl')

@section('content')

<div class="row">
	<form action="{{route('createemployee')}}" id="create-employee" method="post">
		{{ csrf_field() }}
	<div class="eq-height">
		<div class="col-sm-6 eq-box-sm">
			<div class="panel">
				<div class="panel-heading">

					<h3 class="panel-title">Informations personnel</h3>
				</div>
				<!--Block Styled Form -->
				<!--===================================================-->

					<div class="panel-body">
						<div class="row">
							<div class="col-sm-6">
								<div class="form-group">
									<label class="control-label">Nom</label>
									<input type="text" class="form-control" id="nom" name="nom">
								</div>
							</div>
							<div class="col-sm-6">
								<div class="form-group">
									<label class="control-label">Prenom</label>
									<input type="text" class="form-control" id="prenom" name="prenom">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-6">
								<div class="form-group">
									<label class="control-label">Email</label>
									<input type="email" class="form-control" id="email" name="email">
								</div>
							</div>
							<div class="col-sm-6">
								<div class="form-group">
									<label class="control-label">whatsapp</label>
									<input type="texte" class="form-control" id="whatsapp" name="whatsapp">
								</div>
							</div>

						</div>
						<div class="row">
							<div class="col-sm-6">
								<div class="form-group">
									<label class="control-label">Telephone 1</label>
									<input type="number" class="form-control" id="tel1" name="tel1">
								</div>
							</div>
							<div class="col-sm-6">
								<div class="form-group">
									<label class="control-label">Telephone 2</label>
									<input type="number" class="form-control" id="tel2" name="tel2">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-12">
								<div class="form-group">
									<label class="control-label">Adresse</label>
									<textarea placeholder="Address here..." rows="6" id="adresse" name="adresse" class="form-control"></textarea>
								</div>
							</div>

						</div>


					</div>


				<!--===================================================-->
				<!--End Block Styled Form -->
			</div>
		</div>
		<div class="col-sm-6 eq-box-sm">
			<div class="panel">
				<div class="panel-heading">

					<h3 class="panel-title">Informations professionnelle</h3>
				</div>
				<!--Horizontal Form-->
				<!--===================================================-->

					<div class="panel-body">
						<div class="row">
							<div class="col-sm-12">
								<div class="form-group">
									<label class="control-label">Poste</label>
									<input type="text" class="form-control" id="poste" name="poste">
								</div>
							</div>

						</div>

					<div class="row">
						<div class="col-sm-12">
							<div class="form-group">
								<label class="control-label">Login</label>
								<input type="text" class="form-control" id="login" name="login">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-12">
							<div class="form-group">
								<label class="control-label">Password</label>
								<input type="password" class="form-control" id="password" name="password">
							</div>
						</div>

					</div>

					</div>

				<!--===================================================-->
				<!--End Horizontal Form-->
			</div>
		</div>
	</div>
	<div class="row container">
		<div class="col-sm-12">
			<div class="panel">
				<div class="panel-footer text-right">
					<button class="btn btn-info" type="submit">Créer</button>
				</div>
			</div>
		</div>
	</div>
	</form>
</div>


@endsection

@section('addlibjs')
<!--Bootstrap Validator [ OPTIONAL ]-->
<link href="{{ asset('assets/plugins/bootstrapValidator.min.css') }}" rel="stylesheet">
<script src="{{ asset('assets/plugins/bootstrap-validator/bootstrapValidator.min.js') }}"></script>
<!--Form validation [ SAMPLE ]-->
<script src="{{ asset('assets/js/demo/form-validation.js') }}"></script>
<script src="{{ asset('js/admin/employees/creer.js') }}"></script>

@stop
