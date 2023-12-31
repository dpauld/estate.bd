<footer class="page-footer  purple accent-2">
    <div class="container">
        <div class="row">
            <div class="col l6 s12">
                <h5 class="">Company Bio</h5>
                <p class="">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque sodales quam ut lorem condimentum, eu elementum nunc fermentum. Aliquam non ante ex. In consectetur nisi diam, et vulputate nisl ullamcorper sit amet.</p>


            </div>
            <div class="col l3 s12">
                <h5 class="white-text">Useful Links</h5>
                <ul>
                    <li><a class="white-text underlin" href="#!">Home</a></li>
                    <li><a class="white-text underlin" href="contact_form.php">Contact us</a></li>
                    <li><a class="white-text underlin" href="#!">Tterms & conditions</a></li>
                </ul>
            </div>
            <div class="col l3 s12">
                <h5 class="white-text">Connect</h5>
                <ul>
                    <li><a class="white-text underlin" href="#!">facebook</a></li>
                    <li><a class="white-text underlin" href="#!">twitter</a></li>
                    <li><a class="white-text underlin" href="#!">linkedin</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="footer-copyright">
        <div class="container">
            This web site is coded for <a class="yellow-text text-lighten-2" href="#" target="#">Software Lab</a>
        </div>
    </div>
</footer>
<div id="modalLog" class="modal">
    <div class="modal-content">
        <div class="row">
            <ul class="tabs tab-demo z-depth-1">
                <li class="tab"><a href="#test1" class="active">Login</a></li>
                <li class="tab"><a class="" href="#test2">Register</a></li>
                <li class="indicator" style="right: 406px; left: 0px;"></li>
            </ul>
            <div id="test1" class="col s12 white">

                <div class="row">
                    <form class="col s12" action="auth.php" method="post">
                        <br />
                        <div class="row">
                            <div class="input-field col s12">
                                <input id="email" type="email" class="validate" name="email" required>
                                <label for="email" data-error="wrong" data-success="right">Email</label>
                            </div>
                        </div>

                        <div class="row">
                            <div class="input-field col s12">
                                <input id="password" type="password" class="validate" name="password" required>
                                <label for="password" data-error="wrong" data-success="right">Password</label>
                            </div>
                        </div>

                        <br />

                        <div class="row">
                            <input type="checkbox" id="myCheckbox" class="filled-in checkbox-pruple" name="keep_login" />
                            <label for="myCheckbox" class="">Remember me</label>
                        </div>

                        <div class="row">
                            <div class="input-field col s12 center">
                                <button class="btn waves-effect waves-light purple accent-2" type="submit" name="submit_btn">
                                    Login
                                </button>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
            <div id="test2" class="col s12 white">

                <div class="row">
                    <form class="col s12" action="reg.php" method="post">
                        <br />

                        <div class="row">
                            <div class="input-field col s6">
                                <input id="first_name" type="text" class="validate" name="fName">
                                <label for="first_name">First Name</label>
                            </div>
                            <div class="input-field col s6">
                                <input id="last_name" type="text" class="validate" name="lName">
                                <label for="last_name">Last Name</label>
                            </div>
                        </div>

                        <div class="row">
                            <div class="input-field col s12">
                                <input id="email" type="email" class="validate" name="mail">
                                <label for="email">Email</label>
                            </div>
                        </div>

                        <div class="row">
                            <div class="input-field col s12">
                                <input id="password" type="password" class="validate" name="pass">
                                <label for="password">Password</label>
                            </div>
                        </div>

                        <div class="row">
                            <div class="input-field col s12 center">
                                <button class="btn waves-effect waves-light purple accent-2" type="submit" name="reg_act">
                                    Register
                                </button>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
    <!--            <div class="modal-footer">
                    <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">Agree</a>
                </div>-->
</div>

<div id="plzLog" class="modal">
    <div class="modal-content">
        <h4 class="orange-text text-accent-2">Dear User</h4>
        <p class="orange-text text-accent-2">You must be logged in to offer your property.</p>
        <p class="orange-text text-accent-2">Please login or signup first.</p>
    </div>
    <div class="modal-footer">
        <a href="#!" class="modal-action modal-close waves-effect waves-green btn orange accent-2 white-text"><span>Close</span></a>
    </div>
</div>

<script type="text/javascript" src="./js/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="./js/materialize.min.js"></script>
<script>
    (function ($) {
        $(function () {
            $('.logg').click(function () {
                $("#modalLog").modal();
                $("#modalLog").modal('open');
            });
            $('#ofProp').click(function () {
                $("#plzLog").modal();
                $("#plzLog").modal('open');
            });
            
            $('input#autocomplete-input.autocomplete').autoComplete({
                        minChars: 1,
                        source: function (term, suggest) {
                            if (window.XMLHttpRequest) {
                                // code for IE7+, Firefox, Chrome, Opera, Safari
                                xmlhttp = new XMLHttpRequest();
                            } else { // code for IE6, IE5
                                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                            }
                            xmlhttp.onreadystatechange = function () {
                                if (this.readyState == 4 && this.status == 200) {
                                    term = term.toLowerCase();
                                    var choices = JSON.parse(this.responseText);
                                    var matches = [];
                                    console.log(choices[0].district);
                                    for (i = 0; i < choices.length; i++)
                                        if (~(choices[i].district.toLowerCase().indexOf(term)))
                                            matches.push(choices[i].district);
                                    suggest(matches);
                                }
                            }
                            xmlhttp.open("GET", "autoComplete.php?x=" + term, true);
                            xmlhttp.send();
                        }
                    });
                    
                    
                    
        });
    })(jQuery);
</script>
<?php
mysqli_close($conn);
?>