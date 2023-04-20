<?php include '_header.php' ?>
    <style>
        .col-9 .col-3 > .card:hover{
            scale: 1.05;
            transition: 300ms;
        }
        .col-9 .col-3 > .card:not(:hover){
            transition: 300ms;
        }
        @media only screen and (max-width: 600px) {
            .container-row {
                flex-direction: column-reverse;
                gap: 1rem;
            }
        }
    </style>

    <div class="container">
        <div class="row container-row mt-5">
            <div class="col-3">
                <div class="card"> <!-- nav -->
                    <div class="card-body">
                        <div class="list-group">
                            <a href="index.php" class="btn btn-light list-group-item list-group-item-action text-danger"
                               role="button">Log out</a>
                        </div>
                    </div>
                </div> <!-- nav end-->
            </div>
            <div class="col-9">
                <div class="card"> <!-- main -->
                    <div class="card-body">
                        <h1>Houses</h1>
                        <div class="row mb-3">
                            <div class="col-3">
                                <div class="card">
                                    <a href="rooms.php" class="text-decoration-none text-black">
                                        <div class="card-body">
                                            <h4>Chloe Price</h4>
                                            <p>Arcadia Bay, Oregon<br>
                                                <i class="fa-solid fa-warning text-success"></i>
                                                <span class="">0 issues</span>
                                            </p>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> <!-- main end -->
            </div>
        </div>
    </div>

<?php include '_footer.php' ?>