<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>{{$main->site_title}}</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="{{url($main->fav_icon)}}" />
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet" />
</head>

<body id="page-top">
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
        <div class="container">
            <a class="navbar-brand" href="#page-top"><img src="{{ url($main->logo) }}" alt="..." /></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive"
                aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                Menu
                <i class="fas fa-bars ms-1"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav text-uppercase ms-auto py-4 py-lg-0">
                    <li class="nav-item"><a class="nav-link nav-link2" href="#services">Services</a></li>
                    <li class="nav-item"><a class="nav-link nav-link2" href="#portfolio">Portfolio</a></li>
                    <li class="nav-item"><a class="nav-link nav-link2" href="#about">About</a></li>
                    {{-- <li class="nav-item"><a class="nav-link nav-link2" href="#team">Team</a></li> --}}
                    <li class="nav-item"><a class="nav-link nav-link2" href="#contact">Contact</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Masthead-->
    <header class="masthead" style="background-image: url('{{ url($main->bc_img) }}')">
        <div class="container">
            <div class="masthead-subheading">{{ $main->sub_title }}</div>
            <div class="masthead-heading text-uppercase">{{ $main->title }}</div>
            <a class="btn btn-primary btn-xl text-uppercase" href="{{ url($main->resume) }}">Download CV</a>
        </div>
    </header>
    <!-- Services-->
    <section class="page-section" id="services">
        <div class="container">
            <div class="text-center">
                <h2 class="section-heading text-uppercase">Services</h2>
                <h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3>
            </div>
            <div class="row text-center">

                @foreach ($services as $service)
                    <div class="col-md-4">
                        <span class="fa-stack fa-4x">
                            <i class="fas fa-circle fa-stack-2x text-primary"></i>
                            <i class="{{ $service->icon }} fa-stack-1x fa-inverse"></i>
                        </span>
                        <h4 class="my-3">{{ $service->title }}</h4>
                        <p class="text-muted">{{ $service->description }}</p>
                    </div>
                @endforeach

            </div>
        </div>
    </section>


    <!-- Portfolio Grid-->
    <section class="page-section bg-light" id="portfolio">
        <div class="container">
            <div class="text-center">
                <h2 class="section-heading text-uppercase">Portfolio</h2>
                <h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3>
            </div>
            <div class="d-flex justify-content-center">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                  <li class="nav-item">
                    <a class="nav-link nav-link3 active" id="tab-all" data-toggle="tab" href="#tab-pane-all" role="tab" aria-controls="tab-pane-all" aria-selected="true">All</a>
                  </li>
                  @foreach ($categories as $category)
                    <li class="nav-item">
                      <a class="nav-link nav-link3 nav-link3" id="tab-{{ $category->id }}" data-toggle="tab" href="#tab-pane-{{ $category->id }}" role="tab" aria-controls="tab-pane-{{ $category->id }}" aria-selected="false">{{ $category->name }}</a>
                    </li>
                  @endforeach
                </ul>
              </div>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="tab-pane-all" role="tabpanel" aria-labelledby="tab-all">
                    <div class="row">
                        @foreach ($portfolios as $portfolio)
                            <div class="col-lg-3 col-sm-6 mb-4">
                                <!-- Portfolio item 1-->
                                <div class="portfolio-item">
                                    <a class="portfolio-link" data-bs-toggle="modal"
                                        href="#portfolioModal{{ $portfolio->id }}">
                                        <div class="portfolio-hover">
                                            <div class="portfolio-hover-content"><i class="fas fa-plus fa-3x"></i>
                                            </div>
                                        </div>
                                        <img class="img-fluid" src="{{ url($portfolio->small_img) }}"
                                            alt="..." />
                                    </a>
                                    <div class="portfolio-caption">
                                        <div class="portfolio-caption-heading">{{ $portfolio->title }}</div>
                                        <div class="portfolio-caption-subheading text-muted">
                                            {{ $portfolio->category }}</div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                @foreach ($categories as $category)
                    <div class="tab-pane fade" id="tab-pane-{{ $category->id }}" role="tabpanel"
                        aria-labelledby="tab-{{ $category->id }}">
                        <div class="row">
                            @foreach ($category->portfolios as $portfolio)
                                <div class="col-lg-4 col-sm-6 mb-4">
                                    <!-- Portfolio item 1-->
                                    <div class="portfolio-item">
                                        <a class="portfolio-link" data-bs-toggle="modal"
                                            href="#portfolioModal{{ $portfolio->id }}">
                                            <div class="portfolio-hover">
                                                <div class="portfolio-hover-content"><i class="fas fa-plus fa-3x"></i>
                                                </div>
                                            </div>
                                            <img class="img-fluid" src="{{ url($portfolio->small_img) }}"
                                                alt="..." />
                                        </a>
                                        <div class="portfolio-caption">
                                            <div class="portfolio-caption-heading">{{ $portfolio->title }}</div>
                                            <div class="portfolio-caption-subheading text-muted">
                                                {{ $portfolio->category }}</div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endforeach
            </div>





        </div>
    </section>
    <!-- About-->
    <section class="page-section" id="about">
        <div class="container">
            <div class="text-center">
                <h2 class="section-heading text-uppercase">About</h2>
                <h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3>
            </div>
            <ul class="timeline">

                {{-- timeline-inverted class will be add in next li tag --}}
                @foreach ($abouts as $about)
                    <li class="{{ $about->id % 2 == 0 ? 'even' : 'timeline-inverted' }}">
                        <div class="timeline-image"><img class="rounded-circle img-fluid"
                                src="{{ url($about->img) }}" alt="..." /></div>
                        <div class="timeline-panel">
                            <div class="timeline-heading">
                                <h4>{{ $about->title }}</h4>
                                <h4 class="subheading">{{ $about->title2 }}</h4>
                            </div>
                            <div class="timeline-body">
                                <p class="text-muted">{{ $about->description }}</p>
                            </div>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
    </section>

    <!-- Team-->
    {{-- <section class="page-section bg-light" id="team">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">Our Amazing Team</h2>
                    <h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3>
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="team-member">
                            <img class="mx-auto rounded-circle" src="assets/img/team/1.jpg" alt="..." />
                            <h4>Parveen Anand</h4>
                            <p class="text-muted">Lead Designer</p>
                            <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="Parveen Anand Twitter Profile"><i class="fab fa-twitter"></i></a>
                            <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="Parveen Anand Facebook Profile"><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="Parveen Anand LinkedIn Profile"><i class="fab fa-linkedin-in"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="team-member">
                            <img class="mx-auto rounded-circle" src="assets/img/team/2.jpg" alt="..." />
                            <h4>Diana Petersen</h4>
                            <p class="text-muted">Lead Marketer</p>
                            <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="Diana Petersen Twitter Profile"><i class="fab fa-twitter"></i></a>
                            <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="Diana Petersen Facebook Profile"><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="Diana Petersen LinkedIn Profile"><i class="fab fa-linkedin-in"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="team-member">
                            <img class="mx-auto rounded-circle" src="assets/img/team/3.jpg" alt="..." />
                            <h4>Larry Parker</h4>
                            <p class="text-muted">Lead Developer</p>
                            <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="Larry Parker Twitter Profile"><i class="fab fa-twitter"></i></a>
                            <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="Larry Parker Facebook Profile"><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="Larry Parker LinkedIn Profile"><i class="fab fa-linkedin-in"></i></a>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8 mx-auto text-center"><p class="large text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut eaque, laboriosam veritatis, quos non quis ad perspiciatis, totam corporis ea, alias ut unde.</p></div>
                </div>
            </div>
        </section> --}}


    <!-- Clients-->
    {{-- <div class="py-5">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-3 col-sm-6 my-3">
                        <a href="#!"><img class="img-fluid img-brand d-block mx-auto" src="assets/img/logos/microsoft.svg" alt="..." aria-label="Microsoft Logo" /></a>
                    </div>
                    <div class="col-md-3 col-sm-6 my-3">
                        <a href="#!"><img class="img-fluid img-brand d-block mx-auto" src="assets/img/logos/google.svg" alt="..." aria-label="Google Logo" /></a>
                    </div>
                    <div class="col-md-3 col-sm-6 my-3">
                        <a href="#!"><img class="img-fluid img-brand d-block mx-auto" src="assets/img/logos/facebook.svg" alt="..." aria-label="Facebook Logo" /></a>
                    </div>
                    <div class="col-md-3 col-sm-6 my-3">
                        <a href="#!"><img class="img-fluid img-brand d-block mx-auto" src="assets/img/logos/ibm.svg" alt="..." aria-label="IBM Logo" /></a>
                    </div>
                </div>
            </div>
        </div> --}}


    <!-- Contact-->
    <section class="page-section" id="contact">
        <div class="container">
            <div class="text-center">
                <h2 class="section-heading text-uppercase">Contact Us</h2>
                <h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3>
            </div>
            <!-- * * * * * * * * * * * * * * *-->
            <!-- * * SB Forms Contact Form * *-->
            <!-- * * * * * * * * * * * * * * *-->
            <!-- This form is pre-integrated with SB Forms.-->
            <!-- To make this form functional, sign up at-->
            <!-- https://startbootstrap.com/solution/contact-forms-->
            <!-- to get an API token!-->
            <form id="contactForm" action="{{ route('contact.store') }}" method="POST">
                @csrf
                <div class="row align-items-stretch mb-5">
                    <div class="col-md-6">
                        <div class="form-group">
                            <!-- Name input-->
                            <input class="form-control" id="name" name="name" type="text"
                                placeholder="Your Name *" data-sb-validations="required" required />
                            <div class="invalid-feedback" data-sb-feedback="name:required">A name is required.</div>
                        </div>
                        <div class="form-group">
                            <!-- Email address input-->
                            <input class="form-control" id="email" name="email" type="email"
                                placeholder="Your Email *" data-sb-validations="required,email" required/>
                            <div class="invalid-feedback" data-sb-feedback="email:required">An email is required.
                            </div>
                            <div class="invalid-feedback" data-sb-feedback="email:email">Email is not valid.</div>
                        </div>
                        <div class="form-group mb-md-0">
                            <!-- Phone number input-->
                            <input class="form-control" id="phone" type="tel" name="phone"
                                placeholder="Your Phone *" data-sb-validations="required" required/>
                            <div class="invalid-feedback" data-sb-feedback="phone:required">A phone number is
                                required.</div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group form-group-textarea mb-md-0">
                            <!-- Message input-->
                            <textarea class="form-control" name="message" id="message" placeholder="Your Message *"
                                data-sb-validations="required" required></textarea>
                            <div class="invalid-feedback" data-sb-feedback="message:required">A message is required.
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Submit success message-->
                <!---->
                <!-- This is what your users will see when the form-->
                <!-- has successfully submitted-->

                <!---->
                <!-- This is what your users will see when there is-->
                <!-- an error submitting the form-->

                <!-- Submit Button-->
                <div class="text-center">
                    <div id="success">
                        @include('alert.messeges')
                    </div>
                    <button class="btn btn-primary btn-xl text-uppercase" type="submit">Send Message</button>
                </div>
            </form>
        </div>
    </section>
    <!-- Footer-->
    <footer class="footer py-4">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-4 text-lg-start">Copyright &copy; IS DEV 2023</div>
                <div class="col-lg-4 my-3 my-lg-0">
                    <a class="btn btn-dark btn-social mx-2" href="https://twitter.com/ishtiaqahmeddd"
                        aria-label="Twitter"><i class="fab fa-twitter"></i></a>
                    <a class="btn btn-dark btn-social mx-2" href="https://facebook.com/fb.isdev"
                        aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-dark btn-social mx-2" href="https://www.linkedin.com/in/isdev"
                        aria-label="LinkedIn"><i class="fab fa-linkedin-in"></i></a>
                </div>
                <div class="col-lg-4 text-lg-end">
                    <a class="link-dark text-decoration-none me-3" href="#!">Privacy Policy</a>
                    <a class="link-dark text-decoration-none" href="#!">Terms of Use</a>
                </div>
            </div>
        </div>
    </footer>
    <!-- Portfolio Modals-->

    <!-- Portfolio item 1 modal popup-->
    @foreach ($portfolios as $portfolio)
        <div class="portfolio-modal modal fade" id="portfolioModal<?= $portfolio->id ?>" tabindex="-1"
            role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="close-modal" data-bs-dismiss="modal"><img src="assets/img/close-icon.svg"
                            alt="Close modal" /></div>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-8">
                                <div class="modal-body">
                                    <!-- Project details-->
                                    <h2 class="text-uppercase">{{ $portfolio->title }}</h2>
                                    <p class="item-intro text-muted">{{ $portfolio->subtitle }}</p>
                                    <img class="img-fluid d-block mx-auto" src="{{ url($portfolio->big_img) }}"
                                        alt="..." />
                                    <p>{{ $portfolio->description }}</p>
                                    <ul class="list-inline">
                                        <li>
                                            <strong>Client:</strong>
                                            {{ $portfolio->client }}
                                        </li>
                                        <li>
                                            <strong>Category:</strong>
                                            {{ $portfolio->category }}
                                        </li>
                                    </ul>
                                    <button class="btn btn-primary btn-xl text-uppercase" data-bs-dismiss="modal"
                                        type="button">
                                        <i class="fas fa-xmark me-1"></i>
                                        Close Project
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach


    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="{{ asset('js/scripts.js') }}"></script>
    <script src="{{ asset('js/tab.js') }}"></script>
    <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
    <!-- * *                               SB Forms JS                               * *-->
    <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
    <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
    <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>





</body>

</html>
