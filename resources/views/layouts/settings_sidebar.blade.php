<div class="offcanvas offcanvas-end live-customizer" tabindex="-1" id="live-customizer" data-bs-backdrop="false" data-bs-scroll="true" aria-labelledby="live-customizer-label">
    <div class="offcanvas-header pb-0">
        <div class="d-flex align-items-center">
            <h4 class="offcanvas-title" id="live-customizer-label">Setting Panel</h4>
        </div>
        <div class="close-icon" data-bs-dismiss="offcanvas">
            <svg xmlns="http://www.w3.org/2000/svg"  width="24px" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
            </svg>
        </div>
    </div>
    <div class="offcanvas-body data-scrollbar">
        <div class="row">
            <div class="col-lg-12">
                <div>
                    <div class="text-center mb-4">
                        <h5 class="d-inline-block">Style Setting</h5>
                    </div>
                    <div>
                        <div class="mb-4">
                            <h5 class="mb-3">Theme</h5>
                            <div class=" mb-3" data-setting="radio">
                                <div class="form-check mb-0 w-100" >
                                    <input class="form-check-input custum-redio-btn" type="radio" value="light" name="theme_scheme" id="color-mode-light" checked>
                                    <label class="form-check-label h6 d-flex align-items-center justify-content-between" for="color-mode-light">
                                        <span>Light Theme</span> 
                                        <div class="text-primary ">
                                            <svg width="60" height="27" viewBox="0 0 60 27" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <rect x="0.375" y="0.375" width="59.25" height="26.25" rx="4.125" fill="white"/>
                                                <circle cx="9.75" cy="9.75" r="3.75" fill="#80868B"/>
                                                <rect x="16.5" y="8.25" width="37.5" height="3" rx="1.5" fill="#DADCE0"/>
                                                <rect x="6" y="18" width="48" height="3" rx="1.5" fill="currentColor"/>
                                                <rect x="0.375" y="0.375" width="59.25" height="26.25" rx="4.125" stroke="#DADCE0" stroke-width="0.75"/>
                                            </svg>
                                        </div>
                                    </label>
                                </div>
                            </div>
                            <div class=" mb-3" data-setting="radio">
                                <div class="form-check mb-0 w-100 ">
                                    <input class="form-check-input custum-redio-btn" type="radio" value="dark"  name="theme_scheme" id="color-mode-dark">
                                    <label class="form-check-label h6 d-flex align-items-center justify-content-between"  for="color-mode-dark">
                                        <span>Dark Theme</span>
                                        <div class="text-primary ">
                                            <svg width="60" height="27" viewBox="0 0 60 27" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <rect x="0.375" y="0.375" width="59.25" height="26.25" rx="4.125" fill="#1E2745"/>
                                                <circle cx="9.75" cy="9.75" r="3.75" fill="#80868B"/>
                                                <rect x="16.5" y="8.25" width="37.5" height="3" rx="1.5" fill="#DADCE0"/>
                                                <rect x="6" y="18" width="48" height="3" rx="1.5" fill="currentColor"/>
                                                <rect x="0.375" y="0.375" width="59.25" height="26.25" rx="4.125" stroke="currentColor" stroke-width="0.75"/>
                                            </svg>
                                        </div>                                    
                                    </label>
                                </div>
                            </div>
                        </div>

                        <hr class="hr-horizontal">

                        <div>
                            <h5 class="mb-3 mt-4">Direction</h5>
                            <div class=" mb-3" data-setting="radio">
                                <div class="form-check mb-0 w-100">
                                    <input class="form-check-input custum-redio-btn" type="radio" value="ltr" name="theme_scheme_direction" data-prop="dir" id="theme-scheme-direction-ltr" checked>
                                    <label class="form-check-label h6 d-flex align-items-center justify-content-between"  for="theme-scheme-direction-ltr">
                                        <span>LTR</span>
                                        <svg class="text-primary" width="60" height="27" viewBox="0 0 60 27" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <circle cx="11.5" cy="13.5002" r="6.5" fill="currentColor"/>
                                            <rect x="21" y="7.70026" width="34" height="5" rx="2" fill="#80868B"/>
                                            <rect opacity="0.5" x="21" y="16.1003" width="25.6281" height="3.2" rx="1.6" fill="#80868B"/>
                                            <rect x="0.375" y="0.375244" width="59.25" height="26.25" rx="4.125" stroke="currentColor" stroke-width="0.75"/>
                                        </svg>
                                    </label>
                                </div>
                                
                            </div>
                            <div class="mb-3" data-setting="radio">
                                <div class="form-check mb-0 w-100">
                                    <input class="form-check-input custum-redio-btn" type="radio" value="rtl" class="btn-check" name="theme_scheme_direction" data-prop="dir" id="theme-scheme-direction-rtl">
                                    <label class="form-check-label h6 d-flex align-items-center justify-content-between "  for="theme-scheme-direction-rtl">
                                        <span>RTL</span>
                                        <svg class="text-primary" width="60" height="27" viewBox="0 0 60 27" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <circle r="6.5" transform="matrix(-1 0 0 1 48.5 13.5002)" fill="currentColor"/>
                                            <rect width="34" height="5" rx="2" transform="matrix(-1 0 0 1 39 7.70026)" fill="#80868B"/>
                                            <rect opacity="0.5" width="25.6281" height="3.2" rx="1.6" transform="matrix(-1 0 0 1 39 16.1003)" fill="#80868B"/>
                                            <rect x="-0.375" y="0.375" width="59.25" height="26.25" rx="4.125" transform="matrix(-1 0 0 1 59.25 0.000244141)" stroke="currentColor" stroke-width="0.75"/>
                                        </svg>
                                    </label>
                                </div>       
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>