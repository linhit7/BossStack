@extends('home.layout')

@section('content')

	<section class="element-section element-bg-1 element-career-1">
		<div class="container">
			
			<div class="position-career">
				<div class="row">
					<div class="col-md-7">
						<h1 class="mb-5"><font size="6">VỊ TRÍ TUYỂN DỤNG</font></h1>

						<p class="text-justify">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. </p>
					</div>
					<div class="col-md-5">
						<img src="{{ asset('img/career-1.png') }}" width="100%">
					</div>
				</div>
			</div>

		</div>
	</section>

	<section class="element-section element-bg-career element-career-2">
		<div class="container">
			
			<div class="list-career">
				<div class="row">
					<div class="col-md-12">
						<div class="list-career-item d-flex">

							<div class="info-career">
								<h4 class="mb-3"><font color="#fff">Thiết kế đồ họa</font></h4>
								<div class="info">
									<span>Toàn thời gian</span> | <span>Hồ Chí Minh</span> | <span><b>Ngày đăng:</b> 13/04/2020</span>
								</div>
							</div>

							<div class="recruitment align-self-center text-right">
								<a href="{{ route('recruitment-details') }}" class="btn btn-recruitment"><b>Ứng tuyển</b></a>
							</div>

						</div>

						<div class="list-career-item d-flex">

							<div class="info-career">
								<h4 class="mb-3"><font color="#fff">Thiết kế UX/UI</font></h4>
								<div class="info">
									<span>Toàn thời gian</span> | <span>Hồ Chí Minh</span> | <span><b>Ngày đăng:</b> 13/04/2020</span>
								</div>
							</div>

							<div class="recruitment align-self-center text-right">
								<a href="#" class="btn btn-recruitment"><b>Ứng tuyển</b></a>
							</div>

						</div>

					</div>
				</div>
			</div>

		</div>
	</section>

@endsection

@section('scripts')
	@include('home.partials.script')
@endsection