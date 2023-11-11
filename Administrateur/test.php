

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Dashboard CQMP</title>
<style>
  html,
  body {
    position: relative;
    width: 100vw;
    height: 100vh;
    margin: 0;
    padding: 0;
  }

  body {
    display: inline-block;
    width: 1000px; /* Adjust the width as needed */
    font-family: "Lato", verdana, sans-serif;
  }

  .horizontal.timeline {
    display: flex;
    position: relative;
    flex-direction: row;
    justify-content: space-between;
    align-items: center;
    width: 100%;
  }

  .horizontal.timeline::before {
    content: "";
    display: block;
    position: absolute;
    width: 100%;
    height: 0.2em;
    background-color: lighten(#000, 95%);
  }

  .horizontal.timeline .line {
    display: block;
    position: absolute;
    width: 70%; /* Initial width set to 0% */
    height: 0.2em;
    background-color: #8897ec;
    transition: width 0.5s ease; /* Add a smooth width transition */
  }

  .horizontal.timeline .steps {
    display: flex;
    position: relative;
    flex-direction: row;
    justify-content: space-between;
    align-items: center;
    width: 100%;
  }

  .horizontal.timeline .steps .step {
    display: block;
    position: relative;
    bottom: calc(100% + 1em);
    padding: 0.33em;
    margin: 0 2em;
    box-sizing: content-box;
    color: #8897ec;
    background-color: currentColor;
    border: 0.25em solid white;
    border-radius: 50%;
    z-index: 500;
  }

  .horizontal.timeline .steps .step:first-child {
    margin-left: 0;
  }

  .horizontal.timeline .steps .step:last-child {
    margin-right: 0;
    color: #71cb35;
  }

  .horizontal.timeline .steps .step span {
    position: absolute;
    top: calc(100% + 1em);
    left: 50%;
    transform: translateX(-50%);
    white-space: nowrap;
    color: #000;
    opacity: 0.4;
  }

  .horizontal.timeline .steps .step.current:before {
    content: "";
    display: block;
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    padding: 1em;
    background-color: currentColor;
    border-radius: 50%;
    opacity: 0;
    z-index: -1;
    animation-name: animation-timeline-current;
    animation-duration: 2s;
    animation-iteration-count: infinite;
    animation-timing-function: ease-out;
  }

  .horizontal.timeline .steps .step.current span {
    opacity: 0.8;
  }

  @keyframes animation-timeline-current {
    from {
      transform: translate(-50%, -50%) scale(0);
      opacity: 1;
    }
    to {
      transform: translate(-50%, -50%) scale(1);
      opacity: 0;
    }
  }
</style>



  <link rel="shortcut icon" type="image/png" href="../src/assets/images/logos/LOGO.png" />
  <link rel="stylesheet" href="../src/assets/css/styles.min.css" />


</head>


<body>
  <!--  Body Wrapper -->
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">
    <!-- Sidebar Start -->
    <aside class="left-sidebar">
      <!-- Sidebar scroll-->
      <div>
        <div class="brand-logo d-flex align-items-center justify-content-between">
          <a href="./index.php" class="text-nowrap logo-img">
            <img src="../src/assets/images/logos/benetton.png" width="180" alt="" />
          </a>
          <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
            <i class="ti ti-x fs-8"></i>
          </div>
        </div>
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
          <ul id="sidebarnav">
            <li class="nav-small-cap">
              <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
              <span class="hide-menu">Home</span>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="./index.php" aria-expanded="false">
                <span>
                  <i class="ti ti-layout-dashboard"></i>
                </span>
                <span class="hide-menu">Dashboard</span>
              </a>
            </li>
            <li class="nav-small-cap">
              <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
              <span class="hide-menu">ARCHIVES</span>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="./historique.php" aria-expanded="false">
                <span>
                  <i class="ti ti-file-description"></i>
                </span>
                <span class="hide-menu">R&eacute;cap</span>
              </a>
               <a class="sidebar-link" href="./preparation.php" aria-expanded="false">
                <span>
                  <i class="ti ti-file-description"></i>
                </span>
                <span class="hide-menu">Pilotage Pr&eacute;paration</span>
              </a>
			                <a class="sidebar-link" href="./sfaldina.php" aria-expanded="false">
                <span>
                  <i class="ti ti-file-description"></i>
                </span>
                <span class="hide-menu">Pilotage Sfaldina</span>
              </a>
			                <a class="sidebar-link" href="./spazzolato.php" aria-expanded="false">
                <span>
                  <i class="ti ti-file-description"></i>
                </span>
                <span class="hide-menu">Pilotage Spazzolato</span>
              </a>
							<a class="sidebar-link" href="./teinture.php" aria-expanded="false">
                <span>
                  <i class="ti ti-file-description"></i>
                </span>
                <span class="hide-menu">Pilotage Teinture</span>
              </a>
			                <a class="sidebar-link" href="./essorage.php" aria-expanded="false">
                <span>
                  <i class="ti ti-file-description"></i>
                </span>
                <span class="hide-menu">Pilotage Essorage</span>
              </a>
			                <a class="sidebar-link" href="./sechoire.php" aria-expanded="false">
                <span>
                  <i class="ti ti-file-description"></i>
                </span>
                <span class="hide-menu">Pilotage S&eacute;choire</span>
              </a>
			                <a class="sidebar-link" href="./rameuse.php" aria-expanded="false">
                <span>
                  <i class="ti ti-file-description"></i>
                </span>
                <span class="hide-menu">Pilotage Rameuse</span>
              </a>
            </li>
			 <li class="sidebar-item">
              <a class="sidebar-link" href="./historique.php" aria-expanded="false">
                <span>
                  <i class="ti ti-hammer"></i>
                </span>
                <span class="hide-menu">R&eacute;paration</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="./alertes-exco.php" aria-expanded="false">
                <span>
                  <i class="ti ti-alert-circle"></i>
                </span>
                <span class="hide-menu">Alertes</span>
              </a>
            </li>
			            <li class="sidebar-item">
              <a class="sidebar-link" href="./alertes-exco.php" aria-expanded="false">
                <span>
                  <i class="ti ti-truck-delivery"></i>
                </span>
                <span class="hide-menu">Fournisseurs</span>
              </a>
            </li>
   <li class="nav-small-cap">
              <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
              <span class="hide-menu">Pannes</span>
            </li>
			            <li class="sidebar-item">
              <a class="sidebar-link" href="./index.php" aria-expanded="false">
                <span>
                  <i class="ti ti-chart-infographic"></i>
                </span>
                <span class="hide-menu">Visualisation</span>
              </a>
            </li>
			            <li class="sidebar-item">
              <a class="sidebar-link" href="./historique.php" aria-expanded="false">
                <span>
                  <i class="ti ti-file-description"></i>
                </span>
                <span class="hide-menu">Historique</span>
              </a>
            </li>
            <li class="nav-small-cap">
              <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
              <span class="hide-menu">AUTH</span>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="./compte.php" aria-expanded="false">
                <span>
                  <i class="ti ti-users"></i>
                </span>
                <span class="hide-menu">Comptes</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="./ajouter-compte.php" aria-expanded="false">
                <span>
                  <i class="ti ti-user-plus"></i>
                </span>
                <span class="hide-menu">Ajouter Un Compte</span>
              </a>
            </li>
			 <li class="nav-small-cap">
              <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
              <span class="hide-menu">MODIFICATION</span>
            </li>
             <li class="sidebar-item">
			  <a class="sidebar-link" href="./mod.php" aria-expanded="false">
                <span>
                  <i class="ti ti-edit"></i>
                </span>
                <span class="hide-menu">Edition Couleur & Article</span>
              </a>
              </li>
				    <div class="mt-3 d-flex justify-content-center align-items-center">
    <a href="logout.php"  class="btn btn-primary">LOG OUT</a>
  </div>
          </ul>
          
        </nav>
        <!-- End Sidebar navigation -->
      </div>
      <!-- End Sidebar scroll-->
    </aside>
    <!--  Sidebar End -->
    <!--  Main wrapper -->
    <div class="body-wrapper">
      <!--  Header Start -->
<div class="container">

			  
			 
	


		<div class="col-ld-12 d-flex align-items-strech">
            <div class="card w-100">
              <div class="card-body">
                <div class="d-sm-flex d-block align-items-center justify-content-between mb-9">
                  <div class=" sm-0">
                    <h5 class="card-title fw-semibold">Overview WIP</h5>
                  </div></div>
				  <h4 class="card-title fw-semibold">Overview WIP</h4>
                 <div class="horizontal timeline" style="margin-bottom: 50px;">
				 
	<div class="steps">
		<div class="step">
			<span>Preparation</span>
		</div>
		<div class="step" id="step1">
			<span>Sfaldina</span>
		</div>
		<div class="step " id="step2">
			<span>Teinture</span>
		</div>
		<div class="step" id="step3">
			<span>Essorage</span>
		</div>
		<div class="step" id="step4">
			<span>Sechoire</span>
		</div>
		<div class="step " id="step5">
			<span>Rameuse</span>
		</div>
		<div class="step" id="step6">
			<span>CQMP</span>
		</div>
	</div>
	
	
	<div class="line" id="timeline-line"></div>
</div>


                 <div class="horizontal timeline">
	<div class="steps">
		<div class="step">
			<span>Preparation</span>
		</div>
		<div class="step" id="step1">
			<span>Sfaldina</span>
		</div>
		<div class="step " id="step2">
			<span>Teinture</span>
		</div>
		<div class="step" id="step3">
			<span>Essorage</span>
		</div>
		<div class="step" id="step4">
			<span>Sechoire</span>
		</div>
		<div class="step " id="step5">
			<span>Rameuse</span>
		</div>
		<div class="step" id="step6">
			<span>CQMP</span>
		</div>
	</div>
	
	
	<div class="line" id="timeline-line"></div>
</div>
                </div>
              </div> 
              </div>
            </div>
          </div>	  
			  
			 
			  

	





				

				
		

			  


<script>
  // Get a reference to the .line element
  const timelineLine = document.getElementById('timeline-line');

  // Get the current step index (0-based, change as needed)
  const currentStepIndex = 3; // For example, the third step (0, 1, 2)

  // Define the total number of steps (change as needed)
  const totalSteps = 6; // Change to the total number of steps in your timeline

  // Calculate the width percentage based on the current step
  const widthPercentage = (currentStepIndex / (totalSteps )) * 100;

  // Set the width of the .line element
  timelineLine.style.width = `${widthPercentage}%`;
  
  // Supprimez la classe "current" de toutes les étapes
  const allSteps = document.querySelectorAll('.step');
  allSteps.forEach(step => {
    step.classList.remove('current');
  });

  // Ajoutez la classe "current" à l'étape actuelle
  const currentStep = document.getElementById(`step${currentStepIndex }`);
  if (currentStep) {
    currentStep.classList.add('current');
  }
</script>

  <script src="../src/assets/libs/jquery/dist/jquery.min.js"></script>
  <script src="../src/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="../src/assets/js/sidebarmenu.js"></script>
  <script src="../src/assets/js/app.min.js"></script>
  <script src="../src/assets/libs/apexcharts/dist/apexcharts.min.js"></script>
  <script src="../src/assets/libs/simplebar/dist/simplebar.js"></script>
  <script src="../src/assets/js/dashboard.js"></script>

</body>

</html>