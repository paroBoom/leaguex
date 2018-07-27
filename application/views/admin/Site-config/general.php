<div class="page-wrapper">

    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card form-options">
                        <div class="card-header">
                            <h2 class="card-title">Opzioni sito</h2>
                        </div>
                        <div class="card-body">
                            <form action="<?php echo site_url("user/create_user"); ?>" method="post" role="form" id="siteOptions" autocomplete="off" novalidate="novalidate" class="fv-form fv-form-bootstrap">
                                <div class="form-row">
                                    <div class="form-group col-xs-12 col-sm-6">
                                        <label>Nome sito</label>
                                        <input type="text" class="form-control" placeholder="es. LEAGUEX | La tua fanta master league">
                                    </div>
                                    <div class="form-group col-xs-12 col-sm-6">
                                        <label>Titolo sito</label>
                                        <input type="text" class="form-control" placeholder="es. LEAGUEX">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div> 