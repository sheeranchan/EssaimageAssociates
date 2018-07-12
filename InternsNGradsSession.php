<!doctype html>
<html lang="en">

<?php include_once 'reusableTemplates/head.php' ?>

<body data-spy="scroll" data-target="#navbar" data-offset="30">

    <div class="bg-gradient">
    <!-- Nav Menu -->
        <div class="nav-menu fixed-top" id="nav-menu">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <nav class="navbar navbar-dark navbar-expand-lg">
                            <img data-toggle="tooltip" class="company-logo-size  margin-top-btm-1" src="../images/Cream%20Logo%20RGB.png" href="/"
                                 title="In France, they talk in a metaphoric sense about an [Essaimage] of new ideas, techniques, knowledge and savoir-faire (know-how, savvy, from years of experience).">
                            <button class="navbar-toggler small" type="button" data-toggle="collapse" data-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button>
                            <div class="collapse navbar-collapse" id="navbar">
                                <ul class="navbar-nav ml-auto">
                                    <li class="nav-item"> <a class="nav-link" href="../index.php">Home <span class="sr-only">(current)</span></a> </li>
                                    <li class="nav-item"> <a class="nav-link" href="../UniversitiesSession.php">Universities</a></li>
                                    <li class="nav-item"> <a class="nav-link active" href="../InternsNGradsSession.php">Interns & Grads</a> </li>
                                    <li class="nav-item"> <a class="nav-link" href="../RadioSession.php">Radio</a> </li>
                                    <li class="nav-item"> <a class="nav-link" href="../ContactSession.php">Contact Us</a> </li>
                                </ul>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        </div>


        <?php include_once 'reusableTemplates/indexSubSessions/InternsNGrads.php' ?>
    </div>

    <span class="clearfix"></span>
    <?php include_once 'reusableTemplates/footer.php' ?>
</body>

</html>
