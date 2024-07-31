<?php 
include("template/header.php");
?>
<!doctype html>
<html lang="en" data-bs-theme="auto">
  <head>
    <script src="js/color-modes.js"></script>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
 
    <title>CPA - Planes de precios</title>

    <link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
      .bi {
        vertical-align: -.125em;
        fill: currentColor;
      }

      .btn-bd-primary {
        --bd-violet-bg: #712cf9;
        --bd-violet-rgb: 112.520718, 44.062154, 249.437846;

        --bs-btn-font-weight: 600;
        --bs-btn-color: var(--bs-white);
        --bs-btn-bg: var(--bd-violet-bg);
        --bs-btn-border-color: var(--bd-violet-bg);
        --bs-btn-hover-color: var(--bs-white);
        --bs-btn-hover-bg: #6528e0;
        --bs-btn-hover-border-color: #6528e0;
        --bs-btn-focus-shadow-rgb: var(--bd-violet-rgb);
        --bs-btn-active-color: var(--bs-btn-hover-color);
        --bs-btn-active-bg: #5a23c8;
        --bs-btn-active-border-color: #5a23c8;
      }

      .bd-mode-toggle {
        z-index: 1500;
      }

      .bd-mode-toggle .dropdown-menu .active .bi {
        display: block !important;
      }
    </style>
    
    <link href="./css/pricing.css" rel="stylesheet">
    <script src="https://sdk.mercadopago.com/js/v2"></script>
  </head>
  <body>
    <div class="container py-3">
      <main>
        <div class="row row-cols-1 row-cols-md-3 mb-3 text-center">
          <div class="col">
            <div class="card mb-4 rounded-3 shadow-sm">
              <div class="card-header py-3">
                <h4 class="my-0 fw-normal">1 mes</h4>
              </div>
              <div class="card-body">
                <h1 class="card-title pricing-card-title">$5<small class="text-body-secondary fw-light">/mo</small></h1>
                <ul class="list-unstyled mt-3 mb-4">
                  <li>10 users included</li>
                  <li>2 GB of storage</li>
                  <li>Email support</li>
                  <li>Help center access</li>
                </ul>
                <button type="button" class="w-100 btn btn-lg btn-outline-primary" onclick="pagar('1mes')">Sign up for free</button>
              </div>
            </div>
          </div>
          <div class="col">
            <div class="card mb-4 rounded-3 shadow-sm">
              <div class="card-header py-3">
                <h4 class="my-0 fw-normal">3 meses</h4>
              </div>
              <div class="card-body">
                <h1 class="card-title pricing-card-title">$10<small class="text-body-secondary fw-light">/mo</small></h1>
                <ul class="list-unstyled mt-3 mb-4">
                  <li>20 users included</li>
                  <li>10 GB of storage</li>
                  <li>Priority email support</li>
                  <li>Help center access</li>
                </ul>
                <button type="button" class="w-100 btn btn-lg btn-primary" onclick="pagar('3meses')">Get started</button>
              </div>
            </div>
          </div>
          <div class="col">
            <div class="card mb-4 rounded-3 shadow-sm border-primary">
              <div class="card-header py-3 text-bg-primary border-primary">
                <h4 class="my-0 fw-normal">6 meses</h4>
              </div>
              <div class="card-body">
                <h1 class="card-title pricing-card-title">$29<small class="text-body-secondary fw-light">/mo</small></h1>
                <ul class="list-unstyled mt-3 mb-4">
                  <li>30 users included</li>
                  <li>15 GB of storage</li>
                  <li>Phone and email support</li>
                  <li>Help center access</li>
                </ul>
                <button type="button" class="w-100 btn btn-lg btn-primary" onclick="pagar('6meses')">Contact us</button>
              </div>
            </div>
          </div>
        </div>
      </main>
    </div>

    <script>
      const mp = new MercadoPago('YOUR_PUBLIC_KEY', {
          locale: 'es-AR'
      });

      function pagar(plan) {
          fetch('create_preference.php', {
              method: 'POST',
              headers: {
                  'Content-Type': 'application/json'
              },
              body: JSON.stringify({ plan: plan })
          })
          .then(response => response.json())
          .then(preference => {
              window.location.href = preference.init_point;
          })
          .catch(error => console.error('Error:', error));
      }
    </script>

    <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>

<?php 
include("template/footer.php");
?>
