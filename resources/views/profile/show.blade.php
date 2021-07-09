

<!DOCTYPE html>
<html lang="en">
<head>
	<title>MyProfile Page</title>
	<meta charset="UTF-8">
	<meta name="description" content="MyProfile Page">
	<meta name="keywords" content="resume, civic, onepage, creative, html">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- Favicon -->   

	<!-- Google Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Josefin+Sans:400,400i,600,600i,700" rel="stylesheet">

	<!-- Stylesheets -->
	<link rel="stylesheet" href="/profile/css/bootstrap.min.css"/>
	<link rel="stylesheet" href="/profile/css/font-awesome.min.css"/>
	<link rel="stylesheet" href="/profile/css/flaticon.css"/>
	<link rel="stylesheet" href="/profile/css/owl.carousel.css"/>
	<link rel="stylesheet" href="/profile/css/magnific-popup.css"/>
	<link rel="stylesheet" href="/profile/css/style.css"/>


	<!--[if lt IE 9]>
	  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->

</head>
<body>
	<!-- Page Preloder -->
	<div id="preloder">
		<div class="loader"></div>
	</div>
	
	<!-- Header section start -->
	<header class="header-section">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-4">
                @foreach ($userTable as $prof)

					<div class="site-logo">
						<h2><a href="/profile/{id}">My Profile</a></h2>
                    </div>
                    @endforeach
				</div>
				<div class="col-md-8 text-md-right header-buttons">
					<a href="/" class="site-btn">Home Page</a>
					<a href="/student" class="site-btn">Exam</a>
				</div>
			</div>
		</div>
	</header>
	<!-- Header section end -->

	<!-- Hero section start -->
	<section class="hero-section spad">
		<div class="container-fluid">
			<div class="row">
				<div class="col-xl-10 offset-xl-1">
					<div class="row">
						<div class="col-lg-6">
                            @foreach ($userTable as $user)
							<div class="hero-text">
								<h2>{{$user->name}}</h2>
								<p>I’m a {{$user->type_name}}.</p>
                            </div>
                            
							<div class="hero-info">
								<h2>General Info</h2>
								<ul>
									<li><span>Date of Birth</span>{{$user->birthdate}}</li>
									<li><span>E-mail</span>{{$user->email}}</li>
									<li><span>Phone </span>{{$user->phone}}</li>
									<li><span>id </span>{{$user->id}}</li>
								</ul>
							</div>
							@endforeach
							
                        </div>
                        
						<div class="col-lg-6">
							<figure class="hero-image">
								<img src="https://images.pexels.com/photos/4065864/pexels-photo-4065864.jpeg" alt="5">
							</figure>
						</div>
						@if($usr->type_id == 3)
						<div class="col-lg-12">
							<table class="table table-striped table-dark">
								<thead>
								  <tr>
									<th scope="col">id</th>
									<th scope="col">Course</th>
									<th scope="col">Exam Code</th>
									<th scop="col">Students</th>
								  </tr>
								</thead>
								<tbody>
								@foreach ($usr->exams as $exam)
								  <tr>
									<th scope="row">{{ $exam->Teacher_id }}</th>
									<td>{{ $exam->Course }}</td>
									<td>{{ $exam->uniqueid }}</td>
									<td><a href="{{ route('exam.students', $exam->id) }}" >Show</a></td>
								  </tr>
								@endforeach
								</tbody>
							</table>
							
						</div>
						@endif
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- Hero section end -->

	<!-- Social links section start -->
		
    <!-- Social links section end -->
    
  


	<!--====== Javascripts & Jquery ======-->
	<script src="js/jquery-2.1.4.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/owl.carousel.min.js"></script>
	<script src="js/magnific-popup.min.js"></script>
	<script src="js/circle-progress.min.js"></script>
	<script src="js/main.js"></script>
</body>
</html>


