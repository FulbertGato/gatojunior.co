	<!--start services-->
	<section class="r-bg-i sec-pad" id="service">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-lg-8">
					<div class="sec-heading text-center pera-block">
						<h2>See what we can <span class="ree-text rt40">do</span> for <span class="ree-text rt40">you</span></h2>
						<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor.</p>
					</div>
				</div>
			</div>

			<div class="row mt30">
                @foreach ($services as $service )


				<div class="col-lg-4 col-sm-6" data-aos="fade-up" data-aos-delay="100">
					<div class="ree-card r-bg-c mt60">
						<div class="ree-card-img shadows"><img src="{{asset($service->icon_service)}}" alt="services"> </div>
						<div class="ree-card-content mt40">
							<h3 class="mb15"><a href="service-details.html">{{$service->name_service}}</a></h3>
							<p>{{$service->description_service}}</p>
						</div>
						<div class="ree-card-content-link">
							<a href="service-details.html" class="ree-card-link mt40">Read More <i class="fas fa-arrow-right fa-btn"></i> </a>
						</div>
					</div>
				</div>

                @endforeach

			</div>

			<div class="cta-block-wide mt100">
				<div class="row justify-content-center text-center">
					<div class="col-lg-10 vcenter">
						<div class="cta-heading-wide-bt">
							<h3>Hire World-Class <span class="ree-text rt40">Developers</span></h3>
							<a href="get-quote.html" class="ree-btn  ree-btn-grdt1 mw-80">Hire Now <i class="fas fa-arrow-right fa-btn"></i></a>
						</div>
					</div>

				</div>
			</div>
		</div>
	</section>
	<!--services end-->
