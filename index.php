<?php include('head.php'); ?>

<body>
    <div class="container">
        <div class="row">
            <center> <img src="./images/vote.png" alt="Logo" width="80px" style="margin-top:10px;" /></center>
            <center>
                <h3 style="margin-bottom:-40px;">CESA Voting Sytem</h3>
            </center>
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default" style="border: 1px solid rgb(33,198,104);">

                    <div class="panel-heading" style="background: linear-gradient(90deg, rgba(33, 198, 104, 1) 0%, rgba(16, 135, 100, 1) 100%);	color:white;">
                        <center>
                            <h3 class="panel-title"> Identification </h3>
                        </center>
                    </div>
                    <div class="panel-body">
                        <form role="form" method="post" enctype="multipart/form-data">
                            <fieldset>

                                <div class="form-group">
                                    <label for="username">Matricule</label>
                                    <input class="form-control" placeholder="Please Enter Voter's ID Number" name="idno" type="text" required="required" autofocus>
                                </div>

                                <div class="form-group">
                                    <label for="username">Mot de Passe</label>
                                    <input class="form-control" placeholder="Password" name="password" type="password" required="required">
                                </div>

                                <button class="loginButton" name="login">
                                    Login
                                </button>

                            </fieldset>

                            <?php include('login_query.php'); ?>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include('scripts/script.php'); ?>
</body>

</html>