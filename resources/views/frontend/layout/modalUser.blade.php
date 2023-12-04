    <!-- Modal -->
    <div class="modal fade" id="userModal" tabindex="-1" aria-labelledby="userModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content p-4">
                <div class="modal-header border-0">
                    <h5 class="modal-title fs-3 fw-bold" id="userModalLabel">Sign In</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="mb-3">
                            <label for="fullName" class="form-label">Email</label>
                            <input type="email" class="form-control" id="fullName" placeholder="Enter Your Email" name="email" required="">
                        </div>
                        <div class="mb-5">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Enter Password" required="">
                            <small class="form-text">By Signup, you agree to our <a href="#!">Terms of Service</a> & <a
                                href="#!">Privacy Policy</a>
                            </small>
                        </div>
                        <button type="submit" class="btn btn-outline-primary">Sign In</button>
                    </form>
                </div>
                <div class="modal-footer border-0 justify-content-center">
                    Already have an account? <a href="{{ route('register') }}">Sign Up</a>
                </div>
            </div>
        </div>
    </div>
