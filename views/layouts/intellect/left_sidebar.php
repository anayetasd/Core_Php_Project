<nav class="navbar navbar-light navbar-vertical navbar-expand-xl">
        <script>
          var navbarStyle = localStorage.getItem("navbarStyle");
          if (navbarStyle && navbarStyle !== 'transparent') {
            document.querySelector('.navbar-vertical').classList.add(`navbar-${navbarStyle}`);
          }
        </script>
        <div class="d-flex align-items-center">
          <div class="toggle-icon-wrapper">

            <button class="btn navbar-toggler-humburger-icon navbar-vertical-toggle" data-bs-toggle="tooltip"
              data-bs-placement="left" title="Toggle Navigation"><span class="navbar-toggle-icon"><span
                  class="toggle-line"></span></span></button>

          </div><a class="navbar-brand" href="../index.html">
            <div class="d-flex align-items-center py-3">
              <img class="me-2" src="<?=$logo?>" alt="" width="40" /><span
                class="font-sans-serif"><?=$app_name?></span>
            </div>
          </a>
        </div>
        <div class="collapse navbar-collapse" id="navbarVerticalCollapse">
          <div class="navbar-vertical-content scrollbar">
            <ul class="navbar-nav flex-column mb-3" id="navbarVerticalNav">
               <?php menus()?>
            </ul>
            <div class="settings mb-3">
              <div class="card shadow-none">
                <div class="card-body alert mb-0" role="alert">
                  <div class="btn-close-falcon-container">
                    <button class="btn btn-link btn-close-falcon p-0" aria-label="Close"
                      data-bs-dismiss="alert"></button>
                  </div>
                  <div class="text-center"><img src="../assets/img/icons/spot-illustrations/navbar-vertical.png" alt=""
                      width="80" />
                    <p class="fs--2 mt-2">Loving what you see? <br />Get your copy of <a href="#!">Intellect</a></p>
                    <div class="d-grid"><a class="btn btn-sm btn-purchase"
                        href="https://themes.getbootstrap.com/product/falcon-admin-dashboard-webapp-template/"
                        target="_blank">Purchase</a></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </nav>