

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Exam Students</title>
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
<body style="background-color: #f2f7f8;">
	<!-- Page Preloder -->
	{{--  <div id="preloder">
		<div class="loader"></div>
	</div>  --}}
	
	<!-- Header section start -->
	<header class="header-section">
		<div class="container-fluid">
			<div class="row">
                <div class="col-md-4">
					<div class="site-logo">
						<h2>{{ $exam->Course }} Students</h2>
                    </div>
				</div>
			</div>
		</div>
	</header>
	<!-- Header section end -->

	<!-- Hero section start -->
	<section style="padding-top : 0" class="hero-section spad">
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-12">
					<div class="hero-info">
						<div class="col-lg-12">
							@if (count($students) > 0)
							<table class="table table-striped table-dark">
								<thead>
								  <tr>
									<th scope="col">Name</th>
									<th scope="col">Email</th>
									<th scope="col">Phone Number</th>
									<th scope="col">Score</th>
								  </tr>
								</thead>
								<tbody>
								@foreach ($students as $stu)
								  <tr>
									<th scope="row">{{ $stu->user->name }}</th>
									<td>{{ $stu->user->email }}</td>
									<td>{{ $stu->user->phone }}</td>
									<td>{{ ((int)$stu->score / count($stu->exam->questions)) * 100 }} %</td>
								  </tr>
								@endforeach
								</tbody>
							</table>
							@endif
							
							
						</div>
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


