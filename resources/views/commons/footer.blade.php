              <!-- Footer -->
              <footer class="content-footer footer bg-footer-theme">
                  <div class="container-xxl">
                      <div
                          class="footer-container d-flex align-items-center justify-content-between py-2 flex-md-row flex-column">
                          <div>
                              ©
                              <script>
                                  document.write(new Date().getFullYear());
                              </script>
                              Askari Technologies
                          </div>
                          <div>
                              <a href="javascript:void(0);" class="footer-link me-4" target="_blank">License</a>

                              <a href="javascript:void(0);" target="_blank" class="footer-link me-4">Documentation</a>

                              <a href="javascript:void(0);" target="_blank"
                                  class="footer-link d-none d-sm-inline-block">Support</a>
                          </div>
                      </div>
                  </div>
              </footer>
              <!-- / Footer -->

              <div class="content-backdrop fade"></div>
              </div>
              <!-- Content wrapper -->
              </div>
              <!-- / Layout page -->
              </div>

              <!-- Overlay -->
              <div class="layout-overlay layout-menu-toggle"></div>

              <!-- Drag Target Area To SlideIn Menu On Small Screens -->
              <div class="drag-target"></div>
              </div>
              <!-- / Layout wrapper -->
              <!-- Core JS -->
              <!-- build:js assets/vendor/js/core.js -->
              <script src="{{ asset('assets/vendor/libs/jquery/jquery.js') }}"></script>
              <script src="{{ asset('assets/vendor/libs/popper/popper.js') }}"></script>
              <script src="{{ asset('assets/vendor/js/bootstrap.js') }}"></script>
              <script src="{{ asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
              <script src="{{ asset('assets/vendor/libs/node-waves/node-waves.js') }}"></script>

              <script src=".{{ asset('assets/vendor/libs/hammer/hammer.js') }}"></script>
              <script src="{{ asset('assets/vendor/libs/i18n/i18n.js') }}"></script>
              <script src="{{ asset('assets/vendor/libs/typeahead-js/typeahead.js') }}"></script>

              <script src="{{ asset('assets/vendor/js/menu.js') }}"></script>
              <!-- endbuild -->

              <!-- Vendors JS -->
              <script src="{{ asset('assets/vendor/libs/apex-charts/apexcharts.js') }}"></script>

              <!-- Main JS -->
              <script src="{{ asset('assets/js/main.js') }}"></script>
              <!-- Page JS -->
              <script src="{{ asset('assets/js/dashboards-crm.js') }}"></script>
              {{-- Axios CDN --}}
              <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.5.0/axios.min.js"
                  integrity="sha512-aoTNnqZcT8B4AmeCFmiSnDlc4Nj/KPaZyB5G7JnOnUEkdNpCZs1LCankiYi01sLTyWy+m2P+W4XM+BuQ3Q4/Dg=="
                  crossorigin="anonymous" referrerpolicy="no-referrer"></script>
              <!--Selector CDN-->
              <!-- Scripts -->
           
              <!-- Scripts -->
              <script src="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/js/iziToast.min.js"></script>

              <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
                  integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
                  crossorigin="anonymous" referrerpolicy="no-referrer"></script>
              <script>
                  @if ($errors->any())
                      window.onload = function() {
                          // Loop through each error message and display it using IziToast
                          @foreach ($errors->all() as $error)
                              iziToast.error({
                                  title: "Error",
                                  message: "{{ $error }}",
                                  position: "topRight",
                                  timeout: 10000,
                                  transitionIn: "fadeInDown"
                              });
                          @endforeach
                      };
                  @endif

                  // Display success message
                    @if (session('success'))
                        window.onload = function() {
                            iziToast.success({
                                title: "Success",
                                message: "{{ session('success') }}",
                                position: "topRight",
                                timeout: 10000,
                                transitionIn: "fadeInDown"
                            });
                        };
                    @endif
              </script>

              </body>

              </html>
