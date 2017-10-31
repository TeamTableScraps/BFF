<?php
require_once("header.php");
?>

<!--About Section-->
        <div id="about" class="container-fluid">
            <h2>About the Event</h2>
            <h4>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</h4>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
        </div>
        
        <!--Vendors Section-->
        <div id="vendors" class="container-fluid bg-fade">
            <h2>Vendors</h2>
            <h4>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</h4>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
        </div>
        
        <!--Sponsors Section-->
        <div id="sponsors" class="container-fluid">
            <h2>Sponsors</h2>
            <h4>Thanks to our wonderful sponsors!</h4>
            <p>Sponsors list goes here...</p>
            <h4>Interested in becoming a sponsor?</h4>
        </div>
        
        <!--Contact Section-->
        <div id="contact" class="container-fluid bg-fade">
            <h2 class="text-center">Contact</h2>
            <div class="row">
                <div class="col-sm-5">
                    <p>Contact us for more information about the event.</p>
                    <p><span class="glyphicon glyphicon-map-marker"></span>Pensacola, FL</p>
                    <p><span class="glyphicon glyphicon-phone"></span>850-555-5555</p>
                    <p><span class="glyphicon glyphicon-envelope"></span>blackfeatherfestival@gmail.com</p>
                </div>
                <div class="col-sm-7">
                    <div class="row">
                        <div class="col-sm-6 form-group">
                            <input class="form-control" id="name" name="name" placeholder="Name" type="text" required>
                        </div>
                        <div class="col-sm-6 form-group">
                            <input class="form-control" id="email" name="email" placeholder="Email" type="email" required>
                        </div>
                    </div>
                    <textarea class="form-control" id="comments" name="comments" placeholder="Comments" rows=6></textarea><br>
                    <div class="row">
                        <div class="col-sm-12 form-group">
                            <button class="btn btn-default pull-right" type="submit">Send</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

<?php
require_once("footer.php");
?>
